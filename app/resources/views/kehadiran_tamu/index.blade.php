<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Kehadiran HUT 18 Anemone</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap & Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        :root {
            --navy: #0d1b2a;
            --gold: #d4af37;
            --white: #ffffff;
            --bg: #1b263b;
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background-color: var(--navy);
            color: var(--white);
        }

        .navbar {
            background-color: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-section {
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 1s ease-out;
        }

        .form-card {
            background-color: var(--white);
            border-radius: 16px;
            padding: 40px 30px;
            width: 100%;
            max-width: 960px;
            box-shadow: 0 12px 50px rgba(0, 0, 0, 0.3);
            color: var(--navy);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 20px 0;
        }

        .form-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 60px rgba(0, 0, 0, 0.4);
        }

        .form-card h2 {
            text-align: center;
            font-weight: 600;
            font-size: 2rem;
            margin-bottom: 30px;
            color: var(--navy);
            position: relative;
            line-height: 1.2;
        }

        .form-card h2::after {
            content: '';
            width: 60px;
            height: 3px;
            background-color: var(--gold);
            display: block;
            margin: 15px auto 0;
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            font-weight: 500;
            font-size: 1rem;
            display: block;
            margin-bottom: 8px;
            color: var(--navy);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
            color: var(--navy);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .btn-gold {
            background-color: var(--gold);
            color: var(--navy);
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 14px 24px;
            font-size: 1.1rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-gold:hover {
            background-color: #c8a437;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
        }

        .btn-gold:active {
            transform: translateY(0);
        }

        /* Custom Switch Toggle */
        .switch-container {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 8px 0;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 56px;
            height: 32px;
            flex-shrink: 0;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #ddd;
            transition: 0.4s;
            border-radius: 34px;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 24px;
            width: 24px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .switch input:checked + .slider {
            background-color: var(--gold);
        }

        .switch input:checked + .slider:before {
            transform: translateX(24px);
        }

        .switch-label {
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            color: var(--navy);
        }

        /* Select2 Styling */
        .select2-container--default .select2-selection--single {
            height: 48px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            padding: 0;
            background-color: #fff;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: var(--navy);
            line-height: 44px;
            padding-left: 16px;
            font-size: 1rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px;
            right: 12px;
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .select2-container--default .select2-dropdown {
            background-color: #fff;
            border: 2px solid var(--gold);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .select2-container--default .select2-results__option {
            color: var(--navy);
            padding: 12px 16px;
            font-size: 1rem;
        }

        .select2-container--default .select2-results__option--highlighted {
            background-color: var(--gold);
            color: var(--navy);
        }

        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        /* Tablet Styles (768px - 1024px) */
        @media (min-width: 768px) and (max-width: 1024px) {
            .form-section {
                padding: 60px 40px;
            }
            
            .form-card {
                padding: 50px 40px;
                max-width: 700px;
            }
            
            .form-card h2 {
                font-size: 2.2rem;
            }
        }

        /* Mobile Large (426px - 767px) */
        @media (min-width: 426px) and (max-width: 767px) {
            .form-section {
                padding: 30px 24px;
                min-height: 100vh;
            }
            
            .form-card {
                padding: 32px 24px;
                border-radius: 12px;
                margin: 10px 0;
            }
            
            .form-card h2 {
                font-size: 1.8rem;
                margin-bottom: 24px;
            }
            
            .form-card h2::after {
                width: 50px;
                height: 2px;
                margin: 12px auto 0;
            }
            
            .btn-gold {
                padding: 16px 20px;
                font-size: 1rem;
            }
            
            .switch {
                width: 52px;
                height: 30px;
            }
            
            .switch-label {
                font-size: 1rem;
            }
        }

        /* Mobile Small (320px - 425px) */
        @media (max-width: 425px) {
            .form-section {
                padding: 20px 16px;
                min-height: 100vh;
                overflow: visible;
            }
            
            .form-card {
                padding: 24px 20px;
                border-radius: 12px;
                margin: 5px 0;
                min-height: 450px; /* Set minimum height yang lebih besar */
                position: relative;
            }
            
            .form-card h2 {
                font-size: 1.6rem;
                margin-bottom: 20px;
                line-height: 1.3;
            }
            
            .form-card h2::after {
                width: 40px;
                height: 2px;
                margin: 10px auto 0;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
            
            .form-group label {
                font-size: 0.9rem;
                margin-bottom: 6px;
            }
            
            .form-control {
                padding: 10px 14px;
                font-size: 0.9rem;
            }
            
            .btn-gold {
                padding: 14px 16px;
                font-size: 0.95rem;
                font-weight: 500;
            }
            
            .switch {
                width: 48px;
                height: 28px;
            }
            
            .switch:before {
                height: 20px;
                width: 20px;
            }
            
            .switch input:checked + .slider:before {
                transform: translateX(20px);
            }
            
            .switch-container {
                gap: 12px;
            }
            
            .switch-label {
                font-size: 0.95rem;
            }
            
            .select2-container--default .select2-selection--single {
                height: 44px;
            }
            
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 40px;
                padding-left: 14px;
                font-size: 0.9rem;
            }
            
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 40px;
            }
        }

        /* Extra Small Mobile (max-width: 320px) */
        @media (max-width: 320px) {
            .form-section {
                padding: 15px 12px;
            }
            
            .form-card {
                padding: 20px 16px;
            }
            
            .form-card h2 {
                font-size: 1.4rem;
                margin-bottom: 16px;
            }
            
            .btn-gold {
                padding: 12px 14px;
                font-size: 0.9rem;
            }
            
            .switch {
                width: 44px;
                height: 26px;
            }
            
            .switch:before {
                height: 18px;
                width: 18px;
            }
            
            .switch input:checked + .slider:before {
                transform: translateX(18px);
            }
        }

        /* Navbar responsive adjustments */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1rem;
            }
            
            .navbar img {
                height: 32px;
            }
        }

        @media (max-width: 425px) {
            .navbar-brand {
                font-size: 0.9rem;
            }
            
            .navbar img {
                height: 28px;
            }
        }
    </style>
</head>
<body>

    <section class="form-section">
        <div class="form-card">
            <h2>Kehadiran Tamu Undangan</h2>
            <form method="POST" action="{{ route('kehadiran.submit') }}" id="kehadiranForm">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Tamu</label>
                    <select class="form-control select2" name="nama" id="nama" required>
                        @foreach($tamu as $t)
                            <option value="{{ $t->id }}">{{ $t->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="switch-container">
                        <label class="switch">
                            <input type="checkbox" id="hadir" name="hadir" value="1">
                            <span class="slider"></span>
                        </label>
                        <label for="hadir" class="switch-label">Hadir</label>
                    </div>
                </div>

                <button type="submit" class="btn-gold">
                    <i class="fas fa-paper-plane"></i>
                    Kirim Kehadiran
                </button>
            </form>
        </div>
    </section>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#nama').select2({
                placeholder: "-- Cari dan Pilih Nama --",
                width: '100%'
            });

            // Mencegah layout shift saat dropdown terbuka/tutup di mobile
            $('.select2').on('select2:open', function() {
                if (window.innerWidth <= 767) {
                    $('.form-card').addClass('dropdown-open');
                }
            });

            $('.select2').on('select2:close', function() {
                if (window.innerWidth <= 767) {
                    $('.form-card').removeClass('dropdown-open');
                }
            });
            

            // Cegah submit jika toggle belum diaktifkan
            document.querySelector("form").addEventListener("submit", function(e) {
                if (!document.getElementById("hadir").checked) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops!',
                        text: 'Silakan aktifkan toggle "Hadir" terlebih dahulu.',
                        confirmButtonColor: '#d4af37',
                        background: '#fff',
                        color: '#0d1b2a',
                    });
                }
            });

        });
    </script>



<!-- QRCODE -->
    @if(session('success') && session('kode_voucher') || session('info') && session('kode_voucher'))
        <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.0/build/qrcode.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", async function () {
                const voucherCode = "{{ session('kode_voucher') }}";
                const isSuccess = @json(session('success'));
                const title = isSuccess ? '<strong>Berhasil!</strong>' : '<strong>Tamu Sudah Dikonfirmasi</strong>';
                const icon = isSuccess ? 'success' : 'info';

                // const canvas = document.createElement('canvas');
                // canvas.width = 200;
                // canvas.height = 200;

                // const url = `http://149.129.252.86/anemone/daftar-kehadiran-hut18-anemone?voucher=${voucherCode}`;

                // await QRCode.toCanvas(canvas, url, {
                //     width: 200,
                //     margin: 1,
                //     color: {
                //         dark: '#000000',
                //         light: '#ffffff'
                //     }
                // });

                // const ctx = canvas.getContext('2d');
                // const logoSize = 50;
                // const logoImg = new Image();
                // logoImg.src = '/images/logo.png'; // Ganti ke path logo kamu
                // logoImg.crossOrigin = 'anonymous';

                // logoImg.onload = function () {
                //     const x = (canvas.width - logoSize) / 2;
                //     const y = (canvas.height - logoSize) / 2;
                //     ctx.fillStyle = 'white';
                //     ctx.fillRect(x, y, logoSize, logoSize);
                //     ctx.drawImage(logoImg, x, y, logoSize, logoSize);
                // };

                const content = document.createElement('div');
                content.style.background = '#d4af37';
                content.style.padding = '20px';
                content.style.borderRadius = '12px';
                content.style.color = '#ffffff';
                content.style.textAlign = 'center';
                content.style.display = 'flex';
                content.style.flexDirection = 'column';
                content.style.alignItems = 'center';

                content.innerHTML = `
                    <div style="font-size: 18px; margin-bottom: 10px;">
                        <strong>Kode Voucher Anda:</strong>
                    </div>
                    <div style="
                        font-size: 26px;
                        font-weight: bold;
                        background-color: #000;
                        color: #fff;
                        padding: 10px 20px;
                        border-radius: 10px;
                        display: inline-block;
                        margin-bottom: 16px;
                    ">
                        ${voucherCode}
                    </div>
                    <p style="margin-top: 10px; margin-bottom: 20px; font-size: 15px;">
                        Tunjukkan kode ini untuk mengambil <strong style="color:#000">Launch Box dan Souvenir</strong>.
                    </p>
                `;

                // canvas.style.marginBottom = '24px'; // jarak bawah barcode
                // content.appendChild(canvas);

                // const downloadBtn = document.createElement('button');
                // downloadBtn.innerText = 'Download Barcode';
                // downloadBtn.style.background = '#000';
                // downloadBtn.style.color = '#fff';
                // downloadBtn.style.border = 'none';
                // downloadBtn.style.padding = '8px 16px';
                // downloadBtn.style.borderRadius = '8px';
                // downloadBtn.style.marginTop = '20px'; // <--- Diperbesar jaraknya
                // downloadBtn.style.cursor = 'pointer';

                // downloadBtn.addEventListener('click', function () {
                //     const link = document.createElement('a');
                //     link.download = `voucher_${voucherCode}.png`;
                //     link.href = canvas.toDataURL('image/png');
                //     link.click();
                // });

                // content.appendChild(downloadBtn);

                Swal.fire({
                    title: title,
                    html: content,
                    icon: icon,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#000',
                    background: '#fff'
                });
            });
        </script>
    @endif

<!-- sudah oke -->
    <!-- @if(session('success') && session('kode_voucher') || session('info') && session('kode_voucher'))
        <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.0/build/qrcode.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", async function () {
                const voucherCode = "{{ session('kode_voucher') }}";
                const isSuccess = @json(session('success'));
                const title = isSuccess ? '<strong>Berhasil!</strong>' : '<strong>Tamu Sudah Dikonfirmasi</strong>';
                const icon = isSuccess ? 'success' : 'info';

                const canvas = document.createElement('canvas');
                canvas.width = 200;
                canvas.height = 200;

                const url = `http://149.129.252.86/anemone/daftar-kehadiran-hut18-anemone?voucher=${voucherCode}`;

                await QRCode.toCanvas(canvas, url, {
                    width: 200,
                    margin: 1,
                    color: {
                        dark: '#000000',
                        light: '#ffffff'
                    }
                });

                const ctx = canvas.getContext('2d');
                const logoSize = 50;
                const logoImg = new Image();
                logoImg.src = '/images/logo.png'; // Ganti ke path logo kamu
                logoImg.crossOrigin = 'anonymous';

                logoImg.onload = function () {
                    const x = (canvas.width - logoSize) / 2;
                    const y = (canvas.height - logoSize) / 2;
                    ctx.fillStyle = 'white';
                    ctx.fillRect(x, y, logoSize, logoSize);
                    ctx.drawImage(logoImg, x, y, logoSize, logoSize);
                };

                const content = document.createElement('div');
                content.style.background = '#d4af37';
                content.style.padding = '20px';
                content.style.borderRadius = '12px';
                content.style.color = '#ffffff';
                content.style.textAlign = 'center';
                content.style.display = 'flex';
                content.style.flexDirection = 'column';
                content.style.alignItems = 'center';

                content.innerHTML = `
                    <div style="font-size: 18px; margin-bottom: 10px;">
                        <strong>Kode Voucher Anda:</strong>
                    </div>
                    <div style="
                        font-size: 26px;
                        font-weight: bold;
                        background-color: #000;
                        color: #fff;
                        padding: 10px 20px;
                        border-radius: 10px;
                        display: inline-block;
                        margin-bottom: 16px;
                    ">
                        ${voucherCode}
                    </div>
                    <p style="margin-top: 10px; margin-bottom: 20px; font-size: 15px;">
                        Tunjukkan kode ini untuk mengambil <strong style="color:#000">Launch Box dan Souvenir</strong>.
                    </p>
                `;

                canvas.style.marginBottom = '24px'; // jarak bawah barcode
                content.appendChild(canvas);

                const downloadBtn = document.createElement('button');
                downloadBtn.innerText = 'Download Barcode';
                downloadBtn.style.background = '#000';
                downloadBtn.style.color = '#fff';
                downloadBtn.style.border = 'none';
                downloadBtn.style.padding = '8px 16px';
                downloadBtn.style.borderRadius = '8px';
                downloadBtn.style.marginTop = '20px'; // <--- Diperbesar jaraknya
                downloadBtn.style.cursor = 'pointer';

                downloadBtn.addEventListener('click', function () {
                    const link = document.createElement('a');
                    link.download = `voucher_${voucherCode}.png`;
                    link.href = canvas.toDataURL('image/png');
                    link.click();
                });

                content.appendChild(downloadBtn);

                Swal.fire({
                    title: title,
                    html: content,
                    icon: icon,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#000',
                    background: '#fff'
                });
            });
        </script>
    @endif -->


<!-- barcode -->
<!-- @if(session('success') && session('kode_voucher') || session('info') && session('kode_voucher'))
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.0/build/qrcode.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const voucherCode = "{{ session('kode_voucher') }}";
            const isSuccess = @json(session('success'));
            const title = isSuccess ? '<strong>Berhasil!</strong>' : '<strong>Tamu Sudah Dikonfirmasi</strong>';
            const icon = isSuccess ? 'success' : 'info';

            // Generate QR Code
            const canvas = document.createElement('canvas');
            QRCode.toCanvas(canvas, voucherCode, {
                width: 160,
                margin: 1,
                color: {
                    dark: '#000000',
                    light: '#ffffff'
                }
            });

            // Build content
            const content = document.createElement('div');
            content.style.background = '#d4af37'; // Gold
            content.style.padding = '20px';
            content.style.borderRadius = '12px';
            content.style.color = '#ffffff';
            content.style.textAlign = 'center';

            content.innerHTML = `
                <div style="font-size: 18px; margin-bottom: 10px;">
                    <strong>Kode Voucher Anda:</strong>
                </div>
                <div style="
                    font-size: 26px;
                    font-weight: bold;
                    background-color: #000;
                    color: #fff;
                    padding: 10px 20px;
                    border-radius: 10px;
                    display: inline-block;
                    margin-bottom: 16px;
                ">
                    ${voucherCode}
                </div>
                <p style="margin-top: 10px; margin-bottom: 14px; font-size: 15px;">
                    Tunjukkan kode ini untuk mengambil <strong style="color:#000">Launch Box dan Souvenir</strong>.
                </p>
            `;

            content.appendChild(canvas);

            // Tampilkan Swal
            Swal.fire({
                title: title,
                html: content,
                icon: icon,
                confirmButtonText: 'OK',
                confirmButtonColor: '#000',
                background: '#fff'
            });
        });
    </script>
@endif -->

<!-- berbentuk voucher -->
    <!-- @if(session('success') && session('kode_voucher'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: 'success',
                title: '<strong>Berhasil!</strong>',
                html: `
                    <p style="font-size: 16px; color: #0d1b2a; margin-bottom: 10px;">
                        Kehadiran berhasil dikonfirmasi.<br>
                        <strong>Kode Voucher Anda:</strong>
                    </p>
                    <div style="
                        background-color: #d4af37;
                        border: 2px dashed #fff;
                        border-radius: 16px;
                        padding: 20px 30px;
                        display: inline-block;
                        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                        margin-bottom: 10px;
                        color: #ffffff;
                        text-align: center;
                    ">
                        <div style="font-size: 28px; font-weight: bold; letter-spacing: 2px; margin-bottom: 10px;">
                            {{ session("kode_voucher") }}
                        </div>
                        <div style="font-size: 14px; color: #ffffff;">
                            Berlaku untuk pengambilan
                            <strong style="color: #000000;">Lunch Box</strong> dan
                            <strong style="color: #000000;">Souvenir</strong>
                        </div>
                    </div>
                `,
                confirmButtonText: 'OK',
                confirmButtonColor: '#d4af37',
                background: '#fff',
                color: '#0d1b2a',
            });
        });
    </script>
    @endif

    @if(session('info') && session('kode_voucher'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: 'info',
                title: '<strong>Tamu Sudah Dikonfirmasi</strong>',
                html: `
                    <p style="font-size: 16px; color: #0d1b2a; margin-bottom: 10px;">
                        Kehadiran tamu ini telah dikonfirmasi sebelumnya.<br>
                        <strong>Kode Voucher Anda:</strong>
                    </p>
                    <div style="
                        background-color: #d4af37;
                        border: 2px dashed #fff;
                        border-radius: 16px;
                        padding: 20px 30px;
                        display: inline-block;
                        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                        margin-bottom: 10px;
                        color: #ffffff;
                        text-align: center;
                    ">
                        <div style="font-size: 28px; font-weight: bold; letter-spacing: 2px; margin-bottom: 10px;">
                            {{ session("kode_voucher") }}
                        </div>
                        <div style="font-size: 14px; color: #ffffff;">
                            Berlaku untuk pengambilan
                            <strong style="color: #000000;">Lunch Box</strong> dan
                            <strong style="color: #000000;">Souvenir</strong>
                        </div>
                    </div>
                `,
                confirmButtonText: 'OK',
                confirmButtonColor: '#d4af37',
                background: '#fff',
                color: '#0d1b2a',
            });
        });
    </script>
    @endif -->


    <!-- yang lama -->
    <!-- @if(session('success') && session('kode_voucher'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: 'success',
                title: '<strong>Berhasil!</strong>',
                html: `
                    <p style="font-size: 16px; color: #0d1b2a; margin-bottom: 10px;">
                        Kehadiran berhasil dikonfirmasi.<br>
                        <strong>Kode Voucher Anda:</strong>
                    </p>
                    <div style="
                        font-size: 28px;
                        font-weight: 700;
                        color: #d4af37;
                        background-color: #f7f7f7;
                        padding: 12px 24px;
                        border-radius: 10px;
                        display: inline-block;
                        margin-bottom: 10px;
                    ">
                        {{ session("kode_voucher") }}
                    </div>
                `,
                confirmButtonText: 'OK',
                confirmButtonColor: '#d4af37',
                background: '#fff',
                color: '#0d1b2a',
            });
        });
    </script>
    @endif

    @if(session('info') && session('kode_voucher'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: 'info',
                title: '<strong>Tamu Sudah Dikonfirmasi</strong>',
                html: `
                    <p style="font-size: 16px; color: #0d1b2a; margin-bottom: 10px;">
                        Kehadiran tamu ini telah dikonfirmasi sebelumnya.<br>
                        <strong>Kode Voucher Anda:</strong>
                    </p>
                    <div style="
                        font-size: 28px;
                        font-weight: 700;
                        color: #d4af37;
                        background-color: #f7f7f7;
                        padding: 12px 24px;
                        border-radius: 10px;
                        display: inline-block;
                        margin-bottom: 10px;
                    ">
                        {{ session("kode_voucher") }}
                    </div>
                `,
                confirmButtonText: 'OK',
                confirmButtonColor: '#d4af37',
                background: '#fff',
                color: '#0d1b2a',
            });
        });
    </script>
    @endif -->

</body>
</html>
