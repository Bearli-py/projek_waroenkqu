@extends('layouts.app')
{{-- 
EXTENDS LAYOUT
Halaman testimoni menggunakan template dari layouts/app.blade.php
Kalau dihapus: Halaman gak punya navbar, footer, dan struktur HTML dasar
--}}

@section('title', 'Testimoni - Waroenk Qu')
{{-- 
TITLE TAB BROWSER
Set judul yang muncul di tab browser
Format: "Testimoni - Waroenk Qu"
--}}

@section('content')
{{-- 
MULAI KONTEN HALAMAN
Semua kode di dalam @section('content') sampai @endsection akan masuk ke slot "content" di layout master
--}}

{{-- ============================================
SECTION TESTIMONI - 1 SECTION UNTUK SEMUA
============================================ --}}
<section class="testimonials-section" style="background-color: #FAF3E0; padding: 80px 0;">
    {{-- 
    SECTION TESTIMONI
    Background: #FAF3E0 (cream) - INLINE STYLE
    Padding: 80px atas-bawah, 0 kiri-kanan
    
    KENAPA INLINE STYLE?
    - Override CSS file (background-color: #FAF3E0 di CSS punya padding beda)
    - Memastikan background KONSISTEN (gak ada background putih lagi)
    - Kontrol penuh atas spacing
    
    Kalau dihapus inline style: Background bisa jadi putih atau gak konsisten
    --}}
    
    <div class="container">
        {{-- 
        CONTAINER
        Max-width: 1200px (dari CSS)
        Margin: 0 auto (center horizontal)
        Padding: 0 20px (jarak dari tepi layar)
        --}}
        
        {{-- ============================================
        JUDUL UTAMA (CUMA 1x - GAK ADA DUPLIKAT!)
        ============================================ --}}
        <h2 class="section-title" style="text-align: center; margin-bottom: 15px;">
            Apa Kata Pelanggan Kami?
        </h2>
        {{-- 
        JUDUL UTAMA
        Font: Playfair Display 38px (dari class section-title di CSS)
        Warna: #333 (hitam)
        
        INLINE STYLE:
        - text-align: center = Judul center horizontal
        - margin-bottom: 15px = Jarak ke subjudul (15px = rapat)
        
        KENAPA INLINE STYLE?
        - Override CSS yang mungkin punya margin-bottom lebih besar
        - Kontrol jarak langsung tanpa edit CSS file
        
        SEBELUMNYA: Ada 2 judul (duplikat) karena ada section header terpisah
        SEKARANG: Cuma 1 judul di dalam 1 section
        --}}
        
        <p class="section-subtitle" style="text-align: center; margin-bottom: 40px;">
            Kepuasan Anda adalah prioritas kami. Lihat Pengalaman mereka yang tak terlupakan bersama Waroenk Qu
        </p>
        {{-- 
        SUBJUDUL
        Font: Poppins 18px (dari class section-subtitle di CSS)
        Warna: #666 (abu-abu)
        
        INLINE STYLE:
        - text-align: center = Text center horizontal
        - margin-bottom: 40px = Jarak ke rating box (40px)
        
        FUNGSI: Deskripsi singkat tentang testimoni pelanggan
        --}}
        
        {{-- ============================================
        RATING SUMMARY BOX
        Box putih dengan rating 4.7 + bar chart
        ============================================ --}}
        <div class="rating-summary-box" style="margin-bottom: 40px;">
            {{-- 
            RATING SUMMARY BOX
            Background: putih (dari CSS)
            Padding: 40px 50px (dari CSS)
            Border-radius: 20px (dari CSS)
            Shadow: 0 4px 20px (dari CSS)
            Display: flex (2 kolom horizontal dari CSS)
            
            INLINE STYLE:
            - margin-bottom: 40px = KUNCI! Jarak ke grid testimoni
            
            SEBELUMNYA: margin-bottom: 50px (terlalu jauh)
            SEKARANG: margin-bottom: 40px (pas, gak jauh)
            
            KALAU DIHAPUS INLINE STYLE:
            - Akan pakai margin-bottom dari CSS (50px = jarak jadi jauh lagi)
            
            KENAPA 40px?
            - Jarak yang pas antara rating box dan kotak testimoni
            - Gak terlalu jauh (misal 60px)
            - Gak terlalu rapat (misal 20px)
            - Visual balance yang enak dilihat
            --}}
            
            {{-- KOLOM KIRI: Rating 4.7 + Bintang --}}
            <div class="rating-left">
                <div class="rating-number">4.7</div>
                {{-- Rating angka besar (72px) --}}
                
                <div class="rating-stars">
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    <span class="star half">★</span>
                    {{-- 4 bintang penuh + 1 bintang setengah = 4.5 bintang --}}
                </div>
                
                <p class="rating-count">Berdasarkan 125 ulasan</p>
                {{-- Jumlah total testimoni --}}
            </div>
            
            {{-- KOLOM KANAN: Bar Chart Rating 5-1 --}}
            <div class="rating-right">
                {{-- 5 bar untuk rating 5, 4, 3, 2, 1 bintang --}}
                <div class="rating-bar-item">
                    <span class="rating-label">5</span>
                    <div class="rating-bar-container">
                        <div class="rating-bar-fill" style="width: 80%;"></div>
                        {{-- Width 80% = 80% users kasih 5 bintang --}}
                    </div>
                    <span class="rating-percentage">80%</span>
                </div>
                
                {{-- Bar rating 4, 3, 2, 1 struktur sama --}}
                {{-- ... --}}
            </div>
        </div>
        {{-- Penutup rating-summary-box --}}
        
        {{-- ============================================
        GRID TESTIMONI
        Grid 3 kolom dengan kotak testimoni
        ============================================ --}}
        <div class="testimonials-grid">
            {{-- 
            GRID TESTIMONI
            Display: grid (dari CSS)
            Grid-template-columns: repeat(3, 1fr) = 3 kolom sama rata
            Gap: 30px (jarak antar card)
            
            Gak ada margin-top tambahan karena jarak dari rating box
            sudah diatur di margin-bottom rating box (40px)
            --}}
            
            {{-- ============================================
            TESTIMONI CARD 1
            ============================================ --}}
            <div class="testimonial-card">
                {{-- 
                CARD TESTIMONI
                Background: putih (dari CSS)
                Padding: 30px (dari CSS)
                Border-radius: 15px (dari CSS)
                Shadow: 0 4px 15px (dari CSS)
                Hover: scale(1.05) = zoom 5% saat hover
                --}}
                
                <div class="testimonial-header">
                    {{-- HEADER: Avatar + Nama + Role --}}
                    
                    <div class="testimonial-avatar"></div>
                    {{-- 
                    AVATAR (BULAT ABU-ABU)
                    Width: 50px, Height: 50px
                    Border-radius: 50% (bulat penuh)
                    Background: #e0e0e0 (abu-abu)
                    
                    Kosong (gak ada foto) karena cuma placeholder
                    Kalau mau tambahin foto: <img src="foto.jpg">
                    --}}
                    
                    <div class="testimonial-info">
                        <h4 class="testimonial-name">Nusi Wulandari</h4>
                        {{-- 
                        NAMA PELANGGAN
                        Font: Poppins 18px bold
                        Warna: #333 (hitam)
                        Ganti sesuai nama real pelanggan
                        --}}
                        
                        <p class="testimonial-role">Pelanggan Setia</p>
                        {{-- 
                        ROLE/KETERANGAN
                        Font: Poppins 13px
                        Warna: #999 (abu-abu terang)
                        Bisa diganti: "3 hari yang lalu", "Pelanggan Baru", dll
                        --}}
                    </div>
                </div>
                
                <div class="testimonial-stars">
                    {{-- BINTANG RATING (5 BINTANG PENUH) --}}
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    <span class="star filled">★</span>
                    {{-- 
                    BINTANG RATING
                    Warna: #F2C94C (kuning) untuk filled
                    Font-size: 18px
                    
                    CARA UBAH RATING:
                    - 5 bintang: 5x class="star filled"
                    - 4 bintang: 4x filled + 1x class="star" (tanpa filled)
                    - 3.5 bintang: 3x filled + 1x half + 1x tanpa filled
                    --}}
                </div>
                
                <p class="testimonial-text">
                    "Makanannya enak banget! Rasa autentik, masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi teran."
                </p>
                {{-- 
                TEXT TESTIMONI
                Font: Poppins 15px
                Warna: #555 (abu-abu gelap)
                Line-height: 1.7 (jarak baris enak dibaca)
                Font-style: italic (miring)
                
                Ganti dengan testimoni real dari pelanggan
                Usahakan 2-3 kalimat aja (gak terlalu panjang)
                --}}
            </div>
            {{-- Penutup testimonial-card --}}
            
            {{-- Card testimoni lainnya struktur sama --}}
            {{-- ... --}}
            
        </div>
        {{-- Penutup testimonials-grid --}}
    </div>
    {{-- Penutup container --}}
</section>
{{-- Penutup section --}}

@endsection
{{-- Penutup content section --}}
