<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Waroenk Qu - UMKM Kuliner dengan Cita Rasa Nusantara')">
    <meta name="keywords" content="waroenk qu, kuliner jember, makanan jawa timur, rawon, soto">
    <title>@yield('title', 'Waroenk Qu - Beranda')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @stack('styles')
</head>
<body>
    <div class="container">
        <!-- Header -->
        @include('partials.header')
        
        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
        
        <!-- Footer -->
        @include('partials.footer')
    </div>
    
    <!-- JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
