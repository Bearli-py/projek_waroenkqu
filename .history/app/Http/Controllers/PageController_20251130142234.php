<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/*
==============================================
PAGE CONTROLLER
==============================================
Controller ini handle semua halaman frontend
1 controller untuk semua halaman public (simple!)

Setiap method return view (file blade)
*/

class PageController extends Controller
{
    /*
    Method: beranda()
    Return: view pages/beranda.blade.php
    Dipanggil dari route: Route::get('/', [PageController::class, 'beranda'])
    */
    public function beranda()
    {
        return view('pages.beranda');
        /*
        PENJELASAN:
        - view('pages.beranda') = load file resources/views/pages/beranda.blade.php
        - Laravel otomatis cari file blade di folder views/
        - Titik (.) = separator folder (pages.beranda = pages/beranda.blade.php)
        */
    }

    public function galeri()
    {
        return view('pages.galeri');
    }

    public function menu()
    {
        return view('pages.menu');
    }

    public function testimoni()
    {
        return view('pages.testimoni');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }

    public function tentang()
    {
        return view('pages.tentang');
    }
}

/*
KENAPA PAKAI CONTROLLER?
1. Organisasi: Semua logic halaman di 1 tempat
2. Maintenance: Gampang edit & debug
3. Scalability: Nanti bisa tambah logic (database, validasi, dll)

ALTERNATIF (tanpa controller):
Route::get('/', function() {
    return view('pages.beranda');
});

Tapi gak recommended kalau halaman banyak!
*/