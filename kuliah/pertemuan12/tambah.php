<?php
session_start();

require 'functions.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

// cek apakah tombol  sudah ditekan
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
             </script>";
    } else {
        echo "<br> Data gagal ditambahkan!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        table tr {
            text-align: left;
        }
    </style>
</head>

<body>
    <h3>Form Tambah Data</h3>
    <a href="index.php">Kembali ke Daftar Mahasiswa</a>
    <br><br>
    <form action="" method="post">
        <table>
            <tr>
                <th><label for='nama'>Nama</label></th>
                <th>: <input type='text' name='nama' id='nama' autofocus required></th>
            </tr>
            <tr>
                <th><label for='nrp'>NRP</label></th>
                <th>: <input type='text' name='nrp' id='nrp' required></th>
            </tr>
            <tr>
                <th><label for='email'>Email</label></th>
                <th>: <input type='text' name='email' id='email' required></th>
            </tr>
            <tr>
                <th><label for='jurusan'>Jurusan</label></th>
                <th>: <input type='text' name='jurusan' id='jurusan' required></th>
            </tr>
            <tr>
                <th><label for='gambar'>Gambar</label></th>
                <th>: <input type='text' name='gambar' id='gambar' required></th>
            </tr>
            <tr>
                <td><button type='submit' name='submit' value='oke' id='submit'>Tambah Data!</button></td>
            </tr>
        </table>
    </form>
</body>

</html>