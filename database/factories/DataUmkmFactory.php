<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataUmkm>
 */
class DataUmkmFactory extends Factory
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
            // 'user_id' => Profile::where('level_user', 'penjual')->inRandomOrder()->value('id'),
            'user_id' => $this->faker->unique()
                ->numberBetween(2, 11),

            'nama_umkm' => $this->faker->unique()->company(),
            'email_umkm' => $this->faker->unique()->companyEmail(),
            'plat_1' => $this->faker->randomNumber(5, true),
            // 'plat_2' => $this->faker->randomNumber(5, true),
            'estimasi_wkt_pekerjaan' => $this->faker->randomElement([
                '00:15:00',
                '00:17:00',
                '00:20:00'
            ]),

            'nama_lengkap' => $this->faker->name(),
            'no_tlp' => $this->faker->unique()->e164PhoneNumber(),
            'provinsi' => $this->faker->city(), // utk skrg provinsi jadi kota dulu hehe
            'kota' => $this->faker->city(),
            'kecamatan' => $this->faker->citySuffix(), // aku gtw kecamatan pake method yg mana :v
            'kode_pos' => $this->faker->postcode(),
            'nama_jln' => $this->faker->streetAddress(),
            'detail' => $this->faker->paragraph(2),
        ];
    }
}
