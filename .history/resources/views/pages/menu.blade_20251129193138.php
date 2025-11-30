@extends('layouts.app')

@section('title', 'Menu - Waroenk Qu')
@section('meta_description', 'Daftar lengkap menu Waroenk Qu - Makanan dan minuman tradisional dengan harga terjangkau')

@section('content')

<!-- 
    PAGE HEADER
    Fungsi: Banner header halaman menu
    Background: Gradient merah
    Jika dihapus: Halaman tidak ada title banner
-->
<section class="page-header">
    <h2>Menu <span class="highlight">Waroenk Qu</span></h2>
    <p>Nikmati berbagai pilihan menu makanan dan minuman tradisional</p>
</section>

<!-- 
    MENU SECTION
    Fungsi: Section utama halaman menu
    Contains: Filter tabs + Menu grid
-->
<section class="section">
    
    <!-- 
        FILTER TABS
        Fungsi: Tombol kategori untuk filter menu
        Layout: Flex horizontal, center aligned
        Responsive: Vertical stack di mobile
        Jika dihapus: Tidak bisa filter menu berdasarkan kategori
    -->
    <div class="filter-tabs">
        <!-- 
            TAB: SEMUA
            Fungsi: Menampilkan semua menu (makanan + minuman)
            Class active: Default aktif saat halaman load
            Onclick: JavaScript filterMenu('all')
            Icon: galeri merah.png
        -->
        <button class="filter-tab active" onclick="filterMenu('all')" data-filter="all">
            <img src="{{ asset('images/icon/galeri merah.png') }}" alt="Semua" class="tab-icon">
            Semua
        </button>
        
        <!-- 
            TAB: MAKANAN
            Fungsi: Filter hanya menu makanan
            Onclick: JavaScript filterMenu('makanan')
            Icon: makanan kuning.png
        -->
        <button class="filter-tab" onclick="filterMenu('makanan')" data-filter="makanan">
            <img src="{{ asset('images/icon/makanan kuning.png') }}" alt="Makanan" class="tab-icon">
            Makanan
        </button>
        
        <!-- 
            TAB: MINUMAN
            Fungsi: Filter hanya menu minuman
            Onclick: JavaScript filterMenu('minuman')
            Icon: minuman merah.png
        -->
        <button class="filter-tab" onclick="filterMenu('minuman')" data-filter="minuman">
            <img src="{{ asset('images/icon/minuman merah.png') }}" alt="Minuman" class="tab-icon">
            Minuman
        </button>
    </div>

    <!-- 
        MENU GRID
        Fungsi: Grid layout untuk kartu menu
        Grid: Auto-fill, min 340px per card
        Responsive: 3-4 kolom desktop, 2 tablet, 1 mobile
        Jika dihapus: Menu tidak tampil
    -->
    <div class="menu-grid">
        
        <!-- ========== MAKANAN ========== -->
        
        <!-- 
            MENU CARD: LALAPAN TELUR
            Fungsi: Kartu menu individual
            data-category="makanan": Untuk filter JavaScript
            data-menu-id="lalapan-telur": Unique identifier untuk modal
            Hover effect: 
            - Card naik 8px (translateY)
            - Shadow lebih besar
            - Button Detail: background merah, text putih
        -->
        <div class="menu-card" data-category="makanan" data-menu-id="lalapan-telur">
            <!-- 
                MENU IMAGE
                Fungsi: Container foto menu
                Height fixed: 240px
                Hover: Image zoom 1.12x
            -->
            <div class="menu-image">
                <img src="{{ asset('images/menu/lalapan telur.png') }}" alt="Lalapan Telur">
            </div>
            
            <!-- 
                MENU CONTENT
                Fungsi: Konten text menu
                Background: Gradient putih ke cream
                Display flex column: Untuk push footer ke bawah
            -->
            <div class="menu-content">
                <!-- 
                    MENU NAME
                    Fungsi: Nama menu
                    Font: Poppins 22px Bold
                -->
                <h3>Lalapan Telur</h3>
                
                <!-- 
                    MENU DESCRIPTION
                    Fungsi: Deskripsi fun/receh menu
                    Font: Inter 14px Regular
                    Flex-grow: 1 (mengisi space kosong)
                -->
                <p class="menu-desc">Paket hemat legend yang bisa nyelametin tanggal tua tanpa bikin sedih</p>
                
                <!-- 
                    MENU FOOTER
                    Fungsi: Harga dan button detail
                    Layout: Space-between (harga kiri, button kanan)
                    Border top: Pemisah dari deskripsi
                -->
                <div class="menu-footer">
                    <!-- 
                        MENU PRICE
                        Fungsi: Harga menu
                        Style: Gradient merah (background-clip text)
                        Font: Poppins 26px Extra Bold
                    -->
                    <span class="menu-price">Rp 10.000</span>
                    
                    <!-- 
                        DETAIL BUTTON
                        Fungsi: Buka modal detail menu
                        Onclick: JavaScript openMenuModal('lalapan-telur')
                        Default: Gradient kuning background
                        Hover: Background merah, text kuning
                    -->
                    <button class="btn-detail" onclick="openMenuModal('lalapan-telur')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: SOTO AYAM -->
        <div class="menu-card" data-category="makanan" data-menu-id="soto-ayam">
            <div class="menu-image">
                <img src="{{ asset('images/menu/soto ayam.png') }}" alt="Soto Ayam">
            </div>
            <div class="menu-content">
                <h3>Soto Ayam</h3>
                <p class="menu-desc">Sat set banget, kuah kuningnya nge-charge semangat, bikin kamu auto seger lagi</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <button class="btn-detail" onclick="openMenuModal('soto-ayam')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: MIE GORENG JAWA -->
        <div class="menu-card" data-category="makanan" data-menu-id="mie-goreng">
            <div class="menu-image">
                <img src="{{ asset('images/menu/mie goreng.png') }}" alt="Mie Goreng Jawa">
            </div>
            <div class="menu-content">
                <h3>Mie Goreng Jawa</h3>
                <p class="menu-desc">Mie legendaris dengan bumbu yang kaya rasa, kenikmatannya tidak tertandingi!</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <button class="btn-detail" onclick="openMenuModal('mie-goreng')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: RAWON -->
        <div class="menu-card" data-category="makanan" data-menu-id="rawon">
            <div class="menu-image">
                <img src="{{ asset('images/menu/rawon.png') }}" alt="Rawon">
                <!-- 
                    BADGE POPULER
                    Fungsi: Label "Populer" untuk menu favorit
                    Position absolute: Top-right corner
                    Animation: Pulse effect (scale 1-1.05)
                    Jika dihapus: Menu tidak ada badge populer
                -->
                <span class="menu-badge popular">Populer</span>
            </div>
            <div class="menu-content">
                <h3>Rawon</h3>
                <p class="menu-desc">Daging empuk berkuah hitam pekat yang sukses bikin lidah kamu ketagihan berat</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 18.000</span>
                    <button class="btn-detail" onclick="openMenuModal('rawon')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: NASI GORENG JAWA -->
        <div class="menu-card" data-category="makanan" data-menu-id="nasi-goreng">
            <div class="menu-image">
                <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Nasi Goreng Jawa">
                <span class="menu-badge popular">Populer</span>
            </div>
            <div class="menu-content">
                <h3>Nasi Goreng Jawa</h3>
                <p class="menu-desc">Rajanya segala nasi, gurihnya pas, cocok buat mendongkrak mood secara instan</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <button class="btn-detail" onclick="openMenuModal('nasi-goreng')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: LALAPAN AYAM -->
        <div class="menu-card" data-category="makanan" data-menu-id="lalapan-ayam">
            <div class="menu-image">
                <img src="{{ asset('images/menu/lalapan ayam.png') }}" alt="Lalapan Ayam">
            </div>
            <div class="menu-content">
                <h3>Lalapan Ayam</h3>
                <p class="menu-desc">Ayam juara dengan sambal pedas nampol, sekali coba auto teriak nagih!</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <button class="btn-detail" onclick="openMenuModal('lalapan-ayam')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: SOTO DAGING -->
        <div class="menu-card" data-category="makanan" data-menu-id="soto-daging">
            <div class="menu-image">
                <img src="{{ asset('images/menu/soto daging.png') }}" alt="Soto Daging">
            </div>
            <div class="menu-content">
                <h3>Soto Daging</h3>
                <p class="menu-desc">Kuah hangat dengan daging lembut; solusi cepat buat kamu yang butuh kehangatan selain dari chat gebetan</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 15.000</span>
                    <button class="btn-detail" onclick="openMenuModal('soto-daging')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: LALAPAN EMPAL -->
        <div class="menu-card" data-category="makanan" data-menu-id="lalapan-empal">
            <div class="menu-image">
                <img src="{{ asset('images/menu/lalapan empal.png') }}" alt="Lalapan Empal">
            </div>
            <div class="menu-content">
                <h3>Lalapan Empal</h3>
                <p class="menu-desc">Empal lembut dengan rasa manis-gurih, cocok buat yang suka daging tapi tetap pengen terlihat "healthy"</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 16.000</span>
                    <button class="btn-detail" onclick="openMenuModal('lalapan-empal')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: LALAPAN TAHU TEMPE -->
        <div class="menu-card" data-category="makanan" data-menu-id="lalapan-tahu-tempe">
            <div class="menu-image">
                <img src="{{ asset('images/menu/lalapan tempe n tahu.png') }}" alt="Lalapan Tahu Tempe">
            </div>
            <div class="menu-content">
                <h3>Lalapan Tahu Tempe</h3>
                <p class="menu-desc">Lalapan hemat dengan tahu tempe goreng yang crispy, sahabat setia anak kos sedunia</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 8.000</span>
                    <button class="btn-detail" onclick="openMenuModal('lalapan-tahu-tempe')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: KWETIAU -->
        <div class="menu-card" data-category="makanan" data-menu-id="kwetiau">
            <div class="menu-image">
                <img src="{{ asset('images/menu/kwetiau.png') }}" alt="Kwetiau">
            </div>
            <div class="menu-content">
                <h3>Kwetiau</h3>
                <p class="menu-desc">Kwetiau lembut berbumbu gurih, pilihan pas buat yang pengen beda dikit tapi tetap aman</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <button class="btn-detail" onclick="openMenuModal('kwetiau')">Detail</button>
                </div>
            </div>
        </div>

        <!-- ========== MINUMAN ========== -->

        <!-- MENU CARD: KOPI -->
        <div class="menu-card" data-category="minuman" data-menu-id="kopi">
            <div class="menu-image">
                <img src="{{ asset('images/menu/kopi.png') }}" alt="Kopi">
            </div>
            <div class="menu-content">
                <h3>Kopi</h3>
                <p class="menu-desc">Kopi klasik buat mulai hari atau lembur; pahitnya pas, ga se-pahit pesan singkat yang cuma "ok"</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 4.000</span>
                    <button class="btn-detail" onclick="openMenuModal('kopi')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: ES JERUK -->
        <div class="menu-card" data-category="minuman" data-menu-id="es-jeruk">
            <div class="menu-image">
                <img src="{{ asset('images/menu/es jeruk.png') }}" alt="Es Jeruk">
            </div>
            <div class="menu-content">
                <h3>Es Jeruk</h3>
                <p class="menu-desc">Perasan jeruk asli yang dinginnya nyess, solusi cepat buat menghilangkan dahaga</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 4.000</span>
                    <button class="btn-detail" onclick="openMenuModal('es-jeruk')">Detail</button>
                </div>
            </div>
        </div>

        <!-- MENU CARD: ES TEH -->
        <div class="menu-card" data-category="minuman" data-menu-id="es-teh">
            <div class="menu-image">
                <img src="{{ asset('images/menu/es teh.png') }}" alt="Es Teh">
            </div>
            <div class="menu-content">
                <h3>Es Teh</h3>
                <p class="menu-desc">Minuman sejuta umat yang selalu relate di setiap momen, wajib ada!</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 3.000</span>
                    <button class="btn-detail" onclick="openMenuModal('es-teh')">Detail</button>
                </div>
            </div>
        </div>

    </div>

</section>

@endsection