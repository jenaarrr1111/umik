<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlamatUmkm extends Model
{
    use HasFactory;

    protected $table = 'alamat_umkms';

    protected $fillable = [
        'user_id',

        'nama_lengkap',
        'nama_umkm',
        'email_umkm',
        'plat',
        'estimasi_wkt_pekerjaan',

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

    // Ambil data umkm
    public function getData()
    {
        if (request('search')) {
            $users = DB::table($this->table)
                ->latest()
                ->where('nama_umkm', 'like', '%' . request('search') . '%')
                ->get();
        } else {
            $users = DB::table($this->table)
                ->latest()
                ->get();
        }
        // dd($users);

        return $users;
    }
}
