<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'no_tlp' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->safeEmail(),

            /*
            'nama_umkm' => $this->faker->company(),
            'pemilik' => $this->faker->name(),
            // 'alamat_umkm' => $this->faker->company(),
            'email_umkm' => $this->faker->companyEmail(),
            'plat' => $this->faker->randomNumber(5, true),
            'estimasi_wkt_pekerjaan' => $this->faker->randomElement([900, 1200, 1900]),
             */

            'level_user' => 'user',
            /* Jangan lupa ubah $fillable nya klo di sini diubah */

            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
