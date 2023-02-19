<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\DataUmkm;
use App\Models\Profile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// Sign in sebenarnya bukan nama yg deskriptif mengingat kelas ini juga dipakai untuk sign up / registrasi, tp krn class diagram nya..., yaudah lol
class SignInUMKMController extends Controller
{
    /**
     * Registrasi UMKM
     */
    public function setData(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|unique:data_umkm',

            'nama_umkm' => 'required|max:100',
            'nama_lengkap' => 'required|max:100',

            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'nama_jln' => 'required',
            // 'detail' => 'required',

            'no_tlp' => 'required',
            'email_umkm' => 'required|email|unique:data_umkm',
            'plat_1' => 'required|max:100',
            'plat_1' => 'max:100',
            'estimasi_wkt_pekerjaan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 409);
        }

        $userInput = $request->all();
        $umkm = DataUmkm::create($userInput);
        $user = Profile::query()->get(['id', 'nama', 'level_user'])->find($request->user_id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan.',
            'data' => [
                'data_umkm' => $umkm,
                'profile' => $user,
            ],
        ], 201);
    }
}
