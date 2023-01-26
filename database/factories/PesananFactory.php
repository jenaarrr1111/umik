<?php

namespace Database\Factories;

use App\Models\DataProduk;
use App\Models\Profile;
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
        return [
            'user_id' => Profile::inRandomOrder()->value('id'),
            'produk_id' => DataProduk::inRandomOrder()->value('id'),
            'alamat_pelanggan' => $this->faker->address(),
            'jmlh_pesanan' => $this->faker->randomNumber(2),
            'catatan' => $this->faker->sentence(),
            'harga' => $this->faker->numberBetween(5000, 500000),
        ];
    }
}
