<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produk_id')->unique()
                ->constrained('data_produk')
                ->onDelete('cascade'); // Utk ambil nama produk
            $table->integer('harga_akhir'); // Ini trus utk apa? :v
            $table->integer('potongan_harga');
            $table->dateTime('waktu_promo');
            // Composite attribute
            // $table->dateTime('promo_mulai');
            // $table->dateTime('promo_selesai');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo');
    }
};
