<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresenceController;

Route::get('kehadiran-hut18-anemone', [PresenceController::class, 'indexKehadiranHut'])->name('kehadiran.form');
Route::post('save-kehadiran-hut18-anemone', [PresenceController::class, 'saveKehadiranHut'])->name('kehadiran.submit');
Route::get('daftar-kehadiran-hut18-anemone', [PresenceController::class, 'daftarKehadiranHut'])->name('kehadiran.daftar');
Route::get('form-penukaran-hut18-anemone', [PresenceController::class, 'showFormVoucher'])->name('kehadiran.penukaran');
Route::post('cek-nama-hut18-anemone', [PresenceController::class, 'cekNamaHut'])->name('kehadiran.ceknama');
Route::post('penukaran-voucher-hut18-anemone', [PresenceController::class, 'penukaranVoucherHut'])->name('kehadiran.voucher');

Route::post('import-tamu-undangan', [PresenceController::class, 'import'])->name('import.tamu');
