<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimoni;

/**
 * Seeder untuk mengisi data default testimoni
 * Dijalankan dengan: php artisan db:seed --class=TestimoniSeeder
 */
class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data testimoni default (12 testimoni)
        $testimoniData = [
            [
                'nama' => 'Rudi Santoso',
                'rating' => 5,
                'testimoni' => 'Makanannya enak banget! Rasa autentik masakan Jawa yang bikin kangen rumah. Harga juga ramah di kantong, bakal balik lagi kesini.',
                'tanggal' => '2 minggu yang lalu'
            ],
            [
                'nama' => 'Vina Setiawan',
                'rating' => 4,
                'testimoni' => 'Tempatnya cozy, pelayanan ramah. Rawonnya juara! Rasa bumbunya nempel di lidah, bikin nagih terus. Pasti balik lagi kesini.',
                'tanggal' => '2 hari yang lalu'
            ],
            [
                'nama' => 'Riana Fitri',
                'rating' => 4,
                'testimoni' => 'Recommended! Menu variatif, porsi pas, dan yang penting rasanya mantap. Jadi langganan deh, cocok buat makan siang bareng teman.',
                'tanggal' => '3 hari yang lalu'
            ],
            [
                'nama' => 'Raya Wilianto',
                'rating' => 5,
                'testimoni' => 'Waroenk Qu ini hidden gem! Soto ayamnya enak banget, kuahnya seger. Tempatnya juga nyaman buat makan sama keluarga.',
                'tanggal' => '5 hari yang lalu'
            ],
            [
                'nama' => 'Siti Nurjanah',
                'rating' => 4,
                'testimoni' => 'Pertama kali coba langsung jatuh cinta! Nasi gorengnya juara, bumbunya meresap sempurna. Harganya affordable banget.',
                'tanggal' => '1 minggu yang lalu'
            ],
            [
                'nama' => 'Hendra Alfica',
                'rating' => 3,
                'testimoni' => 'Lalapan ayamnya mantap! Ayamnya crispy, sambalnya pedas pas. Setiap hari kerja pasti mampir kesini buat makan siang.',
                'tanggal' => '1 minggu yang lalu'
            ],
            [
                'nama' => 'Maya Sari',
                'rating' => 3,
                'testimoni' => 'Pelayanannya cepat dan ramah. Menu-menunya enak semua, terutama mie goreng Jawanya. Jadi tempat favorit buat nongkrong.',
                'tanggal' => '1 minggu yang lalu'
            ],
            [
                'nama' => 'Budi Prasetyo',
                'rating' => 5,
                'testimoni' => 'Gudeg-nya mantap! Rasanya manis gurih, empuk banget. Bikin kangen kampung halaman. Harus coba kalau ke Jogja.',
                'tanggal' => '2 minggu yang lalu'
            ],
            [
                'nama' => 'Lina Wati',
                'rating' => 4,
                'testimoni' => 'Sate ayamnya enak, bumbunya meresap. Harga terjangkau, porsi banyak. Cocok buat makan berdua atau sendiri.',
                'tanggal' => '2 minggu yang lalu'
            ],
            [
                'nama' => 'Andi Susanto',
                'rating' => 5,
                'testimoni' => 'Gado-gadonya segar banget! Sayurnya fresh, bumbunya pas. Tempatnya bersih dan nyaman. Recommended!',
                'tanggal' => '3 minggu yang lalu'
            ],
            [
                'nama' => 'Dewi Kusuma',
                'rating' => 4,
                'testimoni' => 'Nasi uduk pagi-pagi di sini jadi ritual! Lauk-lauknya lengkap, rasanya autentik. Harga ramah kantong.',
                'tanggal' => '3 minggu yang lalu'
            ],
            [
                'nama' => 'Agus Setiawan',
                'rating' => 5,
                'testimoni' => 'Pecel lelenya juara! Sambalnya pedasnya pas, ikannya segar. Pelayanan juga cepat. Bakal balik lagi pasti!',
                'tanggal' => '1 bulan yang lalu'
            ]
        ];

        // Insert semua data ke database
        foreach ($testimoniData as $data) {
            Testimoni::create($data);
        }
    }
}