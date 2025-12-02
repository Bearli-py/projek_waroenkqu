{{-- 
========================================================
FILE   : resources/views/admin/kelola-testimoni.blade.php
HALAMAN: KELOLA TESTIMONI WAROENK QU (FULLY FUNCTIONAL)
FITUR  : 
- Tambah testimoni baru (langsung muncul di grid)
- Edit testimoni (klik icon pensil → isi form)
- Hapus testimoni (dengan konfirmasi)
- Data persistent dengan localStorage
- Rating bintang interaktif
========================================================
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Kelola Testimoni - Waroenk Qu Admin</title>

    <style>
        /* =========================================================
           SAMA SEPERTI SEBELUMNYA (CSS TIDAK BERUBAH)
           Copy semua CSS dari kode sebelumnya
           ========================================================= */
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F7EFDE;
            color: #333;
            line-height: 1.6;
        }

        .page-container {
            min-height: 100vh;
        }

        /* OVERLAY & SIDEBAR */
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
            width: 260px;
            background-color: #FFFFFF;
            box-shadow: 4px 0 20px rgba(0,0,0,0.12);
            display: flex;
            flex-direction: column;
            padding: 28px 24px;
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
            margin-bottom: 35px;
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
            font-weight: 500;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
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

        /* TOP BAR */
        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 36px;
            background-color: #FDF7EF;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .top-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .menu-button {
            border: none;
            background: transparent;
            padding: 8px;
            border-radius: 999px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .menu-button:hover {
            background-color: #F0E0CF;
        }

        .menu-icon {
            width: 22px;
            height: 22px;
            display: block;
        }

        .btn-logout {
            padding: 9px 20px;
            border-radius: 999px;
            border: 1px solid #B33939;
            background-color: #fff;
            color: #B33939;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: all 0.2s ease;
        }

        .btn-logout-icon {
            width: 15px;
            height: 15px;
            object-fit: contain;
        }

        .btn-logout:hover {
            background-color: #B33939;
            color: #fff;
        }

        /* HEADER SECTION */
        .testi-header {
            background-color: #F7F2E9;
            padding: 20px 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .testi-header-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .testi-header-title {
            font-size: 19px;
            font-weight: 600;
            color: #B83939;
        }

        .testi-header-subtitle {
            font-size: 12px;
            color: #777;
        }

        .btn-add-testi {
            padding: 10px 22px;
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
            box-shadow: 0 6px 20px rgba(184,57,57,0.35);
            transition: background-color 0.2s ease;
        }

        .btn-add-testi svg {
            width: 14px;
            height: 14px;
        }

        .btn-add-testi:hover {
            background-color: #982E2E;
        }

        /* CONTENT WRAPPER */
        .content-wrapper {
            max-width: 1200px;
            margin: 24px auto 50px auto;
            padding: 0 20px;
        }

        /* FORM CARD */
        .testi-form-card {
            background-color: #FFFFFF;
            border-radius: 22px;
            padding: 24px 26px 22px;
            box-shadow: 0 12px 32px rgba(0,0,0,0.10);
            margin-bottom: 24px;
        }

        .testi-form-title {
            font-size: 14px;
            font-weight: 600;
            color: #B83939;
            margin-bottom: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 18px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #555;
        }

        .form-input,
        .form-textarea {
            border-radius: 10px;
            border: 1px solid #DDD;
            padding: 10px 12px;
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
            outline: none;
            background-color: #F9F9F9;
            transition: all 0.2s ease;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-color: #B83939;
            box-shadow: 0 0 0 3px rgba(184,57,57,0.12);
            background-color: #FFF;
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* RATING BINTANG */
        .rating-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 18px;
        }

        .star-rating {
            display: flex;
            gap: 6px;
        }

        .star {
            font-size: 28px;
            color: #DDD;
            cursor: pointer;
            transition: color 0.15s ease, transform 0.1s ease;
            user-select: none;
        }

        .star.star--active {
            color: #F2C94C;
        }

        .star:hover {
            transform: scale(1.15);
        }

        /* TOMBOL AKSI */
        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        .btn-save {
            flex: 1;
            padding: 10px 20px;
            border-radius: 999px;
            border: none;
            background-color: #35A854;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-save:hover {
            background-color: #2F9148;
        }

        .btn-cancel {
            flex: 1;
            padding: 10px 20px;
            border-radius: 999px;
            border: 1px solid #CCC;
            background-color: #F5F5F5;
            color: #555;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-cancel:hover {
            background-color: #E3E3E3;
        }

        /* GRID CARD */
        .testi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .testi-card {
            background-color: #FFFFFF;
            border-radius: 20px;
            padding: 22px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            position: relative;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .testi-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
        }

        .testi-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .testi-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #D9D9D9;
            flex-shrink: 0;
            object-fit: cover;
        }

        .testi-info {
            flex: 1;
        }

        .testi-name {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 2px;
        }

        .testi-date {
            font-size: 11px;
            color: #999;
        }

        .testi-actions {
            position: absolute;
            top: 18px;
            right: 18px;
            display: flex;
            gap: 6px;
        }

        .icon-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s;
        }

        .icon-btn--edit {
            background-color: #EDF2FF;
        }

        .icon-btn--edit:hover {
            background-color: #D9E4FF;
        }

        .icon-btn--delete {
            background-color: #FFECEC;
        }

        .icon-btn--delete:hover {
            background-color: #FFD6D6;
        }

        .icon-btn svg {
            width: 16px;
            height: 16px;
        }

        .testi-rating {
            display: flex;
            gap: 3px;
            margin-bottom: 10px;
        }

        .testi-rating .star {
            font-size: 16px;
            cursor: default;
        }

        .testi-text {
            font-size: 13px;
            color: #555;
            line-height: 1.7;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .testi-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .top-bar,
            .testi-header {
                padding: 14px 20px;
            }

            .content-wrapper {
                padding: 0 16px;
            }

            .testi-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="overlay" id="overlay"></div>

<div class="page-container">

    {{-- SIDEBAR (SAMA SEPERTI SEBELUMNYA) --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo1.png') }}" 
                     alt="Logo Waroenk Qu" 
                     class="sidebar-logo-icon">
            </div>
            <div class="sidebar-logo-subtitle">Admin Panel</div>
        </div>

        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/overview.png') }}" 
                     class="sidebar-item-icon" alt="Overview">
                <span>Overview</span>
            </a>
            <a href="{{ route('admin.menu') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/menu hitam.png') }}" 
                     class="sidebar-item-icon" alt="Menu">
                <span>Menu</span>
            </a>
            <a href="{{ route('admin.galeri') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/galeri hitam.png') }}" 
                     class="sidebar-item-icon" alt="Galeri">
                <span>Galeri</span>
            </a>
            <a href="{{ route('admin.testimoni') }}" class="sidebar-item sidebar-item--active">
                <img src="{{ asset('images/icon/testi hitam.png') }}" 
                     class="sidebar-item-icon" alt="Testimoni">
                <span>Testimoni</span>
            </a>
            <a href="{{ route('admin.tentang') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/tentang-hitam.png') }}" 
                     class="sidebar-item-icon" alt="Tentang">
                <span>Tentang</span>
            </a>
            <a href="{{ route('admin.kontak') }}" class="sidebar-item">
                <img src="{{ asset('images/icon/kontak hitam.png') }}" 
                     class="sidebar-item-icon" alt="Kontak">
                <span>Kontak</span>
            </a>
        </nav>
    </aside>

    {{-- TOP BAR --}}
    <header class="top-bar">
        <div class="top-left">
            <button type="button" class="menu-button" id="menuToggle">
                <img src="{{ asset('images/icon/overview.png') }}" 
                     alt="Menu" 
                     class="menu-icon">
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

    {{-- HEADER SECTION --}}
    <section class="testi-header">
        <div class="testi-header-text">
            <div class="testi-header-title">Kelola Testimoni</div>
            <div class="testi-header-subtitle">
                Tambah, edit atau hapus testimoni pelanggan
            </div>
        </div>

        <button type="button" class="btn-add-testi" id="btnShowModal">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M12 5v14M5 12h14" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
            Tambah Testimoni
        </button>
    </section>

    {{-- CONTENT WRAPPER --}}
    <div class="content-wrapper">

        {{-- FORM CARD (Awalnya hidden) --}}
        <section class="testi-form-card" id="testiFormCard" style="display: none;">
            <div class="testi-form-title" id="formTitle">Tambah Testimoni Baru</div>

            {{-- Hidden input untuk menyimpan ID (digunakan saat edit) --}}
            <input type="hidden" id="editingId" value="">

            <div class="form-group">
                <label class="form-label">Nama Pelanggan</label>
                <input type="text" 
                       class="form-input" 
                       id="inputNama"
                       placeholder="Nama lengkap">
            </div>

            <div class="rating-group">
                <label class="form-label">Rating</label>
                <div class="star-rating" id="starRating">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Testimoni</label>
                <textarea class="form-textarea" 
                          id="inputTestimoni"
                          placeholder="Tulis testimoni pelanggan..."></textarea>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn-save" id="btnSave">
                    Simpan
                </button>
                <button type="button" class="btn-cancel" id="btnCancelForm">
                    Batal
                </button>
            </div>
        </section>

        {{-- GRID TESTIMONI (Di-render via JavaScript) --}}
        <section class="testi-grid" id="testiGrid">
            {{-- Card akan di-generate otomatis dari JavaScript --}}
        </section>

    </div>
</div>

{{-- ============================================
     JAVASCRIPT FULL FUNCTIONAL
     ============================================ --}}
<script>
    /* ========================================
       A. DATA DEFAULT & INIT
       ======================================== */

    /**
     * Data default testimoni (12 testimoni)
     * Struktur: { id, nama, rating, testimoni, tanggal }
     */
    const defaultTestimoni = [
        { id: 1, nama: 'Rudi Santoso', rating: 5, testimoni: 'Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi kesini.', tanggal: '2 minggu yang lalu' },
        { id: 2, nama: 'Vina Setiawan', rating: 4, testimoni: 'Tempatnya cozy, pelayanan ramah. Rawonnya juara! Rasa bumbunya nempel di lidah, bikin nagih terus. Pasti balik lagi kesini.', tanggal: '2 hari yang lalu' },
        { id: 3, nama: 'Riana Fitri', rating: 4, testimoni: 'Recommended! Menu variatif, porsi pas, dan yang penting rasanya mantap. Jadi langganan deh, cocok buat makan siang bareng teman.', tanggal: '3 hari yang lalu' },
        { id: 4, nama: 'Raya Wilianto', rating: 5, testimoni: 'Waroenk Qu ini hidden gem! Soto ayamnya enak banget, kuahnya seger. Tempatnya juga nyaman buat makan sama keluarga.', tanggal: '5 hari yang lalu' },
        { id: 5, nama: 'Siti Nurjanah', rating: 4, testimoni: 'Pertama kali coba langsung jatuh cinta! Nasi gorengnya juara, bumbunya meresap sempurna. Harganya affordable banget.', tanggal: '1 minggu yang lalu' },
        { id: 6, nama: 'Hendra Alfica', rating: 3, testimoni: 'Lalapan ayamnya mantap! Ayamnya crispy, sambalnya pedas pas. Setiap hari kerja pasti mampir kesini buat makan siang.', tanggal: '1 minggu yang lalu' },
        { id: 7, nama: 'Maya Sari', rating: 3, testimoni: 'Pelayanannya cepat dan ramah. Menu-menunya enak semua, terutama mie goreng Jawanya. Jadi tempat favorit buat nongkrong.', tanggal: '1 minggu yang lalu' },
        { id: 8, nama: 'Budi Prasetyo', rating: 5, testimoni: 'Gudeg-nya mantap! Rasanya manis gurih, empuk banget. Bikin kangen kampung halaman. Harus coba kalau ke Jogja.', tanggal: '2 minggu yang lalu' },
        { id: 9, nama: 'Lina Wati', rating: 4, testimoni: 'Sate ayamnya enak, bumbunya meresap. Harga terjangkau, porsi banyak. Cocok buat makan berdua atau sendiri.', tanggal: '2 minggu yang lalu' },
        { id: 10, nama: 'Andi Susanto', rating: 5, testimoni: 'Gado-gadonya segar banget! Sayurnya fresh, bumbunya pas. Tempatnya bersih dan nyaman. Recommended!', tanggal: '3 minggu yang lalu' },
        { id: 11, nama: 'Dewi Kusuma', rating: 4, testimoni: 'Nasi uduk pagi-pagi di sini jadi ritual! Lauk-lauknya lengkap, rasanya autentik. Harga ramah kantong.', tanggal: '3 minggu yang lalu' },
        { id: 12, nama: 'Agus Setiawan', rating: 5, testimoni: 'Pecel lelenya juara! Sambalnya pedasnya pas, ikannya segar. Pelayanan juga cepat. Bakal balik lagi pasti!', tanggal: '1 bulan yang lalu' }
    ];

    /**
     * Load data dari localStorage, jika kosong pakai default
     */
    let testimoniData = JSON.parse(localStorage.getItem('testimoniData')) || defaultTestimoni;

    /**
     * Variabel untuk star rating
     */
    let selectedRating = 0;

    /**
     * Variabel untuk mode edit (menyimpan ID testimoni yang sedang diedit)
     */
    let editingId = null;

    /* ========================================
       B. RENDER TESTIMONI KE GRID
       ======================================== */

    /**
     * Fungsi untuk render semua testimoni ke grid
     * Loop array testimoniData, generate HTML card untuk setiap testimoni
     */
    function renderTestimoni() {
        const grid = document.getElementById('testiGrid');
        
        // Kosongkan grid terlebih dahulu
        grid.innerHTML = '';

        // Loop setiap testimoni dalam array
        testimoniData.forEach(testi => {
            // Buat elemen article untuk card
            const card = document.createElement('article');
            card.className = 'testi-card';
            
            // Generate HTML bintang rating (sesuai dengan rating testimoni)
            let starsHTML = '';
            for (let i = 1; i <= 5; i++) {
                const activeClass = i <= testi.rating ? 'star--active' : '';
                starsHTML += `<span class="star ${activeClass}">★</span>`;
            }

            // Set innerHTML card
            card.innerHTML = `
                <div class="testi-card-header">
                    <img src="{{ asset('images/icon/user.png') }}" 
                        alt="User" 
                        class="testi-avatar">
                    <div class="testi-info">
                        <div class="testi-name">${testi.nama}</div>
                        <div class="testi-date">${testi.tanggal}</div>
                    </div>
                </div>

                <div class="testi-actions">
                    <button type="button" class="icon-btn icon-btn--edit" onclick="editTestimoni(${testi.id})">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#395CFF">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button type="button" class="icon-btn icon-btn--delete" onclick="deleteTestimoni(${testi.id})">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04646">
                            <path d="M5 7h14M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="testi-rating">
                    ${starsHTML}
                </div>

                <div class="testi-text">
                    ${testi.testimoni}
                </div>
            `;

            // Append card ke grid
            grid.appendChild(card);
        });
    }

    /* ========================================
       C. TOGGLE SIDEBAR
       ======================================== */

    const menuToggle = document.getElementById('menuToggle');
    const sidebar    = document.getElementById('sidebar');
    const overlay    = document.getElementById('overlay');

    if (menuToggle && sidebar && overlay) {
        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('sidebar--open');
            overlay.classList.toggle('overlay--visible');
        });

        overlay.addEventListener('click', function () {
            sidebar.classList.remove('sidebar--open');
            overlay.classList.remove('overlay--visible');
        });
    }

    /* ========================================
       D. TOGGLE FORM TAMBAH/EDIT
       ======================================== */

    const btnShowModal   = document.getElementById('btnShowModal');
    const btnCancelForm  = document.getElementById('btnCancelForm');
    const testiFormCard  = document.getElementById('testiFormCard');
    const formTitle      = document.getElementById('formTitle');

    if (btnShowModal && testiFormCard) {
        btnShowModal.addEventListener('click', function () {
            if (testiFormCard.style.display === 'none' || testiFormCard.style.display === '') {
                // Mode tambah baru
                editingId = null;
                formTitle.textContent = 'Tambah Testimoni Baru';
                testiFormCard.style.display = 'block';
                window.scrollTo({ top: testiFormCard.offsetTop - 80, behavior: 'smooth' });
            } else {
                testiFormCard.style.display = 'none';
                resetForm();
            }
        });
    }

    if (btnCancelForm && testiFormCard) {
        btnCancelForm.addEventListener('click', function () {
            testiFormCard.style.display = 'none';
            resetForm();
        });
    }

    /* ========================================
       E. STAR RATING INTERAKTIF
       ======================================== */

    const starRating = document.getElementById('starRating');
    const stars      = starRating.querySelectorAll('.star');

    stars.forEach(function (star, index) {
        star.addEventListener('mouseenter', function () {
            highlightStars(index + 1);
        });

        star.addEventListener('click', function () {
            selectedRating = index + 1;
            highlightStars(selectedRating);
        });
    });

    starRating.addEventListener('mouseleave', function () {
        highlightStars(selectedRating);
    });

    function highlightStars(count) {
        stars.forEach(function (star, index) {
            if (index < count) {
                star.classList.add('star--active');
            } else {
                star.classList.remove('star--active');
            }
        });
    }

    /* ========================================
       F. SIMPAN TESTIMONI (TAMBAH/EDIT)
       ======================================== */

    const btnSave = document.getElementById('btnSave');
    if (btnSave) {
        btnSave.addEventListener('click', function () {
            const nama       = document.getElementById('inputNama').value.trim();
            const testimoni  = document.getElementById('inputTestimoni').value.trim();

            // Validasi
            if (!nama || !testimoni || selectedRating === 0) {
                alert('Harap isi semua field dan pilih rating!');
                return;
            }

            if (editingId !== null) {
                // MODE EDIT: Update testimoni yang sudah ada
                const index = testimoniData.findIndex(t => t.id === editingId);
                if (index !== -1) {
                    testimoniData[index].nama = nama;
                    testimoniData[index].rating = selectedRating;
                    testimoniData[index].testimoni = testimoni;
                }
                alert('Testimoni berhasil diupdate!');
            } else {
                // MODE TAMBAH: Buat testimoni baru
                const newId = Math.max(...testimoniData.map(t => t.id), 0) + 1;  // Auto-increment ID
                const newTestimoni = {
                    id: newId,
                    nama: nama,
                    rating: selectedRating,
                    testimoni: testimoni,
                    tanggal: 'Baru saja'
                };
                testimoniData.push(newTestimoni);  // Tambah ke array
                alert('Testimoni berhasil ditambahkan!');
            }

            // Simpan ke localStorage
            localStorage.setItem('testimoniData', JSON.stringify(testimoniData));

            // Render ulang grid
            renderTestimoni();

            // Sembunyikan form & reset
            testiFormCard.style.display = 'none';
            resetForm();
        });
    }

    /* ========================================
       G. EDIT TESTIMONI
       ======================================== */

    /**
     * Fungsi untuk edit testimoni
     * - Cari data testimoni by ID
     * - Isi form dengan data tersebut
     * - Set mode edit (editingId)
     */
    function editTestimoni(id) {
        const testi = testimoniData.find(t => t.id === id);
        if (!testi) {
            alert('Testimoni tidak ditemukan!');
            return;
        }

        // Set mode edit
        editingId = id;
        formTitle.textContent = 'Edit Testimoni';

        // Isi form dengan data testimoni
        document.getElementById('inputNama').value = testi.nama;
        document.getElementById('inputTestimoni').value = testi.testimoni;
        selectedRating = testi.rating;
        highlightStars(selectedRating);

        // Tampilkan form
        testiFormCard.style.display = 'block';
        window.scrollTo({ top: testiFormCard.offsetTop - 80, behavior: 'smooth' });
    }

    /* ========================================
       H. HAPUS TESTIMONI
       ======================================== */

    /**
     * Fungsi untuk hapus testimoni
     * - Konfirmasi user
     * - Hapus dari array
     * - Simpan ke localStorage
     * - Render ulang
     */
    function deleteTestimoni(id) {
        const confirmed = confirm('Yakin ingin menghapus testimoni ini?');
        if (confirmed) {
            // Filter array (hapus item dengan id yang cocok)
            testimoniData = testimoniData.filter(t => t.id !== id);
            
            // Simpan ke localStorage
            localStorage.setItem('testimoniData', JSON.stringify(testimoniData));
            
            // Render ulang
            renderTestimoni();
            
            alert('Testimoni berhasil dihapus!');
        }
    }

    /* ========================================
       I. RESET FORM
       ======================================== */

    /**
     * Fungsi untuk reset form
     * Kosongkan semua input dan reset rating
     */
    function resetForm() {
        document.getElementById('inputNama').value = '';
        document.getElementById('inputTestimoni').value = '';
        selectedRating = 0;
        highlightStars(0);
        editingId = null;
        formTitle.textContent = 'Tambah Testimoni Baru';
    }

    /* ========================================
       J. INIT - RENDER PERTAMA KALI
       ======================================== */

    /**
     * Render testimoni saat halaman pertama kali dimuat
     */
    renderTestimoni();
</script>

</body>
</html>
