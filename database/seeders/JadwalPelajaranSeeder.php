<?php

namespace Database\Seeders;

use App\Models\JadwalPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // klo pake yg dari luar di atasnya harus manggil foldernya, trs kalo mau masukin satu data pke create
        JadwalPelajaran::create([
            'hari' => 'Senin',
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '09:00:00',
            'mata_pelajaran' => 'Matematika',
            'nama_guru' => 'Bpk. John',
            'kelas' => 'X IPA 1',
        ]);
    }
}
