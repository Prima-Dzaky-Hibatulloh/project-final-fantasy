<?php
    require '../koneksi.php';
    session_start();

    $usr = $_GET['username'];
    mysqli_query($koneksi, "DELETE FROM account WHERE username = '$usr'");
    header("Location:admin.php");
?>