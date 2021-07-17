<?php
require 'functions.php';

$mahasiswa = query('SELECT * FROM mahasiswa');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h3>Daftar Mahasiswa</h3>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1;
        foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><img src="img/<?php echo $mhs['gambar'] ?>"></td>
                <td><?php echo $mhs['nama'] ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $mhs['id'] ?>">Lihat Detail</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>