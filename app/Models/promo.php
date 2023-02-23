<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Promo extends Model
{
    use HasFactory;
    protected $table = 'promo';

    protected $fillable = [
        'produk_id',
        'potongan_harga',
        'promo_mulai',
        'promo_selesai',
    ];

    public function dataProduk(): BelongsTo
    {
        return $this->belongsTo(DataProduk::class, 'produk_id');
    }

    public function getPromoOnUmkm(int $id): Collection
    {
        $table = $this->table;;
        $promo = DB::table($table, as: 'promo')
            ->join('data_produk', 'data_produk.id', '=', 'promo.produk_id')
            ->select(['promo.*',])
            ->where('data_produk.umkm_id', '=', $id)
            ->get();
        return $promo;
    }
}
