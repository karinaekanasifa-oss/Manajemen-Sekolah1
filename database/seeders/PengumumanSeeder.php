<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // klo pake yg dari luar di atasnya harus manggil foldernya, trs kalo mau masukin satu data pke create
        Pengumuman::create([
            'judul' => 'Pengumuman Libur Akhir Tahun',
            'isi_pengumuman' => 'Sekolah akan libur mulai tanggal 20 Desember hingga 5 Januari.',
            'penulis' => 'Admin Sekolah',
            'tanggal_pengumuman' => '2023-12-15',
        ]);
    }
}
