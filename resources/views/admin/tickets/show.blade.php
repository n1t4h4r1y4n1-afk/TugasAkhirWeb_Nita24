<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>E-Ticket - Ticketify</title>


    {{-- QR CODE --}}
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>


    {{-- HTML2CANVAS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


    {{-- JSPDF --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


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

            width: 90%;

            max-width: 650px;

            margin: 50px auto 30px;
        }


        /* ========================================
           E-TICKET
        ======================================== */

        .ticket {

            background: white;

            border-radius: 20px;

            overflow: hidden;

            box-shadow:
                0 8px 30px rgba(0, 0, 0, .10);
        }


        /* ========================================
           HEADER
        ======================================== */

        .header {

            background: #111827;

            color: white;

            padding: 25px;

            text-align: center;
        }


        .header h1 {

            margin: 0;

            font-size: 28px;
        }


        .header p {

            margin: 8px 0 0;

            opacity: .8;
        }


        /* ========================================
           CONTENT
        ======================================== */

        .content {

            padding: 30px;
        }


        .event-title {

            font-size: 26px;

            font-weight: bold;

            margin-bottom: 25px;

            text-align: center;
        }


        /* ========================================
           INFO
        ======================================== */

        .info {

            padding: 15px 0;

            border-bottom:
                1px solid #eee;
        }


        .label {

            color: #6b7280;

            font-size: 13px;

            margin-bottom: 5px;

            text-transform: uppercase;
        }


        .value {

            font-size: 17px;

            font-weight: bold;
        }


        /* ========================================
           TICKET CODE
        ======================================== */

        .ticket-code {

            margin-top: 25px;

            padding: 18px;

            background: #f3f4f6;

            border-radius: 12px;

            text-align: center;
        }


        .ticket-code .label {

            margin-bottom: 10px;
        }


        .ticket-code .code {

            font-family: monospace;

            font-size: 20px;

            font-weight: bold;

            letter-spacing: 1px;
        }


        /* ========================================
           QR CODE
        ======================================== */

        .qr-section {

            margin-top: 30px;

            padding-top: 25px;

            border-top:
                2px dashed #d1d5db;

            text-align: center;
        }


        .qr-title {

            font-size: 20px;

            font-weight: bold;

            margin-bottom: 8px;
        }


        .qr-description {

            color: #6b7280;

            font-size: 14px;

            margin-bottom: 18px;
        }


        #qrcode {

            width: 220px;

            min-height: 220px;

            margin: 0 auto;

            display: flex;

            align-items: center;

            justify-content: center;

            background: white;

            padding: 10px;

            border-radius: 12px;
        }


        #qrcode img {

            display: block;

            margin: auto;
        }


        #qrcode canvas {

            display: block;

            margin: auto;
        }


        .scan-note {

            margin-top: 15px;

            color: #6b7280;

            font-size: 13px;
        }


        /* ========================================
           STATUS
        ======================================== */

        .status {

            margin-top: 20px;

            padding: 13px;

            border-radius: 10px;

            text-align: center;

            font-weight: bold;
        }


        .active {

            background: #dcfce7;

            color: #166534;
        }


        .used {

            background: #e5e7eb;

            color: #374151;
        }


        .cancelled {

            background: #fee2e2;

            color: #991b1b;
        }


        /* ========================================
           FOOTER
        ======================================== */

        .footer {

            text-align: center;

            padding: 20px;

            color: #6b7280;

            font-size: 13px;
        }


        /* ========================================
           BUTTON DOWNLOAD
        ======================================== */

        .actions {

            margin-top: 20px;

            display: flex;

            gap: 10px;

            flex-wrap: wrap;
        }


        .btn {

            flex: 1;

            min-width: 150px;

            border: none;

            display: block;

            padding: 13px;

            border-radius: 9px;

            text-align: center;

            text-decoration: none;

            font-weight: bold;

            cursor: pointer;

            font-size: 14px;
        }


        .btn-primary {

            background: #111827;

            color: white;
        }


        .btn-download {

            background: #5b4cf0;

            color: white;
        }


        .btn-image {

            background: #16a34a;

            color: white;
        }


        .btn:hover {

            opacity: .9;
        }


        /* ========================================
           LOADING
        ======================================== */

        .loading {

            display: none;

            margin-top: 15px;

            text-align: center;

            color: #6b7280;

            font-size: 14px;
        }


        /* ========================================
           MOBILE
        ======================================== */

        @media(max-width: 600px) {

            .container {

                width: 95%;

                margin-top: 20px;
            }


            .content {

                padding: 20px;
            }


            .event-title {

                font-size: 22px;
            }


            .header h1 {

                font-size: 24px;
            }


            .actions {

                flex-direction: column;
            }


            .btn {

                width: 100%;
            }

        }


        /* ========================================
           PRINT
        ======================================== */

        @media print {

            body {

                background: white;
            }


            .container {

                width: 100%;

                max-width: 650px;

                margin: 0 auto;
            }


            .ticket {

                box-shadow: none;

                border:
                    1px solid #ddd;
            }


            .actions,
            .loading {

                display: none !important;
            }

        }

    </style>

</head>


<body>


<div class="container">


    {{-- ==========================================
         E-TICKET
    =========================================== --}}

    <div
        class="ticket"
        id="ticket-card"
    >


        {{-- HEADER --}}

        <div class="header">

            <h1>
                🎟️ TICKETIFY
            </h1>

            <p>
                E-Ticket
            </p>

        </div>


        <div class="content">


            {{-- EVENT --}}

            <div class="event-title">

                {{ $ticket->event->title }}

            </div>


            {{-- JENIS TIKET --}}

            <div class="info">

                <div class="label">
                    Jenis Tiket
                </div>

                <div class="value">

                    {{ $ticket->ticketType->name }}

                </div>

            </div>


            {{-- NAMA PEMILIK --}}

            <div class="info">

                <div class="label">
                    Nama Pemilik
                </div>

                <div class="value">

                    {{ $ticket->user->name }}

                </div>

            </div>


            {{-- EMAIL --}}

            <div class="info">

                <div class="label">
                    Email
                </div>

                <div class="value">

                    {{ $ticket->user->email }}

                </div>

            </div>


            {{-- LOKASI --}}

            <div class="info">

                <div class="label">
                    Lokasi
                </div>

                <div class="value">

                    {{ $ticket->event->location }}

                </div>

            </div>


            {{-- TANGGAL --}}

            <div class="info">

                <div class="label">
                    Tanggal Event
                </div>

                <div class="value">

                    {{ $ticket->event->event_date->format('d M Y') }}

                </div>

            </div>


            {{-- WAKTU --}}

            <div class="info">

                <div class="label">
                    Waktu
                </div>

                <div class="value">

                    {{ $ticket->event->event_time }}

                </div>

            </div>


            {{-- KODE TIKET --}}

            <div class="ticket-code">

                <div class="label">
                    Kode Tiket
                </div>

                <div class="code">

                    {{ $ticket->ticket_code }}

                </div>

            </div>


            {{-- ==================================
                 QR CODE
            =================================== --}}

            <div class="qr-section">

                <div class="qr-title">
                    QR CODE TIKET
                </div>


                <div class="qr-description">

                    Scan QR Code ini saat memasuki acara

                </div>


                <div id="qrcode"></div>


                <div class="scan-note">

                    Tunjukkan QR Code kepada petugas pintu masuk.

                </div>

            </div>


            {{-- ==================================
                 STATUS
            =================================== --}}

            @if($ticket->status === 'active')

                <div class="status active">

                    ✓ TIKET AKTIF

                </div>

            @elseif($ticket->status === 'used')

                <div class="status used">

                    ✓ TIKET SUDAH DIGUNAKAN

                </div>

            @else

                <div class="status cancelled">

                    ✕ TIKET DIBATALKAN

                </div>

            @endif


        </div>


        {{-- FOOTER --}}

        <div class="footer">

            Simpan e-ticket ini dan tunjukkan saat masuk event.

        </div>


    </div>


    {{-- ==========================================
         BUTTON
    =========================================== --}}

    <div class="actions">


        <a
            href="{{ route('tickets.index') }}"
            class="btn btn-primary"
        >

            ← Kembali

        </a>


        <button
            type="button"
            class="btn btn-download"
            onclick="downloadPDF()"
        >

            📄 Download PDF

        </button>


        <button
            type="button"
            class="btn btn-image"
            onclick="downloadPNG()"
        >

            🖼️ Download PNG

        </button>


    </div>


    <div
        id="loading"
        class="loading"
    >

        ⏳ Sedang membuat file...

    </div>


</div>


<script>


    /* =========================================
       DATA TIKET
    ========================================= */

    const ticketCode =
        @json($ticket->ticket_code);


    /* =========================================
       GENERATE QR CODE
    ========================================= */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            const qrContainer =
                document.getElementById("qrcode");


            if (
                qrContainer &&
                ticketCode
            ) {

                new QRCode(
                    qrContainer,
                    {
                        text: ticketCode,

                        width: 200,

                        height: 200,

                        colorDark: "#111827",

                        colorLight: "#ffffff",

                        correctLevel:
                            QRCode.CorrectLevel.H
                    }
                );

            }

        }
    );


    /* =========================================
       LOADING
    ========================================= */

    function showLoading() {

        const loading =
            document.getElementById("loading");

        if (loading) {

            loading.style.display = "block";

        }

    }


    function hideLoading() {

        const loading =
            document.getElementById("loading");

        if (loading) {

            loading.style.display = "none";

        }

    }


    /* =========================================
       DOWNLOAD PDF
    ========================================= */

    async function downloadPDF() {

        const ticket =
            document.getElementById("ticket-card");


        if (!ticket) {

            alert(
                "E-Ticket tidak ditemukan."
            );

            return;
        }


        showLoading();


        try {


            /*
             * Tunggu sebentar agar QR Code
             * selesai dibuat.
             */

            await new Promise(
                resolve =>
                    setTimeout(
                        resolve,
                        500
                    )
            );


            /*
             * Ubah E-Ticket menjadi gambar
             */

            const canvas =
                await html2canvas(
                    ticket,
                    {
                        scale: 2,

                        useCORS: true,

                        backgroundColor:
                            "#ffffff",

                        logging: false
                    }
                );


            const imgData =
                canvas.toDataURL(
                    "image/png"
                );


            /*
             * Ambil jsPDF
             */

            const {
                jsPDF
            } = window.jspdf;


            /*
             * Buat PDF ukuran A4
             */

            const pdf =
                new jsPDF(
                    {
                        orientation:
                            "portrait",

                        unit: "mm",

                        format: "a4"
                    }
                );


            /*
             * Ukuran halaman PDF
             */

            const pageWidth =
                pdf.internal.pageSize.getWidth();


            const pageHeight =
                pdf.internal.pageSize.getHeight();


            /*
             * Margin PDF
             */

            const margin = 10;


            const maxWidth =
                pageWidth -
                (margin * 2);


            const maxHeight =
                pageHeight -
                (margin * 2);


            /*
             * Rasio gambar
             */

            const imageRatio =
                canvas.height /
                canvas.width;


            let imageWidth =
                maxWidth;


            let imageHeight =
                imageWidth *
                imageRatio;


            /*
             * Kalau terlalu tinggi,
             * sesuaikan agar muat A4.
             */

            if (
                imageHeight >
                maxHeight
            ) {

                imageHeight =
                    maxHeight;

                imageWidth =
                    imageHeight /
                    imageRatio;

            }


            /*
             * Posisi tengah horizontal
             */

            const x =
                (pageWidth -
                    imageWidth) / 2;


            const y =
                margin;


            /*
             * Masukkan gambar
             * E-Ticket ke PDF
             */

            pdf.addImage(
                imgData,
                "PNG",
                x,
                y,
                imageWidth,
                imageHeight
            );


            /*
             * Download PDF
             */

            pdf.save(
                "e-ticket-" +
                ticketCode +
                ".pdf"
            );


        } catch (error) {

            console.error(error);


            alert(
                "Gagal membuat PDF. Silakan coba lagi."
            );

        }


        hideLoading();

    }


    /* =========================================
       DOWNLOAD PNG
    ========================================= */

    async function downloadPNG() {

        const ticket =
            document.getElementById(
                "ticket-card"
            );


        if (!ticket) {

            alert(
                "E-Ticket tidak ditemukan."
            );

            return;
        }


        showLoading();


        try {


            await new Promise(
                resolve =>
                    setTimeout(
                        resolve,
                        500
                    )
            );


            const canvas =
                await html2canvas(
                    ticket,
                    {
                        scale: 2,

                        useCORS: true,

                        backgroundColor:
                            "#ffffff",

                        logging: false
                    }
                );


            const link =
                document.createElement(
                    "a"
                );


            link.download =
                "e-ticket-" +
                ticketCode +
                ".png";


            link.href =
                canvas.toDataURL(
                    "image/png"
                );


            link.click();


        } catch (error) {

            console.error(error);


            alert(
                "Gagal membuat PNG. Silakan coba lagi."
            );

        }


        hideLoading();

    }

</script>


</body>

</html>