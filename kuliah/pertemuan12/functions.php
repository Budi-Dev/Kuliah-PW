<!-- make this file unaccesable -->
<script>
    if (document.location.href == 'https://localhost/Kuliah-PW/kuliah/pertemuan12/functions.php') {
        document.location.href = "index.php"
    }
</script>
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

function cari($keyword)
{
    $conn = koneksi();

    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function login($data)
{
    $conn = koneksi();

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    // var_dump(query("SELECT * FROM users WHERE username = '$username' && password = '$password'"));

    // cek username dahulu
    if ($user = query("SELECT * FROM users WHERE username = '$username'")) {
        // cek password
        if (password_verify($password, $user['password'])) {
            // set session login
            $_SESSION['login'] = true;
            header('Location: index.php');
            exit;
        }

        return [
            'error' => true,
            'pesan' => "Username / Password salah!"
        ];
    }

    return [
        'error' => true,
        'pesan' => "Username / Password salah!"
    ];
}

function registrasi($data)
{
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $pw1 = mysqli_real_escape_string($conn, $data['pw1']);
    $pw2 = mysqli_real_escape_string($conn, $data['pw2']);

    // Jika username / password kosong
    if (empty($username) || empty($pw1) || empty($pw2)) {
        echo "<script>
                alert('Hadehhh bro, mau ngehek apa cuma ngeinspeckk??');
                document.location.href = 'registrasi.php';
             </script>";
        return false;
    }

    // jika username sudah terdaftar
    if (query("SELECT * FROM users WHERE username = '$username'")) {
        echo "<script>
                alert('Username yang anda masukkan sudah terdaftar.');
                document.location.href = 'registrasi.php';
             </script>";
        return false;
    }

    // jika konfirmasi password tidak sesuai
    if ($pw2 !== $pw1) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai.');
                document.location.href = 'registrasi.php';
             </script>";
        return false;
    }

    // jika password kurang dari 5 digit
    if (strlen($pw1) < 5) {
        echo "<script>
                alert('Password terlalu pendek!');
                document.location.href = 'registrasi.php';
             </script>";
        return false;
    }

    // jika username & password sudah sesuai
    // enkripsi password
    $password_baru = password_hash($pw1, PASSWORD_DEFAULT);
    // insert data ke db
    $query = "INSERT INTO users VALUES (NULL, '$username', '$password_baru')";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}
