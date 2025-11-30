/*
==============================================
WAROENK QU - MAIN.JS
Website Warung Makan Tradisional
==============================================
File ini berisi semua interaksi JavaScript untuk website Waroenk Qu.
Fungsi utama: Mobile menu, Filter galeri, Filter menu, Popup detail menu
Kalau file ini dihapus: Semua interaksi dinamis gak jalan (filter, popup, dll)
*/


/* 
==============================================
1. DOCUMENT READY
==============================================
Fungsi: Pastikan DOM (HTML) sudah sepenuhnya dimuat sebelum JavaScript jalan
Kenapa penting: Kalau JavaScript jalan sebelum HTML selesai load, bakal error
Kalau dihapus: JavaScript mungkin error karena elemen belum ada
*/
document.addEventListener('DOMContentLoaded', function() {
    // Semua kode JavaScript kita taruh di dalam sini
    // Jadi kode baru jalan setelah HTML selesai dimuat
    
    console.log('Website Waroenk Qu loaded successfully!');
    // console.log = print ke browser console (buat debugging)
    
    
    /* 
    ==============================================
    2. MOBILE MENU TOGGLE (HAMBURGER MENU)
    ==============================================
    Fungsi: Buka/tutup menu mobile saat icon hamburger diklik
    Cara kerja:
    1. Ambil elemen tombol hamburger dan navbar
    2. Saat tombol diklik, toggle class 'active' di navbar
    3. Class 'active' bikin navbar slide masuk dari kanan (pakai CSS transition)
    Kalau dihapus: Menu mobile gak bisa dibuka
    */
    
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    // querySelector = ambil 1 elemen pertama yang sesuai selector
    // .mobile-menu-toggle = tombol hamburger di header
    
    const navbar = document.querySelector('.navbar');
    // .navbar = menu navigasi
    
    // Cek apakah elemen ada (kalau gak ada, skip)
    if (mobileMenuToggle && navbar) {
        // addEventListener = pasang event listener (mendengarkan event)
        // 'click' = event yang didengarkan (saat diklik)
        mobileMenuToggle.addEventListener('click', function() {
            // toggle = kalau ada class 'active', hapus; kalau gak ada, tambah
            navbar.classList.toggle('active');
            // Saat navbar punya class 'active', CSS bikin dia slide masuk dari kanan
            
            // BONUS: Animasi icon hamburger jadi X
            this.classList.toggle('active');
            // 'this' = elemen yang diklik (mobileMenuToggle)
        });
        
        // Tutup menu saat link diklik (biar gak tetap terbuka)
        const navLinks = document.querySelectorAll('.nav-link');
        // querySelectorAll = ambil SEMUA elemen yang sesuai selector (bukan cuma 1)
        
        navLinks.forEach(function(link) {
            // forEach = loop untuk setiap elemen dalam array
            link.addEventListener('click', function() {
                navbar.classList.remove('active');
                // remove = hapus class 'active' (tutup menu)
                mobileMenuToggle.classList.remove('active');
            });
        });
        
        // Tutup menu saat klik di luar navbar (overlay)
        document.addEventListener('click', function(event) {
            // event.target = elemen yang diklik
            // closest() = cari parent terdekat yang sesuai selector
            const isClickInsideNav = navbar.contains(event.target);
            const isClickOnToggle = mobileMenuToggle.contains(event.target);
            
            // Kalau klik di luar navbar DAN bukan di tombol hamburger
            if (!isClickInsideNav && !isClickOnToggle && navbar.classList.contains('active')) {
                navbar.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
            }
        });
    }
    
    
    /* 
    ==============================================
    3. FILTER GALERI (KATEGORI GALERI)
    ==============================================
    Fungsi: Filter foto galeri berdasarkan kategori (Semua, Makanan, Minuman, Suasana)
    Cara kerja:
    1. Ambil semua tombol filter dan foto galeri
    2. Saat tombol diklik:
       - Tandai tombol sebagai active
       - Filter foto sesuai kategori (hide yang gak sesuai, show yang sesuai)
    Kalau dihapus: Filter galeri gak berfungsi (semua foto tetap muncul)
    */
    
    const galleryFilterBtns = document.querySelectorAll('.gallery-section .filter-btn');
    // Ambil semua tombol filter di section galeri
    
    const galleryItems = document.querySelectorAll('.gallery-item');
    // Ambil semua foto galeri
    
    // Cek apakah elemen ada
    if (galleryFilterBtns.length > 0 && galleryItems.length > 0) {
        galleryFilterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Ambil value kategori dari attribute data-filter
                const filterValue = this.getAttribute('data-filter');
                // getAttribute = ambil nilai dari attribute HTML
                // Contoh: <button data-filter="makanan"> = filterValue jadi "makanan"
                
                // STEP 1: Update tombol active
                galleryFilterBtns.forEach(function(b) {
                    b.classList.remove('active');
                    // Hapus class 'active' dari semua tombol
                });
                this.classList.add('active');
                // Tambah class 'active' ke tombol yang diklik
                
                // STEP 2: Filter foto galeri
                galleryItems.forEach(function(item) {
                    const itemCategory = item.getAttribute('data-category');
                    // Ambil kategori foto dari attribute data-category
                    // Contoh: <div data-category="makanan">
                    
                    // Logika filter:
                    if (filterValue === 'all' || filterValue === itemCategory) {
                        // Kalau filter "all" ATAU kategori foto sama dengan filter
                        item.style.display = 'block';
                        // Tampilkan foto (display: block)
                    } else {
                        // Kalau kategori foto beda dengan filter
                        item.style.display = 'none';
                        // Sembunyikan foto (display: none)
                    }
                });
            });
        });
    }
    
    
    /* 
    ==============================================
    4. FILTER MENU (KATEGORI MENU)
    ==============================================
    Fungsi: Filter menu berdasarkan kategori (Semua, Makanan, Minuman)
    Cara kerja: SAMA PERSIS dengan filter galeri (copy logic-nya)
    Kalau dihapus: Filter menu gak berfungsi
    */
    
    const menuFilterBtns = document.querySelectorAll('.menu-section .filter-btn');
    const menuCards = document.querySelectorAll('.menu-card');
    
    if (menuFilterBtns.length > 0 && menuCards.length > 0) {
        menuFilterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const filterValue = this.getAttribute('data-filter');
                
                // Update tombol active
                menuFilterBtns.forEach(function(b) {
                    b.classList.remove('active');
                });
                this.classList.add('active');
                
                // Filter menu cards
                menuCards.forEach(function(card) {
                    const cardCategory = card.getAttribute('data-category');
                    
                    if (filterValue === 'all' || filterValue === cardCategory) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
    
    
    /* 
    ==============================================
    5. MENU MODAL (POPUP DETAIL MENU)
    ==============================================
    Fungsi: Buka popup detail menu saat tombol "Detail" diklik
    Cara kerja:
    1. Ambil elemen modal, tombol detail, tombol close
    2. Siapkan data menu lengkap (nama, harga, deskripsi, info tambahan)
    3. Saat tombol "Detail" diklik:
       - Ambil ID menu dari attribute data-menu-id
       - Isi konten modal dengan data menu yang sesuai
       - Tampilkan modal (display: flex)
    4. Saat tombol close/overlay diklik:
       - Sembunyikan modal (display: none)
    Kalau dihapus: Popup detail menu gak berfungsi
    */
    
    const menuModal = document.getElementById('menuModal');
    // getElementById = ambil elemen berdasarkan ID
    
    const menuModalClose = document.querySelector('.menu-modal-close');
    const menuModalOverlay = document.querySelector('.menu-modal-overlay');
    const menuDetailBtns = document.querySelectorAll('.menu-card-btn');
    
    // DATA MENU LENGKAP
    // Object JavaScript berisi semua info detail menu
    // Key = ID menu (dari data-menu-id)
    // Value = object berisi nama, harga, foto, deskripsi, info tambahan
    const menuData = {
        'lalapan-telur': {
            name: 'Lalapan Telur',
            price: 'Rp 10.000',
            image: 'lalapan telur.png',
            description: 'Paket hemat legend yang bisa nyelametin tanggal tua tanpa bikin sedih',
            info: [
                'Telur goreng garing pinggirannya',
                'Bisa request level sambal',
                'Lalapan segar, cucok buat yang simpel',
                'Porsi pas buat hemat tapi nikmat'
            ]
        },
        'soto-ayam': {
            name: 'Soto Ayam',
            price: 'Rp 12.000',
            image: 'soto ayam.png',
            description: 'Sat set banget, kuah kuningnya nge-charge semangat, bikin kamu auto seger lagi',
            info: [
                'Kuah bening, segar, ringan',
                'Ayam suwir banyak',
                'Disajikan hangat',
                'Enak tambah sambal biar makin nampol'
            ]
        },
        'mie-goreng': {
            name: 'Mie Goreng Jawa',
            price: 'Rp 12.000',
            image: 'mie goreng.png',
            description: 'Mie legendaris dengan bumbu yang kaya rasa, kenikmatannya tidak tertandingi!',
            info: [
                'Dibuat fresh tiap pesanan',
                'Rasa manis-gurih ala rumahan',
                'Level pedas bisa disesuaikan',
                'Porsi lumayan bikin kenyang'
            ]
        },
        'rawon': {
            name: 'Rawon',
            price: 'Rp 18.000',
            image: 'rawon.png',
            description: 'Daging empuk berkuah hitam pekat yang sukses bikin lidah kamu ketagihan berat',
            info: [
                'Tersedia setiap hari',
                'Kuah hitam khas, rempah strong',
                'Daging empuk, potongan nggak pelit',
                'Cocok buat makan siang biar waras lagi'
            ]
        },
        'nasi-goreng': {
            name: 'Nasi Goreng Jawa',
            price: 'Rp 12.000',
            image: 'nasi goreng.png',
            description: 'Rajanya segala nasi, gurihnya pas, cocok buat mendongkrak mood secara instan',
            info: [
                'Bisa pilih topping (telur/ayam)',
                'Wangi bawangnya nendang',
                'Pedas bisa request',
                'Cocok buat menu anti ribet'
            ]
        },
        'lalapan-ayam': {
            name: 'Lalapan Ayam',
            price: 'Rp 15.000',
            image: 'lalapan ayam.png',
            description: 'Ayam juara dengan sambal pedas nampol, sekali coba auto teriak nagih!',
            info: [
                'Ayam digoreng crispy luar-dalam',
                'Sambal bisa pilih pedas atau sedang',
                'Lalapan fresh tiap hari',
                'Bonus kriuk tepung'
            ]
        },
        'soto-daging': {
            name: 'Soto Daging',
            price: 'Rp 15.000',
            image: 'soto daging.png',
            description: 'Kuah hangat dengan daging lembut; solusi cepat buat kamu yang butuh kehangatan selain dari chat gebetan',
            info: [
                'Kuah bening gurih dengan potongan daging empuk',
                'Rempah terasa, tapi tetap ringan',
                'Disajikan hangat',
                'Enak ditambah sambal dan jeruk biar lebih segar'
            ]
        },
        'lalapan-empal': {
            name: 'Lalapan Empal',
            price: 'Rp 16.000',
            image: 'lalapan empal.png',
            description: 'Empal lembut dengan rasa manis-gurih, cocok buat yang suka daging tapi tetap pengen terlihat "healthy"',
            info: [
                'Empal goreng berbumbu, teksturnya empuk',
                'Sambal tersedia dalam beberapa tingkat pedas',
                'Lalapan segar sebagai pelengkap',
                'Cocok untuk menu berat dengan rasa yang kaya'
            ]
        },
        'lalapan-tahu-tempe': {
            name: 'Lalapan Tahu Tempe',
            price: 'Rp 8.000',
            image: 'lalapan tempe n tahu.png',
            description: 'Lalapan hemat dengan tahu tempe goreng yang crispy, sahabat setia anak kos sedunia',
            info: [
                'Tempe dan tahu digoreng hingga renyah',
                'Sambal bisa disesuaikan tingkat pedasnya',
                'Lalapan segar setiap hari',
                'Pilihan hemat yang tetap mengenyangkan'
            ]
        },
        'kwetiau': {
            name: 'Kwetiau',
            price: 'Rp 12.000',
            image: 'kwetiau.png',
            description: 'Kwetiau lembut berbumbu gurih, pilihan pas buat yang pengen beda dikit tapi tetap aman',
            info: [
                'Kwetiau lembut dengan bumbu gurih',
                'Dibuat fresh setiap pesanan',
                'Cocok dinikmati pedas maupun tidak',
                'Porsi pas untuk makan siang atau malam'
            ]
        },
        'kopi': {
            name: 'Kopi',
            price: 'Rp 5.000',
            image: 'kopi.png',
            description: 'Kopi klasik buat mulai hari atau lembur; pahitnya pas, ga se-pahit pesan singkat yang cuma "ok"',
            info: [
                'Kopi murni tanpa campuran',
                'Aroma kuat dan rasa lebih bold',
                'Disajikan panas',
                'Cocok untuk pecinta kopi yang suka minuman sederhana dan pekat'
            ]
        },
        'es-jeruk': {
            name: 'Es Jeruk',
            price: 'Rp 5.000',
            image: 'es jeruk.png',
            description: 'Perasan jeruk asli yang dinginnya nyess, solusi cepat buat menghilangkan dahaga',
            info: [
                'Jeruk peras asli',
                'Segar nggak bikin eneg',
                'Disajikan dingin',
                'Manis bisa diatur'
            ]
        },
        'es-teh': {
            name: 'Es Teh',
            price: 'Rp 3.000',
            image: 'es teh.png',
            description: 'Minuman sejuta umat yang selalu relate di setiap momen, wajib ada!',
            info: [
                'Teh premium, aroma strong',
                'Manis bisa diatur',
                'Disajikan dingin',
                'Wajib ada di setiap meja'
            ]
        }
    };
    
    // Cek apakah elemen modal ada
    if (menuModal && menuDetailBtns.length > 0) {
        // Loop semua tombol "Detail"
        menuDetailBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Ambil ID menu dari parent card
                const menuCard = this.closest('.menu-card');
                // closest() = cari parent terdekat yang sesuai selector
                
                const menuId = menuCard.getAttribute('data-menu-id');
                // Ambil ID menu (contoh: 'lalapan-telur')
                
                // Ambil data menu dari object menuData
                const menu = menuData[menuId];
                // menuData[menuId] = akses value dari object pakai key
                
                // Cek apakah data menu ada
                if (menu) {
                    // ISI KONTEN MODAL dengan data menu
                    
                    // 1. Update foto menu
                    const modalImage = document.getElementById('modalMenuImage');
                    modalImage.src = '/images/menu/' + menu.image;
                    // Ganti src foto dengan foto menu yang sesuai
                    modalImage.alt = menu.name;
                    
                    // 2. Update nama menu
                    document.getElementById('modalMenuTitle').textContent = menu.name;
                    // textContent = isi text (gak ada HTML tag)
                    
                    // 3. Update harga
                    document.getElementById('modalMenuPrice').textContent = menu.price;
                    
                    // 4. Update deskripsi
                    document.getElementById('modalMenuDescription').textContent = menu.description;
                    
                    // 5. Update info tambahan (list)
                    const infoList = document.getElementById('modalMenuInfo');
                    infoList.innerHTML = '';
                    // innerHTML = isi HTML (bisa ada tag)
                    // Kosongkan dulu list sebelumnya
                    
                    menu.info.forEach(function(infoItem) {
                        // Loop setiap item info
                        const li = document.createElement('li');
                        // createElement = buat elemen HTML baru
                        li.textContent = infoItem;
                        infoList.appendChild(li);
                        // appendChild = tambahkan child element ke parent
                    });
                    
                    // 6. TAMPILKAN MODAL
                    menuModal.classList.add('active');
                    // Tambah class 'active' biar modal muncul (display: flex di CSS)
                    
                    // Disable scroll body saat modal terbuka
                    document.body.style.overflow = 'hidden';
                    // overflow hidden = gak bisa scroll
                }
            });
        });
        
        // TUTUP MODAL saat tombol close diklik
        if (menuModalClose) {
            menuModalClose.addEventListener('click', function() {
                menuModal.classList.remove('active');
                // Hapus class 'active' biar modal hilang
                document.body.style.overflow = '';
                // Kembalikan scroll body
            });
        }
        
        // TUTUP MODAL saat overlay diklik
        if (menuModalOverlay) {
            menuModalOverlay.addEventListener('click', function() {
                menuModal.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
        
        // TUTUP MODAL saat tekan tombol ESC di keyboard
        document.addEventListener('keydown', function(event) {
            // keydown = saat tombol keyboard ditekan
            if (event.key === 'Escape' && menuModal.classList.contains('active')) {
                // event.key = tombol yang ditekan
                // 'Escape' = tombol ESC
                menuModal.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
    
    
    /* 
    ==============================================
    6. SMOOTH SCROLL (BONUS)
    ==============================================
    Fungsi: Scroll halus saat klik anchor link (link dengan #)
    Cara kerja: Sudah di-handle oleh CSS (scroll-behavior: smooth)
    Tapi kalau mau lebih custom, bisa pakai JavaScript ini
    Kalau dihapus: Scroll tetap smooth (pakai CSS)
    */
    
    // Ambil semua link yang punya href="#..."
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            const href = this.getAttribute('href');
            
            // Cek apakah href bukan cuma "#" (kosong)
            if (href !== '#' && href !== '') {
                event.preventDefault();
                // preventDefault = batalkan aksi default (lompat langsung)
                
                const targetId = href.substring(1);
                // substring(1) = ambil text mulai index 1 (hilangkan #)
                // Contoh: "#menu" jadi "menu"
                
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                        // Scroll smooth ke elemen target
                    });
                }
            }
        });
    });
    
    
    /* 
    ==============================================
    7. SCROLL TO TOP BUTTON (BONUS - OPTIONAL)
    ==============================================
    Fungsi: Tombol "Back to Top" muncul saat scroll ke bawah
    Cara kerja:
    1. Saat scroll lebih dari 300px, tombol muncul
    2. Saat tombol diklik, scroll ke atas halaman
    Kalau dihapus: Gak ada tombol back to top (gak masalah, ini bonus)
    
    CATATAN: Kamu perlu tambah HTML button dulu di footer atau di body:
    <button class="scroll-to-top" id="scrollToTop">
        <img src="images/icon/arrow-up.png" alt="Top">
    </button>
    */
    
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    if (scrollToTopBtn) {
        // Munculkan tombol saat scroll > 300px
        window.addEventListener('scroll', function() {
            // window.pageYOffset = jarak scroll dari atas (dalam pixel)
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
                // Class 'show' bikin tombol muncul (opacity 1, pointer-events auto)
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });
        
        // Scroll ke atas saat tombol diklik
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
                // Scroll ke posisi top: 0 (paling atas)
            });
        });
    }
    
    
    console.log('All JavaScript loaded and ready!');
    
}); /