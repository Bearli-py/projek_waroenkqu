@extends('layouts.app')

@section('title', 'Tentang Kami - Waroenk Qu')
@section('meta_description', 'Mengenal lebih dekat Waroenk Qu, UMKM kuliner dengan cita rasa autentik dan pelayanan terbaik.')

@section('content')

<!-- Page Header -->
<div class="page-header-light">
    <h2>🏪 Tentang Waroenk Qu</h2>
</div>

<!-- About Content -->
<div class="about-container">
    <!-- Hero About -->
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>{{ $about['name'] }}</h1>
            <p class="about-tagline">{{ $about['tagline'] }}</p>
            <p class="about-description">{{ $about['description'] }}</p>
        </div>
        <div class="about-hero-image">
            <div style="font-size: 200px; text-align: center;">🍜</div>
        </div>
    </section>
    
    <!-- Our Story -->
    <section class="about-section">
        <h2 class="section-title">📖 Cerita Kami</h2>
        <div class="story-box">
            <p>{{ $about['story'] }}</p>
        </div>
    </section>
    
    <!-- Vision & Mission -->
    <section class="about-section">
        <div class="vision-mission-grid">
            <!-- Vision -->
            <div class="vm-card">
                <div class="vm-icon">🎯</div>
                <h3>Visi</h3>
                <p>{{ $about['vision'] }}</p>
            </div>
            
            <!-- Mission -->
            <div class="vm-card">
                <div class="vm-icon">🚀</div>
                <h3>Misi</h3>
                <ul>
                    @foreach($about['mission'] as $mission)
                    <li>{{ $mission }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    
    <!-- Our Values -->
    <section class="about-section">
        <h2 class="section-title">💎 Nilai-Nilai Kami</h2>
        <div class="values-grid">
            @foreach($about['values'] as $key => $value)
            <div class="value-card">
                <h4>{{ $key }}</h4>
                <p>{{ $value }}</p>
            </div>
            @endforeach
        </div>
    </section>
    
    <!-- Achievements Timeline -->
    <section class="about-section">
        <h2 class="section-title">🏆 Perjalanan Kami</h2>
        <div class="timeline">
            @foreach($about['achievements'] as $year => $achievement)
            <div class="timeline-item">
                <div class="timeline-year">{{ $year }}</div>
                <div class="timeline-content">
                    <p>{{ $achievement }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
    <!-- Call to Action -->
    <section class="about-cta">
        <h2>Yuk, Kunjungi Kami!</h2>
        <p>Rasakan langsung kelezatan menu kami dan pelayanan terbaik dari tim Waroenk Qu</p>
        <div class="cta-buttons">
            <a href="{{ route('menu') }}" class="btn-primary">Lihat Menu</a>
            <a href="{{ route('contact') }}" class="btn-contact">Kontak Kami</a>
        </div>
    </section>
</div>

@endsection

@push('styles')
<style>
.about-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: var(--space-xl);
}

.about-hero {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: var(--space-2xl);
    align-items: center;
    padding: var(--space-3xl) 0;
}

.about-hero h1 {
    font-family: var(--font-heading);
    font-size: 56px;
    color: var(--text-dark);
    margin-bottom: var(--space-md);
    font-weight: 800;
    letter-spacing: -1.5px;
}

.about-tagline {
    font-size: 24px;
    color: var(--primary-green);
    font-weight: 600;
    margin-bottom: var(--space-lg);
}

.about-description {
    font-size: 18px;
    line-height: 1.8;
    color: var(--text-gray);
}

.about-hero-image {
    background: linear-gradient(135deg, var(--soft-green), var(--mint-green));
    border-radius: var(--radius-2xl);
    padding: var(--space-2xl);
    box-shadow: var(--shadow-lg);
}

.about-section {
    padding: var(--space-3xl) 0;
}

.story-box {
    background: var(--soft-green);
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    border-left: 6px solid var(--primary-green);
}

.story-box p {
    font-size: 18px;
    line-height: 1.9;
    color: var(--text-dark);
    margin: 0;
}

.vision-mission-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-xl);
}

.vm-card {
    background: var(--white);
    padding: var(--space-xl);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.vm-icon {
    font-size: 64px;
    margin-bottom: var(--space-md);
}

.vm-card h3 {
    font-family: var(--font-heading);
    font-size: 32px;
    color: var(--text-dark);
    margin-bottom: var(--space-md);
    font-weight: 700;
}

.vm-card p {
    font-size: 17px;
    line-height: 1.8;
    color: var(--text-gray);
}

.vm-card ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.vm-card ul li {
    font-size: 16px;
    line-height: 1.8;
    color: var(--text-gray);
    padding: var(--space-sm) 0;
    padding-left: var(--space-lg);
    position: relative;
}

.vm-card ul li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--primary-green);
    font-weight: 700;
    font-size: 18px;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--space-lg);
}

.value-card {
    background: var(--white);
    padding: var(--space-lg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: var(--transition-base);
}

.value-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.value-card h4 {
    font-family: var(--font-heading);
    font-size: 22px;
    color: var(--primary-green);
    margin-bottom: var(--space-sm);
    font-weight: 700;
}

.value-card p {
    font-size: 15px;
    line-height: 1.7;
    color: var(--text-gray);
    margin: 0;
}

.timeline {
    position: relative;
    padding: var(--space-md) 0;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 4px;
    background: var(--mint-green);
    transform: translateX(-50%);
}

.timeline-item {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-xl);
    margin-bottom: var(--space-xl);
    position: relative;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 20px;
    width: 20px;
    height: 20px;
    background: var(--primary-green);
    border-radius: 50%;
    transform: translateX(-50%);
    box-shadow: 0 0 0 4px var(--white), 0 0 0 6px var(--primary-green);
    z-index: 2;
}

.timeline-item:nth-child(even) {
    direction: rtl;
}

.timeline-year {
    text-align: right;
    font-family: var(--font-heading);
    font-size: 32px;
    font-weight: 800;
    color: var(--primary-green);
    padding-top: var(--space-sm);
}

.timeline-item:nth-child(even) .timeline-year {
    text-align: left;
}

.timeline-content {
    background: var(--white);
    padding: var(--space-lg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.timeline-item:nth-child(even) .timeline-content {
    direction: ltr;
}

.timeline-content p {
    font-size: 16px;
    line-height: 1.7;
    color: var(--text-gray);
    margin: 0;
}

.about-cta {
    background: linear-gradient(135deg, var(--soft-green), var(--mint-green));
    padding: var(--space-3xl);
    border-radius: var(--radius-2xl);
    text-align: center;
    margin-top: var(--space-3xl);
}

.about-cta h2 {
    font-family: var(--font-heading);
    font-size: 40px;
    color: var(--text-dark);
    margin-bottom: var(--space-md);
    font-weight: 800;
}

.about-cta p {
    font-size: 18px;
    color: var(--text-gray);
    margin-bottom: var(--space-xl);
}

.cta-buttons {
    display: flex;
    gap: var(--space-md);
    justify-content: center;
}

@media (max-width: 768px) {
    .about-hero {
        grid-template-columns: 1fr;
    }
    
    .about-hero h1 {
        font-size: 40px;
    }
    
    .vision-mission-grid {
        grid-template-columns: 1fr;
    }
    
    .timeline::before {
        left: 20px;
    }
    
    .timeline-item {
        grid-template-columns: 1fr;
        padding-left: 60px;
    }
    
    .timeline-item::before {
        left: 20px;
    }
    
    .timeline-year {
        text-align: left;
    }
    
    .timeline-item:nth-child(even) {
        direction: ltr;
    }
    
    .timeline-item:nth-child(even) .timeline-year {
        text-align: left;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
}
</style>
@endpush
