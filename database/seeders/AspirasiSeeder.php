<?php

namespace Database\Seeders;

use App\Models\Aspirasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AspirasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // klo pake yg dari luar di atasnya harus manggil foldernya, trs kalo mau masukin satu data pke create
        Aspirasi::create([
            'nama_pengirim' => 'Lisna',
            'kelas' => 'XII RPL 2',
            'isi_pesan' => 'Sekolahnya kurang Fasilitas.',
            'tanggal_kirim' => '2026-09-15',
        ]);
    }
}
