<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="reset.css">
    <title>Login</title>
</head>
<body>
    <img src="asset-login-register/bulet-logo.png" class="icon">
    <div class="container">
        <h2>PERIKSA AKUN ANDA</h2>
        <p>Silahkan masukan Username dan Email anda untuk mengonfirmasi bahwa akun tersebut milik anda</p>
        <section class="login-section">
        <form method="POST" action="">
            <label><i class="fas fa-user"></i>Email</label><br>
            <input type="text" name="email" required><br><br>
            <label>Username</label><br>
            <input type="text" name="username" required><br><br>
            <input type="submit" name="submit" value="Periksa Akun"><br>
        </section>
        <p><a href="login.php">Kembali Ke Menu Login</a></p>
    </div>
</body>
</html>