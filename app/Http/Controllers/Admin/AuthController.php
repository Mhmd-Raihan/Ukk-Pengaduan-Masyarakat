<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($login)) {
            $request->session()->regenerate();
            return to_route('dashboard')->with('msg', 'Login Berhasil');
        } else {
            return redirect()->back()->with('error', 'Login Failed');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return to_route('admin.login')->with('msg', 'Logout Berhasil');
    }

}
