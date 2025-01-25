<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;  // Pastikan trait ini ada

    protected $fillable = [
        'nama_barang',
        'stok_baru',
        'stok_bekas',
        'kategori',
        'kondisi',
        'gambar',
        'deskripsi',
    ];
}
