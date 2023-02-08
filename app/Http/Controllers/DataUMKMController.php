<?php

namespace App\Http\Controllers;

use App\Models\DataUmkm;
use Illuminate\Http\Request;

class DataUMKMController extends Controller
{
    public $umkm;

    public function __construct()
    {
        $this->umkm = new DataUmkm();
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
            'Total' => $this->umkm->getTotalUnverified(),
        ]);
    }
    public function getPengajuan()
    {
        // dd($this->umkm->getData('penjual'));
        return view('main-content.umkm.pengajuan', [
            'title' => 'Pengajuan UMKM',
            'umkm' => $this->umkm->getUnverified(),
        ]);
    }
    public function getNotif()
    {
        return view('partials.notification', [
        ]);
    }
}