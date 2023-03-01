<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Profile;

class SignInController extends Controller
{
    public function index()
{
    return view('main-content.login.index');
}
    
    public function auther(Request $request)

    {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'], ]);
 
        $email = Profile::where('email', '=', $request->email)->value('email');
        $password = Profile::where('password', '=', $request->password)->value('password');
        $level = Profile::where('email', '=', $request->email)->value('level_user');

        // dd($request->email, $email);
    // if (auth()->attempt($credentials)) {
        if ($request->email == $email && $request->password == $password && $level == 'admin_keseluruhan' ) {
        $request->session()->regenerate();

        return redirect('/dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}
}