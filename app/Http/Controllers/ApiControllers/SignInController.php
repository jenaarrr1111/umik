<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignInController extends Controller
{
    public function getData()
    {
        return DB::table('profile')->latest()->get();
    }

    // Login User
    public function validasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {

            $password = DB::table('profile')
                ->select('password')
                ->where('email', '=', $request['email'])
                ->first()
                ->password;

            if (Hash::check($request['password'], $password)) {
                return response()->json([
                    'message' => 'Login Berhasil',
                ], 201);
            } else {
                return response()->json([
                    'message' => 'Gagal login. Kredensial tidak sesuai'
                ], 401);
            }
        }
    }

    // Registrasi User
    public function setData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'no_tlp' => 'required',
            'email' => 'required|email|unique:profile',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            // Hash Password
            $request['password'] = Hash::make($request->password);
            $userInput = $request->all();

            $user = Profile::create($userInput);
            return response()->json($user, 201);
        }
    }
}
