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
        Schema::create('data_produk', function (Blueprint $table) {
            $table->id();

            /*
             * Menambahkan foreign key
             * Foreign key nya diambil dari kolom `id` di tabel data_umkm
             */
            $table->foreignId('umkm_id')->constrained('data_umkm')
                ->onDelete('cascade');
            $table->string('nama_produk');
            $table->longText('deskripsi')->nullable();
            $table->string('gbr_produk')->nullable();
            $table->string('kategori');
            $table->foreign('kategori')
                ->references('nama_kategori')
                ->on('kategori')
                ->onDelete('cascade');
            $table->integer('harga');
            $table->integer('stok');

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
        Schema::dropIfExists('data_produk');
    }
};
