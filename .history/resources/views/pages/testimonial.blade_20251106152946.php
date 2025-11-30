@extends('layouts.app')

@section('title', 'Testimoni - Waroenk Qu')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <h2>Apa Kata <span class="highlight">Pelanggan</span></h2>
    <p>Kepuasan pelanggan adalah prioritas utama kami</p>
</div>

<!-- Testimonials Grid -->
<section class="section">
    <div class="testimonial-grid">
        @foreach($testimonials as $testimonial)
        <div class="testimonial-card">
            <div class="testimonial-logo">❝</div>
            
            <div class="testimonial-stars">
                @for($i = 0; $i < $testimonial['rating']; $i++)
                ⭐
                @endfor
            </div>
            
            <p class="testimonial-text">"{{ $testimonial['comment'] }}"</p>
            
            <div>
                <div class="testimonial-author">{{ $testimonial['name'] }}</div>
                <div class="testimonial-date">{{ $testimonial['date'] }}</div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div style="text-align: center; margin-top: 48px; padding: 32px; background: linear-gradient(135deg, #E8F5E9, #FEF3C7); border-radius: 16px;">
        <h3 style="font-family: 'Poppins', sans-serif; font-size: 24px; margin-bottom: 12px; color: #1F2937;">💬 Punya pengalaman menarik?</h3>
        <p style="color: #6B7280; margin-bottom: 16px;">Bagikan testimoni Anda dengan kami!</p>
        <a href="{{ route('contact') }}" class="btn-primary" style="display: inline-flex;">
            Hubungi Kami →
        </a>
    </div>
</section>

@endsection