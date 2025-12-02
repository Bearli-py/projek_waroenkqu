{{-- 
========================================================
FILE   : resources/views/admin/kelola-menu.blade.php
HALAMAN: KELOLA MENU WAROENK QU (INTERACTIVE VERSION)
FITUR  : Tambah, Edit, Hapus dengan localStorage
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu - Waroenk Qu</title>

    <style>
        /* =========================================
           1. STYLE GLOBAL
           ========================================= */

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F5EDE1;
        }

        .page-container {
            min-height: 100vh;
        }

        /* =========================================
           2. OVERLAY & SIDEBAR
           ========================================= */

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
            gap: 0px;
            margin-bottom: -5px;
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
        }

        /* =========================================
           3. TOP BAR
           ========================================= */

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

        /* =========================================
           4. HEADER KELOLA MENU
           ========================================= */

        .menu-header {
            background-color: #F7F2E9;
            padding: 18px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .menu-header-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .menu-header-title {
            font-size: 18px;
            font-weight: 600;
            color: #B83939;
        }

        .menu-header-subtitle {
            font-size: 12px;
            color: #777;
        }

        .btn-add-menu {
            padding: 9px 18px;
            border-radius: 999px;
            border: none;
            background-color: #B83939;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 6px 18px rgba(184,57,57,0.35);
            transition: all 0.2s ease;
        }

        .btn-add-menu svg {
            width: 13px;
            height: 13px;
        }

        .btn-add-menu:hover {
            background-color: #982E2E;
            transform: translateY(-1px);
        }

        /* =========================================
           5. WRAPPER KONTEN
           ========================================= */

        .content-wrapper {
            max-width: 960px;
            margin: 18px auto 40px auto;
            padding: 0 16px;
        }

        /* =========================================
           6. FORM CARD
           ========================================= */

        .form-card {
            background-color: #FFFFFF;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
            padding: 18px 22px 20px;
            margin-bottom: 24px;
            display: none;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-card-title {
            font-size: 14px;
            font-weight: 600;
            color: #B83939;
            margin-bottom: 14px;
        }

        .form-row {
            display: flex;
            gap: 14px;
            margin-bottom: 12px;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #555;
        }

        .form-input,
        .form-select,
        .form-textarea {
            border-radius: 8px;
            border: 1px solid #DDD;
            padding: 9px 10px;
            font-size: 13px;
            outline: none;
            background-color: #F5F5F5;
            font-family: inherit;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #B83939;
            box-shadow: 0 0 0 2px rgba(184,57,57,0.18);
            background-color: #FFF;
        }

        .form-textarea {
            min-height: 80px;
            resize: vertical;
        }

        /* ✨ File input tersembunyi */
        #inputGambar {
            display: none;
        }

        .form-actions {
            margin-top: 8px;
            display: flex;
            gap: 10px;
        }

        .btn-save {
            padding: 7px 18px;
            border-radius: 999px;
            border: none;
            background-color: #35A854;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-cancel {
            padding: 7px 18px;
            border-radius: 999px;
            border: 1px solid #CCC;
            background-color: #F5F5F5;
            color: #555;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-save:hover {
            background-color: #2F9148;
            transform: translateY(-1px);
        }

        .btn-cancel:hover {
            background-color: #E3E3E3;
        }

        /* =========================================
           7. MENU CARD
           ========================================= */

        .menu-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .menu-card {
            background-color: #FFFFFF;
            border-radius: 18px;
            padding: 16px 20px 14px;
            box-shadow: 0 8px 18px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
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

        .menu-card-left {
            max-width: 70%;
        }

        .menu-name {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .menu-tag {
            display: inline-block;
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 999px;
            background-color: #E6E6E6;
            color: #555;
            margin-left: 6px;
        }

        .menu-desc {
            font-size: 12px;
            color: #777;
            margin-bottom: 6px;
        }

        .menu-price {
            font-size: 13px;
            font-weight: 600;
            color: #B83939;
        }

        .menu-card-actions {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .icon-button {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #EDF2FF;
            transition: all 0.2s ease;
        }

        .icon-button--edit svg {
            stroke: #395CFF;
        }

        .icon-button--delete {
            background-color: #FFECEC;
        }

        .icon-button--delete svg {
            stroke: #E04646;
        }

        .icon-button:hover {
            transform: scale(1.1);
        }

        .icon-button svg {
            width: 16px;
            height: 16px;
        }

        /* =========================================
           8. NOTIFICATION
           ========================================= */

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

        /* =========================================
           9. RESPONSIVE
           ========================================= */

        @media (max-width: 768px) {
            .menu-header,
            .top-bar {
                padding: 12px 16px;
            }

            .content-wrapper {
                padding: 0 12px;
            }

            .form-row {
                flex-direction: column;
            }

            .menu-card {
                flex-direction: column;
                gap: 10px;
            }

            .menu-card-left {
                max-width: 100%;
            }

            .menu-card-actions {
                flex-direction: row;
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

            <a href="{{ route('admin.menu') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/menu hitam.png') }}" class="sidebar-item-icon" alt="">
                <span>Menu</span>
            </a>

            <a href="{{ route('admin.galeri') }}" class="sidebar-item">
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

    {{-- HEADER KELOLA MENU --}}
    <section class="menu-header">
        <div class="menu-header-text">
            <div class="menu-header-title">Kelola Menu</div>
            <div class="menu-header-subtitle">Tambah, edit atau hapus item menu</div>
        </div>

        <button type="button" class="btn-add-menu" id="btnShowForm">
            <svg viewBox="0 0 24 24" fill="none">
                <path d="M12 5v14M5 12h14" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"/>
            </svg>
            Tambah Menu
        </button>
    </section>

    {{-- KONTEN UTAMA --}}
    <div class="content-wrapper">

        {{-- FORM TAMBAH/EDIT MENU --}}
        <section class="form-card" id="formCard">
            <div class="form-card-title" id="formTitle">Tambah Menu Baru</div>

            {{-- Hidden ID untuk tracking saat edit --}}
            <input type="hidden" id="editId">

            {{-- Baris 1: Nama & Kategori --}}
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nama Menu</label>
                    <input type="text" 
                           class="form-input" 
                           id="inputNama"
                           placeholder="Contoh: Kwetiau Goreng">
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" id="inputKategori">
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                </div>
            </div>

            {{-- Baris 2: Harga & Upload Gambar --}}
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" 
                           class="form-input" 
                           id="inputHarga"
                           placeholder="12000">
                </div>
                <div class="form-group">
                    <label class="form-label">Upload Gambar (Opsional)</label>
                    <input type="file" 
                           class="form-input"
                           id="inputGambar"
                           accept="image/*"
                           style="display:block; padding:6px;">
                </div>
            </div>

            {{-- Baris 3: Deskripsi --}}
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-textarea" 
                              id="inputDeskripsi"
                              placeholder="Deskripsi menu..."></textarea>
                </div>
            </div>

            {{-- Tombol Actions --}}
            <div class="form-actions">
                <button type="button" class="btn-save" id="btnSave">Simpan</button>
                <button type="button" class="btn-cancel" id="btnCancel">Batal</button>
            </div>
        </section>

        {{-- LIST MENU --}}
        <section class="menu-list" id="menuList">
            {{-- Akan di-render via JavaScript --}}
        </section>

    </div>
</div>

{{-- NOTIFICATION TOAST --}}
<div class="notification" id="notification"></div>

{{-- =========================================
     JAVASCRIPT - FULL INTERACTIVE
   ========================================= --}}
<script>
    /* ========================================
       A. DATA DEFAULT & localStorage INIT
       ======================================== */

    // Data default menu
    const defaultMenuData = [
        { id: 1, nama: 'Kopi', kategori: 'Minuman', harga: 4000, deskripsi: 'Perpaduan kopi dan susu yang creamy dan nikmat', gambar: null },
        { id: 2, nama: 'Nutrisari', kategori: 'Minuman', harga: 3000, deskripsi: 'Minuman jeruk instan dengan rasa segar dan kaya vitamin C', gambar: null },
        { id: 3, nama: 'Es Jeruk', kategori: 'Minuman', harga: 4000, deskripsi: 'Jeruk peras segar tanpa pengawet', gambar: null },
        { id: 4, nama: 'Es Teh', kategori: 'Minuman', harga: 3000, deskripsi: 'Teh manis segar untuk menemani makanan', gambar: null },
        { id: 5, nama: 'Lalapan Ayam', kategori: 'Makanan', harga: 12000, deskripsi: 'Ayam goreng renyah disajikan dengan sambal khas dan sayur lalapan', gambar: null },
        { id: 6, nama: 'Nasi Goreng', kategori: 'Makanan', harga: 12000, deskripsi: 'Nasi goreng spesial dengan bumbu tradisional', gambar: null },
        { id: 7, nama: 'Rawon Daging', kategori: 'Makanan', harga: 18000, deskripsi: 'Rawon dengan daging empuk dan bumbu khas', gambar: null },
        { id: 8, nama: 'Soto Ayam', kategori: 'Makanan', harga: 12000, deskripsi: 'Soto ayam dengan kuah bening yang segar', gambar: null },
        { id: 9, nama: 'Mie Goreng Jawa', kategori: 'Makanan', harga: 12000, deskripsi: 'Mie goreng dengan cita rasa khas Jawa', gambar: null },
        { id: 10, nama: 'Lalapan Telur', kategori: 'Makanan', harga: 10000, deskripsi: 'Nasi hangat dengan telur goreng, sambal pedas, dan lalapan segar', gambar: null }
    ];

    // Load dari localStorage atau pakai default
    let menuData = JSON.parse(localStorage.getItem('menuData')) || defaultMenuData;

    // Mode form: 'tambah' atau 'edit'
    let formMode = 'tambah';

    /* ========================================
       B. FUNGSI RENDER MENU LIST
       ======================================== */

    /**
     * Render semua menu ke dalam list
     */
    function renderMenuList() {
        const menuList = document.getElementById('menuList');
        menuList.innerHTML = '';

        if (menuData.length === 0) {
            menuList.innerHTML = '<p style="text-align:center; color:#999; padding:40px 0;">Belum ada menu. Tambahkan menu baru!</p>';
            return;
        }

        menuData.forEach(menu => {
            const article = document.createElement('article');
            article.className = 'menu-card';
            article.dataset.id = menu.id;

            article.innerHTML = `
                <div class="menu-card-left">
                    <div class="menu-name">
                        ${menu.nama}
                        <span class="menu-tag">${menu.kategori}</span>
                    </div>
                    <div class="menu-desc">${menu.deskripsi}</div>
                    <div class="menu-price">Rp. ${formatRupiah(menu.harga)}</div>
                </div>
                <div class="menu-card-actions">
                    <button type="button" class="icon-button icon-button--edit" onclick="editMenu(${menu.id})">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button type="button" class="icon-button icon-button--delete" onclick="deleteMenu(${menu.id})">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 7h14" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            `;

            menuList.appendChild(article);
        });
    }

    /* ========================================
       C. FUNGSI TAMBAH MENU
       ======================================== */

    const btnShowForm = document.getElementById('btnShowForm');
    const btnSave = document.getElementById('btnSave');
    const btnCancel = document.getElementById('btnCancel');
    const formCard = document.getElementById('formCard');
    const formTitle = document.getElementById('formTitle');

    // Tombol "Tambah Menu" → show form
    btnShowForm.addEventListener('click', () => {
        formMode = 'tambah';
        formTitle.textContent = 'Tambah Menu Baru';
        resetForm();
        formCard.style.display = 'block';
    });

    // Tombol "Batal" → hide form
    btnCancel.addEventListener('click', () => {
        formCard.style.display = 'none';
        resetForm();
    });

    // Tombol "Simpan" → tambah atau update menu
    btnSave.addEventListener('click', () => {
        const nama = document.getElementById('inputNama').value.trim();
        const kategori = document.getElementById('inputKategori').value;
        const harga = parseInt(document.getElementById('inputHarga').value) || 0;
        const deskripsi = document.getElementById('inputDeskripsi').value.trim();
        const fileInput = document.getElementById('inputGambar');

        // Validasi
        if (!nama) {
            showNotification('Nama menu tidak boleh kosong!', 'error');
            return;
        }

        if (harga <= 0) {
            showNotification('Harga harus lebih dari 0!', 'error');
            return;
        }

        // Cek apakah ada gambar yang diupload
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                saveMenuData(nama, kategori, harga, deskripsi, e.target.result);
            };

            reader.readAsDataURL(file);
        } else {
            saveMenuData(nama, kategori, harga, deskripsi, null);
        }
    });

    /**
     * Fungsi untuk menyimpan data menu (tambah atau edit)
     */
    function saveMenuData(nama, kategori, harga, deskripsi, gambar) {
        if (formMode === 'tambah') {
            // Tambah menu baru
            const newMenu = {
                id: Date.now(),
                nama,
                kategori,
                harga,
                deskripsi,
                gambar
            };

            menuData.push(newMenu);
            showNotification('Menu berhasil ditambahkan!');
        } else {
            // Edit menu existing
            const editId = parseInt(document.getElementById('editId').value);
            const menuIndex = menuData.findIndex(m => m.id === editId);

            if (menuIndex !== -1) {
                menuData[menuIndex] = {
                    ...menuData[menuIndex],
                    nama,
                    kategori,
                    harga,
                    deskripsi,
                    gambar: gambar || menuData[menuIndex].gambar
                };

                showNotification('Menu berhasil diupdate!');
            }
        }

        // Simpan ke localStorage
        localStorage.setItem('menuData', JSON.stringify(menuData));

        // Render ulang & tutup form
        renderMenuList();
        formCard.style.display = 'none';
        resetForm();
    }

    /* ========================================
       D. FUNGSI EDIT MENU
       ======================================== */

    /**
     * Fungsi untuk edit menu existing
     * @param {number} id - ID menu yang akan diedit
     */
    function editMenu(id) {
        const menu = menuData.find(m => m.id === id);

        if (!menu) {
            showNotification('Menu tidak ditemukan!', 'error');
            return;
        }

        // Set form mode ke edit
        formMode = 'edit';
        formTitle.textContent = 'Edit Menu';

        // Isi form dengan data existing
        document.getElementById('editId').value = menu.id;
        document.getElementById('inputNama').value = menu.nama;
        document.getElementById('inputKategori').value = menu.kategori;
        document.getElementById('inputHarga').value = menu.harga;
        document.getElementById('inputDeskripsi').value = menu.deskripsi;

        // Tampilkan form
        formCard.style.display = 'block';

        // Scroll ke form
        formCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    /* ========================================
       E. FUNGSI HAPUS MENU
       ======================================== */

    /**
     * Fungsi untuk hapus menu
     * @param {number} id - ID menu yang akan dihapus
     */
    function deleteMenu(id) {
        if (!confirm('Yakin ingin menghapus menu ini?')) {
            return;
        }

        // Filter (hapus menu dengan id yang sesuai)
        menuData = menuData.filter(m => m.id !== id);

        // Update localStorage
        localStorage.setItem('menuData', JSON.stringify(menuData));

        // Render ulang
        renderMenuList();

        // Notifikasi
        showNotification('Menu berhasil dihapus!');
    }

    /* ========================================
       F. HELPER FUNCTIONS
       ======================================== */

    /**
     * Reset form input
     */
    function resetForm() {
        document.getElementById('editId').value = '';
        document.getElementById('inputNama').value = '';
        document.getElementById('inputKategori').value = 'Makanan';
        document.getElementById('inputHarga').value = '';
        document.getElementById('inputDeskripsi').value = '';
        document.getElementById('inputGambar').value = '';
    }

    /**
     * Format angka ke format rupiah
     * @param {number} angka
     * @returns {string}
     */
    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    /**
     * Show notification toast
     * @param {string} message
     * @param {string} type - 'success' atau 'error'
     */
    function showNotification(message, type = 'success') {
        const notif = document.getElementById('notification');
        notif.textContent = message;
        notif.className = 'notification show';

        if (type === 'error') {
            notif.classList.add('error');
        }

        setTimeout(() => {
            notif.classList.remove('show');
        }, 3000);
    }

    /* ========================================
       G. TOGGLE SIDEBAR
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
       H. INIT - RENDER PERTAMA KALI
       ======================================== */

    renderMenuList();
</script>

</body>
</html>
