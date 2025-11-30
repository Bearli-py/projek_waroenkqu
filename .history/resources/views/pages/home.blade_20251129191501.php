<!-- 
    EXTENDS LAYOUT
    Fungsi: Menggunakan master layout (header, footer otomatis include)
    Jika dihapus: Page akan tampil tanpa layout
-->
@extends('layouts.app')

<!-- 
    PAGE TITLE
    Fungsi: Set title khusus halaman ini
    Akan muncul di browser tab
-->
@section('title', 'Beranda - Waroenk Qu')

<!-- 
    META DESCRIPTION
    Fungsi: SEO description untuk search engine
-->
@section('meta_description', 'Waroenk Qu - Cita rasa autentik dengan suasana asik. Nikmati masakan tradisional Indonesia.')

<!-- 
    MAIN CONTENT
    Fungsi: Konten utama halaman beranda
    Akan masuk ke @yield('content') di layout
-->
@section('content')

<!-- 
    HERO SECTION
    Fungsi: Banner utama halaman beranda
    Background: Foto suasana warung (dalam2.png)
    Jika dihapus: Beranda tidak ada hero banner
-->
<section class="hero-home">
    <!-- 
        HERO IMAGE
        Fungsi: Background image dengan overlay
        Class hero-bg-default: CSS akan set background-image
    -->
    <div class="hero-home-image hero-bg-default"></div>
    
    <!-- 
        HERO OVERLAY
        Fungsi: Layer gelap semi-transparan di atas foto
        Agar text lebih terbaca
        Jika dihapus: Text sulit dibaca karena background foto terang
    -->
    <div class="hero-home-overlay"></div>
    
    <!-- 
        HERO CONTENT
        Fungsi: Text dan button di tengah hero
        Z-index tinggi agar tampil di atas overlay
    -->
    <div class="hero-home-content">
        <!-- 
            HERO TITLE
            Fungsi: Judul utama "Cita Rasa Autentik, Suasana Asik"
        -->
        <h1>Cita Rasa Autentik, Suasana Asik</h1>
        
        <!-- 
            HERO SUBTITLE
            Fungsi: Tagline/deskripsi singkat
        -->
        <p>Nikmati kelezatan masakan Indonesia dengan harga terjangkau di tempat yang nyaman</p>
        
        <!-- 
            HERO BUTTONS
            Fungsi: CTA (Call to Action) buttons
            Layout flex untuk susunan horizontal
        -->
        <div class="hero-home-buttons">
            <!-- 
                BUTTON 1: LIHAT MENU
                Fungsi: Redirect ke halaman menu
                Style: Primary button (kuning background)
                Hover: Jadi transparan dengan border putih
            -->
            <a href="{{ route('menu') }}" class="btn-hero-primary">Lihat Menu</a>
            
            <!-- 
                BUTTON 2: HUBUNGI KAMI
                Fungsi: Redirect ke halaman kontak
                Style: Secondary button (transparan dengan border)
                Hover: Background kuning, text merah
            -->
            <a href="{{ route('contact') }}" class="btn-hero-secondary">Hubungi Kami</a>
        </div>
    </div>
</section>

<!-- 
    MENU ANDALAN SECTION
    Fungsi: Menampilkan 4 menu favorit
    Jika dihapus: Beranda tidak menampilkan preview menu
-->
<section class="featured-menu">
    <div class="section-container">
        <!-- 
            SECTION TITLE
            Fungsi: Judul section "Menu Andalan Kami"
            ::after pseudo-element: Garis bawah dekoratif (gradient merah-kuning)
        -->
        <h2 class="section-title">Menu Andalan Kami</h2>
        
        <!-- 
            MENU GRID
            Fungsi: Grid layout untuk 4 kartu menu
            Grid: 4 kolom di desktop, 2 di tablet, 1 di mobile
            Jika dihapus: Menu tidak tampil dalam grid
        -->
        <div class="featured-menu-grid">
            
            <!-- 
                MENU CARD 1: NASI RAWON
                Fungsi: Kartu menu dengan foto dan harga
                Hover effect: Zoom foto, muncul nama di bawah
            -->
            <div class="featured-card">
                <!-- 
                    FEATURED IMAGE
                    Fungsi: Container foto menu
                    data-menu-name: Akan tampil saat hover via CSS ::before
                    Hover: Foto zoom 1.2x, overlay gradient, nama menu muncul
                -->
                <div class="featured-image" data-menu-name="Nasi Rawon">
                    <img src="{{ asset('images/menu/rawon.png') }}" alt="Nasi Rawon">
                </div>
                
                <!-- 
                    FEATURED INFO
                    Fungsi: Nama dan harga menu
                    Background: Gradient putih ke cream
                -->
                <div class="featured-info">
                    <h3>Nasi Rawon</h3>
                    <p class="featured-price">Rp 18.000</p>
                </div>
            </div>

            <!-- MENU CARD 2: NASI GORENG -->
            <div class="featured-card">
                <div class="featured-image" data-menu-name="Nasi Goreng">
                    <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Nasi Goreng">
                </div>
                <div class="featured-info">
                    <h3>Nasi Goreng</h3>
                    <p class="featured-price">Rp 12.000</p>
                </div>
            </div>

            <!-- MENU CARD 3: MIE GORENG JAWA -->
            <div class="featured-card">
                <div class="featured-image" data-menu-name="Mie Goreng Jawa">
                    <img src="{{ asset('images/menu/mie goreng.png') }}" alt="Mie Goreng Jawa">
                </div>
                <div class="featured-info">
                    <h3>Mie Goreng Jawa</h3>
                    <p class="featured-price">Rp 12.000</p>
                </div>
            </div>

            <!-- MENU CARD 4: LALAPAN AYAM -->
            <div class="featured-card">
                <div class="featured-image" data-menu-name="Lalapan Ayam">
                    <img src="{{ asset('images/menu/lalapan ayam.png') }}" alt="Lalapan Ayam">
                </div>
                <div class="featured-info">
                    <h3>Lalapan Ayam</h3>
                    <p class="featured-price">Rp 12.000</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 
    STORY SECTION (CERITA DI BALIK DAPUR KAMI)
    Fungsi: Info tentang waroenk dengan foto
    Layout: Grid 2 kolom (text | image)
    Background: Soft yellow (#FFF8E7)
-->
<section class="story-section">
    <div class="section-container">
        <!-- 
            STORY GRID
            Fungsi: Layout 2 kolom untuk text dan gambar
            Responsive: 1 kolom di mobile
        -->
        <div class="story-grid">
            
            <!-- 
                STORY CONTENT (TEXT COLUMN)
                Fungsi: Text tentang cerita waroenk
            -->
            <div class="story-content">
                <h2>Cerita di Balik Dapur Kami</h2>
                <p>Waroenk Qu hadir dari cinta terhadap masakan tradisional dan keinginan untuk berbagi kelezatan dengan harga yang ramah di kantong. Setiap menu yang kami sajikan dibuat dengan resep turun-temurun dan bahan-bahan pilihan. Kami percaya bahwa makanan enak tidak harus mahal, dan suasana nyaman adalah kunci kenikmatan bersantap.</p>
                
                <!-- 
                    BACA SELENGKAPNYA BUTTON
                    Fungsi: Redirect ke halaman About
                    Style: Merah background
                    Hover: Background jadi kuning, text jadi merah
                -->
                <a href="{{ route('about') }}" class="btn-story">Baca Selengkapnya</a>
            </div>

            <!-- 
                STORY IMAGE (IMAGE COLUMN)
                Fungsi: Foto warung dari luar
                Hover: Image zoom 1.05x
            -->
            <div class="story-image">
                <img src="{{ asset('images/warung/luar-siang.png') }}" alt="Waroenk Qu">
            </div>

        </div>
    </div>
</section>

<!-- 
    TESTIMONIAL SECTION (APA KATA MEREKA?)
    Fungsi: Menampilkan 3 testimoni pelanggan
    Background: Cream (#FAF3E0)
-->
<section class="testimonial-home">
    <div class="section-container">
        <!-- 
            SECTION TITLE & SUBTITLE
            Fungsi: Judul section dengan subtitle fun
        -->
        <h2 class="section-title">Apa Kata Mereka?</h2>
        <p class="section-subtitle">Kisah pelanggan setia kami yang puas! Kata siapa juga yang mampir terkesan :)</p>
        
        <!-- 
            TESTIMONIAL GRID
            Fungsi: Grid 3 kolom untuk kartu testimoni
            Responsive: 1 kolom di mobile/tablet
        -->
        <div class="testimonial-home-grid">
            
            <!-- 
                TESTIMONIAL CARD 1
                Fungsi: Kartu testimoni dengan quote icon
                Hover: Naik 12px, shadow lebih besar, icon rotate 5deg
            -->
            <div class="testimonial-home-card">
                <!-- 
                    TESTIMONIAL ICON
                    Fungsi: Icon quote 💬
                    Hover: Scale 1.2x dan rotate
                -->
                <div class="testimonial-icon">💬</div>
                
                <!-- 
                    TESTIMONIAL TEXT
                    Fungsi: Isi testimoni (italic style)
                -->
                <p class="testimonial-text">"Rawonnya enak banget! Kuah hitamnya pekat dan dagingnya empuk. Harga terjangkau untuk rasa yang premium. Pasti balik lagi!"</p>
                
                <!-- 
                    TESTIMONIAL AUTHOR
                    Fungsi: Nama dan tanggal testimoni
                    Border top: Pemisah dari text
                -->
                <div class="testimonial-author">
                    <p class="author-name">Budi Santoso</p>
                    <p class="author-date">15 Oktober 2024</p>
                </div>
            </div>

            <!-- TESTIMONIAL CARD 2 -->
            <div class="testimonial-home-card">
                <div class="testimonial-icon">💬</div>
                <p class="testimonial-text">"Tempatnya nyaman dan bersih. Pelayanannya ramah. Nasi gorengnya juara, kecapnya pas banget. Cocok buat makan bareng keluarga."</p>
                <div class="testimonial-author">
                    <p class="author-name">Siti Nurhaliza</p>
                    <p class="author-date">20 Oktober 2024</p>
                </div>
            </div>

            <!-- TESTIMONIAL CARD 3 -->
            <div class="testimonial-home-card">
                <div class="testimonial-icon">💬</div>
                <p class="testimonial-text">"Sebagai anak kos, Waroenk Qu jadi tempat makan favorit. Harganya ramah kantong tapi rasanya ga kalah sama resto mahal. Rekomended!"</p>
                <div class="testimonial-author">
                    <p class="author-name">Andi Wijaya</p>
                    <p class="author-date">25 Oktober 2024</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection