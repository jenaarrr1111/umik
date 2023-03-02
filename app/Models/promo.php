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

    public function getPromoList(): Collection
    {
        $table = $this->table;;
        $promo = DB::table($table, as: 'a')
            ->join('data_produk as b', 'b.id', '=', 'a.produk_id')
            ->join('data_umkm as c', 'c.id', '=', 'b.umkm_id')
            ->select(['b.gbr_produk','c.id'])
            ->latest('a.created_at')
            ->get();
        return $promo;
    }
    public function getPromoUmkm($id)
    {
        $currentDate = date('Y-m-d');   
        $promo = DB::table('data_umkm as a')
            ->join('data_produk as b', 'a.id', '=', 'b.umkm_id')
            ->join('promo as c', 'b.id', '=', 'c.produk_id')
            ->select('a.id','b.gbr_produk','c.promo_mulai','c.promo_selesai', DB::raw('CASE WHEN NOW() > c.promo_selesai THEN "Ulangi" 
            WHEN NOW() BETWEEN c.promo_mulai AND c.promo_selesai THEN "Aktif" ELSE "belum mulai" END AS status'))
            ->where('a.id', '=',$id)
            ->latest('c.created_at')
            ->get();
        return $promo;
        // SELECT a.id,b.gbr_produk,c.id,c.produk_id FROM data_umkm AS a join data_produk as b on a.id=b.umkm_id join promo as c on b.id=c.produk_id where a.id=1;
    }}
