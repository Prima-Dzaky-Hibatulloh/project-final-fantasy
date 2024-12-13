<?php
    session_start();
    require 'koneksi.php';

    $err = false;
    $username = "";
    $remember_me = "";

    if (isset($_COOKIE['key']) && isset($_COOKIE['id'])) {
        $token = $_COOKIE['id'];
        $username = $_COOKIE['key'];

        $sql = mysqli_query($koneksi, "SELECT cookie FROM account WHERE username = '$username'");
        $result = mysqli_fetch_assoc($sql);
        if ($token === $result['cookie']) {
            $_SESSION['sesi_username'] = $username;

            header("Location:start.php");
        }
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember_me = isset($_POST['remember_me']) ? $_POST['remember_me'] : 0 ;

        $sqlquery = mysqli_query($koneksi, "SELECT * FROM account WHERE username = '$username'");
        $query = mysqli_fetch_array($sqlquery);

        if($query){
            if ($query['username'] == "") {
                $err = true;
            }else if (!password_verify($password, $query['password'])) {
                $err = true;
            }
        }else{
            $err = true;
        }

        if ($err == false) {
            //mengambil id untuk session
            $q = mysqli_query($koneksi, "SELECT id FROM account WHERE username = '$username'");
            $akun = mysqli_fetch_array($q);
            $id_user = $akun['id'];
            $_SESSION['sesi_id'] = $id_user;
            $_SESSION['sesi_username'] = $username;

            if ($remember_me == 1) {
                $cookieName = "id";
                $token = bin2hex(random_bytes(32));
                $cookieTime = time() + (60 * 60 * 24 * 30);
                setcookie($cookieName, $token, $cookieTime, "/");
                
                $cookieName = "key";
                $cookieValue = $username;
                $cookieTime = time() + (60 * 60 * 24 * 30);
                setcookie($cookieName, $cookieValue, $cookieTime, "/");

                mysqli_query($koneksi, "UPDATE account SET cookie = '$token' WHERE username = '$username'");
            }

            if ($query['role_id'] == 1) {
                header("Location:admin/admin.php");
            }else{
                header("Location:start.php");
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/login.css?v=1.0">
    <title>Login</title>
</head>
<body>
    <img src="asset-login-register/bulet-logo.png" class="icon">
    <div class="container">
        <h2>LOGIN KE AKUNMU!</h2>
        <section class="login-section">
        <form method="POST" action="login.php">
            <label>Username</label><br>
            <input type="text" name="username" required><br>
            <label>Password</label><br>
            <input type="password" name="password" required><br>
            <input type="checkbox" name="remember_me" value="1" 
                <?php if($remember_me) echo "checked" ?>>
            <label for="remember_me">Remember me</label>
            <a href="reset.php" class="reset">Forgot Password?</a><br><br>
            <input type="submit" name="submit" value="Login"><br>
            
        </section>
        <p>Belum Punya Akun? <a href="register.php">Registrasi</a></p>
    </div>

    <!--ALERT-->
    <div id="alertFail" class="fail hidden">
    <h1>INVALID USERNAME OR PASSWORD </h1>
    <button id="closeAlert" type="button">Back</button>
    </div>

    <!--ALERT JS-->
    <script>
        const failAlert = document.getElementById('alertFail');
        const closeAlert = document.getElementById('closeAlert');

        <?php if($err == true){ ?>
            function regisFail(){
                failAlert.classList.remove('hidden');
            }
            regisFail();
        <?php } ?>

        //button buat balik di alert
        closeAlert.addEventListener("click", function(){
            failAlert.classList.add('hidden')
        })
    </script>
</body>
</html>