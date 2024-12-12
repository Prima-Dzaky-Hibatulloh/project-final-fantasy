<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/materia.css">
    <title>Simulasi Kombinasi Materia</title>
</head>
<body>
    <h1>Temukan Efek Terbaikmu!</h1>
    <h2>Kreasikan Materia Untuk Bertarung</h2>
    <div class="container">
        <div class="materia-block">
            <h2>Pilih Materia</h2>
            <div class="materia-list" data-box="box1">
                <img class="materia-card hijau" src="asset-materia/green.png" data-image="asset-materia/green.png"><br><br>
                <img class="materia-card merah" src="asset-materia/red.png" data-image="asset-materia/red.png"><br><br>
                <img class="materia-card kuning" src="asset-materia/yellow.png" data-image="asset-materia/yellow.png"><br><br>
                <img class="materia-card biru" src="asset-materia/blue.png" data-image="asset-materia/blue.png"><br><br>
                <img class="materia-card ungu" src="asset-materia/purple.png" data-image="asset-materia/purple.png">
            </div>
        </div>
        <div class="result-block">
                <h2>Hasil Kombinasi</h2>
                <div class="materia-box">
                    <div id="box1" class="materia-choice"><img id="img1" src="" style="display: none;"></div>
                    <div class="tambah">+</div>
                    <div id="box2" class="materia-choice"><img id="img2" src="" style="display: none;"></div>
                </div>
                <div id="result" class="result-box"></div>
                <button id="combine" class="combine-btn">COMBINE</button>
        </div>
        <div class="materia-block">
            <h2>Pilih Materia</h2>
            <div class="materia-list" data-box="box2">
                <img class="materia-card hijau" src="asset-materia/green.png" data-image="asset-materia/green.png"><br><br>
                <img class="materia-card merah" src="asset-materia/red.png" data-image="asset-materia/red.png"><br><br>
                <img class="materia-card kuning" src="asset-materia/yellow.png" data-image="asset-materia/yellow.png"><br><br>
                <img class="materia-card biru" src="asset-materia/blue.png" data-image="asset-materia/blue.png"><br><br>
                <img class="materia-card ungu" src="asset-materia/purple.png" data-image="asset-materia/purple.png">
            </div>
        </div>
    </div>

    <script>
        function updateColorBox(boxId, image) {
            const box = document.getElementById(boxId);
            const img = box.querySelector('img');

            img.src = image;
            img.style.display = 'block';
        }

        document.querySelectorAll('.materia-list img').forEach(img => {
            img.addEventListener('click', function () {
                const selectedImage = this.dataset.image;
                const boxId = this.parentElement.dataset.box;
                updateColorBox(boxId, selectedImage);
            });

            document.getElementById('combine').addEventListener('click', () => {
            const materia1 = document.getElementById('box1').querySelector('img').src;
            const materia2 = document.getElementById('box2').querySelector('img').src;
            const resultBox = document.getElementById('result');

            let combineResult = '';
            });
        });
    </script>
</body>
</html>