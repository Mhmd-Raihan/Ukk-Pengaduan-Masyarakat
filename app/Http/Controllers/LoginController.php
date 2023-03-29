<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('masyarakat.auth.login');
    }

    public function store(Request $request)
    {
        $login = $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            return to_route('home')->with('msg', 'Login Berhasil');
        } else {
            return redirect()->back()->with('error', 'Login Gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('home')->with('msg', 'Logout Berhasil');
    }
}
