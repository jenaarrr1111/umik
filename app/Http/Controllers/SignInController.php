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
        // dd($request->email, $email);
    // if (auth()->attempt($credentials)) {
        if ($request->email == $email) {
        $request->session()->regenerate();

        return redirect('/dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}
}