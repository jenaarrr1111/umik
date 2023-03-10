<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\DataProduk;
use App\Models\DataUmkm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // $categories = $this->dataProduk->getAllCategories();
        $categories = DB::table('kategori')->pluck('nama_kategori');
        return response()->json([
            'success' => true,
            'data' => $categories,
        ], 200);
    }

    public function getProductsOnUmkm(int $id): JsonResponse
    {
        $umkm = DataUmkm::query()
            ->where('id', '=', $id)
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
        $namaUmkm = DataUmkm::find($id)->nama_umkm;

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
            'nama_umkm' => $namaUmkm,
        ], 200);
    }

    public function getProduct(int $id): JsonResponse
    {
        $product = $this->dataProduk::find($id);
        if ($product === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'Produk tidak ditemukan,'
            ], 404);
        }

        return response()->json(['data' => $product], 200);
    }

    public function createProduct(Request $request): JsonResponse
    {
        $validator = $request->validate([
            'umkm_id' => 'required',
            'nama_produk' => 'required|max:255',
            'deskripsi' => 'nullable|max:3000',
            'gbr_produk' => 'image',
            'kategori' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        // Upload the image and store the image in a folder called gbr_produk and the path get stored in the database,
        // Remember to add the gbr_produk to the $fillable
        if ($request->hasFile('gbr_produk')) {
            $validator['gbr_produk'] = $request->file('gbr_produk')
                ->store('gbr_produk', ['disk' => 'public']);
        }

        $userInput = $validator;
        // dd($userInput);
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

        // dd($request, $request->all());
        $validator = $request->validate([
            'umkm_id' => 'required',
            'nama_produk' => 'nullable|max:255',
            'deskripsi' => 'nullable|max:3000',
            'gbr_produk' => 'nullable|image',
            'kategori' => 'nullable|string',
            'harga' => 'nullable|integer',
            'stok' => 'nullable|integer',
        ]);

        /* // Cek input user
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|max:255',
            'deskripsi_produk' => 'nullable|max:3000',
            'harga' => 'required|integer|max:100',
            'kategori' => 'required',
            'stok' => 'required|integer|max:300',
        ]); */

        /* if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 409);
        } */

        if ($request->has('nama_produk') && $request['nama_produk'] != null) {
            $produk['nama_produk'] = $request['nama_produk'];
        }

        if ($request->has('deskripsi') && $request['deskripsi'] != null) {
            $produk['deskripsi'] = $request['deskripsi'];
        }

        if ($request->has('kategori') && $request['kategori'] != null) {
            $produk['kategori'] = $request['kategori'];
        }

        if ($request->has('harga') && $request['harga'] != null) {
            $produk['harga'] = $request['harga'];
        }

        if ($request->has('stok') && $request['stok'] != null) {
            $produk['stok'] = $request['stok'];
        }

        if ($request->hasFile('gbr_produk')) {
            $produk['gbr_produk'] = $request->file('gbr_produk')
                ->store('gbr_produk', ['disk' => 'public']);
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
