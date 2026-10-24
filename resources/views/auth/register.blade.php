<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Akun | Ticketify</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --purple: #7547f5;
            --purple-dark: #4c2bb8;
            --ink: #20183b;
            --muted: #89849e;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 30px 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at 10% 15%, rgba(148, 117, 255, .22), transparent 28%),
                radial-gradient(circle at 90% 85%, rgba(255, 137, 204, .18), transparent 28%),
                #f7f6fc;
            overflow-x: hidden;
        }

        .decoration {
            position: fixed;
            z-index: -1;
            pointer-events: none;
            border-radius: 50%;
            filter: blur(1px);
        }

        .decoration-one {
            width: 260px;
            height: 260px;
            top: -100px;
            right: -65px;
            background: linear-gradient(135deg, #d9ccff, #f4d9ff);
            opacity: .7;
        }

        .decoration-two {
            width: 200px;
            height: 200px;
            bottom: -70px;
            left: -50px;
            background: linear-gradient(135deg, #c8b7ff, #e8ddff);
            opacity: .65;
        }

        .register-layout {
            width: 100%;
            max-width: 1000px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.85);
            border-radius: 30px;
            background: rgba(255,255,255,.88);
            box-shadow: 0 28px 80px rgba(53, 34, 110, .14);
            animation: appear .65s ease both;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* PANEL KIRI */
        .welcome-panel {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 42px;
            color: white;
            background:
                radial-gradient(circle at 90% 15%, rgba(198,174,255,.36), transparent 28%),
                radial-gradient(circle at 15% 90%, rgba(255,125,202,.20), transparent 32%),
                linear-gradient(145deg, #241344, #48277f 55%, #7950ec);
        }

        .welcome-panel::before,
        .welcome-panel::after {
            content: "";
            position: absolute;
            z-index: -1;
            border: 1px solid rgba(255,255,255,.16);
            border-radius: 50%;
        }

        .welcome-panel::before {
            width: 350px;
            height: 350px;
            right: -155px;
            top: 100px;
        }

        .welcome-panel::after {
            width: 260px;
            height: 260px;
            left: -125px;
            bottom: -110px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border: 1px solid rgba(255,255,255,.28);
            border-radius: 15px;
            background: rgba(255,255,255,.16);
            box-shadow: 0 8px 22px rgba(0,0,0,.12);
            font-size: 24px;
        }

        .welcome-copy {
            position: relative;
            z-index: 1;
            margin: 55px 0;
        }

        .welcome-label {
            display: inline-flex;
            padding: 8px 12px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 30px;
            background: rgba(255,255,255,.10);
            color: #e8ddff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .welcome-copy h1 {
            margin: 0 0 18px;
            font-size: clamp(30px, 3.2vw, 43px);
            line-height: 1.2;
            letter-spacing: -1.7px;
            font-weight: 800;
        }

        .welcome-copy h1 span {
            color: #d7c6ff;
        }

        .welcome-copy p {
            max-width: 360px;
            color: #e1d8f4;
            font-size: 13px;
            line-height: 1.9;
        }

        .ticket-art {
            position: relative;
            width: 150px;
            height: 105px;
            margin: 28px auto 0;
            display: grid;
            place-items: center;
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 23px;
            background: linear-gradient(135deg, rgba(255,255,255,.24), rgba(255,255,255,.06));
            box-shadow: 0 25px 45px rgba(17,8,48,.20);
            font-size: 57px;
            transform: rotate(-9deg);
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { translate: 0 0; }
            50% { translate: 0 -10px; }
        }

        .welcome-footer {
            color: #d7cbed;
            font-size: 10px;
        }

        /* PANEL KANAN */
        .form-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 45px;
        }

        .form-heading {
            margin-bottom: 28px;
        }

        .form-heading .small-label {
            margin-bottom: 9px;
            color: var(--purple);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .form-heading h2 {
            margin: 0 0 9px;
            color: var(--ink);
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .form-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #37304f;
            font-size: 12px;
            font-weight: 700;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
        }

        .form-group input {
            width: 100%;
            height: 48px;
            padding: 0 43px 0 43px;
            border: 1px solid #e5e0f0;
            border-radius: 12px;
            outline: none;
            background: #fbfaff;
            color: var(--ink);
            font-family: inherit;
            font-size: 12px;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .form-group input::placeholder {
            color: #aaa5ba;
        }

        .form-group input:focus {
            border-color: #987aff;
            background: white;
            box-shadow: 0 0 0 4px rgba(117,71,245,.10);
        }

        .form-group input.is-invalid {
            border-color: #e25570;
        }

        .error {
            margin-top: 7px;
            color: #d63857;
            font-size: 11px;
            line-height: 1.5;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            padding: 5px;
            border: 0;
            background: transparent;
            color: #827b99;
            cursor: pointer;
            font-size: 15px;
        }

        .password-toggle:hover {
            color: var(--purple);
        }

        .btn-register {
            width: 100%;
            min-height: 49px;
            margin-top: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            border: 0;
            border-radius: 12px;
            color: white;
            background: linear-gradient(115deg, #8964ff, #6037e7);
            box-shadow: 0 10px 22px rgba(108,69,239,.24);
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: transform .2s, box-shadow .2s;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(108,69,239,.32);
        }

        .login-link {
            margin-top: 23px;
            text-align: center;
            color: #827b97;
            font-size: 12px;
        }

        .login-link a {
            color: var(--purple);
            font-weight: 800;
            text-decoration: none;
        }

        .login-link a:hover {
            color: var(--purple-dark);
            text-decoration: underline;
        }

        .security-note {
            margin-top: 24px;
            padding-top: 18px;
            border-top: 1px solid #f0edf6;
            color: #a09aaf;
            text-align: center;
            font-size: 10px;
        }

        @media (max-width: 760px) {
            body {
                padding: 20px 14px;
            }

            .register-layout {
                max-width: 470px;
                grid-template-columns: 1fr;
                border-radius: 24px;
            }

            .welcome-panel {
                min-height: 235px;
                padding: 25px;
            }

            .brand {
                font-size: 20px;
            }

            .brand-icon {
                width: 39px;
                height: 39px;
                border-radius: 12px;
            }

            .welcome-copy {
                margin: 32px 0 5px;
            }

            .welcome-copy h1 {
                max-width: 350px;
                font-size: 32px;
            }

            .welcome-copy p {
                max-width: 360px;
                margin-bottom: 0;
            }

            .welcome-label {
                margin-bottom: 14px;
            }

            .ticket-art {
                position: absolute;
                right: 30px;
                bottom: 24px;
                width: 72px;
                height: 65px;
                margin: 0;
                font-size: 34px;
                opacity: .5;
            }

            .welcome-footer {
                display: none;
            }

            .form-panel {
                padding: 32px 25px;
            }

            .form-heading h2 {
                font-size: 27px;
            }
        }

        @media (max-width: 380px) {
            .form-panel {
                padding: 27px 19px;
            }

            .welcome-copy h1 {
                font-size: 28px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

<div class="decoration decoration-one"></div>
<div class="decoration decoration-two"></div>

<main class="register-layout">

    <!-- PANEL SELAMAT DATANG -->
    <section class="welcome-panel">

        <a href="{{ url('/') }}" class="brand">
            <span class="brand-icon">🎟️</span>
            <span>Ticketify</span>
        </a>

        <div class="welcome-copy">
            <div class="welcome-label">✦ YOUR EVENT, YOUR MOMENT</div>

            <h1>
                Momen Seru<br>
                Dimulai <span>Di Sini.</span>
            </h1>

            <p>
                Buat akun Ticketify dan temukan konser, festival,
                serta pengalaman seru berikutnya. Semua momen favoritmu
                dimulai dari satu langkah kecil.
            </p>

            <div class="ticket-art" aria-hidden="true">🎫</div>
        </div>

        <div class="welcome-footer">
            © {{ date('Y') }} Ticketify · Temukan momen terbaikmu.
        </div>

    </section>

    <!-- FORM REGISTER -->
    <section class="form-panel">

        <div class="form-heading">
            <div class="small-label">MULAI PERJALANANMU</div>
            <h2>Buat Akun ✨</h2>
            <p>
                Isi data di bawah untuk bergabung dengan Ticketify.
            </p>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>

                <div class="input-wrap">
                    <span class="input-icon">👤</span>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="name"
                        class="@error('name') is-invalid @enderror"
                        required
                    >
                </div>

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>

                <div class="input-wrap">
                    <span class="input-icon">✉️</span>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        autocomplete="email"
                        class="@error('email') is-invalid @enderror"
                        required
                    >
                </div>

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <div class="input-wrap">
                    <span class="input-icon">🔒</span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="new-password"
                        class="@error('password') is-invalid @enderror"
                        required
                    >
                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword('password', this)"
                        aria-label="Tampilkan password"
                    >👁</button>
                </div>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>

                <div class="input-wrap">
                    <span class="input-icon">🔐</span>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        autocomplete="new-password"
                        required
                    >
                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword('password_confirmation', this)"
                        aria-label="Tampilkan konfirmasi password"
                    >👁</button>
                </div>
            </div>

            <button type="submit" class="btn-register">
                DAFTAR SEKARANG <span>→</span>
            </button>
        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login di sini</a>
        </div>

        <div class="security-note">
            🔒 Data akunmu dikirim melalui formulir pendaftaran Ticketify.
        </div>

    </section>

</main>

<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);

        if (!input) return;

        const showPassword = input.type === 'password';
        input.type = showPassword ? 'text' : 'password';

        button.textContent = showPassword ? '🙈' : '👁';
        button.setAttribute(
            'aria-label',
            showPassword ? 'Sembunyikan password' : 'Tampilkan password'
        );
    }
</script>

</body>
</html>