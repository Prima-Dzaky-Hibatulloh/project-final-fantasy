<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="register.css">
    <title>Registerasi</title>
</head>
<body>
    <img src="asset-login-register/bulet-logo.png" class="icon">
    <div class="container">
        <h2>BUAT AKUN</h2>
        <section class="login-section">
        <form method="POST" action="">
            <label>Email</label><br>
            <input type="text" name="email" required><br><br>
            <label>Username</label><br>
            <input type="text" name="username" required><br><br>
            <label>Kata Sandi<span>*minimal 8 karakter, gunakan angka dan simbol untuk keamanan extra</span></label><br>
            <input type="password" name="password" required><br><br>
            <label>Konfirmasi Ulang Kata Sandi</label><br>
            <input type="password" name="cek-password" required><br><br>
            <input type="submit" name="submit" value="Daftar"><br>
        </section>
        <p>Sudah Punya Akun? <a href="login.php">Masuk Disini</a></p>
    </div>
</body>
</html>