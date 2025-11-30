<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| ROUTING UNTUK WAROENK QU
| Ini yang mengatur URL website kamu mengarah ke halaman mana
*/

// HALAMAN BERANDA (Homepage)
Route::get('/', function () {
    return view('pages.home');
})->name('home');
// URL: waroenk-qu.test/ atau localhost/waroenk-qu/

// HALAMAN GALERI
Route::get('/galeri', function () {
    return view('pages.gallery');
})->name('galeri');
// URL: waroenk-qu.test/galeri

// HALAMAN MENU
Route::get('/menu', function () {
    return view('pages.menu');
})->name('menu');
// URL: waroenk-qu.test/menu

// HALAMAN TESTIMONI
Route::get('/testimoni', function () {
    return view('pages.testimonial');
})->name('testimoni');
// URL: waroenk-qu.test/testimoni

// HALAMAN KONTAK
Route::get('/kontak', function () {
    return view('pages.contact');
})->name('kontak');
// URL: waroenk-qu.test/kontak

// HALAMAN TENTANG
Route::get('/tentang', function () {
    return view('pages.about');
})->name('tentang');
// URL: waroenk-qu.test/tentang