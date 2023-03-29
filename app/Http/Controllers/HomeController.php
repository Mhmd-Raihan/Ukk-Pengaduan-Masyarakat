<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Nik;
use App\Models\Pengaduan;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('masyarakat.pengaduan.index');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required',
        ]);

        if ($request->file('foto')) {
            $validate['foto'] = $request->file('foto')->store('pengaduan-img');
        }
        // $validate['id_masyarakat'] = Auth::user()->id;

        $nik = Masyarakat::where('nik', $request->nik)->first();

        if (!$nik) {
            return to_route('home')->with('error', 'NIK Tidak Terdaftar');
        }

        Pengaduan::create($validate);
        return to_route('home')->with('msg', 'Berhasil Membuat Pengaduan');
    }

    public function pengaduanByAuth()
    {
        $datas = Pengaduan::get();
        return view('masyarakat.pengaduan.list', compact('datas'));
    }

    public function pengaduanById($id)
    {
        $datas = Pengaduan::with(['tanggapan', 'masyarakat', 'petugas'])->where('id', $id)->get();
        return view('masyarakat.pengaduan.show', compact('datas'));
    }

}
