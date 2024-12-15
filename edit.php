<?php
    require 'koneksi.php';
    session_start();

    $err = false;
    $succes = false;
    $username_baru = "";
    $email_baru = "";

    if (!isset($_SESSION['sesi_username'])) {
        header("Location:login.php");
    }else{
        $id_user = $_SESSION['sesi_id'];
        //mengambil username
        $q = mysqli_query($koneksi, "SELECT * FROM account WHERE id = '$id_user'");
        $info = mysqli_fetch_array($q);
        $user = $info['username'];
        
        if (isset($_POST['submit'])) {
            $username_baru = $_POST['username'];
            $email_baru = $_POST['email'];

            //ubah username & email
            if (!empty($_POST['email']) && !empty($_POST['username'])) {
                
                $sql = mysqli_query($koneksi, "SELECT * FROM account WHERE email = '$email_baru'");
                if (mysqli_num_rows($sql) > 0) {
                    $err = true;
                }else{
                    mysqli_query($koneksi, "UPDATE account SET username = '$username_baru' WHERE id = '$id_user'");
                    mysqli_query($koneksi, "UPDATE account SET email = '$email_baru' WHERE id = '$id_user'");
                    $succes = true;
                }
                //ubah email
            }elseif (!empty($email_baru)) {
                $email_baru = $_POST['email'];
                
                $sql = mysqli_query($koneksi, "SELECT email FROM account WHERE email = '$email_baru'");
                if (mysqli_num_rows($sql) > 0) {
                    $err = true;
                }else{
                    mysqli_query($koneksi, "UPDATE account SET email = '$email_baru' WHERE id = '$id_user'");
                    $succes = true;
                }
                //ubah username
            }elseif (!empty($username_baru)) {                
                $sql = mysqli_query($koneksi, "SELECT username FROM account WHERE username = '$username_baru'");
                if (mysqli_num_rows($sql) > 0) {
                    $err = true;
                }else{
                    mysqli_query($koneksi, "UPDATE account SET username = '$username_baru' WHERE id = '$id_user'");
                    echo $id_user;
                    $succes = true;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/edit.css">
    <title>Document</title>
</head>
<body>
    <div class="upper-content">
        <a href="mainpage.php"><img src="asset-sinopsis/logo-game.png" class="logo"></a>
        <div class="profil-box">
            <p class="profil"><img class="foto-profil" src="asset-sinopsis/logo-sinopsis.png">Halo, <?= $user; ?>!</p>
            <div class="dropdown-content">
                <a href="edit.php">Edit Profil</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <img src="asset-login-register/bulet-logo.png" class="icon">
    <div class="container">
        <h2>Edit Profil</h2>
        <section class="login-section">
        <form method="POST" action="">
            <label>Username:</label><br>
            <input type="text" name="username"><br><br>
            <label>Email:</label><br>
            <input type="text" name="email"><br><br>
            <a href="reset.php">Klik disini untuk mengganti Password anda</a><br><br>
            <input type="submit" name="submit" value="Simpan"><br>
        </section>
    </div>

    <!--ALERT-->
    <div id="alertCust" class="success hidden">
    <h1>Data Berhasil Diubah</h1>
    <button id="closeAlert">OK</button>
    </div>

    <div id="alertFail" class="fail hidden">
    <h1>INVALID</h1>
    <p id="alertMessage" style="color: #fff; font-size: 20px;">Username atau Email sudah terdaftar</p>
    <button id="closeAlert" type="button">Back</button>
    </div>

    <!--ALERT JS-->
    <script>
        const custAlert = document.getElementById('alertCust');
        const failAlert = document.getElementByID('alertFail');
        const closeAlert = document.getElementById('closeAlert');

        <?php if($succes == true) { ?>
            function regisSuccess(){
                custAlert.classList.remove('hidden');
            }
            regisSuccess();
        <?php } ?>
        
        //Alert Gagal
        function regisFail(){
                failAlert.classList.remove('hidden');
        }

        //button buat balik di alert
        closeAlert.addEventListener("click", function(){
            custAlert.classList.add('hidden')
        })
    </script>
</body>
</html>