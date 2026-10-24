<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $event->title }} | Ticketify</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --purple: #7047ef;
            --purple-dark: #29164f;
            --ink: #211a38;
            --muted: #77738b;
            --border: #eee9f8;
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
                radial-gradient(ellipse at 5% 5%, rgba(130, 97, 255, .12), transparent 30%),
                #f7f7fc;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 15px max(5%, calc((100% - 1120px) / 2));
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--ink);
            font-size: 22px;
            font-weight: 800;
        }

        .brand:hover {
            color: var(--purple);
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            color: white;
            border-radius: 14px;
            background: linear-gradient(135deg, #9878ff, #5c36e3);
            box-shadow: 0 7px 18px #7047ef35;
        }

        .brand-name {
            background: linear-gradient(90deg, #352064, #8961ff);
            color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            color: #625d78;
            font-size: 13px;
            font-weight: 700;
            padding: 11px 15px;
            border-radius: 11px;
        }

        .nav-link:hover {
            color: var(--purple);
            background: #f0ebff;
        }

        .nav-cta {
            padding: 12px 17px;
            border-radius: 11px;
            color: white;
            font-size: 12px;
            font-weight: 800;
            background: linear-gradient(135deg, #805bff, #5734dc);
            box-shadow: 0 6px 16px #7047ef35;
        }

        .nav-cta:hover {
            color: white;
            transform: translateY(-1px);
        }

        /* PAGE */
        .page-container {
            width: min(1120px, 92%);
            margin: 38px auto 70px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            color: #6d50cf;
            font-size: 13px;
            font-weight: 800;
        }

        .back-link:hover {
            color: #392078;
        }

        /* EVENT CARD */
        .event-card {
            overflow: hidden;
            margin-bottom: 28px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 25px;
            box-shadow: 0 16px 45px rgba(37, 23, 79, .07);
            animation: fadeUp .6s ease both;
        }

        /* POSTER UTUH, TIDAK DICROP */
        .poster-area {
            width: 100%;
            min-height: 280px;
            max-height: 680px;
            padding: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background:
                radial-gradient(ellipse at top, #e9e1ff, transparent 70%),
                #f4f1fb;
        }

        .event-poster {
            display: block;
            width: 100%;
            height: auto;
            max-height: 640px;
            object-fit: contain;
            object-position: center;
            border-radius: 14px;
        }

        .no-poster {
            width: 100%;
            min-height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 12px;
            color: #8c7abf;
            font-size: 14px;
            font-weight: 700;
        }

        .no-poster-icon {
            width: 75px;
            height: 75px;
            display: grid;
            place-items: center;
            border-radius: 23px;
            background: #e8e0ff;
            font-size: 32px;
        }

        .event-details {
            padding: 30px 34px 34px;
        }

        .event-badge {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 12px;
            color: #6842d3;
            background: #f0ebff;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .6px;
            text-transform: uppercase;
        }

        .event-title {
            margin: 0 0 22px;
            font-size: clamp(26px, 4vw, 38px);
            font-weight: 800;
            line-height: 1.25;
            letter-spacing: -1.2px;
            overflow-wrap: anywhere;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 16px;
            background: #faf9ff;
            border: 1px solid #f0ecfa;
            border-radius: 15px;
        }

        .info-icon {
            width: 42px;
            height: 42px;
            flex: 0 0 42px;
            display: grid;
            place-items: center;
            background: #eee8ff;
            border-radius: 13px;
            font-size: 19px;
        }

        .info-label {
            display: block;
            margin: 2px 0 5px;
            color: #8a849e;
            font-size: 11px;
            font-weight: 700;
        }

        .info-value {
            color: #302747;
            font-size: 13px;
            font-weight: 800;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .description {
            margin-top: 24px;
            padding: 23px;
            border-left: 4px solid var(--purple);
            border-radius: 0 14px 14px 0;
            background: #faf9ff;
            color: #625d76;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .description-title {
            margin-bottom: 9px;
            color: var(--ink);
            font-size: 16px;
            font-weight: 800;
        }

        /* TICKET SECTION */
        .ticket-section {
            padding: 30px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 25px;
            box-shadow: 0 16px 45px rgba(37, 23, 79, .06);
            animation: fadeUp .75s ease both;
        }

        .ticket-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .section-kicker {
            margin-bottom: 8px;
            color: var(--purple);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .ticket-heading h2 {
            margin: 0;
            font-size: clamp(23px, 3vw, 30px);
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .ticket-count {
            padding: 10px 13px;
            border: 1px solid #e9e3fa;
            border-radius: 11px;
            color: #6746d0;
            background: #faf8ff;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .tickets {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .ticket-card {
            position: relative;
            overflow: hidden;
            padding: 24px 21px 21px;
            border: 1px solid #e9e5f3;
            border-radius: 19px;
            background: linear-gradient(145deg, #fff, #fcfbff);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .ticket-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #9b7aff, #6840e9);
        }

        .ticket-card:hover {
            transform: translateY(-5px);
            border-color: #d8ccff;
            box-shadow: 0 15px 30px #39207812;
        }

        .ticket-icon {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            margin-bottom: 16px;
            border-radius: 14px;
            background: #f0ebff;
            font-size: 22px;
        }

        .ticket-name {
            margin-bottom: 9px;
            color: #302344;
            font-size: 18px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .price {
            margin: 0 0 16px;
            color: #6741dc;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.7px;
            overflow-wrap: anywhere;
        }

        .price-label {
            display: block;
            margin-bottom: 3px;
            color: #8a849e;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .stock-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            padding: 12px;
            background: #f7f6fc;
            border-radius: 11px;
            color: #77718b;
            font-size: 11px;
        }

        .stock-value {
            color: #26815d;
            font-weight: 800;
        }

        .stock-empty {
            color: #cf3857;
            font-weight: 800;
        }

        .btn-buy {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            width: 100%;
            padding: 14px 12px;
            border: none;
            border-radius: 12px;
            color: white;
            background: linear-gradient(135deg, #805bff, #5936dd);
            box-shadow: 0 7px 17px #7047ef2e;
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            transition: .25s;
        }

        .btn-buy:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 11px 24px #7047ef40;
        }

        .btn-disabled {
            display: block;
            width: 100%;
            padding: 14px 12px;
            border-radius: 12px;
            text-align: center;
            color: #8a8498;
            background: #eeedf2;
            font-size: 12px;
            font-weight: 800;
        }

        .empty-tickets {
            grid-column: 1 / -1;
            padding: 35px 20px;
            text-align: center;
            color: var(--muted);
            background: #faf9ff;
            border: 1px dashed #dcd3f4;
            border-radius: 16px;
            font-size: 13px;
            line-height: 1.8;
        }

        /* FOOTER */
        .footer {
            padding: 25px 15px;
            text-align: center;
            color: #858098;
            border-top: 1px solid #eae7f2;
            font-size: 12px;
        }

        .footer strong {
            color: #6343d1;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 800px) {
            .tickets {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .poster-area {
                min-height: 220px;
            }

            .event-poster {
                max-height: 540px;
            }
        }

        @media (max-width: 560px) {
            .navbar {
                padding: 12px 4%;
            }

            .brand {
                font-size: 18px;
            }

            .brand-icon {
                width: 37px;
                height: 37px;
            }

            .nav-link {
                display: none;
            }

            .nav-cta {
                padding: 10px 12px;
                font-size: 11px;
            }

            .page-container {
                width: 92%;
                margin-top: 22px;
            }

            .poster-area {
                min-height: 150px;
                max-height: none;
                padding: 10px;
            }

            .event-poster {
                max-height: none;
                border-radius: 10px;
            }

            .event-details {
                padding: 23px 18px;
            }

            .event-title {
                font-size: 27px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .description {
                padding: 17px;
            }

            .ticket-section {
                padding: 22px 16px;
            }

            .ticket-heading {
                align-items: flex-start;
            }

            .ticket-heading h2 {
                font-size: 23px;
            }

            .ticket-count {
                font-size: 10px;
                padding: 8px;
            }

            .tickets {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .ticket-card {
                padding: 22px 19px 19px;
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

<nav class="navbar">
    <a href="{{ url('/') }}" class="brand">
        <span class="brand-icon">🎟</span>
        <span class="brand-name">Ticketify</span>
    </a>

    <div class="nav-links">
        <a href="{{ url('/') }}" class="nav-link">Beranda</a>

        @auth
            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
            <a href="{{ route('tickets.index') }}" class="nav-cta">Tiket Saya →</a>
        @else
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="nav-cta">Daftar Sekarang →</a>
        @endauth
    </div>
</nav>


<main class="page-container">

    <a href="{{ url('/events') }}" class="back-link">
        ← Kembali ke daftar event
    </a>

    {{-- DETAIL EVENT --}}
    <section class="event-card">

        <div class="poster-area">
            @if($event->banner)
                <img
                    src="{{ asset('storage/' . $event->banner) }}"
                    class="event-poster"
                    alt="Poster {{ $event->title }}"
                >
            @else
                <div class="no-poster">
                    <div class="no-poster-icon">🎟️</div>
                    Poster event belum tersedia
                </div>
            @endif
        </div>

        <div class="event-details">

            <span class="event-badge">
                ✦ {{ $event->category ?: 'Event Spesial' }}
            </span>

            <h1 class="event-title">{{ $event->title }}</h1>

            <div class="info-grid">

                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div>
                        <span class="info-label">LOKASI EVENT</span>
                        <div class="info-value">
                            {{ $event->location ?: 'Lokasi akan diumumkan' }}
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">📅</div>
                    <div>
                        <span class="info-label">TANGGAL EVENT</span>
                        <div class="info-value">
                            @if($event->event_date)
                                {{ \Illuminate\Support\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                            @else
                                Tanggal akan diumumkan
                            @endif
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">🕒</div>
                    <div>
                        <span class="info-label">WAKTU EVENT</span>
                        <div class="info-value">
                            @if($event->event_time)
                                {{ \Illuminate\Support\Str::substr($event->event_time, 0, 5) }} WIB
                            @else
                                Waktu akan diumumkan
                            @endif
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">🎫</div>
                    <div>
                        <span class="info-label">PENYELENGGARAAN</span>
                        <div class="info-value">Event resmi Ticketify</div>
                    </div>
                </div>

            </div>

            @if($event->description)
                <div class="description">
                    <div class="description-title">Tentang Event</div>
                    {!! nl2br(e($event->description)) !!}
                </div>
            @endif

        </div>
    </section>


    {{-- PILIH TIKET --}}
    <section class="ticket-section" id="pilih-tiket">

        <div class="ticket-heading">
            <div>
                <div class="section-kicker">YOUR EXPERIENCE STARTS HERE</div>
                <h2>Pilih Tiket Favoritmu ✨</h2>
            </div>

            <div class="ticket-count">
                🎟 {{ $event->ticketTypes->count() }} Jenis Tiket
            </div>
        </div>

        <div class="tickets">

            @forelse($event->ticketTypes as $ticket)

                @php
                    $available = max((int) $ticket->stock - (int) $ticket->sold, 0);
                @endphp

                <article class="ticket-card">

                    <div class="ticket-icon">🎫</div>

                    <div class="ticket-name">
                        {{ $ticket->name }}
                    </div>

                    <span class="price-label">HARGA TIKET</span>

                    <div class="price">
                        Rp {{ number_format($ticket->price, 0, ',', '.') }}
                    </div>

                    <div class="stock-row">
                        <span>Stok tersedia</span>

                        @if($available > 0)
                            <span class="stock-value">{{ $available }} tiket</span>
                        @else
                            <span class="stock-empty">Habis</span>
                        @endif
                    </div>

                    @if($available > 0)

                        @auth
                            <a href="{{ route('checkout', $ticket) }}" class="btn-buy">
                                Beli Tiket <span>→</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-buy">
                                Login untuk Membeli <span>→</span>
                            </a>
                        @endauth

                    @else
                        <div class="btn-disabled">
                            Tiket Habis
                        </div>
                    @endif

                </article>

            @empty

                <div class="empty-tickets">
                    <div style="font-size: 30px; margin-bottom: 10px;">🎟️</div>
                    <strong>Belum ada jenis tiket</strong><br>
                    Jenis tiket untuk event ini belum tersedia.
                    Silakan kembali lagi nanti.
                </div>

            @endforelse

        </div>

    </section>

</main>


<footer class="footer">
    Made with ✨ by <strong>Ticketify</strong>
    &nbsp;•&nbsp; Your Event, Your Moment.
</footer>

</body>
</html>
