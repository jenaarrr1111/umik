<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    /**
     * filllable
     *
     * @var array
     */
    protected $fillable = [
        'data_produk_id',
        'nama_kategori',
    ];

}

