<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DataUmkm;
use App\Models\DataProduk;
use App\Models\Pesanan;
use App\Models\Profile;
use App\Models\Promo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Profile::factory(10)->create([
            'level_user' => 'penjual',
            'password' => Hash::make('password')
        ]);
        Profile::factory(20)->create(['password' => Hash::make('password')]);
        DataUmkm::factory(10)->create();
        DataProduk::factory(40)->create();
        Promo::factory(7)->create();
        // Promo::factory(2)->create();
        Pesanan::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
