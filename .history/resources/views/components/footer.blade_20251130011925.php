{{-- 
==============================================
FOOTER - WAROENK QU
==============================================
File ini berisi footer yang muncul di SEMUA halaman website
Background: Merah #B33939, text putih
Layout: 4 kolom (Ikuti Kami, Alamat, Kontak, Jam Buka) + Copyright di bawah icon sosmed
Kalau dihapus: Semua halaman gak punya footer
--}}
<footer class="footer">
    {{-- 
    CONTAINER
    Fungsi: Pembatas lebar konten (max-width 1200px, center)
    Padding horizontal: 20px (biar gak nempel tepi layar)
    --}}
    <div class="container">
        {{-- 
        ISI FOOTER - 4 KOLOM
        CSS Grid: 4 kolom sama lebar (desktop)
        Gap: 40px (jarak antar kolom)
        Margin-bottom: 30px (jarak ke copyright di bawah)
        Responsive: 2 kolom (tablet), 1 kolom (mobile)
        --}}
        <div class="footer-content">
            
            {{-- 
            =============================
            KOLOM 1: IKUTI KAMI (SOSIAL MEDIA)
            =============================
            Berisi: Icon Instagram dan Facebook
            Icon: TANPA background bulat, cuma icon aja (32x32px)
            Hover: Zoom 115% + brightness 120%
            --}}
            <div class="footer-column">
                {{-- 
                JUDUL KOLOM
                Font: Poppins 18px, semi-bold, warna putih
                Margin-bottom: 20px (jarak ke icon di bawah)
                --}}
                <h3 class="footer-title">Ikuti Kami</h3>
                
                {{-- 
                CONTAINER ICON SOSMED
                Class: social-media-new (layout baru)
                Flexbox horizontal dengan gap 15px
                Icon tanpa background bulat (beda dari versi lama)
                --}}
                <div class="social-media-new">
                    {{-- 
                    LINK INSTAGRAM
                    Class: social-link-new (tanpa background)
                    Icon: 32x32px
                    Target: _blank (buka di tab baru)
                    Aria-label: Untuk accessibility (screen reader)
                    Hover: Zoom 115% + lebih terang
                    
                    GANTI URL dengan Instagram asli warung kamu!
                    --}}
                    <a href="https://instagram.com/waroenkqu_" target="_blank" class="social-link-new" aria-label="Instagram">
                        <img src="{{ asset('images/icon/instagram.png') }}" alt="Instagram">
                    </a>
                    
                    {{-- 
                    LINK FACEBOOK
                    Sama kayak Instagram, cuma icon aja tanpa background
                    --}}
                    <a href="https://facebook.com/waroenkqu" target="_blank" class="social-link-new" aria-label="Facebook">
                        <img src="{{ asset('images/icon/facebook.png') }}" alt="Facebook">
                    </a>
                </div>
                
            </div>
            
            {{-- 
            =============================
            KOLOM 2: ALAMAT
            =============================
            Berisi: Alamat lengkap warung
            TANPA ICON (langsung text aja sesuai desain)
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Alamat</h3>
                
                {{-- 
                CONTAINER INFO
                Class: footer-info-new
                Flexbox vertikal dengan gap 12px
                --}}
                <div class="footer-info-new">
                    {{-- 
                    TEXT ALAMAT
                    Class: footer-text-simple
                    Font: Poppins 14px, line-height 1.8, warna putih
                    TANPA ICON (sesuai desain yang kamu minta)
                    <br> = line break (pindah baris)
                    
                    GANTI dengan alamat asli warung kamu!
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
            Berisi: Telepon, Email, WhatsApp
            DENGAN ICON KECIL (18x18px) di sebelah kiri text
            Icon: phone.png, email.png, whatsapp.png
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Kontak</h3>
                
                <div class="footer-info-new">
                    
                    {{-- 
                    TELEPON
                    Class: info-item-new (flexbox horizontal)
                    Icon: phone.png (18x18px) - PASTIKAN FILE INI ADA!
                    Link: tel:+... (kalau diklik di HP langsung buka dial)
                    Hover: Text jadi kuning #F2C94C
                    
                    GANTI dengan nomor telepon asli warung kamu!
                    --}}
                    <div class="info-item-new">
                        <img src="{{ asset('images/icon/phone.png') }}" alt="Phone" class="info-icon-small">
                        <a href="tel:+6285824171803">+62 858-2417-1803</a>
                    </div>
                    
                    {{-- 
                    EMAIL
                    Icon: email.png (18x18px)
                    Link: mailto:... (kalau diklik buka aplikasi email)
                    
                    GANTI dengan email asli warung kamu!
                    --}}
                    <div class="info-item-new">
                        <img src="{{ asset('images/icon/email.png') }}" alt="Email" class="info-icon-small">
                        <a href="mailto:info@waroenkqu.com">info@waroenkqu.com</a>
                    </div>
                    
                    {{-- 
                    WHATSAPP
                    Icon: whatsapp.png (18x18px)
                    Link: https://wa.me/... (kalau diklik buka WhatsApp)
                    Format nomor: 62xxxxxxxxxx (pakai 62, gak pakai 0 di depan)
                    Target: _blank (buka di tab/app baru)
                    
                    GANTI dengan nomor WhatsApp asli warung kamu!
                    --}}
                    <div class="info-item-new">
                        <img src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp" class="info-icon-small">
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
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Jam Buka</h3>
                
                <div class="footer-info-new">
                    {{-- 
                    JAM BUKA WEEKDAY (Senin - Jumat)
                    Class: footer-text-simple
                    <strong> = text bold untuk hari
                    <br> = pindah baris
                    
                    GANTI dengan jam buka asli warung kamu!
                    --}}
                    <p class="footer-text-simple">
                        <strong>Senin — Jumat</strong><br>
                        08.00 – 21.00 WIB
                    </p>
                    
                    {{-- 
                    JAM BUKA WEEKEND (Sabtu - Minggu)
                    Style margin-top: Jarak dari jam buka weekday (15px)
                    Jadwal weekend biasanya beda (lebih pagi buka, lebih malam tutup)
                    
                    GANTI dengan jam buka asli warung kamu!
                    --}}
                    <p class="footer-text-simple" style="margin-top: 15px;">
                        <strong>Sabtu — Minggu</strong><br>
                        06.00 – 22.00 WIB
                    </p>
                </div>
            </div>
            
        </div>
        
        {{-- 
        =============================
        COPYRIGHT (HAK CIPTA)
        =============================
        POSISI: Di bawah icon sosmed (Kolom 1: Ikuti Kami)
        Background: Lebih gelap sedikit (rgba 0,0,0,0.2)
        Padding: 20px atas bawah
        Text: Center, ukuran 14px
        --}}
        <div class="footer-bottom">
            {{-- 
            TEXT COPYRIGHT
            {{ date('Y') }} = tahun sekarang otomatis dari PHP (2025)
            &copy; = simbol copyright (©)
            Font: Poppins 14px, warna putih
            --}}
            <p>&copy; {{ date('Y') }} Waroenk Qu. All Rights Reserved.</p>
        </div>
    </div>
</footer>