{{-- 
PAKAI LAYOUT UTAMA
Halaman kontak ikut template layouts/app.blade.php
--}}
@extends('layouts.app')

{{-- JUDUL TAB BROWSER --}}
@section('title', 'Kontak - Waroenk Qu')

{{-- ISI HALAMAN --}}
@section('content')

{{-- 
=================================
SECTION 1: HEADER KONTAK
=================================
Judul "Hubungi Kami" + subjudul
Background cream/putih
--}}
<section class="page-header">
    <div class="container">
        {{-- 
        JUDUL HALAMAN
        Font Playfair Display, warna merah tua
        --}}
        <h1 class="page-title">Hubungi Kami</h1>
        
        {{-- 
        SUBJUDUL
        Kalimat singkat ajakan hubungi warung
        Font Poppins, warna hitam/abu tua
        --}}
        <p class="page-subtitle">Kami siap melayani Anda. Jangan ragu untuk menghubungi kami melalui informasi di bawah ini.</p>
    </div>
</section>

{{-- 
=================================
SECTION 2: 4 KOTAK INFORMASI KONTAK
=================================
Layout grid 4 kotak horizontal (Desktop: 4 kolom, Tablet: 2 kolom, Mobile: 1 kolom)
Setiap kotak punya:
- Border merah melengkung (border-radius)
- Icon besar di tengah atas
- Judul di bawah icon
- HOVER: kotak sedikit membesar (scale) + detail lengkap muncul
Sesuai gambar yang kamu kirim!
--}}
<section class="contact-info-section">
    <div class="container">
        {{-- 
        GRID 4 KOTAK
        CSS Grid: 4 kolom desktop, 2 kolom tablet, 1 kolom mobile
        Gap antar kotak biar gak nempel
        --}}
<div class="contact-boxes">
    
    {{-- CARD ALAMAT --}}
    <div class="contact-box">
        <div class="contact-box-icon">
            <img src="{{ asset('images/icon/lokasi.png') }}" alt="Alamat">
        </div>
        <h3 class="contact-box-title">Alamat</h3>
        <div class="contact-box-detail">
            <p>Wangkal, Sukowiyo, Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur 68219</p>
        </div>
    </div>
    
    {{-- CARD TELEPON --}}
    <div class="contact-box">
        <div class="contact-box-icon">
            <img src="{{ asset('images/icon/telepon.png') }}" alt="Telepon">
        </div>
        <h3 class="contact-box-title">Telepon</h3>
        <div class="contact-box-detail">
            <p><a href="tel:+6285924171803">+62 859-2417-1803</a></p>
            <span class="contact-note">(Admin)</span>
        </div>
    </div>
    
    {{-- CARD EMAIL --}}
    <div class="contact-box">
        <div class="contact-box-icon">
            <img src="{{ asset('images/icon/email.png') }}" alt="Email">
        </div>
        <h3 class="contact-box-title">E-mail</h3>
        <div class="contact-box-detail">
            <p><a href="mailto:WaroenkQu@gmail.com">WaroenkQu@gmail.com</a></p>
        </div>
    </div>
    
    {{-- CARD JAM BUKA --}}
    <div class="contact-box">
        <div class="contact-box-icon">
            <img src="{{ asset('images/icon/jam.png') }}" alt="Jam Buka">
        </div>
        <h3 class="contact-box-title">Jam Buka</h3>
        <div class="contact-box-detail">
            <p><strong>Senin — Jumat</strong><br>08.00 — 21.00 WIB</p>
            <p><strong>Sabtu — Minggu</strong><br>08.00 — 22.00 WIB</p>
        </div>
    </div>
</div>
    </div>
</section>

{{-- 
=================================
SECTION 3: GOOGLE MAPS
=================================
Section dengan judul "Temukan Lokasi Kami"
Embed Google Maps iframe
Nanti link maps tinggal ganti src dengan URL asli dari Google Maps
--}}
<section class="map-section">
    <div class="container">
        {{-- 
        JUDUL SECTION
        Text center, font Playfair Display
        --}}
        <h2 class="section-title text-center">Temukan Lokasi Kami</h2>
        
        {{-- 
        WRAPPER MAPS
        Container untuk iframe Google Maps
        Border-radius biar sudut melengkung
        Shadow halus biar keliatan rapi
        --}}
        <div class="map-wrapper">
            {{-- 
            GOOGLE MAPS IFRAME
            Embed dari Google Maps
            width="100%" dan height untuk responsive
            frameborder="0" = tanpa border iframe
            allowfullscreen = bisa fullscreen
            loading="lazy" = load cuma kalau sudah scroll ke sini (optimize loading)
            
            CATATAN: Ganti src dengan link Google Maps asli warung kamu!
            Cara dapat link:
            1. Buka Google Maps
            2. Cari lokasi warung
            3. Klik "Share" > "Embed a map"
            4. Copy HTML iframe-nya
            5. Paste src-nya di sini
            
            Kalau dihapus: Gak ada peta lokasi warung
            --}}
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.5!2d113.8!3d-7.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTQnMDAuMCJTIDExM8KwNDgnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

@endsection