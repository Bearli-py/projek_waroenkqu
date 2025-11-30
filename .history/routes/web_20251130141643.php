<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
==============================================
PENJELASAN ROUTE
==============================================
Route = peta jalan website kamu
Format: Route::get('url', [Controller::class, 'method'])->name('nama');

- Route::get = method HTTP GET (buat buka halaman)
- 'url' = alamat di browser (contoh: /beranda)
- Controller::class = controller yang handle request
- 'method' = function di controller yang dipanggil
- ->name() = nama route buat dipanggil di blade (route('beranda'))

Kalau route gak ada, website error: "Route not defined"
*/


// ====================================
// ROUTE FRONTEND (HALAMAN PUBLIC)
// ====================================

/*
Route Beranda (Homepage)
URL: http://127.0.0.1:8000
Controller: PageController
Method: beranda()
Name: 'beranda' (dipanggil pakai route('beranda'))
*/
Route::get('/', [PageController::class, 'beranda'])->name('beranda');

/*
Route Galeri
URL: http://127.0.0.1:8000/galeri
Tampilkan foto-foto waroenk
*/
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');

/*
Route Menu
URL: http://127.0.0.1:8000/menu
Tampilkan daftar menu makanan & minuman
*/
Route::get('/menu', [PageController::class, 'menu'])->name('menu');

/*
Route Testimoni
URL: http://127.0.0.1:8000/testimoni
Tampilkan review pelanggan
*/
Route::get('/testimoni', [PageController::class, 'testimoni'])->name('testimoni');

/*
Route Kontak
URL: http://127.0.0.1:8000/kontak
Tampilkan info kontak & maps
*/
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

/*
Route Tentang
URL: http://127.0.0.1:8000/tentang
Tampilkan info tentang waroenk
*/
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');


// ====================================
// ROUTE ADMIN (SECRET ENTRANCE!)
// ====================================

/*
Route Admin Dashboard
URL: http://127.0.0.1:8000/admin
Halaman admin (secret entrance dari navbar)
*/
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
