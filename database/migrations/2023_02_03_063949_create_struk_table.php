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
        Schema::create('struk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->unique()->constrained('pesanan');
            $table->string('nmr_pelanggan');
            $table->integer('nama_pelanggan');
            $table->integer('waktu');
            $table->string('nama_umkm');
            $table->integer('nama_pesanan');
            $table->integer('pajak');
            $table->integer('ongkir');
            $table->integer('ttl_tagihan');
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
        Schema::dropIfExists('struk');
    }
};