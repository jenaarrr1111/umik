<?php

namespace Database\Factories;

use App\Models\DataProduk;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'produk_id' => DataProduk::inRandomOrder()->value('id'),
            // 'harga_akhir' => Pesanan::where('harga')->get(),
            'harga_akhir' => 10000, // Aku bingung, jadi tak buat gini dulu
            'potongan_harga' => 2000, // Aku bingung, jadi tak buat gini dulu
            'waktu_promo' => $this->faker->dateTime(),
        ];
    }
}
