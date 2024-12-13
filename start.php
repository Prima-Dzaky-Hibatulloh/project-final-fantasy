<?php
    session_start();

    if (!isset($_SESSION['sesi_username'])) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/start.css">
    <title>WELCOME</title>
</head>
<body>
    <div class="container">
    <img src="asset-halman-utama/logo-game.png">
    <h2>Selamat Datang, <?= $_SESSION['sesi_username']; ?>!</h2>
    <a href="mainpage.php">MULAI PETUALANGANMU</a>
    <p>klik di manapun untuk melanjutkan</p>
    </div>

    <script>
        document.addEventListener("click", function () {
            window.location.href = "mainpage.php";
        });
    </script>
</body>
</html>