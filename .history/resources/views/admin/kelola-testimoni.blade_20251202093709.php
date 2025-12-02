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
       KONFIGURASI API
       ======================================== */

    /**
     * Base URL API
     * Semua request akan ke /api/testimoni
     */
    const API_URL = '/api/testimoni';

    /**
     * Helper function untuk ambil CSRF token
     * Diperlukan untuk POST/PUT/DELETE request
     */
    function getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    }

    /**
     * Helper function untuk fetch dengan error handling
     * 
     * @param {string} url - URL endpoint
     * @param {object} options - Fetch options (method, headers, body)
     * @returns {Promise} - Promise yang resolve dengan data JSON
     */
    async function apiFetch(url, options = {}) {
        try {
            // Set default headers (CSRF token & Content-Type)
            const headers = {
                'X-CSRF-TOKEN': getCsrfToken(),
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                ...options.headers
            };

            // Kirim request
            const response = await fetch(url, {
                ...options,
                headers
            });

            // Parse response JSON
            const data = await response.json();

            // Cek jika response tidak OK (status 4xx atau 5xx)
            if (!response.ok) {
                throw new Error(data.message || 'Terjadi kesalahan');
            }

            return data;

        } catch (error) {
            console.error('API Error:', error);
            throw error;
        }
    }

    /* ========================================
       VARIABEL GLOBAL
       ======================================== */

    let selectedRating = 0;   // Rating yang dipilih user (0-5)
    let editingId = null;     // ID testimoni yang sedang diedit (null = mode tambah baru)

    /* ========================================
       A. LOAD & RENDER TESTIMONI DARI DATABASE
       ======================================== */

    /**
     * Fungsi untuk load testimoni dari API & render ke grid
     * Dipanggil saat:
     * - Halaman pertama kali load
     * - Setelah tambah/edit/hapus testimoni
     */
    async function loadTestimoni() {
        try {
            // Tampilkan loading indicator (optional)
            const grid = document.getElementById('testiGrid');
            grid.innerHTML = '<p style="text-align: center; padding: 40px; color: #999;">Memuat testimoni...</p>';

            // Fetch data dari API
            const response = await apiFetch(API_URL);

            // Render data ke grid
            renderTestimoni(response.data);

        } catch (error) {
            // Tampilkan error message
            const grid = document.getElementById('testiGrid');
            grid.innerHTML = `<p style="text-align: center; padding: 40px; color: #e04646;">Gagal memuat testimoni: ${error.message}</p>`;
        }
    }

    /**
     * Fungsi untuk render testimoni ke grid
     * 
     * @param {Array} testimoniData - Array object testimoni dari API
     */
    function renderTestimoni(testimoniData) {
        const grid = document.getElementById('testiGrid');

        // Kosongkan grid
        grid.innerHTML = '';

        // Cek jika tidak ada data
        if (!testimoniData || testimoniData.length === 0) {
            grid.innerHTML = '<p style="text-align: center; padding: 40px; color: #999;">Belum ada testimoni</p>';
            return;
        }

        // Loop setiap testimoni & generate card
        testimoniData.forEach(testi => {
            const card = document.createElement('article');
            card.className = 'testi-card';

            // Generate bintang rating
            let starsHTML = '';
            for (let i = 1; i <= 5; i++) {
                const activeClass = i <= testi.rating ? 'star--active' : '';
                starsHTML += `<span class="star ${activeClass}">★</span>`;
            }

            // Set HTML card
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
       B. TOGGLE SIDEBAR
       ======================================== */

    const menuToggle = document.getElementById('menuToggle');
    const sidebar    = document.getElementById('sidebar');
    const overlay    = document.getElementById('overlay');

    if (menuToggle && sidebar && overlay) {
        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('sidebar--open');
            overlay.classList.toggle('overlay--visible');
        });

        overlay.addEventListener('click', function () {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        });
    }

    /* ========================================
       C. TOGGLE FORM TAMBAH/EDIT
       ======================================== */

    const btnShowModal   = document.getElementById('btnShowModal');
    const btnCancelForm  = document.getElementById('btnCancelForm');
    const testiFormCard  = document.getElementById('testiFormCard');
    const formTitle      = document.getElementById('formTitle');

    if (btnShowModal && testiFormCard) {
        btnShowModal.addEventListener('click', function () {
            if (testiFormCard.style.display === 'none' || testiFormCard.style.display === '') {
                editingId = null;
                formTitle.textContent = 'Tambah Testimoni Baru';
                testiFormCard.style.display = 'block';
                window.scrollTo({ top: testiFormCard.offsetTop - 80, behavior: 'smooth' });
            } else {
                testiFormCard.style.display = 'none';
                resetForm();
            }
        });
    }

    if (btnCancelForm && testiFormCard) {
        btnCancelForm.addEventListener('click', function () {
            testiFormCard.style.display = 'none';
            resetForm();
        });
    }

    /* ========================================
       D. STAR RATING INTERAKTIF
       ======================================== */

    const starRating = document.getElementById('starRating');
    const stars      = starRating.querySelectorAll('.star');

    stars.forEach(function (star, index) {
        star.addEventListener('mouseenter', function () {
            highlightStars(index + 1);
        });

        star.addEventListener('click', function () {
            selectedRating = index + 1;
            highlightStars(selectedRating);
        });
    });

    starRating.addEventListener('mouseleave', function () {
        highlightStars(selectedRating);
    });

    function highlightStars(count) {
        stars.forEach(function (star, index) {
            if (index < count) {
                star.classList.add('star--active');
            } else {
                star.classList.remove('star--active');
            }
        });
    }

    /* ========================================
       E. SIMPAN TESTIMONI (TAMBAH/EDIT)
       ======================================== */

    const btnSave = document.getElementById('btnSave');
    if (btnSave) {
        btnSave.addEventListener('click', async function () {
            // Ambil nilai dari input
            const nama       = document.getElementById('inputNama').value.trim();
            const testimoni  = document.getElementById('inputTestimoni').value.trim();

            // Validasi
            if (!nama || !testimoni || selectedRating === 0) {
                alert('Harap isi semua field dan pilih rating!');
                return;
            }

            try {
                // Disable tombol saat proses (prevent double submit)
                btnSave.disabled = true;
                btnSave.textContent = 'Menyimpan...';

                // Data yang akan dikirim ke API
                const payload = {
                    nama: nama,
                    rating: selectedRating,
                    testimoni: testimoni
                };

                if (editingId !== null) {
                    /* ========== MODE EDIT ========== */
                    // PUT /api/testimoni/{id}
                    await apiFetch(`${API_URL}/${editingId}`, {
                        method: 'PUT',
                        body: JSON.stringify(payload)
                    });

                    alert('Testimoni berhasil diupdate!');

                } else {
                    /* ========== MODE TAMBAH BARU ========== */
                    // POST /api/testimoni
                    await apiFetch(API_URL, {
                        method: 'POST',
                        body: JSON.stringify(payload)
                    });

                    alert('Testimoni berhasil ditambahkan!');
                }

                // Reload data & render ulang
                await loadTestimoni();

                // Sembunyikan form & reset
                testiFormCard.style.display = 'none';
                resetForm();

            } catch (error) {
                alert('Gagal menyimpan testimoni: ' + error.message);

            } finally {
                // Enable tombol kembali
                btnSave.disabled = false;
                btnSave.textContent = 'Simpan';
            }
        });
    }

    /* ========================================
       F. EDIT TESTIMONI
       ======================================== */

    /**
     * Fungsi untuk edit testimoni
     * Dipanggil saat icon pensil diklik
     * 
     * @param {number} id - ID testimoni yang akan diedit
     */
    async function editTestimoni(id) {
        try {
            // Fetch data testimoni by ID dari API
            const response = await apiFetch(`${API_URL}/${id}`);
            const testi = response.data;

            // Set mode edit
            editingId = id;
            formTitle.textContent = 'Edit Testimoni';

            // Isi form dengan data testimoni
            document.getElementById('inputNama').value = testi.nama;
            document.getElementById('inputTestimoni').value = testi.testimoni;
            selectedRating = testi.rating;
            highlightStars(selectedRating);

            // Tampilkan form
            testiFormCard.style.display = 'block';
            window.scrollTo({ top: testiFormCard.offsetTop - 80, behavior: 'smooth' });

        } catch (error) {
            alert('Gagal memuat data testimoni: ' + error.message);
        }
    }

    /* ========================================
       G. HAPUS TESTIMONI
       ======================================== */

    /**
     * Fungsi untuk hapus testimoni
     * Dipanggil saat icon sampah diklik
     * 
     * @param {number} id - ID testimoni yang akan dihapus
     */
    async function deleteTestimoni(id) {
        // Konfirmasi hapus
        const confirmed = confirm('Yakin ingin menghapus testimoni ini?');

        if (confirmed) {
            try {
                // DELETE /api/testimoni/{id}
                await apiFetch(`${API_URL}/${id}`, {
                    method: 'DELETE'
                });

                alert('Testimoni berhasil dihapus!');

                // Reload data & render ulang
                await loadTestimoni();

            } catch (error) {
                alert('Gagal menghapus testimoni: ' + error.message);
            }
        }
    }

    /* ========================================
       H. RESET FORM
       ======================================== */

    function resetForm() {
        document.getElementById('inputNama').value = '';
        document.getElementById('inputTestimoni').value = '';
        selectedRating = 0;
        highlightStars(0);
        editingId = null;
        formTitle.textContent = 'Tambah Testimoni Baru';
    }

    /* ========================================
       I. INIT - LOAD DATA SAAT HALAMAN LOAD
       ======================================== */

    /**
     * Load testimoni dari database saat halaman pertama kali dibuka
     */
    loadTestimoni();
</script>

</body>
</html>
