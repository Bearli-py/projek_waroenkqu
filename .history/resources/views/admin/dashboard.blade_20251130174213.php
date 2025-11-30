{{-- 
========================================================
HALAMAN DASHBOARD ADMIN WAROENK QU
Struktur: Sidebar kiri + konten kanan (overview + kartu)
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Waroenk Qu</title>

    <style>
        /* =========================================
           1. LAYOUT DASAR
           ========================================= */

        /* Body = flex: sidebar di kiri, main di kanan */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F5EDE1;      /* krem lembut */
            display: flex;                  /* anak-anak sejajar horizontal */
            min-height: 100vh;              /* setinggi layar penuh */
        }

        /* =========================================
           2. SIDEBAR KIRI
           ========================================= */

        .sidebar {
            width: 230px;                   /* lebar sidebar tetap */
            background-color: #FFFFFF;      /* putih */
            box-shadow: 2px 0 10px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            padding: 24px 20px;
            transition: transform 0.3s ease;   /* animasi slide */
        }

        /* Logo / judul di sidebar */
        .sidebar-logo {
            margin-bottom: 30px;
        }

        .sidebar-logo-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            margin: 4px 0 0 0;
        }

        .sidebar-logo-sub {
            font-size: 12px;
            color: #B33939;                /* merah brand */
        }

        /* Menu list di sidebar */
        .sidebar-menu {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 14px;                     /* jarak antar item menu */
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #555;
            padding: 8px 10px;
            border-radius: 999px;          /* bentuk pil */
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        /* Menu yang aktif (Overview) */
        .sidebar-item-active {
            background-color: #FDEBEA;     /* merah muda */
            color: #B33939;
            font-weight: 600;
        }

        /* =========================================
           3. KONTEN KANAN
           ========================================= */

        .main {
            flex: 1;                       /* ambil sisa lebar */
            padding: 24px 32px;
        }

        /* Bar atas: icon menu + tombol keluar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .menu-icon {
            width: 32px;
            height: 32px;
            border-radius: 999px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        /* Tombol keluar */
        .btn-logout {
            padding: 8px 16px;
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

        .btn-logout:hover {
            background-color: #B33939;
            color: #fff;
        }

        /* Judul halaman */
        .page-title {
            font-size: 18px;
            font-weight: 600;
            color: #B33939;
            margin-bottom: 4px;
        }

        .page-subtitle {
            font-size: 12px;
            color: #888;
            margin-bottom: 20px;
        }

        /* =========================================
           4. KARTU STATISTIK ATAS
           ========================================= */

        .stats-row {
            display: flex;
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card {
            flex: 1;
            border-radius: 16px;
            color: #fff;
            padding: 18px 18px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 6px 18px rgba(0,0,0,0.18);
        }

        .stat-title {
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-number {
            font-size: 22px;
            font-weight: 700;
            text-align: right;
        }

        .bg-red    { background: #B33939; }
        .bg-yellow { background: #F2C94C; color: #333; }
        .bg-green  { background: #2F7D32; }

        /* =========================================
           5. KOTAK "KELOLA KONTEN"
           ========================================= */

        .content-box {
            background-color: #FFFFFF;
            border-radius: 16px;
            padding: 18px 20px 20px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        }

        .content-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .content-buttons {
            display: flex;
            gap: 14px;
        }

        .content-btn {
            flex: 1;
            border-radius: 999px;
            border: none;
            padding: 10px 0;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: #fff;
            transition: all 0.2s ease;
        }

        .content-btn.red    { background-color: #B33939; }
        .content-btn.yellow { background-color: #F2C94C; color: #333; }
        .content-btn.green  { background-color: #2F7D32; }

        .content-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        }

        /* =========================================
           6. RESPONSIVE (TABLET / HP)
           ========================================= */

/* default: sidebar kelihatan di desktop */
@media (max-width: 900px) {
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        transform: translateX(-100%);   /* disembunyikan ke kiri */
        z-index: 1000;
    }

    /* kalau punya class .sidebar--open, geser masuk */
    .sidebar.sidebar--open {
        transform: translateX(0);
    }

    body {
        justify-content: center;
    }

    .main {
        padding: 20px;
    }

    .stats-row {
        flex-direction: column;
    }

    .content-buttons {
        flex-direction: column;
    }
}
    </style>
</head>
<body>
    {{-- =========================================
         SIDEBAR KIRI
         ========================================= --}}
    <aside class="sidebar" id=>
        <div class="sidebar-logo">
            {{-- Bisa diganti <img src="..."> kalau pakai logo gambar --}}
            <div class="sidebar-logo-title">WAROENK QU</div>
            <div class="sidebar-logo-sub">Admin Panel</div>
        </div>

        <nav class="sidebar-menu">
            {{-- Menu aktif --}}
            <div class="sidebar-item sidebar-item-active">Overview</div>
            {{-- Nanti ini bisa dijadikan link ke halaman lain --}}
            <div class="sidebar-item">Menu</div>
            <div class="sidebar-item">Galeri</div>
            <div class="sidebar-item">Testimoni</div>
        </nav>
    </aside>

    {{-- =========================================
         KONTEN KANAN
         ========================================= --}}
    <main class="main">
        {{-- Bar atas (ikon menu & tombol keluar) --}}
        <div class="top-bar">
            <div class="menu-icon">
                ☰
            </div>

            {{-- TODO: ganti action="#" ke route logout --}}
            <form method="POST" action="#">
                @csrf
                <button type="submit" class="btn-logout">
                    ⬅ Keluar
                </button>
            </form>
        </div>

        {{-- Judul halaman --}}
        <div class="page-title">Dashboard Overview</div>
        <div class="page-subtitle">
            Selamat datang di Admin Panel Waroenk Qu
        </div>

        {{-- Kartu statistik (Total Menu, Foto Galeri, Testimoni) --}}
        <div class="stats-row">
            <div class="stat-card bg-red">
                <div class="stat-title">Total Menu</div>
                <div class="stat-number">10</div>    {{-- angka contoh, nanti bisa dinamis --}}
            </div>
            <div class="stat-card bg-yellow">
                <div class="stat-title">Foto Galeri</div>
                <div class="stat-number">14</div>
            </div>
            <div class="stat-card bg-green">
                <div class="stat-title">Testimoni</div>
                <div class="stat-number">9</div>
            </div>
        </div>

        {{-- Kotak "Kelola Konten" --}}
        <div class="content-box">
            <div class="content-title">Kelola Konten</div>
            <div class="content-buttons">
                {{-- Nanti bisa diganti ke <a href="{{ route('admin.menu') }}" ...> --}}
                <button class="content-btn red">
                    Kelola Menu
                </button>
                <button class="content-btn yellow">
                    Kelola Galeri
                </button>
                <button class="content-btn red">
                    Kelola Testimoni
                </button>
            </div>
        </div>
    </main>
</body>
</html>