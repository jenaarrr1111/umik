<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_laporan extends Model
{
    use HasFactory;
    protected $table = 'data_laporan';

    /**
* filllable
*
* @var array
*/
protected $fillable = [
    'rekap_id',
    'nama_umkm',
    'pjln_terlaris',
    'jmlh_transaksi'
    ];
    
}
