{{-- 
EXTENDS LAYOUT
Halaman home pakai template dari layouts/app.blade.php
Jadi gak perlu tulis <html>, <head>, <body> lagi.
Kalau dihapus: Halaman gak punya struktur HTML dan header/footer hilang
--}}
@extends('layouts.app')

{{-- 
JUDUL TAB BROWSER
Ini judul yang muncul di tab browser
Kalau dihapus: Judul jadi default "Waroenk Qu - Cita Rasa Autentik"
--}}
@section('title', 'Beranda - Waroenk Qu')

{{-- KONTEN HALAMAN --}}
@section('content')

{{-- 
=================================
SECTION 1: HERO (BANNER UTAMA)
=================================
Background: Foto suasana warung (dalam1.png)
Overlay gelap biar text jelas
REVISI: Judul & tagline di KIRI, button hover kuning & blur
--}}
<section class="hero">
    {{-- 
    OVERLAY GELAP
    Lapisan hitam semi-transparan (opacity 50%) biar text keliatan.
    Tanpa ini text tenggelam sama background foto.
    Kalau dihapus: Text susah dibaca
    --}}
    <div class="hero-overlay"></div>
    
    {{-- CONTAINER --}}
    <div class="container">
        {{-- 
        ISI HERO - TEXT KIRI (REVISI)
        Class "text-left" bikin semua konten rata kiri (bukan center)
        Class ini penting! Kalau dihapus, text balik ke tengah
        --}}
        <div class="hero-content text-left">
            {{-- 
            JUDUL UTAMA
            Font besar Playfair Display, warna putih
            Kalau dihapus: Gak ada judul utama di hero
            --}}
            <h1 class="hero-title">Cita Rasa Autentik, Suasana Asik</h1>
            
            {{-- 
            TAGLINE
            Font Poppins, warna putih, ukuran sedang
            Kalau dihapus: Gak ada penjelasan singkat tentang warung
            --}}
            <p class="hero-subtitle">Sajian Nusantara yang khas, hadir untuk Anda di tengah kehangatan suasana yang tak terlupakan.</p>
            
            {{-- 
            2 TOMBOL CTA
            REVISI: 
            - btn-yellow-hover = hover jadi kuning dengan text hitam
            - btn-blur-hover = hover jadi transparan blur dengan text putih
            Class ini penting! Kalau dihapus, efek hover jadi default (merah gelap)
            --}}
            <div class="hero-buttons">
                {{-- 
                TOMBOL LIHAT MENU
                Class: btn btn-primary btn-yellow-hover
                Hover: background kuning (#F2C94C), text hitam
                --}}
                <a href="{{ route('menu') }}" class="btn btn-primary btn-yellow-hover">Lihat Menu</a>
                
                {{-- 
                TOMBOL HUBUNGI KAMI
                Class: btn btn-secondary btn-blur-hover
                Hover: background transparan blur, text putih
                --}}
                <a href="{{ route('kontak') }}" class="btn btn-secondary btn-blur-hover">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 2: MENU ANDALAN KAMI
=================================
REVISI TOTAL: Nama & harga di LUAR kotak, kotak cuma foto
Structure baru: .menu-card-featured-new > .menu-image-box + .menu-name-outside + .menu-price-outside
--}}
<section class="featured-menu">
    <div class="container">
        {{-- JUDUL SECTION --}}
        <h2 class="section-title text-center">Menu Andalan Kami</h2>
        
        {{-- 
        GRID 4 MENU
        Desktop: 4 kolom, Tablet: 2 kolom, Mobile: 1 kolom
        --}}
        <div class="menu-grid-featured">
            
            {{-- 
            MENU 1: NASI RAWON
            Class baru: .menu-card-featured-new (bukan .menu-card-featured)
            Struktur: kotak foto terpisah dari nama & harga
            --}}
            <div class="menu-card-featured-new">
                {{-- 
                KOTAK FOTO (BORDER BIRU)
                Cuma berisi foto aja, tanpa text
                Border biru #4A90E2 sesuai desain
                Hover: kotak naik + shadow biru
                Kalau dihapus: Foto gak punya border dan layout berantakan
                --}}
                <div class="menu-image-box">
                    <img src="{{ asset('images/menu/rawon.png') }}" alt="Nasi Rawon" class="menu-image">
                </div>
                {{-- 
                NAMA MENU - DI LUAR KOTAK
                Class: .menu-name-outside (bukan .menu-name)
                Font Poppins, ukuran 18px, warna hitam
                Margin-top 15px dari kotak foto
                Kalau dihapus: Gak ada nama menu
                --}}
                <h3 class="menu-name-outside">Nasi Rawon</h3>
                {{-- 
                HARGA - DI LUAR KOTAK
                Class: .menu-price-outside (bukan .menu-price)
                Font Poppins, ukuran 16px, warna merah #B33939
                Kalau dihapus: Gak ada harga
                --}}
                <p class="menu-price-outside">Rp 18.000</p>
            </div>
            
            {{-- MENU 2: NASI GORENG (struktur sama) --}}
            <div class="menu-card-featured-new">
                <div class="menu-image-box">
                    <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Nasi Goreng" class="menu-image">
                </div>
                <h3 class="menu-name-outside">Nasi Goreng</h3>
                <p class="menu-price-outside">Rp 12.000</p>
            </div>
            
            {{-- MENU 3: MIE GORENG JAWA --}}
            <div class="menu-card-featured-new">
                <div class="menu-image-box">
                    <img src="{{ asset('images/menu/mie goreng.png') }}" alt="Mie Goreng Jawa" class="menu-image">
                </div>
                <h3 class="menu-name-outside">Mie Goreng Jawa</h3>
                <p class="menu-price-outside">Rp 12.000</p>
            </div>
            
            {{-- MENU 4: SOTO AYAM --}}
            <div class="menu-card-featured-new">
                <div class="menu-image-box">
                    <img src="{{ asset('images/menu/soto ayam.png') }}" alt="Soto Ayam" class="menu-image">
                </div>
                <h3 class="menu-name-outside">Soto Ayam</h3>
                <p class="menu-price-outside">Rp 12.000</p>
            </div>
            
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 3: CERITA DI BALIK DAPUR KAMI
=================================
Layout 2 kolom: TEXT KIRI, FOTO KANAN
REVISI: 
- Class .about-preview-new (background #FFF8E1, beda dari warna dasar)
- Button hover kuning dengan text hitam
--}}
<section class="about-preview-new">
    <div class="container">
        {{-- 
        WRAPPER 2 KOLOM
        Flexbox: kiri text, kanan foto
        Di mobile: susun kebawah (text dulu, baru foto)
        --}}
        <div class="about-wrapper">
            {{-- 
            KOLOM KIRI: TEXT
            Judul + paragraf + tombol
            Order: 1 (di desktop muncul dulu)
            --}}
            <div class="about-text">
                {{-- 
                JUDUL SECTION
                Font Playfair Display, warna hitam
                --}}
                <h2 class="section-title">Cerita di Balik Dapur Kami</h2>
                
                {{-- 
                TEXT CERITA
                Font Poppins, line-height 1.8
                --}}
                <p class="section-description">
                    Waroenk Qu hadir untuk menghadirkan cita rasa kuliner khas yang autentik, nikmat, dan terjangkau bagi semua kalangan. Terinspirasi dari kelezatan masakan rumahan yang selalu menggugah selera.
                </p>
                
                {{-- 
                TOMBOL BACA SELENGKAPNYA
                Class: btn btn-primary btn-yellow-hover
                REVISI: Hover jadi kuning (#F2C94C) dengan text hitam
                Kalau class btn-yellow-hover dihapus: Hover jadi merah gelap (default)
                --}}
                <a href="{{ route('tentang') }}" class="btn btn-primary btn-yellow-hover">Baca Selengkapnya</a>
            </div>
            
            {{-- 
            KOLOM KANAN: FOTO WARUNG
            Foto suasana luar warung (luar-sore.png)
            Order: 2 (di desktop muncul kedua)
            --}}
            <div class="about-image">
                <img src="{{ asset('images/warung/luar-sore.png') }}" alt="Waroenk Qu" class="about-img">
            </div>
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 4: APA YANG KAMI YAKINI
=================================
3 kotak value/keunggulan warung
Hover: border merah muncul + kotak naik sedikit
TIDAK ADA REVISI (tetap sama)
--}}
<section class="values">
    <div class="container">
        {{-- JUDUL SECTION --}}
        <h2 class="section-title text-center">Apa yang Kami Yakini</h2>
        
        {{-- 
        GRID 3 KOTAK
        Desktop: 3 kolom, Tablet: 2 kolom, Mobile: 1 kolom
        --}}
        <div class="values-grid">
            
            {{-- KOTAK 1: BAHAN MAKANAN BERKUALITAS --}}
            <div class="value-card">
                {{-- 
                ICON
                Ukuran 70x70px, center
                --}}
                <img src="{{ asset('images/icon/bahan makanan.png') }}" alt="Bahan Berkualitas" class="value-icon">
                {{-- JUDUL --}}
                <h3 class="value-title">Bahan Makanan Berkualitas</h3>
                {{-- DESKRIPSI --}}
                <p class="value-description">Kami hanya menggunakan bahan-bahan segar dan berkualitas tinggi untuk setiap hidangan.</p>
            </div>
            
            {{-- KOTAK 2: PELAYANAN RAMAH --}}
            <div class="value-card">
                <img src="{{ asset('images/icon/pelayanan.png') }}" alt="Pelayanan Ramah" class="value-icon">
                <h3 class="value-title">Pelayanan Ramah</h3>
                <p class="value-description">Tim kami siap melayani Anda dengan senyuman dan keramahan yang tulus.</p>
            </div>
            
            {{-- KOTAK 3: KUALITAS RASA TERJAMIN --}}
            <div class="value-card">
                <img src="{{ asset('images/icon/kualitas rasa.png') }}" alt="Kualitas Rasa" class="value-icon">
                <h3 class="value-title">Kualitas Rasa Terjamin</h3>
                <p class="value-description">Setiap hidangan dibuat dengan resep rahasia yang menghasilkan cita rasa istimewa.</p>
            </div>
            
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 5: APA KATA MEREKA (TESTIMONI)
=================================
3 testimoni pelanggan dengan foto user
Hover: kotak zoom sedikit (scale 1.05, natural)
TIDAK ADA REVISI (tetap sama)
--}}
<section class="testimonials-preview">
    <div class="container">
        {{-- JUDUL SECTION --}}
        <h2 class="section-title text-center">Apa Kata Mereka?</h2>
        {{-- SUBJUDUL --}}
        <p class="section-subtitle text-center">Kesan pelanggan adalah prioritas kami. Lihat apa yang mereka katakan tentang Waroenk Qu.</p>
        
        {{-- 
        GRID 3 TESTIMONI
        Desktop: 3 kolom, Tablet: 2 kolom, Mobile: 1 kolom
        --}}
        <div class="testimonials-grid">
            
            {{-- TESTIMONI 1: SUSI WULANDARI --}}
            <div class="testimonial-card">
                {{-- 
                HEADER TESTIMONI
                Flexbox: foto profil + nama + role
                --}}
                <div class="testimonial-header">
                    {{-- 
                    FOTO PROFIL
                    Icon user.png, ukuran 50x50px, bulat
                    --}}
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    {{-- 
                    INFO USER
                    Nama + role/keterangan
                    --}}
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Susi Wulandari</h4>
                        <p class="testimonial-role">Pelanggan Setia</p>
                    </div>
                </div>
                {{-- 
                TEXT TESTIMONI
                Isi review dari customer
                --}}
                <p class="testimonial-text">"Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi kesini."</p>
            </div>
            
            {{-- TESTIMONI 2: ANDI SETIAWAN --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Andi Setiawan</h4>
                        <p class="testimonial-role">Pelanggan Tetap</p>
                    </div>
                </div>
                <p class="testimonial-text">"Tempatnya cozy, pelayanan ramah. Rawonnya juara! Rasa bumbunya nempel di lidah, bikin nagih terus. Pasti balik lagi kesini."</p>
            </div>
            
            {{-- TESTIMONI 3: RINA ANDAYANI --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Rina Andayani</h4>
                        <p class="testimonial-role">Pelanggan Baru</p>
                    </div>
                </div>
                <p class="testimonial-text">"Recommended! Menu variatif, porsi pas, dan yang penting rasanya mantap. Jadi langganan deh, cocok buat makan siang bareng teman."</p>
            </div>
            
        </div>
    </div>
</section>

@endsection
