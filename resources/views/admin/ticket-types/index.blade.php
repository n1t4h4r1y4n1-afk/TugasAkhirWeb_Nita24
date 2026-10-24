<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Jenis Tiket | Ticketify Admin</title>

    {{-- BOOTSTRAP --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- FONT AWESOME --}}
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet"
    >

    {{-- GOOGLE FONT --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        :root {

            --purple: #7357f5;
            --purple-dark: #5840db;

            --pink: #ec5c9d;
            --blue: #4d8df7;
            --green: #20ad83;
            --red: #e85a6c;

            --dark: #17182f;

            --background: #f5f6fc;

            --text: #292a48;
            --muted: #898ca6;

            --border: #ececf5;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family:
                'Plus Jakarta Sans',
                Arial,
                Helvetica,
                sans-serif;

            background: var(--background);

            color: var(--text);

            overflow-x: hidden;
        }


        a {
            text-decoration: none;
        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: 255px;
            height: 100vh;

            padding: 28px 18px;

            color: white;

            overflow-y: auto;

            z-index: 1000;

            background:

                radial-gradient(
                    circle at 10% 0%,
                    rgba(121, 92, 246, .30),
                    transparent 35%
                ),

                linear-gradient(
                    180deg,
                    #191a37 0%,
                    #111326 100%
                );

            border-right:
                1px solid rgba(255,255,255,.06);
        }


        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            padding:
                0 12px;

            margin-bottom: 42px;

            color: white;
        }


        .brand-icon {

            width: 43px;
            height: 43px;

            display: grid;

            place-items: center;

            border-radius: 14px;

            font-size: 19px;

            background:
                linear-gradient(
                    135deg,
                    #a48fff,
                    #6044e8
                );

            box-shadow:
                0 8px 25px
                rgba(112,87,245,.35);

            animation:
                floatingIcon 4s ease-in-out infinite;
        }


        .brand-name {

            font-size: 22px;

            font-weight: 800;

            letter-spacing: -1px;
        }


        .brand-name span {

            color: #a99aff;
        }


        .nav-title {

            padding:
                0 14px;

            margin:
                25px 0 12px;

            color: #777b9e;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1.8px;
        }


        .sidebar-link {

            display: flex;

            align-items: center;

            gap: 13px;

            padding:
                13px 15px;

            margin-bottom: 7px;

            border-radius: 12px;

            color: #b9bad2;

            font-size: 12px;

            font-weight: 600;

            transition:
                .25s ease;
        }


        .sidebar-link i {

            width: 19px;

            text-align: center;

            font-size: 15px;
        }


        .sidebar-link:hover {

            color: white;

            background:
                rgba(255,255,255,.07);

            transform:
                translateX(4px);
        }


        .sidebar-link.active {

            color: white;

            background:
                linear-gradient(
                    105deg,
                    #785cf6,
                    #5940df
                );

            box-shadow:
                0 9px 25px
                rgba(96,70,230,.30);
        }


        .sidebar-info {

            margin-top: 45px;

            padding: 17px;

            border:
                1px solid
                rgba(255,255,255,.08);

            border-radius: 16px;

            background:
                rgba(255,255,255,.045);
        }


        .sidebar-info-icon {

            color: #b7a8ff;

            font-size: 20px;

            margin-bottom: 12px;
        }


        .sidebar-info strong {

            display: block;

            font-size: 12px;

            margin-bottom: 5px;
        }


        .sidebar-info p {

            color: #989ab6;

            font-size: 10px;

            line-height: 1.7;

            margin: 0;
        }



        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            margin-left: 255px;

            min-height: 100vh;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            height: 76px;

            padding:
                0 38px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background:
                rgba(255,255,255,.92);

            border-bottom:
                1px solid
                #ebebf4;
        }


        .breadcrumb {

            color: #9699b0;

            font-size: 11px;

            margin: 0;
        }


        .breadcrumb strong {

            color: #353550;
        }


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

            border-radius: 13px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #ff82bd,
                    #8b65f6
                );

            box-shadow:
                0 6px 16px
                rgba(139,101,246,.22);
        }


        .profile-name {

            font-size: 11px;

            font-weight: 800;
        }


        .profile-role {

            margin-top: 3px;

            color: #9699b0;

            font-size: 10px;
        }



        /* =====================================================
           CONTENT
        ===================================================== */

        .content {

            max-width: 1650px;

            margin: auto;

            padding:
                32px 38px 45px;
        }



        /* =====================================================
           HERO
        ===================================================== */

        .hero {

            position: relative;

            overflow: hidden;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 25px;

            min-height: 205px;

            padding:
                34px 38px;

            margin-bottom: 27px;

            color: white;

            border-radius: 26px;

            background:

                radial-gradient(
                    circle at 90% 20%,
                    rgba(255,255,255,.18),
                    transparent 25%
                ),

                linear-gradient(
                    110deg,
                    #5d45df,
                    #795cf6 50%,
                    #a85fe9
                );

            box-shadow:
                0 18px 42px
                rgba(103,77,228,.22);

            animation:
                slideUp .65s ease both;
        }


        .hero::before {

            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            right: 180px;
            top: -185px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.09);
        }


        .hero::after {

            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            right: -65px;
            bottom: -150px;

            border:
                35px solid
                rgba(255,255,255,.08);

            border-radius: 50%;
        }


        .hero-content {

            position: relative;

            z-index: 3;
        }


        .hero-label {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding:
                7px 12px;

            margin-bottom: 14px;

            border-radius: 30px;

            background:
                rgba(255,255,255,.15);

            border:
                1px solid
                rgba(255,255,255,.12);

            font-size: 10px;

            font-weight: 800;

            letter-spacing: .5px;
        }


        .hero h1 {

            font-size:
                clamp(24px, 3vw, 34px);

            font-weight: 800;

            letter-spacing: -1px;

            line-height: 1.25;

            margin-bottom: 10px;
        }


        .hero p {

            max-width: 560px;

            color:
                rgba(255,255,255,.80);

            font-size: 12px;

            line-height: 1.8;

            margin: 0;
        }


        .hero-ticket {

            position: relative;

            z-index: 3;

            width: 120px;
            height: 120px;

            flex-shrink: 0;

            display: grid;

            place-items: center;

            border-radius: 30px;

            font-size: 52px;

            background:
                rgba(255,255,255,.14);

            border:
                1px solid
                rgba(255,255,255,.28);

            box-shadow:
                0 18px 40px
                rgba(48,26,145,.18);

            transform:
                rotate(5deg);

            animation:
                floatingTicket 4s ease-in-out infinite;
        }



        /* =====================================================
           SECTION TITLE
        ===================================================== */

        .section-title {

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            margin:
                30px 0 16px;
        }


        .section-title h2 {

            font-size: 15px;

            font-weight: 800;

            margin: 0 0 5px;
        }


        .section-title p {

            color: var(--muted);

            font-size: 11px;

            margin: 0;
        }


        .live-badge {

            padding:
                7px 11px;

            color: #249c72;

            background: #e5faf1;

            border-radius: 30px;

            font-size: 9px;

            font-weight: 800;
        }



        /* =====================================================
           STATISTICS
        ===================================================== */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(4, minmax(0,1fr));

            gap: 17px;
        }


        .stat-card {

            position: relative;

            overflow: hidden;

            min-height: 145px;

            padding: 21px;

            border-radius: 19px;

            background: white;

            border:
                1px solid
                var(--border);

            box-shadow:
                0 6px 22px
                rgba(32,34,75,.035);

            transition:
                transform .28s,
                box-shadow .28s;

            animation:
                slideUp .75s ease both;
        }


        .stat-card:hover {

            transform:
                translateY(-7px)
                scale(1.01);

            box-shadow:
                0 18px 38px
                rgba(47,43,100,.11);
        }


        .stat-card::after {

            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            right: -45px;
            bottom: -45px;

            border-radius: 50%;

            opacity: .65;
        }


        .stat-purple::after {
            background: #ece8ff;
        }

        .stat-blue::after {
            background: #e5f0ff;
        }

        .stat-pink::after {
            background: #ffe7f3;
        }

        .stat-green::after {
            background: #e0f9f0;
        }


        .stat-top {

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            margin-bottom: 18px;
        }


        .stat-icon {

            width: 43px;
            height: 43px;

            display: grid;

            place-items: center;

            border-radius: 14px;

            font-size: 17px;

            position: relative;

            z-index: 2;
        }


        .icon-purple {
            color: #7057f5;
            background: #f0edff;
        }

        .icon-blue {
            color: #4d8df7;
            background: #eaf2ff;
        }

        .icon-pink {
            color: #ed579b;
            background: #fff0f7;
        }

        .icon-green {
            color: #20a980;
            background: #e5faf3;
        }


        .stat-mini {

            padding:
                6px 8px;

            border-radius: 20px;

            color: #8c8faa;

            background: #f6f6fb;

            font-size: 9px;
        }


        .stat-title {

            color: #898ca6;

            font-size: 10px;

            font-weight: 600;

            margin-bottom: 6px;
        }


        .stat-number {

            font-size: 28px;

            line-height: 1.2;

            font-weight: 800;

            letter-spacing: -1px;
        }



        /* =====================================================
           MAIN TICKET PANEL
        ===================================================== */

        .ticket-panel {

            margin-top: 30px;

            overflow: hidden;

            border-radius: 22px;

            background: white;

            border:
                1px solid
                var(--border);

            box-shadow:
                0 8px 28px
                rgba(32,34,75,.045);

            animation:
                slideUp .85s ease both;
        }


        .panel-header {

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            gap: 20px;

            flex-wrap: wrap;

            padding:
                23px 25px 20px;

            border-bottom:
                1px solid
                #f0f0f7;
        }


        .panel-title h2 {

            font-size: 15px;

            font-weight: 800;

            margin:
                0 0 6px;
        }


        .panel-title p {

            color: var(--muted);

            font-size: 10px;

            margin: 0;
        }


        .btn-add {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding:
                12px 16px;

            color: white;

            border-radius: 11px;

            background:
                linear-gradient(
                    110deg,
                    #7057f5,
                    #8b65f6
                );

            box-shadow:
                0 7px 18px
                rgba(112,87,245,.24);

            font-size: 10px;

            font-weight: 800;

            transition: .25s;
        }


        .btn-add:hover {

            color: white;

            transform:
                translateY(-2px);

            box-shadow:
                0 12px 25px
                rgba(112,87,245,.32);
        }



        /* =====================================================
           SEARCH
        ===================================================== */

        .toolbar {

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            gap: 15px;

            padding:
                17px 25px;

            background:
                #fdfdff;

            border-bottom:
                1px solid
                #f0f0f7;
        }


        .search-wrapper {

            position: relative;

            width:
                min(100%, 360px);
        }


        .search-wrapper i {

            position: absolute;

            left: 14px;

            top: 50%;

            transform:
                translateY(-50%);

            color: #a0a2b8;
        }


        .search-input {

            width: 100%;

            height: 42px;

            padding:
                0 15px 0 40px;

            border:
                1px solid
                #e8e8f2;

            border-radius: 11px;

            outline: none;

            font-family: inherit;

            font-size: 10px;

            transition: .2s;
        }


        .search-input:focus {

            border-color:
                #9988fa;

            box-shadow:
                0 0 0 4px
                rgba(112,87,245,.08);
        }


        .count-text {

            color: #979ab1;

            font-size: 10px;
        }



        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {

            overflow-x: auto;
        }


        .ticket-table {

            width: 100%;

            min-width: 1050px;

            border-collapse:
                separate;

            border-spacing: 0;
        }


        .ticket-table thead th {

            padding:
                15px 17px;

            color: #898ca6;

            background: #fafaff;

            border-bottom:
                1px solid
                #eeeeF6;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: .8px;

            text-transform:
                uppercase;

            white-space: nowrap;
        }


        .ticket-table tbody td {

            padding:
                17px;

            color: #474962;

            border-bottom:
                1px solid
                #f0f0f7;

            font-size: 10px;

            vertical-align: middle;
        }


        .ticket-table tbody tr {

            transition:
                .2s;
        }


        .ticket-table tbody tr:hover {

            background:
                #faf9ff;

            transform:
                scale(1.002);
        }


        .ticket-table tbody tr:last-child td {

            border-bottom: 0;
        }


        .number {

            width: 30px;
            height: 30px;

            display: grid;

            place-items: center;

            color: #7057f5;

            background:
                #f0edff;

            border-radius: 9px;

            font-size: 9px;

            font-weight: 800;
        }


        /* EVENT */

        .event-name {

            min-width: 180px;

            max-width: 245px;

            color: #292a48;

            font-weight: 800;

            font-size: 10px;

            line-height: 1.6;
        }


        .event-icon {

            width: 35px;
            height: 35px;

            display: grid;

            place-items: center;

            flex-shrink: 0;

            color: #7057f5;

            background:
                #f0edff;

            border-radius: 10px;
        }


        /* TICKET NAME */

        .ticket-name {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding:
                7px 10px;

            color: #5140c6;

            background:
                #f0edff;

            border-radius: 9px;

            font-size: 9px;

            font-weight: 800;

            white-space: nowrap;
        }


        /* PRICE */

        .price {

            color: #2b2d4a;

            font-size: 11px;

            font-weight: 800;

            white-space: nowrap;
        }


        .price-small {

            color: #9a9cb2;

            font-size: 8px;

            margin-top: 3px;
        }


        /* INVENTORY */

        .inventory-number {

            font-weight: 800;

            color: #373952;
        }


        .sold-number {

            color: #ed579b;

            font-weight: 800;
        }


        .remaining-number {

            color: #20a980;

            font-weight: 800;
        }


        /* PROGRESS */

        .stock-area {

            min-width: 120px;
        }


        .stock-text {

            display: flex;

            justify-content:
                space-between;

            margin-bottom: 6px;

            font-size: 8px;

            color: #9295ad;
        }


        .progress {

            height: 6px;

            overflow: hidden;

            border-radius: 20px;

            background: #eeeeF6;
        }


        .progress-bar {

            border-radius: 20px;

            background:
                linear-gradient(
                    90deg,
                    #7057f5,
                    #9b70f7
                );
        }


        /* STATUS */

        .status {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding:
                7px 10px;

            border-radius: 30px;

            font-size: 8px;

            font-weight: 800;

            white-space: nowrap;
        }


        .status::before {

            content: "";

            width: 6px;
            height: 6px;

            border-radius: 50%;

            background:
                currentColor;
        }


        .available {

            color: #209b72;

            background:
                #e5faf1;
        }


        .soldout {

            color: #e05268;

            background:
                #fff0f1;
        }


        /* ACTION */

        .actions {

            display: flex;

            gap: 6px;
        }


        .action-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 5px;

            padding:
                8px 10px;

            border: none;

            border-radius: 8px;

            font-family: inherit;

            font-size: 8px;

            font-weight: 800;

            transition: .2s;

            white-space: nowrap;
        }


        .action-btn:hover {

            transform:
                translateY(-2px);
        }


        .edit-btn {

            color: #a87500;

            background:
                #fff3d1;
        }


        .edit-btn:hover {

            color: #8c5f00;

            background:
                #ffe9ad;
        }


        .delete-btn {

            color: #dd4e62;

            background:
                #fff0f2;
        }


        .delete-btn:hover {

            color: #b52d42;

            background:
                #ffdfe3;
        }



        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {

            padding:
                65px 20px;

            text-align: center;
        }


        .empty-icon {

            width: 80px;
            height: 80px;

            display: grid;

            place-items: center;

            margin:
                0 auto 18px;

            border-radius: 24px;

            color: #7057f5;

            background:
                #f0edff;

            font-size: 31px;
        }


        .empty h3 {

            font-size: 17px;

            font-weight: 800;

            margin-bottom: 8px;
        }


        .empty p {

            color: #9699b0;

            font-size: 11px;

            margin-bottom: 20px;
        }



        /* =====================================================
           ALERT
        ===================================================== */

        .alert {

            border: none;

            border-radius: 13px;

            padding:
                14px 17px;

            font-size: 11px;

            margin-bottom: 20px;
        }



        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {

            display: flex;

            justify-content:
                space-between;

            gap: 15px;

            flex-wrap: wrap;

            padding:
                20px 2px 0;

            color: #a0a2b7;

            font-size: 9px;
        }


        .footer strong {

            color: #777a98;
        }



        /* =====================================================
           ANIMATION
        ===================================================== */

        @keyframes slideUp {

            from {

                opacity: 0;

                transform:
                    translateY(18px);
            }

            to {

                opacity: 1;

                transform:
                    translateY(0);
            }
        }


        @keyframes floatingTicket {

            0%,
            100% {

                transform:
                    translateY(0)
                    rotate(5deg);
            }

            50% {

                transform:
                    translateY(-8px)
                    rotate(1deg);
            }
        }


        @keyframes floatingIcon {

            0%,
            100% {

                transform:
                    translateY(0);
            }

            50% {

                transform:
                    translateY(-4px);
            }
        }



        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width:1200px) {

            .sidebar {

                width: 220px;
            }

            .main {

                margin-left: 220px;
            }

            .content {

                padding:
                    28px 25px 35px;
            }

            .topbar {

                padding:
                    0 25px;
            }

            .stats {

                gap: 12px;
            }
        }


        @media(max-width:900px) {

            .sidebar {

                position: relative;

                width: 100%;

                height: auto;

                padding: 16px;
            }


            .brand {

                margin-bottom: 18px;
            }


            .nav-title,
            .sidebar-info {

                display: none;
            }


            .sidebar nav {

                display: flex;

                flex-wrap: wrap;

                gap: 5px;
            }


            .sidebar-link {

                margin: 0;

                padding:
                    10px 12px;
            }


            .main {

                margin-left: 0;
            }


            .topbar {

                height: 65px;
            }


            .stats {

                grid-template-columns:
                    repeat(2,1fr);
            }


            .hero-ticket {

                width: 90px;
                height: 90px;

                font-size: 40px;
            }
        }


        @media(max-width:600px) {

            .content {

                padding:
                    20px 15px 30px;
            }


            .topbar {

                padding:
                    0 15px;
            }


            .hero {

                padding:
                    25px 20px;

                border-radius: 20px;
            }


            .hero h1 {

                font-size: 23px;
            }


            .hero-ticket {

                width: 60px;
                height: 60px;

                font-size: 27px;

                border-radius: 17px;
            }


            .stats {

                grid-template-columns: 1fr 1fr;

                gap: 10px;
            }


            .stat-card {

                min-height: 130px;

                padding: 15px;
            }


            .stat-number {

                font-size: 24px;
            }


            .stat-mini {

                display: none;
            }


            .panel-header,
            .toolbar {

                padding:
                    17px;
            }


            .toolbar {

                flex-direction: column;

                align-items:
                    flex-start;
            }


            .search-wrapper {

                width: 100%;
            }


            .profile-role {

                display: none;
            }
        }


    </style>

</head>


<body>


{{-- =====================================================
     SIDEBAR
===================================================== --}}

<aside class="sidebar">


    <a
        href="{{ route('admin.dashboard') }}"
        class="brand"
    >

        <div class="brand-icon">

            <i class="fa-solid fa-ticket"></i>

        </div>


        <div class="brand-name">

            Ticket<span>ify</span>

        </div>

    </a>


    <div class="nav-title">

        MENU UTAMA

    </div>


    <nav>


        {{-- DASHBOARD --}}

        <a
            href="{{ route('admin.dashboard') }}"
            class="sidebar-link"
        >

            <i class="fa-solid fa-table-columns"></i>

            <span>
                Dashboard
            </span>

        </a>


        {{-- EVENT --}}

        <a
            href="{{ route('admin.events.index') }}"
            class="sidebar-link"
        >

            <i class="fa-solid fa-calendar-days"></i>

            <span>
                Kelola Event
            </span>

        </a>


        {{-- JENIS TIKET --}}

        <a
            href="{{ route('admin.ticket-types.index') }}"
            class="sidebar-link active"
        >

            <i class="fa-solid fa-ticket"></i>

            <span>
                Jenis Tiket
            </span>

        </a>


        {{-- TIKET TERJUAL --}}

        <a
            href="{{ route('admin.tickets.index') }}"
            class="sidebar-link"
        >

            <i class="fa-solid fa-receipt"></i>

            <span>
                Tiket Terjual
            </span>

        </a>


        {{-- ORDER --}}

        <a
            href="{{ route('admin.orders.index') }}"
            class="sidebar-link"
        >

            <i class="fa-solid fa-cart-shopping"></i>

            <span>
                Pesanan
            </span>

        </a>


        <div class="nav-title">

            LAINNYA

        </div>


        {{-- WEBSITE --}}

        <a
            href="{{ route('home') }}"
            class="sidebar-link"
        >

            <i class="fa-solid fa-globe"></i>

            <span>
                Lihat Website
            </span>

            <i
                class="fa-solid fa-arrow-up-right-from-square ms-auto"
                style="font-size:9px"
            ></i>

        </a>


    </nav>


    <div class="sidebar-info">

        <div class="sidebar-info-icon">

            <i class="fa-solid fa-wand-magic-sparkles"></i>

        </div>


        <strong>
            Ticket Management
        </strong>


        <p>

            Atur harga, stok, dan ketersediaan
            tiket event dengan mudah.

        </p>

    </div>


</aside>



{{-- =====================================================
     MAIN
===================================================== --}}

<main class="main">


    {{-- TOPBAR --}}

    <header class="topbar">


        <div class="breadcrumb">

            Workspace

            &nbsp; / &nbsp;

            <strong>
                Jenis Tiket
            </strong>

        </div>


        <div class="admin-profile">


            <div class="profile-avatar">

                <i class="fa-solid fa-user-shield"></i>

            </div>


            <div>

                <div class="profile-name">

                    Administrator

                </div>


                <div class="profile-role">

                    Ticket Management

                </div>

            </div>


        </div>


    </header>



    {{-- CONTENT --}}

    <div class="content">


        {{-- ALERT SUCCESS --}}

        @if(session('success'))

            <div class="alert alert-success">

                <i
                    class="fa-solid fa-circle-check me-2"
                ></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- ALERT ERROR --}}

        @if(session('error'))

            <div class="alert alert-danger">

                <i
                    class="fa-solid fa-circle-exclamation me-2"
                ></i>

                {{ session('error') }}

            </div>

        @endif



        {{-- =================================================
             HERO
        ================================================= --}}

        <section class="hero">


            <div class="hero-content">


                <div class="hero-label">

                    <i class="fa-solid fa-sparkles"></i>

                    TICKET MANAGEMENT

                </div>


                <h1>

                    Kelola Tiket dengan<br>

                    Lebih Profesional 🎟️

                </h1>


                <p>

                    Atur jenis tiket, harga, stok, dan
                    ketersediaan tiket untuk setiap event
                    Ticketify dalam satu dashboard.

                </p>


            </div>


            <div class="hero-ticket">

                <i class="fa-solid fa-ticket"></i>

            </div>


        </section>



        {{-- =================================================
             SECTION TITLE
        ================================================= --}}

        <div class="section-title">


            <div>

                <h2>
                    Ringkasan Tiket
                </h2>


                <p>
                    Pantau inventori tiket kamu secara cepat.
                </p>

            </div>


            <div class="live-badge">

                <i
                    class="fa-solid fa-circle me-1"
                    style="font-size:5px"
                ></i>

                DATA TERKINI

            </div>


        </div>



        {{-- =================================================
             HITUNG STATISTIK
        ================================================= --}}

        @php

            $totalTicketTypes =
                $ticketTypes->count();

            $totalStock =
                $ticketTypes->sum('stock');

            $totalSold =
                $ticketTypes->sum('sold');

            $totalRemaining =
                $ticketTypes->sum(function ($ticketType) {

                    return max(
                        0,
                        $ticketType->stock
                        -
                        $ticketType->sold
                    );

                });

        @endphp



        {{-- =================================================
             STAT CARDS
        ================================================= --}}

        <section class="stats">


            {{-- TOTAL JENIS --}}

            <div
                class="stat-card stat-purple"
                style="animation-delay:.05s"
            >

                <div class="stat-top">

                    <div
                        class="stat-icon icon-purple"
                    >

                        <i
                            class="fa-solid fa-layer-group"
                        ></i>

                    </div>


                    <span class="stat-mini">
                        Semua tiket
                    </span>

                </div>


                <div class="stat-title">

                    Total Jenis Tiket

                </div>


                <div class="stat-number">

                    {{ $totalTicketTypes }}

                </div>

            </div>



            {{-- TOTAL STOK --}}

            <div
                class="stat-card stat-blue"
                style="animation-delay:.12s"
            >

                <div class="stat-top">

                    <div
                        class="stat-icon icon-blue"
                    >

                        <i
                            class="fa-solid fa-boxes-stacked"
                        ></i>

                    </div>


                    <span class="stat-mini">
                        Kapasitas
                    </span>

                </div>


                <div class="stat-title">

                    Total Stok

                </div>


                <div class="stat-number">

                    {{ number_format($totalStock) }}

                </div>

            </div>



            {{-- TERJUAL --}}

            <div
                class="stat-card stat-pink"
                style="animation-delay:.19s"
            >

                <div class="stat-top">

                    <div
                        class="stat-icon icon-pink"
                    >

                        <i
                            class="fa-solid fa-chart-line"
                        ></i>

                    </div>


                    <span class="stat-mini">
                        Penjualan
                    </span>

                </div>


                <div class="stat-title">

                    Tiket Terjual

                </div>


                <div class="stat-number">

                    {{ number_format($totalSold) }}

                </div>

            </div>



            {{-- SISA --}}

            <div
                class="stat-card stat-green"
                style="animation-delay:.26s"
            >

                <div class="stat-top">

                    <div
                        class="stat-icon icon-green"
                    >

                        <i
                            class="fa-solid fa-ticket"
                        ></i>

                    </div>


                    <span class="stat-mini">
                        Tersedia
                    </span>

                </div>


                <div class="stat-title">

                    Sisa Tiket

                </div>


                <div class="stat-number">

                    {{ number_format($totalRemaining) }}

                </div>

            </div>


        </section>



        {{-- =================================================
             TICKET PANEL
        ================================================= --}}

        <section class="ticket-panel">


            {{-- PANEL HEADER --}}

            <div class="panel-header">


                <div class="panel-title">


                    <h2>

                        <i
                            class="fa-solid fa-ticket me-2"
                            style="color:#7357f5"
                        ></i>

                        Daftar Jenis Tiket

                    </h2>


                    <p>

                        Kelola harga, stok, penjualan,
                        dan status tiket.

                    </p>

                </div>


                <a
                    href="{{ route('admin.ticket-types.create') }}"
                    class="btn-add"
                >

                    <i class="fa-solid fa-plus"></i>

                    Tambah Jenis Tiket

                </a>


            </div>



            {{-- TOOLBAR --}}

            @if($ticketTypes->count() > 0)

                <div class="toolbar">


                    <div class="search-wrapper">

                        <i
                            class="fa-solid fa-magnifying-glass"
                        ></i>


                        <input
                            type="search"
                            id="ticketSearch"
                            class="search-input"
                            placeholder="Cari event atau jenis tiket..."
                        >

                    </div>


                    <div class="count-text">

                        Menampilkan

                        <strong id="visibleCount">
                            {{ $ticketTypes->count() }}
                        </strong>

                        dari

                        {{ $ticketTypes->count() }}

                        tiket

                    </div>


                </div>

            @endif



            {{-- =================================================
                 TABLE
            ================================================= --}}

            @if($ticketTypes->count() > 0)


                <div class="table-wrapper">


                    <table class="ticket-table">


                        <thead>

                            <tr>

                                <th>
                                    #
                                </th>

                                <th>
                                    Event
                                </th>

                                <th>
                                    Jenis Tiket
                                </th>

                                <th>
                                    Harga
                                </th>

                                <th>
                                    Stok
                                </th>

                                <th>
                                    Terjual
                                </th>

                                <th>
                                    Sisa
                                </th>

                                <th>
                                    Progress
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>



                        <tbody id="ticketTableBody">


                            @foreach($ticketTypes as $ticketType)


                                @php

                                    $remaining = max(
                                        0,
                                        $ticketType->stock
                                        -
                                        $ticketType->sold
                                    );


                                    $percentage = $ticketType->stock > 0

                                        ? min(
                                            100,
                                            ($ticketType->sold / $ticketType->stock) * 100
                                        )

                                        : 0;

                                @endphp



                                <tr
                                    class="ticket-row"
                                >


                                    {{-- NOMOR --}}

                                    <td>

                                        <div class="number">

                                            {{ $loop->iteration }}

                                        </div>

                                    </td>



                                    {{-- EVENT --}}

                                    <td>

                                        <div
                                            class="d-flex align-items-center gap-2"
                                        >

                                            <div
                                                class="event-icon"
                                            >

                                                <i
                                                    class="fa-solid fa-calendar-star"
                                                ></i>

                                            </div>


                                            <div
                                                class="event-name"
                                            >

                                                {{ $ticketType->event->title ?? '-' }}

                                            </div>

                                        </div>

                                    </td>



                                    {{-- JENIS TIKET --}}

                                    <td>

                                        <span
                                            class="ticket-name"
                                        >

                                            <i
                                                class="fa-solid fa-ticket"
                                            ></i>

                                            {{ $ticketType->name }}

                                        </span>

                                    </td>



                                    {{-- HARGA --}}

                                    <td>

                                        <div class="price">

                                            Rp
                                            {{ number_format(
                                                $ticketType->price,
                                                0,
                                                ',',
                                                '.'
                                            ) }}

                                        </div>


                                        <div class="price-small">

                                            per tiket

                                        </div>

                                    </td>



                                    {{-- STOK --}}

                                    <td>

                                        <span
                                            class="inventory-number"
                                        >

                                            {{ number_format(
                                                $ticketType->stock
                                            ) }}

                                        </span>

                                    </td>



                                    {{-- TERJUAL --}}

                                    <td>

                                        <span
                                            class="sold-number"
                                        >

                                            {{ number_format(
                                                $ticketType->sold
                                            ) }}

                                        </span>

                                    </td>



                                    {{-- SISA --}}

                                    <td>

                                        <span
                                            class="remaining-number"
                                        >

                                            {{ number_format(
                                                $remaining
                                            ) }}

                                        </span>

                                    </td>



                                    {{-- PROGRESS --}}

                                    <td>

                                        <div
                                            class="stock-area"
                                        >


                                            <div
                                                class="stock-text"
                                            >

                                                <span>
                                                    Terjual
                                                </span>

                                                <span>
                                                    {{ round($percentage) }}%
                                                </span>

                                            </div>


                                            <div
                                                class="progress"
                                            >

                                                <div
                                                    class="progress-bar"
                                                    style="
                                                        width:
                                                        {{ $percentage }}%;
                                                    "
                                                ></div>

                                            </div>


                                        </div>

                                    </td>



                                    {{-- STATUS --}}

                                    <td>

                                        @if($remaining <= 0)

                                            <span
                                                class="status soldout"
                                            >

                                                SOLD OUT

                                            </span>

                                        @else

                                            <span
                                                class="status available"
                                            >

                                                TERSEDIA

                                            </span>

                                        @endif

                                    </td>



                                    {{-- AKSI --}}

                                    <td>

                                        <div class="actions">


                                            {{-- EDIT --}}

                                            <a
                                                href="{{ route(
                                                    'admin.ticket-types.edit',
                                                    $ticketType
                                                ) }}"
                                                class="action-btn edit-btn"
                                            >

                                                <i
                                                    class="fa-solid fa-pen"
                                                ></i>

                                                Edit

                                            </a>



                                            {{-- HAPUS --}}

                                            <form
                                                action="{{ route(
                                                    'admin.ticket-types.destroy',
                                                    $ticketType
                                                ) }}"
                                                method="POST"
                                                onsubmit="return confirm(
                                                    'Yakin ingin menghapus jenis tiket ini?'
                                                )"
                                            >

                                                @csrf

                                                @method('DELETE')


                                                <button
                                                    type="submit"
                                                    class="action-btn delete-btn"
                                                >

                                                    <i
                                                        class="fa-solid fa-trash"
                                                    ></i>

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


                {{-- HASIL PENCARIAN KOSONG --}}

                <div
                    id="noResults"
                    class="empty"
                    style="display:none;"
                >

                    <div class="empty-icon">

                        <i
                            class="fa-solid fa-magnifying-glass"
                        ></i>

                    </div>


                    <h3>
                        Tiket Tidak Ditemukan
                    </h3>


                    <p>
                        Tidak ada tiket yang cocok dengan pencarian kamu.
                    </p>

                </div>


            @else


                {{-- =================================================
                     BELUM ADA TIKET
                ================================================= --}}

                <div class="empty">


                    <div class="empty-icon">

                        <i
                            class="fa-solid fa-ticket"
                        ></i>

                    </div>


                    <h3>

                        Belum Ada Jenis Tiket

                    </h3>


                    <p>

                        Tambahkan jenis tiket pertama
                        untuk event kamu.

                    </p>


                    <a
                        href="{{ route('admin.ticket-types.create') }}"
                        class="btn-add"
                    >

                        <i
                            class="fa-solid fa-plus"
                        ></i>

                        Tambah Jenis Tiket

                    </a>


                </div>


            @endif


        </section>



        {{-- =================================================
             FOOTER
        ================================================= --}}

        <footer class="footer">


            <span>

                © {{ date('Y') }}

                <strong>
                    Ticketify
                </strong>

                · Event made extraordinary.

            </span>


            <span>

                <i
                    class="fa-solid fa-heart me-1"
                    style="color:#ed70a9"
                ></i>

                Made for unforgettable moments

            </span>


        </footer>


    </div>


</main>



{{-- =====================================================
     SEARCH JAVASCRIPT
===================================================== --}}

<script>


    const searchInput =
        document.getElementById('ticketSearch');


    if (searchInput) {


        searchInput.addEventListener(
            'input',
            function () {


                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();


                const rows =
                    document.querySelectorAll(
                        '.ticket-row'
                    );


                const count =
                    document.getElementById(
                        'visibleCount'
                    );


                const noResults =
                    document.getElementById(
                        'noResults'
                    );


                let visible = 0;


                rows.forEach(
                    function(row) {


                        const text =
                            row.textContent
                                .toLowerCase();


                        const match =
                            text.includes(
                                keyword
                            );


                        if (match) {

                            row.style.display =
                                '';

                            visible++;

                        } else {

                            row.style.display =
                                'none';

                        }

                    }
                );


                if (count) {

                    count.textContent =
                        visible;

                }


                if (noResults) {

                    noResults.style.display =
                        visible === 0
                            ? 'block'
                            : 'none';

                }

            }
        );

    }


</script>


</body>

</html>