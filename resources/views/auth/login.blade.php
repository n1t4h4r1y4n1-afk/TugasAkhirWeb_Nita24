<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Ticketify</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #312e81,
                    #4f46e5
                );

            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.97);
            padding: 40px;
            border-radius: 24px;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.25);

            animation: muncul 0.5s ease;
        }

        @keyframes muncul {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            font-size: 36px;
            font-weight: 800;
            color: #4f46e5;
            letter-spacing: -1px;
        }

        .logo p {
            margin-top: 8px;
            color: #6b7280;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-size: 14px;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper span {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
        }

        .input-wrapper input {
            width: 100%;
            height: 50px;

            padding: 0 15px 0 45px;

            border: 1px solid #d1d5db;
            border-radius: 12px;

            font-size: 15px;
            outline: none;

            transition: 0.2s;
        }

        .input-wrapper input:focus {
            border-color: #4f46e5;

            box-shadow:
                0 0 0 3px rgba(79, 70, 229, 0.12);
        }

        .login-button {
            width: 100%;
            height: 52px;

            border: none;
            border-radius: 12px;

            background: linear-gradient(
                135deg,
                #4f46e5,
                #7c3aed
            );

            color: white;

            font-size: 16px;
            font-weight: 700;

            cursor: pointer;

            transition: 0.2s;

            margin-top: 5px;
        }

        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 10px 25px rgba(79, 70, 229, 0.35);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .error-box {
            background: #fee2e2;
            color: #b91c1c;

            padding: 12px 15px;
            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 14px;
        }

        .success-box {
            background: #dcfce7;
            color: #15803d;

            padding: 12px 15px;
            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 14px;
        }

        .register {
            text-align: center;
            margin-top: 25px;

            color: #6b7280;
            font-size: 14px;
        }

        .register a {
            color: #4f46e5;
            font-weight: 700;
            text-decoration: none;
        }

        .register a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 25px;

            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 25px;
            }

            .logo h1 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <!-- LOGO -->
        <div class="logo">
            <h1>TICKETIFY</h1>
            <p>Masuk ke akun Ticketify kamu</p>
        </div>


        <!-- SUCCESS MESSAGE -->
        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif


        <!-- ERROR MESSAGE -->
        @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif


        <!-- LOGIN FORM -->
        <form action="{{ route('login') }}" method="POST">

            @csrf

            <!-- EMAIL -->
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <div class="input-wrapper">

                    <span>✉️</span>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email kamu"
                        required
                    >

                </div>

            </div>


            <!-- PASSWORD -->
            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="input-wrapper">

                    <span>🔒</span>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >

                </div>

            </div>


            <!-- BUTTON -->
            <button
                type="submit"
                class="login-button"
            >
                LOGIN
            </button>

        </form>


        <!-- REGISTER -->
        <div class="register">

            Belum punya akun?

            <a href="{{ route('register') }}">
                Daftar sekarang
            </a>

        </div>

    </div>


    <!-- FOOTER -->
    <div class="footer">
        © {{ date('Y') }} Ticketify. All rights reserved.
    </div>

</div>

</body>
</html>
