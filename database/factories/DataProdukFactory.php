<?php

namespace Database\Factories;

use App\Models\DataUmkm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataProduk>
 */
class DataProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // cuma user dgn id 2 sampai 5 yg punya toko (utk database seeder)
        $randUserId = $this->faker->numberBetween(2, 5);
        $umkmId = DataUmkm::query()->where('user_id', '=', $randUserId)
            ->value('id');

        return [
            'umkm_id' => $umkmId,

            'nama_produk' => $this->faker->words(mt_rand(1, 4), true),
            'deskripsi' => $this->faker->sentence(),
            'kategori' => $this->faker->randomElement(
                [
                    'Minuman', 'Kopi', 'Cepat Saji', 'Aneka Nasi',
                    'Jajanan', 'Roti', 'Seafood', 'Bakmie',
                ],
            ),
            // 'harga' => $this->faker->numberBetween(5000, 500000),
            'harga' => $this->faker->randomElement([10000, 20000, 50000]),
            'stok' => $this->faker->numberBetween(10, 50),
            // 'user_id' => $this->faker->unique()->numberBetween()
        ];
    }
}
