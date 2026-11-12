<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::get();
        return view('siswa.pages.siswa', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.pages.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nisn' => 'required|numeric',
            'kelas' => 'required|string|max:255',
            'alamat_rumah' => 'required|string|max:255',
        ]);

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'alamat_rumah' => $request->alamat_rumah,
        ]);

        return redirect()->route('siswa.table')->with('success', 'Data Siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Ubah ke bentuk singular ($siswa)
        $siswa = Siswa::findOrFail($id);
        return view('siswa.pages.update', compact('siswa'));
    }

    // Ubah $siswas menjadi $siswa agar cocok dengan {siswa} di web.php
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nisn' => 'required|numeric',
            'kelas' => 'required|string|max:255',
            'alamat_rumah' => 'required|string|max:255',
        ]);

        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'alamat_rumah' => $request->alamat_rumah,
        ]);

        return redirect()->route('siswa.table')->with('success', 'Data Siswa berhasil diperbarui!');
    }

    // Ubah $siswas menjadi $siswa
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.table')->with('success', 'Data Siswa berhasil dihapus!');
    }
}
