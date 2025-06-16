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

    <!-- <style>
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

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            color: white;
            font-weight: bold;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
        }
    </style> -->

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
            overflow-x: hidden;
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
            position: relative;
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
            position: relative;
            z-index: 1;
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
            position: relative;
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

        /* Select2 Styling - Fixed untuk responsive */
        .select2-container {
            width: 100% !important;
            z-index: 9999;
        }

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
            z-index: 9999;
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

        /* Fix z-index untuk select2 dropdown */
        .select2-dropdown {
            z-index: 9999 !important;
        }

        .select2-container--open .select2-dropdown {
            z-index: 9999 !important;
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

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            color: white;
            font-weight: bold;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
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
                overflow: visible;
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

            .select2-container--default .select2-selection--single {
                height: 44px;
            }
            
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 40px;
                padding-left: 14px;
                font-size: 0.95rem;
            }
        }

        /* Mobile Small (320px - 425px) */
        @media (max-width: 425px) {
            body {
                overflow-x: hidden;
            }
            
            .form-section {
                padding: 20px 16px;
                min-height: 100vh;
                overflow: visible;
            }
            
            .form-card {
                padding: 24px 20px;
                border-radius: 12px;
                margin: 5px 0;
                overflow: visible;
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
                position: relative;
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
            
            .slider:before {
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
            
            /* Select2 mobile fixes */
            .select2-container--default .select2-selection--single {
                height: 44px;
                border-radius: 6px;
            }
            
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 40px;
                padding-left: 14px;
                font-size: 0.9rem;
            }
            
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 40px;
                right: 10px;
            }

            .select2-dropdown {
                border-radius: 6px !important;
                margin-top: 2px;
            }

            .select2-container--default .select2-results__option {
                padding: 10px 14px;
                font-size: 0.9rem;
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
            
            .slider:before {
                height: 18px;
                width: 18px;
            }
            
            .switch input:checked + .slider:before {
                transform: translateX(18px);
            }

            .select2-container--default .select2-selection--single {
                height: 42px;
            }
            
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 38px;
                font-size: 0.85rem;
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
            <h2>Penukaran Voucher Tamu Undangan</h2>
            <form id="kehadiranForm">
                <div class="form-group">
                    <label for="nama">Nama Tamu</label>
                    <select class="form-control select2" name="nama" id="nama" required>
                        <option value="">-- Pilih Nama --</option>
                        @foreach($tamu as $t)
                            <option value="{{ $t->id }}">{{ $t->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="button" class="btn-gold" id="cekNamaBtn">
                    <i class="fas fa-search"></i> Cek
                </button>

                <div id="voucherSection" style="display: none; margin-top: 32px;">
                    <div class="form-group">
                        <label>Pilih Kategori Penukaran</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kategori" id="launchbox" value="Launch box" required>
                            <label class="form-check-label" for="launchbox">Launch box</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kategori" id="souvenir" value="Souvenir">
                            <label class="form-check-label" for="souvenir">Souvenir</label>
                        </div>
                    </div>

                    <button type="button" class="btn-gold" id="tukarBtn">
                        <i class="fas fa-gift"></i> Tukar
                    </button>
                </div>
                <div id="infoStatus" style="margin-top: 16px; display: none;">
                    <p><strong>Kode Voucher:</strong> <span id="kodeVoucherText">-</span></p>
                    <p><strong>Status Penukaran:</strong></p>
                    <ul>
                        <li>Launch Box: <span id="statusLaunchBox" class="badge"></span></li>
                        <li>Souvenir: <span id="statusSouvenir" class="badge"></span></li>
                    </ul>
                </div>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                dropdownParent: $('.form-card'),
                width: '100%',
                placeholder: "-- Pilih Nama --"
            });

            let tamuId = null;

            $('#cekNamaBtn').click(function () {
                const id = $('#nama').val();
                const namaText = $('#nama option:selected').text();

                if (!id) {
                    Swal.fire('Oops!', 'Silakan pilih nama tamu.', 'warning');
                    return;
                }

                $.ajax({
                    url: '{{ route("kehadiran.ceknama") }}',
                    type: 'POST',
                    data: {
                        nama: namaText,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (res) {
                        if (res.success) {
                            tamuId = res.data.id;
                            $('#voucherSection').hide().fadeIn(300);

                            // Tampilkan kode voucher
                            $('#kodeVoucherText').text(res.data.kode_voucher || '-');

                            // Tampilkan status Launch Box
                            if (res.data.launch_box == 1) {
                                $('#statusLaunchBox').text('Sudah Ditukar').removeClass().addClass('badge badge-success');
                            } else {
                                $('#statusLaunchBox').text('Belum Ditukar').removeClass().addClass('badge badge-warning');
                            }

                            // Tampilkan status Souvenir
                            if (res.data.souvenir == 1) {
                                $('#statusSouvenir').text('Sudah Ditukar').removeClass().addClass('badge badge-success');
                            } else {
                                $('#statusSouvenir').text('Belum Ditukar').removeClass().addClass('badge badge-warning');
                            }

                            $('#infoStatus').hide().fadeIn(300);

                            Swal.fire({
                                icon: 'success',
                                title: 'Nama ditemukan!',
                                text: 'Silakan pilih kategori penukaran.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            tamuId = null;
                            $('#voucherSection').hide();
                            $('#infoStatus').hide();
                            Swal.fire({
                                icon: 'error',
                                title: 'Informasi',
                                text: res.message || 'Terjadi kesalahan.',
                            });
                        }
                    },
                    error: function () {
                        Swal.fire('Error', 'Terjadi kesalahan saat memeriksa nama.', 'error');
                    }
                });
            });

            $('#tukarBtn').click(function () {
                const kategori = $('input[name="kategori"]:checked').val();

                if (!tamuId) {
                    Swal.fire('Oops!', 'Silakan cek nama terlebih dahulu.', 'warning');
                    return;
                }

                if (!kategori) {
                    Swal.fire('Oops!', 'Pilih kategori penukaran.', 'warning');
                    return;
                }

                $.ajax({
                    url: '{{ route("kehadiran.voucher") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nama: $('#nama').val(),
                        kategori: $('input[name="kategori"]:checked').val()
                    },
                    success: function (res) {
                        if (res.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: res.message,
                                confirmButtonText: 'OK'
                            });

                            $('#kehadiranForm')[0].reset();
                            $('#voucherSection').fadeOut(300);
                            $('#infoStatus').fadeOut(300, function () {
                                // Kosongkan isi setelah animasi selesai
                                $('#kodeVoucherText').text('-');
                                $('#statusLaunchBox').text('').removeClass();
                                $('#statusSouvenir').text('').removeClass();
                            });
                            $('.select2').val(null).trigger('change');
                            tamuId = null;
                        } else {
                            Swal.fire('Gagal', res.message, 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error', 'Gagal melakukan penukaran.', 'error');
                    }
                });
            });
        });
    </script>





</body>
</html>
