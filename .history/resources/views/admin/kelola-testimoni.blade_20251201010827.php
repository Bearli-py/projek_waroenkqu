{{-- 
========================================================
FILE   : resources/views/admin/kelola-testimoni.blade.php
HALAMAN: KELOLA TESTIMONI WAROENK QU
DESAIN : Modern, clean, premium, dengan modal form tambah testimoni
         dan grid card testimoni yang responsif.
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Meta tags untuk encoding karakter dan responsif viewport --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Kelola Testimoni - Waroenk Qu</title>

    {{-- 
        ===================================================
        CSS INTERNAL
        Semua styling didefinisikan di sini untuk kemudahan maintenance.
        ===================================================
    --}}
    <style>
        /* =========================================================
           1. RESET & GLOBAL STYLES
           ========================================================= */
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F7EFDE;              /* Background cream/beige yang elegan */
            color: #333;
            line-height: 1.6;
        }

        .page-container {
            min-height: 100vh;
        }

        /* =========================================================
           2. OVERLAY & SIDEBAR (REUSABLE UNTUK SEMUA HALAMAN ADMIN)
           ========================================================= */

        /* Overlay gelap yang muncul ketika sidebar dibuka */
        .overlay {
            position: fixed;
            inset: 0;                               /* Top/right/bottom/left = 0 */
            background-color: rgba(0,0,0,0.4);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 900;
        }

        .overlay.overlay--visible {
            opacity: 1;
            pointer-events: auto;
        }

        /* Sidebar admin yang slide dari kiri */
        .sidebar {
            width: 260px;
            background-color: #FFFFFF;
            box-shadow: 4px 0 20px rgba(0,0,0,0.12);
            display: flex;
            flex-direction: column;
            padding: 28px 24px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            transform: translateX(-100%);          /* Awalnya tersembunyi di luar layar */
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar.sidebar--open {
            transform: translateX(0);              /* Muncul ketika class ditambahkan */
        }

        /* Header sidebar: Logo + teks admin panel */
        .sidebar-header {
            margin-bottom: 36px;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 6px;
        }

        .sidebar-logo-icon {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .sidebar-logo-title {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            font-weight: 700;
            color: #333;
        }

        .sidebar-logo-subtitle {
            font-size: 11px;
            color: #B33939;
            font-weight: 500;
        }

        /* Menu navigasi sidebar */
        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 999px;                  /* Bentuk pill */
            font-size: 13px;
            color: #444;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .sidebar-item:hover {
            background-color: #F5F5F5;
        }

        /* Menu yang sedang aktif */
        .sidebar-item--active {
            background-color: #FDEBEA;
            color: #B33939;
            font-weight: 600;
        }

        .sidebar-item-icon {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }

        /* =========================================================
           3. TOP BAR (HEADER ADMIN)
           ========================================================= */

        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 36px;
            background-color: #FDF7EF;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .top-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Tombol icon menu (hamburger) untuk toggle sidebar */
        .menu-button {
            border: none;
            background: transparent;
            padding: 8px;
            border-radius: 999px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .menu-button:hover {
            background-color: #F0E0CF;
        }

        .menu-icon {
            width: 22px;
            height: 22px;
            display: block;
        }

        /* Tombol keluar merah di kanan atas */
        .btn-logout {
            padding: 9px 20px;
            border-radius: 999px;
            border: 1px solid #B33939;
            background-color: #fff;
            color: #B33939;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: all 0.2s ease;
        }

        .btn-logout-icon {
            width: 15px;
            height: 15px;
            object-fit: contain;
        }

        .btn-logout:hover {
            background-color: #B33939;
            color: #fff;
        }

        /* =========================================================
           4. HEADER SECTION "KELOLA TESTIMONI"
           ========================================================= */

        .testi-header {
            background-color: #F7F2E9;
            padding: 20px 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .testi-header-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .testi-header-title {
            font-size: 19px;
            font-weight: 600;
            color: #B83939;
        }

        .testi-header-subtitle {
            font-size: 12px;
            color: #777;
        }

        /* Card form tambah testimoni di dalam halaman */
.testi-form-card {
    background-color: #FFFFFF;
    border-radius: 22px;
    padding: 24px 26px 22px;
    box-shadow: 0 12px 32px rgba(0,0,0,0.10);
    margin-bottom: 24px;
}

.testi-form-title {
    font-size: 14px;
    font-weight: 600;
    color: #B83939;
    margin-bottom: 18px;
}


        /* Tombol merah marun "Tambah Testimoni" */
        .btn-add-testi {
            padding: 10px 22px;
            border-radius: 999px;
            border: none;
            background-color: #B83939;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 6px 20px rgba(184,57,57,0.35);
            transition: background-color 0.2s ease;
        }

        .btn-add-testi svg {
            width: 14px;
            height: 14px;
        }

        .btn-add-testi:hover {
            background-color: #982E2E;
        }

        /* =========================================================
           5. WRAPPER KONTEN UTAMA
           ========================================================= */

        .content-wrapper {
            max-width: 1200px;
            margin: 24px auto 50px auto;
            padding: 0 20px;
        }

        /* =========================================================
           6. MODAL FORM TAMBAH TESTIMONI
           ========================================================= */

        /* Backdrop modal (layer gelap di belakang modal) */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background-color: rgba(0,0,0,0.5);
            display: none;                         /* Awalnya tersembunyi */
            align-items: center;
            justify-content: center;
            z-index: 1100;
            animation: fadeIn 0.3s ease;
        }

        .modal-backdrop.modal--active {
            display: flex;                         /* Tampil ketika class ditambahkan */
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Card modal putih di tengah */
        .modal-card {
            background-color: #FFFFFF;
            border-radius: 24px;
            padding: 28px 32px 32px;
            width: 100%;
            max-width: 520px;
            box-shadow: 0 16px 48px rgba(0,0,0,0.2);
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-title {
            font-size: 16px;
            font-weight: 600;
            color: #B83939;
            margin-bottom: 20px;
        }

        /* Form group untuk input dan textarea */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 18px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #555;
        }

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

        .form-input:focus,
        .form-textarea:focus {
            border-color: #B83939;
            box-shadow: 0 0 0 3px rgba(184,57,57,0.12);
            background-color: #FFF;
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
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
            gap: 6px;
        }

        /* Setiap bintang adalah span yang bisa diklik */
        .star {
            font-size: 28px;
            color: #DDD;                           /* Warna abu saat belum aktif */
            cursor: pointer;
            transition: color 0.15s ease, transform 0.1s ease;
            user-select: none;
        }

        /* Bintang yang aktif (sudah diklik) berwarna emas */
        .star.star--active {
            color: #F2C94C;
        }

        /* Efek hover: bintang membesar sedikit */
        .star:hover {
            transform: scale(1.15);
        }

        /* Tombol aksi di modal */
        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        .btn-save {
            flex: 1;
            padding: 10px 20px;
            border-radius: 999px;
            border: none;
            background-color: #35A854;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-save:hover {
            background-color: #2F9148;
        }

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
           ========================================================= */

        .testi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);  /* 3 kolom di layar besar */
            gap: 20px;
        }

        /* Card testimoni */
        .testi-card {
            background-color: #FFFFFF;
            border-radius: 20px;
            padding: 22px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            position: relative;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

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

        /* Foto profil dummy (lingkaran abu-abu) */
        .testi-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #D9D9D9;
            flex-shrink: 0;
        }

        .testi-info {
            flex: 1;
        }

        .testi-name {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 2px;
        }

        .testi-date {
            font-size: 11px;
            color: #999;
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

        .icon-btn--edit {
            background-color: #EDF2FF;
        }

        .icon-btn--edit:hover {
            background-color: #D9E4FF;
        }

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
            cursor: default;                       /* Tidak bisa diklik */
        }

        /* Isi testimoni */
        .testi-text {
            font-size: 13px;
            color: #555;
            line-height: 1.7;
        }

        /* =========================================================
           8. RESPONSIVE DESIGN
           ========================================================= */

        @media (max-width: 992px) {
            .testi-grid {
                grid-template-columns: repeat(2, 1fr);  /* 2 kolom di tablet */
            }
        }

        @media (max-width: 768px) {
            .top-bar,
            .testi-header {
                padding: 14px 20px;
            }

            .content-wrapper {
                padding: 0 16px;
            }

            .testi-grid {
                grid-template-columns: 1fr;            /* 1 kolom di mobile */
            }

            .modal-card {
                margin: 20px;
            }
        }
    </style>
</head>
<body>

{{-- =========================================================
     OVERLAY UNTUK SIDEBAR
   ========================================================= --}}
<div class="overlay" id="overlay"></div>

<div class="page-container">

    {{-- =========================================================
         SIDEBAR ADMIN KIRI (REUSABLE)
       ========================================================= --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                {{-- Logo admin --}}
                <img src="{{ asset('images/icon/menu putih.png') }}"
                     alt="Logo"
                     class="sidebar-logo-icon">
                <div>
                    <div class="sidebar-logo-title">WAROENK QU</div>
                    <div class="sidebar-logo-subtitle">Admin Panel</div>
                </div>
            </div>
        </div>

        {{-- Menu navigasi sidebar --}}
        <nav class="sidebar-menu">
            {{-- Overview --}}
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/overview.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Overview">
                <span>Overview</span>
            </a>

            {{-- Menu --}}
            <a href="{{ route('admin.menu') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/menu hitam.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Menu">
                <span>Menu</span>
            </a>

            {{-- Galeri --}}
            <a href="{{ route('admin.galeri') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/galeri hitam.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Galeri">
                <span>Galeri</span>
            </a>

            {{-- Testimoni (aktif) --}}
            <a href="{{ route('admin.testimoni') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/testi hitam.png') }}" 
                     class="sidebar-item-icon" 
                     alt="Testimoni">
                <span>Testimoni</span>
            </a>
        </nav>
    </aside>

    {{-- =========================================================
         TOP BAR (HEADER ADMIN)
       ========================================================= --}}
    <header class="top-bar">
        <div class="top-left">
            {{-- Tombol icon menu untuk toggle sidebar --}}
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
       ========================================================= --}}
    <section class="testi-header">
        <div class="testi-header-text">
            <div class="testi-header-title">Kelola Testimoni</div>
            <div class="testi-header-subtitle">
                Tambah, edit atau hapus testimoni pelanggan
            </div>
        </div>

        {{-- Tombol Tambah Testimoni (akan membuka modal) --}}
        <button type="button" class="btn-add-testi" id="btnShowModal">
            {{-- Icon plus SVG (dibuat manual karena tidak ada file icon) --}}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M12 5v14M5 12h14" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
            Tambah Testimoni
        </button>
    </section>

    {{-- =========================================================
         WRAPPER KONTEN UTAMA
       ========================================================= --}}
    <div class="content-wrapper">

        {{-- ===== FORM TAMBAH TESTIMONI (CARD DI DALAM HALAMAN) ===== --}}
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

        {{-- ===== GRID CARD TESTIMONI ===== --}}
        <section class="testi-grid">
            
            {{-- Card Testimoni 1 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    {{-- Foto profil dummy (lingkaran abu) --}}
                    <div class="testi-avatar"></div>
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
                    Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi kesini."
                </div>
            </article>

            {{-- Card Testimoni 2 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <div class="testi-avatar"></div>
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

                <div class="testi-rating">
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star star--active">★</span>
                    <span class="star">★</span>
                </div>

                <div class="testi-text">
                    "Tempatnya cozy, pelayanan ramah. Rawonnya juara! Rasa bumbunya nempel di lidah, bikin nagih terus. Pasti balik lagi kesini."
                </div>
            </article>

            {{-- Card Testimoni 3 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <div class="testi-avatar"></div>
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
                    "Recommended! Menu variatif, porsi pas, dan yang penting rasanya mantap. Jadi langganan deh, cocok buat makan siang bareng teman."
                </div>
            </article>

            {{-- Card Testimoni 4 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <div class="testi-avatar"></div>
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
                    "Waroenk Qu ini hidden gem! Soto ayamnya enak banget, kuahnya seger. Tempatnya juga nyaman buat makan sama keluarga."
                </div>
            </article>

            {{-- Card Testimoni 5 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <div class="testi-avatar"></div>
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
                    "Pertama kali coba langsung jatuh cinta! Nasi gorengnya juara, bumbunya meresap sempurna. Harganya affordable banget."
                </div>
            </article>

            {{-- Card Testimoni 6 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <div class="testi-avatar"></div>
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
                    "Lalapan ayamnya mantap! Ayamnya crispy, sambalnya pedas pas. Setiap hari kerja pasti mampir kesini buat makan siang."
                </div>
            </article>

            {{-- Card Testimoni 7 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <div class="testi-name">Maya Sari</div>
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
                    Pelayanannya cepat dan ramah. Menu-menunya enak semua, terutama mie goreng Jawanya. Jadi tempat favorit buat nongkrong."
                </div>
            </article>

            {{-- Card Testimoni 8 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <div class="testi-name">Fajar Ramadhan</div>
                        <div class="testi-date">1 tahun yang lalu</div>
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
                    "Soto dagingnya top! Dagingnya empuk, kuahnya hangat pas banget buat cuaca dingin. Jadi pelanggan setia sejak pertama coba."
                </div>
            </article>
            
            {{-- Card Testimoni 9 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <div class="testi-name">Rudi Santoso</div>
                        <div class="testi-date">3 tahun yang lalu</div>
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
                    "Kopinya enak, pas buat temen ngobrol. Tempatnya juga strategis, gampang dijangkau. Worth it banget!"
                </div>
            </article>

            {{-- Card Testimoni 9 --}}
            <article class="testi-card">
                <div class="testi-card-header">
                    <div class="testi-avatar"></div>
                    <div class="testi-info">
                        <div class="testi-name">Linda Wijaya</div>
                        <div class="testi-date">3 bulan yang lalu</div>
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
                    Suasananya homey banget, berasa makan di rumah sendiri. Makanannya enak-enak dan harganya terjangkau. Recommended!"
                </div>
            </article>


        </section>

    </div> {{-- /content-wrapper --}}
</div> {{-- /page-container --}}

{{-- =========================================================
     JAVASCRIPT
     - Toggle sidebar
     - Toggle modal
     - Star rating interaktif
     - Fungsi edit & delete testimoni
   ========================================================= --}}
<script>
    // ==============================
    // A. TOGGLE SIDEBAR ADMIN
    // ==============================

    const menuToggle = document.getElementById('menuToggle');
    const sidebar    = document.getElementById('sidebar');
    const overlay    = document.getElementById('overlay');

    if (menuToggle && sidebar && overlay) {
        // Klik icon menu → toggle sidebar & overlay
        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('sidebar--open');
            overlay.classList.toggle('overlay--visible');
        });

        // Klik overlay → tutup sidebar
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        });
    }

    /// ==============================
// B. TOGGLE FORM TAMBAH TESTIMONI (BUKAN POPUP)
// ==============================

const btnShowModal   = document.getElementById('btnShowModal');  // Tombol "Tambah Testimoni"
const btnCancelForm  = document.getElementById('btnCancelForm'); // Tombol "Batal" di card form
const testiFormCard  = document.getElementById('testiFormCard'); // Section form card

if (btnShowModal && testiFormCard) {
    btnShowModal.addEventListener('click', function () {
        // Jika form sedang tersembunyi → tampilkan
        if (testiFormCard.style.display === 'none' || testiFormCard.style.display === '') {
            testiFormCard.style.display = 'block';
            window.scrollTo({ top: testiFormCard.offsetTop - 80, behavior: 'smooth' });
        } else {
            // Jika sudah tampil dan tombol diklik lagi → sembunyikan
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

    // Klik tombol "Batal" di modal → tutup modal
    if (btnCancelModal && modalBackdrop) {
        btnCancelModal.addEventListener('click', function () {
            modalBackdrop.classList.remove('modal--active');
            resetForm();
        });
    }

    // Klik di backdrop (area gelap) → tutup modal
    if (modalBackdrop) {
        modalBackdrop.addEventListener('click', function (e) {
            // Hanya tutup jika klik di backdrop, bukan di modal-card
            if (e.target === modalBackdrop) {
                modalBackdrop.classList.remove('modal--active');
                resetForm();
            }
        });
    }

    // ==============================
    // C. STAR RATING INTERAKTIF
    // ==============================

    const starRating = document.getElementById('starRating');
    const stars      = starRating.querySelectorAll('.star');
    let selectedRating = 0;  // Menyimpan rating yang dipilih user

    // Loop tiap bintang untuk pasang event listener
    stars.forEach(function (star, index) {
        // Event: Hover → highlight bintang sampai posisi kursor
        star.addEventListener('mouseenter', function () {
            highlightStars(index + 1);
        });

        // Event: Klik → tetapkan rating
        star.addEventListener('click', function () {
            selectedRating = index + 1;
            highlightStars(selectedRating);
        });
    });

    // Event: Mouse keluar dari area rating → kembalikan ke rating yang dipilih
    starRating.addEventListener('mouseleave', function () {
        highlightStars(selectedRating);
    });

    // Fungsi untuk highlight bintang dari 1 sampai count
    function highlightStars(count) {
        stars.forEach(function (star, index) {
            if (index < count) {
                star.classList.add('star--active');
            } else {
                star.classList.remove('star--active');
            }
        });
    }

    // ==============================
    // D. FUNGSI SIMPAN TESTIMONI
    // ==============================

    const btnSave = document.getElementById('btnSave');
    if (btnSave) {
        btnSave.addEventListener('click', function () {
            const nama       = document.getElementById('inputNama').value;
            const testimoni  = document.getElementById('inputTestimoni').value;

            // Validasi sederhana
            if (!nama || !testimoni || selectedRating === 0) {
                alert('Harap isi semua field dan pilih rating!');
                return;
            }

            // Di sini nanti kamu bisa kirim data ke backend via AJAX/Fetch
            console.log('Nama:', nama);
            console.log('Rating:', selectedRating);
            console.log('Testimoni:', testimoni);

            alert('Testimoni berhasil disimpan! (Fitur backend belum tersambung)');

            // Tutup modal dan reset form
            modalBackdrop.classList.remove('modal--active');
            resetForm();
        });
    }

    // Fungsi untuk reset form setelah modal ditutup
    function resetForm() {
        document.getElementById('inputNama').value = '';
        document.getElementById('inputTestimoni').value = '';
        selectedRating = 0;
        highlightStars(0);
    }

    // ==============================
    // E. FUNGSI EDIT & DELETE TESTIMONI
    // ==============================

    // Fungsi placeholder untuk edit testimoni
    function editTestimoni(id) {
        console.log('Edit testimoni ID:', id);
        // Nanti bisa ambil data testimoni dari database lalu isi ke modal
        alert('Fitur edit testimoni ID ' + id + ' (belum tersambung backend)');
    }

    // Fungsi placeholder untuk hapus testimoni
    function deleteTestimoni(id) {
        const confirmed = confirm('Yakin ingin menghapus testimoni ini?');
        if (confirmed) {
            console.log('Hapus testimoni ID:', id);
            // Nanti kirim request delete ke backend
            alert('Testimoni ID ' + id + ' dihapus (belum tersambung backend)');
        }
    }
</script>

</body>
</html>