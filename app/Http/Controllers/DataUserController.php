<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUserController extends Controller
{
    public $users;

    public function __construct()
    {
        $this->users = new Profile();
    }

    // Menampilkan semua user
    public function getData()
    {
        /* $users = DB::table('users')
            ->select('nama', 'email', 'no_tlp', 'level_user')
            ->latest()
            ->get();

        return view('main-content.users.index', [
            'title' => 'Users',
            'users' => $users,
        ]); */
        return view('main-content.users.index', [
            'title' => 'Users',
            'users' => $this->users->getData(),
        ]);
    }

    public function setData()
    {
        # code...
    }
}
