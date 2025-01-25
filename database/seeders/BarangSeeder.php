<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run()
    {
        // Memanggil factory untuk membuat 10 data barang
        Barang::factory()->count(10)->create();
    }
}
