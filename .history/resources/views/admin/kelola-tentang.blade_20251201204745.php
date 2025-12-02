{{-- 
========================================================
FILE   : resources/views/admin/kelola-tentang.blade.php
HALAMAN: KELOLA TENTANG WAROENK QU (ADMIN)
FUNGSI : Halaman untuk mengelola informasi tentang warung
         (Cerita Kami, Visi, Misi, Nilai-nilai Waroenk)
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
            margin: 0;                 /* Hilangkan margin default */
            padding: 0;                /* Hilangkan padding default */
            box-sizing: border-box;    /* Border termasuk dalam width/height */
        }

        body {
            font-family: 'Poppins', sans-serif;  /* Font utama */
            background-color: #F7EFDE;            /* Background krem lembut */
            color: #3E2723;                       /* Warna teks coklat tua */
            min-height: 100vh;                    /* Minimal tinggi 1 layar */
        }

        /* =========================================================
           2. SIDEBAR + OVERLAY
           Sidebar slide-in dari kiri dengan overlay gelap
           ========================================================= */
        
        /* Overlay gelap yang muncul di belakang sidebar */
        .overlay {
            position: fixed;                    /* Tetap di viewport */
            inset: 0;                           /* Top, right, bottom, left = 0 */
            background-color: rgba(0,0,0,0.4); /* Hitam 40% transparansi */
            opacity: 0;                         /* Awalnya transparan (hidden) */
            pointer-events: none;               /* Tidak bisa diklik saat hidden */
            transition: opacity 0.3s ease;     /* Animasi fade in/out */
            z-index: 900;                       /* Di bawah sidebar */
        }

        /* Class untuk menampilkan overlay */
        .overlay.overlay--visible {
            opacity: 1;                         /* Tampak */
            pointer-events: auto;              /* Bisa diklik (untuk tutup sidebar) */
        }

        /* Sidebar kiri yang bisa slide in/out */
        .sidebar {
            width: 240px;                       /* Lebar sidebar */
            background-color: #FFFFFF;          /* Background putih */
            box-shadow: 4px 0 16px rgba(0,0,0,0.1); /* Shadow lembut */
            display: flex;
            flex-direction: column;
            padding: 24px;
            position: fixed;                    /* Posisi tetap */
            top: 0;
            left: 0;
            height: 100vh;                      /* Tinggi penuh layar */
            transform: translateX(-100%);       /* Awalnya tersembunyi di kiri */
            z-index: 1000;                      /* Di atas overlay */
            transition: transform 0.3s ease;   /* Animasi slide */
        }

        /* Class untuk membuka sidebar */
        .sidebar.sidebar--open {
            transform: translateX(0);           /* Geser ke posisi normal (visible) */
        }

        /* Header sidebar (logo + text) */
        .sidebar-header {
            margin-bottom: 32px;               /* Jarak dengan menu */
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;                          /* Jarak antara logo & text */
        }

        .sidebar-logo-icon {
            width: 100px;                       /* Lebar logo */
            height: 100px;                      /* Tinggi logo */
            object-fit: contain;                /* Maintain aspect ratio */
        }

        .sidebar-logo-title {
            font-family: 'Playfair Display', serif; /* Font elegan untuk brand */
            font-size: 16px;
            font-weight: 700;
        }

        .sidebar-logo-subtitle {
            font-size: 17px;
            color: #B33939;                     /* Warna merah warung */
        }

        /* Menu navigasi sidebar */
        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 14px;                          /* Jarak antar item menu */
        }

        /* Item menu sidebar (link) */
        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;                          /* Jarak icon & text */
            padding: 9px 12px;
            border-radius: 999px;               /* Bentuk pill */
            font-size: 13px;
            color: #444;
            text-decoration: none;              /* Hilangkan underline */
            transition: background-color 0.2s;
        }

        /* Hover effect menu */
        .sidebar-item:hover {
            background-color: #F5F5F5;          /* Background abu terang saat hover */
        }

        /* Menu aktif (halaman sedang dibuka) */
        .sidebar-item--active {
            background-color: #FDEBEA;          /* Background pink terang */
            color: #B33939;                     /* Text merah */
            font-weight: 600;                   /* Bold */
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
            background-color: #FDF7EF;          /* Background krem terang */
        }

        .top-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Tombol hamburger menu */
        .menu-button {
            border: none;
            background: transparent;
            padding: 6px;
            border-radius: 999px;
            cursor: pointer;                    /* Pointer saat hover */
        }

        .menu-button:hover {
            background-color: #F0E0CF;          /* Background saat hover */
        }

        .menu-icon {
            width: 22px;
            height: 22px;
        }

        /* Tombol Keluar di kanan atas */
        .btn-logout {
            padding: 8px 18px;
            border-radius: 999px;               /* Bentuk pill */
            border: 1px solid #B33939;
            background-color: #fff;
            color: #B33939;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-logout-icon {
            width: 14px;
            height: 14px;
            object-fit: contain;
        }

        /* Hover effect tombol keluar (background jadi merah) */
        .btn-logout:hover {
            background-color: #B33939;
            color: #fff;
        }

        /* =========================================================
           4. MAIN CONTENT
           Container utama konten halaman
           ========================================================= */
        
        .main-content {
            padding: 32px 24px;
            max-width: 1200px;                  /* Lebar maksimal konten */
            margin: 0 auto;                     /* Center horizontal */
        }

        /* Header halaman (judul & subtitle) */
        .page-header {
            margin-bottom: 28px;
        }

        .page-header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #B83939;                     /* Warna merah */
            margin-bottom: 6px;
        }

        .page-header p {
            font-size: 13px;
            color: #777;                        /* Abu-abu */
        }

        /* =========================================================
           5. SECTION CARD
           Card untuk setiap section (Cerita, Visi, Misi, Nilai)
           ========================================================= */
        
        .section-card {
            background: #FFFFFF;                /* Background putih */
            border-radius: 18px;                /* Rounded corner */
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06); /* Shadow lembut */
            margin-bottom: 24px;                /* Jarak antar card */
            transition: box-shadow 0.3s ease;
        }

        /* Shadow lebih tebal saat hover */
        .section-card:hover {
            box-shadow: 0 6px 28px rgba(0, 0, 0, 0.1);
        }

        /* Judul section (dengan icon) */
        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #B83939;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;                          /* Jarak antara icon & text */
        }

        /* Icon SVG di section title */
        .section-title svg {
            width: 24px;
            height: 24px;
            flex-shrink: 0;                     /* Icon tidak mengecil */
        }

        .section-subtitle {
            font-size: 13px;
            font-weight: 600;
            color: #3E2723;
            margin-bottom: 10px;
        }

        /* =========================================================
           6. FORM INPUT & TEXTAREA
           Style untuk input field
           ========================================================= */
        
        .input-group {
            margin-bottom: 20px;
        }

        /* Label input */
        .input-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }

        /* Input text & textarea */
        .input-text {
            width: 100%;
            padding: 12px 16px;
            font-size: 13px;
            color: #333;
            border: 1.5px solid #E0E0E0;
            border-radius: 12px;
            background: #FAFAFA;                /* Abu sangat terang */
            transition: all 0.25s ease;
            font-family: inherit;               /* Ikuti font body */
        }

        /* Focus state input (saat diklik) */
        .input-text:focus {
            outline: none;                      /* Hilangkan outline default */
            border-color: #B83939;              /* Border jadi merah */
            background: #FFF;                   /* Background jadi putih */
            box-shadow: 0 0 0 3px rgba(184, 57, 57, 0.1); /* Shadow merah soft */
        }

        /* Textarea lebih tinggi dari input biasa */
        textarea.input-text {
            resize: vertical;                   /* Hanya bisa resize vertikal */
            min-height: 90px;
            line-height: 1.6;
        }

        /* =========================================================
           7. LIST ITEM (MISI & NILAI)
           Container untuk list misi & nilai yang bisa dihapus
           ========================================================= */
        
        .list-container {
            margin-top: 16px;
        }

        /* Satu item dalam list (1 misi/nilai) */
        .list-item {
            background: #F9F9F9;                /* Abu sangat terang */
            border: 1px solid #E8E8E8;
            border-radius: 14px;
            padding: 16px;
            margin-bottom: 14px;
            position: relative;
            transition: all 0.25s ease;
        }

        /* Hover effect pada list item */
        .list-item:hover {
            background: #FFF;                   /* Background putih */
            border-color: #D0D0D0;              /* Border lebih gelap */
            transform: translateY(-2px);        /* Naik sedikit */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* Header list item (judul + tombol hapus) */
        .list-item-header {
            display: flex;
            align-items: center;
            justify-content: space-between;     /* Space between */
            margin-bottom: 10px;
        }

        /* Judul item (Misi 1, Nilai 2, dll) */
        .list-item-title {
            font-size: 13px;
            font-weight: 600;
            color: #3E2723;
        }

        /* Tombol hapus (icon sampah) */
        .btn-delete {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFEBEE;                /* Pink terang */
            border: 1px solid #FFCDD2;
            border-radius: 8px;
            color: #D32F2F;                     /* Merah */
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        /* Hover effect tombol hapus (jadi merah solid) */
        .btn-delete:hover {
            background: #D32F2F;
            color: #FFF;
            border-color: #D32F2F;
            transform: scale(1.1);              /* Sedikit membesar */
        }

        /* Input dalam list item (background putih) */
        .list-item .input-text {
            background: #FFF;
            font-size: 12px;
        }

        /* =========================================================
           8. BUTTON TAMBAH (MISI & NILAI)
           Tombol kuning untuk tambah item baru
           ========================================================= */
        
        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;                           /* Jarak icon & text */
            padding: 10px 20px;
            background: #FFC107;                /* Kuning */
            border: none;
            color: #3E2723;                     /* Coklat tua */
            font-size: 13px;
            font-weight: 600;
            border-radius: 24px;                /* Pill shape */
            cursor: pointer;
            transition: all 0.25s ease;
            margin-top: 12px;
        }

        /* Hover effect tombol tambah */
        .btn-add:hover {
            background: #FFB300;                /* Kuning lebih gelap */
            transform: translateY(-2px);        /* Naik sedikit */
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
        }

        /* Icon + di tombol tambah */
        .btn-add .icon {
            font-size: 18px;
            font-weight: bold;
        }

        /* =========================================================
           9. SAVE BUTTON
           Tombol hijau besar di bawah untuk simpan semua
           ========================================================= */
        
        .btn-save-all {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;                        /* Full width */
            padding: 16px 24px;
            background: #4CAF50;                /* Hijau */
            border: none;
            color: #FFF;
            font-size: 15px;
            font-weight: 700;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 32px;
            box-shadow: 0 4px 16px rgba(76, 175, 80, 0.3);
        }

        /* Hover effect tombol simpan */
        .btn-save-all:hover {
            background: #45A049;                /* Hijau lebih gelap */
            transform: translateY(-3px);        /* Naik sedikit */
            box-shadow: 0 8px 24px rgba(76, 175, 80, 0.4);
        }

        /* Icon SVG di tombol simpan */
        .btn-save-all svg {
            width: 20px;
            height: 20px;
        }

        /* =========================================================
           10. RESPONSIVE DESIGN
           Tampilan untuk layar kecil (mobile/tablet)
           ========================================================= */
        
        @media (max-width: 768px) {
            .main-content {
                padding: 20px 16px;             /* Padding lebih kecil */
            }

            .page-header h1 {
                font-size: 22px;                /* Font lebih kecil */
            }

            .section-card {
                padding: 18px;                  /* Padding lebih kecil */
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
                <img src="{{ asset('images/icon/statistic hitam.png') }}" class="sidebar-item-icon" alt="">
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

            {{-- Link ke halaman Kelola Tentang (AKTIF) --}}
            <a href="{{ route('admin.tentang') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/tentang-hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Tentang</span>
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
             Input untuk sejarah/cerita warung
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
                <label>Sejarah Singkat</label>
                {{-- Textarea untuk cerita/sejarah warung --}}
                <textarea class="input-text" placeholder="Ceritakan sejarah Waroenk Qu...">Berawal dari resep warisan keluarga, Waroenk Qu lahir dari semangat untuk menyajikan cita rasa otentik masakan Indonesia dengan sentuhan modern. Kami Percaya bahwa makanan adalah jembatan yang menghubungkan kenangan dan menciptakan momen berharga. Setiap hidangan adalah cerita dan kami ingin berbagi cerita kami dengan Anda.</textarea>
            </div>
        </div>

        {{-- ============================================
             SECTION 2: VISI
             Input untuk pernyataan visi perusahaan
             ============================================ --}}
        <div class="section-card">
            <div class="section-title">
                {{-- Icon target (SVG) --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Visi
            </div>
            <div class="input-group">
                <label>Pernyataan Visi</label>
                {{-- Textarea untuk visi --}}
                <textarea class="input-text" placeholder="Tulis visi perusahaan...">Menjadi destinasi kuliner terdepan yang melestarikan dan memperkenalkan kekayaan rasa masakan Indonesia kepada dunia, menciptakan pengalaman istimewa dalam satu waktu</textarea>
            </div>
        </div>

        {{-- ============================================
             SECTION 3: MISI
             List misi yang bisa ditambah/hapus
             ============================================ --}}
        <div class="section-card">
            <div class="section-title">
                {{-- Icon roket (SVG) --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Misi
            </div>
            
            {{-- Container untuk list misi --}}
            <div class="list-container" id="misiContainer">
                {{-- Misi Item 1 --}}
                <div class="list-item">
                    <div class="list-item-header">
                        <span class="list-item-title">Misi 1</span>
                        {{-- Tombol hapus dengan icon SVG --}}
                        <button class="btn-delete" onclick="this.parentElement.parentElement.remove()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <textarea class="input-text" placeholder="Tulis misi...">Menyajikan hidangan otentik dengan bahan baku lokal berkualitas tinggi</textarea>
                </div>

                {{-- Misi Item 2 --}}
                <div class="list-item">
                    <div class="list-item-header">
                        <span class="list-item-title">Misi 2</span>
                        <button class="btn-delete" onclick="this.parentElement.parentElement.remove()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <textarea class="input-text" placeholder="Tulis misi...">Memberikan pengalaman bersantap yang hangat dan tak terlupakan</textarea>
                </div>

                {{-- Misi Item 3 --}}
                <div class="list-item">
                    <div class="list-item-header">
                        <span class="list-item-title">Misi 3</span>
                        <button class="btn-delete" onclick="this.parentElement.parentElement.remove()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <textarea class="input-text" placeholder="Tulis misi...">Berinovasi tanpa meninggalkan akar tradisi</textarea>
                </div>
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
                {{-- Icon berlian/gem (SVG) --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
                Nilai-nilai Waroenk
            </div>
            
            {{-- Container untuk list nilai --}}
            <div class="list-container" id="nilaiContainer">
                {{-- Nilai Item 1 --}}
                <div class="list-item">
                    <div class="list-item-header">
                        <span class="list-item-title">Nilai 1</span>
                        <button class="btn-delete" onclick="this.parentElement.parentElement.remove()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    {{-- Input judul nilai --}}
                    <input type="text" class="input-text" placeholder="Judul nilai" value="Kualitas Rasa" style="margin-bottom: 10px;">
                    {{-- Textarea deskripsi nilai --}}
                    <textarea class="input-text" placeholder="Deskripsi nilai...">Setiap hidangan kami dibuat dari bahan-bahan pilihan untuk menjaga kualitas rasa yang istimewa</textarea>
                </div>

                {{-- Nilai Item 2 --}}
                <div class="list-item">
                    <div class="list-item-header">
                        <span class="list-item-title">Nilai 2</span>
                        <button class="btn-delete" onclick="this.parentElement.parentElement.remove()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <input type="text" class="input-text" placeholder="Judul nilai" value="Pelayanan Hangat" style="margin-bottom: 10px;">
                    <textarea class="input-text" placeholder="Deskripsi nilai...">Kami menyambut setiap pelanggan seperti keluarga, menciptakan suasana yang nyaman dan penuh kehangatan</textarea>
                </div>
            </div>

            {{-- Tombol tambah nilai baru --}}
            <button class="btn-add" onclick="tambahNilai()">
                <span class="icon">+</span> Tambah Nilai
            </button>
        </div>

        {{-- ============================================
             TOMBOL SIMPAN SEMUA PERUBAHAN
             Tombol hijau besar untuk submit form
             ============================================ --}}
        <button class="btn-save-all" onclick="simpanPerubahan()">
            {{-- Icon save (SVG) --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
            Simpan Semua Perubahan
        </button>
    </main>

    {{-- ============================================
         JAVASCRIPT
         Fungsi interaktif halaman
         ============================================ --}}
    <script>
        /* =========================================================
           1. TOGGLE SIDEBAR
           Buka/tutup sidebar saat tombol menu diklik
           ========================================================= */
        
        const menuButton = document.getElementById('menuButton');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        // Event listener saat tombol menu diklik
        menuButton.addEventListener('click', function() {
            // Toggle class 'sidebar--open' & 'overlay--visible'
            sidebar.classList.toggle('sidebar--open');
            overlay.classList.toggle('overlay--visible');
        });

        // Event listener saat overlay diklik (tutup sidebar)
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        });

        /* =========================================================
           2. COUNTER UNTUK MISI & NILAI BARU
           Variabel untuk tracking nomor item baru
           ========================================================= */
        
        let misiCount = 3;      // Jumlah misi awal = 3
        let nilaiCount = 2;     // Jumlah nilai awal = 2

        /* =========================================================
           3. FUNGSI TAMBAH MISI BARU
           Menambahkan item misi baru ke list
           ========================================================= */
        
        function tambahMisi() {
            misiCount++;    // Increment counter
            
            // Ambil container misi
            const container = document.getElementById('misiContainer');
            
            // Buat elemen div baru
            const newItem = document.createElement('div');
            newItem.className = 'list-item';
            
            // Set HTML content item baru
            newItem.innerHTML = `
                <div class="list-item-header">
                    <span class="list-item-title">Misi ${misiCount}</span>
                    <button class="btn-delete" onclick="this.parentElement.parentElement.remove()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
                <textarea class="input-text" placeholder="Tulis misi..."></textarea>
            `;
            
            // Tambahkan item baru ke container
            container.appendChild(newItem);
        }

        /* =========================================================
           4. FUNGSI TAMBAH NILAI BARU
           Menambahkan item nilai baru ke list
           ========================================================= */
        
        function tambahNilai() {
            nilaiCount++;   // Increment counter
            
            // Ambil container nilai
            const container = document.getElementById('nilaiContainer');
            
            // Buat elemen div baru
            const newItem = document.createElement('div');
            newItem.className = 'list-item';
            
            // Set HTML content item baru
            newItem.innerHTML = `
                <div class="list-item-header">
                    <span class="list-item-title">Nilai ${nilaiCount}</span>
                    <button class="btn-delete" onclick="this.parentElement.parentElement.remove()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
                <input type="text" class="input-text" placeholder="Judul nilai" style="margin-bottom: 10px;">
                <textarea class="input-text" placeholder="Deskripsi nilai..."></textarea>
            `;
            
            // Tambahkan item baru ke container
            container.appendChild(newItem);
        }

        /* =========================================================
           5. FUNGSI SIMPAN PERUBAHAN
           Handler saat tombol simpan diklik
           TODO: Implementasi backend Laravel untuk menyimpan data
           ========================================================= */
        
        function simpanPerubahan() {
            // Sementara hanya alert (nanti diganti dengan AJAX/Fetch)
            alert('Data berhasil disimpan! (Fitur backend belum diimplementasikan)');
            
            // TODO: Kumpulkan semua data dari form
            // TODO: Kirim data ke backend Laravel via AJAX/Fetch
            // TODO: Tampilkan notifikasi sukses/gagal
        }
    </script>

</body>
</html>