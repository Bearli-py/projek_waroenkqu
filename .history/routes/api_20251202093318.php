<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TestimoniController;

/**
 * API Routes untuk Testimoni
 * Base URL: /api/testimoni
 * 
 * Semua routes ini return JSON response
 */

// GET /api/testimoni - Ambil semua testimoni
Route::get('/testimoni', [TestimoniController::class, 'index']);

// GET /api/testimoni/{id} - Ambil satu testimoni
Route::get('/testimoni/{id}', [TestimoniController::class, 'show']);

// POST /api/testimoni - Tambah testimoni baru
Route::post('/testimoni', [TestimoniController::class, 'store']);

// PUT /api/testimoni/{id} - Update testimoni
Route::put('/testimoni/{id}', [TestimoniController::class, 'update']);

// DELETE /api/testimoni/{id} - Hapus testimoni
Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy']);