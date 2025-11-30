<!-- 
    FOOTER
    Fungsi: Menampilkan informasi kontak, sosial media, dan copyright
    Jika dihapus: Website tidak punya footer info
-->
<footer class="footer">
    <!-- 
        FOOTER CONTAINER
        Fungsi: Wrapper untuk layout footer
        Jika dihapus: Layout footer berantakan
    -->
    <div class="footer-container">
        
        <!-- 
            FOOTER COLUMN 1: TENTANG
            Fungsi: Info singkat tentang waroenk
            Jika dihapus: Footer tidak ada deskripsi tentang waroenk
        -->
        <div class="footer-section">
            <h3>Tentang Waroenk Qu</h3>
            <p>Waroenk Qu menyajikan masakan tradisional Indonesia dengan cita rasa autentik dan harga yang terjangkau. Tempat makan yang nyaman untuk keluarga dan teman-teman.</p>
        </div>
        
        <!-- 
            FOOTER COLUMN 2: KONTAK
            Fungsi: Informasi kontak (alamat, telepon, email)
            Jika dihapus: User tidak tahu cara menghubungi waroenk
        -->
        <div class="footer-section">
            <h3>Kontak Kami</h3>
            <ul class="footer-contact">
                <!-- 
                    ALAMAT
                    Icon: map.png
                -->
                <li>
                    <img src="{{ asset('images/icon/map.png') }}" alt="Alamat" class="footer-icon">
                    <span>Jl. Contoh No. 123, Jember</span>
                </li>
                
                <!-- 
                    TELEPON
                    Icon: telepon.png
                    Fungsi: Klik untuk langsung call
                -->
                <li>
                    <img src="{{ asset('images/icon/telepon.png') }}" alt="Telepon" class="footer-icon">
                    <a href="tel:+6281234567890">0812-3456-7890</a>
                </li>
                
                <!-- 
                    EMAIL
                    Icon: email.png
                    Fungsi: Klik untuk buka email client
                -->
                <li>
                    <img src="{{ asset('images/icon/email.png') }}" alt="Email" class="footer-icon">
                    <a href="mailto:info@waroenkqu.com">info@waroenkqu.com</a>
                </li>
                
                <!-- 
                    JAM BUKA
                    Icon: jam buka.png
                -->
                <li>
                    <img src="{{ asset('images/icon/jam buka.png') }}" alt="Jam Buka" class="footer-icon">
                    <span>Setiap hari: 08.00 - 21.00 WIB</span>
                </li>
            </ul>
        </div>
        
        <!-- 
            FOOTER COLUMN 3: SOSIAL MEDIA
            Fungsi: Link ke sosial media waroenk
            Jika dihapus: User tidak bisa follow sosmed waroenk
        -->
        <div class="footer-section">
            <h3>Ikuti Kami</h3>
            <!-- 
                SOCIAL MEDIA ICONS
                Fungsi: Link ke masing-masing platform
                Target _blank: Buka di tab baru
                Rel noopener noreferrer: Keamanan untuk external links
            -->
            <div class="social-icons">
                <!-- Facebook -->
                <a href="#" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Facebook">
                    <img src="{{ asset('images/icon/facebook.png') }}" alt="Facebook">
                </a>
                
                <!-- Instagram -->
                <a href="#" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Instagram">
                    <img src="{{ asset('images/icon/instagram.png') }}" alt="Instagram">
                </a>
                
                <!-- WhatsApp -->
                <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="WhatsApp">
                    <img src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp">
                </a>
                
                <!-- Google Maps -->
                <a href="#" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Google Maps">
                    <img src="{{ asset('images/icon/maps.png') }}" alt="Google Maps">
                </a>
            </div>
        </div>
        
    </div>
    
    <!-- 
        FOOTER BOTTOM / COPYRIGHT
        Fungsi: Menampilkan copyright
        Jika dihapus: Footer tidak ada copyright notice
    -->
    <div class="footer-bottom">
        <p>&copy; 2024 Waroenk Qu. All rights reserved.</p>
    </div>
</footer>