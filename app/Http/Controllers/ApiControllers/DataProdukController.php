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
}
