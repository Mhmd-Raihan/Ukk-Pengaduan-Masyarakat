<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Petugas::create([
            'nama_petugas' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'telp' => '081324578',
            'level' => 'admin',
        ]);

        \App\Models\Petugas::create([
            'nama_petugas' => 'Petugas',
            'username' => 'petugas',
            'password' => bcrypt('123456'),
            'telp' => '081234567',
            'level' => 'petugas',
        ]);
    }
}
