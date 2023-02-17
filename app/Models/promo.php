<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promo extends Model
{
    use HasFactory;
    protected $table = 'promo';

    protected $fillable = [
        'produk_id',
        'harga_akhir',
        'potongan_harga',
        'waktu_promo',
    ];

    public function dataProduk(): BelongsTo
    {
        return $this->belongsTo(DataProduk::class, 'produk_id');
    }
}
