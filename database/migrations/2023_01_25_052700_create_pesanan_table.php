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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('profile'); // Utk ambil no_tlp
            $table->foreignId('produk_id')->constrained('data_produk'); // Utk ambil nama_produk, harga
            $table->foreignId('promo_id')->nullable()->constrained('promo'); // Utk ambil promo

            $table->string('alamat_pelanggan');

            /*
             *  Klo ga pake kolom harga gimana? Harga nya ambil pake produk_id trus diolah dalem trigger. Gmn?
             *  Soalnya kan bisa ambil harga pake produk_id
             *  dan utk kolom ini, aku gtw cara buat referensi kayak foreign key
             *  soalnya kan, ini kolom biasa-bukan kolom foreign key
             *
             *  Klo misal pake kolom harga berarti gimana? gini a:
             *  - Nanti klo usernya buat pesanan, backend nya kirim api
             *    yg nanti datanya ada isi harga, jmlh_pesanan, pajak, ongkir, dll
             *    trus nanti harganya itu dari sistem nya sendiri yg ngisi nilainya ya?
             *
             */

            // $table->decimal('harga', 10, 2); // Kolom harga perlu ga??
            $table->integer('jmlh_pesanan');
            $table->decimal('pajak', 10, 2);
            $table->decimal('ongkir', 10, 2);
            $table->decimal('total_tagihan', 10, 2)->default(0);
            $table->longText('catatan')->nullable();
            $table->dateTime('waktu_psn');

            /*
             *  KITA PERLU TABEL `RATING` GA SIH??
             *  kalo pake gini bisa ga?
             *
             *  SELECT produk_id, AVG(rating) as AvgPrice
             *  FROM pesanan WHERE produk_id = 16;
             *
             *  untuk ambil rata2 rating-nya bisa pake ini ga se?
             *  ga perlu ada tabel rating sendiri?
             */
            $table->integer('rating');

            /*
             *  KALO TABEL `STRUK`, PERLU GA??
             *
             *  soalnya klo aku liat, tabel `struk` sama persis dgn tabel `pesanan`
             *  kecuali kolom `nmr_pelanggan`, sama `nama_pelanggan`.
             *                 ^aku kurang tahu      ^bisa diambil dari `user_id`
             *                  mksdnya gimana.       di tabel `pesanan` ini.
             *                  Mungkin mksdnya
             *                  kyk id pelanggan?
             */

            $table->timestamps();
        });

        /*
            trigger yg awal, klo masih pake kolom harga
            BEGIN
                SET @promo = 0;
                SELECT `potongan_harga` INTO @promo FROM `promo` WHERE `produk_id` = NEW.produk_id;
                IF @promo >= NEW.harga THEN
                    SET NEW.harga = 0;
                END IF;
                SET NEW.total_tagihan = (NEW.harga - @promo) * NEW.jmlh_pesanan + NEW.pajak + NEW.ongkir;
            END

            trigger revisi
            CREATE TRIGGER `hitung_total_tagihan` BEFORE INSERT ON `pesanan` FOR EACH ROW
            BEGIN
                SELECT `harga` INTO @harga FROM `data_produk` WHERE `id` = NEW.produk_id;
                SET @promo = 0;
                SELECT `potongan_harga` INTO @promo FROM `promo` WHERE `produk_id` = NEW.produk_id;

                IF @promo > @harga THEN
                        SET @harga_stlh_promo = 0;
                ELSE
                        SET @harga_stlh_promo = @harga - @promo;
                END IF;


                SET NEW.total_tagihan = @harga_stlh_promo * NEW.jmlh_pesanan + NEW.pajak + NEW.ongkir;
            END
         */

        DB::unprepared('
            CREATE TRIGGER `hitung_total_tagihan` BEFORE INSERT ON `pesanan` FOR EACH ROW
            BEGIN
                SELECT `harga` INTO @harga FROM `data_produk` WHERE `id` = NEW.produk_id;
                SET @promo = 0;
                SELECT `potongan_harga` INTO @promo FROM `promo` WHERE `produk_id` = NEW.produk_id;

                IF @promo > @harga THEN
                        SET @harga_stlh_promo = 0;
                ELSE
                        SET @harga_stlh_promo = @harga - @promo;
                END IF;


                SET NEW.total_tagihan = @harga_stlh_promo * NEW.jmlh_pesanan + NEW.pajak + NEW.ongkir;
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
        Schema::dropIfExists('pesanan');
    }
};
