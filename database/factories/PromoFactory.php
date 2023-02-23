<?php

namespace Database\Factories;

use App\Models\DataProduk;
use App\Models\Pesanan;
use App\Models\Promo;
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
        // $produk_di_promo = Promo::pluck('produk_id')->all();
        // $produk_id = DataProduk::whereNotIn('id', $produk_di_promo)->select('id')->first();
        return [
            'produk_id' => DataProduk::inRandomOrder()->value('id'),
            'potongan_harga' => 2000, // Aku bingung, jadi tak buat gini dulu
            'promo_mulai' => date('Y-m-d h:i:s'),
            'promo_selesai' => $this->faker->dateTimeBetween(
                startDate: 'now',
                endDate: '+10 minutes'
            ),
        ];
    }
}
