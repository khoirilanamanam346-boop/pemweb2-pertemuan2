<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menampilkan form input + riwayat hasil yang sudah ada di session
    public function index()
    {
        $riwayat = session('riwayat_nilai', []);
        return view('nilai.input', compact('riwayat'));
    }

    // Memproses form, menghitung nilai akhir, menyimpan ke session
    public function hitung(Request $request)
    {
        $nama = $request->input('nama');
        $nilai_uts = (float) $request->input('uts');
        $nilai_uas = (float) $request->input('uas');
        $nilai_tugas = (float) $request->input('tugas');
        $nilai_kehadiran = (float) $request->input('kehadiran');

        // Bobot: UTS 30% + UAS 40% + Tugas 20% + Kehadiran 10%
        $kehadiran_persen = ($nilai_kehadiran / 18) * 100;
        $nilai_akhir = ($nilai_uts * 0.3) + ($nilai_uas * 0.4) + ($nilai_tugas * 0.2) + ($kehadiran_persen * 0.1);

        $status = $nilai_akhir >= 60 ? 'Lulus' : 'Tidak Lulus';

        // Ambil riwayat yang sudah ada di session (array kosong kalau belum ada)
        $riwayat = session('riwayat_nilai', []);

        // Tambahkan entri baru ke array riwayat
        $riwayat[] = [
            'nama' => $nama,
            'kehadiran' => $nilai_kehadiran,
            'nilai_akhir' => round($nilai_akhir, 2),
            'status' => $status,
        ];

        // Simpan kembali seluruh array ke session
        session(['riwayat_nilai' => $riwayat]);

        // Flash message: notifikasi sekali tampil setelah redirect
        session()->flash('pesan', "Nilai untuk $nama berhasil dihitung!");

        return redirect('/nilai');
    }
}