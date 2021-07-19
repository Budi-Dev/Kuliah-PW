<?php
require 'functions.php';

$mahasiswa = query('SELECT * FROM mahasiswa');

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}

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

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" placeholder="Masukkan keyword pencarian" autocomplete="off" autofocus>
        <button type='submit' name='cari' value='oke' id='submit'>Cari!</button>
    </form>
    <br>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>

        <?php if (empty($mahasiswa)) : ?>
            <tr>
                <td colspan="4">
                    <p style="text-align: center;color: red; font-style: italic">Data mahasiwa tidak ditemukan</p>
                </td>
            </tr>
        <?php endif ?>

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