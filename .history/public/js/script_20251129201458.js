/* 
=============================================================================
WAROENK QU - MAIN JAVASCRIPT
=============================================================================
Fungsi: Script utama untuk interactivity website
Version: 1.0
Last Update: 2024

FITUR YANG DIIMPLEMENTASIKAN:
1. Mobile Menu Toggle
2. Filter Menu (Makanan/Minuman)
3. Filter Galeri (Semua/Suasana/Makanan/Minuman)
4. Modal Pop-up Detail Menu
5. Active Navigation Highlighting
6. Smooth Scroll
7. WhatsApp Order Integration

CATATAN PENTING:
- Semua function diberi komentar detail untuk persiapan ujian
- Jika ada function yang dihapus, fitur terkait tidak akan jalan
- Event listener di-attach saat DOMContentLoaded (page fully loaded)
=============================================================================
*/

/* 
=============================================================================
1. MOBILE MENU TOGGLE
=============================================================================
Fungsi: Membuka/tutup menu navigasi di mobile
Dipanggil: Saat tombol burger diklik
Jika dihapus: Menu mobile tidak bisa dibuka/tutup
=============================================================================
*/

/**
 * toggleMobileMenu()
 * 
 * Fungsi: Toggle (buka/tutup) menu mobile
 * 
 * Cara Kerja:
 * 1. Ambil element burger button (.mobile-menu-toggle)
 * 2. Ambil element menu navigasi (.nav)
 * 3. Toggle class "active" pada burger (animasi jadi X)
 * 4. Toggle class "show" pada nav (show/hide menu)
 * 
 * Jika dihapus: Menu mobile tidak bisa dibuka
 */
function toggleMobileMenu() {
    // Ambil element burger button
    const toggle = document.querySelector('.mobile-menu-toggle');
    // Ambil element nav menu
    const nav = document.querySelector('.nav');
    
    // Toggle class "active" untuk animasi burger jadi X
    toggle.classList.toggle('active');
    // Toggle class "show" untuk show/hide menu
    nav.classList.toggle('show');
}

/* 
=============================================================================
2. FILTER MENU (HALAMAN MENU)
=============================================================================
Fungsi: Filter menu berdasarkan kategori (Semua/Makanan/Minuman)
Dipanggil: Saat button filter diklik
Jika dihapus: Filter menu tidak jalan, semua menu tetap tampil
=============================================================================
*/

/**
 * filterMenu(category)
 * 
 * @param {string} category - Kategori yang dipilih ('all', 'makanan', 'minuman')
 * 
 * Fungsi: Filter menu cards berdasarkan kategori
 * 
 * Cara Kerja:
 * 1. Ambil semua menu cards (.menu-card)
 * 2. Ambil semua filter buttons (.filter-tab)
 * 3. Loop setiap card:
 *    - Jika kategori = 'all' → Tampilkan semua
 *    - Jika kategori match dengan data-category → Tampilkan
 *    - Jika tidak match → Sembunyikan (display: none)
 * 4. Update active state pada button yang diklik
 * 
 * Jika dihapus: Filter menu tidak berfungsi
 */
function filterMenu(category) {
    // Ambil semua menu cards
    // querySelectorAll() mengembalikan NodeList dari semua element dengan class .menu-card
    const menuCards = document.querySelectorAll('.menu-card');
    
    // Ambil semua filter buttons
    const filterTabs = document.querySelectorAll('.filter-tab');
    
    // Loop setiap menu card
    menuCards.forEach(card => {
        // Ambil kategori dari attribute data-category
        // Contoh: <div class="menu-card" data-category="makanan">
        const cardCategory = card.getAttribute('data-category');
        
        // Cek apakah card sesuai dengan filter yang dipilih
        if (category === 'all' || cardCategory === category) {
            // Jika match atau 'all' → Tampilkan card
            card.style.display = 'block';
            
            // Animasi fade in (opsional)
            // Opacity dimulai dari 0 kemudian jadi 1
            card.style.opacity = '0';
            setTimeout(() => {
                card.style.opacity = '1';
            }, 10);
        } else {
            // Jika tidak match → Sembunyikan card
            card.style.display = 'none';
        }
    });
    
    // Update active state pada button
    filterTabs.forEach(tab => {
        // Ambil kategori dari attribute data-filter
        const tabFilter = tab.getAttribute('data-filter');
        
        // Jika tab ini yang diklik → Tambah class 'active'
        if (tabFilter === category) {
            tab.classList.add('active');
        } else {
            // Jika bukan → Remove class 'active'
            tab.classList.remove('active');
        }
    });
}

/* 
=============================================================================
3. FILTER GALERI (HALAMAN GALERI)
=============================================================================
Fungsi: Filter foto galeri berdasarkan kategori (Semua/Suasana/Makanan/Minuman)
Dipanggil: Saat button filter diklik
Jika dihapus: Filter galeri tidak jalan, semua foto tetap tampil
=============================================================================
*/

/**
 * filterGallery(category)
 * 
 * @param {string} category - Kategori yang dipilih ('all', 'suasana', 'makanan', 'minuman')
 * 
 * Fungsi: Filter gallery items berdasarkan kategori
 * 
 * Cara Kerja:
 * Sama seperti filterMenu(), tapi untuk gallery items
 * 1. Ambil semua gallery items (.gallery-item)
 * 2. Ambil semua filter buttons (.filter-tab)
 * 3. Loop setiap item dan show/hide berdasarkan kategori
 * 4. Update active state button
 * 
 * Jika dihapus: Filter galeri tidak berfungsi
 */
function filterGallery(category) {
    // Ambil semua gallery items
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    // Ambil semua filter buttons
    const filterTabs = document.querySelectorAll('.filter-tab');
    
    // Loop setiap gallery item
    galleryItems.forEach(item => {
        // Ambil kategori dari attribute data-category
        const itemCategory = item.getAttribute('data-category');
        
        // Cek apakah item sesuai dengan filter
        if (category === 'all' || itemCategory === category) {
            // Tampilkan item
            item.style.display = 'block';
            
            // Animasi fade in
            item.style.opacity = '0';
            setTimeout(() => {
                item.style.opacity = '1';
            }, 10);
        } else {
            // Sembunyikan item
            item.style.display = 'none';
        }
    });
    
    // Update active state pada button
    filterTabs.forEach(tab => {
        const tabFilter = tab.getAttribute('data-filter');
        
        if (tabFilter === category) {
            tab.classList.add('active');
        } else {
            tab.classList.remove('active');
        }
    });
}

/* 
=============================================================================
4. MODAL POP-UP DETAIL MENU
=============================================================================
Fungsi: Menampilkan pop-up overlay dengan detail lengkap menu
Dipanggil: Saat button "Detail" di menu card diklik
Jika dihapus: Modal tidak bisa dibuka, detail menu tidak tampil
=============================================================================
*/

/**
 * DATA MENU
 * 
 * Object berisi semua data menu lengkap:
 * - id: Unique identifier
 * - name: Nama menu
 * - price: Harga (format angka)
 * - image: Path ke gambar
 * - description: Deskripsi fun/receh
 * - additional: Array informasi tambahan
 * 
 * Fungsi: Menyimpan data statis menu untuk ditampilkan di modal
 * Jika dihapus: Modal tidak punya data untuk ditampilkan
 */
const menuData = {
    'lalapan-telur': {
        name: 'Lalapan Telur',
        price: 10000,
        image: '/images/menu/lalapan telur.png',
        description: 'Paket hemat legend yang bisa nyelametin tanggal tua tanpa bikin sedih',
        additional: [
            'Telur goreng garing pinggirannya',
            'Bisa request level sambal',
            'Lalapan segar, cucok buat yang simpel',
            'Porsi pas buat hemat tapi nikmat'
        ]
    },
    'soto-ayam': {
        name: 'Soto Ayam',
        price: 12000,
        image: '/images/menu/soto ayam.png',
        description: 'Sat set banget, kuah kuningnya nge-charge semangat, bikin kamu auto seger lagi',
        additional: [
            'Kuah bening, segar, ringan',
            'Ayam suwir banyak',
            'Disajikan hangat',
            'Enak tambah sambal biar makin nampol'
        ]
    },
    'mie-goreng': {
        name: 'Mie Goreng Jawa',
        price: 12000,
        image: '/images/menu/mie goreng.png',
        description: 'Mie legendaris dengan bumbu yang kaya rasa, kenikmatannya tidak tertandingi!',
        additional: [
            'Dibuat fresh tiap pesanan',
            'Rasa manis-gurih ala rumahan',
            'Level pedas bisa disesuaikan',
            'Porsi lumayan bikin kenyang'
        ]
    },
    'rawon': {
        name: 'Rawon',
        price: 18000,
        image: '/images/menu/rawon.png',
        description: 'Daging empuk berkuah hitam pekat yang sukses bikin lidah kamu ketagihan berat',
        additional: [
            'Tersedia setiap hari',
            'Kuah hitam khas, rempah strong',
            'Daging empuk, potongan nggak pelit',
            'Cocok buat makan siang biar waras lagi'
        ]
    },
    'nasi-goreng': {
        name: 'Nasi Goreng Jawa',
        price: 12000,
        image: '/images/menu/nasi goreng.png',
        description: 'Rajanya segala nasi, gurihnya pas, cocok buat mendongkrak mood secara instan',
        additional: [
            'Bisa pilih topping (telur/ayam)',
            'Wangi bawangnya nendang',
            'Pedas bisa request',
            'Cocok buat menu anti ribet'
        ]
    },
    'lalapan-ayam': {
        name: 'Lalapan Ayam',
        price: 12000,
        image: '/images/menu/lalapan ayam.png',
        description: 'Ayam juara dengan sambal pedas nampol, sekali coba auto teriak nagih!',
        additional: [
            'Ayam digoreng crispy luar-dalam',
            'Sambal bisa pilih pedas atau sedang',
            'Lalapan fresh tiap hari',
            'Bonus kriuk tepung'
        ]
    },
    'soto-daging': {
        name: 'Soto Daging',
        price: 15000,
        image: '/images/menu/soto daging.png',
        description: 'Kuah hangat dengan daging lembut; solusi cepat buat kamu yang butuh kehangatan selain dari chat gebetan',
        additional: [
            'Kuah bening gurih dengan potongan daging empuk',
            'Rempah terasa, tapi tetap ringan',
            'Disajikan hangat',
            'Enak ditambah sambal dan jeruk biar lebih segar'
        ]
    },
    'lalapan-empal': {
        name: 'Lalapan Empal',
        price: 16000,
        image: '/images/menu/lalapan empal.png',
        description: 'Empal lembut dengan rasa manis-gurih, cocok buat yang suka daging tapi tetap pengen terlihat "healthy"',
        additional: [
            'Empal goreng berbumbu, teksturnya empuk',
            'Sambal tersedia dalam beberapa tingkat pedas',
            'Lalapan segar sebagai pelengkap',
            'Cocok untuk menu berat dengan rasa yang kaya'
        ]
    },
    'lalapan-tahu-tempe': {
        name: 'Lalapan Tahu Tempe',
        price: 8000,
        image: '/images/menu/lalapan tempe n tahu.png',
        description: 'Lalapan hemat dengan tahu tempe goreng yang crispy, sahabat setia anak kos sedunia',
        additional: [
            'Tempe dan tahu digoreng hingga renyah',
            'Sambal bisa disesuaikan tingkat pedasnya',
            'Lalapan segar setiap hari',
            'Pilihan hemat yang tetap mengenyangkan'
        ]
    },
    'kwetiau': {
        name: 'Kwetiau',
        price: 12000,
        image: '/images/menu/kwetiau.png',
        description: 'Kwetiau lembut berbumbu gurih, pilihan pas buat yang pengen beda dikit tapi tetap aman',
        additional: [
            'Kwetiau lembut dengan bumbu gurih',
            'Dibuat fresh setiap pesanan',
            'Cocok dinikmati pedas maupun tidak',
            'Porsi pas untuk makan siang atau malam'
        ]
    },
    'kopi': {
        name: 'Kopi',
        price: 4000,
        image: '/images/menu/kopi.png',
        description: 'Kopi klasik buat mulai hari atau lembur; pahitnya pas, ga se-pahit pesan singkat yang cuma "ok"',
        additional: [
            'Kopi murni tanpa campuran',
            'Aroma kuat dan rasa lebih bold',
            'Disajikan panas',
            'Cocok untuk pecinta kopi yang suka minuman sederhana dan pekat'
        ]
    },
    'es-jeruk': {
        name: 'Es Jeruk',
        price: 4000,
        image: '/images/menu/es jeruk.png',
        description: 'Perasan jeruk asli yang dinginnya nyess, solusi cepat buat menghilangkan dahaga',
        additional: [
            'Jeruk peras asli',
            'Segar nggak bikin eneg',
            'Disajikan dingin',
            'Manis bisa diatur'
        ]
    },
    'es-teh': {
        name: 'Es Teh',
        price: 3000,
        image: '/images/menu/es teh.png',
        description: 'Minuman sejuta umat yang selalu relate di setiap momen, wajib ada!',
        additional: [
            'Teh premium, aroma strong',
            'Manis bisa diatur',
            'Disajikan dingin',
            'Minuman wajib pelengkap makanan'
        ]
    }
};

/**
 * openMenuModal(menuId)
 * 
 * @param {string} menuId - ID menu yang akan ditampilkan (contoh: 'lalapan-telur')
 * 
 * Fungsi: Membuka modal dan menampilkan detail menu
 * 
 * Cara Kerja:
 * 1. Ambil data menu dari object menuData berdasarkan menuId
 * 2. Jika data tidak ditemukan → Return (stop function)
 * 3. Isi modal dengan data menu:
 *    - Set judul (nama menu)
 *    - Set gambar
 *    - Set harga (format dengan Rupiah)
 *    - Set deskripsi
 *    - Generate list informasi tambahan (loop array additional)
 *    - Set link WhatsApp order dengan text pre-filled
 * 4. Tampilkan modal (add class 'show')
 * 5. Disable scroll body (prevent scroll behind modal)
 * 
 * Jika dihapus: Modal tidak bisa dibuka
 */
function openMenuModal(menuId) {
    // Ambil data menu dari object menuData
    const menu = menuData[menuId];
    
    // Jika menu tidak ditemukan, stop function
    if (!menu) {
        console.error('Menu not found:', menuId);
        return;
    }
    
    // Ambil element modal
    const modal = document.getElementById('menuModal');
    
    // Set judul modal (nama menu)
    document.getElementById('modalMenuName').textContent = menu.name;
    
    // Set gambar menu
    document.getElementById('modalMenuImage').src = menu.image;
    document.getElementById('modalMenuImage').alt = menu.name;
    
    // Set harga (format dengan Rupiah)
    // Contoh: 12000 → "Rp 12.000"
    document.getElementById('modalMenuPrice').textContent = formatRupiah(menu.price);
    
    // Set deskripsi menu
    document.getElementById('modalMenuDescription').textContent = menu.description;
    
    // Generate list informasi tambahan
    const additionalList = document.getElementById('modalMenuAdditional');
    // Clear list dulu (kosongkan)
    additionalList.innerHTML = '';
    
    // Loop array additional dan buat <li> untuk setiap item
    menu.additional.forEach(info => {
        const li = document.createElement('li');
        li.textContent = info;
        additionalList.appendChild(li);
    });
    
    // Set WhatsApp order link
    // Generate text: "Halo, saya mau pesan [Nama Menu] - [Harga]"
    const waText = `Halo, saya mau pesan ${menu.name} - ${formatRupiah(menu.price)}`;
    // Encode untuk URL (spasi jadi %20, dll)
    const waLink = `https://wa.me/6281234567890?text=${encodeURIComponent(waText)}`;
    document.getElementById('modalOrderBtn').href = waLink;
    
    // Tampilkan modal (add class 'show')
    modal.classList.add('show');
    
    // Disable scroll body
    // Mencegah scroll halaman di belakang modal
    document.body.style.overflow = 'hidden';
}

/**
 * closeMenuModal()
 * 
 * Fungsi: Menutup modal
 * 
 * Cara Kerja:
 * 1. Ambil element modal
 * 2. Remove class 'show' (hide modal)
 * 3. Enable kembali scroll body
 * 
 * Jika dihapus: Modal tidak bisa ditutup dengan tombol X
 * (Masih bisa ditutup dengan klik overlay karena onclick di HTML)
 */
function closeMenuModal() {
    const modal = document.getElementById('menuModal');
    
    // Hide modal (remove class 'show')
    modal.classList.remove('show');
    
    // Enable kembali scroll body
    document.body.style.overflow = 'auto';
}

/**
 * formatRupiah(number)
 * 
 * @param {number} number - Angka yang akan diformat
 * @returns {string} - String format Rupiah (contoh: "Rp 12.000")
 * 
 * Fungsi: Format angka menjadi format Rupiah dengan titik pemisah ribuan
 * 
 * Cara Kerja:
 * 1. Convert number ke string
 * 2. Reverse string (balik)
 * 3. Tambahkan titik setiap 3 digit
 * 4. Reverse lagi (kembalikan urutan)
 * 5. Tambahkan prefix "Rp "
 * 
 * Contoh:
 * formatRupiah(12000) → "Rp 12.000"
 * formatRupiah(1500000) → "Rp 1.500.000"
 * 
 * Jika dihapus: Harga tampil tanpa format (contoh: "Rp 12000")
 */
function formatRupiah(number) {
    // Convert ke string dan reverse
    const numberString = number.toString();
    const reversed = numberString.split('').reverse().join('');
    
    // Tambahkan titik setiap 3 digit
    let formatted = '';
    for (let i = 0; i < reversed.length; i++) {
        if (i > 0 && i % 3 === 0) {
            formatted += '.';
        }
        formatted += reversed[i];
    }
    
    // Reverse lagi dan tambah prefix "Rp "
    return 'Rp ' + formatted.split('').reverse().join('');
}

/* 
=============================================================================
5. ACTIVE NAVIGATION HIGHLIGHTING
=============================================================================
Fungsi: Highlight menu navigasi sesuai halaman aktif
Dipanggil: Saat halaman load (DOMContentLoaded)
Jika dihapus: Menu navigasi tidak ada highlight halaman aktif
=============================================================================
*/

/**
 * setActiveNav()
 * 
 * Fungsi: Set class 'active' pada menu navigasi sesuai halaman aktif
 * 
 * Cara Kerja:
 * 1. Ambil URL halaman saat ini (window.location.pathname)
 * 2. Ambil semua nav links
 * 3. Loop setiap link:
 *    - Jika href link match dengan URL → Add class 'active'
 *    - Jika tidak match → Remove class 'active'
 * 
 * Contoh:
 * - URL: /menu → Menu nav link dapat class 'active'
 * - URL: /galeri → Galeri nav link dapat class 'active'
 * 
 * Jika dihapus: Menu navigasi tidak highlight halaman aktif
 */
function setActiveNav() {
    // Ambil path URL saat ini
    // Contoh: http://localhost/menu → pathname = "/menu"
    const currentPath = window.location.pathname;
    
    // Ambil semua nav links
    const navLinks = document.querySelectorAll('.nav-link');
    
    // Loop setiap nav link
    navLinks.forEach(link => {
        // Ambil href dari link
        const linkPath = new URL(link.href).pathname;
        
        // Jika link path match dengan current path
        if (linkPath === currentPath) {
            // Add class 'active'
            link.classList.add('active');
        } else {
            // Remove class 'active'
            link.classList.remove('active');
        }
    });
}

/* 
=============================================================================
6. SMOOTH SCROLL
=============================================================================
Fungsi: Smooth scroll saat klik anchor link (#section)
Dipanggil: Saat halaman load (DOMContentLoaded)
Jika dihapus: Scroll jadi instant (tidak smooth)
=============================================================================
*/

/**
 * initSmoothScroll()
 * 
 * Fungsi: Initialize smooth scroll untuk anchor links
 * 
 * Cara Kerja:
 * 1. Ambil semua links yang href-nya dimulai dengan '#'
 * 2. Loop dan attach event listener 'click' pada setiap link
 * 3. Saat diklik:
 *    - Prevent default behavior (instant jump)
 *    - Ambil target element (id dari href)
 *    - Scroll smooth ke target element
 * 
 * Jika dihapus: Smooth scroll tidak berfungsi
 */
function initSmoothScroll() {
    // Ambil semua anchor links (href dimulai dengan #)
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    // Loop setiap anchor link
    anchorLinks.forEach(link => {
        // Attach event listener 'click'
        link.addEventListener('click', function(e) {
            // Ambil href (contoh: "#about")
            const href = this.getAttribute('href');
            
            // Jika href = "#" saja, skip (return)
            if (href === '#') return;
            
            // Prevent default jump behavior
            e.preventDefault();
            
            // Ambil target element
            const target = document.querySelector(href);
            
            // Jika target ditemukan
            if (target) {
                // Scroll smooth ke target
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/* 
=============================================================================
7. INITIALIZATION (DOMContentLoaded)
=============================================================================
Fungsi: Initialize semua function saat halaman fully loaded
Dipanggil: Otomatis saat DOM ready
Jika dihapus: Semua function tidak akan jalan
=============================================================================
*/

/**
 * DOMContentLoaded Event Listener
 * 
 * Fungsi: Execute code setelah DOM fully loaded
 * 
 * Cara Kerja:
 * 1. Browser load HTML
 * 2. DOM tree dibuat
 * 3. Event 'DOMContentLoaded' trigger
 * 4. Code di dalam ini dijalankan
 * 
 * Kenapa perlu?
 * - Agar JavaScript tidak error karena element belum ada
 * - Lebih safe daripada langsung execute di top file
 * 
 * Jika dihapus: Semua initialization tidak jalan
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== 1. MOBILE MENU TOGGLE =====
    // Attach event listener pada burger button
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    if (mobileToggle) {
        mobileToggle.addEventListener('click', toggleMobileMenu);
    }
    
    // ===== 2. CLOSE MODAL SAAT KLIK OVERLAY =====
    // Sudah di-handle via onclick di HTML, tapi bisa juga via JS
    const modalOverlay = document.querySelector('.modal-overlay');
    if (modalOverlay) {
        modalOverlay.addEventListener('click', closeMenuModal);
    }
    
    // ===== 3. CLOSE MODAL DENGAN ESC KEY =====
    // Tambahan: Modal bisa ditutup dengan tekan Escape
    document.addEventListener('keydown', function(e) {
        // Jika key yang ditekan = Escape (keyCode 27)
        if (e.key === 'Escape' || e.keyCode === 27) {
            const modal = document.getElementById('menuModal');
            // Jika modal sedang terbuka (ada class 'show')
            if (modal && modal.classList.contains('show')) {
                // Tutup modal
                closeMenuModal();
            }
        }
    });
    
    // ===== 4. SET ACTIVE NAVIGATION =====
    // Highlight menu navigasi sesuai halaman aktif
    setActiveNav();
    
    // ===== 5. SMOOTH SCROLL =====
    // Initialize smooth scroll untuk anchor links
    initSmoothScroll();
    
    // ===== 6. CLOSE MOBILE MENU SAAT LINK DIKLIK =====
    // Auto close menu mobile saat nav link diklik
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Jika menu mobile sedang terbuka
            const nav = document.querySelector('.nav');
            const toggle = document.querySelector('.mobile-menu-toggle');
            
            if (nav && nav.classList.contains('show')) {
                // Tutup menu mobile
                nav.classList.remove('show');
                toggle.classList.remove('active');
            }
        });
    });
    
    // ===== 7. LAZY LOAD IMAGES (OPSIONAL) =====
    // Lazy load untuk performance optimization
    // Images load saat scroll mendekati viewport
    const images = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        // Buat observer
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    // Replace src dengan data-src
                    img.src = img.dataset.src;
                    // Remove data-src attribute
                    img.removeAttribute('data-src');
                    // Stop observing image ini
                    observer.unobserve(img);
                }
            });
        });
        
        // Observe semua images
        images.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback untuk browser yang tidak support IntersectionObserver
        images.forEach(img => {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
        });
    }
    
    console.log('Waroenk Qu Website Initialized! 🍜');
});

/* 
=============================================================================
HELPER FUNCTIONS (TAMBAHAN)
=============================================================================
Function-function tambahan untuk kebutuhan spesifik
=============================================================================
*/

/**
 * scrollToTop()
 * 
 * Fungsi: Scroll ke atas halaman (smooth)
 * Bisa dipanggil dari button "Back to Top"
 * 
 * Cara Kerja:
 * window.scrollTo() dengan behavior 'smooth'
 */
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

/**
 * shareToWhatsApp(text, url)
 * 
 * @param {string} text - Text yang akan di-share
 * @param {string} url - URL yang akan di-share (opsional)
 * 
 * Fungsi: Share ke WhatsApp (bisa dipakai untuk share menu, promo, dll)
 * 
 * Cara Kerja:
 * Generate link WhatsApp dengan text & URL pre-filled
 */
function shareToWhatsApp(text, url = '') {
    let message = text;
    if (url) {
        message += ' ' + url;
    }
    
    const waLink = `https://wa.me/?text=${encodeURIComponent(message)}`;
    window.open(waLink, '_blank');
}

/**
 * copyToClipboard(text)
 * 
 * @param {string} text - Text yang akan di-copy
 * 
 * Fungsi: Copy text ke clipboard
 * Bisa dipakai untuk copy nomor telepon, email, dll
 * 
 * Cara Kerja:
 * Pakai Clipboard API (modern)
 * Fallback ke execCommand (old browser)
 */
function copyToClipboard(text) {
    // Cek apakah browser support Clipboard API
    if (navigator.clipboard) {
        // Modern way
        navigator.clipboard.writeText(text).then(() => {
            alert('Copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy:', err);
        });
    } else {
        // Fallback untuk old browser
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        textarea.select();
        
        try {
            document.execCommand('copy');
            alert('Copied to clipboard!');
        } catch (err) {
            console.error('Failed to copy:', err);
        }
        
        document.body.removeChild(textarea);
    }
}

/* 
=============================================================================
END OF FILE
=============================================================================
Total Functions:
1. toggleMobileMenu() - Mobile menu toggle
2. filterMenu() - Filter menu by category
3. filterGallery() - Filter gallery by category
4. openMenuModal() - Open detail menu modal
5. closeMenuModal() - Close modal
6. formatRupiah() - Format number to Rupiah
7. setActiveNav() - Highlight active navigation
8. initSmoothScroll() - Smooth scroll initialization
9. scrollToTop() - Scroll to top helper
10. shareToWhatsApp() - WhatsApp share helper
11. copyToClipboard() - Copy to clipboard helper

Event Listeners:
- DOMContentLoaded - Main initialization
- Click - Mobile menu, modal, nav links
- Keydown - Close modal with ESC
- IntersectionObserver - Lazy load images

Happy Coding! 🚀
=============================================================================
*/