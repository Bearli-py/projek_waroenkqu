<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Waroenk Qu</title>

    <style>
        /* =========================================================
           RESET & BASE STYLES
           ========================================================= */
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Background cream & konten di tengah layar */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FAF3E0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* =========================================================
           WRAPPER JUDUL + CARD
           ========================================================= */
        
        .page-wrapper {
            width: 100%;
            max-width: 1100px;
        }

        /* =========================================================
           BRAND HEADER (JUDUL + TAGLINE DI ATAS CARD)
           ========================================================= */
        
        .brand-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            letter-spacing: 2px;
            margin: 0 0 6px 0;
            color: #3E2723;
        }

        .brand-tagline {
            margin: 0;
            font-size: 14px;
            color: #777;
        }

        .brand-tagline span {
            color: #B33939;
            font-weight: 600;
        }

        /* =========================================================
           CARD LOGIN (KIRI: FORM, KANAN: FOTO)
           ========================================================= */
        
        .login-card {
            display: flex;
            background-color: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.18);
            overflow: hidden;
        }

        /* Sisi kiri: form login */
        .login-left {
            flex: 1;
            padding: 32px 36px;
        }

        /* Sisi kanan: foto */
        .login-right {
            flex: 1;
            min-width: 0;
            background: linear-gradient(135deg, #B33939 0%, #8f2e2e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-right img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        /* Placeholder jika tidak ada foto */
        .login-right-placeholder {
            color: rgba(255,255,255,0.3);
            text-align: center;
            padding: 40px;
            font-size: 14px;
        }

        /* =========================================================
           PANEL TITLE (ADMIN PANEL + SUBTITLE)
           ========================================================= */
        
        .panel-title {
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            margin-bottom: 4px;
            color: #3E2723;
        }

        .panel-subtitle {
            font-size: 12px;
            color: #777;
            text-align: center;
            margin-bottom: 24px;
        }

        /* =========================================================
           FORM LOGIN
           ========================================================= */
        
        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #555;
        }

        .form-input {
            width: 100%;
            padding: 9px 11px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 13px;
            outline: none;
            font-family: 'Poppins', sans-serif;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            border-color: #B33939;
            box-shadow: 0 0 0 2px rgba(179,57,57,0.15);
        }

        /* =========================================================
           BUTTON SUBMIT (MASUK)
           ========================================================= */
        
        .btn-submit {
            width: 100%;
            border: none;
            margin-top: 6px;
            padding: 10px 0;
            border-radius: 6px;
            background-color: #B33939;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: 'Poppins', sans-serif;
        }

        .btn-submit:hover {
            background-color: #8f2e2e;
            box-shadow: 0 6px 14px rgba(179,57,57,0.35);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit:disabled {
            background-color: #CCC;
            cursor: not-allowed;
            transform: none;
        }

        /* =========================================================
           ALERT MESSAGE (ERROR/SUCCESS)
           ========================================================= */
        
        .login-alert {
            padding: 10px 12px;
            border-radius: 6px;
            font-size: 12px;
            margin-bottom: 16px;
            display: none;
            text-align: center;
        }

        .login-alert.show {
            display: block;
        }

        .login-alert.error {
            background-color: #FFEBEE;
            color: #C62828;
            border: 1px solid #EF5350;
        }

        .login-alert.success {
            background-color: #E8F5E9;
            color: #2E7D32;
            border: 1px solid #66BB6A;
        }

        /* =========================================================
           DIVIDER "ATAU"
           ========================================================= */
        
        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
            color: #999;
            font-size: 12px;
            font-weight: 500;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            width: 42%;
            height: 1px;
            background-color: #E0E0E0;
        }

        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 0;
            width: 42%;
            height: 1px;
            background-color: #E0E0E0;
        }

        /* =========================================================
           BUTTON KEMBALI
           ========================================================= */
        
        .btn-back {
            width: 100%;
            padding: 10px 0;
            font-size: 14px;
            font-weight: 600;
            color: #B33939;
            background-color: transparent;
            border: 2px solid #B33939;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-back:hover {
            background-color: #B33939;
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(179,57,57,0.35);
        }

        .btn-back:active {
            transform: translateY(0);
        }

        .btn-back svg {
            width: 16px;
            height: 16px;
        }

        /* =========================================================
           RESPONSIVE DESIGN (MOBILE)
           ========================================================= */
        
        @media (max-width: 768px) {
            body {
                align-items: flex-start;
                padding-top: 40px;
            }

            .page-wrapper {
                max-width: 95%;
            }

            .login-card {
                flex-direction: column;
            }

            .login-right {
                height: 220px;
            }

            .btn-back {
                font-size: 13px;
                padding: 9px 0;
            }

            .brand-title {
                font-size: 22px;
            }
        }

        /* =========================================================
           ANIMATION (FADE IN SAAT PAGE LOAD)
           ========================================================= */
        
        .page-wrapper {
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        
        {{-- ===== BRAND HEADER ===== --}}
        <div class="brand-header">
            <div class="brand-title">WAROENK QU</div>
            <p class="brand-tagline">
                Cita Rasa Autentik, <span>Harga Bersahabat</span>
            </p>
        </div>

        {{-- ===== CARD LOGIN ===== --}}
        <div class="login-card">
            
            {{-- SISI KIRI: FORM --}}
            <div class="login-left">
                <div class="panel-title">Admin Panel</div>
                <div class="panel-subtitle">Sistem Manajemen Waroenk Qu</div>

                {{-- Alert Message (Error/Success) --}}
                <div class="login-alert" id="alertBox"></div>

                {{-- Form Login --}}
                <form id="loginForm">
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="form-input"
                            placeholder="Masukkan username"
                            required
                            autocomplete="username">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password">
                    </div>

                    <button type="submit" class="btn-submit" id="btnSubmit">
                        Masuk
                    </button>
                </form>

                {{-- Divider --}}
                <div class="divider">atau</div>

                {{-- Button Kembali --}}
                <a href="index.html" class="btn-back" id="btnBack">
                    {{-- Icon Arrow Left --}}
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M19 12H5M5 12L12 19M5 12L12 5" 
                              stroke-width="2.5" 
                              stroke-linecap="round" 
                              stroke-linejoin="round"/>
                    </svg>
                    Kembali ke Halaman Utama
                </a>
            </div>

            {{-- SISI KANAN: FOTO --}}
            <div class="login-right">
                {{-- Ganti src dengan path foto kamu --}}
                {{-- <img src="images/warung/dalam2.png" alt="Suasana Waroenk Qu"> --}}
                
                {{-- Placeholder jika tidak ada foto --}}
                <div class="login-right-placeholder">
                    <p>📸</p>
                    <p>Foto Suasana<br>Waroenk Qu</p>
                </div>
            </div>

        </div>
    </div>

    {{-- =========================================================
         JAVASCRIPT - LOGIC LOGIN & ROUTING
         ========================================================= --}}
    <script>
        /* ========================================
           KONFIGURASI ADMIN CREDENTIALS
           (Hardcoded untuk demo - production pakai backend)
           ======================================== */
        
        const ADMIN_CREDENTIALS = {
            username: 'admin',
            password: 'admin123'
        };

        /* ========================================
           ROUTING CONFIGURATION
           (URL yang akan di-redirect setelah login)
           ======================================== */
        
        const ROUTES = {
            home: 'index.html',                 // Halaman user (beranda)
            dashboard: 'admin-dashboard.html'   // Dashboard admin
        };

        /* ========================================
           ELEMEN DOM
           ======================================== */
        
        const loginForm = document.getElementById('loginForm');
        const alertBox = document.getElementById('alertBox');
        const btnSubmit = document.getElementById('btnSubmit');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');

        /* ========================================
           FUNCTION: SHOW ALERT
           Menampilkan pesan error/success
           ======================================== */
        
        function showAlert(message, type = 'error') {
            alertBox.textContent = message;
            alertBox.className = `login-alert ${type} show`;
            
            // Auto hide setelah 5 detik
            setTimeout(() => {
                alertBox.classList.remove('show');
            }, 5000);
        }

        /* ========================================
           FUNCTION: VALIDATE LOGIN
           Validasi username & password
           ======================================== */
        
        function validateLogin(username, password) {
            if (!username || !password) {
                return {
                    valid: false,
                    message: 'Username dan password harus diisi!'
                };
            }

            if (username !== ADMIN_CREDENTIALS.username || 
                password !== ADMIN_CREDENTIALS.password) {
                return {
                    valid: false,
                    message: 'Username atau password salah!'
                };
            }

            return {
                valid: true,
                message: 'Login berhasil!'
            };
        }

        /* ========================================
           FUNCTION: HANDLE LOGIN
           Proses login saat form di-submit
           ======================================== */
        
        function handleLogin(event) {
            event.preventDefault();  // Prevent form submit default

            // Ambil nilai input
            const username = usernameInput.value.trim();
            const password = passwordInput.value.trim();

            // Validasi
            const validation = validateLogin(username, password);

            if (!validation.valid) {
                // Tampilkan error
                showAlert(validation.message, 'error');
                
                // Shake animation untuk input
                loginForm.style.animation = 'shake 0.5s';
                setTimeout(() => {
                    loginForm.style.animation = '';
                }, 500);
                
                return;
            }

            // Login berhasil
            showAlert(validation.message, 'success');

            // Disable button & tampilkan loading
            btnSubmit.disabled = true;
            btnSubmit.textContent = 'Memproses...';

            // Simpan session (pakai localStorage untuk demo)
            localStorage.setItem('adminLoggedIn', 'true');
            localStorage.setItem('adminUsername', username);

            // Redirect ke dashboard setelah 1.5 detik
            setTimeout(() => {
                window.location.href = ROUTES.dashboard;
            }, 1500);
        }

        /* ========================================
           FUNCTION: CHECK IF ALREADY LOGGED IN
           Cek apakah user sudah login (auto redirect)
           ======================================== */
        
        function checkLoginStatus() {
            const isLoggedIn = localStorage.getItem('adminLoggedIn');
            
            if (isLoggedIn === 'true') {
                // Sudah login, redirect ke dashboard
                window.location.href = ROUTES.dashboard;
            }
        }

        /* ========================================
           EVENT LISTENERS
           ======================================== */
        
        // Submit form
        loginForm.addEventListener('submit', handleLogin);

        // Enter key di password field
        passwordInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                handleLogin(e);
            }
        });

        /* ========================================
           INIT - CEK LOGIN STATUS SAAT PAGE LOAD
           ======================================== */
        
        checkLoginStatus();

        /* ========================================
           CSS ANIMATION FOR SHAKE (ERROR)
           ======================================== */
        
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);

        /* ========================================
           DEMO CREDENTIALS INFO (HAPUS DI PRODUCTION!)
           Menampilkan info login di console
           ======================================== */
        
        console.log('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        console.log('🔐 DEMO LOGIN CREDENTIALS:');
        console.log('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        console.log('Username: ' + ADMIN_CREDENTIALS.username);
        console.log('Password: ' + ADMIN_CREDENTIALS.password);
        console.log('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
    </script>
</body>
</html>
