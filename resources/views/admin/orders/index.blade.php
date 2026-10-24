```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan | Ticketify Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --purple: #7047f5;
            --purple-dark: #5733d8;
            --ink: #18152f;
            --muted: #8a8da7;
            --sidebar: #17152f;
            --background: #f5f5fc;
            --white: #fff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--ink);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        button, input {
            font: inherit;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 280px;
            padding: 30px 20px 22px;
            background:
                radial-gradient(ellipse at 0% 0%, rgba(122, 82, 255, .22), transparent 45%),
                linear-gradient(165deg, #211d48 0%, #17152f 55%, #111126 100%);
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto;
            box-shadow: 12px 0 45px rgba(32, 22, 78, .08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 2px 14px 46px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            font-size: 21px;
            border-radius: 17px;
            background: linear-gradient(135deg, #a18aff, #6844f5);
            box-shadow: 0 8px 25px rgba(112, 71, 245, .42),
                        inset 0 1px 1px rgba(255,255,255,.4);
            animation: float 4s ease-in-out infinite;
        }

        .brand-name {
            font-size: 24px;
            letter-spacing: -1.2px;
            font-weight: 900;
        }

        .brand-name span {
            color: #a895ff;
        }

        .menu-label {
            margin: 0 15px 15px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #777593;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav-link {
            min-height: 50px;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 0 17px;
            color: #b8b6d0;
            border-radius: 15px;
            font-size: 13px;
            font-weight: 600;
            transition: .25s ease;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .nav-link:hover {
            color: white;
            background: rgba(255,255,255,.075);
            transform: translateX(4px);
        }

        .nav-link.active {
            color: white;
            background: linear-gradient(105deg, #805cf8, #5e3be6);
            box-shadow: 0 9px 24px rgba(94, 59, 230, .35),
                        inset 0 1px 0 rgba(255,255,255,.22);
        }

        .nav-divider {
            height: 1px;
            background: rgba(255,255,255,.10);
            margin: 20px 5px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 35px;
        }

        .promo-card {
            position: relative;
            overflow: hidden;
            padding: 20px;
            border: 1px solid rgba(255,255,255,.10);
            border-radius: 20px;
            background: linear-gradient(145deg, rgba(255,255,255,.09), rgba(255,255,255,.025));
        }

        .promo-card::after {
            content: '';
            position: absolute;
            width: 90px;
            height: 90px;
            right: -40px;
            top: -40px;
            border-radius: 50%;
            background: rgba(151, 121, 255, .22);
            filter: blur(3px);
        }

        .promo-icon {
            color: #b8a5ff;
            font-size: 25px;
            margin-bottom: 18px;
        }

        .promo-card h4 {
            font-size: 13px;
            margin-bottom: 8px;
        }

        .promo-card p {
            color: #9693b4;
            font-size: 11px;
            line-height: 1.9;
        }

        .logout-link {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-top: 15px;
            padding: 15px 17px;
            border-radius: 13px;
            color: #ff9eac;
            font-size: 13px;
            font-weight: 600;
            background: rgba(255, 90, 115, .07);
            border: 1px solid rgba(255, 90, 115, .10);
            transition: .2s;
            cursor: pointer;
            width: 100%;
            text-align: left;
        }

        .logout-link:hover {
            background: rgba(255, 90, 115, .15);
            transform: translateY(-2px);
        }

        /* MAIN */

        .main {
            margin-left: 280px;
            min-height: 100vh;
            padding: 28px 38px 45px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 36px;
        }

        .breadcrumb {
            color: #999bb1;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .breadcrumb span {
            color: var(--purple);
            font-weight: 700;
        }

        .page-title {
            font-size: clamp(25px, 3vw, 33px);
            font-weight: 900;
            letter-spacing: -1.3px;
        }

        .page-subtitle {
            margin-top: 9px;
            font-size: 13px;
            color: #8588a1;
            line-height: 1.7;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .date-pill {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 12px 15px;
            background: white;
            border: 1px solid #eeeafa;
            border-radius: 14px;
            color: #666681;
            font-size: 12px;
            box-shadow: 0 5px 18px rgba(38, 29, 83, .035);
        }

        .avatar {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            color: white;
            font-size: 16px;
            font-weight: 800;
            background: linear-gradient(135deg, #a38bff, #6240ed);
            box-shadow: 0 7px 20px rgba(112, 71, 245, .25);
        }

        /* HERO */

        .hero {
            position: relative;
            overflow: hidden;
            padding: 30px 33px;
            border-radius: 25px;
            color: white;
            background: linear-gradient(112deg, #39256f 0%, #7047f5 55%, #9c65f7 100%);
            box-shadow: 0 18px 40px rgba(99, 65, 218, .22);
            margin-bottom: 27px;
            animation: rise .6s ease both;
        }

        .hero::before, .hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .hero::before {
            width: 260px;
            height: 260px;
            right: 5%;
            top: -150px;
            border: 1px solid rgba(255,255,255,.18);
            box-shadow: 0 0 0 25px rgba(255,255,255,.035),
                        0 0 0 55px rgba(255,255,255,.025);
        }

        .hero::after {
            width: 150px;
            height: 150px;
            right: 22%;
            bottom: -110px;
            background: rgba(255,255,255,.08);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 620px;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            margin-bottom: 17px;
            border: 1px solid rgba(255,255,255,.23);
            border-radius: 30px;
            background: rgba(255,255,255,.12);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.3px;
        }

        .hero h2 {
            font-size: clamp(21px, 2.6vw, 29px);
            line-height: 1.4;
            letter-spacing: -.7px;
            margin-bottom: 10px;
        }

        .hero p {
            color: #e4dcff;
            max-width: 540px;
            font-size: 12px;
            line-height: 1.9;
        }

        .hero-decoration {
            position: absolute;
            right: 8%;
            top: 50%;
            transform: translateY(-50%) rotate(-12deg);
            width: 104px;
            height: 104px;
            display: grid;
            place-items: center;
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,.35);
            background: linear-gradient(145deg, rgba(255,255,255,.26), rgba(255,255,255,.07));
            box-shadow: 12px 20px 35px rgba(36, 15, 105, .2),
                        inset 0 1px 1px rgba(255,255,255,.4);
            font-size: 43px;
            animation: float 5s ease-in-out infinite;
        }

        /* STATISTICS */

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin: 32px 0 17px;
        }

        .section-heading h3 {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -.3px;
        }

        .section-heading p {
            font-size: 11px;
            color: #9698af;
            margin-top: 5px;
        }

        .live-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #18a779;
            font-size: 10px;
            font-weight: 800;
            background: #e5faf2;
            padding: 9px 12px;
            border-radius: 30px;
        }

        .live-dot {
            width: 7px;
            height: 7px;
            background: #22c58b;
            border-radius: 50%;
            box-shadow: 0 0 0 4px rgba(34,197,139,.13);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
        }

        .stat-card {
            --accent: #7047f5;
            --tint: #f0eaff;
            position: relative;
            overflow: hidden;
            min-width: 0;
            padding: 22px 20px;
            border-radius: 21px;
            background: white;
            border: 1px solid rgba(230, 227, 247, .8);
            box-shadow: 0 8px 25px rgba(41, 29, 91, .045);
            transition: transform .28s ease, box-shadow .28s ease;
            animation: rise .65s ease both;
        }

        .stat-card:nth-child(2) { animation-delay: .08s; }
        .stat-card:nth-child(3) { animation-delay: .16s; }
        .stat-card:nth-child(4) { animation-delay: .24s; }

        .stat-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 18px 32px rgba(41, 29, 91, .11);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            width: 110px;
            height: 110px;
            right: -52px;
            top: -53px;
            border-radius: 50%;
            background: var(--tint);
            opacity: .85;
        }

        .stat-card.green {
            --accent: #13ae85;
            --tint: #e1faf1;
        }

        .stat-card.orange {
            --accent: #f19a37;
            --tint: #fff0dc;
        }

        .stat-card.red {
            --accent: #ed6482;
            --tint: #ffe6ee;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            position: relative;
            z-index: 1;
        }

        .stat-icon {
            display: grid;
            place-items: center;
            width: 45px;
            height: 45px;
            color: var(--accent);
            background: var(--tint);
            border-radius: 15px;
            font-size: 18px;
        }

        .stat-symbol {
            font-size: 10px;
            color: #b2b1c6;
        }

        .stat-label {
            margin-top: 20px;
            color: #8587a0;
            font-size: 11px;
            font-weight: 600;
        }

        .stat-number {
            margin-top: 8px;
            font-size: clamp(23px, 2.5vw, 31px);
            font-weight: 900;
            letter-spacing: -1.1px;
            overflow-wrap: anywhere;
        }

        .stat-note {
            margin-top: 10px;
            font-size: 10px;
            color: #a1a2b6;
        }

        .stat-note i {
            color: var(--accent);
            margin-right: 4px;
        }

        /* TABLE */

        .orders-card {
            overflow: hidden;
            background: white;
            border-radius: 23px;
            border: 1px solid #ebe9f6;
            box-shadow: 0 10px 35px rgba(41, 29, 91, .055);
            animation: rise .7s ease both;
        }

        .orders-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            padding: 23px 25px;
            border-bottom: 1px solid #f0eef8;
        }

        .orders-toolbar h3 {
            font-size: 15px;
            font-weight: 800;
        }

        .orders-toolbar p {
            margin-top: 6px;
            font-size: 11px;
            color: #9899b0;
        }

        .search-box {
            width: min(100%, 300px);
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #a1a0b9;
            font-size: 13px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 13px 12px 38px;
            border: 1px solid #eae8f5;
            border-radius: 12px;
            outline: none;
            background: #faf9fe;
            font-size: 11px;
            color: var(--ink);
            transition: .2s;
        }

        .search-box input:focus {
            border-color: #9c84ff;
            box-shadow: 0 0 0 4px rgba(112,71,245,.09);
            background: white;
        }

        .table-scroll {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        thead {
            background: #f9f8fd;
        }

        th {
            padding: 15px 17px;
            text-align: left;
            white-space: nowrap;
            color: #8989a4;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .7px;
            border-bottom: 1px solid #eeecf6;
        }

        td {
            padding: 18px 17px;
            border-bottom: 1px solid #f1eff8;
            font-size: 11px;
            vertical-align: middle;
        }

        tbody tr {
            transition: background .2s;
        }

        tbody tr:hover {
            background: #faf9ff;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .number-cell {
            color: #a1a1b6;
            font-weight: 700;
        }

        .order-code {
            display: inline-block;
            max-width: 180px;
            padding: 9px 11px;
            border-radius: 10px;
            color: #6746df;
            background: #f1edff;
            font-size: 10px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .buyer-name {
            font-weight: 700;
            color: #28233f;
            margin-bottom: 5px;
        }

        .buyer-email {
            color: #a0a0b5;
            font-size: 10px;
            overflow-wrap: anywhere;
        }

        .amount {
            white-space: nowrap;
            font-size: 12px;
            font-weight: 800;
        }

        .payment-method {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #686985;
            font-size: 11px;
        }

        .payment-method i {
            color: #8e7be6;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 11px;
            border-radius: 30px;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .4px;
            white-space: nowrap;
        }

        .paid {
            color: #138765;
            background: #e2faf1;
        }

        .pending {
            color: #b7791f;
            background: #fff3d9;
        }

        .cancelled {
            color: #d94c68;
            background: #ffebef;
        }

        .order-date {
            white-space: nowrap;
            color: #777991;
            font-size: 10px;
        }

        .empty-state {
            padding: 60px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 76px;
            height: 76px;
            display: grid;
            place-items: center;
            margin: 0 auto 20px;
            border-radius: 25px;
            color: #896df4;
            background: #f0eaff;
            font-size: 28px;
            box-shadow: 0 8px 20px rgba(112,71,245,.1);
        }

        .empty-state h3 {
            font-size: 17px;
            margin-bottom: 9px;
        }

        .empty-state p {
            color: #9696ac;
            font-size: 12px;
            line-height: 1.8;
        }

        .no-results {
            display: none;
            padding: 28px;
            text-align: center;
            color: #9999b0;
            font-size: 12px;
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 17px 25px;
            border-top: 1px solid #f0eef8;
            background: #fdfcff;
            color: #9797ad;
            font-size: 10px;
        }

        .table-footer strong {
            color: #6250b4;
        }

        .page-footer {
            text-align: center;
            padding-top: 27px;
            color: #aaa9bc;
            font-size: 10px;
        }

        .page-footer span {
            color: #7957e9;
            font-weight: 800;
        }

        /* ANIMASI */

        @keyframes rise {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        /* RESPONSIVE */

        @media (max-width: 1200px) {
            .sidebar {
                width: 245px;
            }

            .main {
                margin-left: 245px;
                padding: 25px;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 18px;
            }

            .brand {
                margin: 0 5px 20px;
            }

            .menu-label {
                margin-top: 12px;
            }

            .nav-menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .nav-link {
                padding: 0 12px;
                gap: 9px;
                font-size: 11px;
            }

            .nav-divider, .sidebar-bottom {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 22px 15px 30px;
            }

            .topbar {
                align-items: flex-start;
                margin-bottom: 25px;
            }

            .topbar-right {
                gap: 8px;
            }

            .date-pill {
                display: none;
            }

            .hero {
                padding: 25px 22px;
            }

            .hero-decoration {
                width: 66px;
                height: 66px;
                right: 7%;
                font-size: 27px;
                border-radius: 20px;
                opacity: .8;
            }

            .hero-content {
                max-width: 75%;
            }

            .hero h2 {
                font-size: 22px;
            }

            .orders-toolbar {
                align-items: flex-start;
                flex-direction: column;
                padding: 20px;
            }

            .search-box {
                width: 100%;
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column;
                padding: 17px 20px;
            }
        }

        @media (max-width: 430px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 19px;
            }

            .hero-decoration {
                display: none;
            }

            .hero-content {
                max-width: 100%;
            }

            .page-title {
                font-size: 24px;
            }

            .avatar {
                width: 39px;
                height: 39px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>

<body>

@php
    $totalOrders = $orders->count();

    $paidOrders = $orders->where('payment_status', 'paid')->count();
    $pendingOrders = $orders->where('payment_status', 'pending')->count();
    $cancelledOrders = $orders->where('payment_status', 'cancelled')->count();

    $paidRevenue = $orders
        ->where('payment_status', 'paid')
        ->sum('total_amount');

    $formatRupiah = function ($amount) {
        return 'Rp ' . number_format((float) $amount, 0, ',', '.');
    };
@endphp

<aside class="sidebar">

    <a href="{{ route('admin.dashboard') }}" class="brand">
        <div class="brand-icon">
            <i class="fa-solid fa-ticket"></i>
        </div>

        <div class="brand-name">
            Ticket<span>ify</span>
        </div>
    </a>

    <div class="menu-label">MENU UTAMA</div>

    <nav class="nav-menu">

        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="fa-solid fa-table-columns"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.events.index') }}" class="nav-link">
            <i class="fa-regular fa-calendar-days"></i>
            <span>Kelola Event</span>
        </a>

        <a href="{{ route('admin.ticket-types.index') }}" class="nav-link">
            <i class="fa-solid fa-ticket"></i>
            <span>Jenis Tiket</span>
        </a>

        <a href="{{ route('admin.tickets.index') }}" class="nav-link">
            <i class="fa-solid fa-receipt"></i>
            <span>Tiket Terjual</span>
        </a>

        <a href="{{ route('admin.orders.index') }}" class="nav-link active">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Pesanan</span>
        </a>

    </nav>

    <div class="nav-divider"></div>

    <div class="menu-label">LAINNYA</div>

    <nav class="nav-menu">
        <a href="{{ route('home') }}" target="_blank" rel="noopener noreferrer" class="nav-link">
            <i class="fa-solid fa-globe"></i>
            <span>Lihat Website</span>
            <i class="fa-solid fa-arrow-up-right-from-square" style="margin-left:auto;font-size:10px;"></i>
        </a>
    </nav>

    <div class="sidebar-bottom">

        <div class="promo-card">
            <div class="promo-icon">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </div>

            <h4>Ticket Management</h4>

            <p>
                Pantau transaksi dan kelola pesanan tiket dengan mudah.
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Keluar dari Admin
            </button>
        </form>

    </div>

</aside>

<main class="main">

    <header class="topbar">

        <div>
            <div class="breadcrumb">
                Admin Panel &nbsp; / &nbsp; <span>Pesanan</span>
            </div>

            <h1 class="page-title">Daftar Pesanan <span>✨</span></h1>

            <p class="page-subtitle">
                Kelola dan pantau seluruh transaksi pembelian tiket Ticketify.
            </p>
        </div>

        <div class="topbar-right">
            <div class="date-pill">
                <i class="fa-regular fa-calendar" style="color:#7957e9;"></i>
                {{ now()->translatedFormat('d F Y') }}
            </div>

            <div class="avatar">
                <i class="fa-solid fa-user-shield"></i>
            </div>
        </div>

    </header>

    @if(session('success'))
        <div style="padding:15px 18px;margin-bottom:20px;border-radius:14px;background:#e2faf1;color:#138765;font-size:12px;font-weight:700;">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="padding:15px 18px;margin-bottom:20px;border-radius:14px;background:#ffebef;color:#d94c68;font-size:12px;font-weight:700;">
            <i class="fa-solid fa-circle-exclamation"></i>
            {{ session('error') }}
        </div>
    @endif

    <section class="hero">
        <div class="hero-content">

            <div class="hero-tag">
                <i class="fa-solid fa-chart-line"></i>
                TRANSACTION CENTER
            </div>

            <h2>Semua transaksi, dalam satu kendali. 💜</h2>

            <p>
                Pantau pesanan, periksa status pembayaran, dan lihat pendapatan
                dari tiket yang telah berhasil dibayar melalui satu halaman.
            </p>

        </div>

        <div class="hero-decoration">
            <i class="fa-solid fa-bag-shopping"></i>
        </div>
    </section>

    <div class="section-heading">
        <div>
            <h3>Ringkasan Transaksi</h3>
            <p>Ikhtisar seluruh pesanan yang tercatat di Ticketify.</p>
        </div>

        <div class="live-label">
            <span class="live-dot"></span>
            DATA PESANAN
        </div>
    </div>

    <section class="stats">

        <article class="stat-card">
            <div class="stat-top">
                <div class="stat-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <span class="stat-symbol">OVERVIEW</span>
            </div>

            <div class="stat-label">Total Pesanan</div>
            <div class="stat-number">{{ number_format($totalOrders, 0, ',', '.') }}</div>

            <div class="stat-note">
                <i class="fa-solid fa-layer-group"></i>
                Semua transaksi tercatat
            </div>
        </article>

        <article class="stat-card green">
            <div class="stat-top">
                <div class="stat-icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <span class="stat-symbol">SUCCESS</span>
            </div>

            <div class="stat-label">Pesanan Lunas</div>
            <div class="stat-number">{{ number_format($paidOrders, 0, ',', '.') }}</div>

            <div class="stat-note">
                <i class="fa-solid fa-shield-heart"></i>
                Pembayaran berstatus paid
            </div>
        </article>

        <article class="stat-card orange">
            <div class="stat-top">
                <div class="stat-icon">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <span class="stat-symbol">WAITING</span>
            </div>

            <div class="stat-label">Menunggu Pembayaran</div>
            <div class="stat-number">{{ number_format($pendingOrders, 0, ',', '.') }}</div>

            <div class="stat-note">
                <i class="fa-solid fa-hourglass-half"></i>
                Perlu pemantauan
            </div>
        </article>

        <article class="stat-card red">
            <div class="stat-top">
                <div class="stat-icon">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <span class="stat-symbol">REVENUE</span>
            </div>

            <div class="stat-label">Pendapatan Lunas</div>
            <div class="stat-number" style="font-size:clamp(19px,2vw,26px);">
                {{ $formatRupiah($paidRevenue) }}
            </div>

            <div class="stat-note">
                <i class="fa-solid fa-chart-simple"></i>
                Total transaksi berstatus paid
            </div>
        </article>

    </section>

    <div class="section-heading">
        <div>
            <h3>Semua Pesanan 📦</h3>
            <p>Detail pembelian dan status transaksi pengguna.</p>
        </div>
    </div>

    <section class="orders-card">

        <div class="orders-toolbar">
            <div>
                <h3>Riwayat Transaksi</h3>
                <p id="tableDescription">
                    Menampilkan {{ $totalOrders }} pesanan dari database.
                </p>
            </div>

            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input
                    type="search"
                    id="orderSearch"
                    placeholder="Cari kode, pembeli, atau status..."
                    aria-label="Cari pesanan"
                >
            </div>
        </div>

        @if($totalOrders > 0)

            <div class="table-scroll">

                <table id="ordersTable">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Order</th>
                            <th>Pembeli</th>
                            <th>Total</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($orders as $order)

                            <tr class="order-row">

                                <td class="number-cell">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <span class="order-code">
                                        {{ $order->order_code }}
                                    </span>
                                </td>

                                <td>
                                    <div class="buyer-name">
                                        {{ $order->user->name ?? 'Pengguna tidak ditemukan' }}
                                    </div>

                                    <div class="buyer-email">
                                        {{ $order->user->email ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    <span class="amount">
                                        {{ $formatRupiah($order->total_amount) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="payment-method">
                                        <i class="fa-regular fa-credit-card"></i>
                                        {{ $order->payment_method ?: 'Otomatis' }}
                                    </span>
                                </td>

                                <td>
                                    @if($order->payment_status === 'paid')
                                        <span class="status paid">
                                            <i class="fa-solid fa-circle-check"></i>
                                            PAID
                                        </span>
                                    @elseif($order->payment_status === 'pending')
                                        <span class="status pending">
                                            <i class="fa-solid fa-clock"></i>
                                            PENDING
                                        </span>
                                    @else
                                        <span class="status cancelled">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                            {{ strtoupper($order->payment_status ?? 'CANCELLED') }}
                                        </span>
                                    @endif
                                </td>

                                <td class="order-date">
                                    {{ $order->created_at
                                        ? $order->created_at->format('d M Y, H:i')
                                        : '-' }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="no-results" id="noResults">
                <i class="fa-solid fa-magnifying-glass" style="font-size:22px;display:block;margin-bottom:12px;"></i>
                Tidak ada pesanan yang cocok dengan pencarianmu.
            </div>

            <div class="table-footer">
                <span id="visibleCount">
                    Menampilkan <strong>{{ $totalOrders }}</strong> pesanan
                </span>

                <span>
                    Dikelola dengan <strong>Ticketify Admin</strong> 💜
                </span>
            </div>

        @else

            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fa-solid fa-box-open"></i>
                </div>

                <h3>Belum Ada Pesanan</h3>

                <p>
                    Belum ada pengguna yang melakukan pembelian tiket.<br>
                    Pesanan akan muncul di sini setelah tercatat dalam sistem.
                </p>
            </div>

        @endif

    </section>

    <footer class="page-footer">
        © {{ date('Y') }} <span>Ticketify</span> · Event & Ticket Management Platform
    </footer>

</main>

<script>
    const searchInput = document.getElementById('orderSearch');
    const table = document.getElementById('ordersTable');

    if (searchInput && table) {
        const rows = Array.from(table.querySelectorAll('.order-row'));
        const noResults = document.getElementById('noResults');
        const visibleCount = document.getElementById('visibleCount');
        const tableDescription = document.getElementById('tableDescription');

        searchInput.addEventListener('input', function () {
            const query = this.value.trim().toLocaleLowerCase('id');
            let visible = 0;

            rows.forEach(function (row) {
                const matches = row.textContent
                    .toLocaleLowerCase('id')
                    .includes(query);

                row.style.display = matches ? '' : 'none';

                if (matches) visible++;
            });

            noResults.style.display = visible === 0 ? 'block' : 'none';
            table.style.display = visible === 0 ? 'none' : '';

            visibleCount.innerHTML =
                'Menampilkan <strong>' + visible + '</strong> dari <strong>' +
                rows.length + '</strong> pesanan';

            tableDescription.textContent =
                query ? 'Hasil pencarian pesanan.' :
                'Menampilkan ' + rows.length + ' pesanan dari database.';
        });
    }
</script>

</body>
</html>
```