<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TanggapanController extends Controller
{
    public function index()
    {
        $datas = Pengaduan::get();
        return view('admin.tanggapan.index', compact('datas'));
    }

    public function create($id)
    {
        $data = Pengaduan::findOrFail($id);
        return view('admin.tanggapan.create', compact('data'));
    }

    public function store(Request $request, $id)
    {
        $validate = $request->all();
        $validate = $request->validate([
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
        ]);

        $validate['id_petugas'] = Auth::guard('admin')->user()->id;
        $validate['id_pengaduan'] = $request->id;
        Tanggapan::create($validate);

        $data = Pengaduan::findOrFail($id);
        $pengaduan['status'] = 'selesai';
        $data->update($pengaduan);
        return to_route('tanggapan')->with('msg', 'Berhasil Membuat Tanggapan');
    }

    public function update($id)
    {
        $data = Pengaduan::findOrFail($id);
        if ($data->status == 0) {
            $status = 'proses';
        } else {
            $status = 'proses';
        }

        $data = Pengaduan::where('id', $id)->update(['status' => $status]);
        return to_route('tanggapan')->with('msg', 'Berhasil Verifikasi');
    }

    public function destroy($id)
    {
        $data = Pengaduan::findOrFail($id);
        $data->delete();
        return to_route('tanggapan')->with('msg', 'Data Berhasil Dihapus');
    }

    public function pdf()
    {
        $data = Pengaduan::all();

    	$pdf = pdf::loadview('admin.tanggapan.pdf', compact('data'));
    	return $pdf->download('pengaduan.pdf');
    }

    public function pdf_byId(Request $request,$id)
    {
        
        $data = Pengaduan::where('id', $id)->get();

        if ($request->start_date && $request->end_date) {
          $data = Pengaduan::where('tgl_pengaduan', $request->start_date, $request->end_date)->get();
        }

    	$pdf = pdf::loadview('admin.tanggapan.pdf', compact('data'));
    	return $pdf->download('pengaduan.pdf');
    }

    public function pengaduanId($id)
    {
        $datas = Pengaduan::with(['tanggapan', 'masyarakat', 'petugas'])->where('id', $id)->get();
        return view('admin.tanggapan.show', compact('datas'));
    }

    public function filter(Request $request)
    {
        // $datas = Pengaduan::all();
        // if (isset($request->start_date) && isset($request->end_date)) {
        //     $datas = Pengaduan::whereBetween('tgl_pengaduan', [Carbon::parse($request->start_date), Carbon::parse(date($request->end_date) . ' 23:59:59')])->get();

        // $datas = Pengaduan::all();
        // if (isset($request->start_date) && isset($request->end_date)) {
        //     $datas = Pengaduan::whereBetween('tgl_pengaduan', [Carbon::parse($request->start_date), Carbon::parse(date($request->end_date) . ' 23:59:59')])->get();
        // }
        $datas = Pengaduan::where('tgl_pengaduan', [Carbon::parse($request->start_date)->toDateTimeString()]);
        return view('admin.tanggapan.index', compact('datas'))->render();
    }
}

// }
