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
    <a href="gantiPassword.php"><button>Ganti</button></a>
    </div>
    
    <div id="alertFail" class="fail hidden">
    <h1>INVALID PASSWORD</h1>
    <button id="closeAlert">Back</button>
    </div>

    <!--ALERT JS-->
    <script>
        const successAlert = document.getElementById('alertSuccess');
        const failAlert = document.getElementById('alertFail');
        const closeAlert = document.getElementById('closeAlert');
        
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