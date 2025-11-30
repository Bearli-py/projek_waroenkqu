@extends('layouts.app')

@section('title', 'Beranda - Waroenk Qu')
@section('meta_description', 'Waroenk Qu - Cita rasa autentik dengan suasana asik. Nikmati masakan tradisional Indonesia yang lezat dan terjangkau.')

@section('content')

<!-- Hero Section -->
<section class="hero-home">
    <div class="hero-home-image" style="background-image: url('/images/warung/dalam2.png');"></div>
    <div class="hero-home-overlay"></div>
    <div class="hero-home-content">
        <h1>Cita Rasa Autentik, Suasana Asik</h1>
        <p>Nikmati kelezatan masakan Indonesia dengan harga terjangkau di tempat yang nyaman</p>
        <div class="hero-home-buttons">
            <a href="{{ route('menu') }}" class="btn-hero-primary">Lihat Menu</a>
            <a href="{{ route('contact') }}" class="btn-hero-secondary">Hubungi Kami</a>
        </div>
    </div>
</section>

<!-- Menu Andalan Kami -->
<section class="featured-menu">
    <div class="section-container">
        <h2 class="section-title">Menu Andalan Kami</h2>
        
        <div class="featured-menu-grid">
            
            <!-- Nasi Rawon -->
            <div class="featured-card">
                <div class="featured-image" data-menu-name="Nasi Rawon">
                    <img src="{{ asset('images/menu/rawon.jpg') }}" alt="Nasi Rawon">
                </div>
                <div class="featured-info">
                    <h3>Nasi Rawon</h3>
                    <p class="featured-price">Rp 18.000</p>
                </div>
            </div>

            <!-- Nasi Goreng -->
            <div class="featured-card">
                <div class="featured-image" data-menu-name="Nasi Goreng">
                    <img src="{{ asset('images/menu/nasi-goreng.jpg') }}" alt="Nasi Goreng">
                </div>
                <div class="featured-info">
                    <h3>Nasi Goreng</h3>
                    <p class="featured-price">Rp 12.000</p>
                </div>
            </div>

            <!-- Mie Goreng Jawa -->
            <div class="featured-card">
                <div class="featured-image" data-menu-name="Mie Goreng Jawa">
                    <img src="{{ asset('images/menu/mie-goreng.jpg') }}" alt="Mie Goreng Jawa">
                </div>
                <div class="featured-info">
                    <h3>Mie Goreng Jawa</h3>
                    <p class="featured-price">Rp 12.000</p>
                </div>
            </div>

            <!-- Nasi Ayam -->
            <div class="featured-card">
                <div class="featured-image" data-menu-name="Nasi Ayam">
                    <img src="{{ asset('images/menu/lalapan-ayam.jpg') }}" alt="Nasi Ayam">
                </div>
                <div class="featured-info">
                    <h3>Nasi Ayam</h3>
                    <p class="featured-price">Rp 12.000</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Cerita di Balik Dapur Kami -->
<section class="story-section">
    <div class="section-container">
        <div class="story-grid">
            
            <div class="story-content">
                <h2>Cerita di Balik Dapur Kami</h2>
                <p>Waroenk Qu hadir dari cinta terhadap masakan tradisional dan keinginan untuk berbagi kelezatan dengan harga yang ramah di kantong. Setiap menu yang kami sajikan dibuat dengan resep turun-temurun dan bahan-bahan pilihan. Kami percaya bahwa makanan enak tidak harus mahal, dan suasana nyaman adalah kunci kenikmatan bersantap.</p>
                <a href="{{ route('about') }}" class="btn-story">Baca Selengkapnya</a>
            </div>

            <div class="story-image">
                <img src="{{ asset('images/warung/depan.jpg') }}" alt="Waroenk Qu">
            </div>

        </div>
    </div>
</section>

<!-- Apa Kata Mereka? -->
<section class="testimonial-home">
    <div class="section-container">
        <h2 class="section-title">Apa Kata Mereka?</h2>
        <p class="section-subtitle">Kisah pelanggan setia kami yang puas! Kata siapa juga yang mampir terkesan :)</p>
        
        <div class="testimonial-home-grid">
            
            <!-- Testimonial 1 -->
            <div class="testimonial-home-card">
                <div class="testimonial-icon">💬</div>
                <p class="testimonial-text">"Rawonnya enak banget! Kuah hitamnya pekat dan dagingnya empuk. Harga terjangkau untuk rasa yang premium. Pasti balik lagi!"</p>
                <div class="testimonial-author">
                    <p class="author-name">Budi Santoso</p>
                    <p class="author-date">15 Oktober 2024</p>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-home-card">
                <div class="testimonial-icon">💬</div>
                <p class="testimonial-text">"Tempatnya nyaman dan bersih. Pelayanannya ramah. Nasi gorengnya juara, kecapnya pas banget. Cocok buat makan bareng keluarga."</p>
                <div class="testimonial-author">
                    <p class="author-name">Siti Nurhaliza</p>
                    <p class="author-date">20 Oktober 2024</p>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-home-card">
                <div class="testimonial-icon">💬</div>
                <p class="testimonial-text">"Sebagai anak kos, Waroenk Qu jadi tempat makan favorit. Harganya ramah kantong tapi rasanya ga kalah sama resto mahal. Rekomended!"</p>
                <div class="testimonial-author">
                    <p class="author-name">Andi Wijaya</p>
                    <p class="author-date">25 Oktober 2024</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection