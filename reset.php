<?php
    require 'koneksi.php';
    session_start();

    $err = false;
    $succes = false;

    if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $email = $_POST['email'];

        $sql = mysqli_query($koneksi, "SELECT * FROM account WHERE username = '$user'");
        if (mysqli_num_rows($sql) > 0) {
            $data_akun = mysqli_fetch_array($sql);
            if ($email == $data_akun['email']) {
                $username = $data_akun['username'];
                $_SESSION['sesi_username'] = $username;
                $token = bin2hex(random_bytes(16));
                mysqli_query($koneksi, "UPDATE account SET token = '$token' WHERE username = '$username'");

                $succes = true;
            }else{
                $err = true;
            }
        }else{
            $err = true;
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
        <h2>PERIKSA AKUN ANDA</h2>
        <p>Silahkan masukan Username dan Email anda untuk mengonfirmasi bahwa akun tersebut milik anda</p>
        <section class="login-section">
        <form method="POST" action="">
            <label>Email</label><br>
            <input type="text" name="email" required><br><br>
            <label>Username</label><br>
            <input type="text" name="username" required><br><br>
            <input type="submit" name="submit" value="Periksa Akun"><br>
        </section>
        <p><a href="login.php">Kembali Ke Menu Login</a></p>
    </div>

    <!--ALERT CUSTOM-->
    <div id="alertSuccess" class="success hidden">
    <h1>AKUN ANDA TERSEDIA</h1>
    <a href="gantiPassword.php?token=<?= $token; ?>"><button type="button">Ganti</button></a>
    </div>
    
    <div id="alertFail" class="fail hidden">
    <h1>INVALID</h1>
    <p style="color: #fff; font-size: 20px;">Username atau Password salah</p>
    <button id="closeAlert" type="button">Back</button>
    </div>

    <!--ALERT JS-->
    <script>
        const successAlert = document.getElementById('alertSuccess');
        const failAlert = document.getElementById('alertFail');
        const closeAlert = document.getElementById('closeAlert');
        
        <?php if($succes == true){ ?>
            regisSuccess();
        <?php } ?>
        
        <?php if($err == true){ ?>
            regisFail();
        <?php } ?>

        //Kalau Berhasil
        function regisSuccess(){
            successAlert.classList.remove('hidden');
        }

        //Kalau Gagal
        function regisFail(){
            failAlert.classList.remove('hidden');
        }

        //button buat balik di alertFail
        closeAlert.addEventListener("click", function(){
            failAlert.classList.add('hidden')
        })
    </script>
</body>
</html>