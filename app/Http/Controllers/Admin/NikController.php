<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nik;
use Illuminate\Http\Request;

class NikController extends Controller
{
    public function index()
    {
        $datas = Nik::get();
        return view('admin.nik.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.nik.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required|numeric',
        ]);

        Nik::create($validate);

        return to_route('nik')->with('msg', 'Berhasil Create Nik');
    }

    public function edit($id)
    {
        $data = Nik::findOrFail($id);
        return view('admin.nik.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input = $request->validate([
            'nik' => 'required|numeric',
        ]);

        $validate = Nik::findOrFail($id)->update($input);

        return to_route('nik')->with('msg', 'Berhasil Update Nik');
    }

    public function destroy($id)
    {
        $data = Nik::findOrFail($id);
        $data->delete();
        return to_route('nik')->with('msg', 'Petugas Berhasil Dihapus');
    }
}
