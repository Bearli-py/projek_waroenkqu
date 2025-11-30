<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
==============================================
ROUTE FRONTEND
==============================================
*/

// Route Beranda (Homepage)
Route::get('/', [PageController::class, 'beranda'])->name('beranda');

// Route Galeri
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');

// Route Menu
Route::get('/menu', [PageController::class, 'menu'])->name('menu');

// Route Testimoni
Route::get('/testimoni', [PageController::class, 'testimoni'])->name('testimoni');

// Route Kontak
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

// Route Tentang
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');

// Route Admin Dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');   // atau controller mu
})->name('admin.dashboard');