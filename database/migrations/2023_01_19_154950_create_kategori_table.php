<?php

use App\Models\Kategori;
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
        Schema::create('kategori', function (Blueprint $table) {
            // $table->id();
            $table->string('nama_kategori');
            $table->primary('nama_kategori');
            $table->timestamps();
        });

        $kategori = [
            'Bakmie',
            'Seafood',
            'Roti',
            'Jajanan',
            'Cepat Saji',
            'Minuman',
            'Aneka Nasi',
            'Kopi'
        ];

        for ($i = 0; $i < count($kategori); $i++) {
            Kategori::create(['nama_kategori' => $kategori[$i]]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
};
