<?php
    require '../koneksi.php';
    session_start();

    if (!isset($_SESSION['sesi_username'])) {
        header("Location:login.php");
    }else{
        $usr = $_SESSION['sesi_username'];
        $sqlquery = mysqli_query($koneksi, "SELECT * FROM account WHERE username = '$usr'");
        $q = mysqli_fetch_array($sqlquery);
        if ($q['role_id'] == 1) {
            $sql = mysqli_query($koneksi, "SELECT * FROM account WHERE role_id = 2");
            $data = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        }else{
            header("Location:../start.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin Menu</title>
</head>
<body>
    <div class="uppper-section">
        <a href="mainpage.php"><img class="logo" src="../asset-login-register/logo-game.png"></a>
        <div class="profil-box">
            <img class="foto-profil" src="../asset-login-register/bulet-logo.png">
            <div class="nama-profil">
                <p>Halo, Admin!</p>
            </div>
        </div>
    </div>
    <div class="table-section">
        <table>
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
                <th>Action</th>
            </tr>
            <?php if (count($data) > 0){
                foreach ($data as $akun) { ?>
                    <tr>
                        <td><?= $akun['id']; ?></td>
                        <td><?= $akun['username']; ?></td>
                        <td><?= $akun['email']; ?></td>
                        <td><?= $akun['created_at']; ?></td>
                        <td>
                            <a href="role.php?username=<?= $akun['username']; ?>"><button>Admin</button></a>
                            <a href="hapus.php?username=<?= $akun['username']; ?>"><button>Delete</button></a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr><td colspan="4">tidak ada data.</td></tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>