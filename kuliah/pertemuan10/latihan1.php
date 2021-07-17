<?php
// koneksi di db dan pilih db
$conn = mysqli_connect('localhost', 'root', '', 'pw_budi');

// query data tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");


// ubah data ke dalam bentuk array
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}

// tampung data ke dalam variable mahasiswa
$mahasiswa = $rows;
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
      <th>NRP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1; foreach($mahasiswa as $mhs) : ?>
      <tr>
      <td><?php echo $i++ ?></td>
      <td><img src="img/<?php echo $mhs['gambar'] ?>"></td>
      <td><?php echo $mhs['nrp'] ?></td>
      <td><?php echo $mhs['nama'] ?></td>
      <td><?php echo $mhs['email'] ?></td>
      <td><?php echo $mhs['jurusan'] ?></td>
      <td>
        <a href="">ubah</a> | <a href="">hapus</a>
      </td>
    </tr>
    <?php endforeach ?>
  </table>
</body>

</html>