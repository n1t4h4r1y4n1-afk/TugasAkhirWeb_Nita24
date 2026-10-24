<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Tiket | Ticketify</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple: #7047ee;
            --purple-dark: #28164f;
            --ink: #211936;
            --muted: #827c96;
            --border: #eee8fa;
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
                radial-gradient(ellipse at 10% 5%, #e9e1ff, transparent 35%),
                radial-gradient(ellipse at 95% 80%, #fce7f3, transparent 30%),
                #f7f6fc;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            height: 76px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 max(calc((100% - 1100px) / 2), 24px);
            background: rgba(255,255,255,.88);
            border-bottom: 1px solid rgba(100,70,160,.10);
            backdrop-filter: blur(15px);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--purple-dark);
            font-size: 21px;
            font-weight: 800;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: white;
            background: linear-gradient(135deg, #a18aff, #6138e8);
            box-shadow: 0 8px 20px #7047ee40;
        }

        .nav-back {
            color: #6d6683;
            font-size: 13px;
            font-weight: 700;
        }

        .page {
            width: min(1100px, calc(100% - 36px));
            margin: 42px auto 65px;
        }

        .page-heading {
            margin-bottom: 27px;
        }

        .eyebrow {
            color: var(--purple);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .page-heading h1 {
            margin: 0;
            font-size: clamp(28px, 4vw, 38px);
            font-weight: 800;
            letter-spacing: -1.5px;
        }

        .page-heading p {
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .checkout-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 370px;
            align-items: start;
            gap: 25px;
        }

        .panel {
            padding: 27px;
            border: 1px solid rgba(110,80,170,.10);
            border-radius: 23px;
            background: rgba(255,255,255,.95);
            box-shadow: 0 15px 40px rgba(39,25,79,.07);
        }

        .panel-title {
            margin: 0 0 23px;
            font-size: 18px;
            font-weight: 800;
        }

        .event-summary {
            overflow: hidden;
            padding: 0;
        }

        .event-banner {
            min-height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 28px;
            color: white;
            background:
                radial-gradient(circle at 85% 15%, #a58aff, transparent 35%),
                linear-gradient(130deg, #241343, #7147d9);
        }

        .event-banner span {
            font-size: 48px;
            filter: drop-shadow(0 10px 15px #0003);
        }

        .event-details {
            padding: 25px;
        }

        .event-badge {
            display: inline-block;
            padding: 7px 11px;
            margin-bottom: 12px;
            color: #6944d5;
            background: #f0eaff;
            border-radius: 9px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .event-details h2 {
            margin: 0 0 17px;
            font-size: 23px;
            font-weight: 800;
            line-height: 1.45;
            overflow-wrap: anywhere;
        }

        .event-info {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            margin-top: 15px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .info-icon {
            width: 37px;
            height: 37px;
            flex: 0 0 37px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #f4f0ff;
        }

        .event-info strong {
            display: block;
            margin-bottom: 3px;
            color: var(--ink);
            font-size: 12px;
        }

        .ticket-panel {
            position: sticky;
            top: 25px;
        }

        .ticket-type {
            padding: 18px;
            border: 1px solid #e9e0ff;
            border-radius: 16px;
            background: linear-gradient(135deg, #faf8ff, #fff);
        }

        .ticket-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .ticket-name {
            margin-top: 7px;
            font-size: 20px;
            font-weight: 800;
        }

        .ticket-price {
            margin-top: 12px;
            color: var(--purple);
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .stock {
            margin-top: 8px;
            color: #77718b;
            font-size: 12px;
        }

        .stock-dot {
            display: inline-block;
            width: 7px;
            height: 7px;
            margin-right: 6px;
            border-radius: 50%;
            background: #26bd80;
        }

        .form-label {
            display: block;
            margin: 23px 0 10px;
            font-size: 13px;
            font-weight: 800;
        }

        .quantity-input {
            width: 100%;
            height: 49px;
            padding: 0 14px;
            border: 1px solid #e5dfef;
            border-radius: 12px;
            outline: none;
            background: white;
            color: var(--ink);
            font: inherit;
            font-size: 14px;
            transition: .2s;
        }

        .quantity-input:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 4px #7047ee18;
        }

        .total-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 23px;
            padding: 18px;
            border-radius: 15px;
            background: #f6f3ff;
        }

        .total-box span {
            color: #77718b;
            font-size: 12px;
        }

        .total-box strong {
            color: var(--purple-dark);
            font-size: 19px;
            font-weight: 800;
            text-align: right;
        }

        .btn-buy {
            width: 100%;
            min-height: 51px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            margin-top: 19px;
            border: 0;
            border-radius: 13px;
            color: white;
            background: linear-gradient(135deg, #8865ff, #5933dc);
            box-shadow: 0 10px 22px #7047ee35;
            font: inherit;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: .25s;
        }

        .btn-buy:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px #7047ee45;
        }

        .secure-note {
            margin-top: 16px;
            color: #89839b;
            font-size: 11px;
            line-height: 1.7;
            text-align: center;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #6e45d9;
            font-size: 12px;
            font-weight: 700;
        }

        .footer {
            padding: 24px;
            border-top: 1px solid #e9e4f1;
            color: #89839b;
            text-align: center;
            font-size: 12px;
        }

        .footer strong {
            color: var(--purple);
        }

        @media (max-width: 800px) {
            .checkout-layout {
                grid-template-columns: 1fr;
            }

            .ticket-panel {
                position: static;
            }

            .page {
                margin-top: 28px;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                height: 65px;
                padding: 0 18px;
            }

            .brand {
                font-size: 18px;
            }

            .panel {
                padding: 20px;
                border-radius: 19px;
            }

            .event-summary {
                padding: 0;
            }

            .event-banner {
                min-height: 135px;
            }

            .event-details {
                padding: 20px;
            }

            .event-details h2 {
                font-size: 20px;
            }

            .ticket-price {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ url('/') }}" class="brand">
        <span class="brand-icon">🎟</span>
        <span>Ticketify</span>
    </a>

    <a href="{{ url()->previous() }}" class="nav-back">← Kembali</a>
</nav>

<main class="page">

    <div class="page-heading">
        <div class="eyebrow">YOUR NEXT EXPERIENCE</div>
        <h1>Selesaikan Pemesanan ✨</h1>
        <p>Selangkah lagi menuju momen spesialmu. Periksa detail tiket sebelum melanjutkan.</p>
    </div>

    <div class="checkout-layout">

        <section class="panel event-summary">
            <div class="event-banner">
                <span>🎤</span>
            </div>

            <div class="event-details">
                <span class="event-badge">Detail Event</span>

                <h2>{{ $ticketType->event->title }}</h2>

                <div class="event-info">
                    <span class="info-icon">🎫</span>
                    <div>
                        <strong>Jenis Tiket</strong>
                        {{ $ticketType->name }}
                    </div>
                </div>

                <div class="event-info">
                    <span class="info-icon">📍</span>
                    <div>
                        <strong>Lokasi Event</strong>
                        {{ $ticketType->event->location ?: 'Lokasi akan diumumkan' }}
                    </div>
                </div>

                <div class="event-info">
                    <span class="info-icon">📅</span>
                    <div>
                        <strong>Tanggal Event</strong>
                        @if($ticketType->event->event_date)
                            {{ \Illuminate\Support\Carbon::parse($ticketType->event->event_date)->translatedFormat('d F Y') }}
                        @else
                            Akan diumumkan
                        @endif
                    </div>
                </div>

                <div class="event-info">
                    <span class="info-icon">💜</span>
                    <div>
                        <strong>Pengalaman Spesial</strong>
                        Siapkan dirimu untuk menikmati acara bersama Ticketify.
                    </div>
                </div>
            </div>
        </section>

        <section class="panel ticket-panel">
            <h2 class="panel-title">Ringkasan Pesanan</h2>

            <div class="ticket-type">
                <div class="ticket-label">Tiket pilihanmu</div>

                <div class="ticket-name">{{ $ticketType->name }}</div>

                <div class="ticket-price">
                    Rp {{ number_format($ticketType->price, 0, ',', '.') }}
                </div>

                <div class="stock">
                    <span class="stock-dot"></span>
                    Tersedia: {{ max($ticketType->stock - $ticketType->sold, 0) }} tiket
                </div>
            </div>

            <form action="{{ route('checkout.store', $ticketType) }}" method="POST">
                @csrf

                <label for="quantity" class="form-label">Jumlah Tiket</label>

                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    class="quantity-input"
                    value="{{ old('quantity', 1) }}"
                    min="1"
                    max="{{ max($ticketType->stock - $ticketType->sold, 1) }}"
                    required
                >

                @error('quantity')
                    <p style="color:#dc2626;font-size:12px;margin-top:8px;">
                        {{ $message }}
                    </p>
                @enderror

                <div class="total-box">
                    <div>
                        <span>Total Pembelian</span>
                    </div>
                    <strong id="totalPrice">
                        Rp {{ number_format($ticketType->price, 0, ',', '.') }}
                    </strong>
                </div>

                <button type="submit" class="btn-buy">
                    🎟 Beli Sekarang
                </button>

                <div class="secure-note">
                    Pastikan jumlah dan jenis tiket sudah benar sebelum melakukan pemesanan.
                </div>
            </form>

            <a href="{{ route('events.show', $ticketType->event) }}" class="back-link">
                ← Kembali ke Event
            </a>
        </section>

    </div>
</main>

<footer class="footer">
    Made with ✨ by <strong>Ticketify</strong> · Your Event, Your Moment.
</footer>

<script>
    const quantityInput = document.getElementById('quantity');
    const totalPrice = document.getElementById('totalPrice');
    const pricePerTicket = {{ (float) $ticketType->price }};
    const maxStock = {{ max($ticketType->stock - $ticketType->sold, 1) }};

    function updateTotal() {
        let quantity = parseInt(quantityInput.value, 10);

        if (!Number.isFinite(quantity) || quantity < 1) {
            quantity = 1;
        }

        if (quantity > maxStock) {
            quantity = maxStock;
            quantityInput.value = maxStock;
        }

        totalPrice.textContent = 'Rp ' +
            new Intl.NumberFormat('id-ID').format(pricePerTicket * quantity);
    }

    quantityInput.addEventListener('input', updateTotal);
    updateTotal();
</script>

</body>
</html>
