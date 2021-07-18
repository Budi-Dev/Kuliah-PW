<?php
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
    header('location: index.php');
    exit;
}

// Ambil id dari url
$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'index.php';
         </script>";
} else {
    echo "<br> Data gagal dihapus!";
}
