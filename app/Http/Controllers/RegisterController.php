<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Nik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('masyarakat.auth.register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required|unique:masyarakat',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
        ]);

        $validate['password'] = bcrypt($request->password);

        $nik = Nik::where('nik', $request->nik)->first();
        if ($nik) {
        Masyarakat::create($validate);
        return to_route('login')->with('msg', 'Berhasil Membuat Account');
        } else {
            return back()->with('error', 'Nik Tidak Terdaftar');
        }

    }
}
