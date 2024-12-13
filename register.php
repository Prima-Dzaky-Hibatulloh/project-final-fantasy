<?php
    require 'koneksi.php';

    $err1 = "";
    $err2 = "";
    $err3 = false;
    $err4 = "";
    $succes = false;

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $passCek = $_POST['cek-password'];

        //cek email
        $return = mysqli_query($koneksi, "SELECT email FROM account WHERE email = '$email'");
        if (mysqli_fetch_assoc($return)) {
            $err1 .= "<font>email sudah terdaftar!</font>";
        }else{
            //cek username
            $hasil = mysqli_query($koneksi, "SELECT username FROM account WHERE username = '$user'");
            if (mysqli_fetch_assoc($hasil)) {
                $err2 .= "<font>username <b>" . $user . "</b> tidak tersedia!</font>";
            }else{
                //minimal 8 karakter
                if (strlen($pass) < 8) {
                    $err4 .= "<font>password minimal memiliki 8 karakter</font>";
                }else {
                    //konfir password
                    if ($pass === $passCek) {
                        $password = password_hash($pass, PASSWORD_DEFAULT);
    
                        mysqli_query($koneksi, "INSERT INTO account (email, username, password) VALUES ('$email', '$user', '$password')");
                        $succes = true;
                    }else{
                        $err3 = true;
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/register.css?v=1.0">
    <title>Registerasi</title>
</head>
<body>
    <img src="asset-login-register/bulet-logo.png" class="icon">
    <div class="container">
        <h2>BUAT AKUN</h2>
        <section class="login-section">
        <form method="POST" action="">
            <label>Email</label><br>
            <input type="text" name="email" required><br>
            <?php if ($err1) echo $err1 . "<br>"; ?><br>
            <label>Username</label><br>
            <input type="text" name="username" required><br>
            <?php if ($err2) echo $err2 . "<br>"; ?><br>
            <label>Kata Sandi<span>*minimal 8 karakter, gunakan angka dan simbol untuk keamanan extra</span></label><br>
            <input type="password" name="password" required><br>
            <?php if ($err4) echo $err4 . "<br>"; ?><br>
            <label>Konfirmasi Ulang Kata Sandi</label><br>
            <input type="password" name="cek-password" required><br><br>
            <input type="submit" name="submit" value="Daftar"><br>
        </section>
        <p>Sudah Punya Akun? <a href="login.php">Masuk Disini</a></p>
    </div>
    
    <!--ALERT CUSTOM-->
    <div id="alertSuccess" class="success hidden">
    <h1>BERHASIL!</h1>
    <p>Silahkan tekan tombol dibawah untuk melanjutkan ke halaman login</p>
    <a href="login.php"><button type="button">Next</button></a>
    </div>
    
    <div id="alertFail" class="fail hidden">
    <h1>INVALID PASSWORD</h1>
    <button id="closeAlert" type="button">Back</button>
    </div>

    <!--ALERT JS-->
    <script>
        const successAlert = document.getElementById('alertSuccess');
        const failAlert = document.getElementById('alertFail');
        const closeAlert = document.getElementById('closeAlert');
        
        //Kalau Berhasil
        <?php if($succes == true){ ?>
            function regisSuccess(){
                successAlert.classList.remove('hidden');
            }
            regisSuccess();
        <?php } ?>

        //Kalau Gagal
        <?php if($err3 == true){ ?>
            function regisFail(){
                failAlert.classList.remove('hidden');
            }
            regisFail();
        <?php } ?>
        
        //button buat balik di alertFail
        closeAlert.addEventListener("click", function(){
            failAlert.classList.add('hidden')
        })
    </script>
</body>
</html>