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
    public function pengajuanApprove($id_umkm){
        $agree = $this->umkm::find($id_umkm);
        $agree->update(['status' =>'terverifikasi']);
    
    
        // $training->Approved = 1;
       // $training->save();
        return redirect('/umkm/pengajuan')->with('success', 'Pengajuan Terverifikasi');
    }
    public function pengajuanReject($id_umkm){
        $rejected = $this->umkm::find($id_umkm);
        $rejected->update(['status' =>'ditolak']);
    
    
        // $training->Approved = 1;
       // $training->save();    
        return redirect('/umkm/pengajuan')->with('success', 'Pengajuan DiTolak');
    }
    public function getNotif()
    {
        return view('partials.notification', [
        ]);
    }
}