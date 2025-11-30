<header class="header">
    <div class="header-content">
        <div class="logo-section">
            <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 16px; text-decoration: none;">
                <!-- LOGO IMAGE -->
                <img src="{{ asset('images/logo.png') }}" 
                     alt="Waroenk Qu Logo" 
                     style="height: 60px; width: auto; transition: transform 0.3s ease;"
                     onmouseover="this.style.transform='scale(1.1) rotate(5deg)'"
                     onmouseout="this.style.transform='scale(1) rotate(0deg)'">
                
                <!-- TEXT dengan warna sesuai logo -->
                <div class="brand-name">
                    <h1 style="font-family: 'Poppins', sans-serif; font-size: 28px; font-weight: 800; margin: 0; letter-spacing: -0.5px;">
                        <span style="color: #595959;">Waroenk</span> 
                        <span style="color: #E96C3A;">Qu</span>
                    </h1>
                </div>
            </a>
        </div>
        
        <!-- URUTAN BARU: Beranda, Galeri, Menu, Testimoni, Kontak, Tentang -->
        <nav class="header-nav">
            <a href="{{ route('beranda') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Beranda
            </a>
            <a href="{{ route('galeri') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                Galeri
            </a>
            <a href="{{ route('menu') }}" class="nav-link {{ request()->routeIs('menu*') ? 'active' : '' }}">
                Menu
            </a>
            <a href="{{ route('testimoni') }}" class="nav-link {{ request()->routeIs('testimonial') ? 'active' : '' }}">
                Testimoni
            </a>
            <a href="{{ route('kontak') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                Kontak
            </a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                Tentang
            </a>
        </nav>
    </div>
</header>