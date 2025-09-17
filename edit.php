<?php
require_once 'Mahasiswa.php';
require_once 'functions.php';

$mhs = new Mahasiswa();
$id = $_GET['id'] ?? null;
if (!$id) redirect('index.php');
$data = $mhs->getById($id);
if (!$data) redirect('index.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $nim = $_POST['nim'] ?? '';
    $jurusan = $_POST['jurusan'] ?? '';
    if ($mhs->update($id, $nama, $nim, $jurusan)) {
        redirect('index.php');
    } else {
        $error = 'Gagal update data.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>

<body>
    <h1>Edit Mahasiswa</h1>
    <?php if (!empty($error)) echo '<p style="color:red">' . $error . '</p>'; ?>
    <form method="post">
        <label>Nama: <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required></label><br>
        <label>NIM: <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']) ?>" required></label><br>
        <label>Jurusan: <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']) ?>" required></label><br>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Kembali</a>
</body>

</html>