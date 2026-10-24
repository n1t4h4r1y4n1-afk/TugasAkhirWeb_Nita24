<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Jenis Tiket | Ticketify</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --purple: #7048f8;
            --purple-dark: #5835dc;
            --sidebar: #17162f;
            --sidebar-light: #242047;
            --text: #20213a;
            --muted: #8588a5;
            --background: #f5f6ff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--background);
            color: var(--text);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 280px;
            padding: 30px 20px;
            color: white;
            background:
                radial-gradient(ellipse at top left, #34256d 0%, transparent 48%),
                linear-gradient(155deg, #201d49, #141429 75%);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 10px 0 40px rgba(28, 22, 73, .10);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 3px 13px 42px;
            color: white;
            font-size: 25px;
            font-weight: 850;
            letter-spacing: -.8px;
        }

        .brand-icon {
            width: 49px;
            height: 49px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #a18aff, #6843f6);
            box-shadow: 0 8px 25px rgba(112, 72, 248, .4);
            animation: floatIcon 4s ease-in-out infinite;
        }

        .brand-icon i {
            font-size: 22px;
        }

        .brand span {
            color: #a897ff;
        }

        .nav-heading {
            padding: 0 16px;
            margin: 0 0 13px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #8583aa;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .sidebar-menu a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 15px;
            min-height: 50px;
            padding: 13px 17px;
            color: #b9b8d2;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 650;
            transition: .3s ease;
        }

        .sidebar-menu a i {
            width: 19px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-menu a:hover {
            color: white;
            background: rgba(255, 255, 255, .08);
            transform: translateX(4px);
        }

        .sidebar-menu a.active {
            color: white;
            background: linear-gradient(110deg, #825cf9, #6039e9);
            box-shadow: 0 9px 25px rgba(101, 62, 232, .28);
        }

        .sidebar-menu a.active::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, .18);
            pointer-events: none;
        }

        .sidebar-divider {
            height: 1px;
            background: rgba(255, 255, 255, .12);
            margin: 23px 5px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 28px;
        }

        .promo-card {
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, .10);
            background: linear-gradient(145deg, rgba(255,255,255,.09), rgba(255,255,255,.025));
            border-radius: 20px;
        }

        .promo-card .promo-icon {
            color: #b6a3ff;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .promo-card h4 {
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .promo-card p {
            color: #a6a4c3;
            font-size: 11px;
            line-height: 1.8;
            margin: 0;
        }

        .sidebar-footer {
            color: #8583aa;
            text-align: center;
            font-size: 10px;
            margin-top: 20px;
        }

        /* MAIN CONTENT */

        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            padding: 32px 42px 55px;
            position: relative;
            overflow: hidden;
        }

        .main-content::before {
            content: "";
            position: absolute;
            width: 370px;
            height: 370px;
            top: -170px;
            right: -100px;
            background: radial-gradient(circle, rgba(144, 113, 255, .18), transparent 70%);
            pointer-events: none;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 36px;
            position: relative;
            z-index: 1;
        }

        .breadcrumb-text {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 8px;
        }

        .breadcrumb-text span {
            color: var(--purple);
            font-weight: 750;
        }

        .topbar h2 {
            font-size: 23px;
            font-weight: 850;
            letter-spacing: -.5px;
            margin: 0;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 9px 15px 9px 9px;
            border: 1px solid #e9e7f7;
            background: rgba(255,255,255,.85);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(30, 25, 75, .04);
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            color: white;
            font-weight: 800;
            background: linear-gradient(135deg, #a78bfa, #6345ec);
        }

        .profile-name {
            font-size: 12px;
            font-weight: 800;
        }

        .profile-role {
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        /* PAGE INTRO */

        .page-intro {
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 22px;
            padding: 30px 34px;
            margin-bottom: 27px;
            border-radius: 24px;
            color: white;
            background: linear-gradient(115deg, #6c49ed 0%, #8062f8 52%, #a28aff 100%);
            box-shadow: 0 18px 45px rgba(106, 74, 233, .20);
            animation: slideUp .65s ease both;
        }

        .page-intro::before,
        .page-intro::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.18);
            pointer-events: none;
        }

        .page-intro::before {
            width: 260px;
            height: 260px;
            right: 35px;
            top: -160px;
        }

        .page-intro::after {
            width: 190px;
            height: 190px;
            right: -50px;
            bottom: -125px;
            background: rgba(255,255,255,.06);
        }

        .intro-content {
            position: relative;
            z-index: 1;
        }

        .intro-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            margin-bottom: 14px;
            background: rgba(255,255,255,.16);
            border: 1px solid rgba(255,255,255,.17);
            border-radius: 30px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .page-intro h1 {
            font-size: clamp(25px, 3vw, 34px);
            font-weight: 900;
            letter-spacing: -.9px;
            margin-bottom: 10px;
        }

        .page-intro p {
            color: #f0ebff;
            font-size: 13px;
            line-height: 1.8;
            max-width: 520px;
            margin: 0;
        }

        .intro-art {
            position: relative;
            z-index: 1;
            width: 105px;
            height: 105px;
            min-width: 105px;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg, rgba(255,255,255,.3), rgba(255,255,255,.08));
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 29px;
            box-shadow: 0 15px 35px rgba(44, 22, 125, .17);
            transform: rotate(7deg);
            animation: floatIcon 4s ease-in-out infinite;
        }

        .intro-art i {
            font-size: 45px;
            filter: drop-shadow(0 7px 7px rgba(42, 20, 112, .25));
        }

        /* FORM LAYOUT */

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.65fr) minmax(235px, .8fr);
            gap: 25px;
            align-items: start;
            position: relative;
            z-index: 1;
        }

        .form-card,
        .preview-card,
        .info-card {
            background: white;
            border: 1px solid #ecebfa;
            border-radius: 22px;
            box-shadow: 0 12px 35px rgba(43, 37, 93, .055);
        }

        .form-card {
            padding: 30px;
            animation: slideUp .75s ease both;
        }

        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding-bottom: 22px;
            margin-bottom: 25px;
            border-bottom: 1px solid #efedf8;
        }

        .section-icon {
            width: 45px;
            height: 45px;
            min-width: 45px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: #714cf4;
            background: #f0ebff;
            font-size: 18px;
        }

        .section-heading h3 {
            font-size: 17px;
            font-weight: 850;
            margin: 2px 0 6px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
            margin: 0;
            line-height: 1.6;
        }

        .form-label {
            color: #343451;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .required {
            color: #f05278;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap > i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9a91c1;
            font-size: 14px;
            pointer-events: none;
        }

        .form-control,
        .form-select {
            min-height: 51px;
            border: 1px solid #e5e4f1;
            border-radius: 13px;
            padding: 13px 15px 13px 43px;
            font-size: 13px;
            color: #282743;
            background-color: #fcfbff;
            transition: .25s ease;
        }

        .form-select {
            cursor: pointer;
        }

        .form-control::placeholder {
            color: #b0aec3;
        }

        .form-control:hover,
        .form-select:hover {
            border-color: #c9baff;
            background-color: white;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8666f8;
            background-color: white;
            box-shadow: 0 0 0 4px rgba(112, 72, 248, .10);
        }

        .field-help {
            color: #9694ad;
            font-size: 11px;
            margin-top: 8px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 23px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 17px;
        }

        .form-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding-top: 8px;
        }

        .btn-custom {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            min-height: 47px;
            padding: 12px 21px;
            border: none;
            border-radius: 13px;
            font-size: 12px;
            font-weight: 800;
            transition: .25s ease;
        }

        .btn-save {
            color: white;
            background: linear-gradient(110deg, #8059f7, #5d3be6);
            box-shadow: 0 8px 18px rgba(103, 66, 231, .22);
        }

        .btn-save:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 13px 25px rgba(103, 66, 231, .30);
        }

        .btn-cancel {
            color: #666783;
            background: #f0eff7;
        }

        .btn-cancel:hover {
            color: #3d355e;
            background: #e5e1f4;
            transform: translateY(-2px);
        }

        /* RIGHT PANEL */

        .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
            animation: slideUp .9s ease both;
        }

        .preview-card {
            padding: 23px;
            overflow: hidden;
            position: relative;
        }

        .mini-heading {
            color: #777693;
            font-size: 10px;
            font-weight: 850;
            letter-spacing: 1.5px;
            margin-bottom: 18px;
        }

        .ticket-preview {
            position: relative;
            overflow: hidden;
            padding: 23px 19px;
            border-radius: 19px;
            color: white;
            background: linear-gradient(145deg, #322265, #6c45e9 65%, #9a7cff);
            box-shadow: 0 12px 25px rgba(89, 55, 194, .20);
            transition: .3s ease;
        }

        .ticket-preview:hover {
            transform: perspective(800px) rotateY(-4deg) rotateX(3deg) translateY(-4px);
        }

        .ticket-preview::before {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            right: -90px;
            top: -85px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.25);
            box-shadow: 0 0 0 17px rgba(255,255,255,.04),
                        0 0 0 34px rgba(255,255,255,.03);
        }

        .ticket-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 28px;
            position: relative;
        }

        .ticket-brand {
            font-size: 12px;
            font-weight: 900;
        }

        .ticket-brand i {
            margin-right: 5px;
        }

        .ticket-type {
            padding: 5px 9px;
            border-radius: 7px;
            background: rgba(255,255,255,.17);
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            max-width: 110px;
            overflow-wrap: anywhere;
        }

        .ticket-label {
            font-size: 9px;
            color: #d9d0ff;
            letter-spacing: 1.5px;
            font-weight: 800;
            margin-bottom: 8px;
            position: relative;
        }

        .ticket-name {
            font-size: 20px;
            font-weight: 900;
            overflow-wrap: anywhere;
            margin-bottom: 21px;
            position: relative;
        }

        .ticket-price {
            font-size: 25px;
            font-weight: 900;
            position: relative;
            overflow-wrap: anywhere;
        }

        .ticket-divider {
            margin: 18px 0 15px;
            border-top: 1px dashed rgba(255,255,255,.45);
            position: relative;
        }

        .ticket-bottom {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: #e3ddff;
            font-size: 10px;
            position: relative;
        }

        .preview-note {
            margin: 15px 0 0;
            color: #9694ad;
            font-size: 10px;
            line-height: 1.8;
        }

        .info-card {
            padding: 23px;
        }

        .info-title {
            font-size: 13px;
            font-weight: 850;
            margin-bottom: 18px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 18px;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 34px;
            height: 34px;
            min-width: 34px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            background: #f1edff;
            color: #7655ee;
            font-size: 13px;
        }

        .info-item h4 {
            font-size: 11px;
            font-weight: 850;
            margin: 2px 0 5px;
        }

        .info-item p {
            color: #9290aa;
            font-size: 10px;
            line-height: 1.7;
            margin: 0;
        }

        /* ALERT */

        .alert {
            border-radius: 13px;
            font-size: 12px;
        }

        .alert ul {
            padding-left: 20px;
        }

        /* ANIMATION */

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floatIcon {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-7px) rotate(3deg);
            }
        }

        /* RESPONSIVE */

        @media (max-width: 1150px) {
            .sidebar {
                width: 245px;
            }

            .main-content {
                margin-left: 245px;
                padding: 28px 25px 45px;
            }

            .content-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .right-column {
                display: grid;
                grid-template-columns: 1fr 1fr;
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
                padding: 0 5px 20px;
            }

            .sidebar-bottom,
            .sidebar-divider,
            .nav-heading {
                display: none;
            }

            .sidebar-menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .sidebar-menu a {
                padding: 12px;
                font-size: 11px;
                gap: 9px;
            }

            .main-content {
                margin-left: 0;
                padding: 22px 16px 35px;
            }

            .topbar {
                margin-bottom: 22px;
            }

            .topbar h2 {
                font-size: 19px;
            }

            .admin-profile {
                padding: 6px;
            }

            .profile-info {
                display: none;
            }

            .page-intro {
                padding: 24px 21px;
                border-radius: 19px;
            }

            .intro-art {
                width: 65px;
                height: 65px;
                min-width: 65px;
                border-radius: 19px;
            }

            .intro-art i {
                font-size: 29px;
            }

            .page-intro p {
                font-size: 12px;
            }

            .form-card {
                padding: 22px 18px;
            }

            .right-column {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 430px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .intro-art {
                display: none;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-custom {
                width: 100%;
            }

            .sidebar-menu {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <a href="{{ route('admin.dashboard') }}" class="brand">
            <span class="brand-icon">
                <i class="fa-solid fa-ticket"></i>
            </span>

            <span style="color:white">Ticket<span>ify</span></span>
        </a>

        <div class="nav-heading">MENU UTAMA</div>

        <nav class="sidebar-menu">

            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-border-all"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.events.index') }}">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Kelola Event</span>
            </a>

            <a href="{{ route('admin.ticket-types.index') }}" class="active">
                <i class="fa-solid fa-ticket"></i>
                <span>Jenis Tiket</span>
            </a>

            <a href="{{ route('admin.tickets.index') }}">
                <i class="fa-solid fa-receipt"></i>
                <span>Tiket Terjual</span>
            </a>

            <a href="{{ route('admin.orders.index') }}">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Pesanan</span>
            </a>

        </nav>

        <div class="sidebar-divider"></div>

        <div class="nav-heading">LAINNYA</div>

        <nav class="sidebar-menu">
            <a href="{{ route('home') }}" target="_blank">
                <i class="fa-solid fa-globe"></i>
                <span>Lihat Website</span>
                <i class="fa-solid fa-arrow-up-right-from-square"
                   style="font-size:10px;margin-left:auto"></i>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="promo-card">
                <div class="promo-icon">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </div>

                <h4>Ticket Management</h4>

                <p>
                    Atur harga, stok, dan ketersediaan tiket event dengan mudah.
                </p>
            </div>

            <div class="sidebar-footer">
                © {{ date('Y') }} Ticketify · Admin Panel
            </div>
        </div>

    </aside>


    {{-- MAIN CONTENT --}}
    <main class="main-content">

        {{-- TOPBAR --}}
        <header class="topbar">

            <div>
                <div class="breadcrumb-text">
                    Admin / Jenis Tiket / <span>Tambah Tiket</span>
                </div>

                <h2>Ticket Management</h2>
            </div>

            <div class="admin-profile">
                <div class="avatar">
                    <i class="fa-solid fa-user-shield"></i>
                </div>

                <div class="profile-info">
                    <div class="profile-name">
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </div>

                    <div class="profile-role">
                        <i class="fa-solid fa-circle-check"
                           style="color:#22c55e"></i>
                        Administrator
                    </div>
                </div>
            </div>

        </header>


        {{-- INTRO --}}
        <section class="page-intro">

            <div class="intro-content">

                <div class="intro-tag">
                    <i class="fa-solid fa-sparkles"></i>
                    TICKET MANAGEMENT
                </div>

                <h1>Tambah Jenis Tiket 🎟️</h1>

                <p>
                    Buat pilihan tiket baru untuk event kamu.
                    Atur kategori, harga, dan stok dengan mudah
                    dalam satu tempat.
                </p>

            </div>

            <div class="intro-art">
                <i class="fa-solid fa-ticket"></i>
            </div>

        </section>


        {{-- PESAN ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <strong>
                    <i class="fa-solid fa-circle-exclamation me-2"></i>
                    Periksa kembali data yang kamu masukkan.
                </strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- PESAN ERROR SESSION --}}
        @if (session('error'))
            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>
        @endif


        {{-- FORM DAN PREVIEW --}}
        <div class="content-grid">

            <section class="form-card">

                <div class="section-heading">
                    <div class="section-icon">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>

                    <div>
                        <h3>Informasi Jenis Tiket</h3>
                        <p>
                            Lengkapi informasi berikut untuk membuat jenis tiket baru.
                        </p>
                    </div>
                </div>


                <form
                    action="{{ route('admin.ticket-types.store') }}"
                    method="POST"
                    id="ticketForm"
                >
                    @csrf

                    {{-- EVENT --}}
                    <div class="form-group">

                        <label for="event_id" class="form-label">
                            Pilih Event <span class="required">*</span>
                        </label>

                        <div class="input-wrap">
                            <i class="fa-solid fa-calendar-star"></i>

                            <select
                                name="event_id"
                                id="event_id"
                                class="form-select @error('event_id') is-invalid @enderror"
                                required
                            >
                                <option value="">-- Pilih Event --</option>

                                @foreach ($events as $event)
                                    <option
                                        value="{{ $event->id }}"
                                        {{ (string) old('event_id', request('event_id', $selectedEventId ?? '')) === (string) $event->id ? 'selected' : '' }}
                                    >
                                        {{ $event->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('event_id')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror

                        <div class="field-help">
                            <i class="fa-solid fa-circle-info me-1"></i>
                            Pilih event yang akan memiliki jenis tiket ini.
                        </div>
                    </div>


                    {{-- NAMA TIKET --}}
                    <div class="form-group">

                        <label for="name" class="form-label">
                            Nama Jenis Tiket <span class="required">*</span>
                        </label>

                        <div class="input-wrap">
                            <i class="fa-solid fa-tag"></i>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Contoh: VIP, Regular, Early Bird"
                                value="{{ old('name') }}"
                                maxlength="255"
                                required
                            >
                        </div>

                        @error('name')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror

                        <div class="field-help">
                            Nama kategori akan ditampilkan kepada pengguna saat membeli tiket.
                        </div>
                    </div>


                    {{-- HARGA DAN STOK --}}
                    <div class="form-row">

                        <div class="form-group">

                            <label for="price" class="form-label">
                                Harga Tiket <span class="required">*</span>
                            </label>

                            <div class="input-wrap">
                                <i class="fa-solid fa-wallet"></i>

                                <input
                                    type="number"
                                    name="price"
                                    id="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    placeholder="150000"
                                    value="{{ old('price') }}"
                                    min="0"
                                    step="0.01"
                                    required
                                >
                            </div>

                            @error('price')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror

                            <div class="field-help">
                                Masukkan nominal tanpa simbol Rp.
                            </div>

                        </div>


                        <div class="form-group">

                            <label for="stock" class="form-label">
                                Jumlah Stok <span class="required">*</span>
                            </label>

                            <div class="input-wrap">
                                <i class="fa-solid fa-boxes-stacked"></i>

                                <input
                                    type="number"
                                    name="stock"
                                    id="stock"
                                    class="form-control @error('stock') is-invalid @enderror"
                                    placeholder="100"
                                    value="{{ old('stock') }}"
                                    min="1"
                                    step="1"
                                    required
                                >
                            </div>

                            @error('stock')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror

                            <div class="field-help">
                                Jumlah tiket yang tersedia untuk dijual.
                            </div>

                        </div>

                    </div>


                    {{-- BUTTON --}}
                    <div class="form-actions">

                        <a
                            href="{{ route('admin.ticket-types.index') }}"
                            class="btn-custom btn-cancel"
                        >
                            <i class="fa-solid fa-arrow-left"></i>
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="btn-custom btn-save"
                            id="saveButton"
                        >
                            <i class="fa-solid fa-floppy-disk"></i>
                            Simpan Jenis Tiket
                        </button>

                    </div>

                </form>

            </section>


            {{-- KOLOM KANAN --}}
            <aside class="right-column">

                {{-- LIVE PREVIEW --}}
                <section class="preview-card">

                    <div class="mini-heading">
                        <i class="fa-solid fa-wand-magic-sparkles me-2"></i>
                        LIVE TICKET PREVIEW
                    </div>

                    <div class="ticket-preview">

                        <div class="ticket-top">
                            <div class="ticket-brand">
                                <i class="fa-solid fa-ticket"></i>
                                Ticketify
                            </div>

                            <div class="ticket-type" id="previewType">
                                GENERAL
                            </div>
                        </div>

                        <div class="ticket-label">NAMA TIKET</div>

                        <div class="ticket-name" id="previewName">
                            Nama Tiket
                        </div>

                        <div class="ticket-label">HARGA TIKET</div>

                        <div class="ticket-price" id="previewPrice">
                            Rp 0
                        </div>

                        <div class="ticket-divider"></div>

                        <div class="ticket-bottom">
                            <span>
                                <i class="fa-solid fa-box me-1"></i>
                                Stok
                            </span>

                            <strong id="previewStock">0 tiket</strong>
                        </div>

                    </div>

                    <p class="preview-note">
                        <i class="fa-solid fa-circle-info me-1"></i>
                        Pratinjau ini berubah otomatis ketika kamu mengisi formulir.
                    </p>

                </section>


                {{-- TIPS --}}
                <section class="info-card">

                    <div class="info-title">
                        <i class="fa-solid fa-lightbulb me-2"
                           style="color:#f6ad35"></i>
                        Tips Mengelola Tiket
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-tags"></i>
                        </div>

                        <div>
                            <h4>Gunakan Nama yang Jelas</h4>
                            <p>
                                Contohnya Regular, VIP, VVIP, atau Early Bird.
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-coins"></i>
                        </div>

                        <div>
                            <h4>Tentukan Harga dengan Tepat</h4>
                            <p>
                                Periksa nominal sebelum menyimpan data tiket.
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-box-open"></i>
                        </div>

                        <div>
                            <h4>Perhatikan Jumlah Stok</h4>
                            <p>
                                Pastikan stok sesuai kapasitas tiket yang ingin dijual.
                            </p>
                        </div>
                    </div>

                </section>

            </aside>

        </div>

    </main>


    {{-- LIVE PREVIEW SCRIPT --}}
    <script>
        const nameInput = document.getElementById('name');
        const priceInput = document.getElementById('price');
        const stockInput = document.getElementById('stock');

        const previewName = document.getElementById('previewName');
        const previewPrice = document.getElementById('previewPrice');
        const previewStock = document.getElementById('previewStock');
        const previewType = document.getElementById('previewType');

        function updatePreview() {
            const ticketName = nameInput.value.trim();

            previewName.textContent = ticketName || 'Nama Tiket';
            previewType.textContent = ticketName || 'GENERAL';

            const price = Number(priceInput.value);

            previewPrice.textContent =
                'Rp ' + (priceInput.value !== '' && Number.isFinite(price)
                    ? new Intl.NumberFormat('id-ID', {
                        maximumFractionDigits: 2
                    }).format(price)
                    : '0');

            previewStock.textContent =
                (stockInput.value || '0') + ' tiket';
        }

        [nameInput, priceInput, stockInput].forEach(input => {
            input.addEventListener('input', updatePreview);
        });

        updatePreview();

        document.getElementById('ticketForm').addEventListener('submit', function () {
            const button = document.getElementById('saveButton');

            if (this.checkValidity()) {
                button.innerHTML =
                    '<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...';

                button.style.opacity = '0.8';
                button.style.pointerEvents = 'none';
            }
        });
    </script>

</body>
</html>
