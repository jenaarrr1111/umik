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
        return $this->umkm->getProductsOnCategory($category);
    }
}
