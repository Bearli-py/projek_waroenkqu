<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Waroenk Qu</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        .admin-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 40px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .admin-header {
            border-bottom: 3px solid #B33939;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .admin-header h1 {
            font-family: 'Playfair Display', serif;
            color: #B33939;
            margin: 0;
        }
        
        .admin-menu {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }
        
        .admin-card {
            background: linear-gradient(135deg, #B33939, #8f2e2e);
            color: #fff;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(179, 57, 57, 0.4);
        }
        
        .admin-card h3 {
            margin: 0 0 10px 0;
            font-size: 20px;
        }
        
        .admin-card p {
            margin: 0;
            font-size: 14px;
            opacity: 0.9;
        }
        
        .back-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 30px;
            background: #fff;
            color: #B33939;
            border: 2px solid #B33939;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            background: #B33939;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>🔐 Admin Dashboard</h1>
            <p style="color: #666; margin-top: 10px;">Selamat datang di panel admin Waroenk Qu</p>
        </div>
        
        <div class="admin-menu">
            <a href="#" class="admin-card">
                <h3>📝 Kelola Menu</h3>
                <p>Tambah, edit, atau hapus menu makanan</p>
            </a>
            
            <a href="#" class="admin-card">
                <h3>🖼️ Kelola Galeri</h3>
                <p>Upload atau hapus foto galeri</p>
            </a>
            
            <a href="#" class="admin-card">
                <h3>💬 Kelola Testimoni</h3>
                <p>Lihat dan moderasi testimoni customer</p>
            </a>
            
            <a href="#" class="admin-card">
                <h3>📊 Statistik</h3>
                <p>Lihat data pengunjung website</p>
            </a>
            
            <a href="#" class="admin-card">
                <h3>⚙️ Pengaturan</h3>
                <p>Atur informasi kontak & profil</p>
            </a>
            
            <a href="#" class="admin-card">
                <h3>👤 Profil Admin</h3>
                <p>Edit profil & password</p>
            </a>
        </div>
        
        <a href="{{ route('beranda') }}" class="back-btn">← Kembali ke Website</a>
    </div>
</body>
</html>
