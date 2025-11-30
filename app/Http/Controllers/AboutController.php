<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = [
            'name' => 'Waroenk Qu',
            'tagline' => 'Cita Rasa Autentik, Harga Bersahabat',
            'description' => 'Waroenk Qu adalah UMKM kuliner yang menyajikan berbagai menu makanan dan minuman khas Nusantara dengan cita rasa autentik dan harga yang terjangkau. Kami berkomitmen untuk memberikan pengalaman kuliner terbaik dengan bahan-bahan berkualitas dan pelayanan yang ramah.',
            'story' => 'Berawal dari kecintaan terhadap kuliner tradisional Nusantara, Waroenk Qu didirikan pada tahun 2020 dengan modal nekat dan tekad yang kuat. Dimulai dari gerobak kecil di pinggir jalan, kini Waroenk Qu telah memiliki tempat yang lebih nyaman dan terus berkembang melayani pelanggan setia.',
            'vision' => 'Menjadi warung kuliner pilihan utama masyarakat Jember dengan menyajikan makanan berkualitas dan pelayanan terbaik.',
            'mission' => [
                'Menyajikan makanan dengan bahan berkualitas dan higienis',
                'Memberikan pelayanan yang ramah dan profesional',
                'Menjaga kualitas dan konsistensi rasa',
                'Memberikan harga yang terjangkau untuk semua kalangan',
                'Terus berinovasi mengembangkan menu baru'
            ],
            'values' => [
                'Kualitas' => 'Kami tidak pernah berkompromi dengan kualitas bahan dan rasa',
                'Kebersihan' => 'Higienitas adalah prioritas utama kami',
                'Kejujuran' => 'Harga jujur, porsi pas, tanpa tipu-tipu',
                'Keramahan' => 'Pelayanan dengan senyuman dan hati',
            ],
            'achievements' => [
                '2020' => 'Waroenk Qu berdiri dengan 1 gerobak',
                '2021' => 'Memiliki tempat permanen dengan 10 meja',
                '2022' => 'Melayani 100+ pelanggan per hari',
                '2023' => 'Menjadi salah satu warung favorit di Jember',
                '2024' => 'Ekspansi menu dan layanan delivery'
            ]
        ];
        
        return view('pages.about', compact('about'));
    }
}
