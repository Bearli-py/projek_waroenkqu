{{-- 
KOTAK FOOTER (BAGIAN BAWAH WEBSITE)
Ini bagian paling bawah yang ada info warung, dan kontak.
Biasanya background gelap dengan text putih.
Kalau dihapus: Gak ada info kontak dan sosmed di bawah
--}}
<footer class="footer">
    {{-- 
    CONTAINER (PEMBATAS LEBAR)
    Sama kayak di header, biar konten footer gak melebar kemana-mana.
    Kalau dihapus: Footer melebar full layar (kurang rapi)
    --}}
    <div class="container">
        {{-- 
        ISI FOOTER (3 KOLOM)
        Pakai CSS Grid buat bagi jadi 3 kolom:
        - Kolom 1: Sosial media
        - Kolom 2: Alamat
        - Kolom 3: Kontak (phone)

        Kalau dihapus: 3 kolom jadi berantakan susunnya
        --}}
        <div class="footer-content">
            {{-- 
            KOLOM 1: INFO WARUNG
            Berisi logo, nama warung, dan tagline.
            Fungsi: Branding dan kasih tau identitas warung.
            Kalau dihapus: Pengunjung gak tau ini website warung apa
            --}}
            <div class="footer-column">
                <img src="{{ asset('images/logo/logo.png') }}" alt="Logo Waroenk Qu" class="footer-logo">
                <h3 class="footer-title">Waroenk Qu</h3>
                <p class="footer-text">Sajian Nusantara yang khas, hadir untuk Anda di tengah kehangatan suasana yang tak terlupakan.</p>
            </div>
            
            {{-- 
            KOLOM 2: LINK CEPAT
            Daftar link ke halaman penting.
            Fungsi: Biar pengunjung bisa langsung klik dari footer (gak perlu scroll ke atas).
            Kalau dihapus: Pengunjung harus scroll ke atas dulu buat pindah halaman
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Menu Cepat</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('menu') }}">Menu</a></li>
                    <li><a href="{{ route('galeri') }}">Galeri</a></li>
                    <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
            </div>
            
            {{-- 
            KOLOM 3: KONTAK & SOSIAL MEDIA
            Info kontak (telp, email, alamat) dan link ke sosmed.
            Fungsi: Biar pengunjung bisa hubungi warung.
            Kalau dihapus: Pengunjung gak tau cara hubungin warung
            --}}
            <div class="footer-column">
                <h3 class="footer-title">Hubungi Kami</h3>
                <div class="footer-contact">
                    {{-- INFO TELEPON (bisa diklik langsung nelpon) --}}
                    <div class="contact-item">
                        <img src="{{ asset('images/icon/phone.png') }}" alt="Phone">
                        <a href="tel:+6281234567890">+62 812-3456-7890</a>
                    </div>
                    {{-- INFO EMAIL (bisa diklik langsung kirim email) --}}
                    <div class="contact-item">
                        <img src="{{ asset('images/icon/email.png') }}" alt="Email">
                        <a href="mailto:info@waroenk-qu.com">info@waroenk-qu.com</a>
                    </div>
                    {{-- INFO ALAMAT (cuma text biasa) --}}
                    <div class="contact-item">
                        <img src="{{ asset('images/icon/maps.png') }}" alt="Location">
                        <span>Jl. Sukowiryo, Kec. Bondowoso
                            Bondowoso, Jawa Timur
                            Indonesia</span>
                    </div>
                </div>
                
                {{-- 
                ICON SOSIAL MEDIA
                Link ke Facebook, Instagram, dan WhatsApp warung.
                target="_blank" = buka di tab baru
                Kalau dihapus: Pengunjung gak bisa follow sosmed warung
                --}}
                <div class="social-media">
                    <a href="#" target="_blank" class="social-link">
                        <img src="{{ asset('images/icon/instagram.png') }}" alt="Instagram">
                    </a>
                    <a href="#" target="_blank" class="social-link">
                        <img src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp">
                    </a>
                </div>
            </div>
        </div>
        
        {{-- 
        COPYRIGHT (HAK CIPTA)
        Text copyright di paling bawah.
        date('Y') = tahun sekarang otomatis dari PHP (contoh: 2025)
        Kalau dihapus: Gak ada info hak cipta website
        --}}
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Waroenk Qu. All Rights Reserved.</p>
        </div>
    </div>
</footer>
