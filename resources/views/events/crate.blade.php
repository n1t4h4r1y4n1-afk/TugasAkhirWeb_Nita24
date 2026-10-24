
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Event | Ticketify Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple: #7555f7;
            --purple-dark: #5136d9;
            --pink: #f06bb8;
            --ink: #24213f;
            --muted: #8988a5;
            --line: #eeecf7;
            --surface: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--ink);
            font-size: 13px;
            background:
                radial-gradient(ellipse at 0% 0%, rgba(117,85,247,.13), transparent 35%),
                radial-gradient(ellipse at 100% 25%, rgba(240,107,184,.10), transparent 30%),
                #f7f7fd;
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 20;
            background: rgba(255,255,255,.88);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(230,227,247,.9);
        }

        .nav-inner {
            max-width: 1320px;
            min-height: 76px;
            margin: auto;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--ink);
            font-weight: 800;
            font-size: 17px;
            letter-spacing: -.5px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            color: white;
            font-size: 18px;
            border-radius: 15px;
            background: linear-gradient(135deg, #977aff, #6441ee);
            box-shadow: 0 7px 18px rgba(117,85,247,.3);
            transform: rotate(-5deg);
        }

        .brand small {
            display: block;
            color: var(--muted);
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .8px;
            margin-top: 3px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 11px 17px;
            color: #5d4bc7;
            background: #f1edff;
            border: 1px solid #e6e0ff;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 800;
            transition: .25s ease;
        }

        .back-link:hover {
            background: var(--purple);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(117,85,247,.2);
        }

        /* PAGE */
        .page-wrapper {
            width: min(1120px, calc(100% - 36px));
            margin: 38px auto 65px;
        }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 34px 38px;
            margin-bottom: 28px;
            border-radius: 25px;
            color: white;
            background: linear-gradient(120deg, #211548 0%, #5032a7 52%, #8b5cf6 100%);
            box-shadow: 0 18px 45px rgba(73,48,148,.19);
        }

        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .hero::before {
            width: 280px;
            height: 280px;
            top: -170px;
            right: 90px;
            border: 1px solid rgba(255,255,255,.19);
            box-shadow: 0 0 0 28px rgba(255,255,255,.025),
                        0 0 0 58px rgba(255,255,255,.025);
        }

        .hero::after {
            width: 170px;
            height: 170px;
            right: -30px;
            bottom: -110px;
            background: rgba(240,107,184,.25);
            filter: blur(4px);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 700px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 11px;
            border: 1px solid rgba(255,255,255,.23);
            background: rgba(255,255,255,.1);
            border-radius: 30px;
            color: #e6dcff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .hero h1 {
            margin: 17px 0 10px;
            font-size: clamp(27px, 4vw, 38px);
            line-height: 1.2;
            letter-spacing: -1.6px;
            font-weight: 800;
        }

        .hero h1 span {
            color: #e9b8ff;
        }

        .hero p {
            max-width: 570px;
            margin: 0;
            color: rgba(255,255,255,.77);
            font-size: 12px;
            line-height: 1.9;
        }

        .hero-decoration {
            position: absolute;
            right: 9%;
            top: 50%;
            width: 105px;
            height: 105px;
            display: grid;
            place-items: center;
            font-size: 43px;
            color: white;
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 27px;
            background: rgba(255,255,255,.12);
            backdrop-filter: blur(10px);
            transform: translateY(-50%) rotate(12deg);
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(-50%) rotate(12deg); }
            50% { transform: translateY(calc(-50% - 9px)) rotate(7deg); }
        }

        /* FORM CARD */
        .form-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 290px;
            gap: 24px;
            align-items: start;
        }

        .form-card,
        .side-card {
            background: rgba(255,255,255,.95);
            border: 1px solid rgba(233,230,248,.9);
            border-radius: 23px;
            box-shadow: 0 12px 36px rgba(43,35,94,.055);
        }

        .form-card {
            padding: 30px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 27px;
        }

        .section-icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: linear-gradient(135deg, #eee8ff, #fce8f6);
            color: var(--purple);
            font-size: 18px;
            flex-shrink: 0;
        }

        .section-heading h2 {
            margin: 0 0 5px;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -.4px;
        }

        .section-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .field {
            margin-bottom: 21px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 9px;
            color: #45415f;
            font-size: 11px;
            font-weight: 800;
        }

        .form-label i {
            color: var(--purple);
            width: 14px;
            text-align: center;
        }

        .required {
            color: #ed5b8b;
        }

        .form-control,
        .form-select {
            width: 100%;
            min-height: 46px;
            padding: 12px 14px;
            color: #35314f;
            background-color: #fbfaff;
            border: 1px solid #e9e6f5;
            border-radius: 12px;
            font-family: inherit;
            font-size: 12px;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .form-control::placeholder {
            color: #b0aec3;
        }

        .form-control:focus,
        .form-select:focus {
            color: var(--ink);
            background-color: white;
            border-color: #9b85ff;
            box-shadow: 0 0 0 4px rgba(117,85,247,.11);
            outline: none;
        }

        textarea.form-control {
            min-height: 140px;
            resize: vertical;
            line-height: 1.8;
        }

        .form-text {
            margin-top: 7px;
            color: #9996b0;
            font-size: 10px;
            line-height: 1.6;
        }

        .invalid-feedback {
            font-size: 11px;
        }

        /* UPLOAD */
        .upload-area {
            position: relative;
            min-height: 175px;
            padding: 22px 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 2px dashed #d9d0ff;
            border-radius: 16px;
            background: linear-gradient(145deg, #fbfaff, #fff8fd);
            text-align: center;
            cursor: pointer;
            transition: .25s ease;
        }

        .upload-area:hover,
        .upload-area.dragging {
            background: #f2edff;
            border-color: var(--purple);
            transform: translateY(-2px);
        }

        .upload-area input[type="file"] {
            position: absolute;
            inset: 0;
            z-index: 3;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .upload-icon {
            width: 51px;
            height: 51px;
            margin-bottom: 12px;
            display: grid;
            place-items: center;
            border-radius: 17px;
            background: linear-gradient(135deg, #e9e1ff, #ffe5f4);
            color: var(--purple);
            font-size: 22px;
        }

        .upload-title {
            color: #484363;
            font-size: 11px;
            font-weight: 800;
        }

        .upload-caption {
            margin-top: 6px;
            color: #a09cb8;
            font-size: 10px;
        }

        .preview-wrap {
            display: none;
            margin-top: 13px;
            padding: 10px;
            background: #f8f6ff;
            border: 1px solid #eae5ff;
            border-radius: 14px;
        }

        #imagePreview {
            display: block;
            width: 100%;
            max-height: 230px;
            object-fit: contain;
            border-radius: 9px;
            background: #eeebf8;
        }

        .preview-caption {
            margin-top: 8px;
            color: #77718f;
            font-size: 10px;
            overflow-wrap: anywhere;
        }

        /* STATUS */
        .status-panel {
            height: 100%;
            min-height: 175px;
            padding: 20px;
            border: 1px solid #ebe7fa;
            border-radius: 16px;
            background: linear-gradient(145deg, #fcfbff, #f8f5ff);
        }

        .status-panel h3 {
            margin: 0 0 8px;
            font-size: 12px;
            font-weight: 800;
        }

        .status-panel p {
            margin-bottom: 15px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.8;
        }

        .status-panel .form-select {
            background-color: white;
        }

        /* BUTTONS */
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 28px;
            padding-top: 23px;
            border-top: 1px solid var(--line);
        }

        .footer-note {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #9996ae;
            font-size: 10px;
        }

        .footer-note i {
            color: #36b98a;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .btn-cancel,
        .btn-save {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            min-height: 45px;
            padding: 0 19px;
            border-radius: 12px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 800;
            transition: .25s ease;
        }

        .btn-cancel {
            color: #686580;
            background: white;
            border: 1px solid #e8e5f2;
        }

        .btn-cancel:hover {
            color: var(--ink);
            background: #f7f5ff;
            transform: translateY(-2px);
        }

        .btn-save {
            color: white;
            border: none;
            background: linear-gradient(115deg, #7656f7, #9a56ed 65%, #e06bbd);
            box-shadow: 0 8px 18px rgba(117,85,247,.24);
            cursor: pointer;
        }

        .btn-save:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(117,85,247,.33);
        }

        .btn-save:active {
            transform: translateY(0);
        }

        /* RIGHT SIDE */
        .side-card {
            padding: 23px;
            margin-bottom: 18px;
        }

        .side-heading {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 18px;
        }

        .side-heading .mini-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #f0ebff;
            color: var(--purple);
            font-size: 15px;
        }

        .side-heading h3 {
            margin: 0;
            font-size: 12px;
            font-weight: 800;
        }

        .side-heading p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .tip-item {
            display: flex;
            gap: 11px;
            margin-bottom: 16px;
        }

        .tip-item:last-child {
            margin-bottom: 0;
        }

        .tip-number {
            flex-shrink: 0;
            width: 25px;
            height: 25px;
            display: grid;
            place-items: center;
            border-radius: 9px;
            color: #6b4de5;
            background: #f0ebff;
            font-size: 10px;
            font-weight: 800;
        }

        .tip-item strong {
            display: block;
            margin-bottom: 4px;
            color: #484360;
            font-size: 10px;
        }

        .tip-item span {
            display: block;
            color: #9692aa;
            font-size: 10px;
            line-height: 1.7;
        }

        .side-promo {
            position: relative;
            overflow: hidden;
            padding: 23px;
            border-radius: 20px;
            color: white;
            background: linear-gradient(145deg, #32205f, #6b43cf 70%, #a65ee5);
            box-shadow: 0 12px 27px rgba(89,58,164,.16);
        }

        .side-promo::after {
            content: "✦";
            position: absolute;
            right: 17px;
            top: 9px;
            color: rgba(255,255,255,.22);
            font-size: 65px;
        }

        .promo-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            margin-bottom: 16px;
            border-radius: 14px;
            background: rgba(255,255,255,.15);
            font-size: 19px;
        }

        .side-promo h3 {
            position: relative;
            z-index: 1;
            margin: 0 0 8px;
            font-size: 15px;
            font-weight: 800;
        }

        .side-promo p {
            position: relative;
            z-index: 1;
            margin: 0;
            color: rgba(255,255,255,.76);
            font-size: 10px;
            line-height: 1.9;
        }

        .page-footer {
            padding-top: 26px;
            text-align: center;
            color: #a09cb6;
            font-size: 10px;
        }

        .page-footer strong {
            color: #7354ec;
        }

        @media (max-width: 900px) {
            .form-layout {
                grid-template-columns: 1fr;
            }

            .side-column {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 18px;
            }

            .side-card,
            .side-promo {
                margin-bottom: 0;
            }

            .hero-decoration {
                right: 6%;
                width: 80px;
                height: 80px;
                font-size: 32px;
            }
        }

        @media (max-width: 600px) {
            .nav-inner {
                min-height: 66px;
                padding: 0 16px;
            }

            .brand {
                font-size: 14px;
            }

            .brand-icon {
                width: 38px;
                height: 38px;
            }

            .back-link {
                padding: 10px 12px;
                font-size: 10px;
            }

            .page-wrapper {
                width: calc(100% - 24px);
                margin: 22px auto 35px;
            }

            .hero {
                padding: 25px 22px;
                border-radius: 20px;
            }

            .hero h1 {
                max-width: 280px;
                font-size: 27px;
            }

            .hero p {
                max-width: 280px;
                font-size: 11px;
            }

            .hero-decoration {
                right: -17px;
                top: 20%;
                width: 65px;
                height: 65px;
                font-size: 25px;
                opacity: .65;
            }

            .form-card {
                padding: 22px 17px;
                border-radius: 19px;
            }

            .section-heading {
                align-items: flex-start;
            }

            .form-row {
                --bs-gutter-x: 0;
            }

            .side-column {
                grid-template-columns: 1fr;
            }

            .form-footer {
                align-items: stretch;
            }

            .footer-note {
                width: 100%;
            }

            .button-group {
                width: 100%;
            }

            .button-group > * {
                flex: 1;
            }

            .btn-cancel,
            .btn-save {
                padding: 0 12px;
                font-size: 10px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    <nav class="topbar">
        <div class="nav-inner">
            <a href="{{ route('admin.dashboard') }}" class="brand">
                <span class="brand-icon">
                    <i class="fa-solid fa-ticket"></i>
                </span>
                <span>
                    Ticketify
                    <small>ADMIN WORKSPACE</small>
                </span>
            </a>

            <a href="{{ route('admin.events.index') }}" class="back-link">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Event
            </a>
        </div>
    </nav>

    <main class="page-wrapper">

        <section class="hero">
            <div class="hero-content">
                <span class="eyebrow">
                    <i class="fa-solid fa-sparkles"></i>
                    EVENT CREATION STUDIO
                </span>

                <h1>
                    Ciptakan Event <span>Luar Biasa.</span>
                </h1>

                <p>
                    Setiap acara punya cerita. Lengkapi informasi event,
                    pilih kategorinya, dan tambahkan poster terbaik agar
                    pengunjung tertarik menjadi bagian dari momen spesialmu.
                </p>
            </div>

            <div class="hero-decoration">
                <i class="fa-solid fa-ticket"></i>
            </div>
        </section>

        @if ($errors->any())
            <div class="alert alert-danger mb-4" style="border-radius:14px; font-size:12px;">
                <div class="fw-bold mb-2">
                    <i class="fa-solid fa-circle-exclamation me-2"></i>
                    Ada data yang perlu diperbaiki
                </div>

                <ul class="mb-0 ps-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-layout">

            <section class="form-card">

                <div class="section-heading">
                    <div class="section-icon">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>

                    <div>
                        <h2>Informasi Event</h2>
                        <p>Isi detail acara dengan lengkap dan benar.</p>
                    </div>
                </div>

                <form
                    action="{{ route('admin.events.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <div class="row form-row g-3">

                        <div class="col-md-8 field">
                            <label for="title" class="form-label">
                                <i class="fa-solid fa-heading"></i>
                                Nama Event <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}"
                                placeholder="Contoh: The Journey of Ron's"
                                maxlength="255"
                                required
                            >

                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 field">
                            <label for="category" class="form-label">
                                <i class="fa-solid fa-layer-group"></i>
                                Kategori <span class="required">*</span>
                            </label>

                            <select
                                id="category"
                                name="category"
                                class="form-select @error('category') is-invalid @enderror"
                                required
                            >
                                <option value="" disabled {{ old('category') ? '' : 'selected' }}>
                                    Pilih kategori
                                </option>

                                <option value="Concert & Music" {{ old('category') == 'Concert & Music' ? 'selected' : '' }}>
                                    Concert &amp; Music
                                </option>

                                <option value="Seminar & Workshop" {{ old('category') == 'Seminar & Workshop' ? 'selected' : '' }}>
                                    Seminar &amp; Workshop
                                </option>

                                <option value="Festival & Lifestyle" {{ old('category') == 'Festival & Lifestyle' ? 'selected' : '' }}>
                                    Festival &amp; Lifestyle
                                </option>
                            </select>

                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 field">
                            <label for="location" class="form-label">
                                <i class="fa-solid fa-location-dot"></i>
                                Lokasi Event <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="location"
                                name="location"
                                class="form-control @error('location') is-invalid @enderror"
                                value="{{ old('location') }}"
                                placeholder="Contoh: Istora Senayan, Jakarta"
                                maxlength="255"
                                required
                            >

                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 field">
                            <label for="event_date" class="form-label">
                                <i class="fa-regular fa-calendar-days"></i>
                                Tanggal Event <span class="required">*</span>
                            </label>

                            <input
                                type="date"
                                id="event_date"
                                name="event_date"
                                class="form-control @error('event_date') is-invalid @enderror"
                                value="{{ old('event_date') }}"
                                required
                            >

                            @error('event_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 field">
                            <label for="event_time" class="form-label">
                                <i class="fa-regular fa-clock"></i>
                                Waktu Event <span class="required">*</span>
                            </label>

                            <input
                                type="time"
                                id="event_time"
                                name="event_time"
                                class="form-control @error('event_time') is-invalid @enderror"
                                value="{{ old('event_time') }}"
                                required
                            >

                            @error('event_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 field">
                            <label for="description" class="form-label">
                                <i class="fa-solid fa-align-left"></i>
                                Deskripsi Event <span class="required">*</span>
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                class="form-control @error('description') is-invalid @enderror"
                                rows="5"
                                placeholder="Ceritakan keseruan acara, pengisi acara, dan informasi menarik lainnya..."
                                required
                            >{{ old('description') }}</textarea>

                            <div class="form-text">
                                Gunakan deskripsi yang informatif agar calon pengunjung memahami acara kamu.
                            </div>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-7 field">
                            <label for="bannerInput" class="form-label">
                                <i class="fa-regular fa-image"></i>
                                Poster / Banner Event
                            </label>

                            <div class="upload-area" id="uploadArea">
                                <input
                                    type="file"
                                    name="banner"
                                    id="bannerInput"
                                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                    aria-label="Pilih poster event"
                                >

                                <div class="upload-icon">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </div>

                                <div class="upload-title" id="uploadTitle">
                                    Klik untuk memilih poster
                                </div>

                                <div class="upload-caption" id="uploadCaption">
                                    JPG, JPEG, PNG, atau WEBP · Maksimal 5 MB
                                </div>
                            </div>

                            <div class="preview-wrap" id="previewWrap">
                                <img id="imagePreview" src="" alt="Preview poster event">
                                <div class="preview-caption" id="previewCaption"></div>
                            </div>

                            @error('banner')
                                <div class="text-danger mt-2" style="font-size:11px;">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-text">
                                Gunakan poster yang jelas dan berkualitas agar tampilan event lebih menarik.
                            </div>
                        </div>

                        <div class="col-md-5 field">
                            <label for="status" class="form-label">
                                <i class="fa-solid fa-toggle-on"></i>
                                Status Publikasi <span class="required">*</span>
                            </label>

                            <div class="status-panel">
                                <div class="section-icon mb-3">
                                    <i class="fa-solid fa-earth-asia"></i>
                                </div>

                                <h3>Atur visibilitas event</h3>

                                <p>
                                    Event aktif dapat ditampilkan kepada pengunjung.
                                    Event nonaktif disembunyikan dari daftar event aktif.
                                </p>

                                <select
                                    id="status"
                                    name="status"
                                    class="form-select @error('status') is-invalid @enderror"
                                    required
                                >
                                    <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>
                                        Aktif — Tampilkan event
                                    </option>

                                    <option value="0" {{ old('status', '1') == '0' ? 'selected' : '' }}>
                                        Nonaktif — Sembunyikan event
                                    </option>
                                </select>

                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-footer">
                        <div class="footer-note">
                            <i class="fa-solid fa-shield-halved"></i>
                            Pastikan informasi event sudah benar.
                        </div>

                        <div class="button-group">
                            <a href="{{ route('admin.events.index') }}" class="btn-cancel">
                                Batal
                            </a>

                            <button type="submit" class="btn-save" id="saveButton">
                                <i class="fa-solid fa-floppy-disk"></i>
                                Simpan Event
                            </button>
                        </div>
                    </div>

                </form>
            </section>

            <aside class="side-column">

                <div class="side-card">
                    <div class="side-heading">
                        <div class="mini-icon">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>

                        <div>
                            <h3>Tips Event Menarik</h3>
                            <p>Buat event lebih menonjol.</p>
                        </div>
                    </div>

                    <div class="tip-item">
                        <div class="tip-number">01</div>
                        <div>
                            <strong>Judul yang mudah diingat</strong>
                            <span>Gunakan nama yang unik dan menggambarkan acara.</span>
                        </div>
                    </div>

                    <div class="tip-item">
                        <div class="tip-number">02</div>
                        <div>
                            <strong>Poster berkualitas</strong>
                            <span>Pilih gambar yang jelas dan relevan dengan event.</span>
                        </div>
                    </div>

                    <div class="tip-item">
                        <div class="tip-number">03</div>
                        <div>
                            <strong>Informasi lengkap</strong>
                            <span>Pastikan lokasi, tanggal, dan waktu sudah tepat.</span>
                        </div>
                    </div>
                </div>

                <div class="side-promo">
                    <div class="promo-icon">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </div>

                    <h3>Your Event, Your Moment.</h3>

                    <p>
                        Setiap detail membuat perbedaan. Hadirkan pengalaman
                        event yang berkesan bersama Ticketify.
                    </p>
                </div>

            </aside>

        </div>

        <footer class="page-footer">
            Made with <span style="color:#ec75bd;">♥</span> for every moment ·
            <strong>Ticketify Admin</strong>
        </footer>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('bannerInput');
            const uploadArea = document.getElementById('uploadArea');
            const previewWrap = document.getElementById('previewWrap');
            const preview = document.getElementById('imagePreview');
            const previewCaption = document.getElementById('previewCaption');
            const uploadTitle = document.getElementById('uploadTitle');
            const uploadCaption = document.getElementById('uploadCaption');

            let currentObjectUrl = null;

            function showPreview(file) {
                if (!file) return;

                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];

                if (!allowedTypes.includes(file.type)) {
                    alert('Format poster harus JPG, JPEG, PNG, atau WEBP.');
                    input.value = '';
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran poster maksimal 5 MB.');
                    input.value = '';
                    return;
                }

                if (currentObjectUrl) {
                    URL.revokeObjectURL(currentObjectUrl);
                }

                currentObjectUrl = URL.createObjectURL(file);
                preview.src = currentObjectUrl;
                previewWrap.style.display = 'block';
                previewCaption.textContent =
                    file.name + ' · ' + (file.size / (1024 * 1024)).toFixed(2) + ' MB';

                uploadTitle.textContent = 'Poster berhasil dipilih!';
                uploadCaption.textContent = 'Klik area ini untuk mengganti poster.';
            }

            input.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    showPreview(this.files[0]);
                }
            });

            ['dragenter', 'dragover'].forEach(function (eventName) {
                uploadArea.addEventListener(eventName, function (event) {
                    event.preventDefault();
                    uploadArea.classList.add('dragging');
                });
            });

            ['dragleave', 'drop'].forEach(function (eventName) {
                uploadArea.addEventListener(eventName, function (event) {
                    event.preventDefault();
                    uploadArea.classList.remove('dragging');
                });
            });

            uploadArea.addEventListener('drop', function (event) {
                const files = event.dataTransfer.files;

                if (files && files.length) {
                    try {
                        const transfer = new DataTransfer();
                        transfer.items.add(files[0]);
                        input.files = transfer.files;
                        showPreview(files[0]);
                    } catch (error) {
                        console.warn('Silakan pilih gambar melalui tombol upload.');
                    }
                }
            });

            window.addEventListener('beforeunload', function () {
                if (currentObjectUrl) {
                    URL.revokeObjectURL(currentObjectUrl);
                }
            });
        });
    </script>

</body>
</html>
