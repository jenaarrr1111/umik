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

    public function getUmkm($id)
    {
        $umkm = DataUmkm::find($id);

        if ($umkm === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'Umkm tidak ditemukan,'
            ], 404);
        }

        return response()->json(['data' => $umkm], 200);
    }

    public function setData(Request $request, $id)
    {
        $umkm = DataUmkm::find($id);

        if ($umkm === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'UMKM tidak ditemukan.'
            ], 404);
        }

        if ($request->has('nama_lengkap')) {
            $umkm->nama_lengkap = $request->nama_lengkap;
        }

        if ($request->has('no_tlp')) {
            $umkm->no_tlp = $request->no_tlp;
        }

        $umkm->save();

        return response()->json([
            'success' => 'true',
            'message' => 'Data berhasil disimpan.',
            'data' => $umkm
        ]);
    }

    public function delete($id)
    {
        $umkm = DataUmkm::find($id);
        if ($umkm === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'UMKM tidak ditemukan.'
            ], 404);
        }

        $umkm->delete();

        return response()->json([
            'success' => 'true',
            'data' => 'UMKM berhasil dihapus'
        ]);
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
