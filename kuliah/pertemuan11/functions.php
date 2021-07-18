<?php

function koneksi()
{
    return mysqli_connect('localhost', 'root', '', 'pw_budi');
}

function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah(array $data)
{
    $conn    = koneksi();
    $nama    = htmlspecialchars($data['nama']);
    $nrp     = htmlspecialchars($data['nrp']);
    $email   = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar  = htmlspecialchars($data['gambar']);

    $query = "INSERT INTO `mahasiswa` VALUES (NULL, '$nama', '$nrp', '$email', '$jurusan', '$gambar')";

    mysqli_query($conn, $query) or die(mysqli_error($conn)) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi() or die(mysqli_error(koneksi()));

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function ubah(array $data)
{
    $conn    = koneksi();

    $id = $data['id'];
    $nama    = htmlspecialchars($data['nama']);
    $nrp     = htmlspecialchars($data['nrp']);
    $email   = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar  = htmlspecialchars($data['gambar']);

    $query = "UPDATE `mahasiswa` SET `nama` = '$nama', `nrp` = '$nrp ', `email` = '$email', `jurusan` = '$jurusan', `gambar` = '$gambar' WHERE `id` = $id ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}
