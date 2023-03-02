<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\DataUmkm;
use App\Models\Promo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromoController extends Controller
{
    public $promo;

    public function __construct()
    {
        return $this->promo = new Promo();
    }

    public function getAllPromo(): JsonResponse
    {
        $categories = $this->promo->getPromoList();
        return response()->json([
            'success' => true,
            'data' => $categories,
        ], 200);
    }
    public function createPromo(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'produk_id' => 'required',
            'potongan_harga' => 'required',
            'promo_mulai' => 'required|date',
            'promo_selesai' => 'required|date',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 403);
        }

        $userInput = $request->all();
        $promo = $this->promo::create($userInput);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan.',
            'data' => $promo,
        ], 200);
    }

    public function getPromo(): JsonResponse
    {
        $promo = $this->promo::all();
        return response()->json([
            'success' => true,
            'data' => $promo,
        ], 200);
    }

    public function getPromoOnUmkm(int $id): JsonResponse
    {
        $umkm = DataUmkm::find($id);


        if ($umkm == null) {
            return response()->json([
                'success' => false,
                'message' => 'Toko tidak ditemukan.'
            ], 404);
        }

        $promo = $this->promo->getPromoUmkm($id);

        if (count($promo->toArray()) == 0) {
            return response()->json([
                'success' => true,
                'message' => 'Tidak ada produk.'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $promo,
        ], 200);
    }

    public function deletePromo(int $id): JsonResponse
    {
        $promo = $this->promo::find($id);

        if ($promo == null) {
            return response()->json([
                'success' => false,
                'message' => 'Promo tidak ditemukan.',
            ], 404);
        }

        $promo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Promo berhasil dihapus.',
        ], 200);
    }
}
