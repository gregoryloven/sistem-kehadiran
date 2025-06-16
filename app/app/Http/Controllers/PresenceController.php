<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TamuUndanganImport;

class PresenceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'asal' => 'required|string',
            'signature' => 'required|string',
            'selfie' => 'nullable|string'
        ]);

        // === Proses Signature ===
        $signature = $request->input('signature');
        $signature = preg_replace('/^data:image\/png;base64,/', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $decodedSignature = base64_decode($signature);

        $signatureFilename = 'signature_' . time() . '.png';
        $signatureDirectory = storage_path('app/public/signatures');

        if (!File::exists($signatureDirectory)) {
            File::makeDirectory($signatureDirectory, 0755, true);
        }

        $signaturePath = $signatureDirectory . '/' . $signatureFilename;
        file_put_contents($signaturePath, $decodedSignature);

        // === Proses Selfie (jika ada) ===
        $selfieFilename = null;

        if ($request->filled('selfie')) {
            $selfie = $request->input('selfie');
            $selfie = preg_replace('/^data:image\/png;base64,/', '', $selfie);
            $selfie = str_replace(' ', '+', $selfie);
            $decodedSelfie = base64_decode($selfie);

            $selfieFilename = 'selfie_' . time() . '.png';
            $selfieDirectory = storage_path('app/public/selfies');

            if (!File::exists($selfieDirectory)) {
                File::makeDirectory($selfieDirectory, 0755, true);
            }

            $selfiePath = $selfieDirectory . '/' . $selfieFilename;
            file_put_contents($selfiePath, $decodedSelfie);
        }

        // === Simpan ke Database ===
        DB::table('participant_attendance')->insert([
            'participant_name' => $request->input('nama'),
            'participant_origin' => $request->input('asal'),
            'signature_path' => 'signatures/' . $signatureFilename,
            'selfie_path' => $selfieFilename ? 'selfies/' . $selfieFilename : null,
            'created_at' => now(),
        ]);

        return response()->json(['message' => 'Absensi berhasil disimpan!']);
    }

    public function index()
    {
        $data = DB::table('participant_attendance')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $item->selfie_path = $item->selfie_path ? asset('storage/' . $item->selfie_path) : null;
                $item->signature_path = $item->signature_path ? asset('storage/' . $item->signature_path) : null;
                return $item;
            });

        return response()->json($data);
    }

    public function getDataPresence()
    {
        $data = DB::table('participant_attendance')
        ->select('*')
        ->where('created_at', 'like', '2025-05-17%')
        ->groupBy('participant_name')
        ->orderBy('participant_origin')
        ->orderBy('created_at', 'asc')
        ->get()
        ->map(function ($item) {
            $item->selfie_path = $item->selfie_path ? asset('storage/' . $item->selfie_path) : null;
            $item->signature_path = $item->signature_path ? asset('storage/' . $item->signature_path) : null;
            $item->created_at = Carbon::parse($item->created_at)
                ->setTimezone('Asia/Makassar')
                ->format('Y-m-d H:i:s');
            return $item;
        });

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function indexKehadiranHut() 
    {
        $tamu = DB::table('tamu_undangans')->select('*')->get();
        return view('kehadiran_tamu.index', compact('tamu'));
    }

    public function saveKehadiranHut(Request $request)
    {
        $request->validate([
            'nama' => 'required|exists:tamu_undangans,id',
            'hadir' => 'required|in:1',
        ]);

        $maxRetries = 3;
        $retryCount = 0;

        while ($retryCount < $maxRetries) {
            DB::beginTransaction();

            try {
                // Lock baris tamu
                $tamu = DB::table('tamu_undangans')
                    ->where('id', $request->nama)
                    ->lockForUpdate()
                    ->first();

                if ($tamu->hadir == 1 && $tamu->kode_voucher) {
                    DB::rollBack();
                    return redirect()->back()
                        ->with('info', 'Tamu sudah dikonfirmasi sebelumnya.')
                        ->with('kode_voucher', $tamu->kode_voucher);
                }

                // Lock semua baris dengan kode voucher untuk mencegah race condition
                $allVouchers = DB::table('tamu_undangans')
                    ->whereNotNull('kode_voucher')
                    ->where('kode_voucher', 'like', '18-anemone-%')
                    ->lockForUpdate()
                    ->get(['kode_voucher']);

                // Cari nomor terakhir dari koleksi yang sudah di-lock
                $lastNumber = 0;
                foreach ($allVouchers as $voucher) {
                    $number = (int) substr($voucher->kode_voucher, strlen('18-anemone-'));
                    if ($number > $lastNumber) {
                        $lastNumber = $number;
                    }
                }

                // Generate kode voucher baru
                $newVoucherNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
                $kodeVoucher = "18-anemone-" . $newVoucherNumber;

                // Update tamu
                DB::table('tamu_undangans')
                    ->where('id', $request->nama)
                    ->update([
                        'hadir' => 1,
                        'kode_voucher' => $kodeVoucher,
                        'updated_at' => now()
                    ]);

                DB::commit();

                return redirect()->back()
                    ->with('success', 'Kehadiran berhasil dikonfirmasi.')
                    ->with('kode_voucher', $kodeVoucher);

            } catch (\Exception $e) {
                DB::rollBack();
                $retryCount++;
                
                if ($retryCount >= $maxRetries) {
                    return redirect()->back()
                        ->with('error', 'Terjadi kesalahan setelah beberapa percobaan: ' . $e->getMessage());
                }
                
                // Delay sebelum retry
                usleep(rand(50000, 150000)); // Random delay 50-150ms
            }
        }
    }

    // public function saveKehadiranHut(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required|exists:tamu_undangans,id',
    //         'hadir' => 'required|in:1',
    //     ]);

    //     // // Hitung jumlah voucher yang sudah ada untuk penomoran
    //     // $count = DB::table('tamu_undangans')
    //     //             ->whereNotNull('kode_voucher')
    //     //             ->count();

    //     // $newVoucherNumber = str_pad($count + 1, 4, '0', STR_PAD_LEFT); // 0001, 0002, dst.
    //     // $kodeVoucher = "18-anemone-" . $newVoucherNumber;

    //     //  // Update tamu
    //     // DB::table('tamu_undangans')
    //     //     ->where('id', $request->nama)
    //     //     ->update([
    //     //         'hadir' => 1,
    //     //         'kode_voucher' => $kodeVoucher,
    //     //         'updated_at' => now()
    //     //     ]);

    //     // // Kirim ke view lewat session
    //     // return redirect()->back()->with('success', 'Kehadiran berhasil dikonfirmasi.')->with('kode_voucher', $kodeVoucher);

    //     DB::beginTransaction();

    //     try {
    //         // Lock baris tamu yang bersangkutan agar tidak bisa diakses proses lain sementara
    //         $tamu = DB::table('tamu_undangans')
    //             ->where('id', $request->nama)
    //             ->lockForUpdate()
    //             ->first();

    //         if ($tamu->hadir == 1 && $tamu->kode_voucher) {
    //             DB::rollBack();
    //             return redirect()->back()
    //                 ->with('info', 'Tamu sudah dikonfirmasi sebelumnya.')
    //                 ->with('kode_voucher', $tamu->kode_voucher);
    //         }

    //         // Ambil voucher terakhir yang sudah digunakan (AMAN dari race condition)
    //         $lastVoucher = DB::table('tamu_undangans')
    //             ->whereNotNull('kode_voucher')
    //             ->where('kode_voucher', 'like', '18-anemone-%')
    //             ->selectRaw("MAX(CAST(SUBSTRING(kode_voucher, LENGTH('18-anemone-') + 1) AS UNSIGNED)) as last_number")
    //             ->lockForUpdate()
    //             ->first();

    //         $lastNumber = $lastVoucher->last_number ?? 0;
    //         $newVoucherNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    //         $kodeVoucher = "18-anemone-" . $newVoucherNumber;

    //         // Update tamu
    //         DB::table('tamu_undangans')
    //             ->where('id', $request->nama)
    //             ->update([
    //                 'hadir' => 1,
    //                 'kode_voucher' => $kodeVoucher,
    //                 'updated_at' => now()
    //             ]);

    //         DB::commit();

    //         return redirect()->back()
    //             ->with('success', 'Kehadiran berhasil dikonfirmasi.')
    //             ->with('kode_voucher', $kodeVoucher);

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()
    //             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }

    public function daftarKehadiranHut()
    {
        $tamuUndangan = DB::table('tamu_undangans')
            ->select('*')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('kehadiran_tamu.daftar', compact('tamuUndangan'));
    }

    public function showFormVoucher()
    {
        $tamu = DB::table('tamu_undangans')
            ->whereNotNull('kode_voucher')
            ->orderBy('nama')->get();
        return view('kehadiran_tamu.penukaran', compact('tamu'));
    }

    public function cekNamaHut(Request $request)
    {
        $nama = $request->input('nama');

        $tamu = DB::table('tamu_undangans')
            ->where('nama', 'LIKE', $nama)
            ->first();

        if (!$tamu) {
            return response()->json([
                'success' => false,
                'message' => 'Nama tidak ditemukan.'
            ]);
        }

        // Cek jika semua kategori sudah ditukar
        if ($tamu->launch_box == 1 && $tamu->souvenir == 1) {
            return response()->json([
                'success' => false,
                'message' => 'Semua kategori sudah ditukar.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'nama' => $tamu->nama,
                'id' => $tamu->id,
                'launch_box' => $tamu->launch_box,
                'souvenir' => $tamu->souvenir,
                'kode_voucher' => $tamu->kode_voucher
            ]
        ]);
    }

    public function penukaranVoucherHut(Request $request)
    {
        $request->validate([
            'nama' => 'required|exists:tamu_undangans,id',
            'kategori' => 'required|in:Launch box,Souvenir',
        ]);

        DB::beginTransaction();

        try {
            $tamu = DB::table('tamu_undangans')
                ->where('id', $request->nama)
                ->lockForUpdate()
                ->first();

            if (!$tamu) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => 'Tamu tidak ditemukan.'
                ]);
            }

            // Cek kategori dan apakah sudah ditukar
            if ($request->kategori === 'Launch box') {
                if ($tamu->launch_box == 1) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Launch box sudah ditukar sebelumnya.'
                    ]);
                }

                DB::table('tamu_undangans')
                    ->where('id', $request->nama)
                    ->update([
                        'launch_box' => 1,
                        'updated_at' => now()
                    ]);

            } elseif ($request->kategori === 'Souvenir') {
                if ($tamu->souvenir == 1) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Souvenir sudah ditukar sebelumnya.'
                    ]);
                }

                DB::table('tamu_undangans')
                    ->where('id', $request->nama)
                    ->update([
                        'souvenir' => 1,
                        'updated_at' => now()
                    ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Penukaran ' . $request->kategori . ' berhasil.'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new TamuUndanganImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data tamu undangan berhasil diimport!');
    }



}
