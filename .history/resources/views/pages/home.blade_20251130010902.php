{{-- 
==============================================
HALAMAN BERANDA - WAROENK QU
==============================================
File ini berisi konten halaman utama (homepage) website
Extends dari: layouts/app.blade.php (struktur HTML, header, footer)
Kalau dihapus: Halaman beranda kosong/error
--}}
@extends('layouts.app')

{{-- 
JUDUL TAB BROWSER
Text yang muncul di tab browser: "Beranda - Waroenk Qu"
Kalau dihapus: Judul jadi default dari layout
--}}
@section('title', 'Beranda - Waroenk Qu')

{{-- MULAI KONTEN HALAMAN --}}
@section('content')

{{-- 
==============================================
SECTION 1: HERO (BANNER UTAMA)
==============================================
Fungsi: Banner besar dengan background foto, judul, tagline, dan 2 tombol CTA
Background: Foto suasana warung (dalam1.png)
Overlay: Gelap semi-transparan biar text jelas
Layout: Judul dan tagline di KIRI (bukan center)
Kalau dihapus: Gak ada banner utama di homepage
--}}
<section class="hero">
    {{-- 
    OVERLAY GELAP
    Fungsi: Lapisan hitam semi-transparan (opacity 50%) di atas foto background
    Kenapa perlu: Biar text putih lebih jelas dibaca di atas foto
    Kalau dihapus: Text tenggelam sama background foto (susah dibaca)
    --}}
    <div class="hero-overlay"></div>
    
    {{-- 
    CONTAINER
    Fungsi: Pembatas lebar konten (max-width 1200px, center)
    Kenapa perlu: Biar konten gak melebar kemana-mana di layar besar
    --}}
    <div class="container">
        {{-- 
        ISI HERO - TEXT KIRI
        Class "hero-content text-left" = konten hero rata KIRI (bukan center)
        PENTING: Class "text-left" wajib ada! Kalau dihapus, text balik ke tengah
        z-index: 2 = konten di atas overlay (lebih tinggi dari overlay yang z-index 1)
        --}}
        <div class="hero-content text-left">
            {{-- 
            JUDUL UTAMA
            Font: Playfair Display 56px, bold, warna putih
            Text shadow: Biar lebih jelas dibaca
            Kalau dihapus: Gak ada judul di hero
            --}}
            <h1 class="hero-title">Cita Rasa Autentik, Suasana Asik</h1>
            
            {{-- 
            TAGLINE/SUBJUDUL
            Font: Poppins 20px, warna putih
            Line-height 1.6: Jarak antar baris biar enak dibaca
            Kalau dihapus: Gak ada keterangan singkat tentang warung
            --}}
            <p class="hero-subtitle">Sajian Nusantara yang khas, hadir untuk Anda di tengah kehangatan suasana yang tak terlupakan.</p>
            
            {{-- 
            2 TOMBOL CTA (CALL TO ACTION)
            Fungsi: Ajakan buat pengunjung melakukan action (lihat menu atau hubungi)
            Layout: Flexbox horizontal (rata kiri sesuai text di atas)
            
            Class penting:
            - btn = styling dasar tombol (padding, border-radius, dll)
            - btn-primary = tombol utama (background merah #B33939)
            - btn-secondary = tombol sekunder (background transparan, border putih)
            - btn-yellow-hover = hover jadi kuning (#F2C94C) dengan text hitam
            - btn-blur-hover = hover jadi transparan blur dengan text putih
            
            Kalau class hover dihapus: Tombol pakai efek hover default (merah gelap)
            --}}
            <div class="hero-buttons">
                {{-- 
                TOMBOL 1: LIHAT MENU
                Warna: Merah #B33939 (default)
                Hover: Kuning #F2C94C dengan text hitam (class: btn-yellow-hover)
                Link: Ke halaman menu (route('menu') = /menu)
                --}}
                <a href="{{ route('menu') }}" class="btn btn-primary btn-yellow-hover">Lihat Menu</a>
                
                {{-- 
                TOMBOL 2: HUBUNGI KAMI
                Warna: Transparan dengan border putih (default)
                Hover: Transparan blur dengan text putih (class: btn-blur-hover)
                Link: Ke halaman kontak (route('kontak') = /kontak)
                --}}
                <a href="{{ route('kontak') }}" class="btn btn-secondary btn-blur-hover">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

{{-- 
==============================================
SECTION 2: MENU ANDALAN KAMI
==============================================
Fungsi: Tampilkan 4 menu favorit/unggulan warung
Layout: Grid 4 kolom (desktop), 2 kolom (tablet), 1 kolom (mobile)
Struktur baru: Foto di DALAM kotak border biru, nama & harga di LUAR kotak
Hover: Kotak naik + shadow, foto zoom in
Kalau dihapus: Pengunjung gak tau menu apa yang dijual
--}}
<section class="featured-menu">
    <div class="container">
        {{-- 
        JUDUL SECTION
        Font: Playfair Display 38px, center
        Margin-bottom: Jarak ke grid menu di bawah
        --}}
        <h2 class="section-title text-center">Menu Andalan Kami</h2>
        
        {{-- 
        GRID MENU
        CSS Grid: 4 kolom sama lebar (desktop)
        Gap: 30px (jarak antar kotak menu)
        Responsive: 2 kolom (tablet), 1 kolom (mobile)
        --}}
        <div class="menu-grid-featured">
            
            {{-- 
            =============================
            MENU 1: NASI RAWON
            =============================
            Class: menu-card-featured-new (layout baru)
            Struktur: Kotak foto terpisah dari nama & harga
            --}}
            <div class="menu-card-featured-new">
                {{-- 
                KOTAK FOTO (BORDER BIRU)
                Fungsi: Pembungkus foto dengan border biru #4A90E2
                Border: 3px solid biru
                Border-radius: 15px (sudut melengkung)
                Height: 250px (tinggi tetap, semua foto sama tinggi)
                Overflow: hidden (foto zoom gak keluar dari kotak)
                Hover: Kotak naik 5px + shadow biru muncul
                Kalau dihapus: Foto gak punya border dan layout berantakan
                --}}
                <div class="menu-image-box">
                    {{-- 
                    FOTO MENU
                    Path: public/images/menu/rawon.png
                    Object-fit: cover (foto di-crop proporsional, gak distorsi)
                    Transition: Smooth zoom in saat hover
                    Hover: Scale 1.1 (zoom 110%)
                    --}}
                    <img src="{{ asset('images/menu/rawon.png') }}" alt="Nasi Rawon" class="menu-image">
                </div>
                {{-- 
                NAMA MENU - DI LUAR KOTAK
                Class: menu-name-outside
                Font: Poppins 18px, semi-bold, warna hitam
                Margin-top: 15px (jarak dari kotak foto)
                Kalau dihapus: Gak ada nama menu
                --}}
                <h3 class="menu-name-outside">Nasi Rawon</h3>
                {{-- 
                HARGA - DI LUAR KOTAK
                Class: menu-price-outside
                Font: Poppins 16px, semi-bold, warna merah #B33939
                Kalau dihapus: Gak ada harga
                --}}
                <p class="menu-price-outside">Rp 18.000</p>
            </div>
            
            {{-- 
            =============================
            MENU 2: NASI GORENG
            =============================
            Struktur sama persis dengan Menu 1
            --}}
            <div class="menu-card-featured-new">
                <div class="menu-image-box">
                    <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Nasi Goreng" class="menu-image">
                </div>
                <h3 class="menu-name-outside">Nasi Goreng</h3>
                <p class="menu-price-outside">Rp 12.000</p>
            </div>
            
            {{-- 
            =============================
            MENU 3: MIE GORENG JAWA
            =============================
            --}}
            <div class="menu-card-featured-new">
                <div class="menu-image-box">
                    <img src="{{ asset('images/menu/mie goreng.png') }}" alt="Mie Goreng Jawa" class="menu-image">
                </div>
                <h3 class="menu-name-outside">Mie Goreng Jawa</h3>
                <p class="menu-price-outside">Rp 12.000</p>
            </div>
            
            {{-- 
            =============================
            MENU 4: SOTO AYAM
            =============================
            --}}
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
==============================================
SECTION 3: CERITA DI BALIK DAPUR KAMI
==============================================
Fungsi: Cerita singkat tentang warung (branding & storytelling)
Layout: 2 kolom flexbox (text kiri 50%, foto kanan 50%)
Background: Kuning muda #FFF8E1 (beda dari warna dasar #FAF3E0)
Responsive: Di mobile jadi susun kebawah (text dulu, baru foto)
Kalau dihapus: Gak ada cerita/branding warung
--}}
<section class="about-preview-new">
    <div class="container">
        {{-- 
        WRAPPER 2 KOLOM
        Flexbox: align-items center (vertikal tengah)
        Gap: 60px (jarak antara text dan foto)
        Responsive: Di mobile jadi flex-direction column (susun kebawah)
        --}}
        <div class="about-wrapper">
            
            {{-- 
            KOLOM KIRI: TEXT
            Flex: 1 (ambil 50% lebar)
            Berisi: Judul + paragraf cerita + tombol
            --}}
            <div class="about-text">
                {{-- 
                JUDUL SECTION
                Font: Playfair Display 38px
                Margin-bottom: Jarak ke paragraf
                --}}
                <h2 class="section-title">Cerita di Balik Dapur Kami</h2>
                
                {{-- 
                PARAGRAF CERITA
                Font: Poppins 16px, line-height 1.8
                Warna: #555 (abu gelap, enak dibaca)
                --}}
                <p class="section-description">
                    Waroenk Qu hadir untuk menghadirkan cita rasa kuliner khas yang autentik, nikmat, dan terjangkau bagi semua kalangan. Terinspirasi dari kelezatan masakan rumahan yang selalu menggugah selera.
                </p>
                
                {{-- 
                TOMBOL BACA SELENGKAPNYA
                Class: btn btn-primary btn-yellow-hover
                Default: Background merah #B33939
                Hover: Background kuning #F2C94C dengan text hitam
                Link: Ke halaman Tentang (route('tentang') = /tentang)
                Kalau dihapus: Pengunjung gak bisa baca cerita lengkap
                --}}
                <a href="{{ route('tentang') }}" class="btn btn-primary btn-yellow-hover">Baca Selengkapnya</a>
            </div>
            
            {{-- 
            KOLOM KANAN: FOTO WARUNG
            Flex: 1 (ambil 50% lebar)
            Berisi: Foto suasana luar warung
            --}}
            <div class="about-image">
                {{-- 
                FOTO WARUNG
                Path: public/images/warung/luar-sore.png
                Border-radius: 15px (sudut melengkung)
                Box-shadow: Shadow halus biar keliatan depth
                Width: 100% (full lebar kolom)
                --}}
                <img src="{{ asset('images/warung/luar-sore.png') }}" alt="Waroenk Qu" class="about-img">
            </div>
            
        </div>
    </div>
</section>

{{-- 
==============================================
SECTION 4: APA KATA MEREKA (TESTIMONI)
==============================================
Fungsi: Tampilkan 3 testimoni pelanggan (social proof)
Layout: Grid 3 kolom (desktop), 2 kolom (tablet), 1 kolom (mobile)
Hover: Kotak zoom 105% (natural, gak lebay)
Kalau dihapus: Gak ada social proof dari pelanggan
--}}
<section class="testimonials-preview">
    <div class="container">
        {{-- 
        JUDUL SECTION
        Font: Playfair Display 38px, center
        --}}
        <h2 class="section-title text-center">Apa Kata Mereka?</h2>
        
        {{-- 
        SUBJUDUL
        Font: Poppins 18px, center, warna abu #666
        Max-width: 700px (biar gak terlalu lebar)
        Margin: 0 auto (center horizontal)
        --}}
        <p class="section-subtitle text-center">Kesan pelanggan adalah prioritas kami. Lihat apa yang mereka katakan tentang Waroenk Qu.</p>
        
        {{-- 
        GRID TESTIMONI
        CSS Grid: 3 kolom sama lebar (desktop)
        Gap: 30px (jarak antar card)
        Responsive: 2 kolom (tablet), 1 kolom (mobile)
        --}}
        <div class="testimonials-grid">
            
            {{-- 
            =============================
            TESTIMONI 1: SUSI WULANDARI
            =============================
            Card: Background putih, padding 30px, border-radius 15px
            Shadow: Halus biar keliatan depth
            Hover: Scale 1.05 (zoom sedikit, natural)
            --}}
            <div class="testimonial-card">
                {{-- 
                HEADER TESTIMONI
                Flexbox horizontal: foto profil + info user
                Gap: 15px (jarak foto ke text)
                Align-items: center (vertikal tengah)
                --}}
                <div class="testimonial-header">
                    {{-- 
                    FOTO PROFIL USER
                    Path: public/images/icon/user.png
                    Size: 50x50px
                    Border-radius: 50% (bulat sempurna)
                    Object-fit: cover (foto gak distorsi)
                    --}}
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    
                    {{-- 
                    INFO USER
                    Berisi: Nama + role/keterangan
                    --}}
                    <div class="testimonial-user">
                        {{-- 
                        NAMA USER
                        Font: Poppins 18px, semi-bold, warna hitam
                        --}}
                        <h4 class="testimonial-name">Susi Wulandari</h4>
                        {{-- 
                        ROLE/KETERANGAN
                        Font: Poppins 13px, warna abu #999
                        --}}
                        <p class="testimonial-role">Pelanggan Setia</p>
                    </div>
                </div>
                
                {{-- 
                TEXT TESTIMONI
                Font: Poppins 15px, italic, warna abu gelap #555
                Line-height: 1.7 (jarak baris enak dibaca)
                Tanda kutip sudah ada di text
                --}}
                <p class="testimonial-text">"Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi kesini."</p>
            </div>
            
            {{-- 
            =============================
            TESTIMONI 2: ANDI SETIAWAN
            =============================
            Struktur sama persis dengan Testimoni 1
            --}}
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
            
            {{-- 
            =============================
            TESTIMONI 3: RINA ANDAYANI
            =============================
            --}}
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

{{-- 
CATATAN: Section "Apa yang Kami Yakini" DIHAPUS sesuai request
Section itu gak ditampilkan di halaman beranda
--}}

@endsection
