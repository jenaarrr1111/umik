<?php

namespace Database\Factories;

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
        return [
            // cuma user dgn id 2 sampai 5 yg punya toko (utk database seeder)
            'user_id' => $this->faker->numberBetween(2, 5),
            'nama_produk' => $this->faker->words(mt_rand(1, 4), true),
            'kategori' => $this->faker->randomElement(
                [
                    'Minuman', 'Kopi', 'Cepat Saji', 'Aneka Nasi',
                    'Jajanan', 'Roti', 'Seafood', 'Bakmie',
                ],
            ),
            'harga' => $this->faker->numberBetween(5000, 500000),
            // 'user_id' => $this->faker->unique()->numberBetween()
        ];
    }
}
