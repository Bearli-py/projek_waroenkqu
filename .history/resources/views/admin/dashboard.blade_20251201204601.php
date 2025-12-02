{{-- 
========================================================
FILE   : resources/views/admin/dashboard.blade.php
HALAMAN: DASHBOARD ADMIN WAROENK QU
DESAIN : Sidebar kiri (hidden by default) + konten kanan
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Set encoding karakter ke UTF-8 --}}
    <meta charset="UTF-8">

    {{-- Supaya tampilan responsif di mobile/tablet/desktop --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - Waroenk Qu</title>

    {{-- 
        CSS INTERNAL
        - Dipakai khusus untuk halaman dashboard admin
        - Kalau dihapus: tampilan akan kembali polos tanpa style
    --}}
    <style>
        /* =====================================================
           1. STYLE GLOBAL
           ===================================================== */

        /* Style dasar body: font, background krem, dan layout flex */
        body {
            margin: 0;                                    {{-- Hilangkan margin default browser --}}
            font-family: 'Poppins', sans-serif;          {{-- Font utama --}}
            background-color: #F5EDE1;                   {{-- Warna krem seperti desain --}}
            min-height: 100vh;                           {{-- Tinggi minimal 1 layar penuh --}}
        }

        /* Container utama yang menampung sidebar + konten */
        .page-container {
            display: flex;                               {{-- Sidebar dan konten sejajar horizontal --}}
        }

        /* =====================================================
           2. SIDEBAR (MUNCUL SAAT ICON MENU DIKLIK)
           ===================================================== */

        .sidebar {
            width: 240px;                                {{-- Lebar sidebar --}}
            background-color: #FFFFFF;                   {{-- Warna putih --}}
            box-shadow: 4px 0 16px rgba(0,0,0,0.1);      {{-- Bayangan lembut ke kanan --}}
            display: flex;
            flex-direction: column;
            padding: 24px 24px;
            position: fixed;                             {{-- Menempel di sisi kiri layar --}}
            top: 0;
            left: 0;
            height: 100vh;                               {{-- Sidebar setinggi layar penuh --}}
            transform: translateX(-100%);                {{-- POSISI AWAL: sembunyi di luar layar kiri --}}
            z-index: 1000;                               {{-- Di atas konten --}}
            transition: transform 0.3s ease;             {{-- Animasi slide in/out halus --}}
        }
        {{-- 
            Kalau baris transform dihapus:
            - Sidebar akan selalu tampil menumpuk di kiri
            - Tidak bisa "slide" masuk/keluar
        --}}

        /* Class tambahan saat sidebar dibuka (JS akan menambah/menghapus class ini) */
        .sidebar.sidebar--open {
            transform: translateX(0);                    {{-- Geser masuk ke layar --}}
        }

        /* Bagian logo/nama panel di atas sidebar */
        .sidebar-header {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
            margin-bottom: 36px;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-logo-icon {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .sidebar-logo-title {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .sidebar-logo-subtitle {
            font-size: 17px;
            color: #B33939;                             {{-- Merah brand untuk "Admin Panel" --}}
        }

        /* Menu navigasi di sidebar */
        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: #444;
            padding: 9px 12px;
            border-radius: 999px;
            text-decoration: none;
            cursor: pointer;
             transition: background-color 0.2s;
        }

        .sidebar-item-icon {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }

        /* Item menu yang aktif (Overview) */
        .sidebar-item--active {
            background-color: #FDEBEA;                   {{-- Merah muda --}}
            color: #B33939;
            font-weight: 600;
        }

        /* Hover di semua item menu */
        .sidebar-item:hover {
            background-color: #F5F5F5;
        }

        /* =====================================================
           3. OVERLAY HITAM TRANSPARAN DI BELAKANG SIDEBAR
           ===================================================== */

        .overlay {
            position: fixed;
            inset: 0;                                    {{-- top:0; right:0; bottom:0; left:0 --}}
            background-color: rgba(0,0,0,0.35);          {{-- Hitam transparan --}}
            opacity: 0;                                  {{-- Awal: tidak terlihat --}}
            pointer-events: none;                        {{-- Awal: tidak bisa diklik --}}
            transition: opacity 0.3s ease;
            z-index: 900;                                {{-- Di bawah sidebar, di atas konten --}}
        }

        /* Saat sidebar terbuka, overlay ikut aktif (JS tambahkan class ini) */
        .overlay.overlay--visible {
            opacity: 1;                                  {{-- Terlihat --}}
            pointer-events: auto;                        {{-- Bisa diklik (untuk menutup sidebar) --}}
        }

        /* =====================================================
           4. KONTEN KANAN (HEADER + KARTU)
           ===================================================== */

        .main-content {
            flex: 1;                                     {{-- Ambil lebar sisa di sebelah sidebar --}}
            margin-left: 0;                              {{-- Sidebar pakai position fixed, jadi margin bisa 0 --}}
            padding: 24px 40px;                          {{-- Ruang di tepi konten --}}
        }

        /* HEADER ATAS: icon menu + judul + tombol keluar */
        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        /* Grup kiri: icon menu + judul halaman */
        .top-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Tombol icon menu (untuk buka/tutup sidebar) */
        .menu-button {
            border: none;
            background-color: transparent;
            padding: 6px;
            border-radius: 999px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s ease;
        }

        .menu-button:hover {
            background-color: #F2E5D4;
        }

        .menu-icon {
            width: 22px;
            height: 22px;
            object-fit: contain;
        }

        .page-title-main {
            font-size: 18px;
            font-weight: 600;
            color: #B33939;
        }

        .page-subtitle-main {
            font-size: 12px;
            color: #777;
        }

        /* Tombol Keluar di kanan atas */
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

        /* =====================================================
           5. BAGIAN "DASHBOARD OVERVIEW"
           ===================================================== */

        .section-header {
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #B33939;
            margin-bottom: 4px;
        }

        .section-subtitle {
            font-size: 11px;
            color: #888;
        }

        /* Container tengah biar nggak melebar ke seluruh layar */
.dashboard-wrapper {
    max-width: 960px;          /* lebar total konten (mirip Figma) */
    margin: 0 auto 40px auto;  /* center + jarak bawah */
}

        /* ===== KARTU STATISTIK ===== */
.stats-row {
    display: flex;
    gap: 18px;
    margin-bottom: 24px;
}

.stat-card {
    flex: 1;
    min-width: 0;
    border-radius: 18px;
    padding: 18px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #fff;
    box-shadow: 0 10px 24px rgba(0,0,0,0.12);
}

.stat-card.red   { background-color: #B33939; }
.stat-card.yellow{ background-color: #F2C94C; color:#222; }
.stat-card.green { background-color: #2F7D32; }

.stat-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.stat-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.stat-icon {
    width: 22px;
    height: 22px;
    object-fit: contain;
}

.stat-title {
    font-size: 14px;
    font-weight: 600;
}

.stat-value {
    font-size: 26px;
    font-weight: 700;
    min-width: 32px;
    text-align: right;
}

/* ===== KELOLA KONTEN ===== */
.content-box {
    background-color: #FFFFFF;
    border-radius: 18px;
    padding: 20px 24px 24px;
    box-shadow: 0 10px 24px rgba(0,0,0,0.12);
}

.content-title {
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 18px;
}

.content-buttons {
    display: flex;
    gap: 16px;
}

.content-btn {
    flex: 1;
    border-radius: 999px;
    border: none;
    padding: 11px 0;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: #fff;
    transition: all 0.2s ease;
}

.content-btn.red    { background-color: #B33939; }
.content-btn.yellow { background-color: #F2C94C; color:#222; }

.content-btn-icon {
    width: 18px;
    height: 18px;
    object-fit: contain;
}

.content-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.25);
}

        /* =====================================================
           8. RESPONSIVE (TABLET & MOBILE)
           ===================================================== */

        @media (max-width: 900px) {
    .stats-row,
    .content-buttons {
        flex-direction: column;
    }
}
    </style>
</head>
<body>
    {{-- OVERLAY GELAP --}}
<div class="overlay" id="overlay"></div>

<div class="page-container">
    {{-- ===== SIDEBAR KIRI ===== --}}
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
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/overview.png') }}" class="sidebar-item-icon" alt="">
                <span>Overview</span>
            </a>

            {{-- Link ke halaman kelola menu --}}
            <a href="{{ route('admin.menu') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/menu hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Menu</span>
            </a>

            {{-- Link ke halaman kelola galeri (halaman aktif saat ini) --}}
            <a href="{{ route('admin.galeri') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/galeri hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Galeri</span>
            </a>

            {{-- Link ke halaman testimoni --}}
            <a href="{{ route('admin.testimoni') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/testi hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Testimoni</span>
            </a>

            {{-- Link ke halaman kelola tentang --}}
            <a href="{{ route('admin.tentang') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/tentang-hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Tentang</span>
            </a>

                    <a href="kelola-kontak.html" class="sidebar-item sidebar-item--active">
            <img src="images/icon/kontak hitam.png" class="sidebar-item-icon" alt="">
            <span>Kontak</span>
        </a>

        </nav>
    </aside>

        {{-- =====================================================
             KONTEN KANAN
             ===================================================== --}}
        <main class="main-content">
            {{-- TOP BAR: icon menu + judul + tombol keluar --}}
            <header class="top-bar">
                <div class="top-left">
                    {{-- TOMBOL ICON MENU (untuk buka/tutup sidebar) --}}
                    <button type="button" class="menu-button" id="menuToggle">
                        {{-- Icon menu di-load dari public/images/icon/menu.png --}}
                        <img src="{{ asset('images/icon/overview.png') }}" 
                             alt="Menu"
                             class="menu-icon">
                    </button>

                    {{-- Judul + subjudul --}}
                    <div>
                        <div class="page-title-main">Dashboard Overview</div>
                        <div class="page-subtitle-main">
                            Selamat datang di Admin Panel Waroenk Qu
                        </div>
                    </div>
                </div>

                {{-- TOMBOL KELUAR DI KANAN --}}
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
    
{{-- ===== ROW KARTU STATISTIK (RAPI, BUKAN GAMBAR BESAR) ===== --}}
<div class="dashboard-wrapper">
    <section class="stats-row">
        {{-- Kartu Total Menu (merah) --}}
        <article class="stat-card red">
            <div class="stat-header">
                <div class="stat-left">
                    <img src="{{ asset('images/icon/menu putih.png') }}" class="stat-icon" alt="">
                    <span class="stat-title">Total Menu</span>
                </div>
                <span class="stat-value">10</span>
            </div>
        </article>

        {{-- Kartu Foto Galeri (kuning) --}}
        <article class="stat-card yellow">
            <div class="stat-header">
                <div class="stat-left">
                    <img src="{{ asset('images/icon/galeri putih.png') }}" class="stat-icon" alt="">
                    <span class="stat-title">Foto Galeri</span>
                </div>
                <span class="stat-value">14</span>
            </div>
        </article>

        {{-- Kartu Testimoni (hijau) --}}
        <article class="stat-card green">
            <div class="stat-header">
                <div class="stat-left">
                    <img src="{{ asset('images/icon/testimoni putih.png') }}" class="stat-icon" alt="">
                    <span class="stat-title">Testimoni</span>
                </div>
                <span class="stat-value">9</span>
            </div>
        </article>
    </section>

    {{-- ===== BOX KELOLA KONTEN ===== --}}
    <section class="content-box">
    <div class="content-title">Kelola Konten</div>
    <div class="content-buttons">
        {{-- TOMBOL KE HALAMAN KELOLA MENU --}}
        <a href="{{ route('admin.menu') }}" class="content-btn red">
            Kelola Menu
        </a>

        {{-- TOMBOL KE HALAMAN KELOLA GALERI --}}
        <a href="{{ route('admin.galeri') }}" class="content-btn yellow">
            Kelola Galeri
        </a>

        {{-- TOMBOL KE HALAMAN KELOLA TESTIMONI --}}
        <a href="{{ route('admin.testimoni') }}" class="content-btn red">
            Kelola Testimoni
        </button>
    </div>
</section>
</div>

    {{-- 
        =====================================================
        9. JAVASCRIPT UNTUK SIDEBAR (SLIDE IN/OUT)
        =====================================================
        - Mengatur:
          * Buka/tutup sidebar saat icon menu diklik
          * Menutup sidebar saat area overlay diklik
        - Kalau script ini dihapus:
          * Sidebar tidak bisa dibuka/tutup lewat icon/menu
    --}}
    <script>
        // Ambil elemen penting: tombol menu, sidebar, dan overlay
        const menuToggle = document.getElementById('menuToggle');
        const sidebar    = document.getElementById('sidebar');
        const overlay    = document.getElementById('overlay');

        // Fungsi untuk toggle (buka/tutup) sidebar
        function toggleSidebar() {
            // Toggle class sidebar--open (untuk animasi slide in/out)
            sidebar.classList.toggle('sidebar--open');

            // Toggle class overlay--visible (untuk menampilkan/menghilangkan overlay gelap)
            overlay.classList.toggle('overlay--visible');
        }

        // Saat tombol menu diklik -> buka/tutup sidebar
        if (menuToggle) {
            menuToggle.addEventListener('click', function () {
                toggleSidebar();
            });
        }

        // Saat overlay diklik -> tutup sidebar
        if (overlay) {
            overlay.addEventListener('click', function () {
                // Pastikan sidebar tertutup
                sidebar.classList.remove('sidebar--open');
                overlay.classList.remove('overlay--visible');
            });
        }
    </script>
</body>
</html>