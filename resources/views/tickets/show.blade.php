<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket Premium | Ticketify</title>

    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --purple: #9b5cff;
            --purple-light: #c6a5ff;
            --dark: #11101b;
            --muted: #a7a4b8;
            --line: rgba(255,255,255,.12);
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 35px 18px 55px;
            font-family: Arial, Helvetica, sans-serif;
            color: #fff;
            background:
                radial-gradient(ellipse at 15% 5%, rgba(120,60,220,.23), transparent 35%),
                radial-gradient(ellipse at 90% 80%, rgba(68,40,150,.2), transparent 35%),
                #090911;
        }

        .page {
            max-width: 760px;
            margin: auto;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .brand {
            font-size: 21px;
            font-weight: 900;
            letter-spacing: 2px;
        }

        .brand span {
            color: var(--purple-light);
        }

        .eyebrow {
            color: var(--muted);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 6px;
        }

        .secure {
            border: 1px solid rgba(198,165,255,.35);
            background: rgba(155,92,255,.1);
            color: #d8c5ff;
            padding: 9px 13px;
            border-radius: 30px;
            font-size: 11px;
            white-space: nowrap;
        }

        .ticket {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(198,165,255,.25);
            border-radius: 25px;
            background: #171622;
            box-shadow: 0 25px 80px rgba(0,0,0,.45);
        }

        .ticket::before,
        .ticket::after {
            content: "";
            position: absolute;
            width: 210px;
            height: 210px;
            border-radius: 50%;
            border: 1px solid rgba(198,165,255,.1);
            pointer-events: none;
        }

        .ticket::before {
            top: -120px;
            right: -70px;
        }

        .ticket::after {
            bottom: 240px;
            left: -155px;
        }

        .ticket-header {
            position: relative;
            padding: 30px 32px;
            background: linear-gradient(120deg, #422078, #8c4be0 70%, #b16bff);
        }

        .ticket-header::after {
            content: "TICKETIFY • LIVE EXPERIENCE • TICKETIFY • LIVE EXPERIENCE";
            display: block;
            margin-top: 24px;
            padding-top: 12px;
            border-top: 1px solid rgba(255,255,255,.25);
            font-size: 9px;
            letter-spacing: 2px;
            opacity: .7;
            word-break: break-word;
        }

        .pass-label {
            display: inline-block;
            border: 1px solid rgba(255,255,255,.4);
            background: rgba(0,0,0,.12);
            padding: 7px 11px;
            border-radius: 30px;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        .ticket-header h1 {
            margin: 20px 0 8px;
            font-size: clamp(26px, 5vw, 39px);
            line-height: 1.15;
            overflow-wrap: anywhere;
        }

        .ticket-header p {
            margin: 0;
            font-size: 13px;
            color: #eee2ff;
        }

        .ticket-body {
            padding: 30px 32px;
        }

        .section-heading {
            margin: 0 0 18px;
            color: var(--purple-light);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 25px;
        }

        .detail {
            padding: 16px 0;
            border-bottom: 1px solid var(--line);
            min-width: 0;
        }

        .detail-label {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 8px;
        }

        .detail-value {
            font-size: 14px;
            line-height: 1.5;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .ticket-type {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 7px;
            color: #e2ceff;
            background: rgba(155,92,255,.17);
            border: 1px solid rgba(155,92,255,.25);
        }

        .perforation {
            position: relative;
            height: 1px;
            margin: 28px 0;
            border-top: 2px dashed rgba(255,255,255,.18);
        }

        .perforation::before,
        .perforation::after {
            content: "";
            position: absolute;
            top: -16px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #0c0b14;
        }

        .perforation::before {
            left: -48px;
        }

        .perforation::after {
            right: -48px;
        }

        .qr-layout {
            display: grid;
            grid-template-columns: 1fr 225px;
            gap: 25px;
            align-items: center;
        }

        .qr-copy h2 {
            margin: 0 0 12px;
            font-size: 23px;
        }

        .qr-copy p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .qr-note {
            margin-top: 18px;
            color: #d5c2ff;
            font-size: 11px;
            line-height: 1.6;
        }

        .qr-panel {
            padding: 17px;
            background: white;
            border-radius: 17px;
            text-align: center;
            box-shadow: 0 0 35px rgba(155,92,255,.13);
        }

        #qrcode {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 180px;
        }

        #qrcode img,
        #qrcode canvas {
            max-width: 100%;
            height: auto;
        }

        .qr-caption {
            color: #4c465b;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-top: 12px;
        }

        .code-panel {
            margin-top: 25px;
            padding: 17px 20px;
            background: #100f18;
            border: 1px solid var(--line);
            border-radius: 12px;
        }

        .code-label {
            color: var(--muted);
            font-size: 10px;
            letter-spacing: 1.5px;
            margin-bottom: 9px;
        }

        .code-value {
            color: #d9c5ff;
            font-family: monospace;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
            overflow-wrap: anywhere;
        }

        .status {
            margin-top: 20px;
            padding: 13px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: bold;
        }

        .status.active {
            color: #9bf2c0;
            background: rgba(34,197,94,.1);
            border: 1px solid rgba(34,197,94,.25);
        }

        .status.used {
            color: #d1d5db;
            background: rgba(156,163,175,.12);
            border: 1px solid rgba(156,163,175,.25);
        }

        .status.cancelled {
            color: #ffaaaa;
            background: rgba(239,68,68,.1);
            border: 1px solid rgba(239,68,68,.25);
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 47px;
            padding: 12px 16px;
            border-radius: 10px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-primary {
            color: white;
            background: linear-gradient(120deg, #7540c7, #a568ff);
        }

        .btn-primary:hover {
            filter: brightness(1.12);
            transform: translateY(-2px);
        }

        .btn-secondary {
            color: #e3d9f7;
            background: #22202e;
            border-color: var(--line);
        }

        .btn-secondary:hover {
            background: #302b40;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777287;
            font-size: 10px;
            letter-spacing: 1px;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 12px 35px;
            }

            .topbar {
                align-items: flex-start;
            }

            .brand {
                font-size: 18px;
            }

            .secure {
                font-size: 9px;
                padding: 8px;
            }

            .ticket-header,
            .ticket-body {
                padding: 23px 20px;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .qr-layout {
                grid-template-columns: 1fr;
            }

            .qr-panel {
                max-width: 250px;
                width: 100%;
                margin: 0 auto;
            }

            .actions {
                flex-direction: column;
            }

            .perforation::before {
                left: -36px;
            }

            .perforation::after {
                right: -36px;
            }
        }

        @media print {
            @page {
                size: A4;
                margin: 12mm;
            }

            body {
                padding: 0;
                background: white;
                color: #111;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .page {
                max-width: 100%;
            }

            .topbar,
            .actions,
            .footer {
                display: none !important;
            }

            .ticket {
                box-shadow: none;
                break-inside: avoid;
                border: 1px solid #aaa;
            }

            .ticket-header {
                background: #422078 !important;
            }

            .ticket-body {
                padding: 20px;
            }

            .perforation::before,
            .perforation::after {
                display: none;
            }
        }
    </style>
</head>

<body>
<div class="page">

    <div class="topbar">
        <div>
            <div class="brand">🎟 TICKET<span>IFY</span></div>
            <div class="eyebrow">Your pass to unforgettable moments</div>
        </div>
        <div class="secure">✦ OFFICIAL E-TICKET</div>
    </div>

    <main class="ticket">
        <header class="ticket-header">
            <span class="pass-label">ADMISSION PASS</span>

            <h1>{{ $ticket->event->title }}</h1>

            <p>
                Simpan tiket ini dan tunjukkan QR Code kepada petugas
                saat memasuki acara.
            </p>
        </header>

        <div class="ticket-body">
            <h2 class="section-heading">Informasi Pemegang Tiket</h2>

            <div class="details">
                <div class="detail">
                    <div class="detail-label">JENIS TIKET</div>
                    <div class="detail-value">
                        <span class="ticket-type">{{ $ticket->ticketType->name }}</span>
                    </div>
                </div>

                <div class="detail">
                    <div class="detail-label">NAMA PEMILIK</div>
                    <div class="detail-value">{{ $ticket->user->name }}</div>
                </div>

                <div class="detail">
                    <div class="detail-label">EMAIL PEMILIK</div>
                    <div class="detail-value">{{ $ticket->user->email }}</div>
                </div>

                <div class="detail">
                    <div class="detail-label">LOKASI ACARA</div>
                    <div class="detail-value">{{ $ticket->event->location }}</div>
                </div>

                <div class="detail">
                    <div class="detail-label">TANGGAL ACARA</div>
                    <div class="detail-value">
                        {{ $ticket->event->event_date->format('d M Y') }}
                    </div>
                </div>

                <div class="detail">
                    <div class="detail-label">WAKTU ACARA</div>
                    <div class="detail-value">{{ $ticket->event->event_time }}</div>
                </div>
            </div>

            <div class="perforation"></div>

            <div class="qr-layout">
                <div class="qr-copy">
                    <h2>Ready to enter?</h2>
                    <p>
                        Ini adalah tiket digital milikmu. Siapkan QR Code
                        ini ketika tiba di pintu masuk acara.
                    </p>
                    <div class="qr-note">
                        ✦ Satu tiket untuk satu kali pemindaian masuk.<br>
                        ✦ Jangan bagikan QR Code kepada orang lain.
                    </div>
                </div>

                <div class="qr-panel">
                    <div id="qrcode"></div>
                    <div class="qr-caption">SCAN FOR ADMISSION</div>
                </div>
            </div>

            <div class="code-panel">
                <div class="code-label">UNIQUE TICKET CODE</div>
                <div class="code-value">{{ $ticket->ticket_code }}</div>
            </div>

            @if($ticket->status === 'active')
                <div class="status active">
                    <span>●</span>
                    <span>TIKET AKTIF — SIAP DIGUNAKAN</span>
                </div>
            @elseif($ticket->status === 'used')
                <div class="status used">
                    <span>●</span>
                    <span>TIKET SUDAH DIGUNAKAN</span>
                </div>
            @else
                <div class="status cancelled">
                    <span>●</span>
                    <span>TIKET DIBATALKAN</span>
                </div>
            @endif

            <div class="actions">
                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
                    ← Kembali ke Tiket Saya
                </a>

                <button type="button" onclick="window.print()" class="btn btn-primary">
                    ⎙ Cetak E-Ticket
                </button>
            </div>
        </div>
    </main>

    <div class="footer">
        TICKETIFY · YOUR EVENT, YOUR MOMENT
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const qrContainer = document.getElementById('qrcode');
        const ticketCode = @json($ticket->ticket_code);

        if (qrContainer && ticketCode && typeof QRCode !== 'undefined') {
            new QRCode(qrContainer, {
                text: ticketCode,
                width: 180,
                height: 180,
                colorDark: '#11101b',
                colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.H
            });
        } else if (qrContainer) {
            qrContainer.textContent = 'QR Code gagal dimuat. Periksa koneksi internet.';
        }
    });
</script>
</body>
</html>
