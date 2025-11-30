@extends('layouts.app')

@section('title', 'Beranda - Waroeng Cita Rasa')

@section('content')
    <section class="hero-section" style="background-image: url('{{ asset('images/warung/dalam2.png') }}');">
        <div class="hero-overlay">
            <h1>Cita Rasa Autentik, Suasana Asik</h1>
            <p>Warung kami hadir untuk memanjakan lidah Anda dengan cita rasa lokal terbaik. Sempurna untuk segala suasana.</p>
            <div class="hero-actions">
                <a href="/menu" class="cta-button primary-btn">Lihat Menu Kami</a>
                <a href="/about" class="cta-button secondary-btn">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <section class="menu-highlight">
        <h2>Menu Andalan Kami</h2>
        <div class="menu-grid">
            <div class="menu-card">
                <img src="{{ asset('images/menu/rawon.png') }}" alt="Nasi Rawon" class="menu-image">
                <h3>Nasi Rawon</h3>
                <p>Rp 25.000</p>
            </div>
            <div class="menu-card">
                <img src="{{ asset('images/menu/nasi goreng.png') }}" alt="Nasi Goreng" class="menu-image">
                <h3>Nasi Goreng</h3>
                <p>Rp 18.000</p>
            </div>
            <div class="menu-card">
                <img src="{{ asset('images/menu/mie goreng.png') }}" alt="Mie Goreng Jawa" class="menu-image">
                <h3>Mie Goreng Jawa</h3>
                <p>Rp 17.000</p>
            </div>
            <div class="menu-card">
                <img src="{{ asset('images/menu/soto ayam.png') }}" alt="Soto Ayam" class="menu-image">
                <h3>Soto Ayam</h3>
                <p>Rp 15.000</p>
            </div>
        </div>
    </section>

    <section class="about-highlight">
        <div class="about-content">
            <h2>Cerita di Balik Dapur Kami</h2>
            <p>Waroeng Cita Rasa hadir untuk menghadirkan cita rasa autentik dan pengalaman bersantap yang nyaman bagi semua kalangan. Terinspirasi dari kelezatan masakan rumahan, kami menyajikan hidangan dengan cinta dan kualitas terbaik.</p>
            <a href="/about" class="cta-button primary-btn">Baca Selengkapnya</a>
        </div>
        <div class="about-image-container">
            <img src="{{ asset('images/warung/luar-sore.png') }}" alt="Warung Luar Sore" class="about-highlight-img">
        </div>
    </section>

    <section class="testimonial-section">
        <h2>Apa Kata Mereka?</h2>
        <p class="testimonial-intro">Kepuasan pelanggan adalah prioritas kami. Simak apa yang mereka rasakan tentang Waroeng Cita Rasa:</p>
        
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <img src="{{ asset('images/icon/quote.png') }}" alt="Quote" class="quote-icon">
                <p>"Masakannya otentik dan porsi makanannya pas banget. Selalu jadi pilihan pertama saat ingin makan enak."</p>
                <div class="client-info">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="client-avatar">
                    <span>Ahmad K.</span>
                </div>
            </div>
            <div class="testimonial-card">
                <img src="{{ asset('images/icon/quote.png') }}" alt="Quote" class="quote-icon">
                <p>"Pelayanannya cepat dan ramah, tempatnya bersih. Mie Goreng Jawanya juara!"</p>
                <div class="client-info">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="client-avatar">
                    <span>Budi S.</span>
                </div>
            </div>
             <div class="testimonial-card">
                <img src="{{ asset('images/icon/quote.png') }}" alt="Quote" class="quote-icon">
                <p>"Harga sesuai dengan kualitas rasa. Bikin nagih dan selalu ingin kembali lagi."</p>
                <div class="client-info">
                    <img src="{{ asset('images/icon/user.png') }}" alt="User" class="client-avatar">
                    <span>Citra W.</span>
                </div>
            </div>
        </div>
    </section>
@endsection