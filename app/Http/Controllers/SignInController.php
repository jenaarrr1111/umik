<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class SignInController extends Controller
{
    function index()
    {
        return view('main-content.login.index');
    }
    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ], [
            'email.required'=>'Email wajib diisi',
            'password.required'=> 'Password wajib diisi',
        ]);

        $infologin =[
            'email' => $request->email,
            'password'=>$request->password
        ];
        if (Auth::attempt($infologin)) {
            return redirect('main-content.dashboard.index')->with('succes', 'Berhasil Login');
        } else {
            return redirect('login')->withErrors('Username dan password yang dimasukan tidak valid');
        }
    }
}
