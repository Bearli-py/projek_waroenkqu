{{-- 
==============================================
NAVBAR HEADER WAROENK QU - DENGAN INLINE STYLE
==============================================
File: resources/views/components/header.blade.php
Fungsi: Navbar horizontal dengan logo besar & menu rapi
Style: Inline style (langsung di HTML) biar pasti ke-load!
==============================================
--}}

{{-- 
HEADER = Container utama navbar
position: fixed = Navbar nempel di atas meski di-scroll (sticky navbar)
top: 0; left: 0 = Posisi di pojok kiri atas layar
width: 100% = Navbar full lebar layar (dari kiri ke kanan)
z-index: 1000 = Navbar di lapisan paling atas (gak ketutup elemen lain)
background-color: #fff = Background putih bersih
box-shadow = Bayangan halus di bawah navbar (kasih efek kedalaman)
margin: 0; padding: 0 = Hapus jarak default browser
--}}
<header style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 0;
    padding: 0;
">
    {{-- 
    NAV = Wrapper navbar
    width: 100% = Full lebar
    background-color: #fff = Background putih (konsisten dengan header)
    margin: 0; padding: 0 = Hapus jarak default
    --}}
    <nav style="
        width: 100%;
        background-color: #fff;
        margin: 0;
        padding: 0;
    ">
        {{-- 
        NAVBAR CONTAINER = Container yang atur layout logo & menu
        max-width: 1200px = Lebar maksimal 1200px (gak terlalu lebar di layar besar)
        margin: 0 auto = Center container secara horizontal (kiri-kanan auto)
        padding: 20px 30px = Jarak dalam (20px atas-bawah, 30px kiri-kanan)
        display: flex = PENTING! Bikin child element jajaran HORIZONTAL (logo & menu)
        align-items: center = PENTING! Bikin logo & menu LURUS SEJAJAR vertikal (center)
        justify-content: space-between = Logo di kiri, menu di kanan, space di tengah
        background-color: #fff = Background putih
        --}}
        <div style="
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #fff;
        ">
            
            {{-- 
            ==============================================
            LOGO (KIRI)
            ==============================================
            --}}
            
            {{-- 
            LOGO LINK = Link yang menuju halaman beranda
            route('beranda') = URL dinamis ke halaman beranda (dari web.php)
            display: flex = Logo image & text jajaran horizontal
            align-items: center = Logo & text rata tengah vertikal
            gap: 15px = Jarak 15px antara logo image & text
            text-decoration: none = Hapus garis bawah link
            flex-shrink: 0 = Logo gak boleh mengecil kalau space sempit
            --}}
            <a href="{{ route('beranda') }}" style="
                display: flex;
                align-items: center;
                gap: 15px;
                text-decoration: none;
                flex-shrink: 0;
            ">
                {{-- 
                LOGO IMAGE = Gambar logo warung
                asset('images/logo.png') = Ambil file logo.png dari folder public/images
                alt = Text alternatif kalau gambar gak muncul (penting untuk SEO)
                width: 70px !important = Lebar logo 70 pixel (!important = prioritas tertinggi)
                height: 70px !important = Tinggi logo 70 pixel (BESAR & jelas!)
                object-fit: contain = Gambar full tampil tanpa terpotong, proporsi tetap
                display: block = Gambar jadi block element (gak ada space aneh di bawah)
                --}}
                <img src="{{ asset('images/logo.png') }}" 
                     alt="Logo Waroenk Qu"
                     style="
                         width: 70px !important;
                         height: 70px !important;
                         object-fit: contain;
                         display: block;
                     ">
                
                {{-- 
                LOGO TEXT = Text "WAROENK QU" di samping logo
                font-family: 'Playfair Display' = Font elegan untuk brand/judul
                font-size: 26px = Ukuran text BESAR (proporsi pas dengan logo 70px)
                font-weight: 700 = Text tebal (bold)
                color: #333 = Warna abu gelap (gak hitam pekat, lebih soft)
                letter-spacing: 1px = Jarak antar huruf sedikit lebar (kesan premium)
                line-height: 1 = Gak ada jarak atas-bawah (rapi)
                display: block = Text jadi block element
                --}}
                <span style="
                    font-family: 'Playfair Display', serif;
                    font-size: 26px;
                    font-weight: 700;
                    color: #333;
                    letter-spacing: 1px;
                    line-height: 1;
                    display: block;
                ">WAROENK QU</span>
            </a>
            
            {{-- 
            ==============================================
            MENU NAVIGASI (KANAN)
            ==============================================
            --}}
            
            {{-- 
            MENU CONTAINER (UL) = List container menu
            display: flex = PENTING! Menu jajaran HORIZONTAL (bukan vertikal!)
            list-style: none = Hapus bullet point (•) default list
            gap: 40px = Jarak 40px antar menu item (Beranda, Galeri, dll)
            margin: 0; padding: 0 = Reset default spacing list
            align-items: center = Menu sejajar vertikal dengan logo (LURUS!)
            --}}
            <ul style="
                display: flex;
                list-style: none;
                gap: 40px;
                margin: 0;
                padding: 0;
                align-items: center;
            ">
                {{-- 
                ==============================================
                MENU BERANDA
                ==============================================
                --}}
                
                {{-- 
                MENU ITEM (LI) = List item
                margin: 0; padding: 0 = Hapus jarak default
                --}}
                <li style="margin: 0; padding: 0;">
                    {{-- 
                    MENU LINK (A) = Link menu Beranda
                    route('beranda') = URL ke halaman beranda
                    
                    DYNAMIC STYLING (pakai Laravel Blade):
                    - request()->routeIs('beranda') = Cek apakah halaman saat ini Beranda
                    - Kalau iya: font-weight: 600 (bold), color: #B33939 (merah), border-bottom (garis bawah)
                    - Kalau tidak: font-weight: 500 (normal), color: #666 (abu), no border
                    
                    font-family: 'Poppins' = Font modern & clean untuk menu
                    font-size: 16px = Ukuran text menu (pas, gak kecil gak besar)
                    text-decoration: none = Hapus garis bawah link
                    position: relative = Dibutuhkan untuk border-bottom absolute
                    padding: 8px 0 = Jarak atas-bawah 8px (bikin area klik lebih besar)
                    display: block = Link jadi block element
                    white-space: nowrap = Text gak boleh wrap ke baris baru (tetap 1 baris)
                    line-height: 1.5 = Jarak antar baris (proporsi pas)
                    --}}
                    <a href="{{ route('beranda') }}" 
                       style="
                           font-family: 'Poppins', sans-serif;
                           font-size: 16px;
                           font-weight: {{ request()->routeIs('beranda') ? '600' : '500' }};
                           color: {{ request()->routeIs('beranda') ? '#B33939' : '#666' }};
                           text-decoration: none;
                           position: relative;
                           padding: 8px 0;
                           display: block;
                           white-space: nowrap;
                           line-height: 1.5;
                           {{ request()->routeIs('beranda') ? 'border-bottom: 2px solid #B33939;' : '' }}
                       ">
                        Beranda
                    </a>
                </li>
                
                {{-- 
                ==============================================
                MENU GALERI
                ==============================================
                Logic sama dengan menu Beranda, tapi cek route 'galeri'
                --}}
                <li style="margin: 0; padding: 0;">
                    <a href="{{ route('galeri') }}" 
                       style="
                           font-family: 'Poppins', sans-serif;
                           font-size: 16px;
                           font-weight: {{ request()->routeIs('galeri') ? '600' : '500' }};
                           color: {{ request()->routeIs('galeri') ? '#B33939' : '#666' }};
                           text-decoration: none;
                           position: relative;
                           padding: 8px 0;
                           display: block;
                           white-space: nowrap;
                           line-height: 1.5;
                           {{ request()->routeIs('galeri') ? 'border-bottom: 2px solid #B33939;' : '' }}
                       ">
                        Galeri
                    </a>
                </li>
                
                {{-- 
                ==============================================
                MENU MENU
                ==============================================
                Logic sama, cek route 'menu'
                --}}
                <li style="margin: 0; padding: 0;">
                    <a href="{{ route('menu') }}" 
                       style="
                           font-family: 'Poppins', sans-serif;
                           font-size: 16px;
                           font-weight: {{ request()->routeIs('menu') ? '600' : '500' }};
                           color: {{ request()->routeIs('menu') ? '#B33939' : '#666' }};
                           text-decoration: none;
                           position: relative;
                           padding: 8px 0;
                           display: block;
                           white-space: nowrap;
                           line-height: 1.5;
                           {{ request()->routeIs('menu') ? 'border-bottom: 2px solid #B33939;' : '' }}
                       ">
                        Menu
                    </a>
                </li>
                
                {{-- 
                ==============================================
                MENU TESTIMONI
                ==============================================
                Logic sama, cek route 'testimoni'
                --}}
                <li style="margin: 0; padding: 0;">
                    <a href="{{ route('testimoni') }}" 
                       style="
                           font-family: 'Poppins', sans-serif;
                           font-size: 16px;
                           font-weight: {{ request()->routeIs('testimoni') ? '600' : '500' }};
                           color: {{ request()->routeIs('testimoni') ? '#B33939' : '#666' }};
                           text-decoration: none;
                           position: relative;
                           padding: 8px 0;
                           display: block;
                           white-space: nowrap;
                           line-height: 1.5;
                           {{ request()->routeIs('testimoni') ? 'border-bottom: 2px solid #B33939;' : '' }}
                       ">
                        Testimoni
                    </a>
                </li>
                
                {{-- 
                ==============================================
                MENU KONTAK
                ==============================================
                Logic sama, cek route 'kontak'
                --}}
                <li style="margin: 0; padding: 0;">
                    <a href="{{ route('kontak') }}" 
                       style="
                           font-family: 'Poppins', sans-serif;
                           font-size: 16px;
                           font-weight: {{ request()->routeIs('kontak') ? '600' : '500' }};
                           color: {{ request()->routeIs('kontak') ? '#B33939' : '#666' }};
                           text-decoration: none;
                           position: relative;
                           padding: 8px 0;
                           display: block;
                           white-space: nowrap;
                           line-height: 1.5;
                           {{ request()->routeIs('kontak') ? 'border-bottom: 2px solid #B33939;' : '' }}
                       ">
                        Kontak
                    </a>
                </li>
                
                {{-- 
                ==============================================
                MENU TENTANG
                ==============================================
                Logic sama, cek route 'tentang'
                --}}
                <li style="margin: 0; padding: 0;">
                    <a href="{{ route('tentang') }}" 
                       style="
                           font-family: 'Poppins', sans-serif;
                           font-size: 16px;
                           font-weight: {{ request()->routeIs('tentang') ? '600' : '500' }};
                           color: {{ request()->routeIs('tentang') ? '#B33939' : '#666' }};
                           text-decoration: none;
                           position: relative;
                           padding: 8px 0;
                           display: block;
                           white-space: nowrap;
                           line-height: 1.5;
                           {{ request()->routeIs('tentang') ? 'border-bottom: 2px solid #B33939;' : '' }}
                       ">
                        Tentang
                    </a>
                </li>
            </ul>
            
        </div>
    </nav>
</header>

{{-- 
==============================================
PENJELASAN TEKNIS & TROUBLESHOOTING
==============================================

1. KENAPA PAKAI INLINE STYLE?
   - CSS file sering gak ke-load karena browser cache
   - Inline style PASTI ke-load langsung (prioritas tertinggi)
   - Gak perlu clear cache berulang-ulang
   - Gak perlu restart server

2. KENAPA PAKAI !IMPORTANT DI LOGO?
   - width: 70px !important = Override semua CSS lain
   - Kalau ada CSS file yang set width: 40px, yang ke-apply tetap 70px
   - !important = prioritas paling tinggi di CSS

3. CARA KERJA DYNAMIC STYLING:
   - {{ request()->routeIs('beranda') }} = Fungsi Laravel cek route saat ini
   - Kalau return true: apply style active (merah, bold, garis bawah)
   - Kalau return false: apply style normal (abu, medium)
   - Ternary operator: kondisi ? nilai_true : nilai_false

4. CARA KERJA FLEXBOX (LAYOUT HORIZONTAL):
   - display: flex = Parent jadi flex container
   - align-items: center = Child sejajar vertikal (center)
   - justify-content: space-between = Logo kiri, menu kanan
   - gap: 40px = Jarak antar child

5. KALAU MAU GANTI UKURAN:
   - Logo: ubah width & height di <img> (baris 65-66)
   - Text logo: ubah font-size di <span> (baris 75)
   - Menu: ubah font-size di <a> (baris 118)
   - Jarak menu: ubah gap di <ul> (baris 107)

6. KALAU MAU GANTI WARNA:
   - Warna brand: cari #B33939 (merah), ganti semua
   - Warna menu normal: cari #666 (abu)
   - Background: cari #fff (putih)

7. KELEBIHAN INLINE STYLE:
   ✅ Gak perlu clear cache browser
   ✅ Gak perlu restart server Laravel
   ✅ Style PASTI apply langsung
   ✅ Logo PASTI 70x70px
   ✅ Menu PASTI lurus sejajar
   ✅ Gak ada conflict dengan CSS lain

8. KEKURANGAN INLINE STYLE:
   ❌ Kode jadi panjang (banyak pengulangan)
   ❌ Susah maintain kalau banyak halaman
   ❌ Gak bisa pakai hover effect (butuh CSS file)
   
   SOLUSI: Kalau website udah jadi & gak ada masalah, 
           bisa pindahkan ke CSS file lagi (style.css)

9. FILE YANG TERLIBAT:
   - header.blade.php (file ini) = Navbar HTML + inline style
   - logo.png (public/images/) = Gambar logo
   - web.php (routes/) = Define route beranda, galeri, dll
   - style.css (public/css/) = CSS lain (footer, hero, dll)

10. CARA TESTING:
    - Save file ini (Ctrl + S)
    - Refresh browser (F5 atau Ctrl + R)
    - Klik menu: Beranda, Galeri, Menu, dll
    - Cek menu active: warna merah, bold, garis bawah
    - Cek logo: ukuran 70x70px, jelas keliatan
    - Cek alignment: logo & menu lurus sejajar

SELAMAT! NAVBAR UDAH SEMPURNA! 🎉🎉🎉
--}}
