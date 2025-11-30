@extends('layouts.app')

@section('title', 'Beranda - Waroenk Qu')

@section('content')

<section class="hero-carousel">
    <div class="carousel-container">
        
        <div class="carousel-slide active">
            <div class="carousel-image" style="background-image: url('/images/warung/dalam1.png');"></div>
            <div class="carousel-overlay"></div>
            <div class="carousel-content">
                <h2>Selamat Datang di<br><span style="color: #595959;">Waroenk</span> <span style="color: #E96C3A;">Qu</span></h2>
                <p>Kelezatan Makanan & Minuman Tradisional</p>
                <div class="carousel-buttons">
                    <a href="/menu" class="btn-carousel-primary">Lihat Menu</a>
                    <a href="/kontak" class="btn-carousel-secondary">Hubungi Kami</a>
                </div>
            </div>
        </div>
        
        <div class="carousel-slide">
            <div class="carousel-image" style="background-image: url('/images/warung/dalam2.png');"></div>
            <div class="carousel-overlay"></div>
            <div class="carousel-content">
                <h2>Rawon Legendaris</h2>
                <p>Cita Rasa Autentik Nusantara</p>
                <div class="carousel-buttons">
                    <a href="/menu" class="btn-carousel-primary">Lihat Menu</a>
                    <a href="/kontak" class="btn-carousel-secondary">Hubungi Kami</a>
                </div>
            </div>
        </div>
        
        <div class="carousel-slide">
            <div class="carousel-image" style="background-image: url('/images/warung/luar-sore.png');"></div>
            <div class="carousel-overlay"></div>
            <div class="carousel-content">
                <h2>Suasana Nyaman</h2>
                <p>Tempat Makan yang Asri dan Bersih</p>
                <div class="carousel-buttons">
                    <a href="/menu" class="btn-carousel-primary">Lihat Menu</a>
                    <a href="/kontak" class="btn-carousel-secondary">Hubungi Kami</a>
                </div>
            </div>
        </div>
        
        <button class="carousel-prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="carousel-next" onclick="moveSlide(1)">&#10095;</button>
        
        <div class="carousel-dots">
            <span class="dot active" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        
    </div>
</section>

<script>
var slideIndex = 1;
var autoSlideInterval;

showSlides(slideIndex);
autoSlide();

function autoSlide() {
    autoSlideInterval = setInterval(function() {
        moveSlide(1);
    }, 5000);
}

function moveSlide(n) {
    clearInterval(autoSlideInterval);
    slideIndex = slideIndex + n;
    showSlides(slideIndex);
    autoSlide();
}

function currentSlide(n) {
    clearInterval(autoSlideInterval);
    slideIndex = n;
    showSlides(slideIndex);
    autoSlide();
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("carousel-slide");
    var dots = document.getElementsByClassName("dot");
    
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }
    
    for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }
    
    slides[slideIndex - 1].classList.add("active");
    dots[slideIndex - 1].classList.add("active");
}
</script>

@endsection