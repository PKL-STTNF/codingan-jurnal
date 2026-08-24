<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>Jurnal PKL</title>

    {{-- =========================
         BOOTSTRAP
    ========================== --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        /* ==========================
           BODY
        ========================== */
        body {
            background: #f4f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        /* ==========================
           NAVBAR
        ========================== */
        .navbar {
            background: #fff !important;
            padding: 15px 0;
            box-shadow:0 4px 15px rgba(0, 0, 0, .08);
        }

        /* LOGO */
        .navbar-brand {
            font-size: 28px;
            font-weight: 700;
            color: #2563eb !important;
        }

        /* MENU NAVBAR */
        .nav-link {
            color: #555 !important;
            font-weight: 600;
            margin-left: 15px;
            border-radius: 10px;
            padding: 8px 12px !important;
            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background-color .2s ease,
                color .2s ease;
        }

        /* HOVER NAVBAR */
        .nav-link:hover {
            color: #2563eb !important;
            background: #eef4ff;
            transform: translateY(-3px);
            box-shadow:0 6px 15px rgba(0, 0, 0, .10);
        }

        /* MENU AKTIF */
        .nav-link.active {
            color: #2563eb !important;
            background: #eef4ff;
            border-bottom: 3px solid #2563eb;
        }

        /* SAAT MENU DIKLIK */
        .nav-link:active {
            transform: translateY(1px) scale(.98);
            box-shadow: none;
        }

        /* NAMA AKUN TANPA ANIMASI */
        .nav-link.dropdown-toggle {
            transition: none;
        }

        .nav-link.dropdown-toggle:hover {
            transform: none;
            box-shadow: none;
            background: transparent;
            color: inherit !important;
        }

        .nav-link.dropdown-toggle:active {
            transform: none;
            box-shadow: none;
        }

        /* DROPDOWN */
        .dropdown-menu {
            border: none;
            border-radius: 15px;
            box-shadow:0 10px 25px rgba(0, 0, 0, .12);
        }

        /* ITEM DROPDOWN */
        .dropdown-item {
            border-radius: 9px;
            transition:transform .2s ease,background-color .2s ease,color .2s ease;
        }

        .dropdown-item:hover {
            background: #eef4ff;
            color: #2563eb;
            transform: translateX(4px);
        }

        /* ==========================
           CARD
        ========================== */
        .content-card {
            background: white;
            margin-top: 35px;
            padding: 35px;
            border-radius: 20px;
            box-shadow:0 8px 25px rgba(0, 0, 0, .08);
        }

        /* ==========================
           JUDUL
        ========================== */
        .page-title {
            font-size: 38px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #6c757d;
            margin-top: -5px;
            margin-bottom: 25px;
        }

        /* ==========================
           SEARCH
        ========================== */
        .search-box {
            height: 48px;
            border-radius: 12px;
        }

        /* ==========================
           BUTTON
        ========================== */
        .btn {
            border-radius: 10px;
            transition:transform .2s ease,box-shadow .2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow:0 6px 15px rgba(0, 0, 0, .12);
        }

        .btn:active {
            transform: translateY(1px) scale(.98);
            box-shadow: none;
        }

        .btn-primary {
            padding: 10px 18px;
            background: #2563eb;
            border: none;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        /* ==========================
           TABLE
        ========================== */
        .table {
            margin-top: 20px;
            overflow: hidden;
            border-radius: 15px;
        }

        .table thead th {
            background: #2563eb !important;
            color: white !important;
            border: none;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #eef4ff;
        }

        /* ==========================
           BADGE
        ========================== */
        .badge-unit {
            background: #eaf2ff;
            color: #2563eb;
            border-radius: 20px;
            padding: 7px 14px;
            font-weight: 600;
        }

        /* ==========================
           LIST GROUP
        ========================== */
        .list-group-item {
            border: none;
            padding: 15px 20px;
            font-weight: 600;
            transition:transform .2s ease,background-color .2s ease,color .2s ease,box-shadow .2s ease;
        }

        .list-group-item.active {
            background: #2563eb !important;
            color: #fff !important;
            border-color: #2563eb !important;
        }

        .list-group-item:hover {
            background: #eef4ff;
            color: #2563eb;
            transform: translateX(4px);
            box-shadow:0 4px 10px rgba(0, 0, 0, .06);
        }

        /* ==========================
           LOGIN
        ========================== */
        .card {
            border-radius: 20px !important;
        }

        .input-group-text {
            background: #fff;
        }

        .form-control {
            height: 48px;
        }

        .form-control {
            transition:border-color .2s ease,box-shadow .2s ease;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow:0 0 0 3px rgba(37, 99, 235, .10);
        }

        .form-check-input:checked {
            background: #2563eb;
            border-color: #2563eb;
        }

        /* ==========================
           RESPONSIVE MOBILE
        ========================== */

        @media (max-width: 768px) {
            .content-card {
                padding: 18px;
                margin-top: 20px;
            }

            .page-title {
                font-size: 32px;
            }

            .page-subtitle {
                font-size: 15px;
            }

            /* Header */
            .header-journal {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .header-journal .btn {
                width: 100%;
            }

            /* Search */
            .search-area {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .search-area .btn {
                width: 100%;
            }

            /* Tabel */
            .table-responsive {
                overflow-x: auto;
            }

            table {
                min-width: 900px;
            }

            /* Navbar mobile */
            .nav-link {
                margin-left: 0;
                margin-top: 4px;
                width: fit-content;
            }
        }

    </style>
</head>
<body>


    {{-- =========================
         NAVBAR
    ========================== --}}

    @if(Auth::check())

        @include('layouts.navbar')

    @endif


    {{-- =========================
         CONTENT
    ========================== --}}
    <div class="{{ Auth::check() ? 'container py-4' : 'container-fluid p-0' }}">
        <div class="content-card">
            @yield('content')
        </div>
    </div>


    {{-- =========================
         BOOTSTRAP JAVASCRIPT
    ========================== --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>