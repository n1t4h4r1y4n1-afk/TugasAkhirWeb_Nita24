<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Tiket - Ticketify</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(124, 58, 237, .12), transparent 35%),
                radial-gradient(circle at bottom right, rgba(59, 130, 246, .12), transparent 35%),
                #f5f7fb;
            min-height: 100vh;
        }

        .page-wrapper {
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container-box {
            max-width: 1000px;
            margin: auto;
        }

        /* HEADER */

        .page-header {
            background: linear-gradient(
                135deg,
                #4f46e5,
                #7c3aed,
                #9333ea
            );

            border-radius: 24px;

            padding: 30px;

            color: white;

            margin-bottom: 25px;

            box-shadow:
                0 20px 45px rgba(79, 70, 229, .25);

            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            border-radius: 50%;

            background: rgba(255, 255, 255, .08);

            right: -70px;
            top: -80px;
        }

        .page-header::after {
            content: "";

            position: absolute;

            width: 150px;
            height: 150px;

            border-radius: 50%;

            background: rgba(255, 255, 255, .06);

            left: -50px;
            bottom: -70px;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .page-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .page-header p {
            margin: 8px 0 0;
            opacity: .85;
            font-size: 15px;
        }

        /* CARD */

        .form-card {
            background: white;

            border-radius: 24px;

            padding: 32px;

            box-shadow:
                0 15px 40px rgba(15, 23, 42, .08);

            border: 1px solid rgba(226, 232, 240, .8);
        }

        /* TICKET INFO */

        .ticket-info {
            background: linear-gradient(
                135deg,
                #f8f7ff,
                #eef2ff
            );

            border: 1px solid #e0e7ff;

            border-radius: 18px;

            padding: 20px;

            margin-bottom: 30px;
        }

        .ticket-code-label {
            color: #64748b;

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 5px;
        }

        .ticket-code {
            font-size: 22px;

            font-weight: 800;

            color: #4f46e5;

            letter-spacing: 1px;
        }

        /* FORM */

        .form-label {
            font-weight: 700;

            color: #334155;

            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 12px;

            border: 1px solid #dbe2ea;

            padding: 12px 14px;

            min-height: 48px;

            box-shadow: none;

            transition: .2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #6366f1;

            box-shadow:
                0 0 0 4px rgba(99, 102, 241, .12);
        }

        .form-section {
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 17px;

            font-weight: 800;

            color: #1e293b;

            margin-bottom: 18px;

            display: flex;

            align-items: center;

            gap: 10px;
        }

        .section-icon {
            width: 36px;
            height: 36px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: #eef2ff;

            color: #4f46e5;
        }

        .invalid-feedback {
            font-size: 13px;
        }

        /* BUTTON */

        .button-area {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            padding-top: 10px;

            border-top: 1px solid #e5e7eb;

            margin-top: 10px;
        }

        .btn {
            border-radius: 12px;

            padding: 12px 22px;

            font-weight: 700;
        }

        .btn-back {
            background: #f1f5f9;

            color: #475569;

            border: none;
        }

        .btn-back:hover {
            background: #e2e8f0;

            color: #1e293b;
        }

        .btn-save {
            background: linear-gradient(
                135deg,
                #4f46e5,
                #7c3aed
            );

            color: white;

            border: none;

            box-shadow:
                0 8px 20px rgba(79, 70, 229, .25);
        }

        .btn-save:hover {
            color: white;

            transform: translateY(-1px);

            box-shadow:
                0 12px 25px rgba(79, 70, 229, .32);
        }

        /* ALERT */

        .alert {
            border-radius: 14px;

            border: none;
        }

        /* RESPONSIVE */

        @media (max-width: 768px) {

            .page-wrapper {
                padding: 20px 12px;
            }

            .page-header {
                padding: 24px;
                border-radius: 18px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .form-card {
                padding: 22px;
                border-radius: 18px;
            }

            .button-area {
                flex-direction: column-reverse;

                align-items: stretch;
            }

            .button-area .btn {
                width: 100%;
            }
        }

    </style>

</head>

<body>

<div class="page-wrapper">

    <div class="container-box">

        <!-- HEADER -->

        <div class="page-header">

            <div class="header-content">

                <h1>
                    ✏️ Edit Tiket
                </h1>

                <p>
                    Perbarui informasi tiket yang sudah terdaftar di Ticketify.
                </p>

            </div>

        </div>


        <!-- FORM CARD -->

        <div class="form-card">

            <!-- TICKET INFO -->

            <div class="ticket-info">

                <div class="ticket-code-label">
                    KODE TIKET
                </div>

                <div class="ticket-code">
                    {{ $ticket->ticket_code }}
                </div>

            </div>


            {{-- ERROR VALIDATION --}}

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>Terjadi kesalahan!</strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- FORM -->

            <form
                action="{{ route('admin.tickets.update', $ticket->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <!-- DATA PEMILIK -->

                <div class="form-section">

                    <div class="section-title">

                        <div class="section-icon">
                            👤
                        </div>

                        Data Pemilik Tiket

                    </div>


                    <div class="row g-4">

                        <!-- USER -->

                        <div class="col-md-12">

                            <label
                                for="user_id"
                                class="form-label"
                            >
                                Pemilik Tiket
                            </label>

                            <select
                                name="user_id"
                                id="user_id"
                                class="form-select @error('user_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    -- Pilih Pengguna --
                                </option>

                                @foreach ($users as $user)

                                    <option
                                        value="{{ $user->id }}"
                                        {{ old('user_id', $ticket->user_id) == $user->id ? 'selected' : '' }}
                                    >
                                        {{ $user->name }}
                                        -
                                        {{ $user->email }}
                                    </option>

                                @endforeach

                            </select>


                            @error('user_id')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                <!-- EVENT & TICKET -->

                <div class="form-section">

                    <div class="section-title">

                        <div class="section-icon">
                            🎫
                        </div>

                        Informasi Tiket

                    </div>


                    <div class="row g-4">

                        <!-- EVENT -->

                        <div class="col-md-6">

                            <label
                                for="event_id"
                                class="form-label"
                            >
                                Event
                            </label>

                            <select
                                name="event_id"
                                id="event_id"
                                class="form-select @error('event_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    -- Pilih Event --
                                </option>

                                @foreach ($events as $event)

                                    <option
                                        value="{{ $event->id }}"
                                        {{ old('event_id', $ticket->event_id) == $event->id ? 'selected' : '' }}
                                    >
                                        {{ $event->title }}
                                    </option>

                                @endforeach

                            </select>


                            @error('event_id')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- TICKET TYPE -->

                        <div class="col-md-6">

                            <label
                                for="ticket_type_id"
                                class="form-label"
                            >
                                Jenis Tiket
                            </label>

                            <select
                                name="ticket_type_id"
                                id="ticket_type_id"
                                class="form-select @error('ticket_type_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    -- Pilih Jenis Tiket --
                                </option>

                                @foreach ($ticketTypes as $ticketType)

                                    <option
                                        value="{{ $ticketType->id }}"
                                        data-event="{{ $ticketType->event_id }}"
                                        {{ old('ticket_type_id', $ticket->ticket_type_id) == $ticketType->id ? 'selected' : '' }}
                                    >
                                        {{ $ticketType->name }}

                                        @if ($ticketType->event)
                                            - {{ $ticketType->event->title }}
                                        @endif

                                    </option>

                                @endforeach

                            </select>


                            @error('ticket_type_id')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                <!-- STATUS -->

                <div class="form-section">

                    <div class="section-title">

                        <div class="section-icon">
                            ⚙️
                        </div>

                        Status Tiket

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <label
                                for="status"
                                class="form-label"
                            >
                                Status
                            </label>

                            <select
                                name="status"
                                id="status"
                                class="form-select @error('status') is-invalid @enderror"
                                required
                            >

                                <option
                                    value="active"
                                    {{ old('status', $ticket->status) === 'active' ? 'selected' : '' }}
                                >
                                    🟢 Active
                                </option>

                                <option
                                    value="used"
                                    {{ old('status', $ticket->status) === 'used' ? 'selected' : '' }}
                                >
                                    🔵 Used
                                </option>

                                <option
                                    value="cancelled"
                                    {{ old('status', $ticket->status) === 'cancelled' ? 'selected' : '' }}
                                >
                                    🔴 Cancelled
                                </option>

                            </select>


                            @error('status')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                <!-- BUTTON -->

                <div class="button-area">

                    <a
                        href="{{ route('admin.tickets.index') }}"
                        class="btn btn-back"
                    >
                        ← Kembali
                    </a>


                    <button
                        type="submit"
                        class="btn btn-save"
                    >
                        💾 Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        const eventSelect =
            document.getElementById('event_id');

        const ticketTypeSelect =
            document.getElementById('ticket_type_id');

        function filterTicketTypes() {

            const selectedEvent =
                eventSelect.value;

            const options =
                ticketTypeSelect.querySelectorAll('option');

            options.forEach(function (option) {

                if (!option.value) {
                    return;
                }

                const eventId =
                    option.getAttribute('data-event');

                if (
                    selectedEvent === '' ||
                    eventId === selectedEvent
                ) {

                    option.style.display = '';

                } else {

                    option.style.display = 'none';

                    if (option.selected) {
                        option.selected = false;
                    }

                }

            });

        }

        eventSelect.addEventListener(
            'change',
            filterTicketTypes
        );

        filterTicketTypes();

    });

</script>

</body>

</html>