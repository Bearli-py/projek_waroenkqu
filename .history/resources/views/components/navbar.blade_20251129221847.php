{{-- 
KOTAK MENU NAVIGASI
Ini tempat semua link menu (Beranda, Galeri, Menu, dll).
Tag <nav> = khusus buat navigasi website
Kalau dihapus: Menu navigasi hilang semua
--}}
<nav class="navbar">
    {{-- 
    DAFTAR MENU (LIST)
    <ul> = unordered list (daftar tanpa nomor)
    <li> = list item (item dalam daftar)
    Pakai flexbox biar menunya sejajar horizontal (kiri ke kanan)
    Kalau dihapus: Menu jadi susun kebawah (vertikal) dan berantakan
    --}}
    <ul class="nav-list">
        {{-- 
        MENU BERANDA
        Link ke halaman home (beranda).
        route('home') = link otomatis dari Laravel (gak perlu tulis /home manual)
        request()->routeIs('home') = cek apakah lagi di halaman home
        ? 'active' : '' = kalau iya, kasih class "active" (warna merah)
        Kalau dihapus: Pengunjung gak bisa ke halaman beranda
        --}}
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Beranda
            </a>
        </li>
        
        {{-- MENU GALERI (logika sama kayak beranda) --}}
        <li class="nav-item">
            <a href="{{ route('galeri') }}" class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}">
                Galeri
            </a>
        </li>
        
        {{-- MENU MENU (ya menu buat lihat menu makanan) --}}
        <li class="nav-item">
            <a href="{{ route('menu') }}" class="nav-link {{ request()->routeIs('menu') ? 'active' : '' }}">
                Menu
            </a>
        </li>
        
        {{-- MENU TESTIMONI --}}
        <li class="nav-item">
            <a href="{{ route('testimoni') }}" class="nav-link {{ request()->routeIs('testimoni') ? 'active' : '' }}">
                Testimoni
            </a>
        </li>
        
        {{-- MENU KONTAK --}}
        <li class="nav-item">
            <a href="{{ route('kontak') }}" class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}">
                Kontak
            </a>
        </li>
        
        {{-- MENU TENTANG --}}
        <li class="nav-item">
            <a href="{{ route('tentang') }}" class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">
                Tentang
            </a>
        </li>
    </ul>
</nav>
