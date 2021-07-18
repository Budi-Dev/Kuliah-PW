<?php
require 'functions.php';

// cek apakah tombol sudah ditekan
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'latihan3.php';
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
</head>

<body>
    <h3>Form Tambah Data</h3>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for='nama'>Nama</label></td>
                <td>: <input type='text' name='nama' id='nama' autofocus required></td>
            </tr>
            <tr>
                <td><label for='nrp'>NRP</label></td>
                <td>: <input type='text' name='nrp' id='nrp' required></td>
            </tr>
            <tr>
                <td><label for='email'>Email</label></td>
                <td>: <input type='text' name='email' id='email' required></td>
            </tr>
            <tr>
                <td><label for='jurusan'>Jurusan</label></td>
                <td>: <input type='text' name='jurusan' id='jurusan' required></td>
            </tr>
            <tr>
                <td><label for='gambar'>Gambar</label></td>
                <td>: <input type='text' name='gambar' id='gambar' required></td>
            </tr>
            <tr>
                <td><button type='submit' name='submit' value='oke' id='submit'>Tambah Data!</button></td>
            </tr>
        </table>
    </form>
</body>

</html>