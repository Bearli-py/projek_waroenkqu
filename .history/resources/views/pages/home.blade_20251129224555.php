{{-- 
EXTENDS LAYOUT
Halaman home pakai template dari layouts/app.blade.php
Jadi gak perlu tulis <html>, <head>, <body> lagi.
--}}
@extends('layouts.app')

{{-- JUDUL TAB BROWSER --}}
@section('title', 'Beranda - Waroenk Qu')

{{-- KONTEN HALAMAN --}}
@section('content')

{{-- 
=================================
SECTION 1: HERO (BANNER UTAMA)
=================================
Background: Foto suasana warung (dalam1.png atau dalam2.png)
Overlay gelap biar text jelas
Isi: Judul, tagline, 2 tombol
--}}
<section class="hero">
    {{-- 
    BACKGROUND IMAGE
    Pakai CSS background-image dengan foto suasana warung.
    Di CSS nanti dikasih: background: url('../images/warung/dalam1.png')
    Kalau dihapus: Hero cuma warna solid, gak ada foto
    --}}
    
    {{-- 
    OVERLAY GELAP
    Lapisan hitam semi-transparan (opacity 0.5) biar text keliatan.
    Tanpa ini text tenggelam sama background foto.
    Kalau dihapus: Text susah dibaca
    --}}
    <div class="hero-overlay"></div>
    
    {{-- CONTAINER --}}
    <div class="container">
        {{-- ISI HERO (di atas overlay) --}}
        <div class="hero-content">
            {{-- 
            JUDUL UTAMA
            Font besar Playfair Display, warna putih
            --}}
            <h1 class="hero-title">Cita Rasa Autentik, Suasana Asik</h1>
            
            {{-- 
            TAGLINE
            Font Poppins, warna putih, ukuran sedang
            --}}
            <p class="hero-subtitle">Sajian Nusantara yang khas, hadir untuk Anda di tengah kehangatan suasana yang tak terlupakan.</p>
            
            {{-- 
            2 TOMBOL
            Lihat Menu (merah penuh) dan Hubungi Kami (border putih transparan)
            --}}
            <div class="hero-buttons">
                <a href="{{ route('menu') }}" class="btn btn-primary">Lihat Menu</a>
                <a href="{{ route('kontak') }}" class="btn btn-secondary">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>



{{-- 
=================================
SECTION 3: CERITA DI BALIK DAPUR KAMI
=================================
Layout 2 kolom: TEXT KIRI, FOTO KANAN (kebalik dari sebelumnya!)
Background: cream/beige (#FAF3E0)
--}}
<section class="about-preview">
    <div class="container">
        {{-- 
        WRAPPER 2 KOLOM
        Flexbox: kiri text, kanan foto
        Di mobile: susun kebawah (text dulu, baru foto)
        --}}
        <div class="about-wrapper">
            {{-- 
            KOLOM KIRI: TEXT
            Judul + paragraf + tombol
            Order: 1 (di desktop muncul dulu)
            --}}
            <div class="about-text">
                {{-- JUDUL SECTION --}}
                <h2 class="section-title">Cerita di Balik Dapur Kami</h2>
                
                {{-- TEXT CERITA --}}
                <p class="section-description">
                    Waroenk Qu hadir untuk menghadirkan cita rasa kuliner khas yang autentik, nikmat, dan terjangkau bagi semua kalangan. Terinspirasi dari kelezatan masakan rumahan yang selalu menggugah selera.
                </p>
                
                {{-- TOMBOL BACA SELENGKAPNYA --}}
                <a href="{{ route('tentang') }}" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
            
            {{-- 
            KOLOM KANAN: FOTO WARUNG
            Foto suasana luar warung (luar-sore.png)
            Order: 2 (di desktop muncul kedua)
            --}}
            <div class="about-image">
                <img src="{{ asset('images/warung/luar-sore.png') }}" alt="Waroenk Qu" class="about-img">
            </div>
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 4: APA KATA MEREKA?
=================================
Tampilkan 3 testimoni dengan:
- Foto profil user (icon user.png)
- Nama user
- Text testimoni
- Hover: zoom dikit (scale 1.05, natural)
--}}
<section class="testimonials-preview">
    <div class="container">
        {{-- JUDUL SECTION --}}
        <h2 class="section-title text-center">Apa Kata Mereka?</h2>
        
        {{-- 
        SUBJUDUL
        Kalimat penjelas di bawah judul
        --}}
        <p class="section-subtitle text-center">Kesan pelanggan adalah prioritas kami. Lihat apa yang mereka katakan tentang Waroenk Qu.</p>
        
        {{-- 
        GRID 3 TESTIMONI
        Desktop: 3 kolom, Mobile: 1 kolom
        --}}
        <div class="testimonials-grid">
            {{-- 
            TESTIMONI 1: Susi Wulandari
            Kotak putih dengan shadow, padding, border radius
            Hover: scale sedikit (1.05)
            --}}
            <div class="testimonial-card">
                {{-- 
                HEADER TESTIMONI
                Foto profil + nama + role/keterangan
                --}}
                <div class="testimonial-header">
                    {{-- Foto profil (icon user.png) --}}
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="testimonial-avatar">
                    <div class="testimonial-user">
                        {{-- Nama user --}}
                        <h4 class="testimonial-name">Susi Wulandari</h4>
                        {{-- Role/keterangan --}}
                        <p class="testimonial-role">Pelanggan Setia</p>
                    </div>
                </div>
                
                {{-- 
                TEXT TESTIMONI
                Isi review dari customer dengan tanda kutip
                --}}
                <p class="testimonial-text">"Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi kesini."</p>
            </div>
            
            {{-- TESTIMONI 2: Andi Setiawan --}}
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
            
            {{-- TESTIMONI 3: Rina Andayani --}}
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
        </div>
    </div>
</section>

@endsection
