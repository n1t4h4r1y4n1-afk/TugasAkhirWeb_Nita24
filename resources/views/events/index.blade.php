
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Event Tersedia | Ticketify</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --purple: #6c45ef;
            --purple-dark: #24164f;
            --ink: #19152e;
            --muted: #77758d;
            --surface: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            color: var(--ink);
            background:
                radial-gradient(ellipse at 8% 12%, rgba(134, 104, 255, .13), transparent 30%),
                radial-gradient(ellipse at 95% 30%, rgba(255, 135, 196, .10), transparent 28%),
                #f7f7fc;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */
        .navbar-custom {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(105, 82, 180, .10);
        }

        .nav-inner {
            max-width: 1280px;
            margin: auto;
            padding: 15px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--ink);
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .brand:hover {
            color: var(--purple);
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            color: white;
            font-size: 22px;
            border-radius: 14px;
            background: linear-gradient(135deg, #9879ff, #6139e8);
            box-shadow: 0 8px 22px rgba(108, 69, 239, .28);
        }

        .brand span:last-child {
            background: linear-gradient(90deg, #352064, #8961ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link-custom {
            padding: 11px 17px;
            color: #625d78;
            font-size: 13px;
            font-weight: 700;
            border-radius: 12px;
            transition: .25s;
        }

        .nav-link-custom:hover {
            background: #f0ecff;
            color: var(--purple);
        }

        .nav-button {
            padding: 11px 19px;
            color: white;
            font-size: 13px;
            font-weight: 700;
            border-radius: 12px;
            background: linear-gradient(135deg, #805bff, #5734dc);
            box-shadow: 0 7px 18px rgba(108, 69, 239, .22);
            transition: .25s;
        }

        .nav-button:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 11px 25px rgba(108, 69, 239, .32);
        }

        /* HERO */
        .hero {
            max-width: 1280px;
            margin: 35px auto 0;
            padding: 0 28px;
        }

        .hero-panel {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            min-height: 330px;
            padding: 54px 58px;
            display: flex;
            align-items: center;
            border-radius: 30px;
            color: white;
            background:
                radial-gradient(circle at 85% 15%, rgba(190, 160, 255, .45), transparent 23%),
                radial-gradient(circle at 90% 100%, rgba(255, 113, 186, .22), transparent 35%),
                linear-gradient(120deg, #211341 0%, #432278 52%, #7047db 100%);
            box-shadow: 0 22px 55px rgba(54, 33, 103, .19);
        }

        .hero-panel::before,
        .hero-panel::after {
            content: "";
            position: absolute;
            z-index: -1;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-panel::before {
            width: 340px;
            height: 340px;
            right: 7%;
            top: -160px;
        }

        .hero-panel::after {
            width: 420px;
            height: 420px;
            right: -25px;
            bottom: -290px;
        }

        .hero-copy {
            max-width: 690px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            margin-bottom: 19px;
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 100px;
            background: rgba(255,255,255,.09);
            color: #e4d9ff;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.4px;
        }

        .hero h1 {
            max-width: 650px;
            margin: 0 0 16px;
            font-size: clamp(34px, 4.5vw, 55px);
            line-height: 1.14;
            font-weight: 800;
            letter-spacing: -2px;
        }

        .hero h1 span {
            color: #d2bcff;
        }

        .hero p {
            max-width: 540px;
            margin-bottom: 25px;
            color: #ded6f2;
            font-size: 14px;
            line-height: 1.9;
        }

        .hero-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 21px;
            color: #35205e;
            background: white;
            border-radius: 13px;
            font-size: 13px;
            font-weight: 800;
            transition: .25s;
        }

        .hero-button:hover {
            color: #35205e;
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(0,0,0,.15);
        }

        .hero-ticket {
            position: absolute;
            right: 11%;
            top: 50%;
            transform: translateY(-50%) rotate(10deg);
            width: 150px;
            height: 150px;
            display: grid;
            place-items: center;
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 38px;
            background: linear-gradient(145deg, rgba(255,255,255,.20), rgba(255,255,255,.05));
            box-shadow: 0 25px 60px rgba(0,0,0,.13);
            font-size: 76px;
            animation: floatTicket 4s ease-in-out infinite;
        }

        @keyframes floatTicket {
            0%, 100% { margin-top: 0; }
            50% { margin-top: -13px; }
        }

        /* SECTION */
        .events-section {
            max-width: 1280px;
            margin: 62px auto 80px;
            padding: 0 28px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 28px;
        }

        .section-label {
            margin-bottom: 10px;
            color: var(--purple);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .section-heading h2 {
            margin: 0;
            font-size: clamp(25px, 3vw, 34px);
            font-weight: 800;
            letter-spacing: -1px;
        }

        .section-heading p {
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .event-count {
            padding: 10px 14px;
            border: 1px solid #e9e4fb;
            border-radius: 12px;
            background: white;
            color: #5d42bd;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        /* EVENT CARDS */
        .events {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 27px;
        }

        .event-card {
            min-width: 0;
            overflow: hidden;
            border: 1px solid rgba(100, 78, 170, .09);
            border-radius: 23px;
            background: var(--surface);
            box-shadow: 0 12px 35px rgba(31, 23, 63, .06);
            transition: transform .3s ease, box-shadow .3s ease;
            animation: fadeUp .65s both;
        }

        .event-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 22px 48px rgba(47, 31, 96, .13);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /*
         * Poster tidak dipotong:
         * gambar menggunakan object-fit: contain.
         * Tinggi menyesuaikan ruang poster yang disediakan.
         */
        .poster-wrap {
            position: relative;
            width: 100%;
            height: 360px;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background:
                radial-gradient(ellipse at top, #eee8ff, transparent 65%),
                #f3f1f9;
        }

        .banner {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            transition: transform .45s ease;
        }

        .event-card:hover .banner {
            transform: scale(1.025);
        }

        .poster-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
            color: #8c7abf;
            font-weight: 700;
            font-size: 13px;
        }

        .placeholder-icon {
            width: 65px;
            height: 65px;
            display: grid;
            place-items: center;
            border-radius: 20px;
            background: #e8e0ff;
            font-size: 30px;
        }

        .event-content {
            padding: 23px 25px 25px;
        }

        .event-category {
            display: inline-block;
            margin-bottom: 12px;
            padding: 7px 10px;
            color: #6945d5;
            background: #f0ebff;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .6px;
            text-transform: uppercase;
        }

        .event-title {
            margin: 0 0 16px;
            color: #211a38;
            font-size: 21px;
            font-weight: 800;
            line-height: 1.45;
            overflow-wrap: anywhere;
        }

        .event-info {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin: 11px 0;
            color: #77738a;
            font-size: 13px;
            line-height: 1.6;
        }

        .info-icon {
            width: 32px;
            height: 32px;
            flex: 0 0 32px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: #f4f0ff;
            font-size: 14px;
        }

        .info-text strong {
            display: block;
            margin-bottom: 2px;
            color: #39334e;
            font-size: 12px;
        }

        .event-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 22px;
            padding-top: 19px;
            border-top: 1px solid #f0edf6;
        }

        .event-status {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #24835c;
            font-size: 11px;
            font-weight: 800;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #35c58a;
            box-shadow: 0 0 0 4px #e7f9f0;
        }

        .btn-event {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 12px 17px;
            color: white;
            background: linear-gradient(135deg, #805bff, #5936dd);
            border-radius: 12px;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
            box-shadow: 0 7px 17px rgba(108, 69, 239, .19);
            transition: .25s;
        }

        .btn-event:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(108, 69, 239, .3);
        }

        /* EMPTY STATE */
        .empty-state {
            grid-column: 1 / -1;
            padding: 65px 25px;
            text-align: center;
            background: white;
            border: 1px solid #eee9f9;
            border-radius: 23px;
            box-shadow: 0 12px 35px rgba(31, 23, 63, .05);
        }

        .empty-icon {
            width: 76px;
            height: 76px;
            margin: 0 auto 18px;
            display: grid;
            place-items: center;
            border-radius: 24px;
            background: #f0eaff;
            font-size: 34px;
        }

        .empty-state h3 {
            font-weight: 800;
        }

        .empty-state p {
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        /* FOOTER */
        .footer {
            padding: 25px;
            text-align: center;
            border-top: 1px solid #eae7f2;
            color: #858098;
            font-size: 12px;
        }

        .footer strong {
            color: #6343d1;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .hero-ticket {
                right: 7%;
                width: 110px;
                height: 110px;
                font-size: 55px;
            }

            .hero-copy {
                max-width: 75%;
            }

            .poster-wrap {
                height: 320px;
            }
        }

        @media (max-width: 650px) {
            .nav-inner {
                padding: 12px 17px;
            }

            .brand {
                font-size: 19px;
            }

            .brand-icon {
                width: 38px;
                height: 38px;
            }

            .nav-link-custom {
                display: none;
            }

            .nav-button {
                padding: 10px 13px;
                font-size: 12px;
            }

            .hero {
                margin-top: 20px;
                padding: 0 16px;
            }

            .hero-panel {
                min-height: 320px;
                padding: 32px 25px;
                border-radius: 24px;
            }

            .hero-copy {
                max-width: 100%;
                position: relative;
                z-index: 1;
            }

            .hero h1 {
                max-width: 100%;
                font-size: 36px;
                letter-spacing: -1.5px;
            }

            .hero p {
                max-width: 100%;
                font-size: 12px;
            }

            .hero-ticket {
                width: 76px;
                height: 76px;
                right: 20px;
                top: auto;
                bottom: 18px;
                transform: rotate(10deg);
                font-size: 37px;
                opacity: .32;
            }

            .events-section {
                margin-top: 43px;
                padding: 0 16px;
            }

            .section-heading {
                align-items: flex-start;
            }

            .section-heading h2 {
                font-size: 26px;
            }

            .section-heading p {
                font-size: 12px;
                line-height: 1.7;
            }

            .event-count {
                font-size: 10px;
                padding: 9px;
            }

            .events {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .poster-wrap {
                height: 330px;
                padding: 10px;
            }

            .event-content {
                padding: 20px;
            }

            .event-title {
                font-size: 19px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar-custom">
    <div class="nav-inner">

        <a href="{{ url('/') }}" class="brand">
            <span class="brand-icon">🎟</span>
            <span>Ticketify</span>
        </a>

        <div class="nav-actions">
            <a href="{{ url('/') }}" class="nav-link-custom">
                Beranda
            </a>

            @auth
                <a href="{{ route('dashboard') }}" class="nav-link-custom">
                    Dashboard
                </a>

                <a href="{{ route('dashboard') }}" class="nav-button">
                    Akun Saya →
                </a>
            @else
                <a href="{{ route('login') }}" class="nav-link-custom">
                    Login
                </a>

                <a href="{{ route('register') }}" class="nav-button">
                    Daftar Sekarang →
                </a>
            @endauth
        </div>

    </div>
</nav>


{{-- HERO --}}
<section class="hero">
    <div class="hero-panel">

        <div class="hero-copy">

            <div class="eyebrow">
                ✦ PLATFORM TIKET EVENT
            </div>

            <h1>
                Temukan Event.<br>
                <span>Ciptakan Momen.</span>
            </h1>

            <p>
                Dari konser musik hingga festival seru,
                temukan pengalaman menarik dan pesan tiket
                event favoritmu dengan mudah bersama Ticketify.
            </p>

            <a href="#daftar-event" class="hero-button">
                Jelajahi Event <span>↓</span>
            </a>

        </div>

        <div class="hero-ticket" aria-hidden="true">
            🎟️
        </div>

    </div>
</section>


{{-- DAFTAR EVENT --}}
<section class="events-section" id="daftar-event">

    <div class="section-heading">

        <div>
            <div class="section-label">DISCOVER YOUR NEXT MOMENT</div>

            <h2>Event Pilihan Untukmu ✨</h2>

            <p>
                Temukan event favorit dan jadikan momenmu lebih berkesan.
            </p>
        </div>

        <div class="event-count">
            🎫 {{ $events->count() }} Event
        </div>

    </div>


    <div class="events">

        @forelse($events as $event)

            <article class="event-card">

                {{-- POSTER UTUH --}}
                <div class="poster-wrap">

                    @if($event->banner)

                        <img
                            src="{{ asset('storage/' . $event->banner) }}"
                            class="banner"
                            alt="Poster {{ $event->title }}"
                            loading="lazy"
                        >

                    @else

                        <div class="poster-placeholder">
                            <div class="placeholder-icon">🎟️</div>
                            <span>Poster belum tersedia</span>
                        </div>

                    @endif

                </div>


                {{-- INFORMASI EVENT --}}
                <div class="event-content">

                    <span class="event-category">
                        {{ $event->category ?: 'Event Spesial' }}
                    </span>

                    <h3 class="event-title">
                        {{ $event->title }}
                    </h3>

                    <div class="event-info">
                        <span class="info-icon">📍</span>
                        <div class="info-text">
                            <strong>Lokasi Event</strong>
                            {{ $event->location ?: 'Lokasi akan diumumkan' }}
                        </div>
                    </div>

                    <div class="event-info">
                        <span class="info-icon">📅</span>
                        <div class="info-text">
                            <strong>Tanggal Event</strong>

                            @if($event->event_date)
                                {{ \Illuminate\Support\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                            @else
                                Tanggal akan diumumkan
                            @endif
                        </div>
                    </div>

                    @if($event->event_time)
                        <div class="event-info">
                            <span class="info-icon">🕒</span>
                            <div class="info-text">
                                <strong>Waktu Event</strong>
                                {{ \Illuminate\Support\Str::substr($event->event_time, 0, 5) }} WIB
                            </div>
                        </div>
                    @endif

                    <div class="event-footer">

                        <div class="event-status">
                            <span class="status-dot"></span>
                            Event tersedia
                        </div>

                        <a
                            href="{{ route('events.show', $event) }}"
                            class="btn-event"
                        >
                            Lihat Event <span>→</span>
                        </a>

                    </div>

                </div>

            </article>

        @empty

            <div class="empty-state">

                <div class="empty-icon">🎪</div>

                <h3>Belum Ada Event</h3>

                <p>
                    Event menarik akan segera hadir.
                    Silakan kembali lagi nanti!
                </p>

            </div>

        @endforelse

    </div>

</section>


{{-- FOOTER --}}
<footer class="footer">
    Made with ✨ by <strong>Ticketify</strong>
    &nbsp;•&nbsp; Your Event, Your Moment.
</footer>

</body>
</html>
