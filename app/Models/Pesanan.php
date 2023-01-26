<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'user_id');
    }

    public function dataProduk()
    {
        return $this->hasOne(DataProduk::class, 'produk_id');
    }
}
