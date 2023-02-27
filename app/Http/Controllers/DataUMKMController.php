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
    public function GetGraph()

    {
        // dd($this->umkm->GetGraph());
        $data = $this->umkm->GetGraph();
        $labelsBarChart = [];
        $data_chart = [];
        foreach ($data as $umkm){
            $labelsBarChart[] = $umkm->nama_umkm;
            $data_chart[] = $umkm->Total_pesanan;
        }
        // dd(json_encode($umkm_chart));
        return view('main-content.dashboard.index', ['title' => 'UMKM','labelsBarChart' => $labelsBarChart, 'data_chart' => $data_chart]);
    }
    public function GetUmkmList()

    {
        // dd($this->umkm->GetGraph());
        return view('main-content.dashboard.dashboard_umkm', [
            'title' => 'List Umkm',
            
            'umkm' => $this->umkm->GetGraph(),
        ]);
    }
    public function GetUmkm($id)

    {
        $data = $this->umkm->GetGraph($id);
        $labelsBarChart = [];
        $data_chart = [];
        foreach ($data as $umkm){
            $nama = $umkm->nama_umkm;
            $labelsBarChart[] = $umkm->nama_umkm;
            $data_chart[] = $umkm->Total_pesanan;
        }
        // dd($this->umkm->GetGraph());
        return view('main-content.dashboard.index', [
            'title' => 'Dashboard',
            'id' => $id,
            'namaumkm' => $nama,
            'labelsBarChart' => $labelsBarChart,
             'data_chart' => $data_chart
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
        $agree->update(['status_verifikasi' =>'terverifikasi']);
    
    
        // $training->Approved = 1;
    //    $agree->save();
        return redirect('/umkm/pengajuan')->with('success', 'Pengajuan Terverifikasi');
    }
    public function pengajuanReject($id_umkm){
        $rejected = $this->umkm::find($id_umkm);
        $rejected->update(['status_verifikasi' =>'ditolak']);
    
    
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