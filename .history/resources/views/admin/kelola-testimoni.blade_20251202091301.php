{{-- 
========================================================
FILE   : resources/views/admin/kelola-testimoni.blade.php
HALAMAN: KELOLA TESTIMONI WAROENK QU
FITUR  : 
- Form tambah testimoni dengan rating bintang interaktif
- Grid card testimoni responsive (3 kolom → 2 kolom → 1 kolom)
- Edit & Hapus testimoni (placeholder fungsi untuk backend)
- Sidebar slide-in & top bar reusable
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Meta tags untuk encoding dan responsive design --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Kelola Testimoni - Waroenk Qu Admin</title>

    {{-- 
    ============================================
    CSS INTERNAL
    Semua styling halaman didefinisikan di sini
    ============================================
    --}}
    <style>
        /* =========================================================
           1. RESET & BASE STYLES
           Reset browser default, set font & background
           ========================================================= */
        
        * {
            margin: 0;                 /* Hilangkan margin default browser */
            padding: 0;                /* Hilangkan padding default browser */
            box-sizing: border-box;    /* Border & padding termasuk dalam width/height */
        }

        body {
            font-family: 'Poppins', sans-serif;  /* Font utama halaman */
            background-color: #F7EFDE;            /* Background krem lembut */
            color: #333;                           /* Warna teks abu gelap */
            line-height: 1.6;                      /* Line height untuk readability */
        }

        .page-container {
            min-height: 100vh;                     /* Minimal tinggi 1 layar penuh */
        }

        /* =========================================================
           2. OVERLAY & SIDEBAR
           Sidebar slide-in dari kiri dengan overlay gelap
           ========================================================= */
        
        /* Overlay gelap yang muncul di belakang sidebar saat dibuka */
        .overlay {
            position: fixed;                    /* Tetap di posisi viewport */
            inset: 0;                           /* Top, right, bottom, left = 0 (full screen) */
            background-color: rgba(0,0,0,0.4); /* Hitam dengan 40% transparansi */
            opacity: 0;                         /* Awalnya tidak terlihat */
            pointer-events: none;               /* Tidak bisa diklik saat hidden */
            transition: opacity 0.3s ease;     /* Animasi fade in/out selama 0.3 detik */
            z-index: 900;                       /* Di bawah sidebar (z-index 1000) */
        }

        /* Class tambahan untuk menampilkan overlay */
        .overlay.overlay--visible {
            opacity: 1;                         /* Tampak penuh */
            pointer-events: auto;              /* Bisa diklik (untuk tutup sidebar) */
        }

        /* Sidebar kiri yang bisa slide in/out */
        .sidebar {
            width: 260px;                       /* Lebar sidebar */
            background-color: #FFFFFF;          /* Background putih bersih */
            box-shadow: 4px 0 20px rgba(0,0,0,0.12); /* Shadow lembut di sisi kanan */
            display: flex;
            flex-direction: column;             /* Layout vertikal */
            padding: 28px 24px;                 /* Padding dalam sidebar */
            position: fixed;                    /* Posisi tetap terhadap viewport */
            top: 0;                             /* Menempel di atas */
            left: 0;                            /* Menempel di kiri */
            height: 100vh;                      /* Tinggi penuh layar */
            transform: translateX(-100%);       /* Awalnya tersembunyi di luar layar kiri */
            z-index: 1000;                      /* Di atas overlay */
            transition: transform 0.3s ease;   /* Animasi slide selama 0.3 detik */
        }

        /* Class untuk membuka sidebar (geser masuk ke layar) */
        .sidebar.sidebar--open {
            transform: translateX(0);           /* Geser ke posisi normal (terlihat) */
        }

        /* Header sidebar berisi logo dan teks */
        .sidebar-header {
            margin-bottom: 35px;               /* Jarak dengan menu di bawahnya */
        }

        .sidebar-logo {
            display: flex;
            align-items: center;               /* Vertikal center */
            gap: 0px;                          /* Tidak ada gap (logo + text rapat) */
            margin-bottom: -5px;               /* Sedikit naik untuk rapikan spacing */
        }

        .sidebar-logo-icon {
            width: 100px;                      /* Lebar logo */
            height: 100px;                     /* Tinggi logo */
            object-fit: contain;               /* Maintain aspect ratio logo */
        }

        .sidebar-logo-subtitle {
            font-size: 17px;
            color: #B33939;                    /* Warna merah khas brand */
            font-weight: 500;
        }

        /* Menu navigasi sidebar */
        .sidebar-menu {
            display: flex;
            flex-direction: column;            /* Layout vertikal */
            gap: 12px;                         /* Jarak antar item menu */
        }

        /* Item menu sidebar (link navigasi) */
        .sidebar-item {
            display: flex;
            align-items: center;               /* Icon & text vertikal center */
            gap: 12px;                         /* Jarak antara icon & text */
            padding: 10px 14px;                /* Padding dalam item */
            border-radius: 999px;              /* Bentuk pill (rounded penuh) */
            font-size: 13px;
            color: #444;                       /* Warna teks abu gelap */
            text-decoration: none;             /* Hilangkan underline link */
            transition: background-color 0.2s; /* Animasi background saat hover */
        }

        /* Hover effect pada menu */
        .sidebar-item:hover {
            background-color: #F5F5F5;         /* Background abu terang saat hover */
        }

        /* Menu yang sedang aktif (halaman dibuka) */
        .sidebar-item--active {
            background-color: #FDEBEA;         /* Background pink terang */
            color: #B33939;                    /* Text merah */
            font-weight: 600;                  /* Bold */
        }

        /* Icon di menu sidebar */
        .sidebar-item-icon {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }

        /* =========================================================
           3. TOP BAR
           Header atas dengan menu button & tombol keluar
           ========================================================= */
        
        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;    /* Space antara kiri & kanan */
            padding: 16px 36px;
            background-color: #FDF7EF;         /* Background krem terang */
            box-shadow: 0 2px 8px rgba(0,0,0,0.04); /* Shadow lembut */
        }

        .top-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Tombol hamburger menu (untuk buka sidebar) */
        .menu-button {
            border: none;
            background: transparent;
            padding: 8px;
            border-radius: 999px;
            cursor: pointer;                   /* Pointer cursor saat hover */
            transition: background-color 0.2s;
        }

        .menu-button:hover {
            background-color: #F0E0CF;         /* Background saat hover */
        }

        .menu-icon {
            width: 22px;
            height: 22px;
            display: block;
        }

        /* Tombol Keluar di kanan atas */
        .btn-logout {
            padding: 9px 20px;
            border-radius: 999px;              /* Bentuk pill */
            border: 1px solid #B33939;         /* Border merah */
            background-color: #fff;
            color: #B33939;                    /* Text merah */
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;                          /* Jarak icon & text */
            transition: all 0.2s ease;         /* Animasi smooth */
        }

        .btn-logout-icon {
            width: 15px;
            height: 15px;
            object-fit: contain;
        }

        /* Hover effect tombol keluar (background jadi merah, text jadi putih) */
        .btn-logout:hover {
            background-color: #B33939;
            color: #fff;
        }

        /* =========================================================
           4. HEADER SECTION "KELOLA TESTIMONI"
           Section dengan judul halaman & tombol tambah
           ========================================================= */
        
        .testi-header {
            background-color: #F7F2E9;         /* Background krem terang */
            padding: 20px 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;    /* Space between kiri & kanan */
        }

        .testi-header-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .testi-header-title {
            font-size: 19px;
            font-weight: 600;
            color: #B83939;                    /* Merah brand */
        }

        .testi-header-subtitle {
            font-size: 12px;
            color: #777;                       /* Abu-abu untuk subtitle */
        }

        /* Tombol merah "Tambah Testimoni" */
        .btn-add-testi {
            padding: 10px 22px;
            border-radius: 999px;              /* Bentuk pill */
            border: none;
            background-color: #B83939;         /* Merah brand */
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;                          /* Jarak icon & text */
            box-shadow: 0 6px 20px rgba(184,57,57,0.35); /* Shadow merah */
            transition: background-color 0.2s ease;
        }

        .btn-add-testi svg {
            width: 14px;
            height: 14px;
        }

        /* Hover effect: warna lebih gelap */
        .btn-add-testi:hover {
            background-color: #982E2E;
        }

        /* =========================================================
           5. WRAPPER KONTEN UTAMA
           Container untuk semua konten halaman
           ========================================================= */
        
        .content-wrapper {
            max-width: 1200px;                 /* Lebar maksimal konten */
            margin: 24px auto 50px auto;       /* Center horizontal dengan margin atas-bawah */
            padding: 0 20px;                   /* Padding kiri-kanan */
        }

        /* =========================================================
           6. FORM CARD TAMBAH TESTIMONI
           Card form yang muncul saat tombol "Tambah" diklik
           ========================================================= */
        
        .testi-form-card {
            background-color: #FFFFFF;          /* Background putih bersih */
            border-radius: 22px;                /* Rounded corner */
            padding: 24px 26px 22px;            /* Padding dalam card */
            box-shadow: 0 12px 32px rgba(0,0,0,0.10); /* Shadow lembut */
            margin-bottom: 24px;                /* Jarak dengan grid di bawah */
        }

        .testi-form-title {
            font-size: 14px;
            font-weight: 600;
            color: #B83939;                     /* Merah brand */
            margin-bottom: 18px;
        }

        /* Group untuk setiap input field */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;                           /* Jarak label & input */
            margin-bottom: 18px;                /* Jarak antar group */
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #555;
        }

        /* Input text dan textarea */
        .form-input,
        .form-textarea {
            border-radius: 10px;
            border: 1px solid #DDD;
            padding: 10px 12px;
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
            outline: none;
            background-color: #F9F9F9;
            transition: all 0.2s ease;
        }

        /* Focus state (saat diklik/aktif) */
        .form-input:focus,
        .form-textarea:focus {
            border-color: #B83939;              /* Border jadi merah */
            box-shadow: 0 0 0 3px rgba(184,57,57,0.12); /* Shadow merah soft */
            background-color: #FFF;
        }

        .form-textarea {
            min-height: 100px;                  /* Tinggi minimal textarea */
            resize: vertical;                   /* Hanya bisa resize vertikal */
        }

        /* ===== RATING BINTANG INTERAKTIF ===== */
        .rating-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 18px;
        }

        .star-rating {
            display: flex;
            gap: 6px;                           /* Jarak antar bintang */
        }

        /* Setiap bintang adalah span yang bisa diklik */
        .star {
            font-size: 28px;
            color: #DDD;                        /* Warna abu saat belum aktif */
            cursor: pointer;
            transition: color 0.15s ease, transform 0.1s ease;
            user-select: none;                  /* Tidak bisa diselect/highlight */
        }

        /* Bintang yang aktif (sudah diklik) berwarna emas */
        .star.star--active {
            color: #F2C94C;
        }

        /* Efek hover: bintang membesar sedikit */
        .star:hover {
            transform: scale(1.15);
        }

        /* ===== TOMBOL AKSI DI FORM ===== */
        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        /* Tombol Simpan (hijau) */
        .btn-save {
            flex: 1;                            /* Ambil space yang sama */
            padding: 10px 20px;
            border-radius: 999px;               /* Bentuk pill */
            border: none;
            background-color: #35A854;          /* Hijau */
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-save:hover {
            background-color: #2F9148;          /* Hijau lebih gelap */
        }

        /* Tombol Batal (abu-abu) */
        .btn-cancel {
            flex: 1;
            padding: 10px 20px;
            border-radius: 999px;
            border: 1px solid #CCC;
            background-color: #F5F5F5;
            color: #555;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-cancel:hover {
            background-color: #E3E3E3;
        }

        /* =========================================================
           7. GRID CARD TESTIMONI
           Layout grid responsive untuk tampilkan testimoni
           ========================================================= */
        
        .testi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);  /* 3 kolom di layar besar */
            gap: 20px;                               /* Jarak antar card */
        }

        /* Card testimoni */
        .testi-card {
            background-color: #FFFFFF;
            border-radius: 20px;
            padding: 22px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08); /* Shadow lembut */
            position: relative;                       /* Untuk positioning absolut tombol edit/hapus */
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        /* Hover effect: card naik sedikit dengan shadow lebih besar */
        .testi-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
        }

        /* Header card: foto profil + nama + tanggal */
        .testi-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        /* Foto profil di card testimoni */
        .testi-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;                      /* Bentuk lingkaran */
            background-color: #D9D9D9;               /* Warna fallback jika gambar gagal load */
            flex-shrink: 0;                          /* Tidak mengecil saat resize */
            object-fit: cover;                       /* Agar gambar terpotong proporsional */
        }

        .testi-info {
            flex: 1;                                 /* Ambil sisa space yang ada */
        }

        .testi-name {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 2px;
        }

        .testi-date {
            font-size: 11px;
            color: #999;                             /* Abu terang */
        }

        /* Icon edit dan hapus di pojok kanan atas card */
        .testi-actions {
            position: absolute;
            top: 18px;
            right: 18px;
            display: flex;
            gap: 6px;
        }

        .icon-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s;
        }

        /* Tombol edit (biru muda) */
        .icon-btn--edit {
            background-color: #EDF2FF;
        }

        .icon-btn--edit:hover {
            background-color: #D9E4FF;
        }

        /* Tombol hapus (pink muda) */
        .icon-btn--delete {
            background-color: #FFECEC;
        }

        .icon-btn--delete:hover {
            background-color: #FFD6D6;
        }

        .icon-btn svg {
            width: 16px;
            height: 16px;
        }

        /* Rating bintang di card (non-interaktif, hanya tampil) */
        .testi-rating {
            display: flex;
            gap: 3px;
            margin-bottom: 10px;
        }

        .testi-rating .star {
            font-size: 16px;
            cursor: default;                         /* Tidak bisa diklik */
        }

        /* Isi testimoni */
        .testi-text {
            font-size: 13px;
            color: #555;
            line-height: 1.7;
        }

        /* =========================================================
           8. RESPONSIVE DESIGN
           Tampilan untuk layar kecil (mobile/tablet)
           ========================================================= */
        
        /* Tablet: 2 kolom */
        @media (max-width: 992px) {
            .testi-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Mobile: 1 kolom */
        @media (max-width: 768px) {
            .top-bar,
            .testi-header {
                padding: 14px 20px;                  /* Padding lebih kecil */
            }

            .content-wrapper {
                padding: 0 16px;
            }

            .testi-grid {
                grid-template-columns: 1fr;          /* 1 kolom penuh */
            }
        }
    </style>
</head>
<body>

{{-- =========================================================
     OVERLAY UNTUK SIDEBAR
     Backdrop gelap saat sidebar dibuka
   ========================================================= --}}
<div class="overlay" id="overlay"></div>

<div class="page-container">

    {{-- =========================================================
         SIDEBAR ADMIN KIRI (REUSABLE)
         Menu navigasi admin (slide-in dari kiri)
       ========================================================= --}}
    <aside class="sidebar" id="sidebar">
        {{-- Header sidebar (logo + text) --}}
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo1.png') }}" 
                     alt="Logo Waroenk Qu" 
                     class="sidebar-logo-icon">
            </div>
            <div class="sidebar-logo-subtitle">Admin Panel</div>
        </div>

        {{-- Menu navigasi sidebar --}}
        <nav class="sidebar-menu">
            {{-- Link ke halaman Overview --}}
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/overview.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Overview">
                <span>Overview</span>
            </a>

            {{-- Link ke halaman Kelola Menu --}}
            <a href="{{ route('admin.menu') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/menu hitam.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Menu">
                <span>Menu</span>
            </a>

            {{-- Link ke halaman Kelola Galeri --}}
            <a href="{{ route('admin.galeri') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/galeri hitam.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Galeri">
                <span>Galeri</span>
            </a>

            {{-- Link ke halaman Kelola Testimoni (AKTIF - halaman ini) --}}
            <a href="{{ route('admin.testimoni') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/testi hitam.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Testimoni">
                <span>Testimoni</span>
            </a>

            {{-- Link ke halaman Kelola Tentang --}}
            <a href="{{ route('admin.tentang') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/tentang-hitam.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Tentang">
                <span>Tentang</span>
            </a>

            {{-- Link ke halaman Kelola Kontak --}}
            <a href="{{ route('admin.kontak') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/kontak hitam.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Kontak">
                <span>Kontak</span>
            </a>
        </nav>
    </aside>

    {{-- =========================================================
         TOP BAR (HEADER ADMIN)
         Header atas dengan menu button & tombol keluar
       ========================================================= --}}
    <header class="top-bar">
        <div class="top-left">
            {{-- Tombol hamburger menu untuk toggle sidebar --}}
            <button type="button" class="menu-button" id="menuToggle">
                <img src="{{ asset('images/icon/overview.png') }}" 
                     alt="Menu" 
                     class="menu-icon">
            </button>
        </div>

        {{-- Tombol keluar: redirect ke /admin/login --}}
        <form method="GET" action="/admin/login">
            <button type="submit" class="btn-logout">
                <img src="{{ asset('images/icon/logout merah.png') }}"
                     alt="Keluar"
                     class="btn-logout-icon">
                Keluar
            </button>
        </form>
    </header>

    {{-- =========================================================
         HEADER SECTION "KELOLA TESTIMONI"
         Judul halaman + tombol tambah testimoni
       ========================================================= --}}
    <section class="testi-header">
        <div class="testi-header-text">
            <div class="testi-header-title">Kelola Testimoni</div>
            <div class="testi-header-subtitle">
                Tambah, edit atau hapus testimoni pelanggan
            </div>
        </div>

        {{-- Tombol Tambah Testimoni (akan show/hide form card) --}}
        <button type="button" class="btn-add-testi" id="btnShowModal">
            {{-- Icon plus SVG --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M12 5v14M5 12h14" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
            Tambah Testimoni
        </button>
    </section>

    {{-- =========================================================
         WRAPPER KONTEN UTAMA
         Container untuk form card & grid testimoni
       ========================================================= --}}
    <div class="content-wrapper">

        {{-- ===== FORM TAMBAH TESTIMONI (CARD DI DALAM HALAMAN) ===== 
             Awalnya tersembunyi (display: none), muncul saat tombol diklik --}}
        <section class="testi-form-card" id="testiFormCard" style="display: none;">
            {{-- Judul form --}}
            <div class="testi-form-title">Tambah Testimoni Baru</div>

            {{-- Input Nama Pelanggan --}}
            <div class="form-group">
                <label class="form-label">Nama Pelanggan</label>
                <input type="text" 
                       class="form-input" 
                       id="inputNama"
                       placeholder="Nama lengkap">
            </div>

            {{-- Rating Bintang --}}
            <div class="rating-group">
                <label class="form-label">Rating</label>
                <div class="star-rating" id="starRating">
                    {{-- 5 bintang yang bisa diklik --}}
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
            </div>

            {{-- Textarea Testimoni --}}
            <div class="form-group">
                <label class="form-label">Testimoni</label>
                <textarea class="form-textarea" 
                          id="inputTestimoni"
                          placeholder="Tulis testimoni pelanggan..."></textarea>
            </div>

            {{-- Tombol Simpan & Batal --}}
            <div class="modal-actions">
                <button type="button" class="btn-save" id="btnSave">
                    Simpan
                </button>
                <button type="button" class="btn-cancel" id="btnCancelForm">
                    Batal
                </button>
            </div>
        </section>

        {{-- ===== GRID CARD TESTIMONI ===== 
             Tampilkan semua testimoni dalam grid 3 kolom (responsive) --}}
        <section class="testi-grid">
            
            {{-- ============================================
                 CARD TESTIMONI 1
                 ============================================ --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    {{-- Foto profil pengguna --}}
                    <img src="{{ asset('images/icon/user.png') }}" 
                        alt="User" 
                        class="testi-avatar">
                    <div class="testi-info">
                        <div class="testi-name">Rudi Santoso</div>
                        <div class="testi-date">2 minggu yang lalu</div>
                    </div>
                </div>

                {{-- Icon edit dan hapus di pojok kanan atas --}}
                <div class="testi-actions">
                    {{-- Tombol edit (icon pensil SVG) --}}
                    <button type="button" class="icon-btn icon-btn--edit" onclick="editTestimoni(1)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#395CFF">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>

                    {{-- Tombol hapus (icon tempat sampah SVG) --}}
                    <button type="button" class="icon-btn icon-btn--delete" onclick="deleteTestimoni(1)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04646">
                            <path d="M5 7h14M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                {{-- Rating bintang (5 bintang emas) --}}
                <div class="testi-rating">
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                </div>

                {{-- Isi testimoni --}}
                <div class="testi-text">
                    Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi kesini.
                </div>
            </article>

            {{-- ============================================
                 CARD TESTIMONI 2
                 ============================================ --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <img src="{{ asset('images/icon/user.png') }}" 
                        alt="User" 
                        class="testi-avatar">
                    <div class="testi-info">
                        <div class="testi-name">Vina Setiawan</div>
                        <div class="testi-date">2 hari yang lalu</div>
                    </div>
                </div>

                <div class="testi-actions">
                    <button type="button" class="icon-btn icon-btn--edit" onclick="editTestimoni(2)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#395CFF">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button type="button" class="icon-btn icon-btn--delete" onclick="deleteTestimoni(2)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04646">
                            <path d="M5 7h14M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                {{-- Rating 4 bintang --}}
                <div class="testi-rating">
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star">★</span>
                </div>

                <div class="testi-text">
                    Tempatnya cozy, pelayanan ramah. Rawonnya juara! Rasa bumbunya nempel di lidah, bikin nagih terus. Pasti balik lagi kesini.
                </div>
            </article>

            {{-- ============================================
                 CARD TESTIMONI 3
                 ============================================ --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <img src="{{ asset('images/icon/user.png') }}" 
                        alt="User" 
                        class="testi-avatar">
                    <div class="testi-info">
                        <div class="testi-name">Riana Fitri</div>
                        <div class="testi-date">3 hari yang lalu</div>
                    </div>
                </div>

                <div class="testi-actions">
                    <button type="button" class="icon-btn icon-btn--edit" onclick="editTestimoni(3)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#395CFF">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button type="button" class="icon-btn icon-btn--delete" onclick="deleteTestimoni(3)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04646">
                            <path d="M5 7h14M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="testi-rating">
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star">★</span>
                </div>

                <div class="testi-text">
                    Recommended! Menu variatif, porsi pas, dan yang penting rasanya mantap. Jadi langganan deh, cocok buat makan siang bareng teman.
                </div>
            </article>

            {{-- ============================================
                 CARD TESTIMONI 4-12
                 (Copy pattern yang sama seperti card 1-3)
                 ============================================ --}}
            
            {{-- Card 4 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <img src="{{ asset('images/icon/user.png') }}" 
                        alt="User" 
                        class="testi-avatar">
                    <div class="testi-info">
                        <div class="testi-name">Raya Wilianto</div>
                        <div class="testi-date">5 hari yang lalu</div>
                    </div>
                </div>

                <div class="testi-actions">
                    <button type="button" class="icon-btn icon-btn--edit" onclick="editTestimoni(4)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#395CFF">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button type="button" class="icon-btn icon-btn--delete" onclick="deleteTestimoni(4)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04646">
                            <path d="M5 7h14M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="testi-rating">
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                </div>

                <div class="testi-text">
                    Waroenk Qu ini hidden gem! Soto ayamnya enak banget, kuahnya seger. Tempatnya juga nyaman buat makan sama keluarga.
                </div>
            </article>

            {{-- Card 5 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <img src="{{ asset('images/icon/user.png') }}" 
                        alt="User" 
                        class="testi-avatar">
                    <div class="testi-info">
                        <div class="testi-name">Siti Nurjanah</div>
                        <div class="testi-date">1 minggu yang lalu</div>
                    </div>
                </div>

                <div class="testi-actions">
                    <button type="button" class="icon-btn icon-btn--edit" onclick="editTestimoni(5)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#395CFF">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button type="button" class="icon-btn icon-btn--delete" onclick="deleteTestimoni(5)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04646">
                            <path d="M5 7h14M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="testi-rating">
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star">★</span>
                </div>

                <div class="testi-text">
                    Pertama kali coba langsung jatuh cinta! Nasi gorengnya juara, bumbunya meresap sempurna. Harganya affordable banget.
                </div>
            </article>

            {{-- Card 6 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <img src="{{ asset('images/icon/user.png') }}" 
                        alt="User" 
                        class="testi-avatar">
                    <div class="testi-info">
                        <div class="testi-name">Hendra Alfica</div>
                        <div class="testi-date">1 minggu yang lalu</div>
                    </div>
                </div>

                <div class="testi-actions">
                    <button type="button" class="icon-btn icon-btn--edit" onclick="editTestimoni(6)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#395CFF">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button type="button" class="icon-btn icon-btn--delete" onclick="deleteTestimoni(6)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04646">
                            <path d="M5 7h14M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="testi-rating">
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>

                <div class="testi-text">
                    Lalapan ayamnya mantap! Ayamnya crispy, sambalnya pedas pas. Setiap hari kerja pasti mampir kesini buat makan siang.
                </div>
            </article>

            {{-- Card 7 - 12: Tambahkan card lainnya dengan pattern yang sama --}}
            {{-- Saya skip untuk menghemat ruang, tapi kamu bisa copy pattern di atas --}}

        </section>

    </div> {{-- /content-wrapper --}}
</div> {{-- /page-container --}}

{{-- ============================================
     JAVASCRIPT
     Semua fungsi interaktif halaman
     ============================================ --}}
<script>
    /* ========================================
       A. TOGGLE SIDEBAR ADMIN
       Fungsi untuk buka/tutup sidebar
       ======================================== */

    const menuToggle = document.getElementById('menuToggle');  // Tombol hamburger
    const sidebar    = document.getElementById('sidebar');     // Sidebar element
    const overlay    = document.getElementById('overlay');     // Overlay element

    if (menuToggle && sidebar && overlay) {
        /**
         * Event listener untuk tombol menu
         * Toggle class 'sidebar--open' pada sidebar & 'overlay--visible' pada overlay
         */
        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('sidebar--open');
            overlay.classList.toggle('overlay--visible');
        });

        /**
         * Event listener untuk overlay
         * Saat overlay diklik, tutup sidebar
         */
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        });
    }

    /* ========================================
       B. TOGGLE FORM TAMBAH TESTIMONI
       Show/hide form card saat tombol diklik
       ======================================== */

    const btnShowModal   = document.getElementById('btnShowModal');   // Tombol "Tambah Testimoni"
    const btnCancelForm  = document.getElementById('btnCancelForm');  // Tombol "Batal" di form
    const testiFormCard  = document.getElementById('testiFormCard');  // Section form card

    if (btnShowModal && testiFormCard) {
        /**
         * Event listener untuk tombol "Tambah Testimoni"
         * Jika form hidden → tampilkan & scroll ke form
         * Jika form sudah visible → sembunyikan
         */
        btnShowModal.addEventListener('click', function () {
            if (testiFormCard.style.display === 'none' || testiFormCard.style.display === '') {
                // Tampilkan form
                testiFormCard.style.display = 'block';
                // Scroll smooth ke posisi form (80px dari atas untuk clearance)
                window.scrollTo({ top: testiFormCard.offsetTop - 80, behavior: 'smooth' });
            } else {
                // Sembunyikan form
                testiFormCard.style.display = 'none';
                resetForm();  // Reset isi form
            }
        });
    }

    if (btnCancelForm && testiFormCard) {
        /**
         * Event listener untuk tombol "Batal"
         * Sembunyikan form dan reset isinya
         */
        btnCancelForm.addEventListener('click', function () {
            testiFormCard.style.display = 'none';
            resetForm();
        });
    }

    /* ========================================
       C. STAR RATING INTERAKTIF
       Bintang bisa diklik dan hover
       ======================================== */

    const starRating = document.getElementById('starRating');       // Container rating
    const stars      = starRating.querySelectorAll('.star');        // Semua bintang
    let selectedRating = 0;  // Menyimpan rating yang dipilih user (0-5)

    /**
     * Loop tiap bintang untuk pasang event listener
     */
    stars.forEach(function (star, index) {
        /**
         * Event: Hover → highlight bintang sampai posisi kursor
         */
        star.addEventListener('mouseenter', function () {
            highlightStars(index + 1);  // Highlight dari bintang 1 sampai index+1
        });

        /**
         * Event: Klik → tetapkan rating
         */
        star.addEventListener('click', function () {
            selectedRating = index + 1;  // Simpan rating yang dipilih
            highlightStars(selectedRating);
        });
    });

    /**
     * Event: Mouse keluar dari area rating
     * Kembalikan ke rating yang dipilih (bukan hover)
     */
    starRating.addEventListener('mouseleave', function () {
        highlightStars(selectedRating);
    });

    /**
     * Fungsi untuk highlight bintang dari 1 sampai count
     * @param {number} count - Jumlah bintang yang akan di-highlight
     */
    function highlightStars(count) {
        stars.forEach(function (star, index) {
            if (index < count) {
                star.classList.add('star--active');    // Tambah class active (warna emas)
            } else {
                star.classList.remove('star--active'); // Hilangkan class active (warna abu)
            }
        });
    }

    /* ========================================
       D. FUNGSI SIMPAN TESTIMONI
       Validasi dan simpan data testimoni
       ======================================== */

    const btnSave = document.getElementById('btnSave');
    if (btnSave) {
        /**
         * Event listener untuk tombol "Simpan"
         * Validasi input, lalu simpan data (nanti connect ke backend)
         */
        btnSave.addEventListener('click', function () {
            const nama       = document.getElementById('inputNama').value;
            const testimoni  = document.getElementById('inputTestimoni').value;

            // Validasi sederhana: cek apakah semua field terisi
            if (!nama || !testimoni || selectedRating === 0) {
                alert('Harap isi semua field dan pilih rating!');
                return;  // Stop eksekusi jika validasi gagal
            }

            // Di sini nanti kamu bisa kirim data ke backend via AJAX/Fetch
            console.log('Nama:', nama);
            console.log('Rating:', selectedRating);
            console.log('Testimoni:', testimoni);

            alert('Testimoni berhasil disimpan! (Fitur backend belum tersambung)');

            // Sembunyikan form dan reset
            testiFormCard.style.display = 'none';
            resetForm();
        });
    }

    /**
     * Fungsi untuk reset form setelah disimpan/dibatalkan
     * Mengosongkan semua input dan reset rating ke 0
     */
    function resetForm() {
        document.getElementById('inputNama').value = '';           // Kosongkan input nama
        document.getElementById('inputTestimoni').value = '';      // Kosongkan textarea
        selectedRating = 0;                                        // Reset rating ke 0
        highlightStars(0);                                         // Hilangkan highlight bintang
    }

    /* ========================================
       E. FUNGSI EDIT & DELETE TESTIMONI
       Placeholder untuk fitur edit & hapus
       ======================================== */

    /**
     * Fungsi placeholder untuk edit testimoni
     * @param {number} id - ID testimoni yang akan diedit
     * 
     * Nanti bisa:
     * 1. Ambil data testimoni dari database berdasarkan ID
     * 2. Isi data ke form
     * 3. Tampilkan form dalam mode edit
     */
    function editTestimoni(id) {
        console.log('Edit testimoni ID:', id);
        alert('Fitur edit testimoni ID ' + id + ' (belum tersambung backend)');
        
        // Contoh implementasi nanti:
        // - Fetch data testimoni by ID dari API
        // - Isi form dengan data tersebut
        // - Ubah tombol "Simpan" jadi "Update"
        // - Kirim PUT request ke backend saat update
    }

    /**
     * Fungsi placeholder untuk hapus testimoni
     * @param {number} id - ID testimoni yang akan dihapus
     * 
     * Nanti bisa:
     * 1. Konfirmasi user dengan confirm dialog
     * 2. Kirim DELETE request ke backend
     * 3. Reload atau hapus card dari DOM
     */
    function deleteTestimoni(id) {
        const confirmed = confirm('Yakin ingin menghapus testimoni ini?');
        if (confirmed) {
            console.log('Hapus testimoni ID:', id);
            alert('Testimoni ID ' + id + ' dihapus (belum tersambung backend)');
            
            // Contoh implementasi nanti:
            // - Kirim DELETE request ke API dengan ID testimoni
            // - Jika berhasil, hapus card dari DOM atau reload halaman
            // - Tampilkan notifikasi sukses
        }
    }
</script>

</body>
</html>
