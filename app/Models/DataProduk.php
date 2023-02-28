<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DataProduk extends Model
{
    use HasFactory;

    protected $table = 'data_produk';

    protected $fillable = [
        'umkm_id',
        'nama_produk',
        'deskripsi',
        'gbr_produk',
        'kategori',
        'harga',
        'stok',
    ];

    /**
     * Relasi tabel `data_produk` dgn tabel `profile`
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'user_id');
    }

    /**
     * Relasi tabel `data_produk` dgn tabel `data_umkm`
     */
    public function dataUmkm(): BelongsTo
    {
        return $this->belongsTo(DataUmkm::class, 'umkm_id');
    }

    /**
     * Relasi tabel `data_produk` dgn tabel `pesanan`
     */
    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'produk_id');
    }

    /**
     * Relasi tabel `data_produk` dgn tabel `promo`
     */
    public function promo(): HasOne
    {
        return $this->hasOne(Promo::class, 'produk_id');
    }

    public function getData(int $id): Collection
    {
        if (request('search')) {
            $produk = DB::table($this->table)
                ->where('umkm_id', '=', $id)
                ->where('nama_produk', 'like', '%' . request('search') . '%')
                ->get();
        } else {
            $produk = DB::table($this->table)
                ->where('umkm_id', '=', $id)
                ->get();
        }

        return $produk;
    }

    public function getAllCategories(): Collection
    {
        return DB::table($this->table, as: 'p')
            ->join('data_umkm as u', 'u.id', '=', 'p.umkm_id')
            ->where('u.status_verifikasi', '=', 'terverifikasi')
            ->distinct()
            ->where('status_verifikasi', '=', 'terverifikasi')
            ->pluck('kategori');
    }
}
