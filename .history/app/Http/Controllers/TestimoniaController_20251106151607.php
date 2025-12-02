<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = [
            [
                'id' => 1,
                'name' => 'Budi Santoso',
                'date' => '15 Maret 2024',
                'rating' => 5,
                'comment' => 'Rawonnya enak banget! Bumbunya meresap dan dagingnya empuk. Harganya juga sangat terjangkau.',
            ],
            [
                'id' => 2,
                'name' => 'Siti Nurhaliza',
                'date' => '20 Maret 2024',
                'rating' => 5,
                'comment' => 'Soto ayamnya mantap, kuahnya seger dan porsinya pas. Tempatnya bersih dan pelayanannya ramah.',
            ],
            [
                'id' => 3,
                'name' => 'Ahmad Wijaya',
                'date' => '25 Maret 2024',
                'rating' => 5,
                'comment' => 'Nasi goreng jawanya juara! Rasanya pas di lidah, tidak terlalu asin. Pasti balik lagi!',
            ],
            [
                'id' => 4,
                'name' => 'Dewi Lestari',
                'date' => '28 Maret 2024',
                'rating' => 4,
                'comment' => 'Menu lalapennya lengkap dan fresh. Sambelnya pedasnya pas, cocok buat makan siang.',
            ],
        ];
        
        return view('pages.testimonial', compact('testimonials'));
    }
}