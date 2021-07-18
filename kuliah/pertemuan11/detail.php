<?php
require 'functions.php';

// Ambil id dari url
$id = $_GET['id'];

// Query mahasiswa berdasarkan id
$mahasiswa =  query("SELECT * FROM mahasiswa WHERE id = $id ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>👨‍🎓Detail Mahasiswa</title>
    <style>
        ul li:first-child {
            list-style: none;
        }
    </style>
</head>

<body>
    <h3>Detail Mahasiswa</h3>
    <ul>
        <li><img src="img/<?php echo $mahasiswa['gambar'] ?>"></li>
        <li>NRP : <?php echo $mahasiswa['nrp'] ?></li>
        <li>Nama : <?php echo $mahasiswa['nama'] ?> </li>
        <li>Email : <?php echo $mahasiswa['email'] ?></li>
        <li>Jurusan : <?php echo $mahasiswa['jurusan'] ?></li>
        <li><a href="ubah.php?id=<?php echo $mahasiswa['id'] ?>">ubah</a> || <a href="hapus.php?id=<?php echo $mahasiswa['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $mahasiswa['nama'] ?> ')">hapus</a> </li>
        <li><a href="index.php">Kembali ke Daftar Mahasiswa</a></li>
    </ul>
</body>

</html>