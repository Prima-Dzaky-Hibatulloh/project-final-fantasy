<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <img src="asset-login-register/bulet-logo.png" class="icon">
    <div class="container">
        <h2>LOGIN KE AKUNMU!</h2>
        <section class="login-section">
        <form method="POST" action="">
            <label>Username</label><br>
            <input type="text" name="username" required><br><br>
            <label>Password</label><br>
            <input type="password" name="password" required><br><br>
            <input type="checkbox" name="remember_me">
            <label for="remember_me">Remember me</label><a href="reset.php" class="reset">Forgot Password?</a><br><br>
            <input type="submit" name="submit" value="Login"><br>
        </section>
        <p>Belum Punya Akun? <a href="register.php">Registerasi</a></p>
    </div>
</body>
</html>