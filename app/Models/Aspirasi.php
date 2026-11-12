<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
     // klo pake use hasfactory di atasnya juga harus di panggil biar berjalan
    use HasFactory;

    protected $table = 'aspirasis'; // nama tabel di database

    // fillable untuk mengunci kolom yang kita punya
    protected $fillable = [
        'nama_pengirim',
        'kelas',
        'isi_pesan',
        'tanggal_kirim',
    ];

}
