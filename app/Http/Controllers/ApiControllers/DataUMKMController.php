<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\DataUmkm;
use Illuminate\Http\Request;

class DataUMKMController extends Controller
{
    public $umkm;

    public function __construct()
    {
        return $this->umkm = new DataUmkm();
    }

    public function getProductsOnCategory($category)
    {
        $umkm =  $this->umkm->getProductsOnCategory($category);

        if (count($umkm->toArray()) == 0) {
            return response()->json([
                'umkm' => 'Tidak ada umkm yang sesuai dengan kategori yang dicari'
            ], 404);
        }

        return $umkm;
    }
}
