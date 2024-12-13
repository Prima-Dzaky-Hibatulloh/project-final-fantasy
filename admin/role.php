<?php
    require '../koneksi.php';
    session_start();

    $usr = $_GET['username'];
    mysqli_query($koneksi, "UPDATE account SET role_id = 1 WHERE username = '$usr'");
    header("Location:admin.php");
?>