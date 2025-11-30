@extends('layouts.app')

@section('title', 'Galeri - Waroenk Qu')
@section('meta_description', 'Galeri foto Waroenk Qu - Lihat suasana warung dan berbagai menu makanan minuman kami')

@section('content')

<!-- 
    PAGE HEADER
    Fungsi: Banner header halaman galeri
    Background: Gradient merah
-->
<section class="page-header">
    <h2>Galeri <span class="highlight">Waroenk Qu</span></h2>
    <p>Lihat koleksi foto Waroenk Qu - suasana warung dan menu kami</p>
</section>

<!-- 
    GALLERY SECTION
    Fungsi: Section utama halaman galeri
    Contains: Filter tabs + Gallery grid
-->
<section class="section">
    
    <!-- 
        FILTER TABS
        Fungsi: Tombol kategori untuk filter galeri
        4 kategori: Semua, Suasana, Makanan, Minuman
        Layout: Flex horizontal, center aligned
        Jika dihapus: Tidak bisa filter foto berdasarkan kategori
    -->
    <div class="filter-tabs">
        <!-- 
            TAB: SEMUA
            Fungsi: Menampilkan semua foto (suasana + makanan + minuman)
            Class active: Default aktif saat halaman load
            Onclick: JavaScript filterGallery('all')
            Icon: galeri merah.png
        -->
        <button class="filter-tab active" onclick="filterGallery('all')" data-filter="all">
            <img src="{{ asset('images/icon/galeri merah.png') }}" alt="Semua" class="tab-icon">
            Semua
        </button>
        
        <!-- 
            TAB: SUASANA WAROENK
            Fungsi: Filter foto suasana warung
            Onclick: JavaScript filterGallery('suasana')
            Icon: suasana kuning.png (NOTE: File ini harus ada)
        -->
        <button class="filter-tab" onclick="filterGallery('suasana')" data-filter="suasana">
            <img src="{{ asset('images/icon/suasana kuning.png') }}" alt="Suasana" class="tab-icon">
            Suasana Waroenk
        </button>
        
        <!-- 
            TAB: MAKANAN
            Fungsi: Filter foto makanan
            Onclick: JavaScript filterGallery('makanan')
            Icon: makanan kuning.png
        -->
        <button class="filter-tab" onclick="filterGallery('makanan')" data-filter="makanan">
            <img src="{{ asset('images/icon/makanan kuning.png') }}" alt="Makanan" class="tab-icon">
            Makanan
        </button>
        
        <!-- 
            TAB: MINUMAN
            Fungsi: Filter foto minuman
            Onclick: JavaScript filterGallery('minuman')
            Icon: minuman merah.png
        -->
        <button class="filter-tab" onclick="filterGallery('minuman')" data-filter="minuman">
            <img src="{{ asset('images/icon/minuman merah.png') }}" alt="Minuman" class="tab-icon">
            Minuman
        </button>
    </div>

    <!-- 
        GALLERY GRID
        Fungsi: Grid layout untuk foto galeri
        Grid: Auto-fill, min 360px per item
        Responsive: 3-4 kolom desktop, 2 tablet, 1 mobile
        Jika dihapus: Foto tidak tampil
    -->
    <div class="gallery-grid">
        
        <!-- ========== SUASANA WAROENK ========== -->
        
        <!-- 
            GALLERY ITEM: SUASANA DALAM WAROENK
            Fungsi: Item galeri dengan hover effect
            data-category="suasana": Untuk filter JavaScript
            Hover effect:
            - Foto zoom 1.15x
            - Overlay gradient muncul (opacity 0 → 1)
            - Keterangan slide up dari bawah
            - Border kuning
            - Shadow lebih besar
        -->
        <div class="gallery-item" data-category="suasana">
            <!-- 
                GALLERY IMAGE
                Fungsi: Foto galeri
                Aspect ratio 4:3 (fixed via CSS)
                Object-fit: cover (crop proporsional)
            -->
            <img src="{{ asset('images/warung/dalam1.png') }}" alt="Suasana Dalam Waroenk">
            
            <!-- 
                GALLERY OVERLAY
                Fungsi: Layer gradient di atas foto
                Background: Linear gradient merah (bottom to top)
                Default: Opacity 0 (tidak terlihat)
                Hover: Opacity 1 (terlihat)
                Jika dihapus: Text tidak terbaca karena foto terang
            -->
            <div class="gallery-overlay">
                <!-- 
                    GALLERY INFO
                    Fungsi: Text keterangan foto
                    Position: Flex end (bottom center)
                    Transform: TranslateY(20px) default
                    Hover: TranslateY(0) - slide up effect
                -->
                <div class="gallery-info">
                    <h3>Suasana Dalam Waroenk</h3>
                    <p>Tempat makan yang bersih dan nyaman</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: RUANG MAKAN -->
        <div class="gallery-item" data-category="suasana">
            <img src="{{ asset('images/warung/dalam2.png') }}" alt="Ruang Makan">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Ruang Makan</h3>
                    <p>Tempat yang cocok untuk bersantai</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: TAMPAK DEPAN WAROENK -->
        <div class="gallery-item" data-category="suasana">
            <img src="{{ asset('images/warung/luar-siang.png') }}" alt="Tampak Depan Waroenk">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Tampak Depan Waroenk</h3>
                    <p>Lokasi strategis di pinggir jalan raya</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: SUASANA SORE HARI -->
        <div class="gallery-item" data-category="suasana">
            <img src="{{ asset('images/warung/luar-sore.png') }}" alt="Suasana Sore Hari">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Suasana Sore Hari</h3>
                    <p>Pemandangan waroenk di sore hari</p>
                </div>
            </div>
        </div>

        <!-- ========== MAKANAN ========== -->

        <!-- GALLERY ITEM: RAWON -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/rawon.png') }}" alt="Rawon">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Rawon</h3>
                    <p>Rawon dengan daging empuk dan bumbu khas</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: LALAPAN AYAM -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/lalapan ayam.png') }}" alt="Lalapan Ayam">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Lalapan Ayam</h3>
                    <p>Ayam goreng renyah disajikan dengan sambal khas dan sayur lalapan</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: MIE GORENG JAWA -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/mie goreng.png') }}" alt="Mie Goreng Jawa">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Mie Goreng Jawa</h3>
                    <p>Mie goreng dengan cita rasa khas Jawa</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: NASI GORENG JAWA -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Nasi Goreng Jawa">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Nasi Goreng Jawa</h3>
                    <p>Nasi goreng spesial dengan bumbu tradisional</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: LALAPAN TELUR -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/lalapan telur.png') }}" alt="Lalapan Telur">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Lalapan Telur</h3>
                    <p>Nasi hangat dengan telur goreng, sambal pedas, dan lalapan segar</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: SOTO AYAM -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/soto ayam.png') }}" alt="Soto Ayam">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Soto Ayam</h3>
                    <p>Soto ayam dengan kuah bening yang segar</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: SOTO DAGING -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/soto daging.png') }}" alt="Soto Daging">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Soto Daging</h3>
                    <p>Kuah hangat dengan daging lembut</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: LALAPAN EMPAL -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/lalapan empal.png') }}" alt="Lalapan Empal">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Lalapan Empal</h3>
                    <p>Empal lembut dengan rasa manis-gurih</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: LALAPAN TAHU TEMPE -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/lalapan tempe n tahu.png') }}" alt="Lalapan Tahu Tempe">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Lalapan Tahu Tempe</h3>
                    <p>Lalapan hemat dengan tahu tempe goreng yang crispy</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: KWETIAU -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/kwetiau.png') }}" alt="Kwetiau">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Kwetiau</h3>
                    <p>Kwetiau lembut berbumbu gurih</p>
                </div>
            </div>
        </div>

        <!-- ========== MINUMAN ========== -->

        <!-- GALLERY ITEM: KOPI -->
        <div class="gallery-item" data-category="minuman">
            <img src="{{ asset('images/menu/kopi.png') }}" alt="Kopi">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Kopi</h3>
                    <p>Kopi klasik cocok untuk mulai hari atau lembur</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: ES TEH -->
        <div class="gallery-item" data-category="minuman">
            <img src="{{ asset('images/menu/es teh.png') }}" alt="Es Teh">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Es Teh</h3>
                    <p>Teh manis segar untuk menemani makanan</p>
                </div>
            </div>
        </div>

        <!-- GALLERY ITEM: ES JERUK -->
        <div class="gallery-item" data-category="minuman">
            <img src="{{ asset('images/menu/es jeruk.png') }}" alt="Es Jeruk">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Es Jeruk</h3>
                    <p>Jeruk peras segar tanpa pengawet</p>
                </div>
            </div>
        </div>

    </div>

</section>

@endsection