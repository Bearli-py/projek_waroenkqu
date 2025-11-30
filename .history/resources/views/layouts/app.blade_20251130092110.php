<!DOCTYPE html>
<html lang="id">
<head>
    {{-- 
    BAGIAN META TAG
    Ini kayak KTP website kamu. Berisi info penting biar browser tau harus ngapain.
    - charset UTF-8 = biar bisa tampilkan huruf Indonesia dengan benar
    - viewport = biar website tampil bagus di HP, tablet, dan komputer
    - csrf-token = sistem keamanan Laravel biar gak ada yang iseng hack
    Kalau dihapus: Website gak bisa responsif + gampang kena hack
    --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Waroenk Qu - Sajian Nusantara yang khas, hadir untuk Anda di tengah kehangatan suasana yang tak terlupakan">
    
    {{-- 
    JUDUL HALAMAN (DINAMIS)
    Ini judul yang muncul di tab browser. Setiap halaman punya judul beda.
    Contoh: "Beranda - Waroenk Qu" atau "Menu - Waroenk Qu"
    @yield('title') = nanti diisi dari halaman masing-masing
    Kalau dihapus: Semua halaman judulnya sama (kurang profesional)
    --}}
    <title>@yield('title', 'Waroenk Qu - Cita Rasa Autentik')</title>
    
    {{-- 
    IMPORT FONT DARI GOOGLE
    Kita pakai 2 jenis font:
    - Playfair Display = buat judul (kesan elegan)
    - Poppins = buat isi teks (mudah dibaca)
    Kalau dihapus: Font balik ke default browser (kurang menarik)
    --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- 
    FILE CSS (STYLING)
    Ini yang bikin website kamu cantik. Tanpa ini website cuma tulisan hitam putih doang.
    asset('css/style.css') = ambil file dari folder public/css
    Kalau dihapus: Website jadi berantakan tanpa warna dan layout
    --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    {{-- 
    HEADER (BAGIAN ATAS)
    Ini bagian paling atas website yang ada logo dan menu navigasi.
    @include = panggil file component/header.blade.php
    Kalau dihapus: Pengunjung gak bisa pindah-pindah halaman
    --}}
    @include('components.header')
    
    {{-- 
    KONTEN UTAMA
    Ini area tengah yang beda-beda tiap halaman.
    @yield('content') = nanti diisi dari halaman home, menu, galeri, dll
    Kalau dihapus: Halaman kosong melompong gak ada isinya
    --}}
    <main>
        @yield('content')
    </main>
    
    {{-- 
    FOOTER (BAGIAN BAWAH)
    Ini bagian paling bawah website yang ada info kontak dan sosial media.
    @include = panggil file component/footer.blade.php
    Kalau dihapus: Gak ada info kontak, sosmed, dan copyright
    --}}
    @include('components.footer')
    
    {{-- 
    FILE JAVASCRIPT (INTERAKSI)
    Ini yang bikin website interaktif (klik, hover, popup, animasi).
    asset('js/main.js') = ambil file dari folder public/js
    Kalau dihapus: Semua tombol dan efek hover gak jalan
    --}}
    <script src="{{ asset('js/main.js') }}"></script>

        {{-- JavaScript untuk filter galeri --}}
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>

</body>
</html>