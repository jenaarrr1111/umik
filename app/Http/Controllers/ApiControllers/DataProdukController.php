<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\DataProduk;
use App\Models\DataUmkm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataProdukController extends Controller
{
    public $dataProduk;

    public function __construct()
    {
        $this->dataProduk = new DataProduk;
    }

    public function getAllCategories(): JsonResponse
    {
        $categories = $this->dataProduk->getAllCategories();
        return response()->json([
            'success' => true,
            'data' => $categories,
        ], 200);
    }

    public function getProductsOnUmkm(int $id): JsonResponse
    {
        $umkm = DataUmkm::query()
            ->find($id)
            ->where('status_verifikasi', '=', 'terverifikasi');

        if ($umkm == null) {
            return response()->json([
                'success' => false,
                'message' => 'Toko tidak ditemukan.'
            ], 404);
        }

        $produk = $this->dataProduk->query()
            ->where('umkm_id', '=', $id)
            ->latest()
            ->get();

        $kategori = $this->dataProduk->query()
            ->distinct()
            ->where('umkm_id', '=', $id)
            ->pluck('kategori');

        $kategori = $kategori->toArray();
        $kategori = implode(', ', $kategori);

        if (count($produk->toArray()) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada produk.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $produk,
            'kategori' => $kategori,
        ], 200);
    }

    public function createProduct(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'umkm_id' => 'required',
            'nama_produk' => 'required|max:255',
            'deskripsi' => 'nullable|max:3000',
            'gbr_produk' => 'image',
            'kategori' => 'required',
            'harga' => 'required|max:100',
            'stok' => 'required|integer|max:300',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 409);
        }

        $userInput = $request->all();
        $produk = $this->dataProduk::create($userInput);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan.',
            'data' => $produk,
        ], 201);
    }

    public function updateProduct(Request $request, int $id): JsonResponse
    {
        $produk = $this->dataProduk::find($id);

        if ($produk === null) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.'
            ], 404);
        }

        // Cek input user
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|max:255',
            'deskripsi_produk' => 'nullable|max:3000',
            'harga' => 'required|max:100',
            'kategori' => 'required',
            'stok' => 'required|max:300',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 409);
        }

        if ($request->has('nama_produk')) {
            $produk['nama_produk'] = $request['nama_produk'];
        }

        if ($request->has('deskripsi')) {
            $produk['deskripsi'] = $request['deskripsi'];
        }

        if ($request->has('kategori')) {
            $produk['kategori'] = $request['kategori'];
        }

        if ($request->has('harga')) {
            $produk['harga'] = $request['harga'];
        }

        if ($request->has('stok')) {
            $produk['stok'] = $request['stok'];
        }

        $produk->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan.',
            'data' => $produk,
        ], 200);
    }

    public function deleteProduct(int $id): JsonResponse
    {
        $produk = $this->dataProduk::find($id);

        if ($produk == null) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.',
            ], 404);
        }

        $produk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus.',
        ], 200);
    }
}
