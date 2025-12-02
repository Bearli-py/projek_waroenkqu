<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk membuat tabel testimoni
 * Tabel ini menyimpan semua testimoni pelanggan
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     * Dipanggil saat: php artisan migrate
     */
    public function up(): void
    {
        Schema::create('testimoni', function (Blueprint $table) {
            $table->id();                           // Primary key (auto-increment)
            $table->string('nama', 100);            // Nama pelanggan (max 100 karakter)
            $table->tinyInteger('rating');          // Rating 1-5 (tinyInteger untuk hemat space)
            $table->text('testimoni');              // Isi testimoni (text untuk unlimited karakter)
            $table->string('tanggal', 50);          // Relative time (contoh: "2 hari yang lalu")
            $table->timestamps();                   // created_at & updated_at (otomatis)
        });
    }

    /**
     * Reverse the migrations.
     * Dipanggil saat: php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('testimoni');
    }
};