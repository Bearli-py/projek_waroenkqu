{{-- 
========================================================
FILE   : resources/views/admin/kelola-tentang.blade.php
HALAMAN: KELOLA TENTANG WAROENK QU (INTERACTIVE VERSION)
FITUR  : 
- Edit Cerita & Visi dengan tombol Edit/Simpan/Batal
- Tambah/Edit/Hapus Misi (dynamic list)
- Tambah/Edit/Hapus Nilai (judul + deskripsi)
- Data persistent dengan localStorage
- Animasi smooth & responsive
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Meta tags untuk encoding dan responsive design --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Kelola Tentang - Waroenk Qu Admin</title>
    
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
            color: #3E2723;                       /* Warna teks coklat tua */
            min-height: 100vh;                    /* Minimal tinggi 1 layar penuh */
        }

        /* =========================================================
           2. SIDEBAR + OVERLAY
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
            width: 240px;                       /* Lebar sidebar */
            background-color: #FFFFFF;          /* Background putih bersih */
            box-shadow: 4px 0 16px rgba(0,0,0,0.1); /* Shadow lembut di sisi kanan */
            display: flex;
            flex-direction: column;             /* Layout vertikal */
            padding: 24px;                      /* Padding dalam sidebar */
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
            margin-bottom: 32px;               /* Jarak dengan menu di bawahnya */
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
        }

        /* Menu navigasi sidebar */
        .sidebar-menu {
            display: flex;
            flex-direction: column;            /* Layout vertikal */
            gap: 14px;                         /* Jarak antar item menu */
        }

        /* Item menu sidebar (link navigasi) */
        .sidebar-item {
            display: flex;
            align-items: center;               /* Icon & text vertikal center */
            gap: 12px;                         /* Jarak antara icon & text */
            padding: 9px 12px;                 /* Padding dalam item */
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
            padding: 14px 32px;
            background-color: #FDF7EF;         /* Background krem terang */
        }

        .top-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Tombol hamburger menu (untuk buka sidebar) */
        .menu-button {
            border: none;
            background: transparent;
            padding: 6px;
            border-radius: 999px;
            cursor: pointer;                   /* Pointer cursor saat hover */
        }

        .menu-button:hover {
            background-color: #F0E0CF;         /* Background saat hover */
        }

        .menu-icon {
            width: 22px;
            height: 22px;
        }

        /* Tombol Keluar di kanan atas */
        .btn-logout {
            padding: 8px 18px;
            border-radius: 999px;              /* Bentuk pill */
            border: 1px solid #B33939;         /* Border merah */
            background-color: #fff;
            color: #B33939;                    /* Text merah */
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;                          /* Jarak icon & text */
            transition: all 0.2s ease;         /* Animasi smooth */
        }

        .btn-logout-icon {
            width: 14px;
            height: 14px;
            object-fit: contain;
        }

        /* Hover effect tombol keluar (background jadi merah, text jadi putih) */
        .btn-logout:hover {
            background-color: #B33939;
            color: #fff;
        }

        /* =========================================================
           4. MAIN CONTENT
           Container utama konten halaman
           ========================================================= */
        
        .main-content {
            padding: 32px 24px;                /* Padding atas-bawah 32px, kiri-kanan 24px */
            max-width: 1200px;                 /* Lebar maksimal konten */
            margin: 0 auto;                    /* Center horizontal */
        }

        /* Header halaman (judul & subtitle) */
        .page-header {
            margin-bottom: 28px;               /* Jarak dengan konten di bawah */
        }

        .page-header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #B83939;                    /* Warna merah brand */
            margin-bottom: 6px;
        }

        .page-header p {
            font-size: 13px;
            color: #777;                       /* Abu-abu untuk subtitle */
        }

        /* =========================================================
           5. SECTION CARD
           Card putih untuk setiap section (Cerita, Visi, Misi, Nilai)
           ========================================================= */
        
        .section-card {
            background: #FFFFFF;               /* Background putih bersih */
            border-radius: 18px;               /* Rounded corner */
            padding: 24px;                     /* Padding dalam card */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06); /* Shadow lembut */
            margin-bottom: 24px;               /* Jarak antar card */
            transition: box-shadow 0.3s ease;  /* Animasi shadow saat hover */
            animation: fadeIn 0.3s ease;       /* Animasi fade in saat muncul */
        }

        /* Keyframe untuk animasi fade in */
        @keyframes fadeIn {
            from {
                opacity: 0;                    /* Mulai dari transparan */
                transform: translateY(10px);   /* Mulai dari 10px di bawah */
            }
            to {
                opacity: 1;                    /* Akhir penuh terlihat */
                transform: translateY(0);      /* Akhir di posisi normal */
            }
        }

        /* Shadow lebih tebal saat hover */
        .section-card:hover {
            box-shadow: 0 6px 28px rgba(0, 0, 0, 0.1);
        }

        /* Judul section dengan icon SVG */
        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #B83939;                    /* Merah brand */
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;                         /* Jarak antara icon & text */
        }

        /* Icon SVG di section title */
        .section-title svg {
            width: 24px;
            height: 24px;
            flex-shrink: 0;                    /* Icon tidak mengecil saat resize */
        }

        /* =========================================================
           6. FORM INPUT & TEXTAREA
           Style untuk input field dan textarea
           ========================================================= */
        
        .input-group {
            margin-bottom: 20px;               /* Jarak antar input group */
        }

        /* Label input */
        .input-group label {
            display: block;                    /* Block level (satu baris penuh) */
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }

        /* Input text & textarea */
        .input-text {
            width: 100%;                       /* Full width */
            padding: 12px 16px;                /* Padding dalam input */
            font-size: 13px;
            color: #333;
            border: 1.5px solid #E0E0E0;       /* Border abu terang */
            border-radius: 12px;               /* Rounded corner */
            background: #FAFAFA;               /* Background abu sangat terang */
            transition: all 0.25s ease;        /* Animasi smooth untuk semua perubahan */
            font-family: inherit;              /* Ikuti font body */
        }

        /* Focus state input (saat diklik/aktif) */
        .input-text:focus {
            outline: none;                     /* Hilangkan outline default browser */
            border-color: #B83939;             /* Border jadi merah */
            background: #FFF;                  /* Background jadi putih */
            box-shadow: 0 0 0 3px rgba(184, 57, 57, 0.1); /* Shadow merah soft */
        }

        /* Textarea lebih tinggi dari input biasa */
        textarea.input-text {
            resize: vertical;                  /* Hanya bisa resize vertikal (tidak horizontal) */
            min-height: 90px;                  /* Tinggi minimal */
            line-height: 1.6;                  /* Line height untuk readability */
        }

        /* Textarea dalam state disabled (tidak bisa edit) */
        textarea.input-text:disabled {
            background-color: #FAFAFA;         /* Background abu terang */
            color: #666;                       /* Text abu gelap */
            cursor: not-allowed;               /* Cursor tidak bisa edit */
            opacity: 0.8;                      /* Sedikit transparan */
        }

        /* =========================================================
           7. INLINE EDIT BUTTONS (untuk Cerita & Visi)
           Tombol Edit/Simpan/Batal di samping label
           ========================================================= */
        
        .btn-edit-inline,
        .btn-save-inline,
        .btn-cancel-inline {
            display: inline-flex;
            align-items: center;               /* Icon & text vertikal center */
            gap: 4px;                          /* Jarak icon & text */
            padding: 6px 12px;                 /* Padding kecil (tombol compact) */
            font-size: 12px;
            font-weight: 600;
            border-radius: 8px;                /* Rounded corner sedang */
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;         /* Animasi smooth */
        }

        /* Tombol Edit (biru muda) */
        .btn-edit-inline {
            background: #E3F2FD;               /* Background biru muda */
            color: #1976D2;                    /* Text biru */
            border: 1px solid #BBDEFB;         /* Border biru muda */
        }

        .btn-edit-inline:hover {
            background: #BBDEFB;               /* Background lebih gelap saat hover */
            transform: translateY(-1px);       /* Naik 1px saat hover */
        }

        /* Tombol Simpan (hijau muda) */
        .btn-save-inline {
            background: #E8F5E9;               /* Background hijau muda */
            color: #388E3C;                    /* Text hijau */
            border: 1px solid #C8E6C9;         /* Border hijau muda */
        }

        .btn-save-inline:hover {
            background: #C8E6C9;               /* Background lebih gelap saat hover */
            transform: translateY(-1px);       /* Naik 1px saat hover */
        }

        /* Tombol Batal (abu-abu) */
        .btn-cancel-inline {
            background: #F5F5F5;               /* Background abu terang */
            color: #757575;                    /* Text abu gelap */
            border: 1px solid #E0E0E0;         /* Border abu */
        }

        .btn-cancel-inline:hover {
            background: #E0E0E0;               /* Background lebih gelap saat hover */
        }

        /* =========================================================
           8. LIST ITEM (MISI & NILAI)
           Container untuk list misi & nilai yang bisa ditambah/hapus
           ========================================================= */
        
        .list-container {
            margin-top: 16px;                  /* Jarak dari title section */
        }

        /* Satu item dalam list (1 misi atau 1 nilai) */
        .list-item {
            background: #F9F9F9;               /* Background abu sangat terang */
            border: 1px solid #E8E8E8;         /* Border abu */
            border-radius: 14px;               /* Rounded corner */
            padding: 16px;                     /* Padding dalam item */
            margin-bottom: 14px;               /* Jarak antar item */
            position: relative;                /* Untuk positioning absolut di dalam */
            transition: all 0.25s ease;        /* Animasi smooth */
            animation: slideIn 0.3s ease;      /* Animasi slide in saat muncul */
        }

        /* Keyframe untuk animasi slide in dari kiri */
        @keyframes slideIn {
            from {
                opacity: 0;                    /* Mulai transparan */
                transform: translateX(-20px);  /* Mulai 20px di kiri */
            }
            to {
                opacity: 1;                    /* Akhir penuh terlihat */
                transform: translateX(0);      /* Akhir di posisi normal */
            }
        }

        /* Hover effect pada list item */
        .list-item:hover {
            background: #FFF;                  /* Background putih saat hover */
            border-color: #D0D0D0;             /* Border lebih gelap */
            transform: translateY(-2px);       /* Naik 2px saat hover */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Shadow muncul */
        }

        /* Header list item (judul + tombol hapus) */
        .list-item-header {
            display: flex;
            align-items: center;
            justify-content: space-between;    /* Space between kiri & kanan */
            margin-bottom: 10px;               /* Jarak dengan input di bawah */
        }

        /* Judul item (Misi 1, Nilai 2, dll) */
        .list-item-title {
            font-size: 13px;
            font-weight: 600;
            color: #3E2723;                    /* Coklat tua */
        }

        /* Tombol hapus (icon sampah) */
        .btn-delete {
            width: 32px;                       /* Lebar tetap */
            height: 32px;                      /* Tinggi tetap (bentuk kotak) */
            display: flex;
            align-items: center;               /* Icon center vertikal */
            justify-content: center;           /* Icon center horizontal */
            background: #FFEBEE;               /* Background pink terang */
            border: 1px solid #FFCDD2;         /* Border pink */
            border-radius: 8px;                /* Rounded corner sedang */
            color: #D32F2F;                    /* Icon merah */
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s ease;         /* Animasi smooth */
        }

        /* SVG icon di dalam tombol delete */
        .btn-delete svg {
            width: 16px;
            height: 16px;
        }

        /* Hover effect tombol hapus (jadi merah solid) */
        .btn-delete:hover {
            background: #D32F2F;               /* Background merah penuh */
            color: #FFF;                       /* Icon putih */
            border-color: #D32F2F;             /* Border merah */
            transform: scale(1.1);             /* Sedikit membesar */
        }

        /* Input dalam list item (background putih) */
        .list-item .input-text {
            background: #FFF;                  /* Background putih (beda dari default) */
            font-size: 12px;                   /* Font sedikit lebih kecil */
        }

        /* =========================================================
           9. BUTTON TAMBAH (MISI & NILAI)
           Tombol kuning untuk tambah item baru
           ========================================================= */
        
        .btn-add {
            display: inline-flex;
            align-items: center;               /* Icon & text vertikal center */
            gap: 8px;                          /* Jarak icon & text */
            padding: 10px 20px;                /* Padding sedang */
            background: #FFC107;               /* Kuning cerah */
            border: none;
            color: #3E2723;                    /* Text coklat tua */
            font-size: 13px;
            font-weight: 600;
            border-radius: 24px;               /* Bentuk pill */
            cursor: pointer;
            transition: all 0.25s ease;        /* Animasi smooth */
            margin-top: 12px;                  /* Jarak dari list di atas */
        }

        /* Hover effect tombol tambah */
        .btn-add:hover {
            background: #FFB300;               /* Kuning lebih gelap */
            transform: translateY(-2px);       /* Naik 2px */
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4); /* Shadow kuning */
        }

        /* Icon + di tombol tambah */
        .btn-add .icon {
            font-size: 18px;
            font-weight: bold;
        }

        /* =========================================================
           10. NOTIFICATION TOAST
           Notifikasi popup di pojok kanan bawah
           ========================================================= */
        
        .notification {
            position: fixed;                   /* Tetap di posisi viewport */
            bottom: 24px;                      /* 24px dari bawah */
            right: 24px;                       /* 24px dari kanan */
            background-color: #4CAF50;         /* Hijau untuk sukses */
            color: white;
            padding: 14px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15); /* Shadow */
            opacity: 0;                        /* Awalnya tidak terlihat */
            transform: translateY(20px);       /* Awalnya 20px di bawah */
            transition: all 0.3s ease;         /* Animasi smooth */
            z-index: 2000;                     /* Di atas semua elemen */
            pointer-events: none;              /* Tidak bisa diklik saat hidden */
        }

        /* Class untuk menampilkan notifikasi */
        .notification.show {
            opacity: 1;                        /* Terlihat penuh */
            transform: translateY(0);          /* Posisi normal */
            pointer-events: auto;              /* Bisa diklik */
        }

        /* =========================================================
           11. RESPONSIVE DESIGN
           Tampilan untuk layar kecil (mobile/tablet)
           ========================================================= */
        
        @media (max-width: 768px) {
            .main-content {
                padding: 20px 16px;            /* Padding lebih kecil */
            }

            .page-header h1 {
                font-size: 22px;               /* Font title lebih kecil */
            }

            .section-card {
                padding: 18px;                 /* Padding card lebih kecil */
            }

            /* Sembunyikan text "Keluar" di mobile, tampilkan icon saja */
            .btn-logout span {
                display: none;
            }
        }
    </style>
</head>
<body>

    {{-- ============================================
         TOP BAR
         Header atas dengan menu icon & tombol keluar
         ============================================ --}}
    <div class="top-bar">
        <div class="top-left">
            {{-- Tombol hamburger menu untuk toggle sidebar --}}
            <button class="menu-button" id="menuButton">
                <img src="{{ asset('images/icon/overview.png') }}" alt="Menu" class="menu-icon">
            </button>
        </div>

        {{-- Tombol Keluar (redirect ke halaman login) --}}
        <button class="btn-logout" onclick="window.location.href='/admin/login'">
            <img src="{{ asset('images/icon/logout merah.png') }}" alt="Keluar" class="btn-logout-icon">
            <span>Keluar</span>
        </button>
    </div>

    {{-- ============================================
         OVERLAY
         Backdrop gelap saat sidebar dibuka
         ============================================ --}}
    <div class="overlay" id="overlay"></div>

    {{-- ============================================
         SIDEBAR
         Menu navigasi admin (slide-in dari kiri)
         ============================================ --}}
    <aside class="sidebar" id="sidebar">
        {{-- Header sidebar (logo + text) --}}
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo1.png') }}" alt="Logo Waroenk Qu" class="sidebar-logo-icon">
            </div>
            <div class="sidebar-logo-subtitle">Admin Panel</div>
        </div>

        {{-- Menu navigasi --}}
        <nav class="sidebar-menu">
            {{-- Link ke halaman Overview --}}
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/overview.png') }}" class="sidebar-item-icon" alt="">
                <span>Overview</span>
            </a>

            {{-- Link ke halaman Kelola Menu --}}
            <a href="{{ route('admin.menu') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/menu hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Menu</span>
            </a>

            {{-- Link ke halaman Kelola Galeri --}}
            <a href="{{ route('admin.galeri') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/galeri hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Galeri</span>
            </a>

            {{-- Link ke halaman Kelola Testimoni --}}
            <a href="{{ route('admin.testimoni') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/testi hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Testimoni</span>
            </a>

            {{-- Link ke halaman Kelola Tentang (AKTIF - halaman ini) --}}
            <a href="{{ route('admin.tentang') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/tentang-hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Tentang</span>
            </a>

            {{-- Link ke halaman Kelola Kontak --}}
            <a href="{{ route('admin.kontak') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/kontak hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Kontak</span>
            </a>
        </nav>
    </aside>

    {{-- ============================================
         MAIN CONTENT
         Konten utama halaman
         ============================================ --}}
    <main class="main-content">
        {{-- Header halaman --}}
        <div class="page-header">
            <h1>Kelola Tentang</h1>
            <p>Update visi, misi, dan sejarah warung</p>
        </div>

        {{-- ============================================
             SECTION 1: CERITA KAMI
             Input untuk sejarah/cerita warung dengan tombol Edit
             ============================================ --}}
        <div class="section-card">
            <div class="section-title">
                {{-- Icon buku (SVG) --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Cerita Kami
            </div>
            <div class="input-group">
                {{-- Label dengan tombol Edit/Simpan/Batal --}}
                <label style="display: flex; align-items: center; justify-content: space-between;">
                    <span>Sejarah Singkat</span>
                    {{-- Container tombol Edit (tampil saat mode view) --}}
                    <div id="ceritaButtons">
                        <button type="button" class="btn-edit-inline" onclick="enableEditCerita()">
                            {{-- Icon pensil --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 14px; height: 14px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </button>
                    </div>
                    {{-- Container tombol Simpan & Batal (tampil saat mode edit) --}}
                    <div id="ceritaActionButtons" style="display: none; gap: 8px;">
                        <button type="button" class="btn-save-inline" onclick="saveCerita()">
                            {{-- Icon checkmark --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 14px; height: 14px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan
                        </button>
                        <button type="button" class="btn-cancel-inline" onclick="cancelEditCerita()">
                            {{-- Icon X --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 14px; height: 14px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </button>
                    </div>
                </label>
                {{-- Textarea untuk cerita (awalnya disabled) --}}
                <textarea class="input-text" 
                          id="inputCerita"
                          placeholder="Ceritakan sejarah Waroenk Qu..."
                          disabled></textarea>
            </div>
        </div>

        {{-- ============================================
             SECTION 2: VISI
             Input untuk pernyataan visi dengan tombol Edit
             ============================================ --}}
        <div class="section-card">
            <div class="section-title">
                {{-- Icon target/checkmark circle (SVG) --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Visi
            </div>
            <div class="input-group">
                {{-- Label dengan tombol Edit/Simpan/Batal --}}
                <label style="display: flex; align-items: center; justify-content: space-between;">
                    <span>Pernyataan Visi</span>
                    {{-- Container tombol Edit (tampil saat mode view) --}}
                    <div id="visiButtons">
                        <button type="button" class="btn-edit-inline" onclick="enableEditVisi()">
                            {{-- Icon pensil --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 14px; height: 14px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </button>
                    </div>
                    {{-- Container tombol Simpan & Batal (tampil saat mode edit) --}}
                    <div id="visiActionButtons" style="display: none; gap: 8px;">
                        <button type="button" class="btn-save-inline" onclick="saveVisi()">
                            {{-- Icon checkmark --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 14px; height: 14px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan
                        </button>
                        <button type="button" class="btn-cancel-inline" onclick="cancelEditVisi()">
                            {{-- Icon X --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 14px; height: 14px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </button>
                    </div>
                </label>
                {{-- Textarea untuk visi (awalnya disabled) --}}
                <textarea class="input-text" 
                          id="inputVisi"
                          placeholder="Tulis visi perusahaan..."
                          disabled></textarea>
            </div>
        </div>

        {{-- ============================================
             SECTION 3: MISI
             List misi yang bisa ditambah/edit/hapus
             ============================================ --}}
        <div class="section-card">
            <div class="section-title">
                {{-- Icon lightning bolt (SVG) --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Misi
            </div>
            
            {{-- Container untuk list misi (akan di-render via JS) --}}
            <div class="list-container" id="misiContainer">
                {{-- Item misi akan di-generate oleh JavaScript --}}
            </div>

            {{-- Tombol tambah misi baru --}}
            <button class="btn-add" onclick="tambahMisi()">
                <span class="icon">+</span> Tambah Misi
            </button>
        </div>

        {{-- ============================================
             SECTION 4: NILAI-NILAI WAROENK
             List nilai perusahaan (judul + deskripsi)
             ============================================ --}}
        <div class="section-card">
            <div class="section-title">
                {{-- Icon sparkles/gem (SVG) --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
                Nilai-nilai Waroenk
            </div>
            
            {{-- Container untuk list nilai (akan di-render via JS) --}}
            <div class="list-container" id="nilaiContainer">
                {{-- Item nilai akan di-generate oleh JavaScript --}}
            </div>

            {{-- Tombol tambah nilai baru --}}
            <button class="btn-add" onclick="tambahNilai()">
                <span class="icon">+</span> Tambah Nilai
            </button>
        </div>

    </main>

    {{-- ============================================
         NOTIFICATION TOAST
         Popup notifikasi di pojok kanan bawah
         ============================================ --}}
    <div class="notification" id="notification"></div>

    {{-- ============================================
         JAVASCRIPT
         Semua fungsi interaktif halaman
         ============================================ --}}
    <script>
        /* ========================================
           A. DATA DEFAULT & localStorage INIT
           Inisialisasi data default dan load dari localStorage
           ======================================== */

        /**
         * Data default untuk halaman tentang
         * Digunakan saat pertama kali load (localStorage kosong)
         */
        const defaultData = {
            cerita: "Berawal dari resep warisan keluarga, Waroenk Qu lahir dari semangat untuk menyajikan cita rasa otentik masakan Indonesia dengan sentuhan modern. Kami Percaya bahwa makanan adalah jembatan yang menghubungkan kenangan dan menciptakan momen berharga. Setiap hidangan adalah cerita dan kami ingin berbagi cerita kami dengan Anda.",
            visi: "Menjadi destinasi kuliner terdepan yang melestarikan dan memperkenalkan kekayaan rasa masakan Indonesia kepada dunia, menciptakan pengalaman istimewa dalam satu waktu",
            misi: [
                "Menyajikan hidangan otentik dengan bahan baku lokal berkualitas tinggi",
                "Memberikan pengalaman bersantap yang hangat dan tak terlupakan",
                "Berinovasi tanpa meninggalkan akar tradisi"
            ],
            nilai: [
                {
                    judul: "Kualitas Rasa",
                    deskripsi: "Setiap hidangan kami dibuat dari bahan-bahan pilihan untuk menjaga kualitas rasa yang istimewa"
                },
                {
                    judul: "Pelayanan Hangat",
                    deskripsi: "Kami menyambut setiap pelanggan seperti keluarga, menciptakan suasana yang nyaman dan penuh kehangatan"
                }
            ]
        };

        /**
         * Load data dari localStorage
         * Jika localStorage kosong, gunakan defaultData
         */
        let tentangData = JSON.parse(localStorage.getItem('tentangData')) || defaultData;

        /**
         * Variabel untuk menyimpan nilai original (untuk fitur cancel)
         * Digunakan saat user klik Edit lalu Batal
         */
        let ceritaOriginal = '';
        let visiOriginal = '';

        /* ========================================
           B. INIT - LOAD DATA PERTAMA KALI
           Fungsi yang dijalankan saat halaman pertama kali dimuat
           ======================================== */

        /**
         * Fungsi inisialisasi data
         * Mengisi textarea Cerita & Visi, lalu render Misi & Nilai
         */
        function initData() {
            // Isi textarea Cerita dengan data dari localStorage/default
            document.getElementById('inputCerita').value = tentangData.cerita;
            
            // Isi textarea Visi dengan data dari localStorage/default
            document.getElementById('inputVisi').value = tentangData.visi;

            // Render list Misi dan Nilai
            renderMisi();
            renderNilai();
        }

        /* ========================================
           C. EDIT MODE UNTUK CERITA
           Fungsi-fungsi untuk enable/save/cancel edit Cerita
           ======================================== */

        /**
         * Fungsi untuk enable mode edit pada Cerita
         * - Simpan nilai original (untuk cancel)
         * - Enable textarea (bisa diedit)
         * - Tampilkan tombol Simpan & Batal
         * - Sembunyikan tombol Edit
         */
        function enableEditCerita() {
            const textarea = document.getElementById('inputCerita');      // Ambil textarea
            const btnEdit = document.getElementById('ceritaButtons');     // Tombol Edit
            const btnActions = document.getElementById('ceritaActionButtons'); // Tombol Simpan & Batal
            
            // Simpan nilai original untuk keperluan cancel
            ceritaOriginal = textarea.value;
            
            // Enable textarea agar bisa diedit
            textarea.disabled = false;
            textarea.focus();  // Otomatis fokus ke textarea
            
            // Toggle visibility tombol
            btnEdit.style.display = 'none';        // Sembunyikan tombol Edit
            btnActions.style.display = 'flex';     // Tampilkan tombol Simpan & Batal
        }

        /**
         * Fungsi untuk simpan perubahan Cerita
         * - Simpan ke variabel tentangData
         * - Simpan ke localStorage
         * - Disable textarea (kembali ke mode view)
         * - Toggle tombol kembali ke Edit
         */
        function saveCerita() {
            const textarea = document.getElementById('inputCerita');
            const btnEdit = document.getElementById('ceritaButtons');
            const btnActions = document.getElementById('ceritaActionButtons');
            
            // Update data di variabel tentangData
            tentangData.cerita = textarea.value;
            
            // Simpan ke localStorage
            saveToLocalStorage();
            
            // Disable textarea (kembali ke mode view)
            textarea.disabled = true;
            
            // Toggle visibility tombol
            btnEdit.style.display = 'block';       // Tampilkan tombol Edit
            btnActions.style.display = 'none';     // Sembunyikan tombol Simpan & Batal
            
            // Tampilkan notifikasi sukses
            showNotification('Cerita berhasil diupdate!');
        }

        /**
         * Fungsi untuk cancel edit Cerita
         * - Kembalikan nilai ke original (sebelum edit)
         * - Disable textarea
         * - Toggle tombol kembali ke Edit
         */
        function cancelEditCerita() {
            const textarea = document.getElementById('inputCerita');
            const btnEdit = document.getElementById('ceritaButtons');
            const btnActions = document.getElementById('ceritaActionButtons');
            
            // Kembalikan nilai ke original (sebelum edit)
            textarea.value = ceritaOriginal;
            
            // Disable textarea
            textarea.disabled = true;
            
            // Toggle visibility tombol
            btnEdit.style.display = 'block';
            btnActions.style.display = 'none';
        }

        /* ========================================
           D. EDIT MODE UNTUK VISI
           Fungsi-fungsi untuk enable/save/cancel edit Visi
           (Logic sama dengan Cerita, tapi untuk field Visi)
           ======================================== */

        /**
         * Fungsi untuk enable mode edit pada Visi
         */
        function enableEditVisi() {
            const textarea = document.getElementById('inputVisi');
            const btnEdit = document.getElementById('visiButtons');
            const btnActions = document.getElementById('visiActionButtons');
            
            // Simpan nilai original
            visiOriginal = textarea.value;
            
            // Enable textarea
            textarea.disabled = false;
            textarea.focus();
            
            // Toggle tombol
            btnEdit.style.display = 'none';
            btnActions.style.display = 'flex';
        }

        /**
         * Fungsi untuk simpan perubahan Visi
         */
        function saveVisi() {
            const textarea = document.getElementById('inputVisi');
            const btnEdit = document.getElementById('visiButtons');
            const btnActions = document.getElementById('visiActionButtons');
            
            // Update data
            tentangData.visi = textarea.value;
            
            // Simpan ke localStorage
            saveToLocalStorage();
            
            // Disable textarea
            textarea.disabled = true;
            
            // Toggle tombol
            btnEdit.style.display = 'block';
            btnActions.style.display = 'none';
            
            // Notifikasi
            showNotification('Visi berhasil diupdate!');
        }

        /**
         * Fungsi untuk cancel edit Visi
         */
        function cancelEditVisi() {
            const textarea = document.getElementById('inputVisi');
            const btnEdit = document.getElementById('visiButtons');
            const btnActions = document.getElementById('visiActionButtons');
            
            // Kembalikan nilai original
            textarea.value = visiOriginal;
            
            // Disable textarea
            textarea.disabled = true;
            
            // Toggle tombol
            btnEdit.style.display = 'block';
            btnActions.style.display = 'none';
        }

        /* ========================================
           E. RENDER MISI
           Fungsi untuk me-render list misi ke HTML
           ======================================== */

        /**
         * Fungsi untuk render semua item misi
         * - Loop array tentangData.misi
         * - Generate HTML untuk setiap item
         * - Insert ke container #misiContainer
         */
        function renderMisi() {
            const container = document.getElementById('misiContainer');
            
            // Kosongkan container terlebih dahulu
            container.innerHTML = '';

            // Loop setiap misi dalam array
            tentangData.misi.forEach((misi, index) => {
                // Buat elemen div untuk item
                const item = document.createElement('div');
                item.className = 'list-item';
                
                // Generate HTML content item
                item.innerHTML = `
                    <div class="list-item-header">
                        <span class="list-item-title">Misi ${index + 1}</span>
                        <button class="btn-delete" onclick="hapusMisi(${index})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <textarea class="input-text" 
                              placeholder="Tulis misi..."
                              onchange="updateMisi(${index}, this.value)">${misi}</textarea>
                `;
                
                // Tambahkan item ke container
                container.appendChild(item);
            });
        }

        /**
         * Fungsi untuk tambah misi baru
         * - Push string kosong ke array misi
         * - Simpan ke localStorage
         * - Render ulang list
         */
        function tambahMisi() {
            tentangData.misi.push('');  // Tambah item kosong
            saveToLocalStorage();       // Simpan ke localStorage
            renderMisi();               // Render ulang
            showNotification('Misi baru ditambahkan!');
        }

        /**
         * Fungsi untuk update isi misi
         * @param {number} index - Index misi yang diupdate
         * @param {string} value - Nilai baru misi
         */
        function updateMisi(index, value) {
            tentangData.misi[index] = value;  // Update array
            saveToLocalStorage();             // Simpan ke localStorage
        }

        /**
         * Fungsi untuk hapus misi
         * @param {number} index - Index misi yang akan dihapus
         */
        function hapusMisi(index) {
            // Konfirmasi hapus
            if (confirm('Yakin ingin menghapus misi ini?')) {
                tentangData.misi.splice(index, 1);  // Hapus dari array
                saveToLocalStorage();               // Simpan ke localStorage
                renderMisi();                       // Render ulang
                showNotification('Misi berhasil dihapus!');
            }
        }

        /* ========================================
           F. RENDER NILAI
           Fungsi untuk me-render list nilai ke HTML
           ======================================== */

        /**
         * Fungsi untuk render semua item nilai
         * - Loop array tentangData.nilai
         * - Generate HTML untuk setiap item (judul + deskripsi)
         * - Insert ke container #nilaiContainer
         */
        function renderNilai() {
            const container = document.getElementById('nilaiContainer');
            
            // Kosongkan container terlebih dahulu
            container.innerHTML = '';

            // Loop setiap nilai dalam array
            tentangData.nilai.forEach((nilai, index) => {
                // Buat elemen div untuk item
                const item = document.createElement('div');
                item.className = 'list-item';
                
                // Generate HTML content item
                item.innerHTML = `
                    <div class="list-item-header">
                        <span class="list-item-title">Nilai ${index + 1}</span>
                        <button class="btn-delete" onclick="hapusNilai(${index})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <input type="text" 
                           class="input-text" 
                           placeholder="Judul nilai" 
                           value="${nilai.judul}"
                           onchange="updateNilaiJudul(${index}, this.value)"
                           style="margin-bottom: 10px;">
                    <textarea class="input-text" 
                              placeholder="Deskripsi nilai..."
                              onchange="updateNilaiDeskripsi(${index}, this.value)">${nilai.deskripsi}</textarea>
                `;
                
                // Tambahkan item ke container
                container.appendChild(item);
            });
        }

        /**
         * Fungsi untuk tambah nilai baru
         * - Push object kosong {judul, deskripsi} ke array nilai
         * - Simpan ke localStorage
         * - Render ulang list
         */
        function tambahNilai() {
            tentangData.nilai.push({ judul: '', deskripsi: '' });  // Tambah item kosong
            saveToLocalStorage();                                   // Simpan
            renderNilai();                                          // Render ulang
            showNotification('Nilai baru ditambahkan!');
        }

        /**
         * Fungsi untuk update judul nilai
         * @param {number} index - Index nilai yang diupdate
         * @param {string} value - Judul baru
         */
        function updateNilaiJudul(index, value) {
            tentangData.nilai[index].judul = value;  // Update judul
            saveToLocalStorage();                    // Simpan
        }

        /**
         * Fungsi untuk update deskripsi nilai
         * @param {number} index - Index nilai yang diupdate
         * @param {string} value - Deskripsi baru
         */
        function updateNilaiDeskripsi(index, value) {
            tentangData.nilai[index].deskripsi = value;  // Update deskripsi
            saveToLocalStorage();                        // Simpan
        }

        /**
         * Fungsi untuk hapus nilai
         * @param {number} index - Index nilai yang akan dihapus
         */
        function hapusNilai(index) {
            // Konfirmasi hapus
            if (confirm('Yakin ingin menghapus nilai ini?')) {
                tentangData.nilai.splice(index, 1);  // Hapus dari array
                saveToLocalStorage();                // Simpan
                renderNilai();                       // Render ulang
                showNotification('Nilai berhasil dihapus!');
            }
        }

        /* ========================================
           G. HELPER FUNCTIONS
           Fungsi-fungsi utility/bantuan
           ======================================== */

        /**
         * Fungsi untuk menyimpan data ke localStorage
         * - Convert object tentangData ke JSON string
         * - Simpan dengan key 'tentangData'
         */
        function saveToLocalStorage() {
            localStorage.setItem('tentangData', JSON.stringify(tentangData));
        }

        /**
         * Fungsi untuk menampilkan notifikasi toast
         * @param {string} message - Pesan yang akan ditampilkan
         * 
         * Notifikasi akan:
         * - Muncul dari bawah (slide up)
         * - Tampil selama 3 detik
         * - Otomatis hilang (fade out)
         */
        function showNotification(message) {
            const notif = document.getElementById('notification');
            
            // Set text notifikasi
            notif.textContent = message;
            
            // Tampilkan notifikasi (add class 'show')
            notif.classList.add('show');
            
            // Auto hide setelah 3 detik
            setTimeout(() => {
                notif.classList.remove('show');
            }, 3000);
        }

        /* ========================================
           H. TOGGLE SIDEBAR
           Fungsi untuk membuka/menutup sidebar
           ======================================== */

        const menuButton = document.getElementById('menuButton');  // Tombol hamburger
        const sidebar = document.getElementById('sidebar');        // Sidebar element
        const overlay = document.getElementById('overlay');        // Overlay element

        /**
         * Event listener untuk tombol menu
         * - Toggle class 'sidebar--open' pada sidebar
         * - Toggle class 'overlay--visible' pada overlay
         */
        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar--open');
            overlay.classList.toggle('overlay--visible');
        });

        /**
         * Event listener untuk overlay
         * - Saat overlay diklik, tutup sidebar
         * - Remove class 'sidebar--open' dan 'overlay--visible'
         */
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        });

        /* ========================================
           I. INIT PAGE
           Jalankan fungsi inisialisasi saat halaman dimuat
           ======================================== */

        /**
         * Panggil fungsi initData() untuk:
         * - Load data dari localStorage
         * - Isi textarea Cerita & Visi
         * - Render list Misi & Nilai
         */
        initData();
    </script>

</body>
</html>