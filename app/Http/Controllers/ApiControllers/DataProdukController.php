<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\DataProduk;
use Illuminate\Http\Request;

class DataProdukController extends Controller
{
    public $dataProduk;

    public function __construct()
    {
        $this->dataProduk = new DataProduk;
    }

    public function getAllCategories()
    {
        return $this->dataProduk->getAllCategories();
    }

    public function getProductsOnUmkm($id)
    {
        $produk = DataProduk::query()
            ->where('umkm_id', '=', $id)
            ->latest()
            ->get();

        if (count($produk->toArray()) == 0) {
            return response()->json([
                'success' => 'false',
                'message' => 'Toko tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => 'true',
            'message' => $produk
        ], 200);
    }
}
