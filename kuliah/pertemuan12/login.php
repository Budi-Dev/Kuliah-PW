<?php
session_start();

require 'functions.php';

if (isset($_SESSION['login'])) {
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    $login = login($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h3>Form Login</h3>
    <?php if (isset($login['error'])) : ?>
        <p style="color: red; font-style: italic;"><?php echo $login['pesan'] ?></p>
    <?php endif ?>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for='username'>Username</label></td>
                <td>: <input type='text' name='username' id='username' required autofocus autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for='password'>Password</label></td>
                <td>: <input type='password' name='password' id='password' required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="checkbox" id="checkbox"><label for="checkbox">Show Password</label></td>
            </tr>
            <tr>
                <td><button type='submit' name='submit' value='oke' id='submit'>Login!</button></td>
            </tr>
            <tr>
                <td><a href="registrasi.php" target="_self">Tambahkan user baru</a></td>
            </tr>
        </table>
    </form>
    <script>
        let password = document.getElementById('password');
        let label = document.querySelector("label[for='checkbox']");
        let attribute = password.getAttribute('type');
        let cb = document.querySelector('#checkbox');

        cb.onclick = function() {
            if (cb.checked) {
                password.setAttribute('type', 'text');
                label.innerHTML = "Hide Password"
            } else {
                password.setAttribute('type', 'password');
                label.innerHTML = "Show Password"
            }
        }
    </script>
</body>

</html>