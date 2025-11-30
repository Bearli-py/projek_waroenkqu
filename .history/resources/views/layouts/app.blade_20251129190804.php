<!DOCTYPE html>
<html lang="id">
<head>
    <!-- 
        META TAGS
        Fungsi: Mengatur encoding, viewport, dan SEO
        Jika dihapus: Website tidak responsive dan SEO buruk
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Waroenk Qu - Cita rasa autentik dengan harga terjangkau')">
    
    <!-- 
        TITLE DINAMIS
        Fungsi: Menampilkan title yang berbeda per halaman
        Jika dihapus: Semua halaman punya title yang sama
    -->
    <title>@yield('title', 'Waroenk Qu - Masakan Tradisional')</title>
    
    <!-- 
        GOOGLE FONTS - POPPINS
        Fungsi: Load font Poppins dari Google Fonts
        Jika dihapus: Website akan pakai default system font
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- 
        CSS FILE
        Fungsi: Load stylesheet utama
        Jika dihapus: Website tidak ada styling sama sekali
    -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- 
        FAVICON
        Fungsi: Icon kecil di browser tab
        Jika dihapus: Tab browser akan tampil tanpa icon
    -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}">
</head>
<body>
    <!-- 
        HEADER COMPONENT
        Fungsi: Menampilkan navigation bar di semua halaman
        Jika dihapus: Website tidak punya menu navigasi
    -->
    @include('components.header')
    
    <!-- 
        MAIN CONTENT AREA
        Fungsi: Area konten utama yang akan diisi oleh halaman child
        Jika dihapus: Konten halaman tidak akan tampil
    -->
    <main id="main-content">
        @yield('content')
    </main>
    
    <!-- 
        FOOTER COMPONENT
        Fungsi: Menampilkan footer dengan info kontak dan sosmed
        Jika dihapus: Website tidak punya footer
    -->
    @include('components.footer')
    
    <!-- 
        MODAL COMPONENT (untuk detail menu)
        Fungsi: Pop-up overlay untuk menampilkan detail menu
        Jika dihapus: Button "Detail" di menu tidak berfungsi
    -->
    @include('components.menu-modal')
    
    <!-- 
        JAVASCRIPT FILE
        Fungsi: Load script untuk interactivity (modal, filter, dll)
        Jika dihapus: Fitur interaktif seperti modal dan filter tidak jalan
    -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>