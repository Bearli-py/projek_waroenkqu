<!-- 
    MENU DETAIL MODAL
    Fungsi: Pop-up overlay untuk menampilkan detail lengkap menu
    Jika dihapus: Button "Detail" di halaman menu tidak berfungsi
-->
<div id="menuModal" class="modal">
    <!-- 
        MODAL OVERLAY
        Fungsi: Background gelap semi-transparan
        Onclick: Menutup modal ketika area gelap diklik
        Jika dihapus: Modal tidak punya background overlay
    -->
    <div class="modal-overlay" onclick="closeMenuModal()"></div>
    
    <!-- 
        MODAL CONTENT BOX
        Fungsi: Kotak putih berisi detail menu
        Jika dihapus: Konten modal tidak tampil
    -->
    <div class="modal-content">
        <!-- 
            CLOSE BUTTON
            Fungsi: Tombol X untuk menutup modal
            Jika dihapus: User hanya bisa tutup dengan klik overlay
        -->
        <button class="modal-close" onclick="closeMenuModal()" aria-label="Close">
            &times;
        </button>
        
        <!-- 
            MODAL HEADER
            Fungsi: Judul modal (nama menu)
            Data akan diisi dinamis via JavaScript
        -->
        <div class="modal-header">
            <h2 id="modalMenuName">Nama Menu</h2>
        </div>
        
        <!-- 
            MODAL BODY
            Fungsi: Konten utama modal
            Layout: Flex row (gambar | info)
        -->
        <div class="modal-body">
            <!-- 
                IMAGE SECTION
                Fungsi: Menampilkan foto menu besar
            -->
            <div class="modal-image">
                <img id="modalMenuImage" src="" alt="Menu Image">
            </div>
            
            <!-- 
                INFO SECTION
                Fungsi: Detail menu (harga, deskripsi, info tambahan)
            -->
            <div class="modal-info">
                <!-- 
                    PRICE
                    Fungsi: Harga menu
                -->
                <div class="modal-price">
                    <span id="modalMenuPrice">Rp 0</span>
                </div>
                
                <!-- 
                    DESCRIPTION
                    Fungsi: Deskripsi singkat menu (yang fun/receh)
                -->
                <div class="modal-description">
                    <h3>Deskripsi</h3>
                    <p id="modalMenuDescription">Deskripsi menu akan muncul di sini.</p>
                </div>
                
                <!-- 
                    ADDITIONAL INFO
                    Fungsi: Informasi tambahan (bullet points)
                    Contoh: "Kuah bening, segar, ringan", dll
                -->
                <div class="modal-additional">
                    <h3>Informasi Tambahan</h3>
                    <ul id="modalMenuAdditional">
                        <!-- Akan diisi dinamis via JavaScript -->
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- 
            MODAL FOOTER
            Fungsi: Tombol aksi di bawah modal
        -->
        <div class="modal-footer">
            <!-- 
                WHATSAPP ORDER BUTTON
                Fungsi: Redirect ke WhatsApp untuk pesan
                Onclick: JavaScript akan generate link WA dengan text pre-filled
            -->
            <a href="#" id="modalOrderBtn" class="btn-order" target="_blank">
                <img src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp" class="btn-icon">
                Pesan via WhatsApp
            </a>
        </div>
    </div>
</div>