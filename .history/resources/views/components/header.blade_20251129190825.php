<!-- 
    HEADER / NAVIGATION BAR
    Fungsi: Menu navigasi utama website
    Jika dihapus: User tidak bisa navigasi antar halaman
-->
<header class="header">
    <!-- 
        CONTAINER
        Fungsi: Membatasi lebar konten dan center positioning
        Jika dihapus: Konten akan full width tidak terkontrol
    -->
    <div class="header-container">
        
        <!-- 
            LOGO SECTION
            Fungsi: Menampilkan logo dan nama warung
            Jika dihapus: Header tidak ada branding
        -->
        <div class="logo">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Waroenk Qu Logo" class="logo-img">
            <div class="logo-text">
                <!-- 
                    LOGO TEXT
                    Fungsi: Nama warung dengan styling khusus
                    .waroenk dan .qu dipisah untuk bisa styling warna berbeda
                -->
                <h1>
                    <span class="waroenk">WAROENK</span>
                    <span class="qu">QU</span>
                </h1>
            </div>
        </div>
        
        <!-- 
            NAVIGATION MENU
            Fungsi: Menu navigasi ke halaman-halaman utama
            Jika dihapus: User tidak bisa pindah halaman
        -->
        <nav class="nav">
            <!-- 
                NAV LINKS
                Fungsi: Link ke setiap halaman
                class="active" akan otomatis ditambahkan oleh JavaScript di halaman aktif
                Hover effect: Text berubah merah (#B33939)
            -->
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Beranda
            </a>
            <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                Galeri
            </a>
            <a href="{{ route('menu') }}" class="nav-link {{ request()->routeIs('menu') ? 'active' : '' }}">
                Menu
            </a>
            <a href="{{ route('testimonial') }}" class="nav-link {{ request()->routeIs('testimonial') ? 'active' : '' }}">
                Testimoni
            </a>
            <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                Kontak
            </a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                Tentang
            </a>
        </nav>
        
        <!-- 
            MOBILE MENU TOGGLE (untuk responsive)
            Fungsi: Tombol burger menu di mobile
            Jika dihapus: Menu tidak bisa dibuka di mobile
        -->
        <button class="mobile-menu-toggle" aria-label="Toggle Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
    </div>
</header>