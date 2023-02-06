<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class struk extends Model
{
    use HasFactory;
    protected $table = 'struk';

    /**
* filllable
*
* @var array
*/
protected $fillable = [
    'pesanan_id',
    'nmr_pelanggan',
    'nama_pelanggan',
    'waktu',
    'nama_umkm',
    'nama_pesanan',
    'pajak',
    'ongkir',
    'ttl_tagihan'
    ];
    
}
