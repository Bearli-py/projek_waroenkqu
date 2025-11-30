{{-- 
FOOTER REVISI TOTAL
PERUBAHAN:
- Semua font Poppins (bukan Playfair Display)
- Icon sosmed TANPA background, cuma icon aja (32px)
- Alamat TANPA icon
- Telepon pakai icon phone.png (18px)
- Email pakai icon email.png (18px)
- WhatsApp pakai icon whatsapp.png (18px)
- Jam buka TANPA icon
Background merah #B33939, text putih
--}}
<footer class="footer">
    {{-- 
    CONTAINER
    Biar konten footer gak melebar kemana-mana, tetap rapi di tengah.
    Kalau dihapus: Footer melebar full layar (kurang rapi)
    --}}
    <div class="container">
        {{-- 
        ISI FOOTER (4 KOLOM)
        Pakai CSS Grid buat bagi jadi 4 kolom sama rata:
        - Kolom 1: Ikuti Kami (Instagram & Facebook)
        - Kolom 2: Alamat warung (tanpa icon)
        - Kolom 3: Kontak (Telepon, Email, WhatsApp dengan icon kecil)
        - Kolom 4: Jam Buka (tanpa icon)
        Kalau dihapus: 4 kolom jadi berantakan susunnya
        --}}
        <div class="footer-content">
            
            {{-- 
            =============================
            KOLOM 1: IKUTI KAMI (SOSIAL MEDIA)
            =============================
            REVISI: Icon tanpa background bulat, cuma icon aja
            Ukuran icon 32x32px
            --}}
            <div class="footer-column">
                {{-- 
                JUDUL KOLOM
                Font Poppins (REVISI: bukan Playfair Display)
                Ukuran 18px, semi-bold, warna putih
                Kalau dihapus: Gak ada judul kolom
                --}}
                <h3 class="footer-title">Ikuti Kami</h3>
                
                {{-- 
                ICON SOSIAL MEDIA (REVISI)
                Class: .social-media-new (bukan .social-media)
                Icon TANPA background bulat, cuma icon aja
                Flexbox horizontal dengan gap 15px
                Kalau dihapus: Pengunjung gak bisa follow sosmed warung
                --}}
                <div class="social-media-new">
                    {{-- 
                    LINK INSTAGRAM
                    Class: .social-link-new (bukan .social-link)
                    Tanpa background, cuma icon 32x32px
                    Hover: zoom 115% + brightness 120%
                    Ganti # dengan link Instagram asli warung
                    --}}
                    <a href="https://instagram.com/waroenk_qu" target="_blank" class="social-link-new" aria-label="Instagram">
                        <img src="{{ asset('images/icon/instagram.png') }}" alt="Instagram">
                    </a>
                    
                    {{-- 
                    LINK FACEBOOK
                    Sama kayak Instagram, cuma icon aja tanpa background
                    Ganti # dengan link Facebook asli warung
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
            REVISI: TANPA ICON, langsung text alamat aja
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Alamat</h3>
                
                {{-- 
                CONTAINER INFO (REVISI)
                Class: .footer-info-new
                Flexbox vertikal dengan gap 12px
                --}}
                <div class="footer-info-new">
                    {{-- 
                    TEXT ALAMAT (TANPA ICON) - REVISI
                    Class: .footer-text-simple
                    Font Poppins, ukuran 14px, line-height 1.8
                    LANGSUNG text aja, gak pakai icon maps
                    <br> = line break (pindah baris)
                    Kalau dihapus: Pengunjung gak tau warung di mana
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
            REVISI: Pakai icon KECIL (18x18px)
            - Telepon: icon phone.png
            - Email: icon email.png
            - WhatsApp: icon whatsapp.png
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Kontak</h3>
                
                {{-- 
                CONTAINER INFO (REVISI)
                Class: .footer-info-new
                --}}
                <div class="footer-info-new">
                    
                    {{-- 
                    TELEPON - PAKAI ICON PHONE.PNG (REVISI)
                    Class: .info-item-new
                    Icon 18x18px di sebelah kiri text
                    href="tel:..." = kalau diklik di HP langsung buka dial
                    Kalau dihapus: Gak ada info telepon
                    --}}
                    <div class="info-item-new">
                        {{-- 
                        ICON TELEPON (REVISI)
                        File: phone.png (BUKAN telepon.png!)
                        Class: .info-icon-small (ukuran 18x18px)
                        --}}
                        <img src="{{ asset('images/icon/phone.png') }}" alt="Phone" class="info-icon-small">
                        {{-- 
                        NOMOR TELEPON
                        Bisa diklik langsung nelpon
                        Hover: warna kuning #F2C94C
                        --}}
                        <a href="tel:+6285824171803">+62 858-2417-1803</a>
                    </div>
                    
                    {{-- 
                    EMAIL - PAKAI ICON EMAIL.PNG (REVISI)
                    href="mailto:..." = kalau diklik akan buka aplikasi email
                    --}}
                    <div class="info-item-new">
                        <img src="{{ asset('images/icon/email.png') }}" alt="Email" class="info-icon-small">
                        <a href="mailto:info@waroenkqu.com">info@waroenkqu.com</a>
                    </div>
                    
                    {{-- 
                    WHATSAPP - PAKAI ICON WHATSAPP.PNG (REVISI)
                    href="https://wa.me/..." = kalau diklik langsung chat WA
                    6285824171803 = nomor WA (pakai 62, gak pakai 0 di depan)
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
            REVISI: TANPA ICON, langsung text jam buka aja
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Jam Buka</h3>
                
                <div class="footer-info-new">
                    {{-- 
                    JAM BUKA WEEKDAY (Senin-Jumat) - TANPA ICON (REVISI)
                    Class: .footer-text-simple
                    <strong> = text bold untuk "Senin - Jumat"
                    <br> = pindah baris
                    Kalau dihapus: Gak ada info jam buka weekday
                    --}}
                    <p class="footer-text-simple">
                        <strong>Senin — Jumat</strong><br>
                        08.00 – 21.00 WIB
                    </p>
                    
                    {{-- 
                    JAM BUKA WEEKEND (Sabtu-Minggu)
                    style="margin-top: 15px;" = jarak dari jam buka weekday
                    Jadwal beda dari weekday (lebih pagi buka, lebih malam tutup)
                    Kalau dihapus: Gak ada info jam buka weekend
                    --}}
                    <p class="footer-text-simple" style="margin-top: 15px;">
                        <strong>Sabtu — Minggu</strong><br>
                        06.00 – 22.00 WIB
                    </p>
                </div>
            </div>
            
        </div>
        
        {{-- 
        COPYRIGHT (HAK CIPTA)
        Text copyright di paling bawah dengan background lebih gelap.
        date('Y') = tahun sekarang otomatis dari PHP (2025)
        Font Poppins 14px
        Kalau dihapus: Gak ada info hak cipta website
        --}}
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Waroenk Qu. All Rights Reserved.</p>
        </div>
    </div>
</footer>
