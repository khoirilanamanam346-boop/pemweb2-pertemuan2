<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $nama = 'Khoiril Anam';
        $nim = 'D112411013';

        return view('profil', compact('nama', 'nim'));
    }

    public function formSapa()
    {
        return view('sapa');
    }

    public function prosesSapa(Request $request)
    {
        $nama = $request->input('nama');
        return "Halo, $nama! Selamat datang di Laravel.";
    }

    public function tentang()
    {
        $nama = 'Tulis Nama Kamu';
        $nim = 'Tulis NIM Kamu';
        $kelas = 'Tulis Kelas Kamu';
        $hobi = 'Tulis Hobi/Minat Kamu';

        return view('tentang', compact('nama', 'nim', 'kelas', 'hobi'));
    }
}