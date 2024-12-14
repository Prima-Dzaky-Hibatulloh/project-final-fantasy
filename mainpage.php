<?php
    session_start();

    if (!isset($_SESSION['sesi_username'])) {
        header("Location:login.php");
    }else{
        $user = $_SESSION['sesi_username'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/mainpage.css">
    <title>Final Fantasy VII: REBIRTH</title>
</head>
<body>
    <div class="section sinopsis-container">
        <img src="asset-sinopsis/logo-game.png">
        <div class="profil-box">
            <p class="profil"><img class="foto-profil" src="asset-sinopsis/logo-sinopsis.png">Halo, <?= $user; ?>!</p>
            <div class="dropdown-content">
                <a href="edit.php">Edit Profil</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <div class="penjelasan">
            <h1>Sinopsis</h1>
            <p>FINAL FANTASY VII REBIRTH adalah kisah baru yang sangat dinantikan dalam proyek remake FINAL FANTASY VII, sebuah penggambaran ulang dari game ikonik aslinya menjadi tiga judul mandiri oleh para penciptanya. Dalam game ini, pemain akan menikmati berbagai elemen baru seiring dengan perkembangan cerita, yang berpuncak pada perjalanan kelompok menuju "The Forgotten Capital" dari game asli FINAL FANTASY VII.</p>
        </div>
    </div>
    <div id="karakter" class="section karakter-container">
        <div class="karakter-desc">
            <h1>KARAKTER</h1>
            <p>Dalam petualangan mandiri ini untuk para penggemar dan pendatang baru, Cloud dan kawan-kawannya menjelajahi seluruh planet, dengan takdir yang belum tertulis, membuat setiap langkah di luar kota distopia Midgar terasa segar dan penuh misteri.</p>
            <a href="karakter.php"><button>LIHAT KARAKTER</button></a>
        </div>
        <img src="asset-karakter/hero.png">
    </div>
    <div id="map" class="section map-container">
        <h1>DUNIA</h1>
        <div class="map-display">
            <img class="map1" src="asset-map/2-map/1.png">
            <img class="map2" src="asset-map/2-map/2.png">
        </div>
        <p>Dunia ini terdiri dari berbagai wilayah yang beragam, masing-masing memiliki lingkungan unik dengan keindahan dan karakteristik tersendiri yang dapat dijelajahi serta dinikmati oleh para pemain selama menjalani petualangan mereka.</p>
        <a href="map.php"><button>EXPLORE DUNIA FANTASY</button></a>
    </div>
    <div id="kisah" class="section kisah-container">
        <h1>KISAH PERJALANAN</h1>
        <h2>Bayangan Masa Lalu di Nibelheim</h2>
        <div class="kisah-display">
            <p><img src="asset-kisah/gambar-timbul.png">Cerita dimulai dengan Cloud dan Tifa yang menyaksikan kehancuran tragis kampung halaman mereka di Nibelheim, saat Sephiroth mengungkapkan kebenaran yang menghancurkan jiwa. Momen ini meninggalkan luka mendalam di hati mereka dan menjadi fondasi untuk menggerakkan motivasi perjalanan mereka ke depan.</p>
        </div>
        <a href="kisah.php"><button>EXPLORE</button></a>
    </div>
    <div id="materia" class="section materia-container">
        <h1>MATERIA</h1>
        <div class="materia-display">
            <div class="materia-card materia-ungu">
                <img src="asset-materia/purple.png">
                <h4>ATB STAGGER</h4>
                <p>Meningkatkan pengisian Active time battle setiap kali musuh berhasil dalam kondisi stagger</p>
            </div>
            <div class="materia-card materia-kuning">
                <img src="asset-materia/yellow.png">
                <h4>CHAKRA</h4>
                <p>Dapat dipasang pada Senjata untuk menggunakan perintah Chakra.</p>
            </div>
            <div class="materia-card materia-hijau">
                <img src="asset-materia/green.png">
                <h4>EMPOWERMENT</h4>
                <p>Meningkatkan serangan fisik dan sihir saat dipasang pada Senjata atau Armor.</p>
            </div>
            <div class="materia-card materia-biru">
                <img src="asset-materia/blue.png">
                <h4>MP ABSORPTION</h4>
                <p>Memulihkan Magic point saat menggunakan serangan sesuai tipe Materia yang terhubung.</p>
            </div>
            <div class="materia-card materia-merah">
                <img src="asset-materia/red.png">
                <h4>BAHAMUT</h4>
                <p>Memungkinkan pemain memanggil Bahamut saat dipasang pada Senjata atau Armor.</p>
            </div>
        </div>
        <a href="materia.php"><button>COBA KOMBINASI</button></a>
    </div>
    <div class="section footer">
        <div class="content">
            <img src="asset-halman-utama/logo-game.png"> <div class="copyright">&copy; 2024. Dikelola Kelompok 8</div>
        </div>
    </div>

    <script>
        const sections = document.querySelectorAll('.section');
        let currentSection = 0;

        function scrollToSection(index) {
            currentSection = Math.max(0, Math.min(index, sections.length - 1));
            sections[currentSection].scrollIntoView({ behavior: 'smooth' });
        }

        window.addEventListener('wheel', (e) => {
            if (e.deltaY > 0) {
                scrollToSection(currentSection + 1);
            } else {
                scrollToSection(currentSection - 1);
            }
        });
    </script>
</body>
</html>