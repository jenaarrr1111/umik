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
        'pesanan_id',
        'nama_produk',
        'harga_akhir',
        'waktu_prm',
        'ttl_tagihan'
    ];

}

