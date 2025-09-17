<?php
require_once 'Mahasiswa.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $nim = $_POST['nim'] ?? '';
    $jurusan = $_POST['jurusan'] ?? '';
    $mhs = new Mahasiswa();
    if ($mhs->create($nama, $nim, $jurusan)) {
        redirect('index.php');
    } else {
        $error = 'Gagal menambah data.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>

<body>
    <h1>Tambah Mahasiswa</h1>
    <?php if (!empty($error)) echo '<p style="color:red">' . $error . '</p>'; ?>
    <form method="post">
        <label>Nama: <input type="text" name="nama" required></label><br>
        <label>NIM: <input type="text" name="nim" required></label><br>
        <label>Jurusan: <input type="text" name="jurusan" required></label><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>

</html>