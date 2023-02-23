<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DataUmkm extends Model
{
    use HasFactory;

    protected $table = 'data_umkm';

    protected $fillable = [
        'user_id',

        'nama_lengkap',
        'nama_umkm',
        'email_umkm',
        'plat_1',
        'plat_2',
        'estimasi_wkt_pekerjaan',

        'no_tlp',
        'provinsi',
        'kota',
        'kecamatan',
        'kode_pos',
        'nama_jln',
        'detail',
        'status_verifikasi',
    ];


    /**
     * Mendefinisikan relasi antara tabel `alamat_umkms` dan `users`
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'user_id');
    }

    /**
     * Relasi antara tabel `alamat_umkms` dan `data_produk`
     */
    public function dataProduk(): HasMany
    {
        return $this->hasMany(DataProduk::class, 'user_id');
    }

    /**
     * Ambil data umkm
     */
    public function getData(): Collection
    {
        if (request('search')) {
            $umkm = DB::table($this->table)
                ->latest()
                ->where('nama_umkm', 'like', '%' . request('search') . '%')
                ->where('status_verifikasi', '=', 'terverifikasi')
                ->get();
        } else {
            $umkm = DB::table($this->table)
                ->where('status_verifikasi', '=', 'terverifikasi')
                ->latest()
                ->get();
        }
        // dd($umkm);

        return $umkm;
    }

    /**
     * Ambil data umkm yang belum terverifikasi
     */
    public function getUnverified(): Collection
    {
        $umkm = DB::table($this->table)
            ->select('id', 'user_id', 'nama_umkm', 'nama_jln', 'email_umkm', 'no_tlp')
            ->where('status_verifikasi', '=', 'belum_terverifikasi')
            ->latest()
            ->get();

        return $umkm;
    }

    public function getTotalUnverified(): int
    {
        $umkm = DB::table($this->table)
            ->where('status_verifikasi', '=', 'belum_terverifikasi')
            ->count();

        return $umkm;
    }

    // [[ API Functions ]]
    public function getProductsOnCategory(String $category): Collection
    {
        // Ambil semua umkm lalu concat semua kategori yg dimiliki umkm tsb
        // Filter dari hasil kategori_concat, umkm mana yg punya kategori yg dicari
        $umkm = DB::table('data_umkm AS u')
            ->join('data_produk AS p', 'u.id', '=', 'p.umkm_id')
            ->selectRaw(
                'u.id AS id_umkm,
                 u.nama_umkm,
                 GROUP_CONCAT(DISTINCT p.kategori SEPARATOR ",") AS kategori_concat',
            )
            ->groupBy('p.umkm_id')
            ->havingRaw('FIND_IN_SET(?, kategori_concat)', [$category])
            ->get();

        // dd(count($umkm->toArray()), $umkm);

        return $umkm;
    }
}
