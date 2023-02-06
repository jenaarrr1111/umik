<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $table = 'rating';

    /**
* filllable
*
* @var array
*/
protected $fillable = [
    'pesanan_id',
    'nama_pelanggan',
    'penilaian'
    ];
    
}


