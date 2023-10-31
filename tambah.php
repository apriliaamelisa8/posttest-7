<?php
    include 'koneksi.php';
    $query =  "SELECT * FROM peminjaman";
    $sql = mysqli_query($conn, $query);

   $result = mysqli_fetch_assoc($sql);
   var_dump($result);
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman Buku</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    
    <h2>Peminjaman Buku</h2>

    <!-- Form untuk menambahkan data -->
    <form action="create.php" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="judul_buku">Judul Buku:</label>
        <input type="text" name="judul_buku" required><br><br>

        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" required><br><br>

        <label for="tanggal_kembali">Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" required><br><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" accept="image/"><br><br>

        <input type="submit" value="Tambah Buku">
    </form>
</body>
</html>
