@extends('layouts.app')

@section('title', 'Beranda - Waroenk Qu')
@section('meta_description', 'Waroenk Qu - Nikmati kelezatan masakan Indonesia dengan resep tradisional yang autentik. Cita Rasa Autentik, Harga Bersahabat!')

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-icon">🍴</div>
    
    <!-- Warna: Waroenk = #595959, Qu = #E96C3A -->
    <h2>
        <span style="color: #595959;">Waroenk</span> 
        <span style="color: #E96C3A;">Qu</span>
    </h2>
    
    <!-- Tagline dengan warna yang sama -->
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