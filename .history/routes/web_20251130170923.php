<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;

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



// Route Admin Dashboard (GET /admin)
Route::get('/admin', function (Request $request) {
    if (!$request->session()->get('is_admin')) {
        return redirect()->route('admin.login');
    }

    return view('admin.dashboard');
})->name('admin.dashboard');

// Halaman login admin (GET /admin/login)
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Proses login admin (POST /admin/login)
Route::post('/admin/login', function (Request $request) {

    // Ambil input dari form
    $username = $request->input('username');
    $password = $request->input('password');

    // Cek username & password tetap
    if ($username === 'admin' && $password === 'josjis') {
        $request->session()->put('is_admin', true);
        return redirect()->route('admin.dashboard');
    }

    // Kalau salah
    return back()->withInput()->withErrors([
        'login' => 'Username atau password salah.',
    ]);
})->name('admin.login.process');