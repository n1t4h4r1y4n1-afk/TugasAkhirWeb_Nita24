<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Scanner Petugas - Ticketify</title>

    <!-- Library QR Scanner -->
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

            background:
                linear-gradient(
                    135deg,
                    #f5f3ff,
                    #eef2ff
                );

            min-height: 100vh;

            color: #111827;
        }


        /* =========================
           HEADER
        ========================= */

        .header {

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed
                );

            color: white;

            padding: 25px 20px;

            text-align: center;

            box-shadow:
                0 5px 20px
                rgba(0, 0, 0, 0.15);
        }


        .header h1 {

            margin: 0;

            font-size: 28px;

            font-weight: 700;
        }


        .header p {

            margin: 8px 0 0;

            font-size: 15px;

            opacity: 0.9;
        }


        /* =========================
           CONTAINER
        ========================= */

        .container {

            width: 95%;

            max-width: 650px;

            margin: 35px auto;
        }


        /* =========================
           CARD
        ========================= */

        .card {

            background: white;

            border-radius: 22px;

            padding: 30px;

            box-shadow:
                0 15px 40px
                rgba(0, 0, 0, 0.10);
        }


        /* =========================
           TITLE
        ========================= */

        .title {

            text-align: center;

            margin-bottom: 25px;
        }


        .title h2 {

            margin: 0;

            font-size: 25px;

            color: #111827;
        }


        .title p {

            margin-top: 8px;

            color: #6b7280;

            font-size: 14px;
        }


        /* =========================
           SCANNER
        ========================= */

        #reader {

            width: 100%;

            max-width: 500px;

            margin: 0 auto;
        }


        /* =========================
           RESULT
        ========================= */

        #result {

            display: none;

            margin-top: 25px;

            padding: 22px;

            border-radius: 16px;

            text-align: center;
        }


        .success {

            background: #dcfce7;

            color: #166534;

            border:
                2px solid #86efac;
        }


        .error {

            background: #fee2e2;

            color: #991b1b;

            border:
                2px solid #fca5a5;
        }


        .warning {

            background: #fef3c7;

            color: #92400e;

            border:
                2px solid #fcd34d;
        }


        .result-title {

            font-size: 25px;

            font-weight: bold;

            margin-bottom: 10px;
        }


        .result-message {

            font-size: 16px;

            font-weight: 600;
        }


        /* =========================
           TICKET INFO
        ========================= */

        .ticket-info {

            margin-top: 18px;

            background: rgba(
                255,
                255,
                255,
                0.75
            );

            padding: 16px;

            border-radius: 12px;

            text-align: left;
        }


        .ticket-info p {

            margin: 8px 0;

            font-size: 14px;
        }


        .ticket-info strong {

            color: #111827;
        }


        /* =========================
           INSTRUCTION
        ========================= */

        .instruction {

            text-align: center;

            margin-top: 20px;

            padding: 15px;

            background: #f9fafb;

            border-radius: 12px;

            color: #6b7280;

            font-size: 14px;
        }


        /* =========================
           LOGOUT
        ========================= */

        .logout-form {

            margin-top: 20px;
        }


        .logout {

            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 12px;

            background: #111827;

            color: white;

            font-size: 15px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;
        }


        .logout:hover {

            background: #374151;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 600px) {

            .card {

                padding: 20px;

                border-radius: 18px;
            }


            .header h1 {

                font-size: 23px;
            }


            .title h2 {

                font-size: 21px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         HEADER
    ========================= -->

    <div class="header">

        <h1>
            🎫 TICKETIFY
        </h1>

        <p>
            Scanner Petugas Pintu Masuk
        </p>

    </div>



    <!-- =========================
         CONTENT
    ========================= -->

    <div class="container">

        <div class="card">


            <div class="title">

                <h2>
                    📷 Scan QR Ticket
                </h2>

                <p>
                    Arahkan QR Code e-ticket ke kamera
                </p>

            </div>


            <!-- =========================
                 SCANNER CAMERA
            ========================= -->

            <div id="reader"></div>


            <div class="instruction">

                📱 Arahkan kamera ke QR Code
                pada e-ticket milik pembeli.

            </div>


            <!-- =========================
                 RESULT
            ========================= -->

            <div id="result"></div>


            <!-- =========================
                 LOGOUT
            ========================= -->

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="logout"
                >
                    Logout
                </button>

            </form>


        </div>

    </div>



    <script>

        // ==========================================
        // CSRF TOKEN
        // ==========================================

        const csrfToken =
            document
                .querySelector(
                    'meta[name="csrf-token"]'
                )
                .getAttribute('content');



        // ==========================================
        // SCANNER
        // ==========================================

        let scanner = null;

        let scanning = true;



        // ==========================================
        // MENAMPILKAN HASIL
        // ==========================================

        function showResult(
            type,
            title,
            message,
            ticket = null
        ) {

            const result =
                document.getElementById('result');


            result.className = '';

            result.classList.add(type);

            result.style.display = 'block';


            let html = `

                <div class="result-title">
                    ${title}
                </div>

                <div class="result-message">
                    ${message}
                </div>

            `;


            // Kalau ada informasi tiket
            if (ticket) {

                html += `

                    <div class="ticket-info">

                        <p>
                            <strong>
                                Nama Pemilik:
                            </strong>

                            ${ticket.user ?? '-'}
                        </p>


                        <p>
                            <strong>
                                Event:
                            </strong>

                            ${ticket.event ?? '-'}
                        </p>


                        <p>
                            <strong>
                                Jenis Tiket:
                            </strong>

                            ${ticket.ticket_type ?? '-'}
                        </p>


                        <p>
                            <strong>
                                Kode Tiket:
                            </strong>

                            ${ticket.code ?? '-'}
                        </p>

                    </div>

                `;

            }


            result.innerHTML = html;

        }



        // ==========================================
        // RELOAD SCANNER
        // ==========================================

        function restartScanner() {

            setTimeout(function () {

                location.reload();

            }, 3000);

        }



        // ==========================================
        // SAAT QR BERHASIL DIBACA
        // ==========================================

        function onScanSuccess(decodedText) {


            // Mencegah scan berkali-kali
            if (!scanning) {

                return;

            }


            scanning = false;


            const ticketCode =
                decodedText.trim();



            // ==========================================
            // STOP CAMERA
            // ==========================================

            if (scanner) {

                scanner
                    .stop()
                    .catch(function(error) {

                        console.log(error);

                    });

            }



            // ==========================================
            // KIRIM KODE TIKET KE SERVER
            // ==========================================

            fetch(
                "{{ route('petugas.scanner.check') }}",
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

                        ticket_code:
                            ticketCode

                    })

                }

            )


            // ==========================================
            // RESPONSE SERVER
            // ==========================================

            .then(response => {

                return response.json();

            })


            .then(data => {


                // ======================================
                // TIKET VALID
                // ======================================

                if (data.success) {

                    showResult(

                        'success',

                        '✅ TIKET VALID',

                        'SILAKAN MASUK',

                        data.ticket

                    );

                }


                // ======================================
                // TIKET TIDAK VALID
                // ======================================

                else {

                    if (

                        data.message &&

                        data.message
                            .includes('SUDAH')

                    ) {

                        showResult(

                            'warning',

                            '⚠️ TIKET SUDAH DIGUNAKAN',

                            'Tiket ini tidak dapat digunakan lagi.',

                            data.ticket

                        );

                    }

                    else {

                        showResult(

                            'error',

                            '❌ TIKET TIDAK VALID',

                            data.message ??
                                'Tiket tidak valid.'

                        );

                    }

                }


                // Scanner otomatis dibuka kembali
                // setelah 3 detik

                restartScanner();

            })


            // ==========================================
            // ERROR REQUEST
            // ==========================================

            .catch(error => {

                console.error(error);


                showResult(

                    'error',

                    '❌ TERJADI KESALAHAN',

                    'Tidak dapat memeriksa tiket.'

                );


                restartScanner();

            });

        }



        // ==========================================
        // SAAT QR BELUM TERBACA
        // ==========================================

        function onScanFailure(error) {

            // Tidak perlu menampilkan error.
            // Scanner akan terus mencari QR.

        }



        // ==========================================
        // BUAT SCANNER
        // ==========================================

        scanner =
            new Html5Qrcode("reader");



        // ==========================================
        // KONFIGURASI
        // ==========================================

        const config = {

            fps: 10,

            qrbox: {

                width: 250,

                height: 250

            }

        };



        // ==========================================
        // MULAI CAMERA
        // ==========================================

        scanner.start(

            {
                facingMode: "environment"
            },

            config,

            onScanSuccess,

            onScanFailure

        )


        .catch(function(error) {

            console.error(error);


            showResult(

                'error',

                '❌ KAMERA TIDAK BISA DIBUKA',

                'Pastikan browser memberikan izin kamera kepada website.'

            );

        });

    </script>


</body>

</html>