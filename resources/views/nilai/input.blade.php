<!DOCTYPE html>
<html>
<head>
    <title>Hitung Nilai Mahasiswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Input Nilai Mahasiswa</h1>

    @if (session('pesan'))
        <p style="color: green;"><strong>{{ session('pesan') }}</strong></p>
    @endif

    <form method="POST" action="/nilai/hitung">
        @csrf
        <label>Nama: <input type="text" name="nama" required></label><br>
        <label>UTS: <input type="number" name="uts" min="0" max="100" required></label><br>
        <label>UAS: <input type="number" name="uas" min="0" max="100" required></label><br>
        <label>Tugas: <input type="number" name="tugas" min="0" max="100" required></label><br>
        <label>Kehadiran: <input type="number" name="kehadiran" min="0" max="18" required></label><br>
        <button type="submit">Hitung</button>
    </form>

    <h2>Riwayat Perhitungan</h2>
    @if (count($riwayat) > 0)
        <table border="1" cellpadding="6">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kehadiran</th>
                    <th>Nilai Akhir</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat as $hasil)
                    <tr>
                        <td>{{ $hasil['nama'] }}</td>
                        <td>{{ $hasil['kehadiran'] ?? '-' }}</td>
                        <td>{{ $hasil['nilai_akhir'] }}</td>
                        <td>{{ $hasil['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada data.</p>
    @endif
</body>
</html>