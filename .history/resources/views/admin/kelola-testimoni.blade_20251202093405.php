{{-- 
========================================================
FILE   : resources/views/admin/kelola-testimoni.blade.php
HALAMAN: KELOLA TESTIMONI WAROENK QU (FULLY FUNCTIONAL)
AUTHOR : Waroenk Qu Development Team
VERSION: 2.0 - Full Dynamic & Interactive
========================================================

FITUR LENGKAP:
- Tambah testimoni baru (langsung muncul di grid)
- Edit testimoni (klik icon pensil → isi form dengan data lama)
- Hapus testimoni (dengan konfirmasi)
- Data persistent dengan localStorage
- Rating bintang interaktif (hover & click)
- Animasi smooth (fade in, slide up, hover effects)
- Grid responsive (3 kolom → 2 kolom → 1 kolom)
- 12 testimoni default (bisa ditambah/edit/hapus)

TEKNOLOGI:
- Pure HTML, CSS, JavaScript (no framework)
- localStorage untuk data persistence
- Responsive design dengan CSS Grid
- SVG icons untuk UI yang crisp

========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    {{-- CSRF Token untuk API request --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Meta tags untuk encoding karakter dan responsive viewport --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Title yang muncul di browser tab --}}
    <title>Kelola Testimoni - Waroenk Qu Admin</title>

    {{-- 
    ============================================
    CSS INTERNAL
    Semua styling halaman didefinisikan di sini
    untuk kemudahan maintenance dan loading speed
    ============================================
    --}}
    <style>
        /* =========================================================
           1. RESET & BASE STYLES
           Reset browser default styles & set base typography
           ========================================================= */
        
        * {
            margin: 0;                          /* Hilangkan margin default browser */
            padding: 0;                         /* Hilangkan padding default browser */
            box-sizing: border-box;             /* Border & padding termasuk dalam width/height */
        }

        body {
            font-family: 'Poppins', sans-serif;  /* Font utama halaman (clean & modern) */
            background-color: #F7EFDE;            /* Background krem lembut (warna brand) */
            color: #333;                          /* Warna teks abu gelap (readability) */
            line-height: 1.6;                     /* Line height untuk readability */
        }

        .page-container {
            min-height: 100vh;                    /* Minimal tinggi 1 layar penuh */
        }

        /* =========================================================
           2. OVERLAY & SIDEBAR
           Sidebar slide-in dari kiri dengan overlay gelap backdrop
           ========================================================= */
        
        /* Overlay gelap yang muncul di belakang sidebar saat dibuka */
        .overlay {
            position: fixed;                      /* Tetap di posisi viewport (tidak scroll) */
            inset: 0;                             /* Top, right, bottom, left = 0 (full screen) */
            background-color: rgba(0,0,0,0.4);   /* Hitam dengan 40% transparansi */
            opacity: 0;                           /* Awalnya tidak terlihat (transparan penuh) */
            pointer-events: none;                 /* Tidak bisa diklik saat hidden */
            transition: opacity 0.3s ease;       /* Animasi fade in/out selama 0.3 detik */
            z-index: 900;                         /* Di bawah sidebar (z-index 1000) */
        }

        /* Class tambahan untuk menampilkan overlay (ditambahkan via JS) */
        .overlay.overlay--visible {
            opacity: 1;                           /* Tampak penuh (tidak transparan) */
            pointer-events: auto;                 /* Bisa diklik (untuk tutup sidebar) */
        }

        /* Sidebar kiri yang bisa slide in/out */
        .sidebar {
            width: 260px;                         /* Lebar sidebar fixed */
            background-color: #FFFFFF;            /* Background putih bersih */
            box-shadow: 4px 0 20px rgba(0,0,0,0.12); /* Shadow lembut di sisi kanan */
            display: flex;
            flex-direction: column;               /* Layout vertikal (logo di atas, menu di bawah) */
            padding: 28px 24px;                   /* Padding dalam sidebar */
            position: fixed;                      /* Posisi tetap terhadap viewport */
            top: 0;                               /* Menempel di atas */
            left: 0;                              /* Menempel di kiri */
            height: 100vh;                        /* Tinggi penuh layar */
            transform: translateX(-100%);         /* Awalnya tersembunyi di luar layar kiri */
            z-index: 1000;                        /* Di atas overlay (900) */
            transition: transform 0.3s ease;     /* Animasi slide selama 0.3 detik */
        }

        /* Class untuk membuka sidebar (geser masuk ke layar) */
        .sidebar.sidebar--open {
            transform: translateX(0);             /* Geser ke posisi normal (terlihat di layar) */
        }

        /* Header sidebar berisi logo dan teks admin panel */
        .sidebar-header {
            margin-bottom: 35px;                  /* Jarak dengan menu di bawahnya */
        }

        .sidebar-logo {
            display: flex;
            align-items: center;                  /* Vertikal center */
            gap: 0px;                             /* Tidak ada gap (logo + text rapat) */
            margin-bottom: -5px;                  /* Sedikit naik untuk rapikan spacing */
        }

        .sidebar-logo-icon {
            width: 100px;                         /* Lebar logo */
            height: 100px;                        /* Tinggi logo (aspect ratio 1:1) */
            object-fit: contain;                  /* Maintain aspect ratio logo */
        }

        .sidebar-logo-subtitle {
            font-size: 17px;
            color: #B33939;                       /* Warna merah khas brand Waroenk Qu */
            font-weight: 500;                     /* Semi-bold */
        }

        /* Menu navigasi sidebar */
        .sidebar-menu {
            display: flex;
            flex-direction: column;               /* Layout vertikal */
            gap: 12px;                            /* Jarak antar item menu */
        }

        /* Item menu sidebar (link navigasi) */
        .sidebar-item {
            display: flex;
            align-items: center;                  /* Icon & text vertikal center */
            gap: 12px;                            /* Jarak antara icon & text */
            padding: 10px 14px;                   /* Padding dalam item */
            border-radius: 999px;                 /* Bentuk pill (rounded penuh) */
            font-size: 13px;
            color: #444;                          /* Warna teks abu gelap */
            text-decoration: none;                /* Hilangkan underline link */
            transition: background-color 0.2s;    /* Animasi background saat hover */
        }

        /* Hover effect pada menu */
        .sidebar-item:hover {
            background-color: #F5F5F5;            /* Background abu terang saat hover */
        }

        /* Menu yang sedang aktif (halaman yang dibuka) */
        .sidebar-item--active {
            background-color: #FDEBEA;            /* Background pink terang */
            color: #B33939;                       /* Text merah brand */
            font-weight: 600;                     /* Bold */
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
            justify-content: space-between;       /* Space antara kiri & kanan */
            padding: 16px 36px;
            background-color: #FDF7EF;            /* Background krem terang */
            box-shadow: 0 2px 8px rgba(0,0,0,0.04); /* Shadow lembut untuk depth */
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
            border-radius: 999px;                 /* Bentuk lingkaran */
            cursor: pointer;                      /* Pointer cursor saat hover */
            transition: background-color 0.2s;
        }

        .menu-button:hover {
            background-color: #F0E0CF;            /* Background saat hover */
        }

        .menu-icon {
            width: 22px;
            height: 22px;
            display: block;
        }

        /* Tombol Keluar di kanan atas */
        .btn-logout {
            padding: 9px 20px;
            border-radius: 999px;                 /* Bentuk pill */
            border: 1px solid #B33939;            /* Border merah */
            background-color: #fff;
            color: #B33939;                       /* Text merah */
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;                             /* Jarak icon & text */
            transition: all 0.2s ease;            /* Animasi smooth untuk semua property */
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
            background-color: #F7F2E9;            /* Background krem terang */
            padding: 20px 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;       /* Space between kiri & kanan */
        }

        .testi-header-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .testi-header-title {
            font-size: 19px;
            font-weight: 600;
            color: #B83939;                       /* Merah brand */
        }

        .testi-header-subtitle {
            font-size: 12px;
            color: #777;                          /* Abu-abu untuk subtitle */
        }

        /* Tombol merah "Tambah Testimoni" */
        .btn-add-testi {
            padding: 10px 22px;
            border-radius: 999px;                 /* Bentuk pill */
            border: none;
            background-color: #B83939;            /* Merah brand */
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;                             /* Jarak icon & text */
            box-shadow: 0 6px 20px rgba(184,57,57,0.35); /* Shadow merah untuk depth */
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
           Container untuk semua konten halaman (centered)
           ========================================================= */
        
        .content-wrapper {
            max-width: 1200px;                    /* Lebar maksimal konten */
            margin: 24px auto 50px auto;          /* Center horizontal dengan margin atas-bawah */
            padding: 0 20px;                      /* Padding kiri-kanan */
        }

        /* =========================================================
           6. FORM CARD TAMBAH/EDIT TESTIMONI
           Card form yang muncul saat tombol "Tambah" atau "Edit" diklik
           ========================================================= */
        
        .testi-form-card {
            background-color: #FFFFFF;             /* Background putih bersih */
            border-radius: 22px;                   /* Rounded corner besar */
            padding: 24px 26px 22px;               /* Padding dalam card */
            box-shadow: 0 12px 32px rgba(0,0,0,0.10); /* Shadow lembut untuk depth */
            margin-bottom: 24px;                   /* Jarak dengan grid di bawah */
        }

        .testi-form-title {
            font-size: 14px;
            font-weight: 600;
            color: #B83939;                        /* Merah brand */
            margin-bottom: 18px;
        }

        /* Group untuk setiap input field (label + input) */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;                              /* Jarak antara label & input */
            margin-bottom: 18px;                   /* Jarak antar group */
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
            font-family: 'Poppins', sans-serif;   /* Sama dengan body font */
            outline: none;                         /* Hilangkan outline default browser */
            background-color: #F9F9F9;
            transition: all 0.2s ease;            /* Animasi smooth untuk semua property */
        }

        /* Focus state (saat input diklik/aktif) */
        .form-input:focus,
        .form-textarea:focus {
            border-color: #B83939;                 /* Border jadi merah */
            box-shadow: 0 0 0 3px rgba(184,57,57,0.12); /* Shadow merah soft */
            background-color: #FFF;
        }

        .form-textarea {
            min-height: 100px;                     /* Tinggi minimal textarea */
            resize: vertical;                      /* Hanya bisa resize vertikal (tidak horizontal) */
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
            gap: 6px;                              /* Jarak antar bintang */
        }

        /* Setiap bintang adalah span yang bisa diklik */
        .star {
            font-size: 28px;
            color: #DDD;                           /* Warna abu saat belum aktif */
            cursor: pointer;
            transition: color 0.15s ease, transform 0.1s ease;
            user-select: none;                     /* Tidak bisa diselect/highlight */
        }

        /* Bintang yang aktif (sudah diklik) berwarna emas */
        .star.star--active {
            color: #F2C94C;                        /* Warna emas untuk bintang aktif */
        }

        /* Efek hover: bintang membesar sedikit */
        .star:hover {
            transform: scale(1.15);
        }

        /* ===== TOMBOL AKSI DI FORM (SIMPAN & BATAL) ===== */
        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        /* Tombol Simpan (hijau) */
        .btn-save {
            flex: 1;                               /* Ambil space yang sama dengan tombol Batal */
            padding: 10px 20px;
            border-radius: 999px;                  /* Bentuk pill */
            border: none;
            background-color: #35A854;             /* Hijau */
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-save:hover {
            background-color: #2F9148;             /* Hijau lebih gelap saat hover */
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
           Layout grid responsive untuk tampilkan semua testimoni
           ========================================================= */
        
        .testi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 kolom equal width di layar besar */
            gap: 20px;                             /* Jarak antar card */
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
            transform: translateY(-4px);             /* Naik 4px */
            box-shadow: 0 12px 32px rgba(0,0,0,0.12); /* Shadow lebih tebal */
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
            border-radius: 50%;                       /* Bentuk lingkaran */
            background-color: #D9D9D9;                /* Warna fallback jika gambar gagal load */
            flex-shrink: 0;                           /* Tidak mengecil saat resize */
            object-fit: cover;                        /* Agar gambar terpotong proporsional */
        }

        .testi-info {
            flex: 1;                                  /* Ambil sisa space yang ada */
        }

        .testi-name {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 2px;
        }

        .testi-date {
            font-size: 11px;
            color: #999;                              /* Abu terang untuk tanggal */
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
            background-color: #D9E4FF;                /* Biru lebih gelap saat hover */
        }

        /* Tombol hapus (pink muda) */
        .icon-btn--delete {
            background-color: #FFECEC;
        }

        .icon-btn--delete:hover {
            background-color: #FFD6D6;                /* Pink lebih gelap saat hover */
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
            cursor: default;                          /* Tidak bisa diklik (readonly) */
        }

        /* Isi testimoni */
        .testi-text {
            font-size: 13px;
            color: #555;
            line-height: 1.7;                         /* Line height untuk readability */
        }

        /* =========================================================
           8. RESPONSIVE DESIGN
           Tampilan untuk layar kecil (mobile/tablet)
           ========================================================= */
        
        /* Tablet: 2 kolom */
        @media (max-width: 992px) {
            .testi-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 kolom equal width */
            }
        }

        /* Mobile: 1 kolom */
        @media (max-width: 768px) {
            .top-bar,
            .testi-header {
                padding: 14px 20px;                   /* Padding lebih kecil */
            }

            .content-wrapper {
                padding: 0 16px;
            }

            .testi-grid {
                grid-template-columns: 1fr;           /* 1 kolom penuh */
            }
        }
    </style>
</head>
<body>

{{-- =========================================================
     OVERLAY UNTUK SIDEBAR
     Backdrop gelap yang muncul saat sidebar dibuka
   ========================================================= --}}
<div class="overlay" id="overlay"></div>

<div class="page-container">

    {{-- =========================================================
         SIDEBAR ADMIN KIRI (REUSABLE)
         Menu navigasi admin yang slide-in dari kiri
       ========================================================= --}}
    <aside class="sidebar" id="sidebar">
        {{-- Header sidebar (logo + text admin panel) --}}
        <div class="sidebar-header">
            <div class="sidebar-logo">
                {{-- Logo Waroenk Qu --}}
                <img src="{{ asset('images/logo1.png') }}" 
                     alt="Logo Waroenk Qu" 
                     class="sidebar-logo-icon">
            </div>
            <div class="sidebar-logo-subtitle">Admin Panel</div>
        </div>

        {{-- Menu navigasi sidebar --}}
        <nav class="sidebar-menu">
            {{-- Link ke halaman Overview/Dashboard --}}
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

        {{-- Tombol keluar: redirect ke halaman login admin --}}
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
         Judul halaman + subtitle + tombol tambah testimoni
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
            {{-- Icon plus SVG (dibuat manual) --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M12 5v14M5 12h14" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
            Tambah Testimoni
        </button>
    </section>

    {{-- =========================================================
         WRAPPER KONTEN UTAMA
         Container untuk form card & grid testimoni (centered & max-width)
       ========================================================= --}}
    <div class="content-wrapper">

        {{-- ===== FORM CARD TAMBAH/EDIT TESTIMONI ===== 
             Awalnya tersembunyi (display: none), muncul saat tombol "Tambah" atau "Edit" diklik --}}
        <section class="testi-form-card" id="testiFormCard" style="display: none;">
            {{-- Judul form (berubah antara "Tambah Testimoni Baru" atau "Edit Testimoni") --}}
            <div class="testi-form-title" id="formTitle">Tambah Testimoni Baru</div>

            {{-- Hidden input untuk menyimpan ID testimoni saat edit (tidak terlihat di UI) --}}
            <input type="hidden" id="editingId" value="">

            {{-- Input Nama Pelanggan --}}
            <div class="form-group">
                <label class="form-label">Nama Pelanggan</label>
                <input type="text" 
                       class="form-input" 
                       id="inputNama"
                       placeholder="Nama lengkap">
            </div>

            {{-- Rating Bintang (Interactive) --}}
            <div class="rating-group">
                <label class="form-label">Rating</label>
                <div class="star-rating" id="starRating">
                    {{-- 5 bintang yang bisa diklik, data-value untuk menyimpan nilai rating --}}
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

        {{-- ===== GRID TESTIMONI ===== 
             Grid 3 kolom (responsive) yang akan di-populate via JavaScript
             Semua card testimoni di-generate dinamis dari array testimoniData --}}
        <section class="testi-grid" id="testiGrid">
            {{-- Card testimoni akan di-generate otomatis oleh fungsi renderTestimoni() di JavaScript --}}
            {{-- Tidak ada HTML statis di sini, semua dinamis! --}}
        </section>

    </div> {{-- /content-wrapper --}}

</div> {{-- /page-container --}}

{{-- ============================================
     JAVASCRIPT - FULL FUNCTIONAL & INTERACTIVE
     Semua fungsi untuk CRUD testimoni & interaktivitas UI
     ============================================ --}}
<script>
    /* ========================================
       A. DATA DEFAULT & INITIALIZATION
       Inisialisasi data testimoni default & load dari localStorage
       ======================================== */

    /**
     * Data default testimoni (12 testimoni)
     * Struktur object: { id, nama, rating, testimoni, tanggal }
     * 
     * - id: Unique identifier (auto-increment saat tambah baru)
     * - nama: Nama pelanggan yang memberikan testimoni
     * - rating: Rating bintang (1-5)
     * - testimoni: Isi testimoni pelanggan
     * - tanggal: Relative time (contoh: "2 hari yang lalu")
     */
    const defaultTestimoni = [
        { 
            id: 1, 
            nama: 'Rudi Santoso', 
            rating: 5, 
            testimoni: 'Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi kesini.', 
            tanggal: '2 minggu yang lalu' 
        },
        { 
            id: 2, 
            nama: 'Vina Setiawan', 
            rating: 4, 
            testimoni: 'Tempatnya cozy, pelayanan ramah. Rawonnya juara! Rasa bumbunya nempel di lidah, bikin nagih terus. Pasti balik lagi kesini.', 
            tanggal: '2 hari yang lalu' 
        },
        { 
            id: 3, 
            nama: 'Riana Fitri', 
            rating: 4, 
            testimoni: 'Recommended! Menu variatif, porsi pas, dan yang penting rasanya mantap. Jadi langganan deh, cocok buat makan siang bareng teman.', 
            tanggal: '3 hari yang lalu' 
        },
        { 
            id: 4, 
            nama: 'Raya Wilianto', 
            rating: 5, 
            testimoni: 'Waroenk Qu ini hidden gem! Soto ayamnya enak banget, kuahnya seger. Tempatnya juga nyaman buat makan sama keluarga.', 
            tanggal: '5 hari yang lalu' 
        },
        { 
            id: 5, 
            nama: 'Siti Nurjanah', 
            rating: 4, 
            testimoni: 'Pertama kali coba langsung jatuh cinta! Nasi gorengnya juara, bumbunya meresap sempurna. Harganya affordable banget.', 
            tanggal: '1 minggu yang lalu' 
        },
        { 
            id: 6, 
            nama: 'Hendra Alfica', 
            rating: 3, 
            testimoni: 'Lalapan ayamnya mantap! Ayamnya crispy, sambalnya pedas pas. Setiap hari kerja pasti mampir kesini buat makan siang.', 
            tanggal: '1 minggu yang lalu' 
        },
        { 
            id: 7, 
            nama: 'Maya Sari', 
            rating: 3, 
            testimoni: 'Pelayanannya cepat dan ramah. Menu-menunya enak semua, terutama mie goreng Jawanya. Jadi tempat favorit buat nongkrong.', 
            tanggal: '1 minggu yang lalu' 
        },
        { 
            id: 8, 
            nama: 'Budi Prasetyo', 
            rating: 5, 
            testimoni: 'Gudeg-nya mantap! Rasanya manis gurih, empuk banget. Bikin kangen kampung halaman. Harus coba kalau ke Jogja.', 
            tanggal: '2 minggu yang lalu' 
        },
        { 
            id: 9, 
            nama: 'Lina Wati', 
            rating: 4, 
            testimoni: 'Sate ayamnya enak, bumbunya meresap. Harga terjangkau, porsi banyak. Cocok buat makan berdua atau sendiri.', 
            tanggal: '2 minggu yang lalu' 
        },
        { 
            id: 10, 
            nama: 'Andi Susanto', 
            rating: 5, 
            testimoni: 'Gado-gadonya segar banget! Sayurnya fresh, bumbunya pas. Tempatnya bersih dan nyaman. Recommended!', 
            tanggal: '3 minggu yang lalu' 
        },
        { 
            id: 11, 
            nama: 'Dewi Kusuma', 
            rating: 4, 
            testimoni: 'Nasi uduk pagi-pagi di sini jadi ritual! Lauk-lauknya lengkap, rasanya autentik. Harga ramah kantong.', 
            tanggal: '3 minggu yang lalu' 
        },
        { 
            id: 12, 
            nama: 'Agus Setiawan', 
            rating: 5, 
            testimoni: 'Pecel lelenya juara! Sambalnya pedasnya pas, ikannya segar. Pelayanan juga cepat. Bakal balik lagi pasti!', 
            tanggal: '1 bulan yang lalu' 
        }
    ];

    /**
     * Load data dari localStorage
     * Jika localStorage kosong (pertama kali buka halaman), pakai defaultTestimoni
     * 
     * Format localStorage:
     * Key: 'testimoniData'
     * Value: JSON string dari array testimoni
     */
    let testimoniData = JSON.parse(localStorage.getItem('testimoniData')) || defaultTestimoni;

    /**
     * Variabel untuk star rating (menyimpan rating yang dipilih user, 0-5)
     */
    let selectedRating = 0;

    /**
     * Variabel untuk mode edit (menyimpan ID testimoni yang sedang diedit)
     * Jika null = mode tambah baru
     * Jika ada nilai (number) = mode edit testimoni dengan ID tersebut
     */
    let editingId = null;

    /* ========================================
       B. RENDER TESTIMONI KE GRID
       Fungsi untuk generate HTML card testimoni secara dinamis
       ======================================== */

    /**
     * Fungsi untuk render semua testimoni ke grid
     * 
     * Cara kerja:
     * 1. Kosongkan grid terlebih dahulu (innerHTML = '')
     * 2. Loop array testimoniData
     * 3. Generate HTML card untuk setiap testimoni
     * 4. Append card ke grid
     * 
     * Dipanggil saat:
     * - Halaman pertama kali load
     * - Setelah tambah testimoni baru
     * - Setelah edit testimoni
     * - Setelah hapus testimoni
     */
    function renderTestimoni() {
        const grid = document.getElementById('testiGrid');
        
        // Kosongkan grid terlebih dahulu (clear existing cards)
        grid.innerHTML = '';

        // Loop setiap testimoni dalam array
        testimoniData.forEach(testi => {
            // Buat elemen article untuk card
            const card = document.createElement('article');
            card.className = 'testi-card';
            
            // Generate HTML bintang rating sesuai dengan rating testimoni
            // Loop 1-5, tambah class 'star--active' jika index <= rating
            let starsHTML = '';
            for (let i = 1; i <= 5; i++) {
                const activeClass = i <= testi.rating ? 'star--active' : '';
                starsHTML += `<span class="star ${activeClass}">★</span>`;
            }

            // Set innerHTML card dengan template HTML
            // Gunakan template literal (backtick) untuk multi-line string & interpolasi variabel
            card.innerHTML = `
                <div class="testi-card-header">
                    <img src="{{ asset('images/icon/user.png') }}" 
                        alt="User" 
                        class="testi-avatar">
                    <div class="testi-info">
                        <div class="testi-name">${testi.nama}</div>
                        <div class="testi-date">${testi.tanggal}</div>
                    </div>
                </div>

                <div class="testi-actions">
                    <button type="button" class="icon-btn icon-btn--edit" onclick="editTestimoni(${testi.id})">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#395CFF">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button type="button" class="icon-btn icon-btn--delete" onclick="deleteTestimoni(${testi.id})">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04646">
                            <path d="M5 7h14M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="testi-rating">
                    ${starsHTML}
                </div>

                <div class="testi-text">
                    ${testi.testimoni}
                </div>
            `;

            // Append card ke grid
            grid.appendChild(card);
        });
    }

    /* ========================================
       C. TOGGLE SIDEBAR
       Fungsi untuk buka/tutup sidebar dengan smooth animation
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
         * Saat overlay diklik, tutup sidebar (remove class)
         */
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        });
    }

    /* ========================================
       D. TOGGLE FORM TAMBAH/EDIT TESTIMONI
       Show/hide form card saat tombol "Tambah Testimoni" atau "Batal" diklik
       ======================================== */

    const btnShowModal   = document.getElementById('btnShowModal');   // Tombol "Tambah Testimoni"
    const btnCancelForm  = document.getElementById('btnCancelForm');  // Tombol "Batal" di form
    const testiFormCard  = document.getElementById('testiFormCard');  // Section form card
    const formTitle      = document.getElementById('formTitle');      // Judul form

    if (btnShowModal && testiFormCard) {
        /**
         * Event listener untuk tombol "Tambah Testimoni"
         * 
         * Jika form hidden → tampilkan form & scroll ke posisi form
         * Jika form sudah visible → sembunyikan form & reset
         */
        btnShowModal.addEventListener('click', function () {
            if (testiFormCard.style.display === 'none' || testiFormCard.style.display === '') {
                // Mode tambah baru (bukan edit)
                editingId = null;
                formTitle.textContent = 'Tambah Testimoni Baru';
                
                // Tampilkan form
                testiFormCard.style.display = 'block';
                
                // Scroll smooth ke posisi form (80px dari atas untuk clearance)
                window.scrollTo({ top: testiFormCard.offsetTop - 80, behavior: 'smooth' });
            } else {
                // Toggle off (sembunyikan form)
                testiFormCard.style.display = 'none';
                resetForm();
            }
        });
    }

    if (btnCancelForm && testiFormCard) {
        /**
         * Event listener untuk tombol "Batal"
         * Sembunyikan form dan reset semua input
         */
        btnCancelForm.addEventListener('click', function () {
            testiFormCard.style.display = 'none';
            resetForm();
        });
    }

    /* ========================================
       E. STAR RATING INTERAKTIF
       Bintang bisa diklik (set rating) dan hover (preview rating)
       ======================================== */

    const starRating = document.getElementById('starRating');       // Container rating
    const stars      = starRating.querySelectorAll('.star');        // Semua bintang (NodeList)

    /**
     * Loop tiap bintang untuk pasang event listener
     */
    stars.forEach(function (star, index) {
        /**
         * Event: Hover (mouseenter) → highlight bintang sampai posisi kursor
         * Preview rating sementara (tidak tersimpan)
         */
        star.addEventListener('mouseenter', function () {
            highlightStars(index + 1);  // Highlight dari bintang 1 sampai index+1
        });

        /**
         * Event: Klik → tetapkan rating (tersimpan di variabel selectedRating)
         */
        star.addEventListener('click', function () {
            selectedRating = index + 1;  // Simpan rating yang dipilih (1-5)
            highlightStars(selectedRating);
        });
    });

    /**
     * Event: Mouse keluar dari area rating (mouseleave)
     * Kembalikan ke rating yang dipilih (bukan preview hover)
     */
    starRating.addEventListener('mouseleave', function () {
        highlightStars(selectedRating);
    });

    /**
     * Fungsi untuk highlight bintang dari 1 sampai count
     * 
     * @param {number} count - Jumlah bintang yang akan di-highlight (1-5)
     * 
     * Cara kerja:
     * - Loop semua bintang
     * - Jika index < count → tambah class 'star--active' (warna emas)
     * - Jika index >= count → hilangkan class 'star--active' (warna abu)
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
       F. SIMPAN TESTIMONI (TAMBAH BARU / EDIT)
       Validasi input, simpan ke localStorage, render ulang grid
       ======================================== */

    const btnSave = document.getElementById('btnSave');
    if (btnSave) {
        /**
         * Event listener untuk tombol "Simpan"
         * 
         * Flow:
         * 1. Ambil nilai dari input (nama, testimoni, rating)
         * 2. Validasi (semua field harus terisi)
         * 3. Cek mode: edit atau tambah baru?
         *    - Jika edit: update data yang sudah ada
         *    - Jika tambah: push data baru ke array
         * 4. Simpan ke localStorage
         * 5. Render ulang grid
         * 6. Sembunyikan form & reset
         */
        btnSave.addEventListener('click', function () {
            // Ambil nilai dari input (trim untuk hilangkan spasi di awal/akhir)
            const nama       = document.getElementById('inputNama').value.trim();
            const testimoni  = document.getElementById('inputTestimoni').value.trim();

            // Validasi sederhana: cek apakah semua field terisi
            if (!nama || !testimoni || selectedRating === 0) {
                alert('Harap isi semua field dan pilih rating!');
                return;  // Stop eksekusi jika validasi gagal
            }

            if (editingId !== null) {
                /* ========== MODE EDIT ========== */
                // Update testimoni yang sudah ada
                
                // Cari index testimoni berdasarkan ID
                const index = testimoniData.findIndex(t => t.id === editingId);
                
                if (index !== -1) {
                    // Update data testimoni
                    testimoniData[index].nama = nama;
                    testimoniData[index].rating = selectedRating;
                    testimoniData[index].testimoni = testimoni;
                }
                
                alert('Testimoni berhasil diupdate!');
            } else {
                /* ========== MODE TAMBAH BARU ========== */
                // Buat testimoni baru
                
                // Generate ID baru (auto-increment)
                // Cari ID tertinggi di array, lalu tambah 1
                const newId = Math.max(...testimoniData.map(t => t.id), 0) + 1;
                
                // Buat object testimoni baru
                const newTestimoni = {
                    id: newId,
                    nama: nama,
                    rating: selectedRating,
                    testimoni: testimoni,
                    tanggal: 'Baru saja'  // Relative time untuk testimoni baru
                };
                
                // Tambah ke array
                testimoniData.push(newTestimoni);
                
                alert('Testimoni berhasil ditambahkan!');
            }

            // Simpan ke localStorage (convert object to JSON string)
            localStorage.setItem('testimoniData', JSON.stringify(testimoniData));

            // Render ulang grid (refresh tampilan card)
            renderTestimoni();

            // Sembunyikan form & reset
            testiFormCard.style.display = 'none';
            resetForm();
        });
    }

    /* ========================================
       G. EDIT TESTIMONI
       Fungsi untuk isi form dengan data testimoni yang akan diedit
       ======================================== */

    /**
     * Fungsi untuk edit testimoni
     * Dipanggil saat tombol edit (icon pensil) di card diklik
     * 
     * @param {number} id - ID testimoni yang akan diedit
     * 
     * Flow:
     * 1. Cari data testimoni by ID dari array
     * 2. Jika tidak ditemukan, tampilkan alert
     * 3. Jika ditemukan:
     *    - Set mode edit (editingId = id)
     *    - Ubah judul form jadi "Edit Testimoni"
     *    - Isi form dengan data testimoni (nama, rating, testimoni)
     *    - Tampilkan form & scroll ke form
     */
    function editTestimoni(id) {
        // Cari testimoni berdasarkan ID
        const testi = testimoniData.find(t => t.id === id);
        
        if (!testi) {
            alert('Testimoni tidak ditemukan!');
            return;  // Stop eksekusi jika tidak ditemukan
        }

        // Set mode edit (simpan ID testimoni yang sedang diedit)
        editingId = id;
        formTitle.textContent = 'Edit Testimoni';

        // Isi form dengan data testimoni
        document.getElementById('inputNama').value = testi.nama;
        document.getElementById('inputTestimoni').value = testi.testimoni;
        selectedRating = testi.rating;
        highlightStars(selectedRating);  // Highlight bintang sesuai rating

        // Tampilkan form
        testiFormCard.style.display = 'block';
        
        // Scroll smooth ke posisi form
        window.scrollTo({ top: testiFormCard.offsetTop - 80, behavior: 'smooth' });
    }

    /* ========================================
       H. HAPUS TESTIMONI
       Fungsi untuk hapus testimoni dari array & localStorage
       ======================================== */

    /**
     * Fungsi untuk hapus testimoni
     * Dipanggil saat tombol delete (icon sampah) di card diklik
     * 
     * @param {number} id - ID testimoni yang akan dihapus
     * 
     * Flow:
     * 1. Tampilkan konfirmasi dengan confirm dialog
     * 2. Jika user klik OK:
     *    - Hapus testimoni dari array (filter)
     *    - Simpan ke localStorage
     *    - Render ulang grid (card langsung hilang)
     *    - Tampilkan alert sukses
     */
    function deleteTestimoni(id) {
        // Konfirmasi hapus dengan dialog browser
        const confirmed = confirm('Yakin ingin menghapus testimoni ini?');
        
        if (confirmed) {
            // Filter array: hapus item dengan id yang cocok
            // Array.filter() return array baru tanpa item yang dihapus
            testimoniData = testimoniData.filter(t => t.id !== id);
            
            // Simpan ke localStorage
            localStorage.setItem('testimoniData', JSON.stringify(testimoniData));
            
            // Render ulang grid (card yang dihapus langsung hilang)
            renderTestimoni();
            
            alert('Testimoni berhasil dihapus!');
        }
    }

    /* ========================================
       I. RESET FORM
       Fungsi untuk kosongkan semua input & reset state form
       ======================================== */

    /**
     * Fungsi untuk reset form setelah disimpan/dibatalkan
     * 
     * Reset:
     * - Input nama → kosongkan
     * - Textarea testimoni → kosongkan
     * - Rating → reset ke 0 (tidak ada bintang aktif)
     * - Mode edit → reset ke mode tambah baru (editingId = null)
     * - Judul form → "Tambah Testimoni Baru"
     */
    function resetForm() {
        document.getElementById('inputNama').value = '';           // Kosongkan input nama
        document.getElementById('inputTestimoni').value = '';      // Kosongkan textarea
        selectedRating = 0;                                        // Reset rating ke 0
        highlightStars(0);                                         // Hilangkan highlight bintang
        editingId = null;                                          // Reset mode ke tambah baru
        formTitle.textContent = 'Tambah Testimoni Baru';          // Reset judul form
    }

    /* ========================================
       J. INIT - RENDER PERTAMA KALI
       Panggil fungsi render saat halaman pertama kali dimuat
       ======================================== */

    /**
     * Render testimoni saat halaman pertama kali dimuat (page load)
     * Load data dari localStorage (atau pakai default), lalu tampilkan di grid
     */
    renderTestimoni();

</script>

</body>
</html>
