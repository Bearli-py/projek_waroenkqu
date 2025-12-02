<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tentang - Waroenk Qu Admin</title>
    
    <style>
        /* ============================================
           RESET & BASE STYLES
           Reset browser default, set font, colors
           ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif; 
            background: linear-gradient(135deg, #F7EFDE 0%, #FDF7EF 100%);
            color: #3E2723;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ============================================
           HEADER SECTION
           Top bar dengan menu icon & tombol Keluar
           ============================================ */
        .header {
            background: #FFFFFF;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            padding: 0 24px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Tombol hamburger untuk toggle sidebar */
        .menu-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .menu-icon:hover {
            background: #F5F5F5;
        }

        /* Icon menu sebagai img */
        .menu-icon img {
            width: 24px;
            height: 24px;
            transition: transform 0.3s ease;
        }

        .menu-icon.active img {
            transform: rotate(90deg);
        }

        /* Tombol Keluar di kanan atas */
        .btn-logout {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 20px;
            background: transparent;
            border: 1.5px solid #B83939;
            color: #B83939;
            font-size: 13px;
            font-weight: 600;
            border-radius: 24px;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-logout:hover {
            background: #B83939;
            color: #FFFFFF;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(184, 57, 57, 0.3);
        }

                /* =========================================================
           2. SIDEBAR + OVERLAY (REUSABLE UNTUK SEMUA HALAMAN ADMIN)
           ========================================================= */

        /* Overlay gelap yang muncul ketika sidebar dibuka di layar kecil */
        .overlay {
            position: fixed;                        /* Tetap menempel terhadap viewport */
            inset: 0;                               /* Top/right/bottom/left = 0 (full screen) */
            background-color: rgba(0,0,0,0.4);     /* Warna hitam transparan */
            opacity: 0;                             /* Awalnya tidak terlihat */
            pointer-events: none;                   /* Tidak bisa diklik saat hidden */
            transition: opacity 0.3s ease;         /* Animasi fade saat muncul/hilang */
            z-index: 900;                           /* Di bawah sidebar (z-index 1000) */
        }

        /* Class tambahan ketika overlay aktif */
        .overlay.overlay--visible {
            opacity: 1;                             /* Tampak */
            pointer-events: auto;                  /* Bisa diklik untuk menutup sidebar */
        }

        /* Sidebar kiri yang akan slide-in dari kiri */
        .sidebar {
            width: 240px;                           /* Lebar sidebar */
            background-color: #FFFFFF;              /* Background putih */
            box-shadow: 4px 0 16px rgba(0,0,0,0.1);/* Shadow lembut di sisi kanan */
            display: flex;
            flex-direction: column;
            padding: 24px;
            position: fixed;                        /* Posisi fix agar tidak scroll */
            top: 0;
            left: 0;
            height: 100vh;                          /* Tinggi penuh layar */
            transform: translateX(-100%);           /* Disembunyikan di luar layar kiri */
            z-index: 1000;                          /* Di atas overlay dan konten */
            transition: transform 0.3s ease;       /* Animasi slide in/out */
        }

        /* Ketika class .sidebar--open ditambah, sidebar bergeser masuk */
        .sidebar.sidebar--open {
            transform: translateX(0);
        }

        /* Header di dalam sidebar (logo + teks Admin Panel) */
        .sidebar-header {
            margin-bottom: 32px;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-logo-icon {
            width: 100px;                            /* Perbesar logo agar jelas */
            height: 100px;
            object-fit: contain;
        }

        .sidebar-logo-title {
            font-family: 'Playfair Display', serif; /* Sedikit berbeda agar berasa brand */
            font-size: 16px;
            font-weight: 700;
        }

        .sidebar-logo-subtitle {
            font-size: 17px;
            color: #B33939;
        }

        /* Daftar menu navigasi di sidebar */
        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 12px;
            border-radius: 999px;                  /* Bentuk pill */
            font-size: 13px;
            color: #444;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .sidebar-item:hover {
            background-color: #F5F5F5;
        }

        /* Menu aktif diberi background krem kemerahan */
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
        /* ============================================
           MAIN CONTENT WRAPPER
           Container utama konten
           ============================================ */
        .main-content {
            padding: 32px 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Page title */
        .page-header {
            margin-bottom: 28px;
        }

        .page-header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #B83939;
            margin-bottom: 6px;
        }

        .page-header p {
            font-size: 13px;
            color: #777;
        }

        /* ============================================
           SECTION CARD
           Card untuk Sejarah, Visi, Misi, Nilai
           ============================================ */
        .section-card {
            background: #FFFFFF;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            margin-bottom: 24px;
            transition: box-shadow 0.3s ease;
        }

        .section-card:hover {
            box-shadow: 0 6px 28px rgba(0, 0, 0, 0.1);
        }

        /* Section title (Cerita Kami, Visi, dll) */
        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #B83939;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Icon SVG di section title */
        .section-title svg {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }

        /* Sub-heading di dalam card */
        .section-subtitle {
            font-size: 13px;
            font-weight: 600;
            color: #3E2723;
            margin-bottom: 10px;
        }

        /* ============================================
           FORM INPUT & TEXTAREA
           Style untuk editable fields
           ============================================ */
        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }

        .input-text {
            width: 100%;
            padding: 12px 16px;
            font-size: 13px;
            color: #333;
            border: 1.5px solid #E0E0E0;
            border-radius: 12px;
            background: #FAFAFA;
            transition: all 0.25s ease;
            font-family: inherit;
        }

        .input-text:focus {
            outline: none;
            border-color: #B83939;
            background: #FFF;
            box-shadow: 0 0 0 3px rgba(184, 57, 57, 0.1);
        }

        textarea.input-text {
            resize: vertical;
            min-height: 90px;
            line-height: 1.6;
        }

        /* ============================================
           MISI & NILAI PERUSAHAAN
           Dynamic list dengan tombol tambah/hapus
           ============================================ */
        .list-container {
            margin-top: 16px;
        }

        /* Item misi / nilai */
        .list-item {
            background: #F9F9F9;
            border: 1px solid #E8E8E8;
            border-radius: 14px;
            padding: 16px;
            margin-bottom: 14px;
            position: relative;
            transition: all 0.25s ease;
        }

        .list-item:hover {
            background: #FFF;
            border-color: #D0D0D0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .list-item-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .list-item-title {
            font-size: 13px;
            font-weight: 600;
            color: #3E2723;
        }

        /* Tombol hapus (icon merah) */
        .btn-delete {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFEBEE;
            border: 1px solid #FFCDD2;
            border-radius: 8px;
            color: #D32F2F;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background: #D32F2F;
            color: #FFF;
            border-color: #D32F2F;
            transform: scale(1.1);
        }

        .btn-delete svg {
            width: 16px;
            height: 16px;
        }

        /* Input dalam list item */
        .list-item .input-text {
            background: #FFF;
            font-size: 12px;
        }

        /* ============================================
           BUTTON TAMBAH (Misi & Nilai)
           Tombol untuk add new item
           ============================================ */
        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #FFC107;
            border: none;
            color: #3E2723;
            font-size: 13px;
            font-weight: 600;
            border-radius: 24px;
            cursor: pointer;
            transition: all 0.25s ease;
            margin-top: 12px;
        }

        .btn-add:hover {
            background: #FFB300;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
        }

        .btn-add .icon {
            font-size: 18px;
            font-weight: bold;
        }

        /* ============================================
           SAVE BUTTON (Simpan Semua Perubahan)
           Tombol hijau besar di bawah
           ============================================ */
        .btn-save-all {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 16px 24px;
            background: #4CAF50;
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

        .btn-save-all:hover {
            background: #45A049;
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(76, 175, 80, 0.4);
        }

        /* ============================================
           RESPONSIVE DESIGN
           Tampilan mobile & tablet
           ============================================ */
        @media (max-width: 768px) {
            .main-content {
                padding: 20px 16px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .section-card {
                padding: 18px;
            }

            .btn-logout span {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- ============================================
         HEADER
         Top navigation bar dengan menu icon & logout
         ============================================ -->
    <header class="header">
        <!-- Menu icon (hamburger) untuk toggle sidebar 
             Menggunakan gambar overview.png -->
        <div class="menu-icon" id="menuIcon">
            <img src="images/icon/overview.png" alt="Menu">
        </div>

        <!-- Tombol Keluar -->
        <button class="btn-logout" id="btnLogout">
            <img src="{{ asset('images/icon/logout merah.png') }}"
                     alt="Keluar"
                     class="btn-logout-icon">
                Keluar
            </button>
        </form>
    </header>

    <!-- ============================================
         SIDEBAR OVERLAY & SIDEBAR
         Backdrop gelap + sidebar navigasi
         ============================================ -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo1.png') }}" 
                     alt="Logo" class="sidebar-logo-icon">
                
            </div>
            <div class="sidebar-logo-subtitle">Admin Panel</div>
        </div>

    {{-- Navigasi utama admin, bisa dipakai di semua halaman --}}
        <nav class="sidebar-menu">
            {{-- Link ke dashboard / overview --}}
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/overview.png') }}" class="sidebar-item-icon" alt="">
                <span>Overview</span>
            </a>

            {{-- Link ke halaman kelola menu --}}
            <a href="{{ route('admin.menu') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/menu hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Menu</span>
            </a>

            {{-- Link ke halaman kelola galeri (halaman aktif saat ini) --}}
            <a href="{{ route('admin.galeri') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/galeri hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Galeri</span>
            </a>

            {{-- Link ke halaman testimoni --}}
            <a href="{{ route('admin.testimoni') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/testi hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Testimoni</span>
            </a>

            {{-- Link ke halaman tentang --}}
            <a href="{{ route('admin.tentang') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/tentang-hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Tentang</span>
            </a>
        </nav>
    </aside>

        <!-- Navigasi menu dengan icon dari file gambar
             Path: images/icon/[nama-file].png -->
        <ul class="sidebar-nav">
            <li>
                <a href="#">
                    <img src="images/icon/statistic hitam.png" alt="Overview">
                    Overview
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="images/icon/menu hitam.png" alt="Menu">
                    Kelola Menu
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="images/icon/galeri hitam.png" alt="Galeri">
                    Kelola Galeri
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="images/icon/testi hitam.png" alt="Testimoni">
                    Kelola Testimoni
                </a>
            </li>
            <li>
                <a href="#" class="active">
                    <img src="images/icon/tentang hitam.png" alt="Tentang">
                    Kelola Tentang
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="images/icon/kontak hitam.png" alt="Kontak">
                    Kelola Kontak
                </a>
            </li>
        </ul>
    </aside>

    <!-- ============================================
         MAIN CONTENT
         Konten utama halaman
         ============================================ -->
    <main class="main-content">
        <!-- Page header -->
        <div class="page-header">
            <h1>Kelola Tentang</h1>
            <p>Update visi, misi dan sejarah warung</p>
        </div>

        <!-- ============================================
             SECTION: CERITA KAMI (Sejarah Singkat)
             Textarea editable untuk sejarah warung
             Icon: Book/Document (SVG)
             ============================================ -->
        <section class="section-card">
            <h2 class="section-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
                Cerita Kami
            </h2>
            <div class="input-group">
                <label for="sejarahInput">Sejarah Singkat</label>
                <textarea 
                    id="sejarahInput" 
                    class="input-text" 
                    rows="5"
                    placeholder="Tulis sejarah singkat warung Anda...">Berawal dari resep warisan keluarga, Waroenk Qu lahir dari semangat untuk menyajikan cita rasa otentik masakan Indonesia dengan sentuhan modern. Kami Percaya bahwa makanan adalah jembatan yang menghubungkan kenangan dan menciptakan momen berharga. Setiap hidangan adalah cerita dan kami ingin berbagi cerita kami dengan Anda.</textarea>
            </div>
        </section>

        <!-- ============================================
             SECTION: VISI
             Textarea editable untuk pernyataan visi
             Icon: Eye/Target (SVG)
             ============================================ -->
        <section class="section-card">
            <h2 class="section-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    ircle cx="12" cy="12" r="3"/>
                </svg>
                Visi
            </h2>
            <div class="input-group">
                <label for="visiInput">Pernyataan Visi</label>
                <textarea 
                    id="visiInput" 
                    class="input-text" 
                    rows="4"
                    placeholder="Tulis pernyataan visi...">Menjadi destinasi kuliner terdepan yang melestarikan dan memperkenalkan kekayaan rasa masakan Indonesia kepada dunia, menciptakan pengalaman istimewa dalam satu waktu</textarea>
            </div>
        </section>

        <!-- ============================================
             SECTION: MISI
             Dynamic list, bisa tambah/hapus item
             Icon: Flag/Compass (SVG)
             ============================================ -->
        <section class="section-card">
            <h2 class="section-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/>
                    <line x1="4" y1="22" x2="4" y2="15"/>
                </svg>
                Misi
            </h2>
            
            <!-- Container untuk list misi (akan diisi via JS) -->
            <div class="list-container" id="misiContainer">
                <!-- Item misi akan ditambahkan di sini secara dinamis -->
            </div>

            <!-- Tombol tambah misi baru -->
            <button class="btn-add" id="btnAddMisi">
                <span class="icon">+</span>
                Tambah Poin
            </button>
        </section>

        <!-- ============================================
             SECTION: NILAI NILAI WAROENK
             Dynamic list dengan judul & deskripsi
             Icon: Star/Award (SVG)
             ============================================ -->
        <section class="section-card">
            <h2 class="section-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    ircle cx="12" cy="8" r="7"/>
                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                </svg>
                Nilai Nilai Waroenk
            </h2>
            
            <!-- Container untuk list nilai -->
            <div class="list-container" id="nilaiContainer">
                <!-- Item nilai akan ditambahkan di sini -->
            </div>

            <!-- Tombol tambah nilai baru -->
            <button class="btn-add" id="btnAddNilai">
                <span class="icon">+</span>
                Tambah Nilai
            </button>
        </section>

        <!-- ============================================
             TOMBOL SIMPAN SEMUA PERUBAHAN
             Submit button untuk save data
             ============================================ -->
        <button class="btn-save-all" id="btnSaveAll">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                <polyline points="17 21 17 13 7 13 7 21"/>
                <polyline points="7 3 7 8 15 8"/>
            </svg>
            Simpan Semua Perubahan
        </button>
    </main>

    <!-- ============================================
         JAVASCRIPT
         Semua interaktivitas halaman
         ============================================ -->
    <script>
        // ============================================
        // A. TOGGLE SIDEBAR
        // Menampilkan/menyembunyikan sidebar
        // ============================================
        
        const menuIcon = document.getElementById('menuIcon');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        /**
         * toggleSidebar()
         * Fungsi untuk membuka/tutup sidebar
         * Menggunakan class 'active' untuk trigger CSS transition
         */
        function toggleSidebar() {
            menuIcon.classList.toggle('active');
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');
        }

        // Event listener: klik icon hamburger
        menuIcon.addEventListener('click', toggleSidebar);

        // Event listener: klik overlay (backdrop) untuk tutup sidebar
        sidebarOverlay.addEventListener('click', toggleSidebar);

        // ============================================
        // B. LOGOUT REDIRECT
        // Redirect ke halaman login (dummy)
        // ============================================
        
        const btnLogout = document.getElementById('btnLogout');

        /**
         * handleLogout()
         * Redirect user ke halaman login admin
         * Ganti URL sesuai kebutuhan (misal: /admin/login)
         */
        btnLogout.addEventListener('click', function() {
            // Konfirmasi sebelum logout
            if (confirm('Yakin ingin keluar dari dashboard?')) {
                // Redirect ke halaman login
                window.location.href = '/admin/login';
                // Alternatif: window.location.href = 'login-admin.html';
            }
        });

        // ============================================
        // C. DYNAMIC MISI LIST
        // Menambah & menghapus item misi
        // ============================================

        const misiContainer = document.getElementById('misiContainer');
        const btnAddMisi = document.getElementById('btnAddMisi');
        
        // Counter untuk unique ID setiap item
        let misiCounter = 1;

        // Data misi default (contoh)
        const defaultMisi = [
            'Menyajikan hidangan otentik dengan bahan baku berkualitas tinggi',
            'Memberikan pengalaman bersantap yang hangat dan tak terlupakan',
            'Berinovasi tanpa meninggalkan akar tradisi'
        ];

        /**
         * createMisiItem(text)
         * Membuat elemen DOM untuk satu item misi
         * @param {string} text - Isi teks misi
         * @return {HTMLElement} - Elemen div.list-item
         */
        function createMisiItem(text = '') {
            const item = document.createElement('div');
            item.className = 'list-item';
            item.setAttribute('data-id', misiCounter++);

            item.innerHTML = `
                <div class="list-item-header">
                    <span class="list-item-title">Misi ${item.getAttribute('data-id')}</span>
                    <button class="btn-delete" onclick="deleteMisiItem(this)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                        </svg>
                    </button>
                </div>
                <textarea class="input-text" rows="3" placeholder="Tulis poin misi...">${text}</textarea>
            `;

            return item;
        }

        /**
         * deleteMisiItem(btn)
         * Menghapus item misi dari DOM
         * @param {HTMLElement} btn - Tombol delete yang diklik
         */
        function deleteMisiItem(btn) {
            const item = btn.closest('.list-item');
            if (confirm('Hapus misi ini?')) {
                item.style.opacity = '0';
                item.style.transform = 'translateX(-20px)';
                setTimeout(() => item.remove(), 250);
            }
        }

        // Event listener: tombol tambah misi
        btnAddMisi.addEventListener('click', function() {
            const newItem = createMisiItem();
            misiContainer.appendChild(newItem);
            
            // Fokus ke textarea baru
            newItem.querySelector('textarea').focus();
        });

        // Inisialisasi: tampilkan misi default
        defaultMisi.forEach(text => {
            misiContainer.appendChild(createMisiItem(text));
        });

        // ============================================
        // D. DYNAMIC NILAI WAROENK LIST
        // Menambah & menghapus nilai waroenk
        // ============================================

        const nilaiContainer = document.getElementById('nilaiContainer');
        const btnAddNilai = document.getElementById('btnAddNilai');
        
        let nilaiCounter = 1;

        // Data nilai default
        const defaultNilai = [
            {
                judul: 'Kualitas Rasa',
                deskripsi: 'Setiap hidangan kami dibuat dari bahan-bahan pilihan untuk menjaga kualitas rasa warisan nusantara'
            },
            {
                judul: 'Pelayanan Hangat',
                deskripsi: 'Kami menyambut setiap pelanggan seperti keluarga, menciptakan suasana yang nyaman dan penuh keramahan'
            }
        ];

        /**
         * createNilaiItem(judul, deskripsi)
         * Membuat elemen DOM untuk satu item nilai
         * @param {string} judul - Judul nilai
         * @param {string} deskripsi - Deskripsi nilai
         * @return {HTMLElement}
         */
        function createNilaiItem(judul = '', deskripsi = '') {
            const item = document.createElement('div');
            item.className = 'list-item';
            item.setAttribute('data-id', nilaiCounter++);

            item.innerHTML = `
                <div class="list-item-header">
                    <span class="list-item-title">Nilai ${item.getAttribute('data-id')}</span>
                    <button class="btn-delete" onclick="deleteNilaiItem(this)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                        </svg>
                    </button>
                </div>
                <input 
                    type="text" 
                    class="input-text" 
                    placeholder="Judul nilai (mis: Integritas)" 
                    value="${judul}"
                    style="margin-bottom: 10px;">
                <textarea 
                    class="input-text" 
                    rows="3" 
                    placeholder="Deskripsi nilai...">${deskripsi}</textarea>
            `;

            return item;
        }

        /**
         * deleteNilaiItem(btn)
         * Menghapus item nilai dari DOM
         * @param {HTMLElement} btn - Tombol delete
         */
        function deleteNilaiItem(btn) {
            const item = btn.closest('.list-item');
            if (confirm('Hapus nilai ini?')) {
                item.style.opacity = '0';
                item.style.transform = 'translateX(-20px)';
                setTimeout(() => item.remove(), 250);
            }
        }

        // Event listener: tombol tambah nilai
        btnAddNilai.addEventListener('click', function() {
            const newItem = createNilaiItem();
            nilaiContainer.appendChild(newItem);
            
            // Fokus ke input judul
            newItem.querySelector('input').focus();
        });

        // Inisialisasi: tampilkan nilai default
        defaultNilai.forEach(data => {
            nilaiContainer.appendChild(createNilaiItem(data.judul, data.deskripsi));
        });

        // ============================================
        // E. SIMPAN SEMUA PERUBAHAN
        // Collect & log data (dummy backend)
        // ============================================

        const btnSaveAll = document.getElementById('btnSaveAll');

        /**
         * saveAllChanges()
         * Mengumpulkan semua data dari form
         * Kirim ke backend (saat ini hanya console.log)
         */
        btnSaveAll.addEventListener('click', function() {
            // Ambil data sejarah & visi
            const sejarah = document.getElementById('sejarahInput').value;
            const visi = document.getElementById('visiInput').value;

            // Ambil semua item misi
            const misiItems = Array.from(document.querySelectorAll('#misiContainer .list-item'))
                .map(item => item.querySelector('textarea').value)
                .filter(text => text.trim() !== '');

            // Ambil semua item nilai
            const nilaiItems = Array.from(document.querySelectorAll('#nilaiContainer .list-item'))
                .map(item => ({
                    judul: item.querySelector('input').value,
                    deskripsi: item.querySelector('textarea').value
                }))
                .filter(obj => obj.judul.trim() !== '' || obj.deskripsi.trim() !== '');

            // Objek data yang akan dikirim
            const dataToSave = {
                sejarah,
                visi,
                misi: misiItems,
                nilai: nilaiItems
            };

            // Log data (ganti dengan AJAX call nanti)
            console.log('Data yang akan disimpan:', dataToSave);

            // Feedback ke user
            alert('✅ Semua perubahan berhasil disimpan!\n\n(Fitur backend belum tersambung)');
            
            // Opsional: kirim ke server via fetch
            // fetch('/admin/tentang/update', {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify(dataToSave)
            // }).then(response => response.json())
            //   .then(data => alert('Berhasil disimpan!'));
        });
    </script>

</body>
</html>