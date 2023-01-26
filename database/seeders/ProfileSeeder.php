<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tes utk mendefinisikan superadmin (mungkin akan dihapus di produksi)
        Profile::factory()->create([
            'nama' => 'superadmin',
            'username' => 'superadmin',
            'no_tlp' => '+6282962541463',
            'password' => bcrypt('password'),
            'email' => 'super.admin@gmail.com',
            'level_user' => 'admin_keseluruhan',
            
        ]);

        // Profile::factory(5)->create();

        // Utk seeding db, user_id nya ada di AlamatUmkmFactory
        // Klo mau dikomen gpp, soalnya masih aku juga masih agak bingung
        // AlamatUmkm::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

