@extends('layouts.app')

@section('title', 'Beranda - Waroenk Qu')
@section('meta_description', 'Waroenk Qu - Nikmati kelezatan masakan Indonesia dengan resep tradisional yang autentik. Cita Rasa Autentik, Harga Bersahabat!')

@section('content')

<!-- Hero Section - FULL SCREEN -->
<section class="hero">
    <h2>War
        <span style="color: #595959;">Waroenk</span> 
        <span style="color: #E96C3A;">Qu</span>
    </h2>
    
    <!-- Tagline dengan warna sama -->
    <div class="hero-tagline">
        ✨ <span style="color: #2D7A3E;">Cita Rasa Autentik</span>, 
        <span style="color: #E96C3A;">Harga Bersahabat</span> ✨
    </div>
    
    <p class="hero-description">
        Nikmati kelezatan masakan Indonesia dengan resep tradisional yang telah diwariskan turun-temurun. 
        Sajian istimewa untuk setiap momen bersama keluarga.
    </p>
    
    <div class="hero-cta">
        <a href="{{ route('menu') }}" class="btn-primary">
            Lihat Menu Kami ↓
        </a>
    </div>
</section>

@endsection