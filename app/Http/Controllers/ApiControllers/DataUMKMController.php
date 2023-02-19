<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\DataUmkm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataUMKMController extends Controller
{
    public $umkm;

    public function __construct()
    {
        return $this->umkm = new DataUmkm();
    }

    public function getUmkm(int $id): JsonResponse
    {
        $umkm = $this->umkm::find($id);

        if ($umkm === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'Umkm tidak ditemukan,'
            ], 404);
        }

        return response()->json(['data' => $umkm], 200);
    }

    /**
     * Update umkm
     */
    public function setData(Request $request, int $id): JsonResponse
    {
        $umkm = $this->umkm::find($id);

        if ($umkm === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'UMKM tidak ditemukan.'
            ], 404);
        }

        // Cek input user
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'sometimes|required|max:100',
            'no_tlp' => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => 'false',
                'message' => $validator->errors(),
            ], 409);
        }

        if ($request->has('nama_lengkap')) {
            $umkm['nama_lengkap'] = $request['nama_lengkap'];
        }

        if ($request->has('no_tlp')) {
            $umkm['no_tlp'] = $request['no_tlp'];
        }

        $umkm->save();

        return response()->json([
            'success' => 'true',
            'message' => 'Data berhasil disimpan.',
            'data' => $umkm
        ]);
    }

    public function delete(int $id): JsonResponse
    {
        $umkm = $this->umkm::find($id);

        if ($umkm === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'UMKM tidak ditemukan.',
            ], 404);
        }

        $umkm->delete();

        return response()->json([
            'success' => 'true',
            'data' => 'UMKM berhasil dihapus'
        ], 200);
    }

    public function getProductsOnCategory(string $category): JsonResponse
    {
        $umkm =  $this->umkm->getProductsOnCategory($category);

        if (count($umkm->toArray()) == 0) {
            return response()->json([
                'success' => 'false',
                'message' => 'Tidak ada umkm yang sesuai dengan kategori yang dicari.',
            ], 404);
        }

        return response()->json([
            'success' => 'true',
            'data' => $umkm,
        ], 200);
    }
}
