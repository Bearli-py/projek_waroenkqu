{{-- 
KOTAK PEMBUNGKUS HEADER
Ini wadah buat seluruh bagian header (logo + menu).
Tag <header> = khusus buat bagian atas website
Kalau dihapus: Header gak punya background dan gak nempel di atas
--}}
<header class="header">
    {{-- 
    CONTAINER (PEMBATAS LEBAR)
    Biar konten gak melebar kemana-mana. Ada batas lebarnya.
    Kayak bingkai foto yang bikin rapi.
    Kalau dihapus: Logo dan menu nyebar ke kanan kiri layar (jelek)
    --}}
    <div class="container">
        {{-- 
        ISI HEADER
        Ini yang atur logo dan menu biar sejajar (kiri-kanan).
        Pakai flexbox = sistem layout yang bikin mudah atur posisi
        Kalau dihapus: Logo dan menu jadi berantakan susunnya
        --}}
        <div class="header-content">
            {{-- 
            LOGO WARUNG
            Logo warung yang bisa diklik buat balik ke halaman beranda.
            route('home') = link ke halaman home (otomatis dari Laravel)
            asset('images/logo.png') = panggil gambar logo dari folder public
            Kalau dihapus: Gak ada branding warung & gak bisa klik logo
            --}}
            <a href="{{ route('home') }}" class="logo-link">
                <img src="{{ asset('images/logo/logo.png') }}" alt="Logo Waroenk Qu" class="logo">
            </a>
            
            {{-- 
            MENU NAVIGASI
            Ini bagian menu (Beranda, Galeri, Menu, dll).
            @include = panggil file navbar dari components/navbar.blade.php
            Kalau dihapus: Pengunjung gak bisa navigasi kemana-mana
            --}}
            @include('components.navbar')
            
            {{-- 
            TOMBOL HAMBURGER (KHUSUS MOBILE)
            Icon 3 garis buat buka menu di HP.
            Cuma muncul di layar kecil (HP), di desktop gak keliatan.
            3 <span> = 3 garis horizontal
            Kalau dihapus: Di HP menu gak bisa dibuka
            --}}
            <button class="mobile-menu-toggle" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>