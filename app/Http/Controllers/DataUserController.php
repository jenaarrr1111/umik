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
