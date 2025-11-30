{{-- 
========================================================
FILE   : resources/views/admin/login.blade.php
HALAMAN: LOGIN ADMIN WAROENK QU
DESAIN : Sesuai mockup (logo + tagline di atas, card login + foto)
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Set encoding karakter ke UTF-8 (standar web modern) --}}
    <meta charset="UTF-8">

    {{-- Supaya layout responsif di HP (width mengikuti layar) --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Judul tab browser --}}
    <title>Login Admin - Waroenk Qu</title>

    {{-- 
        Link ke CSS utama website (kalau perlu pakai style global).
        Boleh tetap, boleh kamu hapus kalau tidak dibutuhkan.
    --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- 
        STYLE KHUSUS HALAMAN LOGIN ADMIN
        Semua style ini hanya berlaku di halaman ini karena ditaruh di sini.
    --}}
    <style>
        /* 
        ===========================
        1. STYLE DASAR BODY
        ===========================
        */

        body {
            margin: 0;                              /* Hilangkan margin default browser */
            font-family: 'Poppins', sans-serif;    /* Font utama Poppins */
            background-color: #FAF3E0;             /* Background cream (sama seperti web utama) */
            display: flex;                         /* Pakai flexbox untuk center konten */
            justify-content: center;               /* Center horizontal */
            align-items: center;                   /* Center vertical */
            min-height: 100vh;                     /* Tinggi minimal = tinggi layar */
        }

        /*
        ===========================
        2. WRAPPER LOGO + TAGLINE
        ===========================
        */

        /* Wrapper semua konten (judul + card) */
        .admin-page-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;   /* center horizontal */
            gap: 24px;             /* jarak judul ke card */
        }

        .admin-login-wrapper {
            text-align: center;        /* Semua isi (logo, judul, tagline) rata tengah */
            margin-bottom: 40px;       /* Jarak ke bawah (ke card login) */
        }

        /* Judul besar "WAROENK QU" */
        .admin-login-wrapper h1 {
            font-family: 'Playfair Display', serif;  /* Font elegan untuk brand */
            font-size: 26px;
            margin: 8px 0 4px;                       /* Atas 8px, bawah 4px */
            letter-spacing: 2px;                     /* Jarak antar huruf sedikit lebar */
        }

        /* Tagline di bawah judul */
        .admin-login-wrapper p {
            margin: 0;
            font-size: 14px;
            color: #777;                             /* Abu-abu lembut */
        }

        /* Bagian tagline yang ingin diberi warna merah (Harga Bersahabat) */
        .admin-login-wrapper span {
            color: #B33939;                          /* Merah brand */
            font-weight: 600;                        /* Lebih tebal */
        }

        /*
        ===========================
        3. CARD LOGIN (PUTIH DI TENGAH)
        ===========================
        */

        .admin-login-card {
            display: flex;                           /* Kiri (form) & kanan (foto) sejajar horizontal */
            background-color: #fff;                  /* Card putih */
            border-radius: 20px;                     /* Sudut tumpul */
            box-shadow: 0 8px 25px rgba(0,0,0,0.15); /* Bayangan lembut */
            overflow: hidden;                        /* Sudut tumpul juga berlaku untuk isi */
            max-width: 900px;                        /* Lebar maksimal card */
            width: 100%;                             /* Lebar penuh sampai max-width */
        }

        /* KOLUM KIRI: FORM LOGIN */
        .admin-login-left {
            flex: 1;              /* Ambil 50% lebar card (sama dengan kanan) */
            padding: 35px 40px;   /* Ruang di dalam card kiri */
            text-align: left;     /* Text rata kiri (sesuai desain) */
        }

        /* KOLUM KANAN: FOTO */
        .admin-login-right {
            flex: 1;              /* Ambil 50% lebar card */
            min-height: 320px;    /* Minimal tinggi supaya foto kelihatan proporsional */
        }

        /* Gambar di sisi kanan */
        .admin-login-right img {
            width: 100%;          /* Lebar penuh kolom kanan */
            height: 100%;         /* Tinggi penuh kolom kanan */
            object-fit: cover;    /* Gambar menutupi area tanpa gepeng, bagian pinggir bisa ter-crop */
            display: block;       /* Hilangkan space kecil di bawah gambar */
        }

        /*
        ===========================
        4. TEKS DI ATAS FORM (Admin Panel + subjudul)
        ===========================
        */

        .admin-title {
            font-weight: 600;     /* Tebal sedang */
            font-size: 18px;
            margin-bottom: 4px;
        }

        .admin-subtitle {
            font-size: 13px;
            color: #777;
            margin-bottom: 25px;  /* Jarak ke form */
        }

        /*
        ===========================
        5. FORM LOGIN
        ===========================
        */

        .form-group {
            margin-bottom: 18px;  /* Jarak antar input */
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 6px;   /* Jarak label ke input */
        }

        .form-input {
            width: 100%;           /* Input full lebar kolom */
            padding: 10px 12px;    /* Ruang dalam input */
            border-radius: 8px;    /* Sudut tumpul */
            border: 1px solid #ddd;/* Border abu muda */
            font-size: 14px;
            outline: none;         /* Hilangkan outline biru default browser */
        }

        /* Efek saat input difokus (diklik) */
        .form-input:focus {
            border-color: #B33939;                     /* Border merah brand */
            box-shadow: 0 0 0 2px rgba(179,57,57,0.15);/* Glow merah lembut di luar border */
        }

        /* Tombol "Masuk" */
        .btn-admin-login {
            width: 100%;               /* Full lebar kolom kiri */
            border: none;              /* Tanpa border */
            margin-top: 10px;          /* Jarak ke atas */
            padding: 11px 0;           /* Tinggi tombol */
            border-radius: 8px;        /* Sudut tumpul */
            background-color: #B33939; /* Merah brand */
            color: #fff;               /* Teks putih */
            font-weight: 600;          /* Tebal */
            font-size: 14px;
            cursor: pointer;           /* Tangan saat hover */
            transition: all 0.2s ease; /* Animasi halus saat hover */
        }

        /* Efek hover tombol */
        .btn-admin-login:hover {
            background-color: #8f2e2e;                  /* Merah sedikit lebih gelap */
            box-shadow: 0 6px 14px rgba(179,57,57,0.35);/* Bayangan lebih kuat */
            transform: translateY(-1px);                /* Tombol naik 1px */
        }

        /*
        ===========================
        6. RESPONSIVE (LAYAR KECIL)
        ===========================
        */

        @media (max-width: 768px) {
            .admin-login-card {
                flex-direction: column;   /* Di HP: card jadi vertikal (atas-bawah) */
            }

            .admin-login-right {
                height: 220px;           /* Tinggi foto saat di bawah */
            }
        }
    </style>
</head>
<body>
    {{-- 
        WRAPPER UTAMA
        Berisi:
        - Bagian logo + tagline di atas
        - Card login (form + foto)
    --}}
     <div class="admin-page-wrapper">
        {{-- Judul + tagline di atas card (tanpa logo gambar) --}}
        <div class="admin-title-wrapper">

        {{-- 
            BAGIAN ATAS: LOGO + NAMA BRAND + TAGLINE 
            Posisi di tengah, di luar card putih
        --}}
            
            {{-- Nama brand --}}
            <h1>WAROENK QU</h1>
            
            {{-- Tagline: teks biasa + bagian berwarna merah --}}
            <p>Cita Rasa Autentik, <span>Harga Bersahabat</span></p>
        </div>

        {{-- 
            CARD LOGIN: sesuai desain
            Kiri = form login
            Kanan = foto suasana warung
        --}}
        <div class="admin-login-card">
            {{-- 
                KOLUM KIRI: FORM LOGIN ADMIN
            --}}
            <div class="admin-login-left">
                {{-- Judul di atas form --}}
                <div class="admin-title">Admin Panel</div>
                <div class="admin-subtitle">Sistem Manajemen Waroenk Qu</div>

                {{-- 
                    FORM LOGIN
                    method="POST" karena nantinya akan mengirim data username & password
                    action="#" sementara, nanti bisa diganti ke route proses login (misal route('admin.login.process'))
                --}}
                <form method="POST" action="{{ route('admin.login.process') }}">
    @csrf

                {{-- Tampilkan error login kalau ada --}}
                    @error('login')
                <div style="color:#B33939; font-size: 13px; margin-bottom: 12px;">
            {{ $message }}
        </div>
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

    <button type="submit" class="btn-admin-login">
        Masuk
    </button>
</form>


            {{-- 
                KOLUM KANAN: FOTO
                Ganti src gambarnya dengan foto yang kamu mau (sesuai desain)
            --}}
            <div class="admin-login-right">
                <img src="{{ asset('images/warung/dalam2.png') }}" alt="Suasana Waroenk Qu">
            </div>
        </div>
    </div>
</body>
</html>