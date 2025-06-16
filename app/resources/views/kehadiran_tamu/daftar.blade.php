<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Semua Tamu Undangan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #1b263b;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px 15px;
            color: #ffffff;
        }

        .card {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            animation: fadeInUp 0.8s ease;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #1b263b;
            font-weight: 700;
        }

        .divider-line {
            height: 4px;
            background-color: #1b263b;
            width: 120px;
            margin: 10px auto 30px auto;
            border-radius: 3px;
            animation: zoomIn 0.5s;
        }

        .form-select {
            max-width: 220px;
            margin-left: auto;
        }

        table.dataTable tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 6px;
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        #pdfContent * {
            font-family: Arial, sans-serif !important;
            color: #000 !important;
            background-color: #fff !important;
            animation: none !important;
            box-shadow: none !important;
            font-weight: bold;
        }

        #pdfContent .text-green {
            color: #2e7d32 !important;
        }

        #pdfContent {
            width: 1000px;
            max-width: 100%;
        }

        #pdfContent table {
            table-layout: fixed;
            width: 100%;
        }
        #pdfContent td {
            word-wrap: break-word;
            white-space: normal;
            vertical-align: top;
            padding: 8px;
            border: 1px solid #ccc;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="exportArea" class="card animate__animated animate__fadeInUp">
            <h2>Daftar Semua Tamu Undangan</h2>
            <div class="divider-line"></div>

            <div class="d-flex justify-content-end mb-3">

                <!-- Tombol Export PDF -->
                <button id="exportPDF" class="btn btn-success">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </button>
                <!-- <form action="{{ route('import.tamu') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center gap-2">
                @csrf
                <input type="file" name="file" accept=".xlsx,.xls" required>
                <button type="submit">Import Excel</button>
            </form> -->

                <select id="filterKehadiran" class="form-select">
                    <option value="">-- Semua Kehadiran --</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Belum Hadir">Belum Hadir</option>
                </select>
            </div>

            <div class="table-responsive">
                <table id="tabelTamu" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kehadiran</th>
                            <th>Kode Voucher</th>
                            <th>Penukaran</th>
                            <th>Waktu Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tamuUndangan as $index => $tamu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tamu->nama }}</td>
                            <td>
                                @if($tamu->hadir)
                                    <span class="badge bg-success">Hadir</span>
                                @else
                                    <span class="badge bg-secondary">Belum Hadir</span>
                                @endif
                            </td>
                            <td>{{ $tamu->kode_voucher ?? '-' }}</td>
                            <td>
                                <ul class="mb-0">
                                    <li>Launch Box:
                                        @if($tamu->launch_box)
                                            <span class="badge bg-success">Sudah Ditukar</span>
                                        @else
                                            <span class="badge bg-secondary">Belum Ditukar</span>
                                        @endif
                                    </li>
                                    <li>Souvenir:
                                        @if($tamu->souvenir)
                                            <span class="badge bg-success">Sudah Ditukar</span>
                                        @else
                                            <span class="badge bg-secondary">Belum Ditukar</span>
                                        @endif
                                    </li>
                                </ul>
                            </td>
                            <td>
                                @if ($tamu->updated_at)
                                    {{
                                        \Carbon\Carbon::parse($tamu->updated_at)
                                            ->locale('id')
                                            ->timezone('Asia/Makassar')
                                            ->translatedFormat('l, d F Y - H:i')
                                    }} WITA
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="pdfContent" style="display:none;">
            <h3 style="color: #000; text-align: center; margin-bottom: 20px;">Daftar Tamu Undangan</h3>
            <hr style="border: none; border-top: 2px solid #000; margin: 0 auto 20px auto; width: 60%;">

            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="background-color: #e0e0e0; color: #000;">
                        <th style="padding: 8px; border: 1px solid #ccc;">No</th>
                        <th style="padding: 8px; border: 1px solid #ccc;">Nama</th>
                        <th style="padding: 8px; border: 1px solid #ccc;">Kehadiran</th>
                        <th style="padding: 8px; border: 1px solid #ccc;">Kode Voucher</th>
                        <th style="padding: 8px; border: 1px solid #ccc;">Penukaran</th>
                        <th style="padding: 8px; border: 1px solid #ccc;">Diperbarui</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tamuUndangan as $index => $tamu)
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ccc;">{{ $index + 1 }}</td>
                        <td style="padding: 8px; border: 1px solid #ccc;">{{ $tamu->nama }}</td>
                        <td class="{{ $tamu->hadir ? 'text-green' : '' }}" style="padding: 8px; border: 1px solid #ccc; font-weight: bold;">
                            {{ $tamu->hadir ? 'Hadir' : 'Belum Hadir' }}
                        </td>
                        <td style="padding: 8px; border: 1px solid #ccc;">{{ $tamu->kode_voucher ?? '-' }}</td>
                        <td>
                            <div>
                                • Launch Box: {{ $tamu->launch_box ? 'Sudah Ditukar' : 'Belum Ditukar' }}<br>
                                • Souvenir: {{ $tamu->souvenir ? 'Sudah Ditukar' : 'Belum Ditukar' }}
                            </div>
                        </td>
                        <td style="padding: 8px; border: 1px solid #ccc;">
                            {{ \Carbon\Carbon::parse($tamu->updated_at)->locale('id')->translatedFormat('l, d F Y H:i') }} WITA
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/html2pdf.js@0.10.1/dist/html2pdf.bundle.min.js"></script>


    <script>
        $(document).ready(function () {
            const table = $('#tabelTamu').DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "→",
                        previous: "←"
                    },
                    emptyTable: "Tidak ada data tersedia",
                }
            });

            $('#filterKehadiran').on('change', function () {
                const selected = $(this).val();

                if (selected) {
                    table.column(2).search('^' + selected + '$', true, false).draw();
                } else {
                    table.column(2).search('').draw();
                }
            });
        });

        document.getElementById('exportPDF').addEventListener('click', function () {
            const element = document.getElementById('pdfContent');

            // Tampilkan dulu elemen tersembunyi
            element.style.display = 'block';

            const opt = {
                margin: 0.3,
                filename: 'daftar-tamu-undangan.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    logging: false
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };

            // Tunggu render style jika sebelumnya hidden
            setTimeout(() => {
                html2pdf().set(opt).from(element).outputPdf('blob').then(function (pdfBlob) {
                    const blobUrl = URL.createObjectURL(pdfBlob);
                    window.open(blobUrl, '_blank');

                    // Sembunyikan kembali elemen
                    element.style.display = 'none';
                });
            }, 300);
        });


    </script>

    <!-- @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif -->
</body>
</html>
