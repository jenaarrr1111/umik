<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignInController extends Controller
{
    /**
     * Validasi (login user)
     */
    public function login(Request $request): JsonResponse
    {
        $user = Profile::where('email', '=', $request->email)->first();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 409);
        }

        if (!$user || !Hash::check($request['password'], $user['password'])) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal login. Email atau password tidak sesuai.'
            ], 401);
        }

        $token = $user->createToken('token_utk_user')->plainTextToken;
        $res = [
            'success' => true,
            'message' => 'Login Berhasil',
            'token' => $token,
            'data' => $user,
        ];
        return response()->json($res, 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $test = auth('sanctum')->user()->tokens();
        // auth('sanctum')->user()->tokens()->delete(); // delete semua token
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out', 'debug' => $test], 200);
    }

    /**
     * Registrasi user
     */
    public function setData(Request $request): JsonResponse
    {
        // Mungkin bisa pakai store, supaya ga ngetik berulang"? (udh 2x ngulang)
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:profile',
            'nama' => 'required',
            'no_tlp' => 'required',
            'email' => 'required|email|unique:profile',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 409);
        }

        // Hash Password
        $request['password'] = Hash::make($request->password);
        $userInput = $request->all();

        $user = Profile::create($userInput);
        // ga buat token krn rencananya di-redirect ke hlm sign_in di flutter
        // $token = $user->createToken('token_utk_user')->plainTextToken;
        $res = [
            'success' => true,
            'message' => 'Berhasil registrasi.',
            'data' => $user,
            // 'token' => $token,
        ];

        return response()->json($res, 201);
    }
}
