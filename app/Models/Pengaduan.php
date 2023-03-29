<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $fillable = ['tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status', 'nama'];

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan');
    }

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'nama_petugas');
    }
}
