<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DataUmkm;
use App\Models\DataProduk;
use App\Models\Pesanan;
use App\Models\Profile;
use App\Models\Promo;
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
        DataUmkm::factory(4)->create();
        DataProduk::factory(20)->create();
        Promo::factory(3)->create();
        Promo::factory(2)->create();
        Pesanan::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
