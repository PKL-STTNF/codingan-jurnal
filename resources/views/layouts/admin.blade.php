<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>Admin - Jurnal PKL</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            background: #f4f7fb;
            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e9ecef;
            box-shadow: 4px 0 15px rgba(0, 0, 0, .05);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform .25s ease;
        }

        /* =====================================================
           LOGO
        ===================================================== */

        .admin-logo {
            padding: 25px 22px;
            border-bottom: 1px solid #f0f0f0;
        }

        .admin-logo a {
            text-decoration: none;
            color: #2563eb;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-logo i {
            font-size: 25px;
        }

        /* =====================================================
           MENU
        ===================================================== */

        .admin-menu {
            padding: 25px 15px;
            flex: 1;
            overflow-y: auto;
        }

        .menu-title {
            font-size: 11px;
            color: #9ca3af;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 0 12px;
            margin-bottom: 10px;
        }

        .admin-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 5px;
            border-radius: 10px;
            color: #495057;
            text-decoration: none;
            font-weight: 500;
            transition: .2s;
        }

        .admin-menu a i {
            font-size: 18px;
            width: 22px;
        }

        .admin-menu a:hover {
            background: #eef4ff;
            color: #2563eb;
        }

        .admin-menu a.active {
            background: #2563eb;
            color: white;
            font-weight: 600;
        }

        .coming-soon {
            margin-left: auto;
            font-size: 9px;
            background: #f1f3f5;
            color: #868e96;
            padding: 3px 6px;
            border-radius: 6px;
        }

        /* =====================================================
           USER BAWAH
        ===================================================== */

        .admin-bottom {
            padding: 18px;
            border-top: 1px solid #f0f0f0;
            background: #ffffff;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            min-width: 0;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .admin-user strong {
            display: block;
            font-size: 14px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .admin-user small {
            display: block;
            color: #888;
            font-size: 11px;
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: #fff1f2;
            color: #dc2626;
            padding: 10px;
            border-radius: 9px;
            font-weight: 600;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #fee2e2;
        }

        /* =====================================================
           CONTENT
        ===================================================== */

        .admin-content {
            margin-left: 250px;
            min-height: 100vh;
            width: calc(100% - 250px);
            padding: 30px;
        }

        .content-card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
            width: 100%;
            max-width: 100%;
            overflow: hidden;
        }

        /* =====================================================
           TITLE
        ===================================================== */

        .page-title {
            font-size: 38px;
            font-weight: 700;
            line-height: 1.2;
        }

        .page-subtitle {
            color: #6c757d;
            margin-top: -5px;
        }

        /* =====================================================
           DASHBOARD STAT CARD
        ===================================================== */

        .stat-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow:
                0 12px 28px rgba(37, 99, 235, .15)
                !important;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-1 {
            background: linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );
        }

        .stat-2 {
            background: linear-gradient(
                135deg,
                #7c3aed,
                #6d28d9
            );
        }

        .stat-3 {
            background: linear-gradient(
                135deg,
                #10b981,
                #059669
            );
        }

        .stat-4 {
            background: linear-gradient(
                135deg,
                #f59e0b,
                #ea580c
            );
        }

        .stat-5 {
            background: linear-gradient(
                135deg,
                #06b6d4,
                #0891b2
            );
        }

        .stat-label {
            font-size: 13px;
            font-weight: 600;
            color: #6b7280;
            letter-spacing: .3px;
        }

        /* =====================================================
           SECTION
        ===================================================== */

        .section-heading {
            border-left: 5px solid #2563eb;
            padding-left: 12px;
        }

        /* =====================================================
           RANKING
        ===================================================== */

        .rank-avatar {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
        }

        /* =====================================================
           QUICK LINK
        ===================================================== */

        .quick-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            color: #374151;
            font-weight: 500;
            text-decoration: none;
            transition:
                background .2s ease,
                color .2s ease;
        }

        .quick-link:hover {
            background: #eef4ff;
            color: #2563eb;
        }

        .quick-icon {
            width: 34px;
            height: 34px;
            min-width: 34px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        /* =====================================================
           TABLE
        ===================================================== */

        .table thead th {
            background: #2563eb !important;
            color: #fff !important;
            border: none;
            white-space: nowrap;
        }

        .table tbody tr:hover {
            background: #eef4ff;
        }

        .table-card {
            border-radius: 16px;
            overflow: hidden;
            border: none;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* =====================================================
           CHART
        ===================================================== */

        .chart-container {
            position: relative;
            width: 100%;
            max-width: 100%;
            overflow: hidden;
        }

        .chart-container canvas {
            max-width: 100% !important;
        }

        canvas {
            max-width: 100% !important;
        }

        /* =====================================================
           MOBILE MENU BUTTON
        ===================================================== */

        .mobile-menu-btn {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            width: 52px;
            height: 52px;
            border: none;
            border-radius: 14px;
            background: #2563eb;
            color: white;
            font-size: 25px;
            align-items: center;
            justify-content: center;
            z-index: 1100;
            box-shadow:
                0 5px 15px rgba(0, 0, 0, .15);
            cursor: pointer;
        }

        /* =====================================================
           SIDEBAR OVERLAY
        ===================================================== */

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .4);
            z-index: 999;
        }

        /* =====================================================
           RESPONSIVE HP
        ===================================================== */

        @media (max-width: 768px) {

            /* BODY */

            body {
                overflow-x: hidden;
            }

            /* HAMBURGER */

            .mobile-menu-btn {
                display: flex;
                top: 15px;
                left: 15px;
                width: 52px;
                height: 52px;
                border-radius: 14px;
            }

            /* SIDEBAR */

            .admin-sidebar {
                width: 250px;
                transform: translateX(-100%);
                transition: transform .25s ease;
                box-shadow:
                    5px 0 20px rgba(0, 0, 0, .15);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            /* OVERLAY */

            .sidebar-overlay.show {
                display: block;
            }

            /* CONTENT */

            .admin-content {
                margin-left: 0;
                width: 100%;
                max-width: 100%;
                padding: 82px 12px 20px;
                overflow-x: hidden;
            }

            /* CARD UTAMA */

            .content-card {
                width: 100%;
                max-width: 100%;
                padding: 18px;
                border-radius: 16px;
                overflow: hidden;
            }

            /* TITLE */

            .page-title {
                font-size: 28px;
                line-height: 1.2;
            }

            .page-subtitle {
                font-size: 14px;
                line-height: 1.5;
            }

            /* BOOTSTRAP ROW */

            .row {
                --bs-gutter-x: 1rem;
                margin-left: 0;
                margin-right: 0;
            }

            /* STAT CARD */

            .stat-card {
                width: 100%;
                margin-bottom: 15px;
            }

            .stat-card .card-body {
                padding: 18px !important;
            }

            .stat-icon {
                width: 48px;
                height: 48px;
                font-size: 20px;
            }

            /* SECTION HEADING */

            .section-heading {
                font-size: 22px;
            }

            /* CHART */

            .chart-container {
                width: 100% !important;
                max-width: 100% !important;
                height: 280px;
                overflow: hidden !important;
            }

            .chart-container canvas {
                width: 100% !important;
                max-width: 100% !important;
            }

            /* TABLE */

            .table-responsive {
                width: 100%;
                max-width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table {
                min-width: 700px;
            }

            /* QUICK LINK */

            .quick-link {
                padding: 10px 12px;
            }

            /* RANK AVATAR */

            .rank-avatar {
                width: 40px;
                height: 40px;
                min-width: 40px;
            }

            /* USER SIDEBAR */

            .admin-user strong {
                max-width: 150px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            /* CARD IMAGE / ICON */

            img {
                max-width: 100%;
                height: auto;
            }

            /* BOOTSTRAP CONTAINER */

            .container,
            .container-fluid {
                max-width: 100%;
                overflow-x: hidden;
            }

            /* BUTTON */

            .btn {
                max-width: 100%;
            }

        }

        /* =====================================================
           HP KECIL
        ===================================================== */

        @media (max-width: 480px) {

            .admin-content {
                padding: 78px 10px 15px;
            }

            .content-card {
                padding: 15px;
                border-radius: 14px;
            }

            .page-title {
                font-size: 24px;
            }

            .page-subtitle {
                font-size: 13px;
            }

            .mobile-menu-btn {
                width: 48px;
                height: 48px;
                top: 12px;
                left: 12px;
            }

            .stat-icon {
                width: 44px;
                height: 44px;
                font-size: 18px;
            }

            .section-heading {
                font-size: 20px;
            }

        }

    </style>

</head>

<body>

    {{-- NAVBAR / SIDEBAR ADMIN --}}
    @include('layouts.admin-navbar')

    {{-- CONTENT --}}
    <main class="admin-content">

        <div class="content-card">

            @yield('content')

        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>