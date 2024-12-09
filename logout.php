<?php
    session_start();
    require 'koneksi.php';

    $username = $_SESSION['sesi_username'];
    if (!empty($username)) {
        mysqli_query($koneksi, "UPDATE account SET cookie = NULL WHERE username = '$username'");        
    }

    //menghapus cookie (remember me)
    $cookieName = "key";
    $cookieValue = "";
    $cookieTime = time() - (60 * 60 * 24 * 30);
    setcookie($cookieName, $cookieValue, $cookieTime, "/");
    
    $cookieName = "id";
    $cookieValue = "";
    $cookieTime = time() - (60 * 60 * 24 * 30);
    setcookie($cookieName, $cookieValue, $cookieTime, "/");

    //menghapus session
    $_SESSION['sesi_username'] = "";
    $_SESSION['sesi_password'] = "";
    session_destroy();

    header("Location:login.php");
?>