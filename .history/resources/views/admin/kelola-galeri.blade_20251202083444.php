{{-- 
========================================================
FILE   : resources/views/admin/kelola-galeri.blade.php
HALAMAN: KELOLA GALERI FOTO WAROENK QU (INTERACTIVE VERSION)
FITUR  : Upload, Hapus, Filter dengan localStorage
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri - Waroenk Qu</title>

    <style>
        /* =========================================================
           1. STYLE GLOBAL HALAMAN
           ========================================================= */
        
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F7EFDE;
        }

        .page-container {
            min-height: 100vh;
        }

        /* =========================================================
           2. SIDEBAR + OVERLAY
           ========================================================= */
        
        .overlay {
            position: fixed;
            inset: 0;
            background-color: rgba(0,0,0,0.4);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 900;
        }

        .overlay.overlay--visible {
            opacity: 1;
            pointer-events: auto;
        }

        .sidebar {
            width: 240px;
            background-color: #FFFFFF;
            box-shadow: 4px 0 16px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            padding: 24px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            transform: translateX(-100%);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar.sidebar--open {
            transform: translateX(0);
        }

        .sidebar-header {
            margin-bottom: 32px;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-logo-icon {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .sidebar-logo-subtitle {
            font-size: 17px;
            color: #B33939;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 12px;
            border-radius: 999px;
            font-size: 13px;
            color: #444;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .sidebar-item:hover {
            background-color: #F5F5F5;
        }

        .sidebar-item--active {
            background-color: #FDEBEA;
            color: #B33939;
            font-weight: 600;
        }

        .sidebar-item-icon {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }

        /* =========================================================
           3. TOP BAR
           ========================================================= */
        
        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 32px;
            background-color: #FDF7EF;
        }

        .top-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .menu-button {
            border: none;
            background: transparent;
            padding: 6px;
            border-radius: 999px;
            cursor: pointer;
        }

        .menu-button:hover {
            background-color: #F0E0CF;
        }

        .menu-icon {
            width: 22px;
            height: 22px;
        }

        .btn-logout {
            padding: 8px 18px;
            border-radius: 999px;
            border: 1px solid #B33939;
            background-color: #fff;
            color: #B33939;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-logout-icon {
            width: 14px;
            height: 14px;
            object-fit: contain;
        }

        .btn-logout:hover {
            background-color: #B33939;
            color: #fff;
        }

        /* =========================================================
           4. HEADER SECTION
           ========================================================= */
        
        .gallery-header {
            background-color: #F7F2E9;
            padding: 18px 32px;
        }

        .gallery-header-title {
            font-size: 18px;
            font-weight: 600;
            color: #B83939;
            margin-bottom: 4px;
        }

        .gallery-header-subtitle {
            font-size: 12px;
            color: #777;
        }

        /* =========================================================
           5. WRAPPER KONTEN
           ========================================================= */
        
        .content-wrapper {
            max-width: 960px;
            margin: 18px auto 40px auto;
            padding: 0 16px;
        }

        /* =========================================================
           6. BOX UPLOAD FOTO
           ========================================================= */
        
        .upload-card {
            background-color: #FFF7E7;
            border-radius: 18px;
            border: 2px solid #F2C94C;
            padding: 26px 24px 22px;
            margin-bottom: 24px;
        }

        .upload-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 18px;
        }

        .upload-icon {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 8px;
        }

        .upload-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .upload-subtitle {
            font-size: 12px;
            color: #888;
        }

        .upload-form-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }

        .upload-file-row {
            display: flex;
            width: 100%;
            max-width: 520px;
        }

        /* ✨ Input file disembunyikan, tombol sebagai trigger */
        #fileInput {
            display: none;
        }

        .btn-choose-file {
            background-color: #D6D3CE;
            border: none;
            padding: 8px 14px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 4px 0 0 4px;
        }

        .upload-file-name {
            flex: 1;
            background-color: #E9E7E2;
            font-size: 12px;
            color: #666;
            display: flex;
            align-items: center;
            padding: 0 10px;
            border-radius: 0 4px 4px 0;
        }

        .upload-checkboxes {
            display: flex;
            gap: 20px;
            font-size: 12px;
            justify-content: center;
        }

        .upload-checkboxes label {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
        }

        .btn-upload-submit {
            margin-top: 4px;
            background-color: #35A854;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 32px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(53,168,84,0.35);
            transition: all 0.2s ease;
        }

        .btn-upload-submit:hover {
            background-color: #2F9148;
            transform: translateY(-1px);
        }

        .btn-upload-submit:disabled {
            background-color: #CCC;
            cursor: not-allowed;
            box-shadow: none;
        }

        /* =========================================================
           7. TAB KATEGORI
           ========================================================= */
        
        .category-tabs {
            display: inline-flex;
            gap: 8px;
            margin-bottom: 18px;
        }

        .category-tab {
            padding: 7px 18px;
            border-radius: 999px;
            border: 1px solid #B58B5B;
            background-color: #FFFFFF;
            font-size: 12px;
            cursor: pointer;
            font-weight: 500;
            color: #555;
            transition: all 0.2s ease;
        }

        .category-tab--active {
            background-color: #B33939;
            color: #FFFFFF;
            border-color: #B33939;
        }

        /* =========================================================
           8. GRID FOTO GALERI
           ========================================================= */
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .gallery-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background-color: #EEE;
            cursor: pointer;
            transition: all 0.2s ease;
            /* ✨ Animasi fade in */
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .gallery-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
        }

        .gallery-item img {
            width: 100%;
            height: 180px;
            display: block;
            object-fit: cover;
        }

        .gallery-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: #F2C94C;
            color: #333;
            font-size: 10px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 999px;
        }

        /* ✨ Tombol hapus muncul saat hover */
        .btn-delete-photo {
            position: absolute;
            bottom: 8px;
            right: 8px;
            background-color: rgba(179, 57, 57, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            font-size: 16px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .gallery-item:hover .btn-delete-photo {
            display: flex;
        }

        .btn-delete-photo:hover {
            background-color: #B33939;
            transform: scale(1.1);
        }

        /* =========================================================
           9. NOTIFICATION TOAST
           ========================================================= */
        
        .notification {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background-color: #35A854;
            color: white;
            padding: 14px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
            z-index: 2000;
            pointer-events: none;
        }

        .notification.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .notification.error {
            background-color: #B33939;
        }

        /* =========================================================
           10. RESPONSIVE
           ========================================================= */
        
        @media (max-width: 992px) {
            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .top-bar,
            .gallery-header {
                padding: 12px 16px;
            }

            .content-wrapper {
                padding: 0 12px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .upload-file-row {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

{{-- OVERLAY --}}
<div class="overlay" id="overlay"></div>

<div class="page-container">

    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo1.png') }}" 
                     alt="Logo" class="sidebar-logo-icon">
            </div>
            <div class="sidebar-logo-subtitle">Admin Panel</div>
        </div>

        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/overview.png') }}" class="sidebar-item-icon" alt="">
                <span>Overview</span>
            </a>

            <a href="{{ route('admin.menu') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/menu hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Menu</span>
            </a>

            <a href="{{ route('admin.galeri') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/galeri hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Galeri</span>
            </a>

            <a href="{{ route('admin.testimoni') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/testi hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Testimoni</span>
            </a>

            <a href="{{ route('admin.tentang') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/tentang-hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Tentang</span>
            </a>

            <a href="{{ route('admin.kontak') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/kontak hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Kontak</span>
            </a>
        </nav>
    </aside>

    {{-- TOP BAR --}}
    <header class="top-bar">
        <div class="top-left">
            <button type="button" class="menu-button" id="menuToggle">
                <img src="{{ asset('images/icon/overview.png') }}" alt="Menu" class="menu-icon">
            </button>
        </div>

        <form method="GET" action="/admin/login">
            <button type="submit" class="btn-logout">
                <img src="{{ asset('images/icon/logout merah.png') }}"
                     alt="Keluar"
                     class="btn-logout-icon">
                Keluar
            </button>
        </form>
    </header>

    {{-- HEADER KONTEN --}}
    <section class="gallery-header">
        <div class="gallery-header-title">Kelola Galeri</div>
        <div class="gallery-header-subtitle">
            Upload, edit, atau hapus foto galeri
        </div>
    </section>

    {{-- KONTEN UTAMA --}}
    <div class="content-wrapper">

        {{-- BOX UPLOAD --}}
        <section class="upload-card">
            <div class="upload-header">
                <img src="{{ asset('images/icon/upload-foto.png') }}"
                     alt="Upload"
                     class="upload-icon">
                <div class="upload-title">Upload Foto Baru</div>
                <div class="upload-subtitle">
                    Klik tombol "Pilih File" untuk memilih foto
                </div>
            </div>

            <div class="upload-form-row">
                {{-- Input file tersembunyi --}}
                <input type="file" 
                       id="fileInput" 
                       accept="image/*">

                {{-- Baris tombol + nama file --}}
                <div class="upload-file-row">
                    <button type="button" 
                            class="btn-choose-file" 
                            id="btnChooseFile">
                        Pilih File
                    </button>
                    <div class="upload-file-name" id="fileName">
                        Tidak ada file yang diupload
                    </div>
                </div>

                {{-- Checkbox kategori --}}
                <div class="upload-checkboxes">
                    <label>
                        <input type="radio" 
                               name="kategori_upload" 
                               value="makanan" 
                               checked>
                        <span>Makanan</span>
                    </label>
                    <label>
                        <input type="radio" 
                               name="kategori_upload" 
                               value="minuman">
                        <span>Minuman</span>
                    </label>
                    <label>
                        <input type="radio" 
                               name="kategori_upload" 
                               value="suasana">
                        <span>Suasana</span>
                    </label>
                </div>

                {{-- Tombol upload --}}
                <button type="button" 
                        class="btn-upload-submit" 
                        id="btnUpload"
                        disabled>
                    Upload Foto
                </button>
            </div>
        </section>

        {{-- TAB KATEGORI --}}
        <div class="category-tabs">
            <button type="button"
                    class="category-tab category-tab--active"
                    data-category="makanan"
                    id="tabMakanan">
                Makanan
            </button>

            <button type="button"
                    class="category-tab"
                    data-category="minuman"
                    id="tabMinuman">
                Minuman
            </button>

            <button type="button"
                    class="category-tab"
                    data-category="suasana"
                    id="tabSuasana">
                Suasana
            </button>
        </div>

        {{-- GRID GALERI --}}
        <section class="gallery-grid" id="galleryGrid">
            {{-- Akan di-render via JavaScript --}}
        </section>

    </div>
</div>

{{-- NOTIFICATION TOAST --}}
<div class="notification" id="notification"></div>

{{-- =========================================================
     JAVASCRIPT - FULL INTERACTIVE
   ========================================================= --}}
<script>
    /* ========================================
       A. DATA DEFAULT & localStorage INIT
       ======================================== */

    // Data default galeri (hard-coded untuk pertama kali)
    const defaultGalleryData = [
        // Makanan
        { id: 1, category: 'makanan', image: '{{ asset("images/menu/soto ayam.png") }}', name: 'Soto Ayam' },
        { id: 2, category: 'makanan', image: '{{ asset("images/menu/rawon.png") }}', name: 'Rawon' },
        { id: 3, category: 'makanan', image: '{{ asset("images/menu/soto daging.png") }}', name: 'Soto Daging' },
        { id: 4, category: 'makanan', image: '{{ asset("images/menu/nasi goreng.png") }}', name: 'Nasi Goreng' },
        { id: 5, category: 'makanan', image: '{{ asset("images/menu/mie goreng.png") }}', name: 'Mie Goreng' },
        { id: 6, category: 'makanan', image: '{{ asset("images/menu/kwetiau.png") }}', name: 'Kwetiau' },
        { id: 7, category: 'makanan', image: '{{ asset("images/menu/lalapan empal.png") }}', name: 'Lalapan Empal' },
        { id: 8, category: 'makanan', image: '{{ asset("images/menu/lalapan telur.png") }}', name: 'Lalapan Telur' },
        { id: 9, category: 'makanan', image: '{{ asset("images/menu/lalapan ayam.png") }}', name: 'Lalapan Ayam' },
        { id: 10, category: 'makanan', image: '{{ asset("images/menu/lalapan tempe n tahu.png") }}', name: 'Lalapan Tempe Tahu' },
        // Minuman
        { id: 11, category: 'minuman', image: '{{ asset("images/menu/kopi.png") }}', name: 'Kopi' },
        { id: 12, category: 'minuman', image: '{{ asset("images/menu/es teh.png") }}', name: 'Es Teh' },
        { id: 13, category: 'minuman', image: '{{ asset("images/menu/es jeruk.png") }}', name: 'Es Jeruk' },
        // Suasana
        { id: 14, category: 'suasana', image: '{{ asset("images/warung/dalam1.png") }}', name: 'Suasana Dalam 1' },
        { id: 15, category: 'suasana', image: '{{ asset("images/warung/dalam2.png") }}', name: 'Suasana Dalam 2' },
        { id: 16, category: 'suasana', image: '{{ asset("images/warung/luar-siang.png") }}', name: 'Suasana Luar Siang' },
        { id: 17, category: 'suasana', image: '{{ asset("images/warung/luar-sore.png") }}', name: 'Suasana Luar Sore' }
    ];

    // Load data dari localStorage atau gunakan default
    let galleryData = JSON.parse(localStorage.getItem('galleryData')) || defaultGalleryData;

    // Kategori aktif saat ini
    let activeCategory = 'makanan';

    /* ========================================
       B. FUNGSI RENDER GALERI
       ======================================== */

    /**
     * Fungsi untuk me-render ulang grid galeri berdasarkan kategori aktif
     * - Filter data berdasarkan kategori
     * - Generate HTML untuk setiap foto
     * - Tambahkan tombol hapus pada setiap item
     */
    function renderGallery() {
        const gridContainer = document.getElementById('galleryGrid');
        
        // Filter data berdasarkan kategori aktif
        const filteredData = galleryData.filter(item => item.category === activeCategory);

        // Kosongkan container
        gridContainer.innerHTML = '';

        // Jika tidak ada data
        if (filteredData.length === 0) {
            gridContainer.innerHTML = '<p style="grid-column: 1/-1; text-align:center; color:#999; padding:40px 0;">Belum ada foto di kategori ini</p>';
            return;
        }

        // Loop dan buat card untuk setiap foto
        filteredData.forEach(item => {
            const article = document.createElement('article');
            article.className = 'gallery-item';
            article.dataset.id = item.id;
            
            article.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div class="gallery-badge">${capitalizeFirst(item.category)}</div>
                <button class="btn-delete-photo" onclick="deletePhoto(${item.id})" title="Hapus foto">
                    ×
                </button>
            `;

            gridContainer.appendChild(article);
        });
    }

    /* ========================================
       C. FUNGSI UPLOAD FOTO
       ======================================== */

    // Referensi elemen upload
    const fileInput = document.getElementById('fileInput');
    const btnChooseFile = document.getElementById('btnChooseFile');
    const fileName = document.getElementById('fileName');
    const btnUpload = document.getElementById('btnUpload');

    // Ketika tombol "Pilih File" diklik → trigger file input
    btnChooseFile.addEventListener('click', () => {
        fileInput.click();
    });

    // Ketika file dipilih → tampilkan nama file & enable tombol upload
    fileInput.addEventListener('change', (e) => {
        if (e.target.files.length > 0) {
            const file = e.target.files[0];
            fileName.textContent = file.name;
            btnUpload.disabled = false;
        } else {
            fileName.textContent = 'Tidak ada file yang diupload';
            btnUpload.disabled = true;
        }
    });

    // Ketika tombol "Upload Foto" diklik
    btnUpload.addEventListener('click', () => {
        const file = fileInput.files[0];
        if (!file) {
            showNotification('Pilih file terlebih dahulu!', 'error');
            return;
        }

        // Ambil kategori yang dipilih
        const selectedCategory = document.querySelector('input[name="kategori_upload"]:checked').value;

        // Baca file sebagai Data URL (base64) untuk disimpan di localStorage
        const reader = new FileReader();
        reader.onload = function(event) {
            // Buat objek foto baru
            const newPhoto = {
                id: Date.now(), // ID unik berdasarkan timestamp
                category: selectedCategory,
                image: event.target.result, // Data URL (base64)
                name: file.name
            };

            // Tambahkan ke array data
            galleryData.push(newPhoto);

            // Simpan ke localStorage
            localStorage.setItem('galleryData', JSON.stringify(galleryData));

            // Render ulang galeri
            renderGallery();

            // Reset form
            fileInput.value = '';
            fileName.textContent = 'Tidak ada file yang diupload';
            btnUpload.disabled = true;

            // Tampilkan notifikasi sukses
            showNotification('Foto berhasil diupload!');
        };

        reader.readAsDataURL(file);
    });

    /* ========================================
       D. FUNGSI HAPUS FOTO
       ======================================== */

    /**
     * Fungsi untuk menghapus foto dari galeri
     * @param {number} id - ID foto yang akan dihapus
     */
    function deletePhoto(id) {
        // Konfirmasi hapus
        if (!confirm('Yakin ingin menghapus foto ini?')) {
            return;
        }

        // Filter data (hapus item dengan id yang sesuai)
        galleryData = galleryData.filter(item => item.id !== id);

        // Update localStorage
        localStorage.setItem('galleryData', JSON.stringify(galleryData));

        // Render ulang
        renderGallery();

        // Notifikasi
        showNotification('Foto berhasil dihapus!');
    }

    /* ========================================
       E. FUNGSI FILTER KATEGORI
       ======================================== */

    const tabButtons = document.querySelectorAll('.category-tab');

    /**
     * Fungsi untuk set kategori aktif dan filter galeri
     * @param {string} category - Kategori yang dipilih (makanan/minuman/suasana)
     */
    function setActiveCategory(category) {
        // Update state
        activeCategory = category;

        // Update UI tab
        tabButtons.forEach(btn => {
            if (btn.dataset.category === category) {
                btn.classList.add('category-tab--active');
            } else {
                btn.classList.remove('category-tab--active');
            }
        });

        // Render ulang galeri dengan filter baru
        renderGallery();
    }

    // Event listener untuk setiap tab
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            setActiveCategory(btn.dataset.category);
        });
    });

    /* ========================================
       F. TOGGLE SIDEBAR
       ======================================== */

    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    if (menuToggle && sidebar && overlay) {
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar--open');
            overlay.classList.toggle('overlay--visible');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        });
    }

    /* ========================================
       G. NOTIFICATION TOAST
       ======================================== */

    /**
     * Fungsi untuk menampilkan notifikasi toast
     * @param {string} message - Pesan yang ditampilkan
     * @param {string} type - Tipe notif: 'success' atau 'error'
     */
    function showNotification(message, type = 'success') {
        const notif = document.getElementById('notification');
        notif.textContent = message;
        notif.className = 'notification show';
        
        if (type === 'error') {
            notif.classList.add('error');
        }

        // Auto hide setelah 3 detik
        setTimeout(() => {
            notif.classList.remove('show');
        }, 3000);
    }

    /* ========================================
       H. HELPER FUNCTIONS
       ======================================== */

    /**
     * Capitalize first letter
     * @param {string} str
     * @returns {string}
     */
    function capitalizeFirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    /* ========================================
       I. INIT - RENDER PERTAMA KALI
       ======================================== */

    // Render galeri dengan kategori default (makanan)
    renderGallery();
</script>

</body>
</html>
