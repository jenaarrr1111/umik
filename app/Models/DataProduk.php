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
        'umkm_id',
        'nama_produk',
        'kotegori',
    ];

    // Relasi tabel `data_produk` dgn tabel `data_umkms`
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'user_id');
    }

    // Relasi tabel `data_produk` dgn tabel `data_umkms`
    public function dataUmkm()
    {
        return $this->belongsTo(DataUmkm::class, 'umkm_id');
    }

    // Relasi tabel `data_produk` dgn tabel `pesanan`
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'produk_id');
    }

    // Relasi tabel `data_produk` dgn tabel `pesanan`
    public function promo()
    {
        return $this->hasOne(Promo::class, 'produk_id');
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

    public function getAllCategories()
    {
        return DB::table($this->table)->distinct()->pluck('kategori');
    }
}
