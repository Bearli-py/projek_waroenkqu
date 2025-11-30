{{-- 
EXTENDS LAYOUT
Ini berarti halaman home pakai template dari layouts/app.blade.php
Jadi gak perlu tulis <html>, <head>, <body> lagi. Tinggal isi konten aja.
Kalau dihapus: Halaman gak punya struktur HTML dan header/footer hilang
--}}
@extends('layouts.app')

{{-- 
JUDUL HALAMAN
Ini judul yang muncul di tab browser: "Beranda - Waroenk Qu"
@section('title') = isi bagian title di layout
Kalau dihapus: Judul jadi default "Waroenk Qu - Cita Rasa Autentik"
--}}
@section('title', 'Beranda - Waroenk Qu')

{{-- 
KONTEN HALAMAN
Semua yang di dalam @section('content') ini bakal muncul di bagian <main>
@endsection = akhir dari section content
--}}
@section('content')

{{-- 
=================================
SECTION 1: HERO (BANNER UTAMA)
=================================
Ini bagian paling atas halaman dengan background gambar/warna.
Berisi judul besar, tagline, dan tombol CTA.
Kalau dihapus: Halaman langsung ke konten, gak ada sambutan/intro
--}}
<section class="hero">
    {{-- 
    OVERLAY (LAPISAN GELAP)
    Lapisan semi-transparan biar text lebih jelas dibaca.
    Tanpa ini text kebelenang sama background.
    Kalau dihapus: Text jadi susah dibaca
    --}}
    <div class="hero-overlay"></div>
    
    {{-- 
    CONTAINER
    Biar konten hero gak melebar kemana-mana, tetap di tengah.
    --}}
    <div class="container">
        {{-- 
        ISI HERO
        Berisi judul, tagline, dan tombol.
        z-index tinggi biar text di atas overlay.
        --}}
        <div class="hero-content">
            {{-- 
            JUDUL UTAMA
            "Cita Rasa Autentik, Suasana Asik"
            Font besar pakai Playfair Display (elegan).
            Kalau dihapus: Gak ada judul utama di hero
            --}}
            <h1 class="hero-title">Cita Rasa Autentik, Suasana Asik</h1>
            
            {{-- 
            TAGLINE/SUBJUDUL
            Kalimat penjelas di bawah judul utama.
            Font lebih kecil pakai Poppins (mudah dibaca).
            Kalau dihapus: Gak ada penjelasan singkat tentang warung
            --}}
            <p class="hero-subtitle">Sajian Nusantara yang khas, hadir untuk Anda di tengah kehangatan suasana yang tak terlupakan.</p>
            
            {{-- 
            TOMBOL CTA (CALL TO ACTION)
            2 tombol biar pengunjung langsung action:
            - Lihat Menu = ke halaman menu
            - Hubungi Kami = ke halaman kontak
            Kalau dihapus: Pengunjung bingung mau ngapain
            --}}
            <div class="hero-buttons">
                {{-- 
                TOMBOL LIHAT MENU (PRIMARY)
                Background merah #B33939, text putih.
                route('menu') = link ke halaman menu
                --}}
                <a href="{{ route('menu') }}" class="btn btn-primary">Lihat Menu</a>
                
                {{-- 
                TOMBOL HUBUNGI KAMI (SECONDARY)
                Background transparan, border putih, text putih.
                route('kontak') = link ke halaman kontak
                --}}
                <a href="{{ route('kontak') }}" class="btn btn-secondary">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 2: TENTANG KAMI SINGKAT
=================================
Cerita singkat tentang warung dengan foto.
Layout 2 kolom: kiri foto, kanan text.
Kalau dihapus: Pengunjung gak tau background/sejarah warung
--}}
<section class="about-preview">
    <div class="container">
        {{-- 
        WRAPPER 2 KOLOM
        Pakai flexbox buat bagi 2 kolom:
        - Kiri: Foto suasana warung
        - Kanan: Judul + text + tombol baca selengkapnya
        Kalau dihapus: Foto dan text jadi susun kebawah (vertikal)
        --}}
        <div class="about-wrapper">
            {{-- 
            KOLOM KIRI: FOTO WARUNG
            Gambar suasana warung (luar-siang.png).
            asset() = ambil gambar dari public/images
            Kalau dihapus: Gak ada visual warung, cuma text doang
            --}}
            <div class="about-image">
                <img src="{{ asset('images/warung/luar-siang.png') }}" alt="Waroenk Qu">
            </div>
            
            {{-- 
            KOLOM KANAN: TEXT
            Judul section + cerita singkat + tombol.
            --}}
            <div class="about-text">
                {{-- 
                JUDUL SECTION
                "Cerita di Balik Dapur Kami"
                Font Playfair Display buat kesan storytelling.
                --}}
                <h2 class="section-title">Cerita di Balik Dapur Kami</h2>
                
                {{-- 
                TEXT CERITA SINGKAT
                Paragraf panjang tentang latar belakang warung.
                Font Poppins biar mudah dibaca.
                --}}
                <p class="section-description">
                    Waroenk Qu hadir untuk menghadirkan cita rasa kuliner khas yang autentik, nikmat, dan terjangkau bagi semua kalangan. Terinspirasi dari kelezatan masakan rumahan yang selalu menggugah selera.
                </p>
                
                {{-- 
                TOMBOL BACA SELENGKAPNYA
                Link ke halaman Tentang untuk cerita lengkap.
                route('tentang') = ke halaman tentang
                Kalau dihapus: Pengunjung gak bisa baca cerita lengkap
                --}}
                <a href="{{ route('tentang') }}" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 3: APA YANG KAMI YAKINI
=================================
3 kotak value/keunggulan warung:
- Bahan Makanan Berkualitas
- Pelayanan Ramah
- Kualitas Rasa Terjamin
Kalau dihapus: Gak ada highlight keunggulan warung
--}}
<section class="values">
    <div class="container">
        {{-- 
        JUDUL SECTION
        "Apa yang Kami Yakini"
        Text center, font Playfair Display.
        --}}
        <h2 class="section-title text-center">Apa yang Kami Yakini</h2>
        
        {{-- 
        WRAPPER 3 KOTAK
        Pakai CSS Grid buat susun 3 kotak horizontal.
        Di mobile jadi 1 kolom (susun kebawah).
        Kalau dihapus: 3 kotak jadi berantakan
        --}}
        <div class="values-grid">
            {{-- 
            KOTAK 1: BAHAN BERKUALITAS
            Icon + judul + deskripsi singkat.
            Hover: border merah muncul (sesuai desain).
            --}}
            <div class="value-card">
                {{-- Icon bahan makanan --}}
                <img src="{{ asset('images/icon/bahan makanan.png') }}" alt="Bahan Berkualitas" class="value-icon">
                <h3 class="value-title">Bahan Makanan Berkualitas</h3>
                <p class="value-description">Kami hanya menggunakan bahan-bahan segar dan berkualitas tinggi untuk setiap hidangan.</p>
            </div>
            
            {{-- 
            KOTAK 2: PELAYANAN RAMAH
            --}}
            <div class="value-card">
                <img src="{{ asset('images/icon/pelayanan.png') }}" alt="Pelayanan Ramah" class="value-icon">
                <h3 class="value-title">Pelayanan Ramah</h3>
                <p class="value-description">Tim kami siap melayani Anda dengan senyuman dan keramahan yang tulus.</p>
            </div>
            
            {{-- 
            KOTAK 3: KUALITAS RASA
            --}}
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
SECTION 4: MENU ANDALAN KAMI
=================================
Tampilkan beberapa menu favorit (4-6 item).
Hover: foto zoom in (efek hover zoom).
Kalau dihapus: Pengunjung gak tau menu apa yang dijual
--}}
<section class="featured-menu">
    <div class="container">
        {{-- JUDUL SECTION --}}
        <h2 class="section-title text-center">Menu Andalan Kami</h2>
        
        {{-- 
        GRID MENU
        Pakai CSS Grid buat susun foto menu.
        Desktop: 4 kolom, Tablet: 3 kolom, Mobile: 2 kolom.
        --}}
        <div class="menu-grid">
            {{-- 
            MENU ITEM 1: RAWON
            Foto menu dengan efek hover zoom (cuma foto yang zoom).
            class="menu-item" = punya efek hover di CSS
            --}}
            <div class="menu-item">
                <img src="{{ asset('images/menu/rawon.png') }}" alt="Rawon">
                <h3 class="menu-name">Rawon</h3>
            </div>
            
            {{-- MENU ITEM 2: LALAPAN AYAM --}}
            <div class="menu-item">
                <img src="{{ asset('images/menu/lalapan ayam.png') }}" alt="Lalapan Ayam">
                <h3 class="menu-name">Lalapan Ayam</h3>
            </div>
            
            {{-- MENU ITEM 3: SOTO AYAM --}}
            <div class="menu-item">
                <img src="{{ asset('images/menu/soto ayam.png') }}" alt="Soto Ayam">
                <h3 class="menu-name">Soto Ayam</h3>
            </div>
            
            {{-- MENU ITEM 4: NASI GORENG JAWA --}}
            <div class="menu-item">
                <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Nasi Goreng Jawa">
                <h3 class="menu-name">Nasi Goreng Jawa</h3>
            </div>
            
            {{-- MENU ITEM 5: MIE GORENG JAWA --}}
            <div class="menu-item">
                <img src="{{ asset('images/menu/mie goreng.png') }}" alt="Mie Goreng Jawa">
                <h3 class="menu-name">Mie Goreng Jawa</h3>
            </div>
            
            {{-- MENU ITEM 6: KOPI --}}
            <div class="menu-item">
                <img src="{{ asset('images/menu/kopi.png') }}" alt="Kopi">
                <h3 class="menu-name">Kopi</h3>
            </div>
        </div>
        
        {{-- 
        TOMBOL LIHAT SEMUA MENU
        Link ke halaman menu lengkap.
        Di tengah, style merah.
        --}}
        <div class="text-center" style="margin-top: 40px;">
            <a href="{{ route('menu') }}" class="btn btn-primary">Lihat Semua Menu</a>
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 5: APA KATA MEREKA
=================================
Tampilkan 3 testimoni pelanggan.
Hover: kotak zoom in sedikit (natural, gak lebay).
Kalau dihapus: Gak ada social proof dari pelanggan
--}}
<section class="testimonials-preview">
    <div class="container">
        {{-- JUDUL SECTION --}}
        <h2 class="section-title text-center">Apa Kata Mereka</h2>
        
        {{-- 
        GRID TESTIMONI
        Pakai CSS Grid buat 3 kotak testimoni.
        Desktop: 3 kolom, Mobile: 1 kolom.
        --}}
        <div class="testimonials-grid">
            {{-- 
            TESTIMONI 1
            Kotak dengan icon quote, text testimoni, nama, rating bintang.
            Hover: scale 1.05 (zoom dikit, natural).
            --}}
            <div class="testimonial-card">
                {{-- Icon quote di kiri atas --}}
                <img src="{{ asset('images/icon/quote.png') }}" alt="Quote" class="quote-icon">
                
                {{-- Text testimoni --}}
                <p class="testimonial-text">"Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong."</p>
                
                {{-- Nama pelanggan --}}
                <p class="testimonial-name">- Budi Santoso</p>
                
                {{-- Rating bintang (5 bintang) --}}
                <div class="rating">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                </div>
            </div>
            
            {{-- TESTIMONI 2 --}}
            <div class="testimonial-card">
                <img src="{{ asset('images/icon/quote.png') }}" alt="Quote" class="quote-icon">
                <p class="testimonial-text">"Tempatnya cozy, pelayanan ramah. Rawonnya juara! Pasti balik lagi kesini."</p>
                <p class="testimonial-name">- Siti Aminah</p>
                <div class="rating">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                </div>
            </div>
            
            {{-- TESTIMONI 3 --}}
            <div class="testimonial-card">
                <img src="{{ asset('images/icon/quote.png') }}" alt="Quote" class="quote-icon">
                <p class="testimonial-text">"Recommended! Menu variatif, porsi pas, dan yang penting rasanya mantap. Jadi langganan deh."</p>
                <p class="testimonial-name">- Andi Wijaya</p>
                <div class="rating">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                    <img src="{{ asset('images/icon/bintang.png') }}" alt="Star">
                </div>
            </div>
        </div>
        
        {{-- 
        TOMBOL LIHAT SEMUA TESTIMONI
        Link ke halaman testimoni lengkap.
        --}}
        <div class="text-center" style="margin-top: 40px;">
            <a href="{{ route('testimoni') }}" class="btn btn-primary">Lihat Semua Testimoni</a>
        </div>
    </div>
</section>

@endsection
