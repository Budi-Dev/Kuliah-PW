<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

$_SESSION['login'] = null;
session_destroy();
header('Location: login.php');
