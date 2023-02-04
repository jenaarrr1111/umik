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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('profile');
            // nama_produk ambil dari produk_id
            $table->foreignId('produk_id')->constrained('data_produk');
            $table->string('alamat_pelanggan');
            $table->integer('jmlh_pesanan');
            $table->decimal('harga', 10, 2);
            $table->longText('catatan');
            // no_tlp diambil dari user_id
            // $table->string('no_tlp');

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
        Schema::dropIfExists('pesanan');
    }
};
