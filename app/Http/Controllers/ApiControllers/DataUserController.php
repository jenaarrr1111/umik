<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public $users;

    public function __construct()
    {
        $this->users = new Profile();
    }

    public function getData()
    {
        return $this->users->getData();
    }
}
