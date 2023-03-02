<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->foreignId('user_id')->unique()->constrained('profile')
                ->onDelete('cascade');

            // Diambil utk jadi 'pemilik' utk admin keseluruhan
            $table->string('nama_lengkap');

            $table->string('nama_umkm');
            // $table->longText('alamat_umkm')->nullable();
            $table->string('email_umkm');
            $table->string('plat_1');
            $table->string('plat_2')->nullable();

            $table->time('estimasi_wkt_pekerjaan');
            // Diambil utk jadi 'notlp' utk admin keseluruhan
            $table->string('no_tlp');

            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kode_pos');
            $table->string('nama_jln');
            $table->longText('detail')->nullable();
            $table->enum('status_verifikasi', [
                'terverifikasi', 'belum_terverifikasi'
            ])
                ->default('belum_terverifikasi');

            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER `ubah_level_user` AFTER INSERT ON `data_umkm` FOR EACH ROW
            BEGIN
                UPDATE `profile`
                SET level_user = "penjual"
                WHERE `id` = NEW.user_id;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER `ubah_level_user` BEFORE DELETE ON `data_umkm` FOR EACH ROW
            BEGIN
                UPDATE `profile`
                SET level_user = "user"
                WHERE `id` = NEW.user_id;
            END
        ');
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
