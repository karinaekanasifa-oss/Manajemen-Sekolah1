<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // <-- Gunakan Facades\Validator

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // validasi password dan email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|not_in:password,1234',
        ], [
            'required' => 'Atribut ini wajib diisi',
            'not_in' => 'Password terlalu umum digunakan'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'Guru') {
                return redirect()->route('pengumuman.table')->with([
                    'success' => 'Login berhasil, selamat datang ' . Auth::user()->name
                ]);
            } elseif (Auth::user()->role === 'Siswa') {
                return redirect()->route('siswa.table')->with([
                    'success' => 'Login berhasil, selamat datang ' . Auth::user()->name
                ]);
            }
        }
    }
}
