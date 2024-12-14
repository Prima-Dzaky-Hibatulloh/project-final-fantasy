<?php
    require 'koneksi.php';
    session_start();

    $err = false;
    $succes = false;
    if (!isset($_SESSION['sesi_username'])) {
        header("Location:login.php");
    }else{
        $user = $_SESSION['sesi_username'];
        $token = $_GET['token'];
        $sql = mysqli_query($koneksi, "SELECT token FROM account WHERE username = '$user'");
        $q = mysqli_fetch_array($sql);

        if ($token) {
            if ($q['token'] === $token) {
                if (isset($_POST['submit'])) {
                    $pass = $_POST['password'];
                    $pass2 = $_POST['confirmPassword'];
            
                    if ($pass === $pass2) {
                        $password = password_hash($pass, PASSWORD_DEFAULT);
                        $sqlquery = mysqli_query($koneksi, "UPDATE account SET password = '$password' WHERE username = '$user'");
                        
                        $succes = true;
                    }else{
                        $err = true;
                    }
                }
            }else {
                header("Location:reset.php");
            }
        }else{
            header("Location:reset.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/reset.css">
    <title>Login</title>
</head>
<body>
    <img src="asset-login-register/bulet-logo.png" class="icon">
    <div class="container">
        <h2>BUAT PASSWORD BARU</h2>
        <p>*minimal 8 karakter, gunakan angka & simbol untuk keamanan extra</p>
        <section class="login-section">
        <form method="POST" action="">
            <label>Kata Sandi Baru</label><br>
            <input type="password" name="password" required><br><br>
            <label>Konfirmasi Ulang Kata Sandi</label><br>
            <input type="password" name="confirmPassword" required><br><br>
            <input type="submit" name="submit" value="Submit"><br>
        </section>
        <p><a href="login.php">Kembali Ke Menu Login</a></p>
    </div>

    <!--ALERT-->
    <div id="alertCust" class="success hidden">
    <h1>Data Berhasil Diubah</h1>
    <button id="closeAlert" type="button">OK</button>
    </div>
    
    <div id="alertFail" class="fail hidden">
    <h1>INVALID</h1>
    <p id="alertMessage" style="color: #fff; font-size: 20px;">Password Tidak Sesuai</p>
    <button id="closeAlert" type="button">Back</button>
    </div>

    <!--ALERT JS-->
    <script>
        const custAlert = document.getElementById('alertCust');
        const closeAlert = document.getElementById('closeAlert');

        <?php if ($succes == true) { ?>
            regisSucces();
        <?php } ?>

        function regisSucces(){
            custAlert.classList.remove('hidden');
        }

        function regisFail(){
            alertMessage.textContent = "Konfirmasi Password Salah";
            failAlert.classList.remove('hidden');
        }

        //button buat balik di alert
        closeAlert.addEventListener("click", function(){
            custAlert.classList.add('hidden')
        })
    </script>
</body>
</html>