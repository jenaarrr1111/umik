<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignInController extends Controller
{
    public function getData()
    {
        return DB::table('profile')->latest()->get();
    }

    public function validasi(Request $request)
    {
    }

    public function setData(Request $request)
    {
        // dd($request);
        $formInput = $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'no_tlp' => 'required',
            'email' => 'required|email|unique:profile',
            'password' => 'required|min:6',
        ]);

        // Hash Password
        $formInput['password'] = bcrypt($formInput['password']);
        // dd($formInput);

        // return $this->setData($formInput);
        $user = Profile::create($formInput);
        // dd(response()->json(['data' => $user], 200));

        return response()->json($user, 201);
    }
}
