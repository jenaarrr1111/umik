<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataProduk extends Model
{
    use HasFactory;

    protected $table = 'data_produk';

    protected $fillable = [
        'user_id',
        'nama_produk',
        'kotegori',
    ];

    // Relasi tabel `data_produk` dgn tabel `alamat_umkms`
    public function umkm()
    {
        return $this->belongsTo(AlamatUmkm::class, 'user_id');
    }

    // Relasi tabel `data_produk` dgn tabel `pesanan`
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'produk_id');
    }

    public function getData($id)
    {
        if (request('search')) {
            $produk = DB::table($this->table)
                ->where('user_id', '=', $id)
                ->where('nama_produk', 'like', '%' . request('search') . '%')
                ->get();
        } else {
            $produk = DB::table($this->table)
                ->where('user_id', '=', $id)
                ->get();
        }

        return $produk;
    }
}
