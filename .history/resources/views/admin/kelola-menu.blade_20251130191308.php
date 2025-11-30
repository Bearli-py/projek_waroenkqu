{{-- 
========================================================
FILE   : resources/views/admin/kelola-menu.blade.php
HALAMAN: KELOLA MENU WAROENK QU
DESAIN : Sesuai mockup (header cream, tombol +, form toggle, list card)
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
            background-color: #F5EDE1;      /* krem lembut */
        }

        .page-container {
            min-height: 100vh;
        }

        /* =========================================
           2. TOP BAR (ICON MENU + KELUAR)
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
            border: 1px solid #B83939;
            background-color: #fff;
            color: #B83939;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-logout:hover {
            background-color: #B83939;
            color: #fff;
        }

        /* =========================================
           3. HEADER KELOLA MENU
           ========================================= */

        .menu-header {
            background-color: #F7F2E9;          /* cream seperti desain */
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

        /* Tombol + Tambah Menu */
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
        }

        .btn-add-menu svg {
            width: 13px;
            height: 13px;
        }

        .btn-add-menu:hover {
            background-color: #982E2E;
        }

        /* =========================================
           4. WRAPPER KONTEN
           ========================================= */

        .content-wrapper {
            max-width: 960px;
            margin: 18px auto 40px auto;
            padding: 0 16px;
        }

        /* =========================================
           5. FORM TAMBAH MENU (CARD PUTIH)
           ========================================= */

        .form-card {
            background-color: #FFFFFF;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
            padding: 18px 22px 20px;
            margin-bottom: 24px;
            display: none;                      /* AWAL: disembunyikan, baru muncul saat klik Tambah Menu */
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

        .form-actions {
            margin-top: 8px;
            display: flex;
            gap: 10px;
        }

        .btn-save {
            padding: 7px 18px;
            border-radius: 999px;
            border: none;
            background-color: #35A854;         /* hijau */
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
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
        }

        .btn-save:hover { background-color: #2F9148; }
        .btn-cancel:hover { background-color: #E3E3E3; }

        /* =========================================
           6. CARD LIST MENU
           ========================================= */

        .menu-card {
            background-color: #FFFFFF;
            border-radius: 18px;
            padding: 16px 20px 14px;
            box-shadow: 0 8px 18px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 14px;
        }

        .menu-card-left {
            max-width: 70%;
        }

        .menu-name {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        /* Tag kategori abu */
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

        /* Tombol ikon edit & hapus */
        .icon-button {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #EDF2FF;   /* biru muda untuk edit */
        }

        .icon-button--edit svg {
            stroke: #395CFF;
        }

        .icon-button--delete {
            background-color: #FFECEC;  /* merah muda untuk hapus */
        }

        .icon-button--delete svg {
            stroke: #E04646;
        }

        .icon-button svg {
            width: 16px;
            height: 16px;
        }

        /* =========================================
           7. RESPONSIVE
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
<div class="page-container">

    {{-- TOP BAR: icon menu + tombol keluar --}}
    <header class="top-bar">
        <div class="top-left">
            {{-- ICON MENU (sidebar toggle) --}}
            <button type="button" class="menu-button" id="menuToggle">
                {{-- pakai icon menu.png dari public/images/icon/menu.png --}}
                <img src="{{ asset('images/icon/overview.png') }}" alt="Menu" class="menu-icon">
            </button>
        </div>

        {{-- Tombol Keluar --}}
        <form method="POST" action="#">
            @csrf
            <button type="submit" class="btn-logout">
                {{-- contoh icon keluar sederhana (optional) --}}
                <img src="{{ asset('images/icon/logout.png') }}" alt="Menu" class="menu-icon">
            </button>
        </form>
    </header>

    {{-- HEADER KELOLA MENU --}}
    <section class="menu-header">
        <div class="menu-header-text">
            <div class="menu-header-title">Kelola Menu</div>
            <div class="menu-header-subtitle">Tambah, edit atau hapus item menu</div>
        </div>

        {{-- Tombol + Tambah Menu: akan menampilkan / menyembunyikan form --}}
        <button type="button" class="btn-add-menu" id="btnShowForm">
            {{-- SVG ikon plus (dibuat manual) --}}
            <svg viewBox="0 0 24 24" fill="none">
                <path d="M12 5v14M5 12h14" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"/>
            </svg>
            Tambah Menu
        </button>
    </section>

    {{-- WRAPPER KONTEN --}}
    <div class="content-wrapper">

        {{-- FORM TAMBAH MENU (tampil setelah klik Tambah Menu) --}}
        <section class="form-card" id="formCard">
            <div class="form-card-title">Tambah Menu Baru</div>

            {{-- Baris 1: Nama Menu & Kategori --}}
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nama Menu</label>
                    <input type="text" class="form-input" placeholder="Contoh: Kwetiau Goreng">
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select class="form-select">
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </div>
            </div>

            {{-- Baris 2: Harga & Upload Gambar --}}
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Harga</label>
                    <input type="text" class="form-input" placeholder="Rp12.000">
                </div>
                <div class="form-group">
                    <label class="form-label">Upload Gambar</label>
                    <input type="file" class="form-input">
                </div>
            </div>

            {{-- Baris 3: Deskripsi --}}
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-textarea" placeholder="Deskripsi menu.."></textarea>
                </div>
            </div>

            {{-- Tombol Simpan & Batal --}}
            <div class="form-actions">
                <button type="button" class="btn-save">Simpan</button>
                <button type="button" class="btn-cancel" id="btnCancelForm">Batal</button>
            </div>
        </section>

        {{-- LIST MENU (card item) - contoh data statis --}}
        <section>
            {{-- Card 1 --}}
            <article class="menu-card">
                <div class="menu-card-left">
                    <div class="menu-name">
                        Kopi
                        <span class="menu-tag">Minuman</span>
                    </div>
                    <div class="menu-desc">
                        Perpaduan kopi dan susu yang creamy dan nikmat
                    </div>
                    <div class="menu-price">Rp. 4.000</div>
                </div>
                <div class="menu-card-actions">
                    {{-- Tombol Edit memanggil fungsi editMenu(id) --}}
                    <button type="button" class="icon-button icon-button--edit"
                            onclick="editMenu(1)">
                        {{-- SVG ikon edit (pensil) --}}
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>

                    {{-- Tombol Hapus memanggil fungsi deleteMenu(id) --}}
                    <button type="button" class="icon-button icon-button--delete"
                            onclick="deleteMenu(1)">
                        {{-- SVG ikon trash --}}
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 7h14" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </article>

            {{-- Card lainnya tinggal duplikasi dan ganti data --}}
            <article class="menu-card">
                <div class="menu-card-left">
                    <div class="menu-name">
                        Nasi Goreng
                        <span class="menu-tag">Makanan</span>
                    </div>
                    <div class="menu-desc">
                        Nasi goreng spesial dengan bumbu tradisional.
                    </div>
                    <div class="menu-price">Rp. 12.000</div>
                </div>
                <div class="menu-card-actions">
                    <button type="button" class="icon-button icon-button--edit"
                            onclick="editMenu(2)">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M4 20h4l9-9-4-4-9 9v4z" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M13 5l4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <button type="button" class="icon-button icon-button--delete"
                            onclick="deleteMenu(2)">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 7h14" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M10 11v6M14 11v6" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M9 7l1-2h4l1 2" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8 7h8v11a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V7z" stroke-width="1.8" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </article>
        </section>
    </div>
</div>

{{-- =========================================
    8. JAVASCRIPT
    - Toggle form tambah menu
    - Placeholder fungsi edit & delete
   ========================================= --}}
<script>
    // Ambil elemen tombol & form
    const btnShowForm = document.getElementById('btnShowForm');
    const btnCancel   = document.getElementById('btnCancelForm');
    const formCard    = document.getElementById('formCard');

    // Tampilkan / sembunyikan form saat "Tambah Menu" diklik
    btnShowForm.addEventListener('click', function () {
        // Kalau form sedang tersembunyi → tampilkan, kalau sudah tampil → sembunyikan
        if (formCard.style.display === 'none' || formCard.style.display === '') {
            formCard.style.display = 'block';
        } else {
            formCard.style.display = 'none';
        }
    });

    // Tombol Batal pada form → sembunyikan form lagi
    btnCancel.addEventListener('click', function () {
        formCard.style.display = 'none';
    });

    // Placeholder fungsi Edit (nanti diganti logika asli)
    function editMenu(id) {
        console.log('Edit menu dengan ID:', id);
        // Di sini nanti kamu bisa redirect ke halaman edit atau isi form dengan data menu
    }

    // Placeholder fungsi Delete (nanti diganti logika asli)
    function deleteMenu(id) {
        console.log('Hapus menu dengan ID:', id);
        // Di sini nanti kamu bisa munculkan konfirmasi & kirim request delete ke server
    }
</script>
</body>
</html>