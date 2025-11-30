@extends('layouts.app')

@section('title', 'Galeri - Waroenk Qu')
@section('meta_description', 'Lihat koleksi foto Waroenk Qu - suasana warung, menu makanan dan minuman tradisional yang lezat')

@section('content')

<!-- Page Header -->
<section class="page-header">
    <h2>Galeri <span class="highlight">Kami</span></h2>
    <p>Lihat koleksi foto Waroenk Qu - suasana warung dan menu kami</p>
</section>

<!-- Gallery Section -->
<section class="section">
    
<!-- Filter Tabs -->
    <div class="filter-tabs">
        <button class="filter-tab active" onclick="filterGallery('all')" data-filter="all">
            <img src="{{ asset('images/icon/kamera.png') }}" alt="Semua" class="tab-icon">
            Semua
        </button>
        <button class="filter-tab" onclick="filterGallery('suasana')" data-filter="suasana">
            <img src="{{ asset('images/icon/rumah.png') }}" alt="Suasana" class="tab-icon">
            Suasana Waroenk
        </button>
        <button class="filter-tab" onclick="filterGallery('makanan')" data-filter="makanan">
            <img src="{{ asset('images/icon/makanan.png') }}" alt="Makanan" class="tab-icon">
            Makanan
        </button>
        <button class="filter-tab" onclick="filterGallery('minuman')" data-filter="minuman">
            <img src="{{ asset('images/icon/minuman.png') }}" alt="Minuman" class="tab-icon">
            Minuman
        </button>
    </div>

    <!-- Gallery Grid -->
    <div class="gallery-grid">
        
        <!-- Suasana Waroenk -->
        <div class="gallery-item" data-category="suasana">
            <img src="{{ asset('images/warung/luar-siang.png') }}" alt="Tampak Depan Waroenk Qu">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Tampak Depan Waroenk Qu</h3>
                    <p>Lokasi strategis di pinggir jalan raya</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="suasana">
            <img src="{{ asset('images/warung/dalam1.png') }}" alt="Suasana Dalam Waroenk">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Suasana Dalam Waroenk</h3>
                    <p>Tempat makan yang bersih dan nyaman</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="suasana">
            <img src="{{ asset('images/warung/dalam2.png') }}" alt="Ruang Makan">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Ruang Makan</h3>
                    <p>Tempat yang asri untuk bersantai</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="suasana">
            <img src="{{ asset('images/warung/luar-sore.png') }}" alt="Suasana Sore Hari">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Suasana Sore Hari</h3>
                    <p>Pemandangan warung di sore hari</p>
                </div>
            </div>
        </div>

        <!-- Makanan -->
        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/rawon.jpg') }}" alt="Rawon Legendaris">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Rawon Legendaris</h3>
                    <p>Rawon dengan daging empuk dan bumbu khas</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/soto.jpg') }}" alt="Soto Ayam">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Soto Ayam Spesial</h3>
                    <p>Soto ayam dengan kuah bening yang segar</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/soto daging.jpg') }}" alt="Soto Daging">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Soto Daging Spesial</h3>
                    <p>Kuah soto gurih dengan potongan daging sapi empuk yang kaya rasa</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/nasgor.jpg') }}" alt="Nasi Goreng">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Nasi Goreng Spesial</h3>
                    <p>Nasi goreng dengan bumbu tradisional</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/mie goreng.jpg') }}" alt="Mie Goreng">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Mie Goreng Jawa</h3>
                    <p>Mie goreng dengan cita rasa khas Jawa</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/lalapan ayam.jpg') }}" alt="Lalapan Ayam">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Pecel Sayur</h3>
                    <p>Ayam goreng renyah disajikan dengan sambal khas dan sayur lalapan</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/lalapan empal.jpg') }}" alt="Lalapan Empal">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Lalapan Empal</h3>
                    <p>Empal daging manis gurih dipadukan dengan nasi dan sambal pedas</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/lalapan tahu n tempe.jpg') }}" alt="Lalapan Tahu Tempe">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Lapapan Tahu Tempe</h3>
                    <p>Pilihan hemat dengan tahu tempe goreng dan sambal terasi nikmat</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/lalapan telur.jpg') }}" alt="Lalapan Telur">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Lalapan Telur</h3>
                    <p>Nasi hangat dengan telur goreng, sambal pedas, dan lalapan segar</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/kwetiau.jpg') }}" alt="Kwetiau Goreng">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Lalapan Empal</h3>
                    <p>Kwetiau lembut dengan sayur, bakso, dan bumbu sedap yang menggugah selera</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="makanan">
            <img src="{{ asset('images/menu/telur asin.jpg') }}" alt="Telur Asin">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Telur Asin</h3>
                    <p>Telur asin gurih, cocok jadi pelengkap menu nasi atau lalapan</p>
                </div>
            </div>
        </div>

        <!-- Minuman -->
        <div class="gallery-item" data-category="minuman">
            <img src="{{ asset('images/menu/es teh.jpg') }}" alt="Es Teh Manis">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Es Teh Manis</h3>
                    <p>Teh manis segar untuk menemani makanan</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="minuman">
            <img src="{{ asset('images/menu/es jeruk.jpg') }}" alt="Es Jeruk">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Es Jeruk Peras</h3>
                    <p>Jeruk peras segar tanpa pengawet</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="minuman">
            <img src="{{ asset('images/menu/kopi mix.jpg') }}" alt="Kopi Mix">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Kopi Mix</h3>
                    <p>Perpaduan kopi dan susu yang creamy dan nikmat</p>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="minuman">
            <img src="{{ asset('images/menu/teh tarik.jpg') }}" alt="Teh Tarik">
            <div class="gallery-overlay">
                <div class="gallery-info">
                    <h3>Teh Tarik</h3>
                    <p>Teh tarik hangat dengan busa lembut yang menggoda</p>
                </div>
            </div>

            

    </div>

</section>

<script>
function filterGallery(category) {
    // Get all gallery items
    const items = document.querySelectorAll('.gallery-item');
    const tabs = document.querySelectorAll('.filter-tab');
    
    // Remove active class from all tabs
    tabs.forEach(tab => tab.classList.remove('active'));
    
    // Add active class to clicked tab
    const activeTab = document.querySelector(`[data-filter="${category}"]`);
    if (activeTab) {
        activeTab.classList.add('active');
    }
    
    // Filter items
    items.forEach(item => {
        if (category === 'all') {
            item.style.display = 'block';
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'scale(1)';
            }, 10);
        } else {
            if (item.getAttribute('data-category') === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'scale(1)';
                }, 10);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        }
    });
}
</script>

@endsection