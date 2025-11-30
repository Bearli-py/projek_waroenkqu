{{-- 
HEADER WRAPPER
Fungsi: Container utama header dengan background & shadow
Elemen: Header tag HTML5 dengan class header
Jika dihapus: Header tidak memiliki styling & positioning
--}}
<header class="header">
    {{-- 
    CONTAINER
    Fungsi: Membatasi lebar konten dan center alignment
    Elemen: Div container yang mengatur max-width
    Jika dihapus: Konten header melebar ke seluruh layar (tidak rapi)
    --}}
    <div class="container">
        {{-- 
        HEADER CONTENT
        Fungsi: Flexbox container untuk logo dan navbar
        Elemen: Div dengan display flex untuk align items
        Jika dihapus: Logo dan navbar tidak sejajar horizontal
        --}}
        <div class="header-content">
            {{-- 
            LOGO SECTION
            Fungsi: Menampilkan logo warung dan link ke homepage
            Elemen: Link wrapper dengan img logo dari public/images/logo
            Jika dihapus: User tidak bisa klik logo untuk kembali ke home
            --}}
            <a href="{{ route('home') }}" class="logo-link">
                <img src="{{ asset('images/logo/logo.png') }}" alt="Logo Waroenk Qu" class="logo">
            </a>
            
            {{-- 
            NAVBAR COMPONENT
            Fungsi: Menampilkan menu navigasi utama
            Elemen: Include navbar dari components/navbar.blade.php
            Jika dihapus: User tidak bisa akses menu navigasi
            --}}
            @include('components.navbar')
            
            {{-- 
            MOBILE MENU TOGGLE
            Fungsi: Button hamburger untuk buka/tutup menu di mobile
            Elemen: Button dengan icon hamburger (3 garis)
            Jika dihapus: Menu mobile tidak bisa dibuka
            --}}
            <button class="mobile-menu-toggle" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>
