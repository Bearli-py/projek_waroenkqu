@extends('layouts.app')

@section('title', 'Tentang Kami - Waroenk Qu')
@section('meta_description', 'Tentang Waroenk Qu - Visi, Misi, dan nilai-nilai yang kami yakini dalam menyajikan masakan tradisional Indonesia')

@section('content')

<!-- 
    PAGE HEADER
    Fungsi: Banner header halaman tentang
    Background: Gradient merah
-->
<section class="page-header">
    <h2>Tentang <span class="highlight">Waroenk Qu</span></h2>
    <p>Mengenal lebih dekat Waroenk Qu - Visi, Misi, dan Nilai-nilai kami</p>
</section>

<!-- 
    ABOUT INTRO SECTION
    Fungsi: Intro singkat tentang Waroenk Qu
    Background: Cream
    Layout: Text center
-->
<section class="about-intro">
    <div class="section-container">
        <!-- 
            INTRO TEXT
            Fungsi: Deskripsi singkat tentang waroenk
            Font: Poppins untuk heading, Inter untuk body
        -->
        <h2 class="about-intro-title">Waroenk Qu - Cita Rasa Autentik, Harga Bersahabat</h2>
        <p class="about-intro-text">
            Waroenk Qu hadir dengan semangat untuk melestarikan cita rasa masakan tradisional Indonesia. 
            Kami percaya bahwa makanan enak tidak harus mahal. Setiap menu yang kami sajikan dibuat dengan 
            resep turun-temurun, bahan-bahan pilihan, dan penuh cinta. Suasana warung yang nyaman dan 
            pelayanan yang ramah menjadi prioritas kami untuk memberikan pengalaman kuliner terbaik bagi Anda.
        </p>
    </div>
</section>

<!-- 
    APA YANG KAMI YAKINI SECTION
    Fungsi: Menampilkan nilai-nilai/prinsip Waroenk Qu
    Layout: Grid 3 kolom (desktop), 1 kolom (mobile)
    Background: White
-->
<section class="section believe-section">
    <div class="section-container">
        <!-- 
            SECTION TITLE
            Fungsi: Judul section
            Style: Center aligned dengan underline gradient
        -->
        <h2 class="section-title">Apa yang Kami Yakini</h2>
        
        <!-- 
            BELIEVE GRID
            Fungsi: Grid untuk kartu nilai-nilai
            Grid: 3 kolom di desktop, 2 di tablet, 1 di mobile
            Gap: 28px
            Jika dihapus: Kartu tidak tampil
        -->
        <div class="believe-grid">
            
            <!-- 
                BELIEVE CARD 1: KUALITAS RASA
                Fungsi: Kartu nilai individual
                Hover effect:
                - Border 3px solid kuning (#F2C94C) muncul
                - Shadow meningkat
                - Card naik 4px (translateY)
                - Icon scale 1.1x
                Jika dihapus: 1 nilai hilang
            -->
            <div class="believe-card">
                <!-- 
                    BELIEVE ICON
                    Fungsi: Icon visual untuk nilai
                    Icon: kualitas rasa.png
                    Size: 64px x 64px
                    Hover: Scale 1.1x
                -->
                <div class="believe-icon">
                    <img src="{{ asset('images/icon/kualitas rasa.png') }}" alt="Kualitas Rasa">
                </div>
                
                <!-- 
                    BELIEVE TITLE
                    Fungsi: Judul nilai
                    Font: Poppins 24px Bold
                    Color: Text dark
                -->
                <h3 class="believe-title">Kualitas Rasa</h3>
                
                <!-- 
                    BELIEVE TEXT
                    Fungsi: Deskripsi nilai
                    Font: Inter 15px Regular
                    Line height: 1.8 (easy reading)
                -->
                <p class="believe-text">
                    Kami tidak pernah berkompromi dengan rasa. Setiap menu diolah dengan bumbu pilihan 
                    dan teknik memasak yang tepat untuk menghasilkan cita rasa autentik yang menggugah selera.
                </p>
            </div>

            <!-- BELIEVE CARD 2: BAHAN BERKUALITAS -->
            <div class="believe-card">
                <div class="believe-icon">
                    <img src="{{ asset('images/icon/bahan makanan.png') }}" alt="Bahan Berkualitas">
                </div>
                <h3 class="believe-title">Bahan Berkualitas</h3>
                <p class="believe-text">
                    Kami hanya menggunakan bahan-bahan segar dan berkualitas. Sayuran dipilih yang masih segar, 
                    daging dipilih yang empuk, dan bumbu-bumbu rempah yang asli untuk hasil terbaik.
                </p>
            </div>

            <!-- BELIEVE CARD 3: PELAYANAN RAMAH -->
            <div class="believe-card">
                <div class="believe-icon">
                    <img src="{{ asset('images/icon/pelayanan.png') }}" alt="Pelayanan Ramah">
                </div>
                <h3 class="believe-title">Pelayanan Ramah</h3>
                <p class="believe-text">
                    Kepuasan pelanggan adalah prioritas kami. Kami melayani dengan senyum, cepat, dan ramah. 
                    Setiap pelanggan adalah bagian dari keluarga besar Waroenk Qu.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- 
    VISI MISI SECTION
    Fungsi: Menampilkan Visi dan Misi Waroenk Qu
    Layout: 2 kolom (Visi | Misi) di desktop, 1 kolom di mobile
    Background: Soft yellow (#FFF8E7)
-->
<section class="section visi-misi-section">
    <div class="section-container">
        <!-- 
            SECTION TITLE
            Fungsi: Judul section
        -->
        <h2 class="section-title">Visi & Misi</h2>
        
        <!-- 
            VISI MISI GRID
            Fungsi: Grid layout untuk Visi dan Misi
            Grid: 2 kolom di desktop, 1 di mobile
            Gap: 40px
        -->
        <div class="visi-misi-grid">
            
            <!-- 
                VISI CARD
                Fungsi: Kartu Visi
                Hover effect:
                - Background gradient merah muncul
                - Text berubah jadi putih
                - Shadow meningkat
                - Card scale 1.02x
                - Icon filter brightness (jadi putih)
                Jika dihapus: Visi tidak tampil
            -->
            <div class="visi-misi-card visi-card">
                <!-- 
                    CARD HEADER
                    Fungsi: Header card dengan icon dan title
                    Layout: Flex row, center aligned
                -->
                <div class="vm-header">
                    <!-- 
                        VISI ICON
                        Fungsi: Icon bintang untuk visi
                        Icon: bintang.png
                        Size: 40px x 40px
                        Hover: Filter brightness untuk jadi putih
                    -->
                    <div class="vm-icon">
                        <img src="{{ asset('images/icon/bintang.png') }}" alt="Visi" class="vm-icon-img">
                    </div>
                    <h3 class="vm-title">Visi</h3>
                </div>
                
                <!-- 
                    CARD CONTENT
                    Fungsi: Isi visi
                    Font: Inter 16px Regular
                    Line height: 1.8
                -->
                <div class="vm-content">
                    <p>
                        Menjadi warung makan tradisional terpercaya yang menyajikan masakan Indonesia 
                        dengan cita rasa autentik, kualitas terbaik, dan harga yang terjangkau untuk 
                        semua kalangan masyarakat.
                    </p>
                </div>
            </div>

            <!-- 
                MISI CARD
                Fungsi: Kartu Misi
                Hover effect: Sama seperti Visi card
            -->
            <div class="visi-misi-card misi-card">
                <div class="vm-header">
                    <div class="vm-icon">
                        <img src="{{ asset('images/icon/statistic kuning.png') }}" alt="Misi" class="vm-icon-img">
                    </div>
                    <h3 class="vm-title">Misi</h3>
                </div>
                
                <!-- 
                    MISI CONTENT
                    Fungsi: List misi (bullet points)
                    Menggunakan <ul> untuk semantic HTML
                -->
                <div class="vm-content">
                    <ul class="misi-list">
                        <!-- 
                            MISI ITEMS
                            Fungsi: Item-item misi
                            Custom bullet: Check icon via CSS ::before
                        -->
                        <li>Menyediakan menu makanan tradisional Indonesia yang berkualitas dengan harga terjangkau</li>
                        <li>Menggunakan bahan-bahan segar dan berkualitas dalam setiap masakan</li>
                        <li>Memberikan pelayanan yang ramah, cepat, dan memuaskan</li>
                        <li>Menciptakan suasana warung yang bersih, nyaman, dan kekeluargaan</li>
                        <li>Melestarikan resep masakan tradisional turun-temurun</li>
                        <li>Terus berinovasi dalam menu tanpa menghilangkan cita rasa autentik</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 
    STORY SECTION
    Fungsi: Cerita singkat tentang perjalanan Waroenk Qu
    Layout: Text center dengan image
    Background: Cream
    (OPTIONAL - bisa dihapus jika tidak perlu)
-->
<section class="about-story">
    <div class="section-container">
        <div class="story-content-wrapper">
            <!-- 
                STORY IMAGE
                Fungsi: Foto suasana warung
                Border radius: Rounded
                Shadow: Medium
            -->
            <div class="story-image-wrapper">
                <img src="{{ asset('images/warung/dalam1.png') }}" alt="Waroenk Qu" class="story-img">
            </div>
            
            <!-- 
                STORY TEXT
                Fungsi: Text cerita perjalanan waroenk
            -->
            <div class="story-text-wrapper">
                <h2 class="story-title">Perjalanan Kami</h2>
                <p class="story-paragraph">
                    Waroenk Qu dimulai dari kecintaan kami terhadap masakan tradisional Indonesia. 
                    Berawal dari warung kecil yang hanya memiliki beberapa meja, kami terus berkembang 
                    berkat dukungan dan kepercayaan pelanggan setia kami.
                </p>
                <p class="story-paragraph">
                    Setiap hari, kami berkomitmen untuk menyajikan yang terbaik. Dari memilih bahan 
                    yang segar di pagi hari, memasak dengan penuh perhatian, hingga melayani setiap 
                    pelanggan dengan senyuman. Kepuasan Anda adalah kebanggaan kami.
                </p>
                <p class="story-paragraph">
                    Terima kasih telah menjadi bagian dari perjalanan Waroenk Qu. Mari terus bersama 
                    menikmati kelezatan masakan Indonesia yang autentik!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 
    CTA SECTION
    Fungsi: Call to action di akhir halaman
    Ajakan untuk mengunjungi atau melihat menu
-->
<section class="about-cta">
    <div class="section-container">
        <h2 class="cta-title">Siap Merasakan Kelezatan Kami?</h2>
        <p class="cta-text">Kunjungi Waroenk Qu sekarang atau lihat menu lengkap kami!</p>
        <div class="cta-buttons">
            <!-- 
                BUTTON: LIHAT MENU
                Fungsi: Redirect ke halaman menu
            -->
            <a href="{{ route('menu') }}" class="btn-cta-primary">Lihat Menu</a>
            
            <!-- 
                BUTTON: HUBUNGI KAMI
                Fungsi: Redirect ke halaman kontak
            -->
            <a href="{{ route('contact') }}" class="btn-cta-secondary">Hubungi Kami</a>
        </div>
    </div>
</section>

@endsection