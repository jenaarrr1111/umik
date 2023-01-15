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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('username');
            $table->string('no_tlp');
            $table->string('email')->unique();


            $table->string('nama_umkm')->nullable();
            // $table->longText('alamat_umkm')->nullable();
            $table->string('email_umkm')->nullable();
            $table->string('plat')->nullable();
            $table->integer('estimasi_wkt_pekerjaan')->nullable();


            $table->enum('level_user', ['user', 'penjual', 'admin_keseluruhan']);

            /*
             * Keterangan:
             * Untuk ('estimasi_wkt_pekerjaan')
             *   - Bisa diisi penjual sendiri
             *   - Tipenya int atau time enaknya? Utk skrg, aku pake integer.
             *   Jadi, wkt nya disimpan dlm satuan detik.
             *   - Maksimal 30 menit
             * Untuk ('email_umkm') dan ('pemilik')
             *   - Bisa sama ataupun beda dengan ('email') dan ('nama'), jadi
             *   tergantung orangnya
             * Untuk ('pemilik') dan ('not')
             *   - Bisa sama ataupun beda dengan ('email') dan ('nama'), jadi
             *   tergantung orangnya
             * Untuk ('alamat_umkm')
             *   - Diambil dari tabel `alamat_umkm`
             *   - Apa primary key nya tabel `alamat_umkm`
             *   - Sementara dikomen dulu, utk liat hasil data yg lain
             * Untuk membedakan Admin Keseluruhan dengan Penjual dan Pembeli?
             *   - Bisa pakai kolom level_user ? ada ide lain gak?
             */

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
