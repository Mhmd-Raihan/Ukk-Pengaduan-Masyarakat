<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count['masyarakat'] = Masyarakat::count();
        $count['petugas'] = Petugas::where('level', 'petugas')->count();
        $count['admin'] = Petugas::where('level', 'admin')->count();

        $count['0'] = Pengaduan::where('status', '0')->count();
        $count['proses'] = Pengaduan::where('status', 'proses')->count();
        $count['selesai'] = Pengaduan::where('status', 'selesai')->count();
        return view('admin.dashboard.index', compact('count'));
    }
}
