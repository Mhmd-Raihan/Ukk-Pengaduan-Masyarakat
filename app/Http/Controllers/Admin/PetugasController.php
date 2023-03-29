<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $datas = Petugas::get();
        return view('admin.petugas.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);

        $validate['password'] = bcrypt($request->password);
        $validate['level'] = 'petugas';
        Petugas::create($validate);

        return to_route('petugas')->with('msg', 'Berhasil Create Petugas');
    }

    public function edit($id)
    {
        $data = Petugas::findOrFail($id);
        return view('admin.petugas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);

        $validate['password'] = bcrypt($request->password);
        $validate = Petugas::findOrFail($id)->update($input);

        return to_route('petugas')->with('msg', 'Berhasil Update Petugas');
    }

    public function destroy($id)
    {
        $data = Petugas::findOrFail($id);
        $data->delete();
        return to_route('tanggapan')->with('msg', 'Petugas Berhasil Dihapus');
    }
}
