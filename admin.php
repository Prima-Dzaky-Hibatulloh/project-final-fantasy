<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Menu</title>
</head>
<body>
    <div class="uppper-section">
        <a href="mainpage.php"><img class="logo" src="asset-login-register/logo-game.png"></a>
        <div class="profil-box">
            <img class="foto-profil" src="asset-login-register/bulet-logo.png">
            <div class="nama-profil">
                <p>Halo, Admin!</p>
            </div>
        </div>
    </div>
    <div class="table-section">
        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Tanggal Daftar</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><!--PHP--></td>
                <td><!--PHP--></td>
                <td><!--PHP--></td>
                <td><!--PHP--></td>
                <td><!--PHP--></td>
                <td>
                    <button id="editBtn" class="edit" onclick="editUser()">Edit</button>
                    <button id="deleteBtn" class="delete">Delete</button>
                </td>
            </tr>
        </table>
    </div>

    <div id="editBox" class="container hidden">
        <h2>Edit Profil</h2>
        <section class="login-section">
        <form method="POST" action="">
            <label>Username:</label><br>
            <input type="text" name="username"><br><br>
            <label>Email:</label><br>
            <input type="text" name="email"><br><br>
            <a href="reset.php">Klik disini untuk mengganti Password anda</a><br><br>
            <input type="submit" name="submit" value="Simpan"><br>
        </section>
    </div>

    <script>
        const editBtn = document.getElementById('editBtn');
        const editBox = document.getElementById('editBox');

        function editUser(){
            editBox.classList.remove('hidden');
        }
        
        closeBtn.addEventListener("click", function(){
            editBox.classList.add('hidden')
        })
    </script>
</body>
</html>