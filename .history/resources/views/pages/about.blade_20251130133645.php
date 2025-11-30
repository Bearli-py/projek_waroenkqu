{{-- 
PAKAI LAYOUT UTAMA
Halaman tentang ikut template layouts/app.blade.php
--}}
@extends('layouts.app')

{{-- JUDUL TAB BROWSER --}}
@section('title', 'Tentang Kami - Waroenk Qu')

{{-- ISI HALAMAN --}}
@section('content')

{{-- 
=================================
SECTION 1: HEADER TENTANG
=================================
Judul halaman
--}}
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Tentang Waroenk Qu</h1>
    </div>
</section>

{{-- 
=================================
SECTION 2: TENTANG KAMI (CERITA LENGKAP)
=================================
Layout 2 kolom: kiri text, kanan foto
Berisi cerita lengkap tentang warung
--}}
<section class="about-section" style="background-color: #fff;">
    <div class="container">
        {{-- 
        WRAPPER 2 KOLOM
        Flexbox: kiri text, kanan foto
        Di mobile: susun kebawah (text dulu, baru foto)
        --}}
        <div class="about-wrapper">
            {{-- 
            KOLOM KIRI: TEXT TENTANG KAMI
            Judul + paragraf panjang tentang warung
            --}}
            <div class="about-text">
                {{-- 
                JUDUL SECTION
                "Tentang Kami" dengan font Playfair Display
                --}}
                <h2 class="section-title">Tentang Kami</h2>
                
                {{-- 
                CERITA LENGKAP WARUNG
                Paragraf panjang dari dokumen kamu
                Font Poppins, line-height 1.8 biar enak dibaca
                --}}
                <p class="section-description">
                    Berawal dari resep warisan keluarga, Waroenk Qu lahir dari semangat untuk menyajikan cita rasa otentik masakan Indonesia dengan sentuhan modern. Kami percaya bahwa makanan adalah jembatan yang menghubungkan kenangan dan menciptakan momen berharga. Setiap hidangan adalah cerita dan kami ingin berbagi cerita kami dengan Anda.
                </p>
            </div>
            
            {{-- 
            KOLOM KANAN: FOTO WARUNG
            Foto suasana warung
            --}}
            <div class="about-image">
                <img src="{{ asset('images/warung/dalam2.png') }}" alt="Tentang Waroenk Qu" class="about-img">
            </div>
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 3: VISI & MISI
=================================
2 kotak: Visi dan Misi
Hover: kotak membesar sedikit atau border muncul (sesuai dokumen)
Background berbeda dari section lain (cream/beige)
--}}
<section class="vision-mission-section">
    <div class="container">
        {{-- 
        GRID 2 KOTAK
        Desktop: 2 kolom sejajar
        Mobile: 1 kolom susun kebawah
        --}}
        <div class="vision-mission-grid">
            
            {{-- 
            KOTAK VISI
            Background putih, border-radius, shadow
            Hover: scale sedikit atau border merah muncul
            --}}
            <div class="vision-mission-card">
                {{-- 
                JUDUL KOTAK
                Text "Visi" dengan font Playfair Display besar
                Warna merah #B33939
                --}}
                <h3 class="vm-title">Visi</h3>
                
                {{-- 
                ISI VISI
                Text dari dokumen kamu
                Font Poppins, text align center atau justify
                --}}
                <p class="vm-text">
                    Menjadi destinasi kuliner terdepan yang melestarikan dan memperkenalkan kekayaan rasa masakan Indonesia kepada dunia, satu hidangan istimewa dalam satu waktu.
                </p>
            </div>
            
            {{-- 
            KOTAK MISI
            Sama kayak kotak Visi
            --}}
            <div class="vision-mission-card">
                <h3 class="vm-title">Misi</h3>
                <p class="vm-text">
                    Menyajikan hidangan otentik dengan bahan baku lokal berkualitas tinggi, memberikan pengalaman bersantap yang hangat dan tak terlupakan, berinovasi tanpa meninggalkan akar tradisi.
                </p>
            </div>
            
        </div>
    </div>
</section>

{{-- 
=================================
SECTION 4: APA YANG KAMI YAKINI
=================================
3 kotak value/keunggulan warung:
1. Bahan Makanan Berkualitas
2. Pelayanan Ramah
3. Kualitas Rasa Terjamin
Hover: border merah muncul (sesuai dokumen)
--}}
<section class="values-section" style="background-color: #fff;">
    <div class="container">
        {{-- 
        JUDUL SECTION
        "Apa yang Kami Yakini" text center
        --}}
        <h2 class="section-title text-center">Apa yang Kami Yakini</h2>
        
        {{-- 
        GRID 3 KOTAK
        Desktop: 3 kolom horizontal
        Tablet: 2 kolom (1 di atas, 2 di bawah atau sebaliknya)
        Mobile: 1 kolom susun kebawah
        --}}
        <div class="values-grid">
            
            {{-- 
            KOTAK 1: BAHAN MAKANAN BERKUALITAS
            Background putih, border-radius, shadow halus
            Default: tanpa border
            Hover: border merah 3px muncul (sesuai gambar dokumen)
            --}}
            <div class="value-card">
                {{-- 
                ICON VALUE
                Icon bahan makanan.png ukuran sedang (60-80px)
                Posisi center
                --}}
                <div class="value-icon-wrapper">
                    <img src="{{ asset('images/icon/bahan makanan.png') }}" alt="Bahan Berkualitas" class="value-icon">
                </div>
                
                {{-- 
                JUDUL VALUE
                Font Playfair Display, warna merah atau hitam
                --}}
                <h3 class="value-title">Bahan Makanan Berkualitas</h3>
                
                {{-- 
                DESKRIPSI VALUE
                Text singkat penjelasan
                Font Poppins, text center
                --}}
                <p class="value-description">
                    Kami hanya menggunakan bahan-bahan segar dan berkualitas tinggi untuk setiap hidangan yang kami sajikan.
                </p>
            </div>
            
            {{-- 
            KOTAK 2: PELAYANAN RAMAH
            --}}
            <div class="value-card">
                <div class="value-icon-wrapper">
                    <img src="{{ asset('images/icon/pelayanan.png') }}" alt="Pelayanan Ramah" class="value-icon">
                </div>
                <h3 class="value-title">Pelayanan Ramah</h3>
                <p class="value-description">
                    Tim kami siap melayani Anda dengan senyuman dan keramahan yang tulus untuk pengalaman bersantap terbaik.
                </p>
            </div>
            
            {{-- 
            KOTAK 3: KUALITAS RASA TERJAMIN
            --}}
            <div class="value-card">
                <div class="value-icon-wrapper">
                    <img src="{{ asset('images/icon/kualitas rasa.png') }}" alt="Kualitas Rasa" class="value-icon">
                </div>
                <h3 class="value-title">Kualitas Rasa Terjamin</h3>
                <p class="value-description">
                    Setiap hidangan dibuat dengan resep rahasia yang menghasilkan cita rasa istimewa yang selalu konsisten.
                </p>
            </div>
            
        </div>
    </div>
</section>

@endsection