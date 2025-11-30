<header class="header">
    <div class="header-content">
        <div class="logo-section">
            <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 16px; text-decoration: none;">
                <!-- LOGO IMAGE -->
                <img src="{{ asset('public/images/logo.png') }}" 
                     alt="Waroenk Qu Logo" 
                     style="height: 60px; width: auto; transition: transform 0.3s ease;"
                     onmouseover="this.style.transform='scale(1.1) rotate(5deg)'"
                     onmouseout="this.style.transform='scale(1) rotate(0deg)'">
                
        
        <!-- URUTAN BARU: Beranda, Galeri, Menu, Testimoni, Kontak, Tentang -->
        <nav class="header-nav">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Beranda
            </a>
            <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                Galeri
            </a>
            <a href="{{ route('menu') }}" class="nav-link {{ request()->routeIs('menu*') ? 'active' : '' }}">
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
    </div>
</header>