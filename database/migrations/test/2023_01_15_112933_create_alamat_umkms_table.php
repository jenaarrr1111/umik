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
        Schema::create('alamat_umkms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained('profile')
                ->onDelete('cascade');

            // ('nm_lengkap') => jadi 'pemilik' wkt diambil utk jadi data_umkm
            // $table->string('nama_lengkap');
            $table->string('nama_lengkap');
            $table->string('nama_umkm');
            $table->string('email_umkm');
            $table->string('plat');
            $table->time('estimasi_wkt_pekerjaan');

            $table->string('no_tlp');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kode_pos');
            $table->string('nama_jln');
            $table->longText('detail');

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
        Schema::dropIfExists('alamat_umkms');
    }
};
