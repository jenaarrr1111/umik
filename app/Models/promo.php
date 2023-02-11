<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $table = 'promo';

    /**
     * filllable
     *
     * @var array
     */
    protected $fillable = [
        'produk_id',
        'harga_akhir',
        'potongan_harga',
        'waktu_promo',
    ];

    public function dataProduk()
    {
        return $this->belongsTo(DataProduk::class, 'produk_id');
    }
}
