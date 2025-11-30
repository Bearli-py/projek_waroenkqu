<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Waroenk Qu</title>

    <style>
        /* Background cream & konten di tengah layar */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #FAF3E0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Wrapper judul + card */
        .page-wrapper {
            width: 100%;
            max-width: 1100px;
        }

        /* Judul & tagline di atas card */
        .brand-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            letter-spacing: 2px;
            margin: 0 0 6px 0;
        }

        .brand-tagline {
            margin: 0;
            font-size: 14px;
            color: #777;
        }

        .brand-tagline span {
            color: #B33939;
            font-weight: 600;
        }

        /* CARD LOGIN: kiri form, kanan foto */
        .login-card {
            display: flex;
            background-color: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.18);
            overflow: hidden;
        }

        .login-left {
            flex: 1;
            padding: 32px 36px;
        }

        .login-right {
            flex: 1;
            min-width: 0;
        }

        .login-right img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        /* Teks di atas form */
        .panel-title {
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            margin-bottom: 4px;
        }

        .panel-subtitle {
            font-size: 12px;
            color: #777;
            text-align: center;
            margin-bottom: 24px;
        }

        /* Form */
        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-input {
            width: 100%;
            padding: 9px 11px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 13px;
            outline: none;
        }

        .form-input:focus {
            border-color: #B33939;
            box-shadow: 0 0 0 2px rgba(179,57,57,0.15);
        }

        .btn-submit {
            width: 100%;
            border: none;
            margin-top: 6px;
            padding: 10px 0;
            border-radius: 6px;
            background-color: #B33939;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #8f2e2e;
            box-shadow: 0 6px 14px rgba(179,57,57,0.35);
            transform: translateY(-1px);
        }

        .login-error {
            color: #B33939;
            font-size: 12px;
            margin-bottom: 12px;
            text-align: center;
        }

        /* Responsif: di HP card jadi vertikal */
        @media (max-width: 768px) {
            body {
                align-items: flex-start;
                padding-top: 40px;
            }

            .page-wrapper {
                max-width: 95%;
            }

            .login-card {
                flex-direction: column;
            }

            .login-right {
                height: 220px;
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        {{-- Judul & tagline seperti desain --}}
        <div class="brand-header">
            <div class="brand-title">WAROENK QU</div>
            <p class="brand-tagline">
                Cita Rasa Autentik, <span>Harga Bersahabat</span>
            </p>
        </div>

        {{-- Card login: kiri form, kanan foto --}}
        <div class="login-card">
            <div class="login-left">
                <div class="panel-title">Admin Panel</div>
                <div class="panel-subtitle">Sistem Manajemen Waroenk Qu</div>

                <form method="POST" action="{{ route('admin.login.process') }}">
                    @csrf

                    @error('login')
                        <div class="login-error">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <div class="form-label">Username</div>
                        <input
                            type="text"
                            name="username"
                            class="form-input"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}">
                    </div>

                    <div class="form-group">
                        <div class="form-label">Password</div>
                        <input
                            type="password"
                            name="password"
                            class="form-input"
                            placeholder="Masukkan password">
                    </div>

                    <button type="submit" class="btn-submit">
                        Masuk
                    </button>
                </form>
            </div>

            <div class="login-right">
                <img src="{{ asset('images/warung/dalam2.png') }}" alt="Suasana Waroenk Qu">
            </div>
        </div>
    </div>
</body>
</html>