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
             * Foreign key nya diambil dari kolom `user_id` di tabel alamat_umkm
             */
            $table->foreignId('user_id') // nama kolom
                ->constrained('data_umkm', 'user_id') // nama table dan kolom yg jadi ref
                ->onDelete('cascade');
            $table->string('nama_produk');
            $table->string('kategori');
            $table->decimal('harga');

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
