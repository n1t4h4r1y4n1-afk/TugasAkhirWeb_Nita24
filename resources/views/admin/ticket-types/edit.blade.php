<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Jenis Tiket - Ticketify</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container-page {
            max-width: 800px;
            margin: 50px auto;
        }

        .card-box {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .08);
        }

        .title {
            font-weight: 800;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 12px;
        }

        .btn {
            border-radius: 10px;
            padding: 10px 20px;
        }

        .info-box {
            background: #f0f4ff;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 25px;
        }

        .sold-out-box {
            background: #fff3cd;
            border: 1px solid #ffecb5;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>

<div class="container-page">

    <div class="mb-4">
        <h1 class="title">✏️ Edit Jenis Tiket</h1>

        <p class="text-secondary mb-0">
            Ubah informasi jenis tiket untuk event.
        </p>
    </div>


    <div class="card-box">

        {{-- Informasi tiket --}}
        <div class="info-box">

            <div class="row">

                <div class="col-md-4">
                    <strong>Terjual</strong>

                    <div class="fs-5">
                        {{ $ticketType->sold }}
                    </div>
                </div>

                <div class="col-md-4">
                    <strong>Stok Sekarang</strong>

                    <div class="fs-5">
                        {{ $ticketType->stock }}
                    </div>
                </div>

                <div class="col-md-4">
                    <strong>Sisa</strong>

                    <div class="fs-5">
                        {{ max(0, $ticketType->stock - $ticketType->sold) }}
                    </div>
                </div>

            </div>

        </div>


        {{-- Peringatan jika sold out --}}
        @if($ticketType->stock <= $ticketType->sold)

            <div class="sold-out-box">

                <strong>⚠️ Tiket SOLD OUT</strong>

                <p class="mb-0 mt-1">
                    Tiket sudah habis terjual.
                    Kamu masih bisa menambah stok.
                </p>

            </div>

        @endif


        {{-- Error validasi --}}
        @if($errors->any())

            <div class="alert alert-danger">

                <strong>Terjadi kesalahan:</strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('admin.ticket-types.update', $ticketType) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            {{-- Event --}}
            <div class="mb-4">

                <label
                    for="event_id"
                    class="form-label"
                >
                    Event
                </label>

                <select
                    name="event_id"
                    id="event_id"
                    class="form-select"
                    required
                >

                    <option value="">
                        -- Pilih Event --
                    </option>

                    @foreach($events as $event)

                        <option
                            value="{{ $event->id }}"
                            {{ old('event_id', $ticketType->event_id) == $event->id ? 'selected' : '' }}
                        >
                            {{ $event->title }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Nama tiket --}}
            <div class="mb-4">

                <label
                    for="name"
                    class="form-label"
                >
                    Nama Jenis Tiket
                </label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{ old('name', $ticketType->name) }}"
                    placeholder="Contoh: VIP"
                    required
                >

            </div>


            {{-- Harga --}}
            <div class="mb-4">

                <label
                    for="price"
                    class="form-label"
                >
                    Harga Tiket
                </label>

                <input
                    type="number"
                    name="price"
                    id="price"
                    class="form-control"
                    value="{{ old('price', $ticketType->price) }}"
                    min="0"
                    step="0.01"
                    placeholder="Contoh: 350000"
                    required
                >

            </div>


            {{-- Stok --}}
            <div class="mb-4">

                <label
                    for="stock"
                    class="form-label"
                >
                    Total Stok
                </label>

                <input
                    type="number"
                    name="stock"
                    id="stock"
                    class="form-control"
                    value="{{ old('stock', $ticketType->stock) }}"
                    min="{{ max(1, $ticketType->sold) }}"
                    required
                >

                <div class="form-text">

                    Tiket sudah terjual:
                    <strong>{{ $ticketType->sold }}</strong> tiket.

                    <br>

                    Stok tidak boleh kurang dari jumlah tiket
                    yang sudah terjual.

                </div>

            </div>


            {{-- Tombol --}}
            <div class="d-flex gap-2">

                <a
                    href="{{ route('admin.ticket-types.index') }}"
                    class="btn btn-secondary"
                >
                    ← Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    💾 Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>