<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran - Ticketify</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
        }

        .container {
            width: 90%;
            max-width: 650px;
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
        }

        h1 {
            margin-top: 0;
        }

        .order-code {
            background: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }

        .total {
            font-size: 28px;
            font-weight: bold;
            margin: 20px 0;
        }

        label {
            display: block;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            background: #111827;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>
            Pembayaran
        </h1>

        <div class="order-code">

            Kode Order:

            <strong>
                {{ $order->order_code }}
            </strong>

        </div>

        @foreach($order->items as $item)

            <p>

                {{ $item->ticketType->event->title }}

                <br>

                {{ $item->ticketType->name }}

                × {{ $item->quantity }}

            </p>

        @endforeach

        <div class="total">

            Rp
            {{ number_format(
                $order->total_amount,
                0,
                ',',
                '.'
            ) }}

        </div>

        <form
            action="{{ route('payment.process', $order) }}"
            method="POST"
        >

            @csrf

            <h3>
                Pilih metode pembayaran
            </h3>

            <label>

                <input
                    type="radio"
                    name="payment_method"
                    value="bank_transfer"
                    required
                >

                Bank Transfer

            </label>

            <label>

                <input
                    type="radio"
                    name="payment_method"
                    value="qris"
                >

                QRIS

            </label>

            <label>

                <input
                    type="radio"
                    name="payment_method"
                    value="ewallet"
                >

                E-Wallet

            </label>

            <button type="submit">
                Bayar Sekarang
            </button>

        </form>

        <p style="margin-top:20px;color:#777;">
            * Untuk tahap awal, pembayaran masih berupa simulasi.
        </p>

    </div>

</div>

</body>

</html>