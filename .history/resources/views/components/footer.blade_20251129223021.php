{{-- 
KOTAK FOOTER (BAGIAN BAWAH WEBSITE)
Ini bagian paling bawah dengan background merah.
Berisi 4 kolom: Ikuti Kami, Alamat, Kontak, Jam Buka
Kalau dihapus: Gak ada info kontak dan jam operasional warung
--}}
<footer class="footer">
    {{-- 
    CONTAINER (PEMBATAS LEBAR)
    Biar konten footer gak melebar kemana-mana, tetap rapi di tengah.
    Kalau dihapus: Footer melebar full layar (kurang rapi)
    --}}
    <div class="container">
        {{-- 
        ISI FOOTER (4 KOLOM)
        Pakai CSS Grid buat bagi jadi 4 kolom sama rata:
        - Kolom 1: Ikuti Kami (Instagram & Facebook)
        - Kolom 2: Alamat warung
        - Kolom 3: Kontak (Telepon, Email, WhatsApp)
        - Kolom 4: Jam Buka
        Kalau dihapus: 4 kolom jadi berantakan susunnya
        --}}
        <div class="footer-content">
            {{-- 
            KOLOM 1: IKUTI KAMI (SOSIAL MEDIA)
            Berisi link ke Instagram dan Facebook warung.
            Icon putih bulat dengan link yang bisa diklik.
            Kalau dihapus: Pengunjung gak bisa follow sosmed warung
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Ikuti Kami</h3>
                <div class="social-media">
                    {{-- 
                    LINK INSTAGRAM
                    target="_blank" = buka di tab baru (gak ganggu website)
                    Ganti # dengan link Instagram asli warung
                    --}}
                    <a href="https://instagram.com/waroenkqu_" target="_blank" class="social-link" aria-label="Instagram">
                        <img src="{{ asset('images/icon/instagram.png') }}" alt="Instagram">
                    </a>
                    
                    {{-- 
                    LINK FACEBOOK
                    Sama kayak Instagram, ganti # dengan link Facebook asli
                    --}}
                    <a href="https://facebook.com/waroenkqu_" target="_blank" class="social-link" aria-label="Facebook">
                        <img src="{{ asset('images/icon/facebook.png') }}" alt="Facebook">
                    </a>
                </div>
            </div>
            
            {{-- 
            KOLOM 2: ALAMAT WARUNG
            Alamat lengkap warung dengan icon lokasi.
            Kalau dihapus: Pengunjung gak tau warung di mana
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Alamat</h3>
                <div class="footer-info">
                    {{-- 
                    INFO ALAMAT
                    Icon map + text alamat lengkap
                    <p> = paragraph untuk text yang panjang
                    --}}
                    <div class="info-item">
                        <img src="{{ asset('images/icon/maps.png') }}" alt="Lokasi" class="info-icon">
                        <p>Jl. Sukowiyo, Kec. Bondowoso<br>Bondowoso, Jawa Timur<br>Indonesia</p>
                    </div>
                </div>
            </div>
            
            {{-- 
            KOLOM 3: KONTAK
            Info kontak lengkap (Telepon, Email, WhatsApp).
            Semua bisa diklik langsung (call, email, chat WA).
            Kalau dihapus: Pengunjung susah hubungi warung
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Kontak</h3>
                <div class="footer-info">
                    {{-- 
                    TELEPON
                    href="tel:..." = kalau diklik langsung nelpon
                    Icon telepon + nomor yang bisa diklik
                    --}}
                    <div class="info-item">
                        <img src="{{ asset('images/icon/telepon.png') }}" alt="Telepon" class="info-icon">
                        <a href="tel:+6285824171803">+62 858-2417-1803</a>
                    </div>
                    
                    {{-- 
                    EMAIL
                    href="mailto:..." = kalau diklik langsung buka email
                    Icon email + alamat email yang bisa diklik
                    --}}
                    <div class="info-item">
                        <img src="{{ asset('images/icon/email.png') }}" alt="Email" class="info-icon">
                        <a href="mailto:info@waroenkqu.com">info@waroenkqu.com</a>
                    </div>
                    
                    {{-- 
                    WHATSAPP
                    href="https://wa.me/..." = kalau diklik langsung chat WA
                    6285824171803 = nomor WA (pakai 62, gak pakai 0 di depan)
                    Icon WA + text "Chat WhatsApp"
                    --}}
                    <div class="info-item">
                        <img src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp" class="info-icon">
                        <a href="https://wa.me/6285824171803" target="_blank">Chat WhatsApp</a>
                    </div>
                </div>
            </div>
            
            {{-- 
            KOLOM 4: JAM BUKA
            Jadwal operasional warung (Senin-Jumat dan Sabtu-Minggu).
            Icon jam + info jam buka.
            Kalau dihapus: Pengunjung gak tau kapan warung buka
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Jam Buka</h3>
                <div class="footer-info">
                    {{-- 
                    JAM BUKA WEEKDAY (Senin-Jumat)
                    Icon jam + text jadwal
                    <br> = line break (pindah baris)
                    --}}
                    <div class="info-item">
                        <img src="{{ asset('images/icon/jam buka.png') }}" alt="Jam Buka" class="info-icon">
                        <p>
                            <strong>Senin – Jumat</strong><br>
                            08.00 – 21.00 WIB
                        </p>
                    </div>
                    
                    {{-- 
                    JAM BUKA WEEKEND (Sabtu-Minggu)
                    Jadwal beda dari weekday (lebih pagi buka, lebih malam tutup)
                    --}}
                    <div class="info-item">
                        <img src="{{ asset('images/icon/jam buka.png') }}" alt="Jam Buka" class="info-icon">
                        <p>
                            <strong>Sabtu – Minggu</strong><br>
                            06.00 – 22.00 WIB
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- 
        COPYRIGHT (HAK CIPTA)
        Text copyright di paling bawah dengan background lebih gelap.
        date('Y') = tahun sekarang otomatis (2025)
        Kalau dihapus: Gak ada info hak cipta website
        --}}
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Waroenk Qu. All Rights Reserved.</p>
        </div>
    </div>
</footer>
