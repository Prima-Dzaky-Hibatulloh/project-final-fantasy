<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <img src="asset/icon.png" class="icon">
    <div class="container">
        <h2>Login Your Account</h2>
        <section class="login-section">
        <form method="POST" action="">
            <label><i class="fas fa-user"></i>Username</label><br>
            <input type="text" name="username" required><br><br>
            <label>Password</label><br>
            <input type="password" name="password" required><br><br>
            <input type="checkbox" name="remember_me">
            <label for="remember_me">Remember me</label><br><br>
            <input type="submit" name="submit" value="Login"><br>
        </section>
        <p>Belum Punya Akun? <a href="">Registerasi</a></p>
    </div>
</body>
</html>