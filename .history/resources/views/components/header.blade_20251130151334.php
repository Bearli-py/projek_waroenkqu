{{-- 
==============================================
COMPONENT: HEADER / NAVBAR
==============================================
Komponen ini berisi:
1. Logo Waroenk Qu (kiri)
2. Menu navigasi (tengah)
3. Secret admin button (pojok kanan atas, hidden)

Dipanggil dari layouts/app.blade.php pakai @include('components.header')
Muncul di SEMUA halaman (Beranda, Galeri, Menu, dll)
--}}

<header>
    {{-- 
    NAVBAR CONTAINER
    Ini wrapper utama navbar yang punya background putih
    Position: fixed = navbar selalu nempel di atas meski scroll
    Z-index: 1000 = navbar selalu di atas elemen lain
    --}}
    <nav class="navbar">
        {{-- 
        CONTAINER DALAM NAVBAR
        Max-width 1200px biar konten gak terlalu lebar
        Display flex = bikin logo dan menu jajaran horizontal
        --}}
        <div class="navbar-container">
            
            {{-- 
            =====================================
            BAGIAN KIRI: LOGO & NAMA WAROENK QU
            =====================================
            Link ke beranda pakai route('beranda')
            Kalau diklik logo, balik ke halaman depan
            --}}
            <a href="{{ route('beranda') }}" class="navbar-logo">
                {{-- 
                LOGO IMAGE
                Ambil gambar dari public/images/logo.png
                Width & height diatur di CSS
                Alt = teks alternatif kalau gambar gagal load
                --}}
                <img src="{{ asset('images/logo.png') }}" alt="Logo Waroenk Qu">
                
            {{-- 
            =====================================
            BAGIAN TENGAH: MENU NAVIGASI
            =====================================
            List menu utama (Beranda, Galeri, Menu, dll)
            Display flex di CSS = jajaran horizontal
            --}}
            <ul class="navbar-menu">
                {{-- 
                SETIAP MENU ITEM
                class="active" = menu yang sedang dibuka (bold, warna beda)
                route('nama') = URL dinamis dari Laravel
                Kalau route diubah di web.php, link otomatis update
                --}}
                
                {{-- Menu Beranda --}}
                <li>
                    <a href="{{ route('beranda') }}" 
                       class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
                        Beranda
                    </a>
                    {{-- 
                    request()->routeIs('beranda') = cek apakah halaman saat ini Beranda
                    Kalau iya, tambah class 'active' (bold & warna merah)
                    Kalau tidak, class kosong (warna abu-abu biasa)
                    --}}
                </li>
                
                {{-- Menu Galeri --}}
                <li>
                    <a href="{{ route('galeri') }}" 
                       class="{{ request()->routeIs('galeri') ? 'active' : '' }}">
                        Galeri
                    </a>
                </li>
                
                {{-- Menu Menu --}}
                <li>
                    <a href="{{ route('menu') }}" 
                       class="{{ request()->routeIs('menu') ? 'active' : '' }}">
                        Menu
                    </a>
                </li>
                
                {{-- Menu Testimoni --}}
                <li>
                    <a href="{{ route('testimoni') }}" 
                       class="{{ request()->routeIs('testimoni') ? 'active' : '' }}">
                        Testimoni
                    </a>
                </li>
                
                {{-- Menu Kontak --}}
                <li>
                    <a href="{{ route('kontak') }}" 
                       class="{{ request()->routeIs('kontak') ? 'active' : '' }}">
                        Kontak
                    </a>
                </li>
                
                {{-- Menu Tentang --}}
                <li>
                    <a href="{{ route('tentang') }}" 
                       class="{{ request()->routeIs('tentang') ? 'active' : '' }}">
                        Tentang
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

{{-- 
==============================================
PENJELASAN TAMBAHAN
==============================================

1. KENAPA PAKAI @INCLUDE?
   - Biar navbar gak perlu copy-paste di setiap halaman
   - Tinggal edit 1 file, semua halaman berubah
   - Lebih rapi dan gampang maintenance

2. KENAPA PAKAI ROUTE() BUKAN URL LANGSUNG?
   - route('beranda') lebih fleksibel dari '/beranda'
   - Kalau URL berubah di web.php, link otomatis update
   - Lebih aman dan Laravel best practice

3. CLASS "ACTIVE" BUAT APA?
   - Biar menu yang sedang dibuka punya warna beda
   - User jadi tau lagi di halaman mana
   - CSS: .active { color: #B33939; font-weight: 600; }

4. SECRET ADMIN BUTTON:
   - Position: absolute (pojok kanan atas navbar)
   - Default: opacity 0 (gak keliatan)
   - Hover: opacity 1 (muncul smooth)
   - Transition: 0.4s cubic-bezier (bounce effect keren)
   - Z-index: 1000 (di atas semua elemen)

5. KALAU DIHAPUS:
   - Navbar hilang dari semua halaman
   - User gak bisa navigasi kemana-mana
   - Website jadi susah dipake

6. STRUKTUR FILE:
   app.blade.php (template utama)
       ↓
   @include('components.header') ← File ini!
       ↓
   Muncul di semua halaman
--}}