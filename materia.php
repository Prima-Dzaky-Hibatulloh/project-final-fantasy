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
            <div class="materia-box">
                <div class="materia-card biru"><img src="asset-materia/blue.png"></div>
                <div class="tambah">+</div>
                <div id="box" class="materia-choice"><img id="img2" src="" style="display: none;"></div>
            </div>
            <h3>Pilih Materia Untuk Dikombinasikan dengan Materia Support</h3>
            <div class="materia-list" data-box="box">
                <img class="materia-card hijau" src="asset-materia/green.png" data-image="asset-materia/green.png">
                <img class="materia-card merah" src="asset-materia/red.png" data-image="asset-materia/red.png">
                <img class="materia-card kuning" src="asset-materia/yellow.png" data-image="asset-materia/yellow.png">
            </div>
        </div>
        <div class="result-block">
            <h2>Hasil Kombinasi</h2>
            <div id="result" class="result-box">
            <p>Hasil Combine</p>
            </div>
        <button id="combine" class="combine-btn">COMBINE</button>
        </div>
    </div>
    <script>
        function updateColorBox(boxId, image) {
            const box = document.getElementById(boxId);
            const img = box.querySelector('img');

            img.src = image;
            img.style.display = 'block';
        }
        
        //Memunculkan gambar ketika dipilih
        document.querySelectorAll('.materia-list img').forEach(img => {
            img.addEventListener('click', function () {
                const selectedImage = this.dataset.image;
                const boxId = this.parentElement.dataset.box;
                updateColorBox(boxId, selectedImage);
            });
        
        //Hasil Combine
        document.getElementById('combine').addEventListener('click', () => {
            const materia = document.getElementById('box').querySelector('img').src;
            const resultBox = document.getElementById('result');

            let combineResult = '';

            if (materia.includes('asset-materia/green.png')){
                combineResult = '';
            } else if (materia.includes('asset-materia/yellow.png')){
                combineResult = '';
            } else if (materia.includes('asset-materia/red.png')){
                combineResult = '';
            }

            resultBox.style.li = combineResult ? `url(${combineResult})` : 'none';
            resultBox.textContent = combineResult ? '' : 'Tidak ada hasil';
            });
        });
    </script>
</body>
</html>