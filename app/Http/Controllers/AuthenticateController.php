<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {

        if (Auth::attempt([
            "email" => $request->email, "password" => $request->password
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
