<header class="header">
    <div class="header-content">
        <div class="logo-section">
            <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 16px; text-decoration: none;">
                <!-- LOGO IMAGE -->
                <img src="{{ asset('images/logo.png') }}" 
                     
                
                <!-- TEXT dengan warna sesuai logo -->
                <div class="brand-name">
                   
                </div>
            </a>
        </div>
        
        <nav class="header-nav">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Beranda
            </a>
            <a href="{{ route('menu') }}" class="nav-link {{ request()->routeIs('menu*') ? 'active' : '' }}">
                Menu
            </a>
            <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                Galeri
            </a>
            <a href="{{ route('testimonial') }}" class="nav-link {{ request()->routeIs('testimonial') ? 'active' : '' }}">
                Testimoni
            </a>
             <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                Tentang
            </a>
            <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                Kontak
            </a>
        </nav>
    </div>
</header>