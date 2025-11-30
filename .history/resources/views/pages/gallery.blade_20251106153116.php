@extends('layouts.app')

@section('title', 'Galeri - Waroenk Qu')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <h2>Galeri <span class="highlight">Kami</span></h2>
    <p>Lihat beberapa hidangan lezat yang kami tawarkan</p>
</div>

<!-- Gallery Grid -->
<section class="section">
    <div class="gallery-grid">
        @foreach($galleries as $gallery)
        <div class="gallery-item">
            @if(file_exists(public_path('images/' . $gallery['image'])))
                <img src="{{ asset('images/' . $gallery['image']) }}" alt="{{ $gallery['title'] }}">
            @else
                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #E8F5E9, #C8E6C9); display: flex; align-items: center; justify-content: center; flex-direction: column; padding: 20px; text-align: center;">
                    <div style="font-size: 60px; margin-bottom: 16px;">📷</div>
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 18px; color: #2D7A3E; margin: 0;">{{ $gallery['title'] }}</h3>
                    <p style="font-size: 14px; color: #6B7280; margin-top: 8px;">Foto belum tersedia</p>
                </div>
            @endif
        </div>
        @endforeach
    </div>
    
    <div style="text-align: center; margin-top: 48px; padding: 32px; background: linear-gradient(135deg, #E8F5E9, #FEF3C7); border-radius: 16px;">
        <h3 style="font-family: 'Poppins', sans-serif; font-size: 24px; margin-bottom: 12px;">📸 Cara Upload Foto Menu</h3>
        <p style="color: #6B7280; margin-bottom: 8px;">1. Simpan foto menu di folder: <code style="background: white; padding: 4px 8px; border-radius: 4px; font-weight: bold;">C:\laragon\www\waroenk-qu\public\images\menu\</code></p>
        <p style="color: #6B7280; margin-bottom: 8px;">2. Nama file: <code style="background: white; padding: 4px 8px; border-radius: 4px;">rawon.jpg</code>, <code style="background: white; padding: 4px 8px; border-radius: 4px;">soto-ayam.jpg</code>, dll</p>
        <p style="color: #6B7280;">3. Refresh halaman (Ctrl + Shift + R)</p>
    </div>
</section>

@endsection