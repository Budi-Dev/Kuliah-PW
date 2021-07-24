<?php
session_start();

require 'functions.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

// jika tidak ada id di url
if (!isset($_GET['id'])) {
    header('location: index.php');
    exit;
}

// ambil id dari url 
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id");

// cek apakah tombol sudah ditekan
if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
             </script>";
    } else {
        echo "<br> Data gagal diubah!";
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
    <h3>Form Ubah Data</h3>
    <a href="index.php">Kembali ke Daftar Mahasiswa</a>
    <br><br>
    <form action="" method="post">
        <table>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <tr>
                <th><label for='nama'>Nama</label></th>
                <th>: <input type='text' name='nama' id='nama' autofocus required value="<?php echo $mahasiswa['nama']; ?>"></th>
            </tr>
            <tr>
                <th><label for='nrp'>NRP</label></th>
                <th>: <input type='text' name='nrp' id='nrp' required value="<?php echo $mahasiswa['nrp']; ?>"></th>
            </tr>
            <tr>
                <th><label for='email'>Email</label></th>
                <th>: <input type='text' name='email' id='email' required value="<?php echo $mahasiswa['email']; ?>"></th>
            </tr>
            <tr>
                <th><label for='jurusan'>Jurusan</label></th>
                <th>: <input type='text' name='jurusan' id='jurusan' required value="<?php echo $mahasiswa['jurusan']; ?>"></th>
            </tr>
            <tr>
                <th><label for='gambar'>Gambar</label></th>
                <th>: <input type='text' name='gambar' id='gambar' required value="<?php echo $mahasiswa['gambar']; ?>"></th>
            </tr>
            <tr>
                <td><button type='submit' name='submit' value='oke' id='submit'>Ubah Data!</button></td>
            </tr>
        </table>
    </form>
</body>

</html>