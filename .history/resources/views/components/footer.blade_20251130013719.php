{{-- 
==============================================
FOOTER - WAROENK QU (REVISI FINAL)
==============================================
File ini berisi footer yang muncul di SEMUA halaman website
Fungsi: Menampilkan informasi penting (sosmed, alamat, kontak, jam buka)
Background: Merah #B33939, text putih
Layout: 4 kolom horizontal (Grid CSS)
Copyright: Di dalam kolom "Ikuti Kami" (di bawah icon sosmed)
Kalau dihapus: Semua halaman gak punya footer
--}}
<footer class="footer">
    {{-- 
    CONTAINER
    Fungsi: Pembatas lebar konten (max-width 1200px, center)
    Padding: 20px kiri-kanan biar gak nempel tepi layar
    Kenapa perlu: Biar konten footer gak melebar kemana-mana di layar besar
    Kalau dihapus: Footer melebar full screen (kurang rapi)
    --}}
    <div class="container">
        {{-- 
        ISI FOOTER - 4 KOLOM
        Class: footer-content
        Layout: CSS Grid 4 kolom sama lebar
        Gap: 40px (jarak antar kolom)
        Responsive:
        - Desktop (>992px): 4 kolom horizontal
        - Tablet (768px-992px): 2 kolom (2x2 grid)
        - Mobile (<768px): 1 kolom susun kebawah
        Kalau dihapus: 4 kolom jadi berantakan susunnya
        --}}
        <div class="footer-content">
            
            {{-- 
            =============================
            KOLOM 1: IKUTI KAMI (SOSIAL MEDIA + COPYRIGHT)
            =============================
            Berisi:
            - Judul "Ikuti Kami"
            - Icon Instagram dan Facebook (horizontal, tanpa background)
            - Copyright text (di bawah icon)
            Kalau dihapus: Pengunjung gak bisa follow sosmed warung
            --}}
            <div class="footer-column">
                {{-- 
                JUDUL KOLOM
                Class: footer-title
                Font: Poppins 18px, semi-bold (600), warna putih
                Margin-bottom: 20px (jarak ke konten di bawah)
                Kenapa Poppins: Konsisten dengan desain (bukan Playfair Display)
                Kalau dihapus: Gak ada judul "Ikuti Kami"
                --}}
                <h3 class="footer-title">Ikuti Kami</h3>
                
                {{-- 
                CONTAINER ICON SOSIAL MEDIA
                Class: social-media-new (layout baru tanpa background bulat)
                Layout: Flexbox horizontal
                Gap: 15px (jarak antara icon Instagram dan Facebook)
                Align-items: center (biar icon sejajar vertikal)
                Kalau dihapus: Icon sosmed berantakan atau gak muncul
                --}}
                <div class="social-media-new">
                    {{-- 
                    LINK INSTAGRAM
                    Class: social-link-new (tanpa background bulat)
                    Icon: instagram.png (32x32 pixel)
                    Target: _blank (buka di tab baru)
                    Aria-label: "Instagram" (untuk screen reader accessibility)
                    Hover: Zoom 115% + brightness 120% (lebih terang)
                    
                    GANTI URL DENGAN INSTAGRAM ASLI WARUNG!
                    Format: https://instagram.com/username_warung
                    Kalau dihapus: Pengunjung gak bisa ke Instagram warung
                    --}}
                    <a href="https://instagram.com/waroenk_qu" target="_blank" class="social-link-new" aria-label="Instagram">
                        {{-- 
                        GAMBAR ICON INSTAGRAM
                        Path: public/images/icon/instagram.png
                        Size: 32x32px (diatur di CSS)
                        Alt: "Instagram" (untuk accessibility)
                        PASTIKAN FILE INI ADA!
                        --}}
                        <img src="{{ asset('images/icon/instagram.png') }}" alt="Instagram">
                    </a>
                    
                    {{-- 
                    LINK FACEBOOK
                    Sama persis kayak Instagram, cuma icon dan URL berbeda
                    Icon: facebook.png (32x32 pixel)
                    
                    GANTI URL DENGAN FACEBOOK ASLI WARUNG!
                    Format: https://facebook.com/username_warung
                    Kalau dihapus: Pengunjung gak bisa ke Facebook warung
                    --}}
                    <a href="https://facebook.com/waroenkqu" target="_blank" class="social-link-new" aria-label="Facebook">
                        <img src="{{ asset('images/icon/facebook.png') }}" alt="Facebook">
                    </a>
                </div>
                
                {{-- 
                COPYRIGHT TEXT (DI BAWAH ICON SOSMED)
                Class: footer-copyright
                Font: Poppins 12px, warna putih, opacity 90%
                Margin-top: 20px (jarak dari icon sosmed di atas)
                Line-height: 1.6 (jarak antar baris)
                <br> = line break (pindah baris)
                {{ date('Y') }} = tahun sekarang otomatis dari PHP (2025)
                &copy; = simbol copyright (©)
                
                INI SATU-SATUNYA COPYRIGHT! Gak ada copyright lain di tempat lain!
                Kalau dihapus: Gak ada info hak cipta website
                --}}
                <p class="footer-copyright">&copy; {{ date('Y') }} Waroenk Qu.<br>All Rights Reserved.</p>
            </div>
            
            {{-- 
            =============================
            KOLOM 2: ALAMAT
            =============================
            Berisi: Alamat lengkap warung (3 baris)
            TANPA ICON (langsung text aja sesuai desain)
            Kalau dihapus: Pengunjung gak tau warung di mana
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Alamat</h3>
                
                {{-- 
                CONTAINER INFO ALAMAT
                Class: footer-info-new
                Layout: Flexbox vertikal
                Gap: 12px (jarak antar item, tapi di alamat cuma 1 item)
                --}}
                <div class="footer-info-new">
                    {{-- 
                    TEXT ALAMAT (TANPA ICON)
                    Class: footer-text-simple
                    Font: Poppins 14px, line-height 1.8, warna putih
                    TANPA ICON maps (sesuai permintaan desain)
                    <br> = line break (pindah baris)
                    
                    GANTI DENGAN ALAMAT ASLI WARUNG!
                    Format: Jalan, Kecamatan, Kabupaten, Provinsi, Indonesia
                    Kalau dihapus: Gak ada info alamat
                    --}}
                    <p class="footer-text-simple">
                        Jl. Sukowiyo, Kec. Bondowoso<br>
                        Bondowoso, Jawa Timur<br>
                        Indonesia
                    </p>
                </div>
            </div>
            
            {{-- 
            =============================
            KOLOM 3: KONTAK
            =============================
            Berisi: 3 kontak (Telepon, Email, WhatsApp)
            DENGAN ICON KECIL (18x18px) di sebelah kiri text
            Icon: phone.png, email.png, whatsapp.png
            Kalau dihapus: Pengunjung gak bisa kontak warung
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Kontak</h3>
                
                {{-- 
                CONTAINER INFO KONTAK
                Class: footer-info-new
                Layout: Flexbox vertikal
                Gap: 12px (jarak antar item kontak)
                --}}
                <div class="footer-info-new">
                    
                    {{-- 
                    ITEM 1: TELEPON
                    Class: info-item-new (flexbox horizontal untuk icon + text)
                    Layout: Icon 18px di kiri, text di kanan
                    Gap: 10px (jarak icon ke text)
                    Align-items: center (vertikal tengah)
                    --}}
                    <div class="info-item-new">
                        {{-- 
                        ICON TELEPON
                        File: phone.png (18x18px)
                        Class: info-icon-small (ukuran 18x18px diatur di CSS)
                        Flex-shrink: 0 (icon gak boleh mengecil kalau text panjang)
                        PASTIKAN FILE phone.png ADA DI public/images/icon/
                        Kalau file gak ada: Icon gak muncul (broken image)
                        --}}
                        <img src="{{ asset('images/icon/phone.png') }}" alt="Phone" class="info-icon-small">
                        {{-- 
                        NOMOR TELEPON (LINK)
                        href="tel:+..." = kalau diklik di HP langsung buka dial
                        Format nomor: +62xxxxxxxxxx (pakai +62, gak pakai 0 di depan)
                        Font: Poppins 14px, warna putih
                        Hover: Warna jadi kuning #F2C94C
                        
                        GANTI DENGAN NOMOR TELEPON ASLI WARUNG!
                        Kalau dihapus: Pengunjung gak bisa telepon
                        --}}
                        <a href="tel:+6285824171803">+62 858-2417-1803</a>
                    </div>
                    
                    {{-- 
                    ITEM 2: EMAIL
                    Struktur sama persis kayak Telepon
                    Icon: email.png (18x18px)
                    --}}
                    <div class="info-item-new">
                        <img src="{{ asset('images/icon/email.png') }}" alt="Email" class="info-icon-small">
                        {{-- 
                        ALAMAT EMAIL (LINK)
                        href="mailto:..." = kalau diklik buka aplikasi email
                        Hover: Warna jadi kuning #F2C94C
                        
                        GANTI DENGAN EMAIL ASLI WARUNG!
                        Kalau dihapus: Pengunjung gak bisa kirim email
                        --}}
                        <a href="mailto:info@waroenkqu.com">info@waroenkqu.com</a>
                    </div>
                    
                    {{-- 
                    ITEM 3: WHATSAPP
                    Icon: whatsapp.png (18x18px)
                    --}}
                    <div class="info-item-new">
                        <img src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp" class="info-icon-small">
                        {{-- 
                        LINK WHATSAPP
                        href="https://wa.me/..." = kalau diklik langsung chat WA
                        Format nomor: 62xxxxxxxxxx (pakai 62, gak pakai 0 di depan, gak pakai +)
                        Target: _blank (buka di tab/app baru)
                        Hover: Warna jadi kuning #F2C94C
                        
                        NOMOR WHATSAPP ASLI WARUNG!
                        Kalau dihapus: Pengunjung gak bisa chat WhatsApp
                        --}}
                        <a href="https://wa.me/6285824171803" target="_blank">Chat WhatsApp</a>
                    </div>
                    
                </div>
            </div>
            
            {{-- 
            =============================
            KOLOM 4: JAM BUKA
            =============================
            Berisi: Jadwal operasional warung (weekday & weekend)
            TANPA ICON (langsung text aja sesuai desain)
            2 paragraf: Senin-Jumat dan Sabtu-Minggu
            Kalau dihapus: Pengunjung gak tau kapan warung buka
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Jam Buka</h3>
                
                <div class="footer-info-new">
                    {{-- 
                    JAM BUKA WEEKDAY (SENIN - JUMAT)
                    Class: footer-text-simple
                    Font: Poppins 14px, line-height 1.8, warna putih
                    <strong> = text bold untuk hari (Senin — Jumat)
                    <br> = pindah baris
                    — = dash panjang (bukan minus biasa)
                    
                    JAM BUKA WARUNG!
                    Format: HH.MM – HH.MM WIB
                    Kalau dihapus: Gak ada info jam buka weekday
                    --}}
                    <p class="footer-text-simple">
                        <strong>Senin — Jumat</strong><br>
                        08.00 – 21.00 WIB
                    </p>
                    
                    {{-- 
                    JAM BUKA WEEKEND (SABTU - MINGGU)
                    Style inline: margin-top 15px (jarak dari jam buka weekday)
                    Biasanya jam buka weekend beda (lebih pagi buka, lebih malam tutup)
                    
                    JAM BUKA WARUNG
                    Kalau dihapus: Gak ada info jam buka weekend
                    --}}
                    <p class="footer-text-simple" style="margin-top: 15px;">
                        <strong>Sabtu — Minggu</strong><br>
                        06.00 – 22.00 WIB
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</footer>