<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    protected $model = Barang::class;

    public function definition()
    {
        return [
            'nama_barang' => $this->faker->word,
            'stok_baru' => $this->faker->numberBetween(10, 100),
            'stok_bekas' => $this->faker->numberBetween(5, 50),
            'kondisi' => $this->faker->randomElement(['baru', 'bekas']),
            'kategori' => $this->faker->word,
            'gambar' => $this->faker->imageUrl(640, 480, 'technics', true),
            'deskripsi' => $this->faker->paragraph,
        ];
    }
}
