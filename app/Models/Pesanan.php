<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    // Todo: Buat factory nya
    protected $fillable = [
        'user_id',
        'produk_id',
        'promo_id',
        'alamat_pelanggan',
        // 'harga', // Kolom harga perlu ga??
        'jmlh_pesanan',
        'pajak',
        'ongkir',
        'ttl_tagihan',
        'catatan',
        'waktu_psn',
        'rating',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'user_id');
    }

    public function dataProduk()
    {
        return $this->hasOne(DataProduk::class, 'produk_id');
    }

    public function promo()
    {
        return $this->hasOne(Promo::class, 'produk_id');
    }
}
