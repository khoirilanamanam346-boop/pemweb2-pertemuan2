<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $nama = "Khoiril Anam";
        $nim = "D112411013";
        $kelas = "IF-5A";
        $hobi = "Desain Grafis, Ngoding, dan Rajin Beribadah";

        return view('tentang', compact('nama', 'nim', 'kelas', 'hobi'));
    }
}