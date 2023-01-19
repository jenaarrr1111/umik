<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatUmkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'no_tlp',
        'provinsi',
        'kota',
        'kecamatan',
        'kode_pos',
        'nama_jln',
        'detail',
    ];


    // Mendefinisikan relasi antara tabel `alamat_umkms` dan `users`
    public function user()
    {
        return $this->belongsTo(Profile::class, 'user_id');
    }
}
