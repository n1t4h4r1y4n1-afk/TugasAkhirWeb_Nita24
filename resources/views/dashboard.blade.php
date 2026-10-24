<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Ticketify</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f6f7fb;
            color: #1f2937;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            width: 100%;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;

            padding: 18px 7%;

            display: flex;
            justify-content: space-between;
            align-items: center;

            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 25px;
            font-weight: 800;
            color: #5b4cf0;
            text-decoration: none;
        }

        .logo span {
            color: #111827;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-link {
            text-decoration: none;
            color: #4b5563;
            font-weight: 600;
            transition: 0.2s;
        }

        .nav-link:hover {
            color: #5b4cf0;
        }

        .logout-btn {
            border: none;

            background: #f1efff;
            color: #5b4cf0;

            padding: 10px 17px;

            border-radius: 10px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #5b4cf0;
            color: white;
        }


        /* =========================
           HERO
        ========================= */

        .hero {
            background: linear-gradient(
                135deg,
                #5b4cf0 0%,
                #7c5cff 50%,
                #9b8cff 100%
            );

            padding: 70px 7%;

            color: white;
        }

        .hero-content {
            max-width: 1200px;
            margin: auto;
        }

        .welcome-label {
            font-size: 13px;

            font-weight: 800;

            letter-spacing: 2px;

            opacity: 0.85;

            margin-bottom: 12px;
        }

        .hero h1 {
            font-size: 46px;

            line-height: 1.15;

            margin-bottom: 15px;
        }

        .hero p {
            font-size: 18px;

            opacity: 0.9;

            max-width: 600px;
        }

        .hero-decoration {
            margin-top: 30px;

            display: inline-block;

            background: rgba(255,255,255,0.15);

            padding: 12px 18px;

            border-radius: 30px;

            font-size: 14px;
        }


        /* =========================
           CONTENT
        ========================= */

        .container {
            max-width: 1200px;

            margin: auto;

            padding: 55px 25px;
        }

        .section-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 28px;
        }

        .section-title {
            font-size: 28px;

            font-weight: 800;
        }

        .section-subtitle {
            color: #6b7280;

            margin-top: 7px;
        }

        .see-all {
            color: #5b4cf0;

            text-decoration: none;

            font-weight: 700;
        }

        .see-all:hover {
            text-decoration: underline;
        }


        /* =========================
           EVENT GRID
        ========================= */

        .event-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;
        }


        /* =========================
           EVENT CARD
        ========================= */

        .event-card {
            background: white;

            border-radius: 18px;

            overflow: hidden;

            border: 1px solid #e8e8ee;

            box-shadow:
                0 8px 25px rgba(0,0,0,0.05);

            transition:
                all 0.25s ease;
        }

        .event-card:hover {
            transform: translateY(-7px);

            box-shadow:
                0 18px 40px rgba(0,0,0,0.10);
        }


        /* =========================
           POSTER EVENT
        ========================= */

        /*
        |--------------------------------------------------------------------------
        | POSTER FULL / TIDAK CROP
        |--------------------------------------------------------------------------
        */

        .event-image {
            width: 100%;

            height: auto;

            display: block;

            object-fit: contain;

            background: #ffffff;
        }


        /* =========================
           PLACEHOLDER POSTER
        ========================= */

        .event-image-placeholder {
            width: 100%;

            min-height: 250px;

            background: linear-gradient(
                135deg,
                #e9e5ff,
                #f4f1ff
            );

            display: flex;

            flex-direction: column;

            justify-content: center;

            align-items: center;

            color: #5b4cf0;
        }

        .event-image-placeholder span {
            font-size: 55px;

            margin-bottom: 10px;
        }

        .event-image-placeholder p {
            font-size: 14px;

            font-weight: 600;
        }


        /* =========================
           EVENT CONTENT
        ========================= */

        .event-content {
            padding: 23px;
        }

        .badge {
            display: inline-block;

            background: #f0edff;

            color: #5b4cf0;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: 800;
        }

        .event-title {
            font-size: 20px;

            font-weight: 800;

            margin: 15px 0 12px;

            color: #111827;
        }

        .event-info {
            color: #6b7280;

            font-size: 14px;

            margin-bottom: 8px;
        }

        .event-button {
            display: block;

            width: 100%;

            text-align: center;

            text-decoration: none;

            background: #5b4cf0;

            color: white;

            padding: 12px;

            border-radius: 10px;

            font-weight: 700;

            margin-top: 20px;

            transition: 0.2s;
        }

        .event-button:hover {
            background: #4839d1;
        }


        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 18px;

            padding: 70px 30px;

            text-align: center;

            box-shadow:
                0 8px 25px rgba(0,0,0,0.04);
        }

        .empty-icon {
            font-size: 55px;

            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 23px;

            margin-bottom: 10px;
        }

        .empty-state p {
            color: #6b7280;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #111827;

            color: #9ca3af;

            text-align: center;

            padding: 25px;

            margin-top: 30px;
        }

        footer strong {
            color: white;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .event-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .hero h1 {
                font-size: 38px;
            }

        }


        @media (max-width: 600px) {

            .navbar {
                padding: 15px 20px;
            }

            .nav-link {
                display: none;
            }

            .hero {
                padding: 50px 25px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 16px;
            }

            .container {
                padding: 40px 20px;
            }

            .event-grid {
                grid-template-columns: 1fr;
            }

            .section-header {
                display: block;
            }

            .see-all {
                display: inline-block;

                margin-top: 10px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================
         NAVBAR
    ========================== --}}

    <nav class="navbar">

        <a
            href="{{ route('dashboard') }}"
            class="logo">

            Ticket<span>ify</span>

        </a>


        <div class="nav-right">

            <a
                href="{{ route('events.index') }}"
                class="nav-link">

                Events

            </a>


            <a
                href="{{ route('tickets.index') }}"
                class="nav-link">

                Tiket Saya

            </a>


            <form
                action="{{ route('logout') }}"
                method="POST">

                @csrf

                <button
                    type="submit"
                    class="logout-btn">

                    Logout

                </button>

            </form>

        </div>

    </nav>


    {{-- =========================
         HERO
    ========================== --}}

    <section class="hero">

        <div class="hero-content">

            <div class="welcome-label">

                WELCOME BACK

            </div>


            <h1>

                Halo, {{ auth()->user()->name }} 👋

            </h1>


            <p>

                Temukan event menarik, pesan tiketmu,
                dan nikmati pengalaman terbaik bersama Ticketify.

            </p>


            <div class="hero-decoration">

                🎟️ Your next experience starts here

            </div>

        </div>

    </section>


    {{-- =========================
         EVENTS
    ========================== --}}

    <main class="container">


        <div class="section-header">

            <div>

                <div class="section-title">

                    Event Terbaru

                </div>


                <div class="section-subtitle">

                    Pilih event favoritmu dan dapatkan tiket sekarang.

                </div>

            </div>


            <a
                href="{{ route('events.index') }}"
                class="see-all">

                Lihat Semua →

            </a>

        </div>


        @if($events->count() > 0)


            <div class="event-grid">


                @foreach($events as $event)


                    <div class="event-card">


                        {{-- =========================
                             POSTER EVENT
                        ========================== --}}

                        @if($event->banner)

                            <img
                                src="{{ asset('storage/' . $event->banner) }}"
                                alt="{{ $event->title }}"
                                class="event-image"
                            >

                        @else

                            <div class="event-image-placeholder">

                                <span>
                                    🎫
                                </span>

                                <p>
                                    Poster belum tersedia
                                </p>

                            </div>

                        @endif


                        {{-- =========================
                             EVENT CONTENT
                        ========================== --}}

                        <div class="event-content">


                            {{-- CATEGORY --}}

                            <span class="badge">

                                {{ $event->category }}

                            </span>


                            {{-- TITLE --}}

                            <div class="event-title">

                                {{ $event->title }}

                            </div>


                            {{-- LOCATION --}}

                            <div class="event-info">

                                📍 {{ $event->location }}

                            </div>


                            {{-- DATE --}}

                            <div class="event-info">

                                📅 {{ $event->event_date }}

                            </div>


                            {{-- TIME --}}

                            <div class="event-info">

                                🕐

                                {{ $event->event_time ?? 'Waktu belum ditentukan' }}

                            </div>


                            {{-- BUTTON --}}

                            <a
                                href="{{ route('events.show', $event) }}"
                                class="event-button">

                                Lihat Event

                            </a>


                        </div>


                    </div>


                @endforeach


            </div>


        @else


            {{-- =========================
                 EMPTY STATE
            ========================== --}}

            <div class="empty-state">


                <div class="empty-icon">

                    🎫

                </div>


                <h3>

                    Belum Ada Event

                </h3>


                <p>

                    Saat ini belum ada event yang tersedia.
                    Silakan kembali lagi nanti.

                </p>


            </div>


        @endif


    </main>


    {{-- =========================
         FOOTER
    ========================== --}}

    <footer>

        © {{ date('Y') }}

        <strong>

            Ticketify

        </strong>

        — Platform Event & Ticketing

    </footer>


</body>

</html>