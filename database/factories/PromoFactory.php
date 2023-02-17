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
            // 'harga_akhir' => Pesanan::where('harga')->get(),
            'harga_akhir' => 10000, // Aku bingung, jadi tak buat gini dulu
            'potongan_harga' => 2000, // Aku bingung, jadi tak buat gini dulu
            'waktu_promo' => $this->faker->dateTime(),
        ];
    }
}
