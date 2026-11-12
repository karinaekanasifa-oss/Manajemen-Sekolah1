<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // klo pake yg dari luar di atasnya harus manggil foldernya, trs kalo mau masukin satu data pke create
        Siswa::create([
            'nama_siswa' => 'Natasha Ayu',
            'nisn' => '8963426910',
            'kelas' => 'X APAt 1',
            'alamat_rumah' => 'Dusun Cinagarajaya'
        ]);
    }
}
