<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tentang
Route::get('/tentang', [AboutController::class, 'index'])->name('about');

// Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.detail');

// Gallery
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery');

// Testimonial
Route::get('/testimoni', [TestimonialController::class, 'index'])->name('testimonial');

// Contact
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak', [ContactController::class, 'sendMessage'])->name('contact.send');