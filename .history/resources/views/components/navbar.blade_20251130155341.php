{{-- 
NAVIGATION WRAPPER
Fungsi: Container navigasi utama dengan list menu
Elemen: Nav tag dengan ul list
Jika dihapus: Menu navigasi tidak ada
--}}
<nav class="navbar">
    {{-- 
    NAVIGATION LIST
    Fungsi: List menu navigasi dengan flexbox horizontal
    Elemen: ul > li untuk setiap menu item
    Jika dihapus: Menu tidak tertata rapi
    --}}
    <ul class="nav-list">
        {{-- 
        MENU ITEM - BERANDA
        Fungsi: Link ke halaman home
        Elemen: li dengan link, class active jika di halaman home
        Jika dihapus: User tidak bisa ke halaman beranda
        --}}
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Beranda
            </a>
        </li>
        
        {{-- MENU ITEM - GALERI --}}
        <li class="nav-item">
            <a href="{{ route('galeri') }}" class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}">
                Galeri
            </a>
        </li>
        
        {{-- MENU ITEM - MENU --}}
        <li class="nav-item">
            <a href="{{ route('menu') }}" class="nav-link {{ request()->routeIs('menu') ? 'active' : '' }}">
                Menu
            </a>
        </li>
        
        {{-- MENU ITEM - TESTIMONI --}}
        <li class="nav-item">
            <a href="{{ route('testimoni') }}" class="nav-link {{ request()->routeIs('testimoni') ? 'active' : '' }}">
                Testimoni
            </a>
        </li>
        
        {{-- MENU ITEM - KONTAK --}}
        <li class="nav-item">
            <a href="{{ route('kontak') }}" class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}">
                Kontak
            </a>
        </li>
        
        {{-- MENU ITEM - TENTANG --}}
        <li class="nav-item">
            <a href="{{ route('tentang') }}" class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">
                Tentang
            </a>
        </li>
    </ul>
</nav>