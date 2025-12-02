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
{{-- 
==============================================
SECTION HERO - INLINE STYLE VERSION
==============================================
Kenapa pakai inline style?
- Inline style punya priority TERTINGGI dalam CSS (bahkan lebih tinggi dari !important)
- Override semua CSS dari file external
- Dijamin text jadi kiri karena gak bisa di-override
--}}

{{-- 
CONTAINER HERO
Style langsung di tag <section>:
- background-image: Foto dalam2.png dari folder public/images/warung/
- background-size: cover = foto menutupi seluruh area
- background-position: center = foto di tengah
- min-height: 600px = tinggi minimal 600 pixel
- display: flex = pakai flexbox layout
- align-items: center = konten vertikal tengah (judul gak nempel atas)
- position: relative = buat overlay bisa ditaro di atas
- padding: 0 = gak ada padding dalam
--}}
<section class="hero" style="background-image: url('{{ asset('images/warung/dalam2.png') }}'); background-size: cover; background-position: center; min-height: 600px; display: flex; align-items: flex-end; justify-content: flex-start; position: relative; padding: 0;">
    
    {{-- 
    OVERLAY GELAP
    Lapisan hitam semi-transparan di atas foto:
    - position: absolute = posisi mutlak (nempel penuh di parent)
    - top: 0, left: 0 = mulai dari pojok kiri atas
    - width: 100%, height: 100% = ukuran penuh menutupi foto
    - background-color: rgba(0,0,0,0.5) = hitam opacity 50% (semi-transparan)
    - z-index: 1 = layer tingkat 1 (di atas foto, di bawah text)
    
    Kenapa perlu overlay?
    Biar text putih keliatan jelas di atas foto. Tanpa ini text tenggelam.
    --}}
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 1;"></div>
    
    {{-- 
    CONTAINER UTAMA
    Pembatas lebar konten (biar gak melebar kemana-mana):
    - position: relative = biar bisa pakai z-index
    - z-index: 2 = layer tingkat 2 (di atas overlay, paling depan)
    - max-width: 1200px = lebar maksimal 1200px (standar website)
    - margin: 0 auto = center horizontal otomatis
    - padding: 0 20px = padding kiri-kanan 20px (biar gak nempel tepi)
    - width: 100% = lebar 100% sampai max-width tercapai
    --}}
    <div style="position: relative; z-index: 2; max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 50px 60px;">
        
        {{-- 
        PEMBUNGKUS KONTEN HERO
        Ini yang bikin text KIRI:
        - max-width: 700px = lebar maksimal 700px (biar text gak terlalu panjang)
        - margin: 0 = PENTING! Gak ada margin auto yang bikin center
        - padding: 0 = gak ada padding
        - text-align: left = KUNCI! Semua text di dalamnya rata KIRI
        
        Kalau margin: 0 auto, maka div ini akan center (TEXT JADI TENGAH!)
        Kalau margin: 0, maka div ini mulai dari KIRI (TEXT JADI KIRI!)
        --}}
        <div style="max-width: 700px; margin: 0; padding: 0; text-align: left;">
            
            {{-- 
            JUDUL UTAMA (H1)
            - font-family: 'Playfair Display', serif = font elegan untuk judul
            - font-size: 56px = ukuran besar (desktop)
            - font-weight: 700 = tebal (bold)
            - margin-bottom: 20px = jarak ke paragraf di bawah
            - color: white = warna putih (keliatan di atas overlay gelap)
            - text-shadow: 2px 2px 4px rgba(0,0,0,0.3) = shadow halus biar lebih jelas
            - text-align: left = rata KIRI (double security!)
            - line-height: 1.3 = jarak antar baris judul
            --}}
            <h1 style="font-family: 'Playfair Display', serif; font-size: 56px; font-weight: 700; margin-bottom: 20px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); text-align: left; line-height: 1.3;">
                Cita Rasa Autentik, Suasana Asik
            </h1>
            
            {{-- 
            TAGLINE/SUBJUDUL (PARAGRAF)
            - font-family: 'Poppins', sans-serif = font modern untuk body text
            - font-size: 20px = ukuran sedang (lebih kecil dari judul)
            - margin-bottom: 35px = jarak ke tombol di bawah
            - line-height: 1.6 = jarak antar baris paragraf (enak dibaca)
            - color: white = warna putih
            - text-align: left = rata KIRI
            --}}
            <p style="font-family: 'Poppins', sans-serif; font-size: 20px; margin-bottom: 35px; line-height: 1.6; color: white; text-align: left;">
                Sajian Nusantara yang khas, hadir untuk Anda di tengah kehangatan suasana yang tak terlupakan.
            </p>
            
            {{-- 
            CONTAINER TOMBOL
            Flexbox untuk 2 tombol sejajar horizontal:
            - display: flex = pakai flexbox
            - gap: 20px = jarak antar tombol 20px
            - justify-content: flex-start = KUNCI! Tombol rata KIRI (bukan center)
            - flex-wrap: wrap = kalau layar kecil, tombol turun kebawah
            
            Kalau justify-content: center, tombol akan center (SALAH!)
            Kalau justify-content: flex-start, tombol rata KIRI (BENAR!)
            --}}
            <div style="display: flex; gap: 20px; justify-content: flex-start; flex-wrap: wrap;">
                {{-- 
                TOMBOL 1: LIHAT MENU
                - Class dari CSS file (btn, btn-primary, btn-yellow-hover)
                - route('menu') = link ke halaman menu (/menu)
                - Hover effect: kuning dengan text hitam (dari class btn-yellow-hover)
                --}}
                 <a href="{{ route('menu') }}" class="btn btn-primary btn-yellow-hover">Lihat Menu</a>
                
                {{-- 
                TOMBOL 2: HUBUNGI KAMI
                - Class dari CSS file (btn, btn-secondary, btn-blur-hover)
                - route('kontak') = link ke halaman kontak (/kontak)
                - Hover effect: transparan blur dengan text putih (dari class btn-blur-hover)
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
                    <img src="{{ asset('images/menu/soto ayam.png') }}" alt="Nasi Goreng" class="menu-image">
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

@endsection