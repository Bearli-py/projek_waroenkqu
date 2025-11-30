@extends('layouts.app')

@section('title', 'Kontak - Waroenk Qu')
@section('meta_description', 'Hubungi Waroenk Qu - Alamat, telepon, email, dan jam operasional. Kunjungi kami atau hubungi via WhatsApp')

@section('content')

<!-- 
    PAGE HEADER
    Fungsi: Banner header halaman kontak
    Background: Gradient merah
-->
<section class="page-header">
    <h2>Hubungi <span class="highlight">Kami</span></h2>
    <p>Kami siap melayani Anda. Jangan ragu untuk menghubungi kami!</p>
</section>

<!-- 
    CONTACT SECTION
    Fungsi: Section utama halaman kontak
    Layout: Contact info boxes + Google Maps
-->
<section class="section contact-section">
    
    <!-- 
        CONTACT INFO GRID
        Fungsi: Grid 4 kotak info kontak
        Grid: 4 kolom di desktop, 2 di tablet, 1 di mobile
        Hover effect: Garis border muncul, shadow lebih besar
        Jika dihapus: Info kontak tidak tampil
    -->
    <div class="contact-info-grid">
        
        <!-- 
            CONTACT BOX 1: ALAMAT
            Fungsi: Menampilkan alamat waroenk
            Icon: map.png
            Hover effect:
            - Border 3px solid kuning (#F2C94C)
            - Shadow meningkat
            - Card naik 4px (translateY)
            Jika dihapus: Alamat tidak tampil
        -->
        <div class="contact-box">
            <!-- 
                CONTACT ICON
                Fungsi: Icon untuk visual appeal
                Size: 48px x 48px
                Margin bottom: 16px
            -->
            <div class="contact-icon">
                <img src="{{ asset('images/icon/map.png') }}" alt="Alamat">
            </div>
            
            <!-- 
                CONTACT TITLE
                Fungsi: Label "Alamat"
                Font: Poppins 20px Bold
            -->
            <h3 class="contact-title">Alamat</h3>
            
            <!-- 
                CONTACT TEXT
                Fungsi: Detail alamat lengkap
                Font: Inter 15px Regular
                Color: Text gray
            -->
            <p class="contact-text">Jl. Contoh No. 123<br>Jember, Jawa Timur<br>Indonesia 68100</p>
        </div>

        <!-- 
            CONTACT BOX 2: TELEPON
            Fungsi: Menampilkan nomor telepon
            Icon: telepon.png
            Click: Langsung call (tel: protocol)
        -->
        <div class="contact-box">
            <div class="contact-icon">
                <img src="{{ asset('images/icon/telepon.png') }}" alt="Telepon">
            </div>
            <h3 class="contact-title">Telepon</h3>
            <!-- 
                PHONE LINK
                Fungsi: Klik untuk langsung call
                href="tel:+6281234567890": Protocol untuk phone call
                Jika dihapus: Nomor tidak bisa diklik untuk call
            -->
            <p class="contact-text">
                <a href="tel:+6281234567890" class="contact-link">0812-3456-7890</a>
            </p>
            <!-- 
                WHATSAPP LINK
                Fungsi: Klik untuk buka WhatsApp
                Target _blank: Buka di tab/app baru
            -->
            <p class="contact-text">
                <a href="https://wa.me/6281234567890" target="_blank" class="contact-link contact-wa">
                    <img src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp" class="wa-icon">
                    WhatsApp
                </a>
            </p>
        </div>

        <!-- 
            CONTACT BOX 3: EMAIL
            Fungsi: Menampilkan alamat email
            Icon: email merah.png (sesuai desain)
            Click: Buka email client (mailto: protocol)
        -->
        <div class="contact-box">
            <div class="contact-icon">
                <img src="{{ asset('images/icon/email merah.png') }}" alt="Email">
            </div>
            <h3 class="contact-title">Email</h3>
            <!-- 
                EMAIL LINK
                Fungsi: Klik untuk buka email client
                href="mailto:...": Protocol untuk email
                Jika dihapus: Email tidak bisa diklik untuk kirim email
            -->
            <p class="contact-text">
                <a href="mailto:info@waroenkqu.com" class="contact-link">info@waroenkqu.com</a>
            </p>
        </div>

        <!-- 
            CONTACT BOX 4: JAM BUKA
            Fungsi: Menampilkan jam operasional
            Icon: jam buka.png
            No link: Hanya informasi
        -->
        <div class="contact-box">
            <div class="contact-icon">
                <img src="{{ asset('images/icon/jam buka.png') }}" alt="Jam Buka">
            </div>
            <h3 class="contact-title">Jam Buka</h3>
            <p class="contact-text">
                <strong>Setiap Hari</strong><br>
                08.00 - 21.00 WIB
            </p>
        </div>

    </div>

    <!-- 
        MAPS SECTION
        Fungsi: Menampilkan Google Maps embed
        Layout: Full width di bawah contact boxes
        Jika dihapus: Tidak ada peta lokasi
    -->
    <div class="contact-maps">
        <!-- 
            MAPS TITLE
            Fungsi: Judul section maps
        -->
        <h3 class="maps-title">Lokasi Kami di Google Maps</h3>
        
        <!-- 
            MAPS CONTAINER
            Fungsi: Wrapper untuk iframe Google Maps
            Aspect ratio: 16:9 via padding-bottom trick
            Jika dihapus: Maps tidak tampil
        -->
        <div class="maps-container">
            <!-- 
                GOOGLE MAPS IFRAME
                Fungsi: Embed Google Maps
                src="[GOOGLE_MAPS_EMBED_LINK]": Link embed dari Google Maps
                TODO: Ganti dengan link Google Maps sebenarnya
                allowfullscreen: Bisa fullscreen
                loading="lazy": Load maps saat scroll (performance optimization)
                Jika dihapus: Iframe kosong
            -->
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.365842069579!2d113.70115931477967!3d-8.160499894199684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                title="Lokasi Waroenk Qu">
            </iframe>
            
            <!-- 
                NOTE: Link Google Maps di atas adalah contoh (Politeknik Negeri Jember)
                Nanti diganti dengan koordinat/alamat Waroenk Qu yang sebenarnya
                Cara dapat link embed:
                1. Buka Google Maps
                2. Cari lokasi Waroenk Qu
                3. Klik Share > Embed a map
                4. Copy iframe code
                5. Paste di sini
            -->
        </div>

        <!-- 
            MAPS LINK BUTTON
            Fungsi: Button untuk buka Google Maps di app/browser
            Target _blank: Buka di tab/app baru
        -->
        <div class="maps-button">
            <a href="https://maps.google.com" target="_blank" class="btn-maps">
                <img src="{{ asset('images/icon/maps.png') }}" alt="Google Maps" class="maps-btn-icon">
                Buka di Google Maps
            </a>
        </div>
    </div>

    <!-- 
        CONTACT FORM SECTION (OPTIONAL)
        Fungsi: Form kontak untuk kirim pesan
        Bisa diaktifkan jika perlu fitur kirim pesan
        Jika tidak perlu, bisa dihapus atau di-comment
    -->
    <div class="contact-form-section">
        <h3 class="form-title">Kirim Pesan</h3>
        <p class="form-subtitle">Punya pertanyaan atau saran? Kirim pesan kepada kami!</p>
        
        <!-- 
            CONTACT FORM
            Fungsi: Form input untuk kirim pesan
            Method POST: Kirim data ke server
            Action: Route ke ContactController (backend)
            @csrf: Token Laravel untuk security
        -->
        <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
            @csrf
            
            <!-- 
                FORM ROW: NAMA & EMAIL
                Fungsi: Layout 2 kolom untuk Nama dan Email
                Grid: 2 kolom di desktop, 1 di mobile
            -->
            <div class="form-row">
                <!-- 
                    INPUT: NAMA
                    Fungsi: Input nama pengirim
                    Required: Wajib diisi
                    Placeholder: Hint text
                -->
                <div class="form-group">
                    <label for="name">Nama <span class="required">*</span></label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Nama Anda" required>
                </div>
                
                <!-- 
                    INPUT: EMAIL
                    Fungsi: Input email pengirim
                    Type email: Validasi format email otomatis
                    Required: Wajib diisi
                -->
                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="email@example.com" required>
                </div>
            </div>

            <!-- 
                INPUT: SUBJEK
                Fungsi: Input subjek pesan
                Optional: Tidak wajib diisi
            -->
            <div class="form-group">
                <label for="subject">Subjek</label>
                <input type="text" id="subject" name="subject" class="form-input" placeholder="Subjek pesan">
            </div>

            <!-- 
                TEXTAREA: PESAN
                Fungsi: Input isi pesan
                Rows 6: Tinggi default 6 baris
                Required: Wajib diisi
            -->
            <div class="form-group">
                <label for="message">Pesan <span class="required">*</span></label>
                <textarea id="message" name="message" rows="6" class="form-input" placeholder="Tulis pesan Anda di sini..." required></textarea>
            </div>

            <!-- 
                SUBMIT BUTTON
                Fungsi: Tombol kirim form
                Type submit: Trigger form submission
                Style: Primary button merah
            -->
            <div class="form-group">
                <button type="submit" class="btn-submit">
                    Kirim Pesan
                </button>
            </div>
        </form>
    </div>

</section>

@endsection