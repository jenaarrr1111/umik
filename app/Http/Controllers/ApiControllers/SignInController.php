<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
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

        $password = DB::table('profile')
            ->select('password')
            ->where('email', '=', $request['email'])
            ->first()
            ->password;

        if (!Hash::check($request['password'], $password)) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal login. Kredensial tidak sesuai'
            ], 401);
        }

        $token = $user->createToken('token_utk_user')->plainTextToken;
        $res = [
            'success' => true,
            'message' => 'Login Berhasil',
            'token' => $token,
        ];
        return response()->json($res, 200);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }

    /**
     * Registrasi user
     */
    public function setData(Request $request): JsonResponse
    {
        // Mungkin bisa pakai store, supaya ga ngetik berulang"? (udh 2x ngulang)
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'no_tlp' => 'required',
            'email' => 'required|email|unique:profile',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validator->errors(),
            ], 403);
        }

        // Hash Password
        $request['password'] = Hash::make($request->password);
        $userInput = $request->all();

        $user = Profile::create($userInput);
        $token = $user->createToken('token_utk_user')->plainTextToken;
        $res = [
            'success' => true,
            'message' => 'Berhasil registrasi.',
            'data' => $user,
            'token' => $token,
        ];

        return response()->json($res, 201);
    }
}
