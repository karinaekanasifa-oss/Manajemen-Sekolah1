<?php

namespace Database\Seeders;

use App\Models\ProfilGuru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         ProfilGuru::create([
            'nama_lengkap' => 'Natasha Ayu',
            'nip' => '7556210',
            'bidang_studi' => 'Bahasa Inggris',
            'no_telepon' => '085235718',
        ]);
    }
}
