<?php

namespace App\Http\Controllers;

use App\Models\ProfilGuru;
use Illuminate\Http\Request;

class ProfilGuruController extends Controller
{
     //index untuk menampilkan halaman awal
    public function index(){

       // ini buat manggil data dari model pengumuman
        $profil_gurus = ProfilGuru::get();
        // pemanggilan folder pakenya titk. ga pake slice lagi /
        // setaip buat variabel baru harus masuk di compact biar bisa di panggil di view
        return view('profilguru.pages.profilguru', compact('profil_gurus'));
    }
}
