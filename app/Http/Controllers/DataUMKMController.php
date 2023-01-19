<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class DataUMKMController extends Controller
{
    public $umkm;

    public function __construct()
    {
        $this->umkm = new Profile();
    }

    public function index()
    {
        return view('main-content.umkm.index', [
            'title' => 'UMKM',
        ]);
    }

    public function getData()
    {
        /* return view('main-content.umkm.index', [
            'title' => 'UMKM',
            'umkm' => $this->umkm->getData('penjual'),
        ]); */
    }
}
