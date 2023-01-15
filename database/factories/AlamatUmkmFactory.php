<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlamatUmkm>
 */
class AlamatUmkmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Utk sementara buat foreign key user_id di tabel alamat_umkm jadi antara 2 - 5
            'user_id' => mt_rand(2, 5),
            'nama_lengkap' => $this->faker->name(),
            'no_tlp' => $this->faker->e164PhoneNumber(),
            'provinsi' => $this->faker->city(), // utk skrg provinsi jadi kota dulu hehe
            'kota' => $this->faker->city(),
            'kecamatan' => $this->faker->citySuffix(), // aku gtw kecamatan pake method yg mana :v
            'kode_pos' => $this->faker->postcode(),
            'nama_jln' => $this->faker->streetAddress(),
            'detail' => $this->faker->paragraph(2),
        ];
    }
}
