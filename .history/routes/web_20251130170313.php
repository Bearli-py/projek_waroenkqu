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
Route::get('/admin', function (Request $request) {
    if (!$request->session()->get('is_admin')) {
        return redirect()->route('admin.login');
    }

    return view('admin.dashboard');
})->name('admin.dashboard');

use Illuminate\Http\Request;

Route::post('/admin/login', function (Request $request) {
    // Ambil input dari form
    $username = $request->input('username');
    $password = $request->input('password');

    // Cek username & password statis
    if ($username === 'admin' && $password === 'josjis') {
        // Simpan flag login di session
        $request->session()->put('is_admin', true);

        // Redirect ke dashboard admin
        return redirect()->route('admin.dashboard');
    }

    // Kalau salah, balik ke form dengan pesan error
    return back()->withInput()->withErrors([
        'login' => 'Username atau password salah.',
    ]);
})->name('admin.login.process');