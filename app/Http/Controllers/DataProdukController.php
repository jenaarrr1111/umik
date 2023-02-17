<?php

namespace App\Http\Controllers;

use App\Models\DataProduk;
use Illuminate\Http\Request;

class DataProdukController extends Controller
{
    public $produk_umkm;

    public function __construct()
    {
        $this->produk_umkm = new DataProduk();
    }

    public function getData($id)
    {
        // return $this->produk_umkm->getData($id);
        return view('main-content.umkm.data-produk', [
            'title' => 'UMKM',
            'id' => $id,
            'produk' => $this->produk_umkm->getData($id),
        ]);
    }
}
