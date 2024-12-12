<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="edit.css">
    <title>Document</title>
</head>
<body>
    <div class="upper-content">
        <a href="mainpage.php"><img src="asset-sinopsis/logo-game.png" class="logo"></a>
        <div class="profil-box">
            <p class="profil"><img class="foto-profil" src="asset-sinopsis/logo-sinopsis.png">Halo, <!--php-->!</p>
            <div class="dropdown-content">
                <a href="">Edit Profil</a>
                <a href="">Logout</a>
            </div>
        </div>
    </div>
    <img src="asset-login-register/bulet-logo.png" class="icon">
    <div class="container">
        <h2>Edit Profil</h2>
        <section class="login-section">
        <form method="POST" action="">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            <label>Email:</label><br>
            <input type="text" name="email" required><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            <input type="submit" name="submit" value="Simpan"><br>
        </section>
</body>
</html>