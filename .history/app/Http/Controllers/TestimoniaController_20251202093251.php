<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * API Controller untuk Testimoni
 * Menangani CRUD testimoni via API (JSON response)
 */
class TestimoniController extends Controller
{
    /**
     * GET /api/testimoni
     * Ambil semua testimoni dari database
     * 
     * Digunakan oleh:
     * - Frontend User (tampilkan testimoni di halaman)
     * - Admin Panel (load data saat halaman kelola testimoni dibuka)
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            // Ambil semua testimoni, urutkan dari yang terbaru
            $testimoni = Testimoni::orderBy('created_at', 'desc')->get();

            // Return response JSON dengan status 200 (OK)
            return response()->json([
                'success' => true,
                'message' => 'Data testimoni berhasil diambil',
                'data' => $testimoni
            ], 200);

        } catch (\Exception $e) {
            // Jika terjadi error, return response error
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data testimoni',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * POST /api/testimoni
     * Tambah testimoni baru
     * 
     * Digunakan oleh: Admin Panel (saat klik tombol "Simpan")
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'rating' => 'required|integer|min:1|max:5',
                'testimoni' => 'required|string'
            ]);

            // Buat testimoni baru
            $testimoni = Testimoni::create([
                'nama' => $validated['nama'],
                'rating' => $validated['rating'],
                'testimoni' => $validated['testimoni'],
                'tanggal' => 'Baru saja'  // Default untuk testimoni baru
            ]);

            // Return response sukses dengan data testimoni yang baru dibuat
            return response()->json([
                'success' => true,
                'message' => 'Testimoni berhasil ditambahkan',
                'data' => $testimoni
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            // Jika terjadi error lain
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan testimoni',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * GET /api/testimoni/{id}
     * Ambil satu testimoni berdasarkan ID
     * 
     * Digunakan oleh: Admin Panel (saat klik tombol "Edit")
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            // Cari testimoni berdasarkan ID
            $testimoni = Testimoni::findOrFail($id);

            // Return response sukses
            return response()->json([
                'success' => true,
                'message' => 'Data testimoni ditemukan',
                'data' => $testimoni
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Jika testimoni tidak ditemukan
            return response()->json([
                'success' => false,
                'message' => 'Testimoni tidak ditemukan'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data testimoni',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * PUT /api/testimoni/{id}
     * Update testimoni yang sudah ada
     * 
     * Digunakan oleh: Admin Panel (saat edit testimoni & klik "Simpan")
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'rating' => 'required|integer|min:1|max:5',
                'testimoni' => 'required|string'
            ]);

            // Cari testimoni berdasarkan ID
            $testimoni = Testimoni::findOrFail($id);

            // Update data testimoni
            $testimoni->update([
                'nama' => $validated['nama'],
                'rating' => $validated['rating'],
                'testimoni' => $validated['testimoni']
                // 'tanggal' tidak diupdate (tetap pakai tanggal original)
            ]);

            // Return response sukses dengan data yang sudah diupdate
            return response()->json([
                'success' => true,
                'message' => 'Testimoni berhasil diupdate',
                'data' => $testimoni
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Testimoni tidak ditemukan'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate testimoni',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * DELETE /api/testimoni/{id}
     * Hapus testimoni dari database
     * 
     * Digunakan oleh: Admin Panel (saat klik tombol "Hapus" & konfirmasi)
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            // Cari testimoni berdasarkan ID
            $testimoni = Testimoni::findOrFail($id);

            // Hapus testimoni
            $testimoni->delete();

            // Return response sukses
            return response()->json([
                'success' => true,
                'message' => 'Testimoni berhasil dihapus'
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Testimoni tidak ditemukan'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus testimoni',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}