{{-- 
========================================================
FILE   : resources/views/admin/kelola-galeri.blade.php
HALAMAN: KELOLA GALERI FOTO WAROENK QU
DESAIN : Sesuai mockup (box upload, tab kategori, grid foto, sidebar)
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Mengatur encoding karakter dan viewport untuk tampilan responsif --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Galeri - Waroenk Qu</title>

    {{-- 
        CSS INTERNAL
        - Semua styling halaman didefinisikan di sini supaya mudah dicek.
        - Jika file ini dipindah ke CSS terpisah, tinggal memindahkan blok <style> ini.
    --}}
    <style>
        /* =========================================================
           1. STYLE GLOBAL HALAMAN
           ========================================================= */

        /* Mengatur tampilan dasar body: background krem, font, dan reset margin */
        body {
            margin: 0;                               /* Hilangkan margin default browser */
            font-family: 'Poppins', sans-serif;     /* Font utama sesuai desain modern */
            background-color: #F7EFDE;              /* Warna krem lembut untuk background utama */
        }

        /* Container utama untuk mengikat sidebar + konten halaman */
        .page-container {
            min-height: 100vh;                      /* Tinggi minimal 1 layar */
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
            width: 50px;                            /* Perbesar logo agar jelas */
            height: 50px;
            object-fit: contain;
        }

        .sidebar-logo-title {
            font-family: 'Playfair Display', serif; /* Sedikit berbeda agar berasa brand */
            font-size: 16px;
            font-weight: 700;
        }

        .sidebar-logo-subtitle {
            font-size: 11px;
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

        /* =========================================================
           3. TOP BAR (ICON MENU + TOMBOL KELUAR)
           ========================================================= */

        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 32px;
            background-color: #FDF7EF;             /* Sedikit lebih terang dari background utama */
        }

        .top-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Tombol icon menu (hamburger) di kiri atas */
        .menu-button {
            border: none;
            background: transparent;
            padding: 6px;
            border-radius: 999px;
            cursor: pointer;
        }

        .menu-button:hover {
            background-color: #F0E0CF;
        }

        .menu-icon {
            width: 22px;
            height: 22px;
        }

        /* Tombol keluar merah di kanan atas */
        .btn-logout {
            padding: 8px 18px;
            border-radius: 999px;
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

        .btn-logout:hover {
            background-color: #B33939;
            color: #fff;
        }

        /* =========================================================
           4. HEADER SECTION "Kelola Galeri"
           ========================================================= */

        .gallery-header {
            background-color: #F7F2E9;              /* Cream sama seperti halaman Kelola Menu */
            padding: 18px 32px;
        }

        .gallery-header-title {
            font-size: 18px;
            font-weight: 600;
            color: #B83939;                         /* Merah khas brand */
            margin-bottom: 4px;
        }

        .gallery-header-subtitle {
            font-size: 12px;
            color: #777;
        }

        /* =========================================================
           5. WRAPPER KONTEN UTAMA
           ========================================================= */

        .content-wrapper {
            max-width: 960px;                       /* Lebar konten maksimum */
            margin: 18px auto 40px auto;            /* Center secara horizontal + margin bawah */
            padding: 0 16px;                        /* Sedikit padding samping untuk mobile */
        }

        /* =========================================================
           6. BOX UPLOAD FOTO
           ========================================================= */

        /* Card besar untuk upload foto baru */
        .upload-card {
            background-color: #FFF7E7;              /* Putih kekuningan (sangat lembut) */
            border-radius: 18px;
            border: 2px solid #F2C94C;              /* Border kuning sesuai desain */
            padding: 26px 24px 22px;
            margin-bottom: 24px;
        }

        /* Bagian tengah icon + teks Upload Foto Baru */
        .upload-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 18px;
        }

        /* Icon upload besar di tengah (dipakai image dari assets) */
        .upload-icon {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 8px;
        }

        .upload-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .upload-subtitle {
            font-size: 12px;
            color: #888;
        }

        /* Area input file dan checkbox */
        .upload-form-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }

        /* Row "Pilih file" dan nama file */
        .upload-file-row {
            display: flex;
            width: 100%;
            max-width: 520px;
        }

        /* Tombol pilih file abu-abu */
        .btn-choose-file {
            background-color: #D6D3CE;
            border: none;
            padding: 8px 14px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 4px 0 0 4px;
        }

        /* Kolom teks nama file */
        .upload-file-name {
            flex: 1;
            background-color: #E9E7E2;
            font-size: 12px;
            color: #666;
            display: flex;
            align-items: center;
            padding: 0 10px;
            border-radius: 0 4px 4px 0;
        }

        /* Container checkbox kategori */
        .upload-checkboxes {
            display: flex;
            gap: 20px;
            font-size: 12px;
            justify-content: center;
        }

        .upload-checkboxes label {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
        }

        /* Tombol hijau Upload Foto */
        .btn-upload-submit {
            margin-top: 4px;
            background-color: #35A854;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 32px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(53,168,84,0.35);
        }

        .btn-upload-submit:hover {
            background-color: #2F9148;
        }

        /* =========================================================
           7. TAB KATEGORI (Makanan, Minuman, Suasana)
           ========================================================= */

        .category-tabs {
            display: inline-flex;                   /* Deret horizontal */
            gap: 8px;
            margin-bottom: 18px;
        }

        /* Style dasar tab kategori (non-aktif) */
        .category-tab {
            padding: 7px 18px;
            border-radius: 999px;
            border: 1px solid #B58B5B;             /* Cokelat lembut */
            background-color: #FFFFFF;
            font-size: 12px;
            cursor: pointer;
            font-weight: 500;
            color: #555;
        }

        /* Tab aktif: merah marun dan teks putih */
        .category-tab--active {
            background-color: #B33939;
            color: #FFFFFF;
            border-color: #B33939;
        }

        /* =========================================================
           8. GRID FOTO GALERI
           ========================================================= */

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);  /* 4 kolom */
            gap: 14px;                              /* Jarak antar foto */
        }

        /* Card tiap foto */
        .gallery-item {
            position: relative;                     /* Untuk meletakkan label kategori absolut */
            border-radius: 16px;
            overflow: hidden;                       /* Agar foto & label mengikuti radius */
            background-color: #EEE;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        /* Hover ringan pada foto */
        .gallery-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;                      /* Isi card secara proporsional */
        }

        /* Label kuning di pojok kanan atas */
        .gallery-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: #F2C94C;
            color: #333;
            font-size: 10px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 999px;
        }

        /* =========================================================
           9. RESPONSIVE
           ========================================================= */

        @media (max-width: 992px) {
            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);  /* Tablet: 3 kolom */
            }
        }

        @media (max-width: 768px) {
            .top-bar,
            .gallery-header {
                padding: 12px 16px;
            }

            .content-wrapper {
                padding: 0 12px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);  /* Mobile sedang: 2 kolom */
            }

            .upload-file-row {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .gallery-grid {
                grid-template-columns: 1fr;             /* Mobile kecil: 1 kolom */
            }
        }
    </style>
</head>
<body>
{{-- 
    OVERLAY GELAP
    - Elemen ini akan tampil ketika sidebar dibuka.
    - Klik overlay akan menutup sidebar.
--}}
<div class="overlay" id="overlay"></div>

<div class="page-container">

    {{-- =========================================================
         SIDEBAR ADMIN KIRI (REUSABLE)
       ========================================================= --}}
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
                <img src="{{ asset('images/icon/test
                i hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Testimoni</span>
            </a>
        </nav>
    </aside>

    {{-- =========================================================
         TOP BAR (ICON MENU + TOMBOL KELUAR)
       ========================================================= --}}
    <header class="top-bar">
        <div class="top-left">
            {{-- Tombol icon menu yang akan membuka sidebar --}}
            <button type="button" class="menu-button" id="menuToggle">
                <img src="{{ asset('images/icon/overview.png') }}" alt="Menu" class="menu-icon">
            </button>
        </div>

        {{-- Tombol Keluar: redirect ke /admin/login ketika diklik --}}
        <form method="GET" action="/admin/login">
            {{-- Tidak perlu CSRF karena hanya GET redirect --}}
            <button type="submit" class="btn-logout">
                <img src="{{ asset('images/icon/logout merah.png') }}"
                     alt="Keluar"
                     class="btn-logout-icon">
                Keluar
            </button>
        </form>
    </header>

    {{-- =========================================================
         HEADER KONTEN "Kelola Galeri"
       ========================================================= --}}
    <section class="gallery-header">
        <div class="gallery-header-title">Kelola Galeri</div>
        <div class="gallery-header-subtitle">
            Upload, edit, atau hapus foto galeri
        </div>
    </section>

    {{-- =========================================================
         WRAPPER KONTEN UTAMA
       ========================================================= --}}
    <div class="content-wrapper">

        {{-- =====================================================
             BOX UPLOAD FOTO BARU
           ===================================================== --}}
        <section class="upload-card">
            {{-- Bagian icon + judul upload --}}
            <div class="upload-header">
                {{-- Icon upload besar (silakan ganti dengan iconmu sendiri) --}}
                <img src="{{ asset('images/icon/upload-foto.png') }}"
                     alt="Upload"
                     class="upload-icon">
                <div class="upload-title">Upload Foto Baru</div>
                <div class="upload-subtitle">
                    Drag &amp; drop foto atau klik untuk memilih file
                </div>
            </div>

            {{-- Form upload (dummy / statis, belum ada backend) --}}
            <div class="upload-form-row">
                {{-- Baris tombol pilih file + nama file --}}
                <div class="upload-file-row">
                    {{-- Tombol untuk membuka dialog file (secara visual) --}}
                    <button type="button" class="btn-choose-file">
                        Pilih File
                    </button>
                    {{-- Teks status file yang dipilih --}}
                    <div class="upload-file-name">
                        Tidak ada file yang diupload
                    </div>
                </div>

                {{-- Checkbox kategori foto yang akan diupload --}}
                <div class="upload-checkboxes">
                    <label>
                        <input type="checkbox" name="kategori_upload" value="makanan">
                        <span>Makanan</span>
                    </label>
                    <label>
                        <input type="checkbox" name="kategori_upload" value="minuman">
                        <span>Minuman</span>
                    </label>
                    <label>
                        <input type="checkbox" name="kategori_upload" value="suasana">
                        <span>Suasana</span>
                    </label>
                </div>

                {{-- Tombol hijau untuk submit upload (belum tersambung backend) --}}
                <button type="button" class="btn-upload-submit">
                    Upload Foto
                </button>
            </div>
        </section>

        {{-- =====================================================
             TAB KATEGORI (FILTER)
           ===================================================== --}}
        <div class="category-tabs">
            {{-- Tab Makanan: secara default aktif --}}
            <button type="button"
                    class="category-tab category-tab--active"
                    data-category="makanan"
                    id="tabMakanan">
                Makanan
            </button>

            {{-- Tab Minuman --}}
            <button type="button"
                    class="category-tab"
                    data-category="minuman"
                    id="tabMinuman">
                Minuman
            </button>

            {{-- Tab Suasana --}}
            <button type="button"
                    class="category-tab"
                    data-category="suasana"
                    id="tabSuasana">
                Suasana
            </button>
        </div>

        {{-- =====================================================
             GRID FOTO GALERI
             - Setiap item diberi data-category untuk difilter via JS.
           ===================================================== --}}
        <section class="gallery-grid" id="galleryGrid">
            {{-- ====== KATEGORI MAKANAN (contoh gambar) ====== --}}
            <article class="gallery-item" data-category="makanan">
                <img src="{{ asset('images/menu/soto ayam.png') }}" alt="Makanan 1">
                <div class="gallery-badge">Makanan</div>
            </article>

            <article class="gallery-item" data-category="makanan">
                <img src="{{ asset('images/menu/rawon.png') }}" alt="Makanan 2">
                <div class="gallery-badge">Makanan</div>
            </article>

            <article class="gallery-item" data-category="makanan">
                <img src="{{ asset('images/menu/soto daging.png') }}" alt="Makanan 3">
                <div class="gallery-badge">Makanan</div>
            </article>

            <article class="gallery-item" data-category="makanan">
                <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Makanan 4">
                <div class="gallery-badge">Makanan</div>
            </article>

            <article class="gallery-item" data-category="makanan">
                <img src="{{ asset('images/menu/mie goreng.jpg') }}" alt="Makanan 5">
                <div class="gallery-badge">Makanan</div>
            </article>

            <article class="gallery-item" data-category="makanan">
                <img src="{{ asset('images/menu/kwetiau.jpg') }}" alt="Makanan 6">
                <div class="gallery-badge">Makanan</div>
            </article>

            {{-- ====== KATEGORI MINUMAN ====== --}}
            <article class="gallery-item" data-category="minuman">
                <img src="{{ asset('images/menu/kopi.jpg') }}" alt="Minuman 1">
                <div class="gallery-badge">Minuman</div>
            </article>

            <article class="gallery-item" data-category="minuman">
                <img src="{{ asset('images/menu/es teh.jpg') }}" alt="Minuman 2">
                <div class="gallery-badge">Minuman</div>
            </article>

            <article class="gallery-item" data-category="minuman">
                <img src="{{ asset('images/menu/es jeruk.jpg') }}" alt="Minuman 3">
                <div class="gallery-badge">Minuman</div>
            </article>

            {{-- ====== KATEGORI SUASANA ====== --}}
            <article class="gallery-item" data-category="suasana">
                <img src="{{ asset('images/menu/suasana-1.jpg') }}" alt="Suasana 1">
                <div class="gallery-badge">Suasana</div>
            </article>

            <article class="gallery-item" data-category="suasana">
                <img src="{{ asset('images/menu/suasana-2.jpg') }}" alt="Suasana 2">
                <div class="gallery-badge">Suasana</div>
            </article>

            <article class="gallery-item" data-category="suasana">
                <img src="{{ asset('images/menu/suasana-3.jpg') }}" alt="Suasana 3">
                <div class="gallery-badge">Suasana</div>
            </article>

            <article class="gallery-item" data-category="suasana">
                <img src="{{ asset('images/menu/suasana-4.jpg') }}" alt="Suasana 4">
                <div class="gallery-badge">Suasana</div>
            </article>
        </section>

    </div> {{-- /content-wrapper --}}
</div> {{-- /page-container --}}

{{-- =========================================================
     10. JAVASCRIPT
     - Toggle sidebar
     - Filter kategori galeri
   ========================================================= --}}
<script>
    // ==============================
    // A. TOGGLE SIDEBAR ADMIN
    // ==============================

    // Ambil elemen yang dibutuhkan untuk toggle
    const menuToggle = document.getElementById('menuToggle'); // Tombol icon menu di top-bar
    const sidebar    = document.getElementById('sidebar');    // Elemen sidebar kiri
    const overlay    = document.getElementById('overlay');    // Overlay gelap di belakang sidebar

    if (menuToggle && sidebar && overlay) {
        // Ketika tombol menu diklik -> toggle class "sidebar--open" & "overlay--visible"
        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('sidebar--open');        // Jika belum ada -> sidebar muncul
            overlay.classList.toggle('overlay--visible');     // Overlay juga ikut muncul
        });

        // Ketika overlay diklik -> paksa tutup sidebar & hilangkan overlay
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        });
    }

    // ==============================
    // B. FILTER KATEGORI GALERI
    // ==============================

    // Ambil referensi ke tombol tab dan item galeri
    const tabButtons   = document.querySelectorAll('.category-tab');      // Semua tombol tab
    const galleryItems = document.querySelectorAll('.gallery-item');      // Semua kartu foto

    // Fungsi untuk mengaktifkan tab tertentu dan mem-filter foto
    function setActiveCategory(category) {
        // 1) Ubah style tab: hapus class aktif pada semua tab, tambahkan ke tab yang diklik
        tabButtons.forEach(function (btn) {
            const btnCategory = btn.getAttribute('data-category');       // Ambil kategori dari atribut data-category
            if (btnCategory === category) {
                btn.classList.add('category-tab--active');               // Tab yang sesuai diberi class aktif
            } else {
                btn.classList.remove('category-tab--active');            // Tab lain di-nonaktifkan
            }
        });

        // 2) Tampilkan hanya foto dengan data-category yang sama dengan kategori aktif
        galleryItems.forEach(function (item) {
            const itemCategory = item.getAttribute('data-category');     // Kategori foto
            if (itemCategory === category) {
                item.style.display = 'block';                            // Tampilkan jika kategori cocok
            } else {
                item.style.display = 'none';                             // Sembunyikan jika tidak cocok
            }
        });
    }

    // Pasang event listener ke tiap tombol tab kategori
    tabButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const category = btn.getAttribute('data-category');          // Baca kategori dari data-category
            setActiveCategory(category);                                 // Panggil fungsi untuk update UI
        });
    });

    // Saat halaman pertama kali dimuat, set kategori awal ke "makanan"
    setActiveCategory('makanan');
</script>
</body>
</html>