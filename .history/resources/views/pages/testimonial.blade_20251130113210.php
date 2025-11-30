{{-- 
EXTENDS LAYOUT
Halaman testimoni pakai template dari layouts/app.blade.php
--}}
@extends('layouts.app')

{{-- JUDUL TAB BROWSER --}}
@section('title', 'Testimoni - Waroenk Qu')

{{-- KONTEN HALAMAN --}}
@section('content')

{{-- 
=================================
SECTION 1: HEADER TESTIMONI
=================================
Judul halaman dan subjudul
--}}
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Apa Kata Mereka?</h1>
        <p class="page-subtitle">Kesan pelanggan adalah prioritas kami. Lihat apa yang mereka katakan tentang Waroenk Qu.</p>
    </div>
</section>

<section class="testimonials-section" style="background-color: #fff; padding: 50px 0;">
    {{-- 
    SECTION TESTIMONI
    Container utama untuk seluruh halaman testimoni
    Background: #FAF3E0 (cream) dari CSS
    --}}
    
    <div class="container">
        {{-- 
        CONTAINER
        Max-width 1200px, center horizontal
        Padding kiri-kanan 20px
        --}}
        
        <p class="section-subtitle" style="text-align: center; margin-bottom: 0px;">
        {{-- 
        SUBJUDUL
        Font: Poppins 18px
        Warna: #666 (abu-abu)
        Isi dengan deskripsi singkat tentang testimoni
        --}}
        
        {{-- ============================================
        RATING SUMMARY BOX
        Box putih dengan rating besar + bar chart
        2 kolom: Kiri (rating), Kanan (bar chart)
        ============================================ --}}
        <div class="rating-summary-box" style="margin-bottom: 40px;">
            {{-- 
            CONTAINER BOX
            Background: putih
            Padding: 40px 50px
            Border-radius: 20px (sudut melengkung)
            Shadow: 0 4px 20px rgba(0,0,0,0.08)
            Display: flex (2 kolom horizontal)
            Gap: 60px (jarak antar kolom)
            Margin-bottom: 50px (jarak ke grid testimoni)
            --}}
            
            {{-- ============================================
            KOLOM KIRI: RATING BESAR + BINTANG
            ============================================ --}}
            <div class="rating-left">
                {{-- 
                KOLOM KIRI
                Text-align: center
                Min-width: 200px
                Berisi: Rating angka, bintang, jumlah ulasan
                --}}
                
                <div class="rating-number">4.7</div>
                {{-- 
                RATING ANGKA BESAR
                Font: Poppins 72px bold
                Warna: #333
                Ganti angka sesuai rating rata-rata real
                --}}
                
                <div class="rating-stars">
                    {{-- 
                    CONTAINER BINTANG
                    Display: flex horizontal
                    Gap: 5px antar bintang
                    Justify-content: center
                    --}}
                    
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    {{-- 
                    BINTANG PENUH (FILLED)
                    Font-size: 32px
                    Warna: #F2C94C (kuning)
                    Setiap span = 1 bintang
                    --}}
                    
                    <span class="star half">★</span>
                    {{-- 
                    BINTANG SETENGAH (HALF)
                    Gradient: 50% kuning, 50% abu-abu
                    Untuk rating 4.5, 4.7, dll
                    Kalau rating 5.0, ganti jadi class="filled"
                    --}}
                </div>
                
                <p class="rating-count">Berdasarkan 125 ulasan</p>
                {{-- 
                JUMLAH ULASAN
                Font: Poppins 14px
                Warna: #666 (abu-abu)
                Ganti angka sesuai jumlah testimoni real
                --}}
            </div>
            
            {{-- ============================================
            KOLOM KANAN: BAR CHART RATING
            5 bar untuk rating 5, 4, 3, 2, 1 bintang
            ============================================ --}}
            <div class="rating-right">
                {{-- 
                KOLOM KANAN
                Flex: 1 (ambil sisa space)
                Display: flex vertical
                Gap: 12px antar bar
                --}}
                
                {{-- ========== BAR 5 BINTANG ========== --}}
                <div class="rating-bar-item">
                    {{-- 
                    ITEM BAR (1 baris)
                    Display: flex horizontal
                    Gap: 15px
                    Align items: center (vertikal tengah)
                    --}}
                    
                    <span class="rating-label">5</span>
                    {{-- 
                    LABEL ANGKA
                    Font: Poppins 16px bold
                    Warna: #333
                    Min-width: 15px (biar sejajar)
                    Angka 5 = rating 5 bintang
                    --}}
                    
                    <div class="rating-bar-container">
                        {{-- 
                        CONTAINER BAR (track/rel)
                        Flex: 1 (ambil sisa space)
                        Height: 12px
                        Background: #e0e0e0 (abu-abu terang)
                        Border-radius: 10px
                        --}}
                        
                        <div class="rating-bar-fill" style="width: 80%;"></div>
                        {{-- 
                        BAR ISI (fill)
                        Width: 80% = 80% dari users kasih 5 bintang
                        Background: #F2C94C (kuning)
                        Height: 100% (penuh tinggi container)
                        Border-radius: 10px
                        Transition: smooth animation
                        
                        CARA HITUNG:
                        Misal: Total 125 ulasan
                        - 100 ulasan kasih 5 bintang
                        - Persentase: (100/125) x 100% = 80%
                        - Set width: 80%
                        --}}
                    </div>
                    
                    <span class="rating-percentage">80%</span>
                    {{-- 
                    TEXT PERSENTASE
                    Font: Poppins 14px bold
                    Warna: #666
                    Min-width: 45px (biar sejajar)
                    Text-align: right
                    Angka harus sama dengan width bar!
                    --}}
                </div>
                
                {{-- ========== BAR 4 BINTANG ========== --}}
                <div class="rating-bar-item">
                    <span class="rating-label">4</span>
                    <div class="rating-bar-container">
                        <div class="rating-bar-fill" style="width: 15%;"></div>
                        {{-- Width 15% = 15% users kasih 4 bintang --}}
                    </div>
                    <span class="rating-percentage">15%</span>
                </div>
                
                {{-- ========== BAR 3 BINTANG ========== --}}
                <div class="rating-bar-item">
                    <span class="rating-label">3</span>
                    <div class="rating-bar-container">
                        <div class="rating-bar-fill" style="width: 2%;"></div>
                        {{-- Width 2% = 2% users kasih 3 bintang --}}
                    </div>
                    <span class="rating-percentage">2%</span>
                </div>
                
                {{-- ========== BAR 2 BINTANG ========== --}}
                <div class="rating-bar-item">
                    <span class="rating-label">2</span>
                    <div class="rating-bar-container">
                        <div class="rating-bar-fill" style="width: 1%;"></div>
                        {{-- Width 1% = 1% users kasih 2 bintang --}}
                    </div>
                    <span class="rating-percentage">1%</span>
                </div>
                
                {{-- ========== BAR 1 BINTANG ========== --}}
                <div class="rating-bar-item">
                    <span class="rating-label">1</span>
                    <div class="rating-bar-container">
                        <div class="rating-bar-fill" style="width: 0%;"></div>
                        {{-- Width 0% = gak ada users kasih 1 bintang --}}
                    </div>
                    <span class="rating-percentage">0%</span>
                </div>
            </div>
            {{-- Penutup rating-right --}}
        </div>
        {{-- Penutup rating-summary-box --}}
        
        {{-- ============================================
        GRID TESTIMONI (di bawah rating box)
        Grid 3 kolom dengan kotak testimoni
        ============================================ --}}
        <div class="testimonials-grid">
            {{-- Isi dengan kotak-kotak testimoni dari kode lama --}}
        </div>

{{-- 
=================================
SECTION 2: GRID TESTIMONI
=================================
Tampilkan semua testimoni pelanggan dalam grid
Layout: Desktop 3 kolom, Tablet 2 kolom, Mobile 1 kolom
Setiap card testimoni punya:
- Foto profil user (icon user.png)
- Nama user
- Role/keterangan (Pelanggan Setia, dll)
- Text testimoni
- Hover: zoom in sedikit (scale 1.05, natural)
--}}
        {{-- 
        GRID TESTIMONI
        CSS Grid dengan gap antar card
        Hover: transform scale sedikit + shadow lebih besar
        --}}
        <div class="testimonials-grid">
            
            {{-- 
            TESTIMONI 1: SUSI WULANDARI
            Card dengan background putih, shadow, border-radius
            Hover: scale 1.05 (zoom dikit, natural, gak lebay)
            --}}
            <div class="testimonial-card">
                {{-- 
                HEADER TESTIMONI
                Flexbox horizontal: foto profil + info user
                --}}
                <div class="testimonial-header">
                    {{-- 
                    FOTO PROFIL
                    Icon user.png dengan border circle
                    Ukuran kecil (50-60px)
                    --}}
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    
                    {{-- 
                    INFO USER
                    Nama + role/keterangan
                    --}}
                    <div class="testimonial-user">
                        {{-- Nama user (font bold) --}}
                        <h4 class="testimonial-name">Susi Wulandari</h4>
                        {{-- Role/keterangan (font kecil, warna abu) --}}
                        <p class="testimonial-role">Pelanggan Setia</p>
                    </div>
                </div>
                
                {{-- 
                TEXT TESTIMONI
                Isi review dari customer
                Font Poppins, ukuran sedang, line-height 1.6
                --}}
                <p class="testimonial-text">"Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi kesini."</p>
            </div>
            
            {{-- TESTIMONI 2: ANDI SETIAWAN --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Andi Setiawan</h4>
                        <p class="testimonial-role">Pelanggan Tetap</p>
                    </div>
                </div>
                <p class="testimonial-text">"Tempatnya cozy, pelayanan ramah. Rawonnya juara! Rasa bumbunya nempel di lidah, bikin nagih terus. Pasti balik lagi kesini."</p>
            </div>
            
            {{-- TESTIMONI 3: RINA ANDAYANI --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Rina Andayani</h4>
                        <p class="testimonial-role">Pelanggan Baru</p>
                    </div>
                </div>
                <p class="testimonial-text">"Recommended! Menu variatif, porsi pas, dan yang penting rasanya mantap. Jadi langganan deh, cocok buat makan siang bareng teman."</p>
            </div>
            
            {{-- TESTIMONI 4: BUDI SANTOSO --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Budi Santoso</h4>
                        <p class="testimonial-role">Pelanggan Setia</p>
                    </div>
                </div>
                <p class="testimonial-text">"Waroenk Qu ini hidden gem! Soto ayamnya enak banget, kuahnya seger. Tempatnya juga nyaman buat makan sama keluarga."</p>
            </div>
            
            {{-- TESTIMONI 5: DEWI LESTARI --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Dewi Lestari</h4>
                        <p class="testimonial-role">Pelanggan Baru</p>
                    </div>
                </div>
                <p class="testimonial-text">"Pertama kali coba langsung jatuh cinta! Nasi gorengnya juara, bumbunya meresap sempurna. Harganya affordable banget."</p>
            </div>
            
            {{-- TESTIMONI 6: AGUS PRASETYO --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Agus Prasetyo</h4>
                        <p class="testimonial-role">Pelanggan Tetap</p>
                    </div>
                </div>
                <p class="testimonial-text">"Lalapan ayamnya mantap! Ayamnya crispy, sambalnya pedas pas. Setiap hari kerja pasti mampir kesini buat makan siang."</p>
            </div>
            
            {{-- TESTIMONI 7: MAYA SARI --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Maya Sari</h4>
                        <p class="testimonial-role">Pelanggan Setia</p>
                    </div>
                </div>
                <p class="testimonial-text">"Pelayanannya cepat dan ramah. Menu-menunya enak semua, terutama mie goreng Jawanya. Jadi tempat favorit buat nongkrong."</p>
            </div>
            
            {{-- TESTIMONI 8: RUDI HARTONO --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Rudi Hartono</h4>
                        <p class="testimonial-role">Pelanggan Baru</p>
                    </div>
                </div>
                <p class="testimonial-text">"Kopinya enak, pas buat temen ngobrol. Tempatnya juga strategis, gampang dijangkau. Worth it banget!"</p>
            </div>
            
            {{-- TESTIMONI 9: LINDA WIJAYA --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Linda Wijaya</h4>
                        <p class="testimonial-role">Pelanggan Tetap</p>
                    </div>
                </div>
                <p class="testimonial-text">"Suasananya homey banget, berasa makan di rumah sendiri. Makanannya enak-enak dan harganya terjangkau. Recommended!"</p>
            </div>
            
            {{-- TESTIMONI 10: FAJAR RAMADHAN --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Fajar Ramadhan</h4>
                        <p class="testimonial-role">Pelanggan Setia</p>
                    </div>
                </div>
                <p class="testimonial-text">"Soto dagingnya top! Dagingnya empuk, kuahnya hangat pas banget buat cuaca dingin. Jadi pelanggan setia sejak pertama coba."</p>
            </div>
            
            {{-- TESTIMONI 11: SARAH PUTRI --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Sarah Putri</h4>
                        <p class="testimonial-role">Pelanggan Baru</p>
                    </div>
                </div>
                <p class="testimonial-text">"Menu lalapannya lengkap dan murah meriah. Cocok buat anak kos kayak saya. Sambalnya mantap, bikin ketagihan!"</p>
            </div>
            
            {{-- TESTIMONI 12: BAMBANG SURYANTO --}}
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        <h4 class="testimonial-name">Bambang Suryanto</h4>
                        <p class="testimonial-role">Pelanggan Tetap</p>
                    </div>
                </div>
                <p class="testimonial-text">"Tempat makan yang pas buat keluarga. Anak-anak suka banget sama nasi gorengnya. Pelayanannya juga oke!"</p>
            </div>
            
        </div>
    </div>
</section>

@endsection