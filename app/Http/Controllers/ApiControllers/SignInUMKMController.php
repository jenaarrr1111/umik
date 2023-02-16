<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\DataUmkm;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// Sign in sebenarnya bukan nama yg deskriptif mengingat kelas ini juga dipakai untuk sign up / registrasi, tp krn class diagram nya..., yaudah lol
class SignInUMKMController extends Controller
{
    // Registrasi UMKM
    public function setData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|unique:data_umkm',

            'nama_umkm' => 'required',
            'nama_lengkap' => 'required',

            // alamat
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'nama_jln' => 'required',
            // 'detail' => 'required',

            'no_tlp' => 'required',
            'email_umkm' => 'required|email|unique:data_umkm',
            'plat_1' => 'required',
            // 'plat_1' => 'required',
            'estimasi_wkt_pekerjaan' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        } else {
            $userInput = $request->all();

            $umkm = DataUmkm::create($userInput);

            $user = Profile::query()->get(['id', 'nama', 'level_user'])->find($request->user_id);

            return response()->json([
                'message' => 'Berhasil registrasi',
                'data' => [
                    'data_umkm' => $umkm,
                    'profile' => $user,
                ],
            ], 201);
        }
    }
}
