<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="reset.css">
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
            <input type="text" name="password" required><br><br>
            <label>Konfirmasi Ulang Kata Sandi</label><br>
            <input type="text" name="confirmPassword" required><br><br>
            <input type="submit" name="submit" value="Periksa Akun"><br>
        </section>
        <p><a href="login.php">Kembali Ke Menu Login</a></p>
    </div>

    <!--ALERT-->
    <div id="alertCust" class="success hidden">
    <h1>Data Berhasil Diubah</h1>
    <button id="closeAlert">OK</button>
    </div>

    <!--ALERT JS-->
    <script>
        const custAlert = document.getElementById('alertCust');
        const closeAlert = document.getElementById('closeAlert');

        function regisFail(){
            custAlert.classList.remove('hidden');
        }
        //button buat balik di alert
        closeAlert.addEventListener("click", function(){
            custAlert.classList.add('hidden')
        })
    </script>
</body>
</html>