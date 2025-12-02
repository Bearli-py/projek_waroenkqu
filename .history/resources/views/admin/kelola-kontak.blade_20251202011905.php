<!DOCTYPE html>
<html lang="id">
<head>
    <!-- 
    ==========================================================================
    META TAGS
    Definisi encoding, viewport untuk responsive, dan compatibility
    ==========================================================================
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelola Kontak - Waroenk Qu Admin</title>
    
    <!-- 
    ==========================================================================
    GOOGLE FONTS
    Import font Poppins untuk typography modern & clean
    ==========================================================================
    -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* 
        ==========================================================================
        1. RESET & BASE STYLES
        Reset default browser styles dan set foundation
        ==========================================================================
        */
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; /* Width/height include padding & border */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F7EFDE; /* Background krem lembut */
            color: #3E2723; /* Warna text coklat tua */
            min-height: 100vh;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        /* 
        ==========================================================================
        2. OVERLAY
        Background gelap semi-transparan saat sidebar terbuka
        Fungsi: memberikan focus pada sidebar dan memungkinkan close via click
        ==========================================================================
        */
        
        .overlay {
            position: fixed;
            inset: 0; /* Shorthand untuk top, right, bottom, left = 0 */
            background-color: rgba(0, 0, 0, 0.4); /* Hitam 40% opacity */
            opacity: 0; /* Hidden by default */
            pointer-events: none; /* Tidak bisa diklik saat hidden */
            transition: opacity 0.3s ease; /* Smooth fade in/out */
            z-index: 900; /* Di bawah sidebar (1000) */
        }

        /* Class untuk menampilkan overlay */
        .overlay.overlay--visible {
            opacity: 1;
            pointer-events: auto; /* Bisa diklik untuk tutup sidebar */
        }

        /* 
        ==========================================================================
        3. SIDEBAR
        Menu navigasi yang slide-in dari kiri
        Structure: Logo + Navigation Links
        ==========================================================================
        */
        
        .sidebar {
            width: 260px; /* Lebar sidebar */
            background-color: #FFFFFF;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1); /* Shadow lembut ke kanan */
            display: flex;
            flex-direction: column;
            padding: 28px 20px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh; /* Full height */
            transform: translateX(-100%); /* Hidden di kiri by default */
            z-index: 1000; /* Di atas overlay */
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); /* Smooth slide animation */
        }

        /* Class untuk membuka sidebar */
        .sidebar.sidebar--open {
            transform: translateX(0); /* Slide ke posisi normal */
        }

        /* Container logo sidebar */
        .sidebar-header {
            margin-bottom: 36px;
            border-bottom: 1px solid #F0F0F0; /* Divider halus */
            padding-bottom: 20px;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo-icon {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .sidebar-logo-text {
            display: flex;
            flex-direction: column;
        }

        .sidebar-logo-title {
            font-size: 18px;
            font-weight: 700;
            color: #3E2723;
            line-height: 1.2;
        }

        .sidebar-logo-subtitle {
            font-size: 12px;
            color: #B33939; /* Warna merah warung */
            font-weight: 500;
        }

        /* Navigation menu container */
        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 8px; /* Jarak antar menu item */
        }

        /* Individual menu item */
        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            border-radius: 12px; /* Rounded corner lembut */
            font-size: 14px;
            color: #555;
            text-decoration: none;
            transition: all 0.2s ease; /* Smooth hover effect */
        }

        .sidebar-item:hover {
            background-color: #F8F8F8; /* Background abu terang saat hover */
            color: #3E2723;
        }

        /* Menu item aktif (halaman sedang dibuka) */
        .sidebar-item--active {
            background-color: #FDEBEA; /* Background pink lembut */
            color: #B33939; /* Text merah */
            font-weight: 600;
        }

        .sidebar-item-icon {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }

        /* 
        ==========================================================================
        4. TOP BAR
        Header fixed di atas dengan menu toggle & button logout
        ==========================================================================
        */
        
        .top-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 32px;
    background-color: #FDF7EF;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    
    /* POSITIONING - INI YANG PENTING */
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;          /* Pastikan full width */
    z-index: 800;
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

        /* 
        ==========================================================================
        5. MAIN CONTENT
        Container utama untuk semua konten halaman
        ==========================================================================
        */
        
        .main-content {
    padding: 40px 32px;
    padding-top: 100px;   /* TAMBAHKAN INI - kasih ruang untuk top-bar */
    max-width: 1200px;
    margin: 0 auto;
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

        /* 
        ==========================================================================
        6. CONTACT GRID
        Layout 2 kolom untuk contact cards
        Menggunakan CSS Grid untuk responsive layout
        ==========================================================================
        */
        
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); /* Responsive grid */
            gap: 24px; /* Spacing antar card */
            margin-bottom: 32px;
        }

        /* 
        ==========================================================================
        7. CONTACT CARD
        Card untuk setiap section kontak (Phone, Email, Address, dll)
        Design: White background, shadow, rounded corners
        ==========================================================================
        */
        
        .contact-card {
            background-color: #FFFFFF;
            border-radius: 16px; /* Rounded corner lembut */
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06); /* Shadow lembut */
            transition: all 0.3s ease;
            position: relative; /* Untuk positioning tombol edit */
        }

        .contact-card:hover {
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1); /* Shadow lebih tebal saat hover */
            transform: translateY(-4px); /* Lift effect */
        }

        /* Header card dengan title & edit button */
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #F5F5F5; /* Divider line */
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #B33939; /* Warna merah */
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Icon di card title (SVG inline) */
        .card-title svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
        }

        /* Tombol edit di kanan atas card */
        .btn-edit {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #FFF3E0; /* Background kuning lembut */
            border: 1px solid #FFE0B2;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-edit:hover {
            background-color: #FFE0B2;
            transform: scale(1.1); /* Slightly bigger on hover */
        }

        .btn-edit img {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }

        /* 
        ==========================================================================
        8. FORM ELEMENTS
        Input fields & labels
        ==========================================================================
        */
        
        .input-group {
            margin-bottom: 16px;
        }

        .input-group:last-child {
            margin-bottom: 0; /* Hapus margin pada elemen terakhir */
        }

        .input-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }

        /* Input text field */
        .input-text {
            width: 100%;
            padding: 12px 16px;
            font-size: 14px;
            color: #333;
            border: 1.5px solid #E0E0E0;
            border-radius: 10px;
            background-color: #FAFAFA; /* Background abu sangat terang */
            transition: all 0.25s ease;
            font-family: inherit;
        }

        /* State saat input disabled (tidak bisa edit) */
        .input-text:disabled {
            background-color: #F5F5F5;
            color: #777;
            cursor: not-allowed;
        }

        /* State saat input aktif (focus) */
        .input-text:focus {
            outline: none;
            border-color: #B33939; /* Border merah saat focus */
            background-color: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(179, 57, 57, 0.1); /* Glow effect */
        }

        /* Textarea (untuk alamat) */
        textarea.input-text {
            resize: vertical; /* Hanya bisa resize vertical */
            min-height: 80px;
            line-height: 1.6;
        }

        /* 
        ==========================================================================
        9. OPERATIONAL HOURS
        Special layout untuk jam operasional dengan 2 time inputs per row
        ==========================================================================
        */
        
        .hours-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .hours-label {
            font-size: 13px;
            font-weight: 600;
            color: #555;
            min-width: 120px; /* Fixed width untuk alignment */
        }

        .time-inputs {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1; /* Take remaining space */
        }

        /* Input waktu (jam buka/tutup) */
        .input-time {
            flex: 1;
            padding: 10px 14px;
            font-size: 14px;
            color: #333;
            border: 1.5px solid #E0E0E0;
            border-radius: 10px;
            background-color: #FAFAFA;
            transition: all 0.25s ease;
            font-family: inherit;
            text-align: center; /* Center align text */
        }

        .input-time:disabled {
            background-color: #F5F5F5;
            color: #777;
            cursor: not-allowed;
        }

        .input-time:focus {
            outline: none;
            border-color: #B33939;
            background-color: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(179, 57, 57, 0.1);
        }

        /* Separator antara jam buka & tutup */
        .time-separator {
            font-size: 16px;
            color: #999;
            font-weight: 500;
        }

        /* 
        ==========================================================================
        10. SOCIAL MEDIA CARD
        Card khusus untuk media sosial dengan layout berbeda
        ==========================================================================
        */
        
        .social-card {
            background-color: #FFFBF0; /* Background kuning lembut */
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .social-card:hover {
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px);
        }

        /* Container untuk social media items */
        .social-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Single social media item */
        .social-item {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .social-item-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .social-icon {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        .social-name {
            font-size: 14px;
            font-weight: 600;
            color: #3E2723;
        }

        /* 
        ==========================================================================
        11. SAVE BUTTON
        Tombol simpan yang muncul saat ada perubahan
        ==========================================================================
        */
        
        .btn-save {
            display: none; /* Hidden by default */
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            background-color: #4CAF50; /* Hijau */
            border: none;
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.25s ease;
            margin-top: 8px;
        }

        /* Class untuk menampilkan tombol save */
        .btn-save.show {
            display: inline-flex;
        }

        .btn-save:hover {
            background-color: #45A049;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        .btn-save svg {
            width: 18px;
            height: 18px;
        }

        /* 
        ==========================================================================
        12. NOTIFICATION
        Toast notification untuk feedback user
        ==========================================================================
        */
        
        .notification {
            position: fixed;
            bottom: 32px;
            right: 32px;
            background-color: #4CAF50;
            color: #FFFFFF;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            display: none; /* Hidden by default */
            align-items: center;
            gap: 12px;
            z-index: 2000;
            animation: slideInUp 0.4s ease;
        }

        /* Class untuk menampilkan notification */
        .notification.show {
            display: flex;
        }

        @keyframes slideInUp {
            from {
                transform: translateY(100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .notification svg {
            width: 24px;
            height: 24px;
        }

        /* 
        ==========================================================================
        13. RESPONSIVE DESIGN
        Media queries untuk tablet & mobile
        ==========================================================================
        */
        
        @media (max-width: 768px) {
            /* Reduce padding pada mobile */
            .main-content {
                padding: 24px 16px;
            }

            .top-bar {
                padding: 12px 16px;
            }

            /* Stack grid menjadi 1 kolom pada mobile */
            .contact-grid {
                grid-template-columns: 1fr;
            }

            /* Reduce font size pada mobile */
            .page-header h1 {
                font-size: 24px;
            }

            /* Vertical layout untuk operational hours */
            .hours-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .hours-label {
                min-width: auto;
            }

            .time-inputs {
                width: 100%;
            }

            /* Hide logout text, show icon only */
            .btn-logout span {
                display: none;
            }

            /* Adjust notification position */
            .notification {
                bottom: 16px;
                right: 16px;
                left: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- 
    ==========================================================================
    TOP BAR
    Header atas dengan menu toggle button & logout button
    ==========================================================================
    -->
    <div class="top-bar">
        <div class="top-left">
            <!-- 
            Tombol hamburger menu
            Fungsi: Toggle sidebar open/close
            Event: Click → memanggil fungsi toggleSidebar()
            -->
            <button class="menu-button" id="menuButton" onclick="toggleSidebar()">
    <img src="{{ asset('images/icon/overview.png') }}" alt="Menu" class="menu-icon">
</button>
</div>
        <!-- 
        Tombol Keluar
        Fungsi: Logout dan redirect ke halaman login
        Event: Click → memanggil fungsi logout()
        -->
        <button type="submit" class="btn-logout">
                <img src="{{ asset('images/icon/logout merah.png') }}"
                     alt="Keluar"
                     class="btn-logout-icon">
                Keluar
            </button>
    </div>
    <!-- 
    ==========================================================================
    OVERLAY
    Background semi-transparan saat sidebar terbuka
    Fungsi: Memberikan focus pada sidebar & close sidebar saat diklik
    Event: Click → memanggil closeSidebar()
    ==========================================================================
    -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    <!-- 
    ==========================================================================
    SIDEBAR
    Menu navigasi admin
    Structure:
    - Header (Logo + Title)
    - Navigation Links (Overview, Menu, Galeri, Testimoni, Tentang, Kontak)
    ==========================================================================
    -->
    <aside class="sidebar" id="sidebar">
        <!-- Logo & Title -->
        <div class="sidebar-header">
    <div class="sidebar-logo">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo Waroenk Qu" class="sidebar-logo-icon">
        <span class="sidebar-logo-subtitle">Admin Panel</span>
    </div>
</div>

        <!-- Navigation Menu -->
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

            {{-- Link ke halaman kelola galeri --}}
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

            {{-- Link ke halaman kelola kontak --}}
            <a href="{{ route('admin.kontak') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/kontak hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Kontak</span>
            </a>
        </nav>
    </aside>

    <!-- 
    ==========================================================================
    MAIN CONTENT
    Konten utama halaman
    ==========================================================================
    -->
    <main class="main-content">
        <!-- 
        Page Header
        Berisi judul halaman & deskripsi singkat
        -->
        <div class="page-header">
            <h1>Kelola Kontak</h1>
            <p>Update informasi kontak dan media sosial</p>
        </div>

        <!-- 
        ==========================================================================
        CONTACT GRID
        Layout grid 2 kolom untuk contact cards
        ==========================================================================
        -->
        <div class="contact-grid">
            
            <!-- 
            ========================================
            CARD 1: NOMOR TELEPON
            Input untuk nomor telepon warung
            ========================================
            -->
            <div class="contact-card">
                <div class="card-header">
                    <div class="card-title">
                        <!-- Icon Telepon (SVG) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Nomor Telepon
                    </div>
                    <!-- 
                    Tombol Edit
                    Fungsi: Enable/disable input field
                    Event: Click → memanggil toggleEdit('phone')
                    -->
                    <button class="btn-edit" onclick="toggleEdit('phone')">
                        <img src="{{ asset('images/icon/edit.png') }}" alt="Edit">
                    </button>
                </div>

                <div class="input-group">
                    <label class="input-label">Telepon Warung</label>
                    <!-- 
                    Input telepon
                    - Disabled by default (read-only)
                    - Akan enabled saat tombol edit diklik
                    - Data attribute untuk tracking section
                    -->
                    <input 
                        type="tel" 
                        class="input-text" 
                        id="phone-input"
                        value="+62 859-2417-1803" 
                        disabled
                        data-section="phone"
                    >
                </div>

                <!-- 
                Tombol Save
                - Hidden by default
                - Muncul saat ada perubahan pada input
                - Fungsi: Simpan data ke backend
                -->
                <button class="btn-save" id="phone-save" onclick="saveChanges('phone')">
                    <!-- Icon Save (SVG) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan
                </button>
            </div>

            <!-- 
            ========================================
            CARD 2: EMAIL
            Input untuk email warung
            ========================================
            -->
            <div class="contact-card">
                <div class="card-header">
                    <div class="card-title">
                        <!-- Icon Email (SVG) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Email
                    </div>
                    <button class="btn-edit" onclick="toggleEdit('email')">
                        <img src="{{ asset('images/icon/edit.png') }}" alt="Edit">
                    </button>
                </div>

                <div class="input-group">
                    <label class="input-label">Email Warung</label>
                    <input 
                        type="email" 
                        class="input-text" 
                        id="email-input"
                        value="info@waroenkqu.com" 
                        disabled
                        data-section="email"
                    >
                </div>

                <button class="btn-save" id="email-save" onclick="saveChanges('email')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan
                </button>
            </div>

            <!-- 
            ========================================
            CARD 3: ALAMAT
            Textarea untuk alamat lengkap warung
            ========================================
            -->
            <div class="contact-card">
                <div class="card-header">
                    <div class="card-title">
                        <!-- Icon Lokasi (SVG) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Alamat
                    </div>
                    <button class="btn-edit" onclick="toggleEdit('address')">
                        <img src="{{ asset('images/icon/edit.png') }}" alt="Edit">
                    </button>
                </div>

                <div class="input-group">
                    <label class="input-label">Alamat Warung</label>
                    <!-- 
                    Textarea untuk alamat
                    Menggunakan textarea karena alamat bisa multi-line
                    -->
                    <textarea 
                        class="input-text" 
                        id="address-input"
                        disabled
                        data-section="address"
                    >Jl. Sukowiryo, Kec. Bondowoso
Bondowoso, Jawa Timur
Indonesia</textarea>
                </div>

                <button class="btn-save" id="address-save" onclick="saveChanges('address')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan
                </button>
            </div>

            <!-- 
            ========================================
            CARD 4: JAM OPERASIONAL
            Input untuk jam buka & tutup (2 periode)
            Layout: Day Label | Open Time - Close Time
            ========================================
            -->
            <div class="contact-card">
                <div class="card-header">
                    <div class="card-title">
                        <!-- Icon Jam/Clock (SVG) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Jam Operasional
                    </div>
                    <button class="btn-edit" onclick="toggleEdit('hours')">
                        <img src="{{ asset('images/icon/edit.png') }}" alt="Edit">
                    </button>
                </div>

                <!-- Senin - Jumat -->
                <div class="hours-row">
                    <div class="hours-label">Senin - Jumat</div>
                    <div class="time-inputs">
                        <input 
                            type="text" 
                            class="input-time" 
                            id="hours-weekday-open"
                            value="08.00" 
                            placeholder="HH.MM"
                            disabled
                            data-section="hours"
                        >
                        <span class="time-separator">-</span>
                        <input 
                            type="text" 
                            class="input-time" 
                            id="hours-weekday-close"
                            value="21.00" 
                            placeholder="HH.MM"
                            disabled
                            data-section="hours"
                        >
                    </div>
                </div>

                <!-- Sabtu - Minggu -->
                <div class="hours-row">
                    <div class="hours-label">Sabtu - Minggu</div>
                    <div class="time-inputs">
                        <input 
                            type="text" 
                            class="input-time" 
                            id="hours-weekend-open"
                            value="08.00" 
                            placeholder="HH.MM"
                            disabled
                            data-section="hours"
                        >
                        <span class="time-separator">-</span>
                        <input 
                            type="text" 
                            class="input-time" 
                            id="hours-weekend-close"
                            value="22.00" 
                            placeholder="HH.MM"
                            disabled
                            data-section="hours"
                        >
                    </div>
                </div>

                <button class="btn-save" id="hours-save" onclick="saveChanges('hours')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan
                </button>
            </div>

        </div>

        <!-- 
        ==========================================================================
        MEDIA SOSIAL CARD (Full Width)
        Card khusus untuk social media links dengan background berbeda
        ==========================================================================
        -->
        <div class="social-card">
            <div class="card-header">
                <div class="card-title">
                    <!-- Icon Social Media (SVG) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                    Media Sosial
                </div>
                <button class="btn-edit" onclick="toggleEdit('social')">
                    <img src="{{ asset('images/icon/edit.png') }}" alt="Edit">
                </button>
            </div>

            <div class="social-items">
                <!-- Facebook -->
                <div class="social-item">
                    <div class="social-item-header">
                        <img src="{{ asset('images/icon/facebook.png') }}" alt="Facebook">
                        class="social-icon"> 
                        <span class="social-name">Facebook</span>
                    </div>
                    <input 
                        type="url" 
                        class="input-text" 
                        id="social-facebook"
                        value="http://facebook.com/WaroenkQu" 
                        placeholder="https://facebook.com/..."
                        disabled
                        data-section="social"
                    >
                </div>

                <!-- Instagram -->
                <div class="social-item">
                    <div class="social-item-header">
                        <img src="{{ asset('images/icon/instagram.png') }}" alt="Instagram">
                        class="social-icon"> 
                        <span class="social-name">Instagram</span>
                    </div>
                    <input 
                        type="url" 
                        class="input-text" 
                        id="social-instagram"
                        value="http://instagram.com/waroenkqu_" 
                        placeholder="https://instagram.com/..."
                        disabled
                        data-section="social"
                    >
                </div>
            </div>

            <button class="btn-save" id="social-save" onclick="saveChanges('social')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Simpan
            </button>
        </div>

    </main>

    <!-- 
    ==========================================================================
    NOTIFICATION TOAST
    Toast notification untuk memberikan feedback ke user
    Muncul di pojok kanan bawah saat ada aksi (save, error, dll)
    ==========================================================================
    -->
    <div class="notification" id="notification">
        <!-- Icon Check (Success) -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span id="notification-text">Perubahan berhasil disimpan!</span>
    </div>

    <!-- 
    ==========================================================================
    JAVASCRIPT
    Semua logika interaktif halaman
    ==========================================================================
    -->
    <script>
        /* 
        ==========================================================================
        1. GLOBAL VARIABLES
        Variabel untuk menyimpan referensi elemen DOM
        ==========================================================================
        */
        
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const notification = document.getElementById('notification');
        const notificationText = document.getElementById('notification-text');

        /* 
        ==========================================================================
        2. SIDEBAR FUNCTIONS
        Fungsi untuk toggle, open, dan close sidebar
        ==========================================================================
        */
        
        /**
         * Toggle Sidebar
         * Fungsi: Membuka/menutup sidebar
         * Cara kerja:
         * - Toggle class 'sidebar--open' pada sidebar element
         * - Toggle class 'overlay--visible' pada overlay element
         * - Class ini akan trigger CSS transition untuk smooth animation
         */
        function toggleSidebar() {
            sidebar.classList.toggle('sidebar--open');
            overlay.classList.toggle('overlay--visible');
        }

        /**
         * Close Sidebar
         * Fungsi: Menutup sidebar (dipanggil saat overlay diklik)
         * Cara kerja:
         * - Remove class 'sidebar--open' dari sidebar
         * - Remove class 'overlay--visible' dari overlay
         * - Sidebar akan slide out ke kiri dan overlay akan fade out
         */
        function closeSidebar() {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        }

        /* 
        ==========================================================================
        3. EDIT FUNCTIONS
        Fungsi untuk enable/disable input fields
        ==========================================================================
        */
        
        /**
         * Toggle Edit Mode
         * Fungsi: Enable/disable input fields pada section tertentu
         * Parameter: section - nama section yang akan di-edit (phone, email, address, hours, social)
         * Cara kerja:
         * 1. Query semua input yang memiliki data-section attribute sesuai parameter
         * 2. Loop semua input dan toggle disabled attribute
         * 3. Jika input di-enable, focus ke input pertama untuk UX yang lebih baik
         * 4. Attach event listener untuk detect perubahan nilai
         */
        function toggleEdit(section) {
            // Query all inputs dalam section ini
            const inputs = document.querySelectorAll(`[data-section="${section}"]`);
            
            // Loop dan toggle disabled state
            inputs.forEach((input, index) => {
                input.disabled = !input.disabled;
                
                // Focus ke input pertama saat enabled
                if (!input.disabled && index === 0) {
                    input.focus();
                    // Select text untuk memudahkan edit
                    if (input.type !== 'textarea') {
                        input.select();
                    }
                }
                
                // Attach event listener untuk detect perubahan
                if (!input.disabled) {
                    input.addEventListener('input', () => showSaveButton(section));
                }
            });
        }

        /* 
        ==========================================================================
        4. SAVE BUTTON FUNCTIONS
        Fungsi untuk menampilkan tombol save saat ada perubahan
        ==========================================================================
        */
        
        /**
         * Show Save Button
         * Fungsi: Menampilkan tombol save pada section tertentu
         * Parameter: section - nama section
         * Cara kerja:
         * 1. Get element tombol save berdasarkan ID (format: {section}-save)
         * 2. Add class 'show' untuk menampilkan tombol (CSS: display: inline-flex)
         * 3. Tombol akan muncul dengan smooth animation (CSS transition)
         */
        function showSaveButton(section) {
            const saveBtn = document.getElementById(`${section}-save`);
            if (saveBtn) {
                saveBtn.classList.add('show');
            }
        }

        /**
         * Hide Save Button
         * Fungsi: Menyembunyikan tombol save
         * Parameter: section - nama section
         */
        function hideSaveButton(section) {
            const saveBtn = document.getElementById(`${section}-save`);
            if (saveBtn) {
                saveBtn.classList.remove('show');
            }
        }

        /* 
        ==========================================================================
        5. SAVE CHANGES FUNCTION
        Fungsi utama untuk menyimpan perubahan
        ==========================================================================
        */
        
        /**
         * Save Changes
         * Fungsi: Menyimpan perubahan data ke backend (saat ini hanya simulasi)
         * Parameter: section - nama section yang akan disimpan
         * Cara kerja:
         * 1. Collect semua data dari input dalam section tersebut
         * 2. Validasi data (format, required fields, dll)
         * 3. Kirim data ke backend via AJAX/Fetch (TODO: implementasi backend)
         * 4. Disable input kembali (exit edit mode)
         * 5. Hide tombol save
         * 6. Show notification success
         * 
         * TODO:
         * - Implementasi AJAX request ke backend Laravel
         * - Handle error response dari server
         * - Add loading state saat request
         */
        function saveChanges(section) {
            // Collect data dari semua input dalam section
            const inputs = document.querySelectorAll(`[data-section="${section}"]`);
            const data = {};
            
            inputs.forEach(input => {
                // Get input ID sebagai key
                const key = input.id;
                const value = input.value.trim();
                
                // Validasi: check jika value kosong
                if (!value) {
                    showNotification('Semua field harus diisi!', 'error');
                    return;
                }
                
                // Tambahkan ke data object
                data[key] = value;
            });
            
            // Log data (untuk debugging)
            console.log('Saving data:', data);
            
            // TODO: Send data to backend
            // Example:
            // fetch('/api/contact/update', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //     },
            //     body: JSON.stringify(data)
            // })
            // .then(response => response.json())
            // .then(result => {
            //     if (result.success) {
            //         showNotification('Data berhasil disimpan!', 'success');
            //     }
            // })
            // .catch(error => {
            //     showNotification('Gagal menyimpan data!', 'error');
            // });
            
            // Simulasi saving (karena belum ada backend)
            setTimeout(() => {
                // Disable semua input kembali (exit edit mode)
                inputs.forEach(input => {
                    input.disabled = true;
                });
                
                // Hide tombol save
                hideSaveButton(section);
                
                // Show success notification
                showNotification('Perubahan berhasil disimpan!', 'success');
            }, 500);
        }

        /* 
        ==========================================================================
        6. NOTIFICATION FUNCTIONS
        Fungsi untuk menampilkan toast notification
        ==========================================================================
        */
        
        /**
         * Show Notification
         * Fungsi: Menampilkan toast notification
         * Parameter: 
         * - message: teks yang akan ditampilkan
         * - type: 'success' atau 'error' (optional, default: 'success')
         * Cara kerja:
         * 1. Set text notification
         * 2. Set background color sesuai type
         * 3. Add class 'show' untuk menampilkan notification
         * 4. Auto hide setelah 3 detik
         * 5. Menggunakan CSS animation untuk smooth slide in/out
         */
        function showNotification(message, type = 'success') {
            // Set notification text
            notificationText.textContent = message;
            
            // Set background color sesuai type
            if (type === 'error') {
                notification.style.backgroundColor = '#f44336'; // Red
            } else {
                notification.style.backgroundColor = '#4CAF50'; // Green
            }
            
            // Show notification
            notification.classList.add('show');
            
            // Auto hide setelah 3 detik
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }

        /* 
        ==========================================================================
        7. LOGOUT FUNCTION
        Fungsi untuk logout dan redirect ke login page
        ==========================================================================
        */
        
        /**
         * Logout
         * Fungsi: Logout admin dan redirect ke halaman login
         * Cara kerja:
         * 1. Show confirmation dialog untuk keamanan
         * 2. Jika user confirm, redirect ke halaman login
         * 3. Clear session/local storage (TODO: implementasi)
         * 
         * TODO:
         * - Clear authentication token dari localStorage/sessionStorage
         * - Call logout API endpoint untuk invalidate session di server
         * - Handle error jika logout gagal
         */
        function logout() {
            // Confirmation dialog
            const confirmed = confirm('Apakah Anda yakin ingin keluar?');
            
            if (confirmed) {
                // TODO: Clear authentication
                // localStorage.removeItem('authToken');
                // sessionStorage.clear();
                
                // TODO: Call logout API
                // fetch('/api/logout', { method: 'POST' })
                
                // Redirect ke halaman login
                window.location.href = 'login.html';
            }
        }

        /* 
        ==========================================================================
        8. INPUT VALIDATION
        Validasi format input untuk mencegah data tidak valid
        ==========================================================================
        */
        
        /**
         * Validate Time Format
         * Fungsi: Validasi format waktu (HH.MM)
         * Parameter: timeString - string waktu yang akan divalidasi
         * Return: true jika valid, false jika tidak
         * Format yang diterima: 08.00, 21.00, dll (HH.MM dengan leading zero)
         */
        function validateTimeFormat(timeString) {
            // Regex pattern untuk format HH.MM
            const timePattern = /^([0-1][0-9]|2[0-3])\.[0-5][0-9]$/;
            return timePattern.test(timeString);
        }

        /**
         * Validate Email Format
         * Fungsi: Validasi format email
         * Parameter: email - string email yang akan divalidasi
         * Return: true jika valid, false jika tidak
         */
        function validateEmailFormat(email) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        /**
         * Validate Phone Format
         * Fungsi: Validasi format nomor telepon
         * Parameter: phone - string nomor telepon yang akan divalidasi
         * Return: true jika valid, false jika tidak
         */
        function validatePhoneFormat(phone) {
            // Accept formats: +62xxx, 08xxx, atau dengan dash/space
            const phonePattern = /^(\+62|0)[0-9\s\-]+$/;
            return phonePattern.test(phone);
        }

        /* 
        ==========================================================================
        9. EVENT LISTENERS
        Setup event listeners untuk interaksi user
        ==========================================================================
        */
        
        /**
         * Document Ready
         * Fungsi: Initialization saat halaman selesai dimuat
         * Cara kerja:
         * 1. Setup event listener untuk keyboard shortcuts (ESC untuk tutup sidebar)
         * 2. Attach auto-validation pada input fields
         * 3. Setup auto-save functionality (optional)
         */
        document.addEventListener('DOMContentLoaded', function() {
            // Keyboard shortcut: ESC untuk tutup sidebar
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidebar.classList.contains('sidebar--open')) {
                    closeSidebar();
                }
            });
            
            // Real-time validation untuk time inputs
            const timeInputs = document.querySelectorAll('.input-time');
            timeInputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (!this.disabled && this.value) {
                        if (!validateTimeFormat(this.value)) {
                            showNotification('Format waktu harus HH.MM (contoh: 08.00)', 'error');
                            this.focus();
                        }
                    }
                });
            });
            
            // Real-time validation untuk email
            const emailInput = document.getElementById('email-input');
            emailInput.addEventListener('blur', function() {
                if (!this.disabled && this.value) {
                    if (!validateEmailFormat(this.value)) {
                        showNotification('Format email tidak valid!', 'error');
                        this.focus();
                    }
                }
            });
            
            // Real-time validation untuk phone
            const phoneInput = document.getElementById('phone-input');
            phoneInput.addEventListener('blur', function() {
                if (!this.disabled && this.value) {
                    if (!validatePhoneFormat(this.value)) {
                        showNotification('Format nomor telepon tidak valid!', 'error');
                        this.focus();
                    }
                }
            });
            
            console.log('Kelola Kontak page initialized successfully!');
        });

        /* 
        ==========================================================================
        10. UTILITY FUNCTIONS
        Helper functions untuk keperluan umum
        ==========================================================================
        */
        
        /**
         * Format Phone Number
         * Fungsi: Format nomor telepon ke format standar
         * Parameter: phone - nomor telepon yang akan diformat
         * Return: formatted phone number
         * Example: 6285924171803 → +62 859-2417-1803
         */
        function formatPhoneNumber(phone) {
            // Remove all non-digit characters
            const cleaned = phone.replace(/\D/g, '');
            
            // Format: +XX XXX-XXXX-XXXX
            if (cleaned.startsWith('62')) {
                return '+62 ' + cleaned.slice(2, 5) + '-' + cleaned.slice(5, 9) + '-' + cleaned.slice(9);
            } else if (cleaned.startsWith('0')) {
                return '+62 ' + cleaned.slice(1, 4) + '-' + cleaned.slice(4, 8) + '-' + cleaned.slice(8);
            }
            
            return phone;
        }

        /**
         * Validate URL Format
         * Fungsi: Validasi format URL untuk social media links
         * Parameter: url - URL yang akan divalidasi
         * Return: true jika valid, false jika tidak
         */
        function validateURLFormat(url) {
            try {
                new URL(url);
                return true;
            } catch (e) {
                return false;
            }
        }

        /* 
        ==========================================================================
        11. PERFORMANCE OPTIMIZATION
        Debounce function untuk optimize event listener
        ==========================================================================
        */
        
        /**
         * Debounce Function
         * Fungsi: Delay eksekusi function hingga user selesai typing
         * Parameter:
         * - func: function yang akan di-debounce
         * - wait: delay time dalam milliseconds
         * Return: debounced function
         * Use case: Prevent too many API calls saat user typing
         */
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        /* 
        ==========================================================================
        END OF JAVASCRIPT
        ==========================================================================
        */
    </script>

</body>
</html>