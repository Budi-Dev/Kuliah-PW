<?php
session_start();
require 'functions.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_POST['registrasi'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan. Silahkan login.');
                document.location.href = 'login.php';
             </script>";
    } else {
        echo "User baru gagal ditambahkan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>

<body>
    <h3>Form Registrasi</h3>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for='username'>Username</label></td>
                <td>:<input type='text' name='username' id='username' required autofocus autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for='password'>Password</label></td>
                <td>:<input type='password' name='pw1' id='password' required></td>
            </tr>
            <tr>
                <td><label for='password2'>Konfirmasi Password</label></td>
                <td>:<input type='password' name='pw2' id='password2' required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='checkbox' name='cb' value='oke' id='cb'></input>
                    <label for="cb">Show Password!</label>
                </td>
            </tr>
            <tr>
                <td><button type='submit' name='registrasi' value='oke' id='submit'>Registrasi</button></td>
            </tr>
        </table>
    </form>
    <script>
        const pw = document.getElementById('password');
        const pw2 = document.getElementById('password2');
        const cb = document.getElementById('cb');
        const label = document.querySelector("label[for='cb']")

        cb.addEventListener('click', function() {
            if (cb.checked) {
                pw.setAttribute('type', 'text');
                pw2.setAttribute('type', 'text');
                label.innerHTML = "Hide Password";
            } else {
                pw.setAttribute('type', 'password');
                pw2.setAttribute('type', 'password');
                label.innerHTML = "Show Password";
            }
        })
    </script>
</body>

</html>