<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Tiket - Ticketify</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body {
            background: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        .page-container {
            max-width: 850px;
            margin: 60px auto;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0,0,0,.08);
        }

        .page-title {
            font-weight: 800;
            color: #1f2937;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 12px 15px;
        }

        .btn-primary {
            border-radius: 12px;
            padding: 12px 25px;
            font-weight: 600;
        }

        .btn-secondary {
            border-radius: 12px;
            padding: 12px 25px;
        }

    </style>

</head>

<body>

<div class="page-container">

    <div class="mb-4">

        <a href="{{ route('admin.tickets.index') }}"
           class="text-decoration-none">
            ← Kembali ke Tiket
        </a>

    </div>

    <div class="form-card">

        <div class="mb-4">

            <h1 class="page-title">
                🎟️ Tambah Tiket
            </h1>

            <p class="text-secondary mb-0">
                Tambahkan tiket baru untuk pengguna.
            </p>

        </div>

        @if ($errors->any())

            <div class="alert alert-danger">

                <strong>Terjadi kesalahan:</strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="{{ route('admin.tickets.store') }}"
            method="POST">

            @csrf

            {{-- USER --}}

            <div class="mb-4">

                <label class="form-label">
                    Pemilik Tiket
                </label>

                <select
                    name="user_id"
                    class="form-select"
                    required>

                    <option value="">
                        -- Pilih User --
                    </option>

                    @foreach($users as $user)

                        <option
                            value="{{ $user->id }}"
                            {{ old('user_id') == $user->id ? 'selected' : '' }}>

                            {{ $user->name }}
                            -
                            {{ $user->email }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- EVENT --}}

            <div class="mb-4">

                <label class="form-label">
                    Event
                </label>

                <select
                    name="event_id"
                    class="form-select"
                    required>

                    <option value="">
                        -- Pilih Event --
                    </option>

                    @foreach($events as $event)

                        <option
                            value="{{ $event->id }}"
                            {{ old('event_id') == $event->id ? 'selected' : '' }}>

                            {{ $event->title }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- TICKET TYPE --}}

            <div class="mb-4">

                <label class="form-label">
                    Jenis Tiket
                </label>

                <select
                    name="ticket_type_id"
                    class="form-select"
                    required>

                    <option value="">
                        -- Pilih Jenis Tiket --
                    </option>

                    @foreach($ticketTypes as $ticketType)

                        <option
                            value="{{ $ticketType->id }}"
                            {{ old('ticket_type_id') == $ticketType->id ? 'selected' : '' }}>

                            {{ $ticketType->name }}
                            -
                            Rp {{ number_format($ticketType->price, 0, ',', '.') }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- BUTTON --}}

            <div class="d-flex gap-2">

                <a
                    href="{{ route('admin.tickets.index') }}"
                    class="btn btn-secondary">

                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-primary">

                    🎟️ Simpan Tiket

                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>