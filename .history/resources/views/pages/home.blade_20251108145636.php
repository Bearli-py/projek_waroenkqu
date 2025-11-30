@extends('layouts.app')

@section('title', 'Beranda - Waroenk Qu')
@section('meta_description', 'Waroenk Qu - Nikmati kelezatan masakan Indonesia dengan resep tradisional yang autentik. Cita Rasa Autentik, Harga Bersahabat!')

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-icon">🍴</div>
    
    <!-- WARNA WAROENK QU - INLINE STYLE DENGAN !IMPORTANT -->
    <h2>
        <span style="color: #595959 !important; background: none !important; -webkit-text-fill-color: #595959 !important;">Waroenk</span> 
        <span style="color: #E96C3A !important; background: none !important; -webkit-text-fill-color: #E96C3A !important;">Qu</span>
    </h2>
    
    <!-- Tagline -->
    <div class="hero-tagline">
        ✨ <span style="color: #5A8C6B;">Cita Rasa Autentik</span>, 
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