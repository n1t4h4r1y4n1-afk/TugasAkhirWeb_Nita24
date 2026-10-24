<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Event | Ticketify Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #7057f5;
            --primary-dark: #5640dc;
            --navy: #15162e;
            --muted: #8589a6;
            --bg: #f5f6fc;
            --border: #ececf5;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: #252643;
            font-size: 13px;
            overflow-x: hidden;
        }

        a { text-decoration: none; }

        /* SIDEBAR */
        .sidebar {
            width: 255px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            overflow-y: auto;
            padding: 28px 18px;
            color: white;
            background:
                radial-gradient(ellipse at top left, rgba(112,87,245,.24), transparent 42%),
                linear-gradient(180deg, #191a37 0%, #111326 100%);
            border-right: 1px solid rgba(255,255,255,.06);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            margin-bottom: 42px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            font-size: 19px;
            background: linear-gradient(135deg, #a18aff, #6446ec);
            box-shadow: 0 7px 22px rgba(112,87,245,.35);
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -.8px;
            white-space: nowrap;
        }

        .brand-name span { color: #a99aff; }

        .nav-caption {
            color: #777b9e;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.8px;
            padding: 0 14px;
            margin: 26px 0 12px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 15px;
            margin-bottom: 7px;
            border-radius: 12px;
            color: #b9bad2;
            font-size: 12px;
            font-weight: 600;
            transition: .25s ease;
        }

        .sidebar-link i {
            width: 19px;
            text-align: center;
            font-size: 15px;
        }

        .sidebar-link:hover {
            background: rgba(255,255,255,.07);
            color: white;
            transform: translateX(3px);
        }

        .sidebar-link.active {
            color: white;
            background: linear-gradient(105deg, #785cf6, #5940df);
            box-shadow: 0 8px 22px rgba(96,70,230,.28);
        }

        .sidebar-bottom {
            margin-top: 48px;
            padding: 17px;
            border: 1px solid rgba(255,255,255,.09);
            border-radius: 16px;
            background: rgba(255,255,255,.045);
        }

        .sidebar-bottom .mini-icon {
            color: #b4a5ff;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .sidebar-bottom strong {
            display: block;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .sidebar-bottom p {
            color: #989ab6;
            font-size: 10px;
            line-height: 1.7;
            margin: 0;
        }

        /* MAIN */
        .main {
            margin-left: 255px;
            min-height: 100vh;
        }

        .topbar {
            min-height: 76px;
            padding: 14px 38px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            background: rgba(255,255,255,.9);
            border-bottom: 1px solid #ebebf4;
        }

        .breadcrumb-text {
            color: #9699b0;
            font-size: 11px;
        }

        .breadcrumb-text strong { color: #353550; }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .profile-avatar {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            color: white;
            border-radius: 13px;
            font-size: 14px;
            background: linear-gradient(135deg, #ff82bd, #8b65f6);
            box-shadow: 0 5px 14px rgba(139,101,246,.22);
        }

        .profile-name {
            font-size: 11px;
            font-weight: 800;
        }

        .profile-role {
            color: #9699b0;
            font-size: 10px;
            margin-top: 3px;
        }

        .content {
            padding: 32px 38px 45px;
            max-width: 1650px;
            margin: auto;
        }

        /* HERO */
        .hero {
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
            padding: 31px 34px;
            margin-bottom: 25px;
            color: white;
            border-radius: 24px;
            background: linear-gradient(112deg, #5d45df 0%, #795cf6 55%, #a06af8 100%);
            box-shadow: 0 15px 35px rgba(103,77,228,.19);
            animation: rise .65s ease both;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            right: 100px;
            top: -190px;
            border-radius: 50%;
            background: rgba(255,255,255,.10);
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            right: -65px;
            bottom: -145px;
            border: 35px solid rgba(255,255,255,.09);
            border-radius: 50%;
        }

        .hero-content { position: relative; z-index: 2; }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            margin-bottom: 14px;
            border-radius: 30px;
            color: #fff;
            background: rgba(255,255,255,.15);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .hero h1 {
            font-size: clamp(23px, 2.4vw, 31px);
            line-height: 1.3;
            font-weight: 800;
            letter-spacing: -.9px;
            margin-bottom: 10px;
        }

        .hero p {
            color: rgba(255,255,255,.8);
            font-size: 12px;
            line-height: 1.8;
            margin: 0;
            max-width: 520px;
        }

        .hero-art {
            position: relative;
            z-index: 2;
            flex-shrink: 0;
            width: 115px;
            height: 115px;
            display: grid;
            place-items: center;
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 28px;
            font-size: 51px;
            background: rgba(255,255,255,.14);
            box-shadow: 0 14px 32px rgba(45,25,130,.13);
            transform: rotate(5deg);
            animation: float 4s ease-in-out infinite;
        }

        /* SECTION */
        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin: 30px 0 16px;
        }

        .section-heading h2 {
            font-size: 15px;
            font-weight: 800;
            margin: 0;
            letter-spacing: -.3px;
        }

        .section-heading p {
            font-size: 11px;
            color: var(--muted);
            margin: 5px 0 0;
        }

        .live-tag {
            padding: 7px 11px;
            border-radius: 30px;
            color: #249c72;
            background: #e5faf1;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        /* STATISTICS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 17px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            min-height: 142px;
            padding: 21px;
            background: white;
            border: 1px solid rgba(233,233,245,.9);
            border-radius: 19px;
            box-shadow: 0 5px 20px rgba(32,34,75,.035);
            transition: transform .28s, box-shadow .28s;
            animation: rise .7s ease both;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(47,43,100,.10);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 18px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            font-size: 17px;
        }

        .purple { color: #7057f5; background: #f0edff; }
        .pink { color: #ed579b; background: #fff0f7; }
        .green { color: #22a982; background: #e5faf3; }

        .stat-chip {
            font-size: 10px;
            color: #8589a6;
            background: #f6f6fb;
            border-radius: 20px;
            padding: 6px 8px;
        }

        .stat-label {
            color: #898ca6;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .stat-value {
            color: #252643;
            font-size: 29px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -1px;
        }

        /* EVENT PANEL */
        .events-panel {
            margin-top: 30px;
            background: white;
            border: 1px solid #ececf5;
            border-radius: 20px;
            box-shadow: 0 7px 25px rgba(32,34,75,.035);
            overflow: hidden;
            animation: rise .8s ease both;
        }

        .panel-heading {
            padding: 23px 24px 19px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
            border-bottom: 1px solid #f0f0f7;
        }

        .panel-heading h2 {
            font-size: 15px;
            font-weight: 800;
            margin: 0 0 6px;
        }

        .panel-heading p {
            font-size: 11px;
            color: var(--muted);
            margin: 0;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 17px;
            color: white;
            font-size: 11px;
            font-weight: 800;
            border-radius: 11px;
            background: linear-gradient(110deg, #7057f5, #8b65f6);
            box-shadow: 0 7px 17px rgba(112,87,245,.23);
            transition: .25s;
        }

        .btn-add:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 11px 22px rgba(112,87,245,.32);
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 17px 24px;
            background: #fdfdff;
            border-bottom: 1px solid #f0f0f7;
        }

        .search-box {
            position: relative;
            width: min(100%, 330px);
        }

        .search-box i {
            position: absolute;
            top: 50%;
            left: 14px;
            color: #a0a2b8;
            transform: translateY(-50%);
        }

        .search-box input {
            width: 100%;
            height: 42px;
            padding: 0 15px 0 39px;
            color: #343550;
            font-family: inherit;
            font-size: 11px;
            border: 1px solid #e9e9f3;
            border-radius: 11px;
            outline: none;
            background: white;
            transition: .2s;
        }

        .search-box input:focus {
            border-color: #9988fa;
            box-shadow: 0 0 0 4px rgba(112,87,245,.08);
        }

        .result-count {
            color: #9295ad;
            font-size: 10px;
            white-space: nowrap;
        }

        /* TABLE */
        .table-responsive { width: 100%; }

        .event-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 0;
            min-width: 920px;
        }

        .event-table thead th {
            padding: 15px 17px;
            color: #898ca6;
            background: #fafaff;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .9px;
            text-transform: uppercase;
            white-space: nowrap;
            border-bottom: 1px solid #eeeeF6;
        }

        .event-table tbody td {
            padding: 18px 17px;
            vertical-align: middle;
            color: #454761;
            font-size: 11px;
            border-bottom: 1px solid #f0f0f7;
        }

        .event-table tbody tr:last-child td { border-bottom: 0; }
        .event-table tbody tr { transition: background .2s; }
        .event-table tbody tr:hover { background: #faf9ff; }

        .number-badge {
            width: 29px;
            height: 29px;
            display: grid;
            place-items: center;
            color: #7057f5;
            background: #f0edff;
            border-radius: 9px;
            font-size: 10px;
            font-weight: 800;
        }

        .event-name {
            min-width: 170px;
            max-width: 260px;
            color: #292a48;
            font-weight: 800;
            font-size: 11px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .event-slug {
            display: block;
            color: #a0a2b7;
            font-size: 9px;
            margin-top: 5px;
            overflow-wrap: anywhere;
        }

        .category-pill {
            display: inline-block;
            padding: 7px 10px;
            color: #7057f5;
            background: #f1efff;
            border-radius: 8px;
            font-size: 9px;
            font-weight: 800;
        }

        .location-cell {
            min-width: 135px;
            max-width: 210px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .location-cell i {
            color: #ed70a9;
            margin-right: 5px;
        }

        .date-cell {
            min-width: 120px;
            line-height: 1.7;
            white-space: nowrap;
        }

        .date-cell i {
            color: #8c77f7;
            margin-right: 5px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 30px;
            font-size: 9px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status-pill::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-active { color: #219c73; background: #e6faf2; }
        .status-inactive { color: #e05268; background: #fff0f1; }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
            min-width: 175px;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 10px;
            border: 0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 9px;
            font-weight: 800;
            white-space: nowrap;
            transition: .2s;
            cursor: pointer;
        }

        .action-btn:hover { transform: translateY(-2px); }

        .btn-manage {
            color: white;
            background: linear-gradient(120deg, #7057f5, #8c6cf7);
            box-shadow: 0 4px 10px rgba(112,87,245,.14);
        }

        .btn-edit { color: #aa7400; background: #fff4d7; }
        .btn-delete { color: #df5264; background: #fff0f1; }
        .btn-manage:hover { color: white; background: #5940df; }
        .btn-edit:hover { color: #8a5c00; background: #ffeab1; }
        .btn-delete:hover { color: #b92e43; background: #ffdfe3; }

        .empty-state {
            padding: 55px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 75px;
            height: 75px;
            margin: 0 auto 18px;
            display: grid;
            place-items: center;
            color: #8069f5;
            background: #f1eeff;
            border-radius: 23px;
            font-size: 30px;
        }

        .empty-state h3 {
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #9396ad;
            font-size: 11px;
            margin-bottom: 20px;
        }

        .no-results {
            display: none;
            padding: 30px;
            text-align: center;
            color: #9295ad;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            padding: 20px 2px 0;
            color: #a0a2b7;
            font-size: 10px;
        }

        .footer strong { color: #777a98; }

        .alert {
            border: 0;
            border-radius: 13px;
            font-size: 12px;
            padding: 15px 18px;
            margin-bottom: 20px;
        }

        @keyframes rise {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(5deg); }
            50% { transform: translateY(-7px) rotate(2deg); }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }

        @media (max-width: 1200px) {
            .sidebar { width: 220px; }
            .main { margin-left: 220px; }
            .content { padding: 27px 24px 35px; }
            .topbar { padding: 14px 24px; }
            .stats-grid { gap: 12px; }
            .stat-card { padding: 17px; }
        }

        @media (max-width: 850px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 16px;
            }

            .brand { margin-bottom: 17px; }

            .sidebar nav {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }

            .nav-caption, .sidebar-bottom { display: none; }

            .sidebar-link {
                padding: 10px 12px;
                margin: 0;
            }

            .main { margin-left: 0; }
            .topbar { min-height: 65px; padding: 12px 20px; }
            .content { padding: 22px 18px 30px; }
            .hero { padding: 25px; }
            .hero-art { width: 85px; height: 85px; font-size: 37px; border-radius: 22px; }
            .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 520px) {
            .topbar { padding: 12px 15px; }
            .breadcrumb-text { font-size: 10px; }
            .profile-name { font-size: 10px; }
            .hero { padding: 23px 20px; border-radius: 19px; }
            .hero h1 { font-size: 22px; }
            .hero p { font-size: 11px; }
            .hero-art { width: 58px; height: 58px; font-size: 26px; border-radius: 17px; }
            .stats-grid { gap: 10px; }
            .stat-card { padding: 14px; min-height: 130px; }
            .stat-icon { width: 36px; height: 36px; font-size: 14px; }
            .stat-value { font-size: 25px; }
            .stat-chip { display: none; }
            .panel-heading, .toolbar { padding: 17px; }
            .panel-heading { align-items: flex-start; }
            .btn-add { padding: 11px 12px; }
            .search-box { width: 100%; }
            .toolbar { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>

<body>

@php
    $activeEvents = $events->filter(function ($event) {
        return $event->status;
    })->count();

    $inactiveEvents = $events->count() - $activeEvents;
@endphp

<aside class="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="brand text-white">
        <div class="brand-icon">
            <i class="fa-solid fa-ticket"></i>
        </div>
        <div class="brand-name">TICKET<span>IFY</span></div>
    </a>

    <div class="nav-caption">MENU UTAMA</div>

    <nav>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
            <i class="fa-solid fa-grid-2"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.events.index') }}" class="sidebar-link active">
            <i class="fa-solid fa-calendar-days"></i>
            <span>Kelola Event</span>
        </a>

        <a href="{{ route('admin.ticket-types.index') }}" class="sidebar-link">
            <i class="fa-solid fa-ticket"></i>
            <span>Jenis Tiket</span>
        </a>

        <a href="{{ route('admin.tickets.index') }}" class="sidebar-link">
            <i class="fa-solid fa-receipt"></i>
            <span>Tiket Terjual</span>
        </a>

        <a href="{{ route('admin.orders.index') }}" class="sidebar-link">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Pesanan</span>
        </a>

        <div class="nav-caption">LAINNYA</div>

        <a href="{{ route('home') }}" class="sidebar-link">
            <i class="fa-solid fa-globe"></i>
            <span>Lihat Website</span>
            <i class="fa-solid fa-arrow-up-right-from-square ms-auto" style="font-size:10px"></i>
        </a>
    </nav>

    <div class="sidebar-bottom">
        <div class="mini-icon">
            <i class="fa-solid fa-wand-magic-sparkles"></i>
        </div>
        <strong>Event yang berkesan.</strong>
        <p>Kelola semua event dan ciptakan pengalaman terbaik bersama Ticketify.</p>
    </div>
</aside>

<main class="main">

    <header class="topbar">
        <div class="breadcrumb-text">
            Workspace &nbsp; / &nbsp; <strong>Kelola Event</strong>
        </div>

        <div class="admin-profile">
            <div class="profile-avatar">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <div>
                <div class="profile-name">Administrator</div>
                <div class="profile-role">Event Management</div>
            </div>
        </div>
    </header>

    <div class="content">

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fa-solid fa-circle-exclamation me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Data belum berhasil diproses.</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="hero">
            <div class="hero-content">
                <div class="hero-eyebrow">
                    <i class="fa-solid fa-sparkles"></i>
                    TICKETIFY EVENT STUDIO
                </div>

                <h1>Kelola Event dengan<br>Lebih Mudah ✨</h1>

                <p>
                    Atur event, pantau status, dan kelola tiket dari satu tempat.
                    Saatnya membuat pengalaman event yang luar biasa!
                </p>
            </div>

            <div class="hero-art">
                <i class="fa-solid fa-ticket"></i>
            </div>
        </section>

        <div class="section-heading">
            <div>
                <h2>Ringkasan Event</h2>
                <p>Informasi event yang tersimpan di Ticketify.</p>
            </div>

            <span class="live-tag">
                <i class="fa-solid fa-circle me-1" style="font-size:6px"></i>
                DATA TERKINI
            </span>
        </div>

        <section class="stats-grid">

            <div class="stat-card" style="animation-delay:.05s">
                <div class="stat-top">
                    <div class="stat-icon purple">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <span class="stat-chip">Semua event</span>
                </div>
                <div class="stat-label">Total Event</div>
                <div class="stat-value">{{ $events->count() }}</div>
            </div>

            <div class="stat-card" style="animation-delay:.12s">
                <div class="stat-top">
                    <div class="stat-icon green">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <span class="stat-chip">Siap ditampilkan</span>
                </div>
                <div class="stat-label">Event Aktif</div>
                <div class="stat-value">{{ $activeEvents }}</div>
            </div>

            <div class="stat-card" style="animation-delay:.19s">
                <div class="stat-top">
                    <div class="stat-icon pink">
                        <i class="fa-solid fa-calendar-xmark"></i>
                    </div>
                    <span class="stat-chip">Tidak ditampilkan</span>
                </div>
                <div class="stat-label">Event Nonaktif</div>
                <div class="stat-value">{{ $inactiveEvents }}</div>
            </div>

        </section>

        <section class="events-panel">

            <div class="panel-heading">
                <div>
                    <h2>
                        <i class="fa-solid fa-layer-group me-2" style="color:#795cf6"></i>
                        Daftar Event
                    </h2>
                    <p>Kelola informasi dan tiket dari setiap event kamu.</p>
                </div>

                <a href="{{ route('admin.events.create') }}" class="btn-add">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Event Baru
                </a>
            </div>

            @if($events->count() > 0)

                <div class="toolbar">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input
                            type="search"
                            id="eventSearch"
                            placeholder="Cari nama event, kategori, atau lokasi..."
                            aria-label="Cari event"
                        >
                    </div>

                    <div class="result-count">
                        Menampilkan <strong id="visibleCount">{{ $events->count() }}</strong>
                        dari {{ $events->count() }} event
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="event-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Informasi Event</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Tanggal Event</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody id="eventTableBody">
                            @foreach($events as $event)
                                <tr class="event-row">
                                    <td>
                                        <div class="number-badge">{{ $loop->iteration }}</div>
                                    </td>

                                    <td>
                                        <div class="event-name">{{ $event->title }}</div>
                                        <span class="event-slug">{{ $event->slug }}</span>
                                    </td>

                                    <td>
                                        <span class="category-pill">
                                            {{ $event->category ?: 'Umum' }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="location-cell">
                                            <i class="fa-solid fa-location-dot"></i>
                                            {{ $event->location }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="date-cell">
                                            <i class="fa-regular fa-calendar"></i>
                                            @if($event->event_date)
                                                {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                                            @else
                                                Belum ditentukan
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        @if($event->status)
                                            <span class="status-pill status-active">Aktif</span>
                                        @else
                                            <span class="status-pill status-inactive">Nonaktif</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="action-buttons">

                                            <a
                                                href="{{ route('admin.ticket-types.create', ['event_id' => $event->id]) }}"
                                                class="action-btn btn-manage"
                                                title="Kelola jenis tiket"
                                            >
                                                <i class="fa-solid fa-ticket"></i>
                                                Kelola Tiket
                                            </a>

                                            <a
                                                href="{{ route('admin.events.edit', $event) }}"
                                                class="action-btn btn-edit"
                                                title="Edit event"
                                            >
                                                <i class="fa-solid fa-pen"></i>
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('admin.events.destroy', $event) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus event ini?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn btn-delete"
                                                    title="Hapus event"
                                                >
                                                    <i class="fa-solid fa-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="no-results" id="noResults">
                    <i class="fa-solid fa-magnifying-glass mb-2" style="font-size:23px"></i>
                    <div>Tidak ada event yang cocok dengan pencarianmu.</div>
                </div>

            @else

                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fa-solid fa-ticket"></i>
                    </div>

                    <h3>Belum Ada Event</h3>
                    <p>Mulai perjalananmu dengan membuat event pertama di Ticketify.</p>

                    <a href="{{ route('admin.events.create') }}" class="btn-add">
                        <i class="fa-solid fa-plus"></i>
                        Buat Event Pertama
                    </a>
                </div>

            @endif

        </section>

        <footer class="footer">
            <span>© {{ date('Y') }} <strong>TICKETIFY</strong>. Event made extraordinary.</span>
            <span>
                <i class="fa-solid fa-heart me-1" style="color:#ed70a9"></i>
                Made for unforgettable moments
            </span>
        </footer>

    </div>
</main>

<script>
    const eventSearch = document.getElementById('eventSearch');

    if (eventSearch) {
        eventSearch.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('.event-row');
            const visibleCount = document.getElementById('visibleCount');
            const noResults = document.getElementById('noResults');

            let visible = 0;

            rows.forEach(function (row) {
                const matches = row.textContent.toLowerCase().includes(keyword);

                row.style.display = matches ? '' : 'none';

                if (matches) visible++;
            });

            visibleCount.textContent = visible;
            noResults.style.display = visible === 0 ? 'block' : 'none';
        });
    }
</script>

</body>
</html>
