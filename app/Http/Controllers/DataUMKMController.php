<?php

namespace App\Http\Controllers;

use App\Models\AlamatUmkm;
use Illuminate\Http\Request;

class DataUMKMController extends Controller
{
    public $umkm;

    public function __construct()
    {
        $this->umkm = new AlamatUmkm();
    }

    /* public function index()
    {
        return view('main-content.umkm.index', [
            'title' => 'UMKM',
        ]);
    } */

    public function getData()
    {
        // dd($this->umkm->getData('penjual'));
        return view('main-content.umkm.index', [
            'title' => 'UMKM',
            'umkm' => $this->umkm->getData(),
        ]);
    }
}
