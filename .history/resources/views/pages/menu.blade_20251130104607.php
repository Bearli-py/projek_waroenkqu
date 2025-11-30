{{-- 
EXTENDS LAYOUT
Halaman menu pakai template dari layouts/app.blade.php
--}}
@extends('layouts.app')

{{-- JUDUL TAB BROWSER --}}
@section('title', 'Menu - Waroenk Qu')

{{-- KONTEN HALAMAN --}}
@section('content')

{{--
=================================
SECTION 1: HEADER MENU
=================================
Judul halaman dan subjudul
--}}
<section style="background-color: #fff; padding: 40px 0 60px; text-align: center;">
    <div class="container">
        
        {{-- JUDUL --}}
        <h1 style="font-family: 'Playfair Display', serif; font-size: 42px; color: #B33939; margin-bottom: 8px;">
            Menu Waroenk Qu
        </h1>
        
        {{-- SUBJUDUL --}}
        <p style="font-family: 'Poppins', sans-serif; font-size: 18px; color: #666; margin-bottom: 100px;">
            Pilihan menu lezat dengan harga terjangkau
        </p>

{{-- 
=================================
SECTION 2: DAFTAR MENU DENGAN FILTER
=================================
3 tombol filter: Semua, Makanan, Minuman
Tombol aktif punya background merah
JavaScript akan filter card menu sesuai kategori
--}}
        {{-- 
        TOMBOL KATEGORI
        Flexbox horizontal, responsive
        --}}
        <div style="display: flex; justify-content: center; align-items: center; gap: 12px; margin-bottom: 50px; flex-wrap: wrap;">
            {{-- 
            TOMBOL SEMUA (default aktif)
            data-filter="all" = untuk JavaScript filtering
            --}}
            <button class="filter-btn yellow active" data-filter="all">
                <img src="{{ asset('images/icon/galeri merah.png') }}" alt="Semua" class="filter-icon">
                <span>Semua</span>
            </button>
            
            {{-- TOMBOL MAKANAN --}}
            <button class="filter-btn red" data-filter="makanan">
                <img src="{{ asset('images/icon/makanan kuning.png') }}" alt="Makanan" class="filter-icon">
                <span>Makanan</span>
            </button>
            
            {{-- TOMBOL MINUMAN --}}
            <button class="filter-btn yellow" data-filter="minuman">
                <img src="{{ asset('images/icon/minuman merah.png') }}" alt="Minuman" class="filter-icon">
                <span>Minuman</span>
            </button>
        
        {{-- 
        GRID MENU
        Layout CSS Grid: Desktop 3 kolom, Tablet 2 kolom, Mobile 1 kolom
        Setiap card punya:
        - Foto menu
        - Nama menu
        - Harga (warna merah)
        - Deskripsi singkat
        - Tombol "Detail"
        - Hover: shadow + tombol jadi merah dengan text putih
        --}}
        <div class="menu-grid">
            
            {{-- =================== KATEGORI MAKANAN =================== --}}
            
            {{-- 
            MENU 1: LALAPAN TELUR
            data-category="makanan" = untuk filter JavaScript
            data-menu-id="lalapan-telur" = untuk popup detail (JavaScript)
            --}}
            <div class="menu-card" data-category="makanan" data-menu-id="lalapan-telur">
                {{-- 
                FOTO MENU
                Wrapper dengan overflow hidden buat efek zoom saat hover
                --}}
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/lalapan telur.png') }}" alt="Lalapan Telur">
                </div>
                
                {{-- 
                INFO MENU
                Nama, harga, deskripsi, tombol
                --}}
                <div class="menu-card-content">
                    {{-- Nama menu --}}
                    <h3 class="menu-card-title">Lalapan Telur</h3>
                    
                    {{-- Harga (warna merah #B33939) --}}
                    <p class="menu-card-price">Rp 10.000</p>
                    
                    {{-- Deskripsi singkat (2-3 baris) --}}
                    <p class="menu-card-description">Paket hemat legend yang bisa nyelametin tanggal tua tanpa bikin sedih</p>
                    
                    {{-- 
                    TOMBOL DETAIL
                    Klik = buka popup detail menu
                    Default: border merah, background putih, text merah
                    Hover: background merah, text putih
                    --}}
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 2: SOTO AYAM --}}
            <div class="menu-card" data-category="makanan" data-menu-id="soto-ayam">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/soto ayam.png') }}" alt="Soto Ayam">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Soto Ayam</h3>
                    <p class="menu-card-price">Rp 12.000</p>
                    <p class="menu-card-description">Sat set banget, kuah kuningnya nge-charge semangat, bikin kamu auto seger lagi</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 3: MIE GORENG JAWA --}}
            <div class="menu-card" data-category="makanan" data-menu-id="mie-goreng">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/mie goreng.png') }}" alt="Mie Goreng Jawa">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Mie Goreng Jawa</h3>
                    <p class="menu-card-price">Rp 12.000</p>
                    <p class="menu-card-description">Mie legendaris dengan bumbu yang kaya rasa, kenikmatannya tidak tertandingi!</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 4: RAWON --}}
            <div class="menu-card" data-category="makanan" data-menu-id="rawon">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/rawon.png') }}" alt="Rawon">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Rawon</h3>
                    <p class="menu-card-price">Rp 18.000</p>
                    <p class="menu-card-description">Daging empuk berkuah hitam pekat yang sukses bikin lidah kamu ketagihan berat</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 5: NASI GORENG JAWA --}}
            <div class="menu-card" data-category="makanan" data-menu-id="nasi-goreng">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Nasi Goreng Jawa">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Nasi Goreng Jawa</h3>
                    <p class="menu-card-price">Rp 12.000</p>
                    <p class="menu-card-description">Rajanya segala nasi, gurihnya pas, cocok buat mendongkrak mood secara instan</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 6: LALAPAN AYAM --}}
            <div class="menu-card" data-category="makanan" data-menu-id="lalapan-ayam">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/lalapan ayam.png') }}" alt="Lalapan Ayam">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Lalapan Ayam</h3>
                    <p class="menu-card-price">Rp 15.000</p>
                    <p class="menu-card-description">Ayam juara dengan sambal pedas nampol, sekali coba auto teriak nagih!</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 7: SOTO DAGING --}}
            <div class="menu-card" data-category="makanan" data-menu-id="soto-daging">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/soto daging.png') }}" alt="Soto Daging">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Soto Daging</h3>
                    <p class="menu-card-price">Rp 15.000</p>
                    <p class="menu-card-description">Kuah hangat dengan daging lembut; solusi cepat buat kamu yang butuh kehangatan selain dari chat gebetan</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 8: LALAPAN EMPAL --}}
            <div class="menu-card" data-category="makanan" data-menu-id="lalapan-empal">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/lalapan empal.png') }}" alt="Lalapan Empal">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Lalapan Empal</h3>
                    <p class="menu-card-price">Rp 16.000</p>
                    <p class="menu-card-description">Empal lembut dengan rasa manis-gurih, cocok buat yang suka daging tapi tetap pengen terlihat "healthy"</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 9: LALAPAN TAHU TEMPE --}}
            <div class="menu-card" data-category="makanan" data-menu-id="lalapan-tahu-tempe">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/lalapan tempe n tahu.png') }}" alt="Lalapan Tahu Tempe">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Lalapan Tahu Tempe</h3>
                    <p class="menu-card-price">Rp 8.000</p>
                    <p class="menu-card-description">Lalapan hemat dengan tahu tempe goreng yang crispy, sahabat setia anak kos sedunia</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 10: KWETIAU --}}
            <div class="menu-card" data-category="makanan" data-menu-id="kwetiau">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/kwetiau.png') }}" alt="Kwetiau">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Kwetiau</h3>
                    <p class="menu-card-price">Rp 12.000</p>
                    <p class="menu-card-description">Kwetiau lembut berbumbu gurih, pilihan pas buat yang pengen beda dikit tapi tetap aman</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- =================== KATEGORI MINUMAN =================== --}}
            
            {{-- MENU 11: KOPI --}}
            <div class="menu-card" data-category="minuman" data-menu-id="kopi">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/kopi.png') }}" alt="Kopi">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Kopi</h3>
                    <p class="menu-card-price">Rp 5.000</p>
                    <p class="menu-card-description">Kopi klasik buat mulai hari atau lembur; pahitnya pas, ga se-pahit pesan singkat yang cuma "ok"</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 12: ES JERUK --}}
            <div class="menu-card" data-category="minuman" data-menu-id="es-jeruk">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/es jeruk.png') }}" alt="Es Jeruk">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Es Jeruk</h3>
                    <p class="menu-card-price">Rp 5.000</p>
                    <p class="menu-card-description">Perasan jeruk asli yang dinginnya nyess, solusi cepat buat menghilangkan dahaga</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
            {{-- MENU 13: ES TEH --}}
            <div class="menu-card" data-category="minuman" data-menu-id="es-teh">
                <div class="menu-card-image">
                    <img src="{{ asset('images/menu/es teh.png') }}" alt="Es Teh">
                </div>
                <div class="menu-card-content">
                    <h3 class="menu-card-title">Es Teh</h3>
                    <p class="menu-card-price">Rp 3.000</p>
                    <p class="menu-card-description">Minuman sejuta umat yang selalu relate di setiap momen, wajib ada!</p>
                    <button class="menu-card-btn">Detail</button>
                </div>
            </div>
            
        </div>
    </div>
</section>

{{-- 
=================================
POPUP MODAL DETAIL MENU
=================================
Popup yang muncul saat tombol "Detail" diklik
Berisi: foto besar, nama, harga, deskripsi lengkap, 4 info tambahan, tombol tutup
JavaScript akan:
1. Munculkan popup (display: flex)
2. Isi konten sesuai menu yang diklik
3. Tutup popup saat klik tombol X atau overlay
--}}
<div class="menu-modal" id="menuModal">
    {{-- 
    OVERLAY GELAP
    Background hitam semi-transparan yang menutupi seluruh layar
    Klik overlay = tutup popup
    --}}
    <div class="menu-modal-overlay"></div>
    
    {{-- 
    KOTAK POPUP
    Kotak putih di tengah layar berisi detail menu
    Max-width 600px, responsive
    --}}
    <div class="menu-modal-content">
        {{-- 
        TOMBOL TUTUP (X)
        Posisi absolute di kanan atas popup
        Klik = tutup popup
        --}}
        <button class="menu-modal-close">&times;</button>
        
        {{-- 
        FOTO MENU (BESAR)
        Foto menu ukuran besar di bagian atas popup
        --}}
        <div class="menu-modal-image">
            <img src="" alt="" id="modalMenuImage">
        </div>
        
        {{-- 
        INFO MENU LENGKAP
        Nama, harga, deskripsi lengkap, 4 poin informasi tambahan
        --}}
        <div class="menu-modal-body">
            {{-- Nama menu (font besar) --}}
            <h2 class="menu-modal-title" id="modalMenuTitle"></h2>
            
            {{-- Harga (warna merah) --}}
            <p class="menu-modal-price" id="modalMenuPrice"></p>
            
            {{-- Deskripsi lengkap (paragraf panjang) --}}
            <p class="menu-modal-description" id="modalMenuDescription"></p>
            
            {{-- 
            INFORMASI TAMBAHAN
            4 poin bullet list dengan icon checklist atau dot
            --}}
            <div class="menu-modal-info">
                <h3 class="menu-modal-info-title">Informasi Tambahan:</h3>
                <ul class="menu-modal-info-list" id="modalMenuInfo">
                    {{-- Akan diisi oleh JavaScript --}}
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- JAVASCRIPT FILTER MENU --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Menu filter loaded!');
    
    // Ambil semua button filter
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    // Ambil semua menu card
    const menuItems = document.querySelectorAll('.menu-card');
    
    console.log('Buttons:', filterButtons.length);
    console.log('Menu items:', menuItems.length);
    
    // Loop setiap button
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            
            // Ambil kategori dari button yang diklik
            const filterValue = this.getAttribute('data-filter');
            console.log('Filter clicked:', filterValue);
            
            // Remove active dari semua button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active ke button yang diklik
            this.classList.add('active');
            
            // Filter menu
            menuItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                
                if (filterValue === 'all') {
                    // Tampilkan semua
                    item.style.display = 'block';
                } else if (itemCategory === filterValue) {
                    // Tampilkan yang sesuai
                    item.style.display = 'block';
                } else {
                    // Sembunyikan yang gak sesuai
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>

@endsection