{{-- 
==============================================
NAVBAR HEADER WAROENK QU - DENGAN INLINE STYLE
Style langsung di HTML biar pasti ke-load!
==============================================
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
    <nav style="
        width: 100%;
        background-color: #fff;
        margin: 0;
        padding: 0;
    ">
        <div style="
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #fff;
        ">
            
            {{-- ===== LOGO (KIRI) ===== --}}
            <a href="{{ route('beranda') }}" style="
                display: flex;
                align-items: center;
                gap: 15px;
                text-decoration: none;
                flex-shrink: 0;
            ">
                {{-- Logo image - BESAR 70px --}}
                <img src="{{ asset('images/logo.png') }}" 
                     alt="Logo Waroenk Qu"
                     style="
                         width: 70px !important;
                         height: 70px !important;
                         object-fit: contain;
                         display: block;
                     ">
                
                {{-- Logo text "WAROENK QU" --}}
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
            
            {{-- ===== MENU (KANAN) ===== --}}
            <ul style="
                display: flex;
                list-style: none;
                gap: 40px;
                margin: 0;
                padding: 0;
                align-items: center;
            ">
                {{-- Menu Beranda --}}
                <li style="margin: 0; padding: 0;">
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
                
                {{-- Menu Galeri --}}
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
                
                {{-- Menu Menu --}}
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
                
                {{-- Menu Testimoni --}}
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
                
                {{-- Menu Kontak --}}
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
                
                {{-- Menu Tentang --}}
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