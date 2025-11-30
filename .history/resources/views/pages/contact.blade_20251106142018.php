@extends('layouts.app')

@section('title', 'Kontak - Waroenk Qu')
@section('meta_description', 'Hubungi Waroenk Qu untuk informasi lebih lanjut')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <h2>Hubungi <span class="highlight">Kami</span></h2>
    <p>Kunjungi warung kami atau hubungi untuk informasi lebih lanjut</p>
</div>

<!-- Contact Info -->
<section class="section">
    <div class="contact-grid">
        <!-- Alamat -->
        <div class="contact-card">
            <div class="contact-card-icon">📍</div>
            <h3>Alamat</h3>
            <p>{{ $contact['address'] }}</p>
            <a href="{{ $contact['maps_link'] }}" target="_blank" style="display: inline-block; margin-top: 12px; color: var(--primary-green); font-weight: 700; text-decoration: underline;">
                📍 Buka di Google Maps →
            </a>
        </div>
        
        <!-- Telepon & WhatsApp -->
        <div class="contact-card">
            <div class="contact-card-icon">📞</div>
            <h3>Telepon & WhatsApp</h3>
            <p>
                <a href="{{ $contact['phone_link'] }}" style="display: block; margin-bottom: 8px;">
                    📞 {{ $contact['phone_display'] }}
                </a>
                <a href="{{ $contact['whatsapp_link'] }}" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; margin-top: 8px; padding: 10px 20px; background: #25D366; color: white; border-radius: 8px; text-decoration: none; font-weight: 700;">
                    💬 Chat via WhatsApp
                </a>
            </p>
        </div>
        
        <!-- Email -->
        <div class="contact-card">
            <div class="contact-card-icon">📧</div>
            <h3>Email</h3>
            <p>
                <a href="{{ $contact['email_link'] }}">{{ $contact['email'] }}</a>
            </p>
        </div>
        
        <!-- Jam Buka -->
        <div class="contact-card">
            <div class="contact-card-icon">⏰</div>
            <h3>Jam Buka</h3>
            @foreach($contact['open_hours'] as $day => $hours)
            <p><strong>{{ $day }}</strong>: {{ $hours }}</p>
            @endforeach
        </div>
    </div>
    
    <!-- Google Maps -->
    <div class="contact-map" style="margin-top: 48px;">
        <iframe 
            src="{{ $contact['maps_embed'] }}" 
            width="100%" 
            height="450" 
            style="border:0; border-radius: 16px;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    
    <div style="text-align: center; margin-top: 24px;">
        <a href="{{ $contact['maps_link'] }}" 
           target="_blank" 
           class="btn-primary">
            📍 Buka di Google Maps
        </a>
    </div>
</section>

@endsection