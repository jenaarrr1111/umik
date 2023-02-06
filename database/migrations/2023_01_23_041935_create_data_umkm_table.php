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
        Schema::create('data_umkm', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('user_id')->constrained('profile');
            $table->foreignId('user_id')->unique()->constrained('profile');

            // Diambil utk jadi 'pemilik' utk admin keseluruhan
            $table->string('nama_lengkap');

            $table->string('nama_umkm')->nullable();
            // $table->longText('alamat_umkm')->nullable();
            $table->string('email_umkm')->nullable();
            $table->string('plat')->nullable();

            $table->time('estimasi_wkt_pekerjaan')->nullable();
            // Diambil utk jadi 'notlp' utk admin keseluruhan
            $table->string('no_tlp');

            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kode_pos');
            $table->string('nama_jln');
            $table->longText('detail');
            $table->enum('status_verifikasi', ['terverifikasi', 'belum_terverifikasi']);

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
        Schema::dropIfExists('data_umkm');
    }
};
