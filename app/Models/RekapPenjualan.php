<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapPenjualan extends Model
{
    use HasFactory;
    protected $table = 'rekap_penjualan';

    /**
     * filllable
     *
     * @var array
     */
    protected $fillable = [
        'pesanan_id',
        'nama_umkm',
        'ttl_pendapatan',
        'jmlh_transaksi',
        'nama_product',
        'jmlh_terjual',
    ];

}
