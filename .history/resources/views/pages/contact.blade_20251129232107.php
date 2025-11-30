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
Judul halaman + subjudul singkat
--}}
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Kontak Kami</h1>
        <p class="page-subtitle">Butuh info atau mau reservasi? Silakan hubungi kami melalui kontak di bawah ini.</p>
    </div>
</section>

{{-- 
=================================
SECTION 2: KOTAK INFORMASI KONTAK
=================================
4 kotak informasi:
1. Alamat
2. Telepon
3. Email
4. Jam Buka
Hover: kotak sedikit membesar + shadow (sesuai contoh di dokumen)
--}}
<section class="contact-info-section">
    <div class="container">
        {{-- 
        GRID 4 KOTAK KONTAK
        Desktop: 4 kolom, Tablet: 2 kolom, Mobile: 1 kolom
        --}}
        <div class="contact-info-grid">
            
            {{-- KOTAK 1: ALAMAT --}}
            <div class="contact-box">
                {{-- ICON ALAMAT --}}
                <div class="contact-box-icon">
                    <img src="{{ asset('images/icon/maps.png') }}" alt="Alamat">
                </div>
                {{-- JUDUL KOTAK --}}
                <h3 class="contact-box-title">Alamat</h3>
                {{-- ISI ALAMAT --}}
                <p class="contact-box-text">
                    Jl. Sukowiyo, Kec. Bondowoso<br>
                    Bondowoso, Jawa Timur<br>
                    Indonesia
                </p>
            </div>
            
            {{-- KOTAK 2: TELEPON --}}
            <div class="contact-box">
                <div class="contact-box-icon">
                    <img src="{{ asset('images/icon/telepon.png') }}" alt="Telepon">
                </div>
                <h3 class="contact-box-title">Telepon</h3>
                {{-- 
                NOMOR TELEPON
                href="tel:..." = kalau diklik di HP langsung buka dial
                --}}
                <p class="contact-box-text">
                    <a href="tel:+6285824171803">+62 858-2417-1803</a>
                </p>
            </div>
            
            {{-- KOTAK 3: EMAIL --}}
            <div class="contact-box">
                <div class="contact-box-icon">
                    <img src="{{ asset('images/icon/email merah.png') }}" alt="Email">
                </div>
                <h3 class="contact-box-title">Email</h3>
                {{-- 
                ALAMAT EMAIL
                href="mailto:..." = kalau diklik akan buka aplikasi email
                --}}
                <p class="contact-box-text">
                    <a href="mailto:info@waroenkqu.com">info@waroenkqu.com</a>
                </p>
            </div>
            
            {{-- KOTAK 4: JAM BUKA --}}
            <div class="contact-box">
                <div class="contact-box-icon">
                    <img src="{{ asset('images/icon/jam buka.png') }}" alt="Jam Buka">
                </div>
                <h3 class="contact-box-title">Jam Buka</h3>
                <p class="contact-box-text">
                    <strong>Senin – Jumat</strong><br>
                    08.00 – 21.00 WIB<br><br>
                    <strong>Sabtu – Minggu</strong><br>
                    06.00 – 22.00 WIB
                </p>
            </div>
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 3: FORM KONTAK + MAPS
=================================
Layout 2 kolom:
- Kiri: Form kontak
- Kanan: Google Maps (embed)
Catatan: Link/maps asli nanti tinggal kamu ganti src-nya
--}}
<section class="contact
