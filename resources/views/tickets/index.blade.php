<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tiket Saya | Ticketify</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple: #7047ef;
            --purple-dark: #291650;
            --ink: #211936;
            --muted: #817b96;
            --background: #f7f6fc;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            color: var(--ink);
            background:
                radial-gradient(ellipse at 10% 5%, rgba(130, 94, 255, .13), transparent 32%),
                radial-gradient(ellipse at 95% 35%, rgba(255, 125, 190, .09), transparent 28%),
                var(--background);
        }

        a {
            text-decoration: none;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 10;
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid #eee9f8;
        }

        .nav-inner {
            max-width: 1180px;
            margin: auto;
            padding: 15px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--ink);
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            color: white;
            border-radius: 14px;
            background: linear-gradient(135deg, #9a7aff, #6138e7);
            box-shadow: 0 7px 18px #7047ef35;
        }

        .brand-name {
            color: var(--purple);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            padding: 11px 15px;
            color: #69627e;
            font-size: 13px;
            font-weight: 700;
            border-radius: 11px;
            transition: .2s;
        }

        .nav-link:hover {
            color: var(--purple);
            background: #f0ebff;
        }

        .page {
            width: min(1120px, calc(100% - 40px));
            margin: 42px auto 75px;
        }

        .page-header {
            position: relative;
            overflow: hidden;
            padding: 35px 38px;
            margin-bottom: 28px;
            border-radius: 25px;
            color: white;
            background:
                radial-gradient(circle at 90% 0%, #a68bff80, transparent 28%),
                linear-gradient(120deg, #251443, #5830a0 65%, #8155e8);
            box-shadow: 0 18px 40px #39216e24;
        }

        .page-header::after {
            content: "🎟️";
            position: absolute;
            right: 55px;
            top: 50%;
            transform: translateY(-50%) rotate(12deg);
            width: 100px;
            height: 100px;
            display: grid;
            place-items: center;
            border: 1px solid #ffffff45;
            border-radius: 27px;
            background: #ffffff18;
            font-size: 48px;
        }

        .eyebrow {
            margin-bottom: 10px;
            color: #dfd1ff;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .page-header h1 {
            margin: 0;
            font-size: clamp(28px, 4vw, 38px);
            font-weight: 800;
            letter-spacing: -1.2px;
        }

        .page-header p {
            max-width: 600px;
            margin: 12px 0 0;
            color: #e6ddfa;
            font-size: 13px;
            line-height: 1.8;
        }

        .alert-success {
            padding: 15px 18px;
            margin-bottom: 24px;
            color: #176b4b;
            background: #e2fbef;
            border: 1px solid #c5f1dc;
            border-radius: 13px;
            font-size: 13px;
            font-weight: 600;
        }

        .alert-error {
            padding: 15px 18px;
            margin-bottom: 24px;
            color: #a52b43;
            background: #fff0f2;
            border: 1px solid #ffd7de;
            border-radius: 13px;
            font-size: 13px;
        }

        .ticket-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .ticket-card {
            overflow: hidden;
            border: 1px solid #ece7f8;
            border-radius: 21px;
            background: white;
            box-shadow: 0 10px 30px #2414430b;
            transition: transform .25s, box-shadow .25s;
            animation: appear .5s ease both;
        }

        .ticket-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 38px #39216e18;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ticket-top {
            position: relative;
            padding: 24px 24px 22px;
            color: white;
            background: linear-gradient(120deg, #2a174c, #6240b4);
        }

        .ticket-top::after {
            content: "";
            position: absolute;
            right: -25px;
            top: -55px;
            width: 160px;
            height: 160px;
            border: 1px solid #ffffff22;
            border-radius: 50%;
        }

        .ticket-top-label {
            position: relative;
            z-index: 1;
            color: #d9caff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.7px;
            text-transform: uppercase;
        }

        .ticket-top h2 {
            position: relative;
            z-index: 1;
            margin: 12px 0 0;
            font-size: 21px;
            line-height: 1.45;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .ticket-type {
            position: relative;
            z-index: 1;
            display: inline-block;
            margin-top: 12px;
            padding: 7px 11px;
            border: 1px solid #ffffff45;
            border-radius: 9px;
            background: #ffffff18;
            color: white;
            font-size: 11px;
            font-weight: 700;
        }

        .ticket-body {
            padding: 22px 24px 24px;
        }

        .event-details {
            display: grid;
            gap: 13px;
        }

        .detail-row {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
        }

        .detail-icon {
            width: 35px;
            height: 35px;
            flex: 0 0 35px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            background: #f2edff;
            font-size: 15px;
        }

        .detail-row strong {
            display: block;
            margin-bottom: 2px;
            color: #38304d;
            font-size: 11px;
        }

        .ticket-code-label {
            margin-top: 21px;
            color: #827b98;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.3px;
        }

        .ticket-code {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-top: 8px;
            padding: 13px 14px;
            border: 1px dashed #c9b9fa;
            border-radius: 11px;
            background: #f8f5ff;
            color: #5032a4;
            font-size: 12px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .ticket-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 17px;
            padding: 8px 11px;
            border-radius: 100px;
            font-size: 10px;
            font-weight: 800;
        }

        .ticket-status.active {
            color: #18794e;
            background: #e0f8eb;
        }

        .ticket-status.used {
            color: #6550a1;
            background: #eee8ff;
        }

        .ticket-status.cancelled {
            color: #a92e43;
            background: #ffeaed;
        }

        .ticket-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-ticket {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 17px;
            color: white;
            background: linear-gradient(135deg, #805bff, #5936dd);
            border-radius: 11px;
            font-size: 12px;
            font-weight: 800;
            box-shadow: 0 6px 15px #7047ef25;
            transition: .2s;
        }

        .btn-ticket:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px #7047ef35;
        }

        .empty-state {
            padding: 65px 25px;
            text-align: center;
            border: 1px solid #ece7f8;
            border-radius: 23px;
            background: white;
            box-shadow: 0 10px 30px #24144308;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            display: grid;
            place-items: center;
            margin: 0 auto 20px;
            border-radius: 25px;
            background: #f0eaff;
            font-size: 36px;
        }

        .empty-state h2 {
            margin: 0;
            font-size: 23px;
            font-weight: 800;
        }

        .empty-state p {
            margin: 12px 0 22px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .footer {
            padding: 25px 15px;
            border-top: 1px solid #eae5f4;
            text-align: center;
            color: #89829b;
            font-size: 11px;
        }

        .footer strong {
            color: var(--purple);
        }

        @media (max-width: 760px) {
            .ticket-list {
                grid-template-columns: 1fr;
            }

            .page {
                margin-top: 25px;
            }

            .page-header {
                padding: 28px 24px;
            }

            .page-header::after {
                right: 20px;
                width: 65px;
                height: 65px;
                border-radius: 20px;
                font-size: 32px;
                opacity: .6;
            }

            .page-header p {
                max-width: 78%;
            }
        }

        @media (max-width: 480px) {
            .nav-inner {
                padding: 12px 16px;
            }

            .brand {
                font-size: 19px;
            }

            .nav-link {
                padding: 9px;
                font-size: 11px;
            }

            .page {
                width: calc(100% - 28px);
            }

            .page-header p {
                max-width: 100%;
            }

            .page-header::after {
                display: none;
            }

            .ticket-top,
            .ticket-body {
                padding-left: 19px;
                padding-right: 19px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="nav-inner">
        <a href="{{ url('/') }}" class="brand">
            <span class="brand-icon">🎟️</span>
            <span class="brand-name">Ticketify</span>
        </a>

        <div class="nav-links">
            <a href="{{ url('/') }}" class="nav-link">Beranda</a>
            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        </div>
    </div>
</nav>

<main class="page">

    <header class="page-header">
        <div class="eyebrow">YOUR EVENT COLLECTION</div>
        <h1>🎟️ Tiket Saya</h1>
        <p>
            Semua tiket event yang kamu miliki ada di sini.
            Buka E-Ticket sebelum datang ke lokasi event dan siapkan kode tiketmu.
        </p>
    </header>

    @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if($tickets->count() > 0)

        <div class="ticket-list">

            @foreach($tickets as $ticket)

                <article class="ticket-card">

                    <div class="ticket-top">
                        <div class="ticket-top-label">TICKETIFY • E-TICKET</div>

                        <h2>
                            {{ $ticket->event->title ?? 'Event Ticketify' }}
                        </h2>

                        <span class="ticket-type">
                            {{ $ticket->ticketType->name ?? 'Tiket Event' }}
                        </span>
                    </div>

                    <div class="ticket-body">

                        <div class="event-details">

                            <div class="detail-row">
                                <span class="detail-icon">📍</span>
                                <div>
                                    <strong>LOKASI EVENT</strong>
                                    {{ $ticket->event->location ?? 'Lokasi akan diumumkan' }}
                                </div>
                            </div>

                            <div class="detail-row">
                                <span class="detail-icon">📅</span>
                                <div>
                                    <strong>TANGGAL EVENT</strong>

                                    @if($ticket->event && $ticket->event->event_date)
                                        {{ \Illuminate\Support\Carbon::parse($ticket->event->event_date)->translatedFormat('d F Y') }}
                                    @else
                                        Tanggal akan diumumkan
                                    @endif
                                </div>
                            </div>

                            <div class="detail-row">
                                <span class="detail-icon">🕒</span>
                                <div>
                                    <strong>WAKTU EVENT</strong>
                                    {{ $ticket->event->event_time ?? 'Waktu akan diumumkan' }}
                                </div>
                            </div>

                        </div>

                        <div class="ticket-code-label">KODE TIKET</div>

                        <div class="ticket-code">
                            <span>{{ $ticket->ticket_code }}</span>
                        </div>

                        @php
                            $ticketStatus = strtolower((string) $ticket->status);
                        @endphp

                        @if($ticketStatus === 'used')
                            <div class="ticket-status used">
                                ✓ SUDAH DIGUNAKAN
                            </div>
                        @elseif($ticketStatus === 'cancelled')
                            <div class="ticket-status cancelled">
                                ✕ DIBATALKAN
                            </div>
                        @else
                            <div class="ticket-status active">
                                ✓ AKTIF
                            </div>
                        @endif

                        <div class="ticket-actions">
                            <a
                                href="{{ route('tickets.show', $ticket) }}"
                                class="btn-ticket"
                            >
                                Lihat E-Ticket →
                            </a>
                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    @else

        <div class="empty-state">
            <div class="empty-icon">🎫</div>

            <h2>Belum Ada Tiket</h2>

            <p>
                Kamu belum memiliki tiket event.
                Yuk, temukan event favoritmu dan ciptakan momen yang berkesan!
            </p>

            <a href="{{ route('events.index') }}" class="btn-ticket">
                Jelajahi Event →
            </a>
        </div>

    @endif

</main>

<footer class="footer">
    Made with ✨ by <strong>Ticketify</strong> • Your Event, Your Moment.
</footer>

</body>
</html>
