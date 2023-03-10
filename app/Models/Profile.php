<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'username',
        'no_tlp',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function umkm()
    {
        return $this->hasOne(DataUmkm::class, 'user_id');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'user_id');
    }

    // Ambil semua data users ataupun umkm
    public function getData()
    {
        if (request('search')) {
            $users = DB::table($this->table)
                ->latest()
                ->where('nama', 'like', '%' . request('search') . '%')
                ->get();
        } else {
            $users = DB::table($this->table)
                ->select(['nama', 'username', 'email', 'no_tlp', 'level_user', 'id'])
                ->latest()
                ->get();
        }

        return $users;
    }
}
