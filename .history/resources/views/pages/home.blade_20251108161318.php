@extends('layouts.app')

@section('title', 'Beranda - Waroenk Qu')
@section('meta_description', 'Waroenk Qu - Nikmati kelezatan masakan Indonesia dengan resep tradisional yang autentik.')

@section('content')

<!-- Hero Carousel Section -->
<section class="hero-carousel">
    <div class="carousel-container">
        
        <!-- Slide 1 -->
        <div class="carousel-slide active">
            <div class="carousel-image" style="background-image: url('{{ asset('images/warung/dalam1.png') }}');"></div>
            <div class="carousel-overlay"></div>
            <div class="carousel-content">
                <h2>Selamat Datang di<br><span style="color: #595959;">Waroenk</span> <span style="color: #E96C3A;">Qu</span></h2>
                <p>Kelezatan Makanan & Minuman Tradisional</p>
                <div class="carousel-buttons">
                    <a href="{{ route('menu') }}" class="btn-carousel-primary">Lihat Menu</a>
                    <a href="{{ route('contact') }}" class="btn-carousel-secondary">Hubungi Kami</a>
                </div>
            </div>
        </div>
        
        <!-- Slide 2 -->
        <div class="carousel-slide">
            <div class="carousel-image" style="background-image: url('{{ asset('images/dalam2.png') }}');"></div>
            <div class="carousel-overlay"></div>
            <div class="carousel-content">
                <h2>Rawon Legendaris</h2>
                <p>Cita Rasa Autentik Nusantara</p>
                <div class="carousel-buttons">
                    <a href="{{ route('menu') }}" class="btn-carousel-primary">Lihat Menu</a>
                    <a href="{{ route('contact') }}" class="btn-carousel-secondary">Hubungi Kami</a>
                </div>
            </div>
        </div>
        
        <!-- Slide 3 -->
        <div class="carousel-slide">
            <div class="carousel-image" style="background-image: url('{{ asset('images/warung/luar sore.jpg') }}');"></div>
            <div class="carousel-overlay"></div>
            <div class="carousel-content">
                <h2>Suasana Nyaman</h2>
                <p>Tempat Makan yang Asri dan Bersih</p>
                <div class="carousel-buttons">
                    <a href="{{ route('menu') }}" class="btn-carousel-primary">Lihat Menu</a>
                    <a href="{{ route('contact') }}" class="btn-carousel-secondary">Hubungi Kami</a>
                </div>
            </div>
        </div>
        
        <!-- Navigation Arrows -->
        <button class="carousel-prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="carousel-next" onclick="moveSlide(1)">&#10095;</button>
        
        <!-- Dots Navigation -->
        <div class="carousel-dots">
            <span class="dot active" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        
    </div>
</section>

<script>
let slideIndex = 1;
let autoSlideInterval;

// Show first slide
showSlides(slideIndex);

// Auto slide every 7 seconds
autoSlide();

function autoSlide() {
    autoSlideInterval = setInterval(() => {
        moveSlide(1);
    }, 5000);
}

function moveSlide(n) {
    clearInterval(autoSlideInterval);
    showSlides(slideIndex += n);
    autoSlide();
}

function currentSlide(n) {
    clearInterval(autoSlideInterval);
    showSlides(slideIndex = n);
    autoSlide();
}

function showSlides(n) {
    let slides = document.getElementsByClassName("carousel-slide");
    let dots = document.getElementsByClassName("dot");
    
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }
    
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }
    
    slides[slideIndex-1].classList.add("active");
    dots[slideIndex-1].classList.add("active");
}
</script>

@endsection