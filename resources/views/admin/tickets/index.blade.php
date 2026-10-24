<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Kelola Tiket - Ticketify</title>


    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Arial,
                sans-serif;

            background:
                radial-gradient(
                    circle at 80% 10%,
                    rgba(124, 92, 255, .13),
                    transparent 28%
                ),

                radial-gradient(
                    circle at 30% 90%,
                    rgba(236, 72, 153, .08),
                    transparent 25%
                ),

                #f5f6fc;

            color: #17162d;

            min-height: 100vh;

        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: 280px;
            height: 100vh;

            padding: 28px 20px;

            background:

                radial-gradient(
                    circle at 20% 0%,
                    rgba(139, 92, 246, .28),
                    transparent 28%
                ),

                linear-gradient(
                    180deg,
                    #211d4a 0%,
                    #17152f 48%,
                    #101022 100%
                );

            color: white;

            overflow-y: auto;

            z-index: 1000;

            box-shadow:
                20px 0 60px rgba(35, 27, 80, .14);

        }


        .sidebar::before {

            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background:
                rgba(124, 92, 255, .13);

            filter: blur(30px);

            right: -80px;
            bottom: 120px;

            pointer-events: none;

        }



        /* =====================================================
           LOGO
        ===================================================== */

        .brand {

            display: flex;

            align-items: center;

            gap: 13px;

            text-decoration: none;

            color: white;

            padding: 4px 10px 30px;

        }


        .brand-icon {

            width: 48px;
            height: 48px;

            border-radius: 16px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 23px;

            background:
                linear-gradient(
                    135deg,
                    #a78bfa,
                    #6941ff
                );

            box-shadow:
                0 12px 30px rgba(108, 72, 255, .45),

                inset 0 1px 0
                rgba(255,255,255,.35);

            transform: rotate(-3deg);

        }


        .brand-name {

            font-size: 25px;

            font-weight: 850;

            letter-spacing: -1px;

        }


        .brand-name span {

            background:
                linear-gradient(
                    90deg,
                    #ffffff,
                    #a78bfa
                );

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;

        }



        /* =====================================================
           SIDEBAR SECTION
        ===================================================== */

        .menu-title {

            padding:

                0
                16px
                13px;

            margin-top: 8px;

            font-size: 11px;

            font-weight: 800;

            letter-spacing: 1.7px;

            color:
                rgba(196, 191, 224, .58);

            text-transform: uppercase;

        }


        .sidebar-menu {

            display: flex;

            flex-direction: column;

            gap: 7px;

        }


        .sidebar-link {

            position: relative;

            display: flex;

            align-items: center;

            gap: 14px;

            width: 100%;

            min-height: 50px;

            padding: 13px 16px;

            border-radius: 15px;

            color:
                rgba(232, 230, 247, .75);

            text-decoration: none;

            font-size: 14px;

            font-weight: 650;

            transition:
                transform .25s ease,
                background .25s ease,
                color .25s ease,
                box-shadow .25s ease;

        }


        .sidebar-link:hover {

            color: white;

            background:
                rgba(255,255,255,.075);

            transform:
                translateX(4px);

        }


        .sidebar-link.active {

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #805cff,
                    #5d36e9
                );

            box-shadow:
                0 12px 30px
                rgba(101, 66, 241, .35),

                inset 0 1px 0
                rgba(255,255,255,.22);

            transform:
                translateX(0);

        }


        .sidebar-link.active::before {

            content: "";

            position: absolute;

            left: 0;

            width: 4px;
            height: 28px;

            border-radius: 0 5px 5px 0;

            background: #ffffff;

        }


        .menu-icon {

            width: 22px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 18px;

            flex-shrink: 0;

            opacity: .95;

        }


        .menu-arrow {

            margin-left: auto;

            opacity: .45;

            font-size: 13px;

        }



        /* =====================================================
           DIVIDER
        ===================================================== */

        .sidebar-divider {

            height: 1px;

            background:
                rgba(255,255,255,.10);

            margin:
                22px 5px;

        }



        /* =====================================================
           MANAGEMENT CARD
        ===================================================== */

        .management-card {

            position: relative;

            margin:
                48px 0 20px;

            padding: 22px 19px;

            border-radius: 19px;

            border:
                1px solid
                rgba(255,255,255,.10);

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.065),
                    rgba(255,255,255,.025)
                );

            box-shadow:
                inset 0 1px 0
                rgba(255,255,255,.05);

            overflow: hidden;

        }


        .management-card::after {

            content: "";

            position: absolute;

            width: 90px;
            height: 90px;

            right: -35px;
            top: -35px;

            border-radius: 50%;

            background:
                rgba(139,92,246,.18);

            filter: blur(4px);

        }


        .management-icon {

            font-size: 28px;

            margin-bottom: 14px;

            display: block;

        }


        .management-card h4 {

            font-size: 14px;

            margin-bottom: 8px;

            color: white;

        }


        .management-card p {

            color:
                rgba(207,204,228,.60);

            font-size: 12px;

            line-height: 1.8;

        }



        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-side {

            width: 100%;

            margin-top: 10px;

        }


        .logout-btn {

            width: 100%;

            border: 1px solid
                rgba(255,255,255,.08);

            background:
                rgba(255,255,255,.045);

            color:
                rgba(255,255,255,.75);

            padding: 12px 15px;

            border-radius: 13px;

            cursor: pointer;

            font-weight: 700;

            transition: .25s;

        }


        .logout-btn:hover {

            background:
                rgba(239,68,68,.15);

            color: #ff9a9a;

            border-color:
                rgba(239,68,68,.25);

        }



        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .main {

            margin-left: 280px;

            min-height: 100vh;

            padding: 35px 42px 60px;

            position: relative;

            overflow: hidden;

        }


        .main::before {

            content: "";

            position: absolute;

            width: 380px;
            height: 380px;

            border-radius: 50%;

            background:
                rgba(124,92,255,.08);

            filter: blur(60px);

            right: -180px;
            top: -120px;

            pointer-events: none;

        }


        .main::after {

            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background:
                rgba(236,72,153,.05);

            filter: blur(55px);

            left: 20%;
            bottom: -130px;

            pointer-events: none;

        }



        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 35px;

            position: relative;

            z-index: 2;

        }


        .mobile-menu {

            display: none;

            border: none;

            background: white;

            width: 45px;
            height: 45px;

            border-radius: 13px;

            box-shadow:
                0 10px 25px
                rgba(30,25,80,.08);

            font-size: 21px;

            cursor: pointer;

        }


        .admin-chip {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            background: white;

            padding: 10px 15px;

            border-radius: 14px;

            box-shadow:
                0 10px 30px
                rgba(30,25,80,.07);

            color: #55516c;

            font-size: 12px;

            font-weight: 800;

        }


        .online-dot {

            width: 8px;
            height: 8px;

            background: #22c55e;

            border-radius: 50%;

            box-shadow:
                0 0 0 5px
                rgba(34,197,94,.10);

        }



        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            position: relative;

            z-index: 2;

            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 25px;

            margin-bottom: 28px;

        }


        .eyebrow {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            color: #7656ed;

            font-size: 11px;

            font-weight: 850;

            letter-spacing: 1.7px;

            text-transform: uppercase;

            margin-bottom: 9px;

        }


        .eyebrow::before {

            content: "";

            width: 24px;
            height: 3px;

            border-radius: 10px;

            background:
                linear-gradient(
                    90deg,
                    #7c5cff,
                    #e879f9
                );

        }


        .page-header h1 {

            font-size: clamp(30px, 4vw, 43px);

            line-height: 1.1;

            letter-spacing: -1.7px;

            font-weight: 900;

            color: #17152d;

            margin-bottom: 10px;

        }


        .page-header h1 span {

            display: inline-block;

            animation:
                floatTicket 3s ease-in-out infinite;

        }


        @keyframes floatTicket {

            0%, 100% {
                transform:
                    translateY(0)
                    rotate(-4deg);
            }

            50% {
                transform:
                    translateY(-7px)
                    rotate(5deg);
            }

        }


        .page-header p {

            color: #77738b;

            font-size: 14px;

            line-height: 1.7;

        }



        /* =====================================================
           HEADER BUTTONS
        ===================================================== */

        .header-actions {

            display: flex;

            gap: 11px;

            flex-wrap: wrap;

        }


        .btn-modern {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            min-height: 45px;

            padding: 0 17px;

            border-radius: 13px;

            text-decoration: none;

            border: none;

            cursor: pointer;

            font-size: 13px;

            font-weight: 800;

            transition:
                transform .25s ease,
                box-shadow .25s ease;

        }


        .btn-modern:hover {

            transform:
                translateY(-3px);

        }


        .btn-dashboard {

            color: #514d67;

            background: white;

            box-shadow:
                0 10px 25px
                rgba(30,25,80,.07);

        }


        .btn-dashboard:hover {

            color: #514d67;

            box-shadow:
                0 15px 32px
                rgba(30,25,80,.11);

        }


        .btn-add {

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #805cff,
                    #6136e8
                );

            box-shadow:
                0 12px 28px
                rgba(103,65,239,.30);

        }


        .btn-add:hover {

            color: white;

            box-shadow:
                0 17px 35px
                rgba(103,65,239,.38);

        }



        /* =====================================================
           ALERT
        ===================================================== */

        .alert-box {

            position: relative;

            z-index: 2;

            border-radius: 15px;

            padding: 14px 18px;

            margin-bottom: 23px;

            font-size: 13px;

            font-weight: 700;

            animation:
                slideDown .45s ease;

        }


        .alert-success {

            background:
                linear-gradient(
                    135deg,
                    #ecfdf5,
                    #dff9ed
                );

            color: #087443;

            border:
                1px solid #b7efd2;

        }


        .alert-danger {

            background:
                linear-gradient(
                    135deg,
                    #fff1f2,
                    #ffe4e6
                );

            color: #be123c;

            border:
                1px solid #fecdd3;

        }


        @keyframes slideDown {

            from {
                opacity: 0;
                transform:
                    translateY(-12px);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0);
            }

        }



        /* =====================================================
           STATISTICS
        ===================================================== */

        .stats-grid {

            position: relative;

            z-index: 2;

            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 17px;

            margin-bottom: 27px;

        }


        .stat-card {

            position: relative;

            padding: 20px;

            border-radius: 19px;

            background: white;

            border:
                1px solid
                rgba(28,24,67,.045);

            box-shadow:
                0 14px 35px
                rgba(37,29,90,.07);

            overflow: hidden;

            transition:
                transform .3s ease,
                box-shadow .3s ease;

        }


        .stat-card:hover {

            transform:
                translateY(-7px)
                perspective(500px)
                rotateX(1deg);

            box-shadow:
                0 23px 45px
                rgba(37,29,90,.13);

        }


        .stat-card::after {

            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            border-radius: 50%;

            right: -45px;
            bottom: -45px;

            background:
                var(--stat-glow);

            filter: blur(5px);

        }


        .stat-top {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 18px;

        }


        .stat-icon {

            width: 44px;
            height: 44px;

            border-radius: 14px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 21px;

            background:
                var(--stat-bg);

            box-shadow:
                inset 0 1px 0
                rgba(255,255,255,.65);

        }


        .stat-label {

            font-size: 12px;

            color: #858197;

            font-weight: 700;

        }


        .stat-number {

            font-size: 29px;

            font-weight: 900;

            letter-spacing: -1px;

            color: #1b1932;

        }


        .stat-mini {

            font-size: 10px;

            color: #9b97aa;

            margin-top: 4px;

        }



        /* =====================================================
           TICKET PANEL
        ===================================================== */

        .ticket-panel {

            position: relative;

            z-index: 2;

            background: rgba(255,255,255,.86);

            border:
                1px solid
                rgba(40,34,85,.06);

            border-radius: 23px;

            box-shadow:
                0 20px 55px
                rgba(34,27,81,.09);

            backdrop-filter:
                blur(14px);

            overflow: hidden;

        }


        .panel-head {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 23px 25px;

            border-bottom:
                1px solid #eeeef5;

        }


        .panel-title {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .panel-title-icon {

            width: 41px;
            height: 41px;

            border-radius: 13px;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #eee8ff,
                    #f7edff
                );

            font-size: 19px;

        }


        .panel-title h2 {

            font-size: 16px;

            font-weight: 850;

            color: #201d38;

            margin-bottom: 3px;

        }


        .panel-title p {

            font-size: 11px;

            color: #9490a4;

        }


        .ticket-count {

            background:
                #f2efff;

            color: #6544df;

            padding: 8px 12px;

            border-radius: 10px;

            font-size: 11px;

            font-weight: 850;

        }



        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrap {

            width: 100%;

            overflow-x: auto;

        }


        table {

            width: 100%;

            min-width: 1050px;

            border-collapse: separate;

            border-spacing: 0;

        }


        thead th {

            padding:
                15px 18px;

            background:
                #faf9fd;

            color:
                #88849b;

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: .9px;

            font-weight: 850;

            white-space: nowrap;

            border-bottom:
                1px solid #ededf4;

        }


        tbody td {

            padding:
                18px;

            border-bottom:
                1px solid #f0f0f5;

            color: #39364d;

            font-size: 13px;

            vertical-align: middle;

        }


        tbody tr {

            transition:
                background .2s ease;

        }


        tbody tr:hover {

            background:
                linear-gradient(
                    90deg,
                    rgba(124,92,255,.035),
                    rgba(255,255,255,.65)
                );

        }


        tbody tr:last-child td {

            border-bottom: none;

        }



        /* =====================================================
           NUMBER
        ===================================================== */

        .row-number {

            width: 34px;
            height: 34px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                #f5f3fc;

            color:
                #7e7892;

            font-size: 11px;

            font-weight: 850;

        }



        /* =====================================================
           TICKET CODE
        ===================================================== */

        .ticket-code {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            background:
                linear-gradient(
                    135deg,
                    #f5f3ff,
                    #efedff
                );

            color:
                #5840c7;

            border:
                1px solid
                #e5defe;

            padding:
                9px 11px;

            border-radius: 11px;

            font-family:
                "Courier New",
                monospace;

            font-size: 11px;

            font-weight: 850;

            white-space: nowrap;

        }


        .ticket-code::before {

            content: "🎟";

            font-family: sans-serif;

        }



        /* =====================================================
           USER
        ===================================================== */

        .user-info {

            display: flex;

            align-items: center;

            gap: 11px;

            min-width: 175px;

        }


        .avatar {

            width: 38px;
            height: 38px;

            border-radius: 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            color: white;

            font-size: 13px;

            font-weight: 900;

            background:
                linear-gradient(
                    135deg,
                    #8b5cf6,
                    #ec4899
                );

            box-shadow:
                0 8px 18px
                rgba(139,92,246,.22);

        }


        .user-name {

            color: #252239;

            font-weight: 800;

            font-size: 12px;

            margin-bottom: 3px;

        }


        .user-email {

            color: #9793a5;

            font-size: 10px;

        }



        /* =====================================================
           EVENT
        ===================================================== */

        .event-info {

            max-width: 190px;

        }


        .event-title {

            font-weight: 800;

            color: #27243c;

            line-height: 1.45;

        }


        .event-small {

            margin-top: 4px;

            color: #9995a8;

            font-size: 10px;

        }



        /* =====================================================
           TICKET TYPE
        ===================================================== */

        .ticket-type {

            display: inline-flex;

            padding: 7px 10px;

            border-radius: 9px;

            background:
                #fff4fa;

            color:
                #c23678;

            border:
                1px solid #ffd8e9;

            font-size: 11px;

            font-weight: 800;

        }



        /* =====================================================
           DATE
        ===================================================== */

        .date-box {

            display: flex;

            align-items: center;

            gap: 8px;

            color: #625e72;

            white-space: nowrap;

            font-size: 12px;

            font-weight: 650;

        }


        .date-icon {

            width: 30px;
            height: 30px;

            border-radius: 9px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #f2f0ff;

        }



        /* =====================================================
           STATUS
        ===================================================== */

        .status {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 8px 11px;

            border-radius: 999px;

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .5px;

            white-space: nowrap;

        }


        .status::before {

            content: "";

            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: currentColor;

        }


        .status-active {

            background: #e8fff3;

            color: #0c9b5a;

            border:
                1px solid #c8f5dd;

        }


        .status-used {

            background: #edf5ff;

            color: #3477d8;

            border:
                1px solid #d4e6ff;

        }


        .status-cancelled {

            background: #fff0f2;

            color: #d93657;

            border:
                1px solid #ffd5dc;

        }


        .status-default {

            background: #f2f2f5;

            color: #777486;

        }



        /* =====================================================
           ACTION BUTTONS
        ===================================================== */

        .actions {

            display: flex;

            align-items: center;

            gap: 6px;

            white-space: nowrap;

        }


        .action-btn {

            width: 35px;
            height: 35px;

            border: none;

            border-radius: 10px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            text-decoration: none;

            cursor: pointer;

            font-size: 13px;

            transition:
                transform .22s ease,
                box-shadow .22s ease;

        }


        .action-btn:hover {

            transform:
                translateY(-3px);

        }


        .action-detail {

            background:
                #eeeaff;

            color:
                #6345dc;

        }


        .action-detail:hover {

            box-shadow:
                0 8px 18px
                rgba(99,69,220,.18);

        }


        .action-edit {

            background:
                #fff5db;

            color:
                #d58a00;

        }


        .action-edit:hover {

            box-shadow:
                0 8px 18px
                rgba(213,138,0,.18);

        }


        .action-delete {

            background:
                #fff0f2;

            color:
                #d93657;

        }


        .action-delete:hover {

            box-shadow:
                0 8px 18px
                rgba(217,54,87,.18);

        }



        /* =====================================================
           EMPTY
        ===================================================== */

        .empty-state {

            text-align: center;

            padding: 75px 25px;

        }


        .empty-icon {

            width: 85px;
            height: 85px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin: 0 auto 20px;

            border-radius: 26px;

            background:
                linear-gradient(
                    135deg,
                    #eee9ff,
                    #fff0f8
                );

            font-size: 38px;

            box-shadow:
                0 18px 40px
                rgba(91,60,200,.12);

            animation:
                floatTicket 3s ease-in-out infinite;

        }


        .empty-state h3 {

            font-size: 20px;

            margin-bottom: 8px;

            color: #28243d;

        }


        .empty-state p {

            color: #8f8a9e;

            font-size: 13px;

            margin-bottom: 22px;

        }



        /* =====================================================
           MOBILE OVERLAY
        ===================================================== */

        .sidebar-overlay {

            display: none;

            position: fixed;

            inset: 0;

            background:
                rgba(13,11,31,.55);

            backdrop-filter:
                blur(4px);

            z-index: 999;

        }



        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1200px) {

            .stats-grid {

                grid-template-columns:
                    repeat(2, 1fr);

            }

        }


        @media (max-width: 900px) {

            .sidebar {

                transform:
                    translateX(-100%);

                transition:
                    transform .3s ease;

            }


            .sidebar.show {

                transform:
                    translateX(0);

            }


            .sidebar-overlay.show {

                display: block;

            }


            .main {

                margin-left: 0;

                padding:
                    25px 20px 45px;

            }


            .mobile-menu {

                display: block;

            }


            .topbar {

                justify-content:
                    space-between;

            }


            .page-header {

                align-items: flex-start;

                flex-direction: column;

            }


            .header-actions {

                width: 100%;

            }


            .header-actions .btn-modern {

                flex: 1;

            }

        }


        @media (max-width: 600px) {

            .stats-grid {

                grid-template-columns: 1fr;

            }


            .page-header h1 {

                font-size: 30px;

            }


            .panel-head {

                align-items: flex-start;

                flex-direction: column;

            }


            .admin-chip {

                display: none;

            }

        }



        /* =====================================================
           REDUCED MOTION
        ===================================================== */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {

                animation-duration: .01ms !important;

                transition-duration: .01ms !important;

            }

        }

    </style>

</head>


<body>


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside class="sidebar" id="sidebar">


        {{-- LOGO --}}

        <a
            href="{{ route('admin.dashboard') }}"
            class="brand"
        >

            <div class="brand-icon">
                🎟️
            </div>

            <div class="brand-name">
                Ticket<span>ify</span>
            </div>

        </a>



        {{-- MENU UTAMA --}}

        <div class="menu-title">
            Menu Utama
        </div>


        <nav class="sidebar-menu">


            {{-- DASHBOARD --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="sidebar-link
                    {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            >

                <span class="menu-icon">
                    ▣
                </span>

                <span>
                    Dashboard
                </span>

                <span class="menu-arrow">
                    ›
                </span>

            </a>



            {{-- EVENT --}}

            <a
                href="{{ route('admin.events.index') }}"
                class="sidebar-link
                    {{ request()->routeIs('admin.events.*') ? 'active' : '' }}"
            >

                <span class="menu-icon">
                    🗓
                </span>

                <span>
                    Kelola Event
                </span>

                <span class="menu-arrow">
                    ›
                </span>

            </a>



            {{-- JENIS TIKET --}}

            <a
                href="{{ route('admin.ticket-types.index') }}"
                class="sidebar-link
                    {{ request()->routeIs('admin.ticket-types.*') ? 'active' : '' }}"
            >

                <span class="menu-icon">
                    🎟
                </span>

                <span>
                    Jenis Tiket
                </span>

                <span class="menu-arrow">
                    ›
                </span>

            </a>



            {{-- TIKET TERJUAL --}}

            <a
                href="{{ route('admin.tickets.index') }}"
                class="sidebar-link
                    {{ request()->routeIs('admin.tickets.*') ? 'active' : '' }}"
            >

                <span class="menu-icon">
                    ▤
                </span>

                <span>
                    Tiket Terjual
                </span>

                <span class="menu-arrow">
                    ›
                </span>

            </a>



            {{-- PESANAN --}}

            <a
                href="{{ route('admin.orders.index') }}"
                class="sidebar-link
                    {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
            >

                <span class="menu-icon">
                    🛒
                </span>

                <span>
                    Pesanan
                </span>

                <span class="menu-arrow">
                    ›
                </span>

            </a>


        </nav>



        {{-- DIVIDER --}}

        <div class="sidebar-divider"></div>



        {{-- LAINNYA --}}

        <div class="menu-title">
            Lainnya
        </div>


        <nav class="sidebar-menu">

            <a
                href="{{ route('home') }}"
                class="sidebar-link"
                target="_blank"
            >

                <span class="menu-icon">
                    🌐
                </span>

                <span>
                    Lihat Website
                </span>

                <span class="menu-arrow">
                    ↗
                </span>

            </a>

        </nav>



        {{-- MANAGEMENT CARD --}}

        <div class="management-card">

            <span class="management-icon">
                ✨
            </span>

            <h4>
                Ticket Management
            </h4>

            <p>
                Atur harga, stok, dan ketersediaan tiket event dengan mudah.
            </p>

        </div>



        {{-- LOGOUT --}}

        <form
            action="{{ route('logout') }}"
            method="POST"
            class="logout-side"
        >

            @csrf

            <button
                type="submit"
                class="logout-btn"
            >
                ↪ &nbsp; Logout Admin
            </button>

        </form>


    </aside>



    {{-- MOBILE OVERLAY --}}

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
    ></div>



    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <main class="main">


        {{-- TOPBAR --}}

        <div class="topbar">

            <button
                class="mobile-menu"
                id="mobileMenu"
                type="button"
            >
                ☰
            </button>


            <div></div>


            <div class="admin-chip">

                <span class="online-dot"></span>

                Admin Panel

            </div>

        </div>



        {{-- =================================================
             PAGE HEADER
        ================================================== --}}

        <section class="page-header">


            <div>

                <div class="eyebrow">
                    Ticket Management
                </div>


                <h1>
                    Kelola Tiket
                    <span>🎟️</span>
                </h1>


                <p>
                    Pantau tiket, pemilik, event, dan status tiket
                    Ticketify dalam satu tempat.
                </p>

            </div>



            <div class="header-actions">


                <a
                    href="{{ route('admin.dashboard') }}"
                    class="btn-modern btn-dashboard"
                >

                    ← Dashboard

                </a>


                <a
                    href="{{ route('admin.tickets.create') }}"
                    class="btn-modern btn-add"
                >

                    ＋ Tambah Tiket

                </a>


            </div>


        </section>



        {{-- =================================================
             ALERT
        ================================================== --}}

        @if(session('success'))

            <div class="alert-box alert-success">

                ✓ &nbsp;
                {{ session('success') }}

            </div>

        @endif


        @if(session('error'))

            <div class="alert-box alert-danger">

                ⚠ &nbsp;
                {{ session('error') }}

            </div>

        @endif



        {{-- =================================================
             HITUNG STATISTIK
        ================================================== --}}

        @php

            $ticketCount =
                $tickets->count();

            $activeCount =
                $tickets
                    ->where('status', 'active')
                    ->count();

            $usedCount =
                $tickets
                    ->where('status', 'used')
                    ->count();

            $cancelledCount =
                $tickets
                    ->where('status', 'cancelled')
                    ->count();

        @endphp



        {{-- =================================================
             STATISTICS
        ================================================== --}}

        <section class="stats-grid">


            {{-- TOTAL --}}

            <div
                class="stat-card"
                style="
                    --stat-bg:#efebff;
                    --stat-glow:#dcd3ff;
                "
            >

                <div class="stat-top">

                    <div class="stat-icon">
                        🎟️
                    </div>

                    <div class="stat-label">
                        TOTAL TIKET
                    </div>

                </div>


                <div class="stat-number">
                    {{ $ticketCount }}
                </div>


                <div class="stat-mini">
                    Seluruh tiket dalam sistem
                </div>

            </div>



            {{-- ACTIVE --}}

            <div
                class="stat-card"
                style="
                    --stat-bg:#e8fff3;
                    --stat-glow:#c8f5dd;
                "
            >

                <div class="stat-top">

                    <div class="stat-icon">
                        🟢
                    </div>

                    <div class="stat-label">
                        AKTIF
                    </div>

                </div>


                <div class="stat-number">
                    {{ $activeCount }}
                </div>


                <div class="stat-mini">
                    Tiket siap digunakan
                </div>

            </div>



            {{-- USED --}}

            <div
                class="stat-card"
                style="
                    --stat-bg:#edf5ff;
                    --stat-glow:#d7e8ff;
                "
            >

                <div class="stat-top">

                    <div class="stat-icon">
                        🎫
                    </div>

                    <div class="stat-label">
                        SUDAH DIGUNAKAN
                    </div>

                </div>


                <div class="stat-number">
                    {{ $usedCount }}
                </div>


                <div class="stat-mini">
                    Tiket yang sudah check-in
                </div>

            </div>



            {{-- CANCELLED --}}

            <div
                class="stat-card"
                style="
                    --stat-bg:#fff0f2;
                    --stat-glow:#ffd6dd;
                "
            >

                <div class="stat-top">

                    <div class="stat-icon">
                        ❌
                    </div>

                    <div class="stat-label">
                        DIBATALKAN
                    </div>

                </div>


                <div class="stat-number">
                    {{ $cancelledCount }}
                </div>


                <div class="stat-mini">
                    Tiket tidak dapat digunakan
                </div>

            </div>


        </section>



        {{-- =================================================
             TICKET PANEL
        ================================================== --}}

        <section class="ticket-panel">


            {{-- PANEL HEADER --}}

            <div class="panel-head">


                <div class="panel-title">

                    <div class="panel-title-icon">
                        🎟️
                    </div>


                    <div>

                        <h2>
                            Daftar Tiket
                        </h2>

                        <p>
                            Semua tiket pengguna Ticketify
                        </p>

                    </div>

                </div>


                <div class="ticket-count">

                    {{ $ticketCount }}
                    Tiket

                </div>


            </div>



            {{-- =================================================
                 DATA TIKET
            ================================================== --}}

            @if($tickets->count() > 0)


                <div class="table-wrap">


                    <table>


                        <thead>

                            <tr>

                                <th>
                                    #
                                </th>

                                <th>
                                    Kode Tiket
                                </th>

                                <th>
                                    Pemilik
                                </th>

                                <th>
                                    Event
                                </th>

                                <th>
                                    Jenis Tiket
                                </th>

                                <th>
                                    Tanggal Event
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>



                        <tbody>


                            @foreach($tickets as $ticket)


                                <tr>


                                    {{-- NOMOR --}}

                                    <td>

                                        <div class="row-number">

                                            {{ $loop->iteration }}

                                        </div>

                                    </td>



                                    {{-- KODE TIKET --}}

                                    <td>

                                        <span class="ticket-code">

                                            {{ $ticket->ticket_code }}

                                        </span>

                                    </td>



                                    {{-- PEMILIK --}}

                                    <td>


                                        @if($ticket->user)


                                            @php

                                                $initial =
                                                    strtoupper(
                                                        substr(
                                                            $ticket->user->name,
                                                            0,
                                                            1
                                                        )
                                                    );

                                            @endphp


                                            <div class="user-info">


                                                <div class="avatar">

                                                    {{ $initial }}

                                                </div>


                                                <div>

                                                    <div class="user-name">

                                                        {{ $ticket->user->name }}

                                                    </div>


                                                    <div class="user-email">

                                                        {{ $ticket->user->email }}

                                                    </div>

                                                </div>


                                            </div>


                                        @else


                                            <span
                                                style="
                                                    color:#aaa6b5;
                                                    font-size:12px;
                                                "
                                            >

                                                Tidak diketahui

                                            </span>


                                        @endif


                                    </td>



                                    {{-- EVENT --}}

                                    <td>


                                        @if($ticket->event)


                                            <div class="event-info">


                                                <div class="event-title">

                                                    {{ $ticket->event->title }}

                                                </div>


                                                <div class="event-small">

                                                    🎪 Event Ticketify

                                                </div>


                                            </div>


                                        @else


                                            <span
                                                style="
                                                    color:#aaa6b5;
                                                    font-size:12px;
                                                "
                                            >

                                                Event tidak ditemukan

                                            </span>


                                        @endif


                                    </td>



                                    {{-- JENIS TIKET --}}

                                    <td>


                                        @if($ticket->ticketType)


                                            <span class="ticket-type">

                                                {{ $ticket->ticketType->name }}

                                            </span>


                                        @else


                                            <span
                                                style="
                                                    color:#aaa6b5;
                                                    font-size:12px;
                                                "
                                            >

                                                -

                                            </span>


                                        @endif


                                    </td>



                                    {{-- TANGGAL EVENT --}}

                                    <td>


                                        @if($ticket->event)


                                            <div class="date-box">

                                                <div class="date-icon">
                                                    📅
                                                </div>


                                                <span>

                                                    {{
                                                        \Carbon\Carbon::parse(
                                                            $ticket->event->event_date
                                                        )->format('d M Y')
                                                    }}

                                                </span>

                                            </div>


                                        @else

                                            -

                                        @endif


                                    </td>



                                    {{-- STATUS --}}

                                    <td>


                                        @if($ticket->status === 'active')


                                            <span
                                                class="
                                                    status
                                                    status-active
                                                "
                                            >

                                                ACTIVE

                                            </span>


                                        @elseif($ticket->status === 'used')


                                            <span
                                                class="
                                                    status
                                                    status-used
                                                "
                                            >

                                                USED

                                            </span>


                                        @elseif($ticket->status === 'cancelled')


                                            <span
                                                class="
                                                    status
                                                    status-cancelled
                                                "
                                            >

                                                CANCELLED

                                            </span>


                                        @else


                                            <span
                                                class="
                                                    status
                                                    status-default
                                                "
                                            >

                                                {{ strtoupper($ticket->status) }}

                                            </span>


                                        @endif


                                    </td>



                                    {{-- AKSI --}}

                                    <td>


                                        <div class="actions">


                                            {{-- DETAIL --}}

                                            <a
                                                href="{{
                                                    route(
                                                        'admin.tickets.show',
                                                        $ticket
                                                    )
                                                }}"
                                                class="
                                                    action-btn
                                                    action-detail
                                                "
                                                title="Detail"
                                            >

                                                👁

                                            </a>



                                            {{-- EDIT --}}

                                            <a
                                                href="{{
                                                    route(
                                                        'admin.tickets.edit',
                                                        $ticket
                                                    )
                                                }}"
                                                class="
                                                    action-btn
                                                    action-edit
                                                "
                                                title="Edit"
                                            >

                                                ✏️

                                            </a>



                                            {{-- HAPUS --}}

                                            <form
                                                action="{{
                                                    route(
                                                        'admin.tickets.destroy',
                                                        $ticket
                                                    )
                                                }}"
                                                method="POST"
                                                onsubmit="
                                                    return confirm(
                                                        'Yakin ingin menghapus tiket ini?'
                                                    )
                                                "
                                                style="display:inline;"
                                            >

                                                @csrf

                                                @method('DELETE')


                                                <button
                                                    type="submit"
                                                    class="
                                                        action-btn
                                                        action-delete
                                                    "
                                                    title="Hapus"
                                                >

                                                    🗑

                                                </button>

                                            </form>


                                        </div>


                                    </td>


                                </tr>


                            @endforeach


                        </tbody>


                    </table>


                </div>


            @else


                {{-- EMPTY STATE --}}

                <div class="empty-state">


                    <div class="empty-icon">

                        🎟️

                    </div>


                    <h3>

                        Belum Ada Tiket

                    </h3>


                    <p>

                        Belum ada tiket yang tersedia
                        di dalam sistem Ticketify.

                    </p>


                    <a
                        href="{{ route('admin.tickets.create') }}"
                        class="
                            btn-modern
                            btn-add
                        "
                    >

                        ＋ Tambah Tiket

                    </a>


                </div>


            @endif


        </section>


    </main>



    {{-- =====================================================
         MOBILE JAVASCRIPT
    ====================================================== --}}

    <script>

        const mobileMenu =
            document.getElementById('mobileMenu');

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('sidebarOverlay');


        if (mobileMenu) {

            mobileMenu.addEventListener(
                'click',
                function () {

                    sidebar.classList.add('show');

                    overlay.classList.add('show');

                }
            );

        }


        if (overlay) {

            overlay.addEventListener(
                'click',
                function () {

                    sidebar.classList.remove('show');

                    overlay.classList.remove('show');

                }
            );

        }


        document
            .querySelectorAll('.sidebar-link')
            .forEach(function(link) {

                link.addEventListener(
                    'click',
                    function() {

                        sidebar.classList.remove('show');

                        overlay.classList.remove('show');

                    }
                );

            });

    </script>


</body>

</html>