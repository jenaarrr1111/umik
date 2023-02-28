<?php

namespace Database\Factories;

use App\Models\DataProduk;
use App\Models\Profile;
use App\Models\Promo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rand_produk_id = DataProduk::inRandomOrder()->value('id');
        $promo_id = Promo::query()->where('produk_id', '=', $rand_produk_id)
            ->value('id');
        // $harga = DataProduk::query()->where('id', '=', $rand_produk_id)
        //     ->value('harga');

        return [
            'user_id' => Profile::inRandomOrder()->value('id'),
            'produk_id' => $rand_produk_id,
            'promo_id' => $promo_id,

            'alamat_pelanggan' => $this->faker->address(),
            // 'harga' => $harga, // Kolom harga perlu ga??
            // 'harga' => 10000,
            'jmlh_pesanan' => $this->faker->numberBetween(1, 3),
            // 'pajak' => $this->faker->numberBetween(5000, 10000),
            // 'pajak' => 2000,
            // 'ongkir' => $this->faker->numberBetween(5000, 10000),
            // 'ongkir' => 4000,

            'catatan' => $this->faker->sentence(),
            'waktu_psn' => $this->faker->dateTime(),
            'rating' => $this->faker->numberBetween(0, 5),
        ];
    }
}
