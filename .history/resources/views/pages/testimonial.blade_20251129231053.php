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
<section class="testimonials-section">
    <div class="container">
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