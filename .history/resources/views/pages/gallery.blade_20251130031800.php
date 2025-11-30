{{-- 
EXTENDS LAYOUT
Halaman galeri pakai template dari layouts/app.blade.php
--}}
@extends('layouts.app')

{{-- JUDUL TAB BROWSER --}}
@section('title', 'Galeri - Waroenk Qu')

{{-- KONTEN HALAMAN --}}
@section('content')

{{-- 
=================================
SECTION 1: HEADER GALERI
=================================
Judul halaman dan subjudul
Background putih atau cream
--}}
<section class="page-header">
    <div class="container">
        {{-- JUDUL HALAMAN --}}
        <h1 class="page-title">Galeri Waroenk Qu</h1>
        {{-- SUBJUDUL --}}
        <p class="page-subtitle">Lihat koleksi foto makanan, minuman, dan suasana warung kami</p>
    </div>
</section>

{{-- 
=================================
SECTION 2: FILTER KATEGORI
=================================
4 tombol filter: Semua, Makanan, Minuman, Suasana
Setiap tombol punya icon dari folder public/images/icon
Tombol yang aktif punya background merah
Klik tombol = filter foto sesuai kategori (pakai JavaScript)
--}}
<section class="gallery-section">
    <div class="container">
        {{-- 
        TOMBOL FILTER
        Flexbox horizontal, di mobile jadi 2x2 grid
        --}}
        <div class="filter-buttons-new">
            {{-- 
            TOMBOL SEMUA (default aktif)
            data-filter="all" = identifier buat JavaScript
            class="active" = tombol yang lagi aktif (background merah)
            Kalau dihapus: User gak bisa filter "Semua"
            --}}
            <button class="filter-btn-new yellow active" data-filter="all">
                <img src="{{ asset('images/icon/galeri merah.png') }}" alt="Semua" class="filter-icon-new">
                <span>Semua</span>
            </button>
            
            {{-- 
            TOMBOL MAKANAN
            data-filter="makanan" = identifier buat filter kategori makanan
            Icon makanan kuning
            Kalau dihapus: User gak bisa filter khusus makanan
            --}}
            <button class="filter-btn- new red" data-filter="makanan">
                <img src="{{ asset('images/icon/makanan kuning.png') }}" alt="Makanan" class="filter-icon-new">
                <span>Makanan</span>
            </button>
            
            {{-- 
            TOMBOL MINUMAN
            data-filter="minuman" = identifier buat filter kategori minuman
            Icon minuman merah
            --}}
            <button class="filter-btn-new yellow" data-filter="minuman">
                <img src="{{ asset('images/icon/minuman merah.png') }}" alt="Minuman" class="filter-icon-new">
                <span>Minuman</span>
            </button>

            
            {{-- 
            TOMBOL SUASANA
            data-filter="suasana" = identifier buat filter kategori suasana
            Icon suasana kuning
            --}}
            <button class="filter-btn" data-filter="suasana">
                <img src="{{ asset('images/icon/suasana kuning.png') }}" alt="Suasana" class="filter-icon">
                <span>Suasana</span>
            </button>
        </div>
        
        {{-- 
        GRID FOTO GALERI
        Layout CSS Grid: Desktop 4 kolom, Tablet 3 kolom, Mobile 2 kolom
        Setiap foto punya:
        - data-category = kategori foto (buat filter JavaScript)
        - Hover: zoom in + muncul overlay dengan keterangan
        --}}
        <div class="gallery-grid">
            
            {{-- =================== KATEGORI SUASANA =================== --}}
            
            {{-- 
            FOTO 1: SUASANA DALAM WAROENK
            data-category="suasana" = kategori foto ini
            Hover: foto zoom + overlay gelap + text keterangan muncul
            Kalau dihapus: Foto ini gak muncul di galeri
            --}}
            <div class="gallery-item" data-category="suasana">
                {{-- Wrapper foto (overflow hidden buat efek zoom) --}}
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/warung/dalam1.png') }}" alt="Suasana Dalam Waroenk" class="gallery-image">
                    {{-- 
                    OVERLAY + TEXT (muncul saat hover)
                    Overlay gelap semi-transparan + text putih di tengah
                    CSS: opacity 0 (default), opacity 1 (saat hover)
                    --}}
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Tempat makan yang bersih dan nyaman</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 2: RUANG MAKAN --}}
            <div class="gallery-item" data-category="suasana">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/warung/dalam2.png') }}" alt="Ruang Makan" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Tempat yang cocok untuk bersantai</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 3: TAMPAK DEPAN WAROENK --}}
            <div class="gallery-item" data-category="suasana">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/warung/luar-siang.png') }}" alt="Tampak Depan Waroenk" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Lokasi strategis di pinggir jalan raya</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 4: SUASANA SORE HARI --}}
            <div class="gallery-item" data-category="suasana">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/warung/luar-sore.png') }}" alt="Suasana Sore Hari" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Pemandangan waroenk di sore hari</p>
                    </div>
                </div>
            </div>
            
            {{-- =================== KATEGORI MAKANAN =================== --}}
            
            {{-- FOTO 5: RAWON --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/rawon.png') }}" alt="Rawon" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Rawon dengan daging empuk dan bumbu khas</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 6: LALAPAN AYAM --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/lalapan ayam.png') }}" alt="Lalapan Ayam" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Ayam goreng renyah disajikan dengan sambal khas dan sayur lalapan</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 7: MIE GORENG JAWA --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/mie goreng.png') }}" alt="Mie Goreng Jawa" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Mie goreng dengan cita rasa khas Jawa</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 8: NASI GORENG JAWA --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Nasi Goreng Jawa" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Nasi goreng spesial dengan bumbu tradisional</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 9: LALAPAN TELUR --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/lalapan telur.png') }}" alt="Lalapan Telur" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Nasi hangat dengan telur goreng, sambal pedas, dan lalapan segar</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 10: SOTO AYAM --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/soto ayam.png') }}" alt="Soto Ayam" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Soto ayam dengan kuah bening yang segar</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 11: SOTO DAGING --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/soto daging.png') }}" alt="Soto Daging" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Kuah hangat dengan daging lembut</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 12: LALAPAN EMPAL --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/lalapan empal.png') }}" alt="Lalapan Empal" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Empal lembut dengan rasa manis-gurih</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 13: LALAPAN TAHU TEMPE --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/lalapan tempe n tahu.png') }}" alt="Lalapan Tahu Tempe" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Lalapan hemat dengan tahu tempe goreng yang crispy</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 14: KWETIAU --}}
            <div class="gallery-item" data-category="makanan">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/kwetiau.png') }}" alt="Kwetiau" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Kwetiau lembut berbumbu gurih</p>
                    </div>
                </div>
            </div>
            
            {{-- =================== KATEGORI MINUMAN =================== --}}
            
            {{-- FOTO 15: KOPI --}}
            <div class="gallery-item" data-category="minuman">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/kopi.png') }}" alt="Kopi" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Kopi klasik cocok untuk mulai hari atau lembur</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 16: ES TEH (nama file yang benar: es teh.png atau teh.png?) --}}
            {{-- CATATAN: Sesuaikan nama file jika berbeda --}}
            <div class="gallery-item" data-category="minuman">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/es teh.png') }}" alt="Es Teh" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Teh manis segar untuk menemani makanan</p>
                    </div>
                </div>
            </div>
            
            {{-- FOTO 17: ES JERUK --}}
            <div class="gallery-item" data-category="minuman">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/menu/es jeruk.png') }}" alt="Es Jeruk" class="gallery-image">
                    <div class="gallery-overlay">
                        <p class="gallery-caption">Jeruk peras segar tanpa pengawet</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection