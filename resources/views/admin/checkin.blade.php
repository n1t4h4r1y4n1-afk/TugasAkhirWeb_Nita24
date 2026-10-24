<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>Check-In - Ticketify</title>


    {{-- QR SCANNER LIBRARY --}}
    <script src="https://unpkg.com/html5-qrcode"></script>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f5f7fb;

            color: #111827;

        }


        .container {

            width: 92%;

            max-width: 700px;

            margin: 40px auto;

        }


        /* =========================
           HEADER
        ========================= */

        .header {

            background: #111827;

            color: white;

            padding: 25px;

            border-radius: 18px 18px 0 0;

            text-align: center;

        }


        .header h1 {

            margin: 0;

            font-size: 28px;

        }


        .header p {

            margin: 8px 0 0;

            color: #d1d5db;

        }


        /* =========================
           CARD
        ========================= */

        .card {

            background: white;

            padding: 25px;

            border-radius: 0 0 18px 18px;

            box-shadow:
                0 10px 30px
                rgba(0, 0, 0, 0.10);

        }


        /* =========================
           SCANNER
        ========================= */

        #reader {

            width: 100%;

            max-width: 500px;

            margin: 0 auto;

            overflow: hidden;

            border-radius: 15px;

        }


        .scanner-title {

            text-align: center;

            font-size: 20px;

            font-weight: bold;

            margin-bottom: 20px;

        }


        .scanner-description {

            text-align: center;

            color: #6b7280;

            font-size: 14px;

            margin-bottom: 20px;

            line-height: 1.5;

        }


        /* =========================
           RESULT
        ========================= */

        .result {

            display: none;

            margin-top: 25px;

            padding: 20px;

            border-radius: 15px;

            text-align: center;

        }


        .result.success {

            display: block;

            background: #dcfce7;

            color: #166534;

        }


        .result.error {

            display: block;

            background: #fee2e2;

            color: #991b1b;

        }


        .result.warning {

            display: block;

            background: #fef3c7;

            color: #92400e;

        }


        .result-icon {

            font-size: 45px;

            margin-bottom: 10px;

        }


        .result-title {

            font-size: 22px;

            font-weight: bold;

            margin-bottom: 15px;

        }


        .result-info {

            text-align: left;

            margin-top: 15px;

            padding: 15px;

            background: rgba(255,255,255,0.6);

            border-radius: 10px;

        }


        .result-info div {

            padding: 6px 0;

        }


        /* =========================
           BUTTON
        ========================= */

        .buttons {

            display: flex;

            gap: 10px;

            margin-top: 20px;

        }


        .btn {

            flex: 1;

            padding: 14px;

            border: none;

            border-radius: 10px;

            font-weight: bold;

            font-size: 15px;

            cursor: pointer;

            text-decoration: none;

            text-align: center;

        }


        .btn-primary {

            background: #111827;

            color: white;

        }


        .btn-primary:hover {

            background: #1f2937;

        }


        .btn-secondary {

            background: #e5e7eb;

            color: #111827;

        }


        .btn-secondary:hover {

            background: #d1d5db;

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 600px) {

            .container {

                width: 95%;

                margin: 20px auto;

            }


            .card {

                padding: 18px;

            }


            .header h1 {

                font-size: 23px;

            }


            .buttons {

                flex-direction: column;

            }

        }

    </style>

</head>


<body>


<div class="container">


    {{-- =========================
         HEADER
    ========================== --}}

    <div class="header">

        <h1>
            📷 SCAN TIKET
        </h1>

        <p>
            Ticketify - Check-In Event
        </p>

    </div>


    <div class="card">


        {{-- =========================
             SCANNER TITLE
        ========================== --}}

        <div class="scanner-title">

            Scan QR Code E-Ticket

        </div>


        <div class="scanner-description">

            Arahkan kamera ke QR Code yang terdapat
            pada E-Ticket peserta.

            <br>

            Sistem akan otomatis memeriksa
            validitas tiket.

        </div>


        {{-- =========================
             QR SCANNER
        ========================== --}}

        <div id="reader"></div>


        {{-- =========================
             RESULT
        ========================== --}}

        <div
            id="result"
            class="result"
        >

            <div
                id="resultIcon"
                class="result-icon"
            ></div>


            <div
                id="resultTitle"
                class="result-title"
            ></div>


            <div
                id="resultMessage"
            ></div>


            <div
                id="resultInfo"
                class="result-info"
                style="display:none;"
            >

                <div>
                    <strong>Nama:</strong>

                    <span id="userName"></span>
                </div>


                <div>
                    <strong>Event:</strong>

                    <span id="eventName"></span>
                </div>


                <div>
                    <strong>Jenis Tiket:</strong>

                    <span id="ticketType"></span>
                </div>


                <div>
                    <strong>Kode:</strong>

                    <span id="ticketCode"></span>
                </div>

            </div>

        </div>


        {{-- =========================
             BUTTON
        ========================== --}}

        <div class="buttons">

            <button
                type="button"
                class="btn btn-primary"
                onclick="startScanner()"
            >

                📷 Scan Lagi

            </button>


            <a
                href="{{ route('admin.dashboard') }}"
                class="btn btn-secondary"
            >

                ← Dashboard

            </a>

        </div>


    </div>

</div>



<script>

    let scanner = null;

    let scanning = false;


    // ==========================================
    // MULAI SCANNER
    // ==========================================

    function startScanner() {

        if (scanning) {

            return;

        }


        const reader =
            document.getElementById("reader");


        scanner =
            new Html5Qrcode("reader");


        const config = {

            fps: 10,

            qrbox: {
                width: 250,
                height: 250
            }

        };


        scanner.start(

            {
                facingMode: "environment"
            },

            config,

            onScanSuccess,

            onScanFailure

        )
        .then(function () {

            scanning = true;

        })
        .catch(function (error) {

            console.error(error);

            showResult(

                "error",

                "❌ KAMERA TIDAK BISA DIBUKA",

                "Pastikan browser memiliki izin menggunakan kamera."

            );

        });

    }


    // ==========================================
    // KETIKA QR BERHASIL DIBACA
    // ==========================================

    function onScanSuccess(decodedText, decodedResult) {

        if (!scanning) {

            return;

        }


        // Hentikan scanner

        stopScanner();


        // Kirim kode ke Laravel

        checkTicket(decodedText);

    }


    // ==========================================
    // ERROR SCAN
    // ==========================================

    function onScanFailure(error) {

        // Jangan tampilkan error terus-menerus.

    }


    // ==========================================
    // STOP SCANNER
    // ==========================================

    function stopScanner() {

        if (!scanner || !scanning) {

            return;

        }


        scanner.stop()

            .then(function () {

                scanning = false;

            })

            .catch(function (error) {

                console.error(error);

                scanning = false;

            });

    }


    // ==========================================
    // CEK TIKET KE SERVER
    // ==========================================

    function checkTicket(ticketCode) {


        const csrfToken =
            document
                .querySelector(
                    'meta[name="csrf-token"]'
                )
                .getAttribute('content');


        fetch(
            "{{ route('admin.checkin.check') }}",
            {

                method: "POST",

                headers: {

                    "Content-Type":
                        "application/json",

                    "Accept":
                        "application/json",

                    "X-CSRF-TOKEN":
                        csrfToken

                },

                body: JSON.stringify({

                    ticket_code: ticketCode

                })

            }

        )

        .then(async function (response) {

            const data =
                await response.json();


            return {

                status: response.status,

                data: data

            };

        })

        .then(function (result) {


            const data =
                result.data;


            // ==================================
            // TIKET VALID
            // ==================================

            if (data.success) {


                showResult(

                    "success",

                    "✓ TIKET VALID",

                    data.message

                );


                document
                    .getElementById(
                        "resultInfo"
                    )
                    .style.display = "block";


                document
                    .getElementById(
                        "userName"
                    )
                    .innerText =
                    data.ticket.user;


                document
                    .getElementById(
                        "eventName"
                    )
                    .innerText =
                    data.ticket.event;


                document
                    .getElementById(
                        "ticketType"
                    )
                    .innerText =
                    data.ticket.ticket_type;


                document
                    .getElementById(
                        "ticketCode"
                    )
                    .innerText =
                    data.ticket.code;


                return;

            }


            // ==================================
            // TIKET SUDAH DIGUNAKAN
            // ==================================

            if (
                data.message &&
                data.message.includes(
                    "SUDAH DIGUNAKAN"
                )
            ) {

                showResult(

                    "warning",

                    "⚠️ TIKET SUDAH DIGUNAKAN",

                    data.message

                );

                return;

            }


            // ==================================
            // TIKET TIDAK VALID
            // ==================================

            showResult(

                "error",

                "❌ TIKET TIDAK VALID",

                data.message ||
                "Tiket tidak dapat digunakan."

            );

        })

        .catch(function (error) {

            console.error(error);


            showResult(

                "error",

                "❌ TERJADI KESALAHAN",

                "Tidak dapat terhubung ke server."

            );

        });

    }


    // ==========================================
    // TAMPILKAN HASIL
    // ==========================================

    function showResult(
        type,
        title,
        message
    ) {


        const result =
            document.getElementById(
                "result"
            );


        const icon =
            document.getElementById(
                "resultIcon"
            );


        const titleElement =
            document.getElementById(
                "resultTitle"
            );


        const messageElement =
            document.getElementById(
                "resultMessage"
            );


        result.className =
            "result " + type;


        titleElement.innerText =
            title;


        messageElement.innerText =
            message;


        document
            .getElementById(
                "resultInfo"
            )
            .style.display = "none";


        if (type === "success") {

            icon.innerText = "✓";

        }

        else if (type === "warning") {

            icon.innerText = "⚠️";

        }

        else {

            icon.innerText = "✕";

        }


        result.style.display = "block";

    }


    // ==========================================
    // START OTOMATIS
    // ==========================================

    document.addEventListener(

        "DOMContentLoaded",

        function () {

            startScanner();

        }

    );

</script>


</body>

</html>