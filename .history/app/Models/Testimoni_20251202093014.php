<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Testimoni
 * Representasi tabel 'testimoni' di database
 */
class Testimoni extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     * Default Laravel: 'testimonies' (plural English)
     * Kita override jadi 'testimoni'
     */
    protected $table = 'testimoni';

    /**
     * Kolom yang bisa di-mass assign
     * (Kolom yang bisa diisi via Testimoni::create([...]))
     */
    protected $fillable = [
        'nama',
        'rating',
        'testimoni',
        'tanggal'
    ];

    /**
     * Cast kolom rating ke integer
     * Memastikan rating selalu dalam bentuk angka
     */
    protected $casts = [
        'rating' => 'integer'
    ];
}