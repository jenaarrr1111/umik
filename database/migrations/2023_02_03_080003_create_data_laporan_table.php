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
        Schema::create('data_laporan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekap_id')->unique()->constrained('rekap_penjualan');
            $table->integer('nama_umkm');
            $table->string('pjln_terlaris');
            $table->integer('jmlh_transaksi');
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
        Schema::dropIfExists('data_laporan');
    }
};
