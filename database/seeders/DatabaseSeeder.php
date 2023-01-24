<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AlamatUmkm;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tes utk mendefinisikan superadmin (mungkin akan dihapus di produksi)
        Profile::firstOrCreate([
            'nama' => 'superadmin',
            'username' => 'superadmin',
            'no_tlp' => '+6282962541463',
            'email' => 'super.admin@gmail.com',
            'password' => 'password',
            'level_user' => 'admin_keseluruhan',
            'created_at' => '2022-01-23 21:25:35',
            'updated_at' => '2022-01-23 21:25:35',
        ]);

        Profile::factory(4)->create(['level_user' => 'penjual']);
        Profile::factory(6)->create();

        // Utk seeding db, user_id nya ada di AlamatUmkmFactory
        // Klo mau dikomen gpp, soalnya masih aku juga masih agak bingung
        for ($i = 0; $i < 4; $i++) {
            AlamatUmkm::factory()->create([
                'nama_umkm' => fake()->unique()->company(),
                'email_umkm' => fake()->unique()->companyEmail(),
                'plat' => fake()->randomNumber(5, true),
                'estimasi_wkt_pekerjaan' => fake()->randomElement([
                    '00:15:00',
                    '00:17:00',
                    '00:20:00'
                ]),
            ]);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
