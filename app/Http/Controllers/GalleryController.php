<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        // Data gallery photos
        $galleries = [
            [
                'id' => 1,
                'title' => 'Nasi Rawon',
                'image' => 'menu/rawon.jpg',
                'category' => 'Makanan'
            ],
            [
                'id' => 2,
                'title' => 'Soto Ayam',
                'image' => 'menu/soto-ayam.jpg',
                'category' => 'Makanan'
            ],
            [
                'id' => 3,
                'title' => 'Nasi Goreng',
                'image' => 'menu/nasi-goreng.jpg',
                'category' => 'Makanan'
            ],
            [
                'id' => 4,
                'title' => 'Mie Goreng',
                'image' => 'menu/mie-goreng.jpg',
                'category' => 'Makanan'
            ],
            [
                'id' => 5,
                'title' => 'Kopi Panas',
                'image' => 'menu/kopi.jpg',
                'category' => 'Minuman'
            ],
        ];
        
        return view('pages.gallery', compact('galleries'));
    }
}