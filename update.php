<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

// Periksa apakah id peminjaman ada dalam parameter GET
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // Dapatkan data dari formulir yang dikirim
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
        $tanggal_pinjam = isset($_POST['tanggal_pinjam']) ? $_POST['tanggal_pinjam'] : '';
        $tanggal_kembali = isset($_POST['tanggal_kembali']) ? $_POST['tanggal_kembali'] : '';
        $foto = isset($_POST['foto']) ? $_POST['foto'] : '';

        // Update data dalam database
        $stmt = $pdo->prepare('UPDATE peminjaman SET id = ?, nama = ?, email = ?, judul_buku = ?, tanggal_pinjam = ?, tanggal_kembali = ?, foto = ? WHERE id = ?');
        $stmt->execute([$id, $nama, $email, $judul_buku, $tanggal_pinjam, $tanggal_kembali, $foto, $_GET['id']]);
        $msg = 'Data berhasil diperbarui!';
    }

    // Dapatkan data peminjaman dari tabel peminjaman
    $stmt = $pdo->prepare('SELECT * FROM peminjaman WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contact) {
        exit('Data tidak ditemukan dengan ID tersebut!');
    }
} else {
    exit('ID tidak tersedia!');
}
?>

<?=template_header('Update')?>

<div class="content update">
    <h2>Perbarui Data Peminjaman #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post" enctype="multipart/form-data">
        <label for="id">ID</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?=$contact['email']?>" id="email">
        <label for="judul_buku">Judul Buku</label>
        <input type="text" name="judul_buku" value="<?=$contact['judul_buku']?>" id="judul_buku">
        <label for="tanggal_pinjam">Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" value="<?=$contact['tanggal_pinjam']?>" id="tanggal_pinjam">
        <label for="tanggal_kembali">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" value="<?=$contact['tanggal_kembali']?>" id="tanggal_kembali">
        <label for="foto">Foto User</label>
        <input type="file" name="foto" value="<?=$contact['foto']?>" id="foto">
        <input type="submit" value="Perbarui">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>

<!DOCTYPE html>
<html>
<head>
    <title>Tampilan Data Peminjaman</title>

</head>
<body>
   <style>

body, input, label {
    font-family: Arial, sans-serif;
}

/* Style the form container */
.content.update {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Style form labels */
form label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

/* Style form inputs */
form input[type="text"],
form input[type="date"],
form input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    
   
}

/* Style the submit button */
form input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;

    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #217dbb;
}

/* Style the success message */
p {
    background-color: #27ae60;
    color: #fff;
    padding: 10px;
 
    text-align: center;
    margin-top: 10px;
}

   </style>
</body>
</html>
