<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
    $tanggal_pinjam = isset($_POST['tanggal_pinjam']) ? $_POST['tanggal_pinjam'] : '';
    $tanggal_kembali = isset($_POST['tanggal_kembali']) ? $_POST['tanggal_kembali'] : '';
    $foto = isset($_POST['foto']) ? $_POST['foto'] : '';

    $stmt = $pdo->prepare('INSERT INTO peminjaman (nama, email, judul_buku, tanggal_pinjam, tanggal_kembali, foto) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nama, $email, $judul_buku, $tanggal_pinjam, $tanggal_kembali, $foto]);
    $msg = 'Data berhasil ditambahkan!';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peminjaman Buku</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Peminjaman Buku</h2>
        <form action="create.php" method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="judul_buku">Judul Buku:</label>
            <input type="text" name="judul_buku" id="judul_buku " required>

            <label for="tanggal_pinjam">Tanggal Pinjam:</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required> 

            <label for="tanggal_kembali">Tanggal Kembali:</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" required>
            
            <label for="foto">Upload Foto User:</label>
            <input type="file" name="foto" id="foto">

            <input type="submit" value="Tambah Data">
        </form>
        <?php if ($msg): ?>
        <p class="success-msg"><?=$msg?></p>
        <?php endif; ?>
        <a href="read.php">Kembali ke Daftar Peminjaman</a>
    </div>
</body>
</html>
