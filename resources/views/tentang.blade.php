<!DOCTYPE html>
<html>
<head>
    <title>Tentang Saya</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <h1>Tentang Saya</h1>

        <p><strong>Nama:</strong> {{ $nama }}</p>
        <p><strong>NIM:</strong> {{ $nim }}</p>
        <p><strong>Kelas:</strong> {{ $kelas }}</p>
        <p><strong>Hobi:</strong> {{ $hobi }}</p>

    </div>

</body>
</html>