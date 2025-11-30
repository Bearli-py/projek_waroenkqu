@extends('layouts.app')

@section('title', 'Testimoni - Waroenk Qu')
@section('meta_description', 'Testimoni pelanggan Waroenk Qu - Lihat apa kata mereka tentang masakan dan pelayanan kami')

@section('content')

<!-- 
    PAGE HEADER
    Fungsi: Banner header halaman testimoni
    Background: Gradient merah
-->
<section class="page-header">
    <h2>Testimoni <span class="highlight">Pelanggan</span></h2>
    <p>Apa kata mereka yang sudah merasakan kelezatan Waroenk Qu</p>
</section>

<!-- 
    TESTIMONIAL SECTION
    Fungsi: Section utama halaman testimoni
    Contains: Grid testimoni cards
    Background: Cream (#FAF3E0)
-->
<section class="section testimonial-section">
    
    <!-- 
        SECTION INTRO
        Fungsi: Text pembuka sebelum testimoni
        Jika dihapus: Langsung grid testimoni tanpa intro
    -->
    <div class="testimonial-intro">
        <p class="testimonial-subtitle">Kepuasan pelanggan adalah prioritas kami. Berikut adalah cerita dari mereka yang sudah mampir ke Waroenk Qu!</p>
    </div>

    <!-- 
        TESTIMONIAL GRID
        Fungsi: Grid layout untuk kartu testimoni
        Grid: 3 kolom di desktop, 2 di tablet, 1 di mobile
        Gap: 28px antar card
        Jika dihapus: Testimoni tidak tampil
    -->
    <div class="testimonial-grid">
        
        <!-- 
            TESTIMONIAL CARD 1
            Fungsi: Kartu testimoni individual
            Hover effect (natural, tidak lebay):
            - Card naik 12px (translateY)
            - Shadow lebih besar (0 20px 50px)
            - Border kuning muncul
            - Icon quote rotate 5deg dan scale 1.2x
            Jika dihapus: 1 testimoni hilang
        -->
        <div class="testimonial-card">
            <!-- 
                TESTIMONIAL ICON
                Fungsi: Icon quote 💬
                Default: Opacity 0.3, size 48px
                Hover: Scale 1.2x, rotate 5deg, opacity 0.5
            -->
            <div class="testimonial-icon">💬</div>
            
            <!-- 
                TESTIMONIAL TEXT
                Fungsi: Isi testimoni
                Style: Italic, gray color, line-height 1.8
                Font: Inter 15px Regular
            -->
            <p class="testimonial-text">"Rawonnya enak banget! Kuah hitamnya pekat dan dagingnya empuk. Harga terjangkau untuk rasa yang premium. Pasti balik lagi!"</p>
            
            <!-- 
                TESTIMONIAL AUTHOR
                Fungsi: Info pemberi testimoni (nama + tanggal)
                Border top: Pemisah dari text (2px solid soft-yellow)
                Padding top: 16px
            -->
            <div class="testimonial-author">
                <p class="author-name">Budi Santoso</p>
                <p class="author-date">15 Oktober 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 2 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Tempatnya nyaman dan bersih. Pelayanannya ramah. Nasi gorengnya juara, kecapnya pas banget. Cocok buat makan bareng keluarga."</p>
            <div class="testimonial-author">
                <p class="author-name">Siti Nurhaliza</p>
                <p class="author-date">20 Oktober 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 3 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Sebagai anak kos, Waroenk Qu jadi tempat makan favorit. Harganya ramah kantong tapi rasanya ga kalah sama resto mahal. Rekomended!"</p>
            <div class="testimonial-author">
                <p class="author-name">Andi Wijaya</p>
                <p class="author-date">25 Oktober 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 4 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Soto ayamnya seger banget! Kuahnya bening tapi rasanya nampol. Cocok buat sarapan atau makan siang. Porsinya pas, bikin kenyang!"</p>
            <div class="testimonial-author">
                <p class="author-name">Dewi Lestari</p>
                <p class="author-date">3 November 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 5 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Mie gorengnya enak, bumbu tradisionalnya kerasa banget. Gak terlalu berminyak, pas di lidah. Tempatnya juga asik buat ngobrol sama temen."</p>
            <div class="testimonial-author">
                <p class="author-name">Reza Pratama</p>
                <p class="author-date">8 November 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 6 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Lalapan ayamnya mantap! Ayamnya garing, sambalnya pedas pas. Lalapannya fresh. Harga segitu dapet porsi gede, worth it banget!"</p>
            <div class="testimonial-author">
                <p class="author-name">Fitri Handayani</p>
                <p class="author-date">12 November 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 7 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Waroenk Qu ini tempatnya strategis, parkir gampang. Menu lengkap dari makanan berat sampe minuman. Es tehnya seger, manisnya pas!"</p>
            <div class="testimonial-author">
                <p class="author-name">Ahmad Fauzi</p>
                <p class="author-date">18 November 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 8 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Soto dagingnya kuahnya gurih, dagingnya empuk banget. Disajikan hangat dan porsinya banyak. Cocok banget buat yang lagi pengen makan berkuah."</p>
            <div class="testimonial-author">
                <p class="author-name">Linda Susanti</p>
                <p class="author-date">22 November 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 9 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Suasananya cozy, cocok buat makan santai. Pelayanannya cepat dan ramah. Harga terjangkau buat kantong mahasiswa. Recommended pokoknya!"</p>
            <div class="testimonial-author">
                <p class="author-name">Dian Purnama</p>
                <p class="author-date">26 November 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 10 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Empalnya enak, manis gurihnya pas. Lalapannya segar. Menu favorit saya kalau lagi pengen makan yang berat tapi tetap enak."</p>
            <div class="testimonial-author">
                <p class="author-name">Hendra Gunawan</p>
                <p class="author-date">1 Desember 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 11 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Kwetiaunya lembut, bumbunya meresap. Gak terlalu kenyal, pas banget teksturnya. Harga murah meriah tapi rasanya oke banget!"</p>
            <div class="testimonial-author">
                <p class="author-name">Yoga Aditya</p>
                <p class="author-date">5 Desember 2024</p>
            </div>
        </div>

        <!-- TESTIMONIAL CARD 12 -->
        <div class="testimonial-card">
            <div class="testimonial-icon">💬</div>
            <p class="testimonial-text">"Kopinya enak, pas buat temen ngobrol atau ngerjain tugas. Gak terlalu pahit, aromanya harum. Tempatnya juga nyaman buat lama-lama."</p>
            <div class="testimonial-author">
                <p class="author-name">Putri Amelia</p>
                <p class="author-date">10 Desember 2024</p>
            </div>
        </div>

    </div>

    <!-- 
        CTA SECTION
        Fungsi: Call to action untuk pelanggan baru
        Ajakan untuk mencoba sendiri
        Jika dihapus: Halaman langsung end tanpa CTA
    -->
    <div class="testimonial-cta">
        <h3>Ingin Merasakan Sendiri?</h3>
        <p>Yuk kunjungi Waroenk Qu dan rasakan kelezatan masakan kami!</p>
        <div class="cta-buttons">
            <!-- 
                BUTTON: LIHAT MENU
                Fungsi: Redirect ke halaman menu
                Style: Primary button (merah gradient)
            -->
            <a href="{{ route('menu') }}" class="btn-cta-primary">Lihat Menu</a>
            
            <!-- 
                BUTTON: HUBUNGI KAMI
                Fungsi: Redirect ke halaman kontak
                Style: Secondary button (outline yellow)
            -->
            <a href="{{ route('contact') }}" class="btn-cta-secondary">Hubungi Kami</a>
        </div>
    </div>

</section>

@endsection