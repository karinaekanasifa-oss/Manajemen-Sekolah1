<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
      // klo pake use hasfactory di atasnya juga harus di panggil biar berjalan
    use HasFactory;

     protected $table = 'jadwal_pelajarans'; // nama tabel di database

      // fillable untuk mengunci kolom yang kita punya
    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'mata_pelajaran',
        'nama_guru',
        'kelas',
    ];

}
