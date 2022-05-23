<?php  
require("functions.php");
if($_GET){
    // $allResult = query("SELECT * FROM olahraga WHERE nama_olahraga LIKE '%".$_GET['name']."%'");
    $allResult = query("SELECT nama_olahraga,video,tingkat_kesulitan,durasi,tipe_olahraga,nama_instruktur,nama_peralatan,deskripsi,step FROM olahraga
    join kesulitan k on k.id_kesulitan = olahraga.id_kesulitan
    join tipe_olahraga t on t.id_tipe = olahraga.id_tipe
    join detail_instruktur di on olahraga.id_olahraga = di.id_olahraga
    join detail_peralatan dp on olahraga.id_olahraga = dp.id_olahraga
    join instruktur i on di.id_instruktur = i.id_instruktur
    join peralatan p on dp.id_alat = p.id_peralatan WHERE olahraga.nama_olahraga LIKE '%".$_GET['name']."%'");
    $result = $allResult[0];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Dulu | <?=$result["nama_olahraga"];?></title>
    <link rel="stylesheet" href="css/styleKonten.css">
    <link rel="shortcut icon" href="images/logo-title.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img class="logo" src="images/logo-white.png" alt="logo">
        </div>
        <div class="header-right">
            <a href="index.php">Beranda</a>
            <a href="latihan.php">Latihan</a>
            <a href="kontak.php">Kontak</a>
            <a href="login.php">Login</a>
        </div>
    </header>

    <main>
        <section id="workout-sec">
            <div class="top-wrap">
                <div class="left-content">
                    <iframe width="560" height="315" src="<?=$result['video']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="right-content">
                    <div class="detail-content">
                        <h2><?= $result["nama_olahraga"]  ?></h2>
                        <h3>Level Kesulitan: <span><?= $result["tingkat_kesulitan"]  ?></span> </h3>
                        <h3>Durasi: <span><?=$result["durasi"]." menit" ?></span></h3>
                        <h3>Tipe Olahraga: <span><?= $result["tipe_olahraga"]  ?></span></h3>
                        <h3>Instruktur: <span><?= $result["nama_instruktur"]  ?></span></h3>
                        <h3>Alat</h3>
                        <ul>
                            <li><h3><span><?= $result["nama_peralatan"]  ?></span></h3></li>
                        </ul>
                        <!-- <ul>
                            <li><h3><span>Matras Tipis</span></h3></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="bottom-content">
                <div class="desc">
                    <h2>Deskripsi</h2>
                    <p><?= $result["deskripsi"]  ?></p>
                    <!-- <p>Donkey kicks adalah gerakan yang sangat mudah yang menargetkan tempat di mana bokong dan hamstring kamu bertemu dan membantu kamu mengencangkan otot-otot bokong. Yang lebih menarik adalah bahwa latihan ini juga membantu mengencangkan perut dan memperkuat tulang belakang kamu.</p> -->
                </div>
                <div class="step">
                    <h2>Langkah : </h2>
                    <?= $result['step']  ?>
                    <!-- <ol>
                        <li>Merangkaklah. Dengan telapak tangan diletakkan langsung di bawah bahu dan lutut di bawah pinggul.</li>
                        <li>Pertahankan lutut kanan ditekuk pada 90 derajat, angkat kaki sepenuhnya hingga kamu nyaman.</li>
                        <li>Turunkan lutut Anda tanpa menyentuh lantai, dan angkat lagi. Ulangi 20 kali.</li>
                        <li>Sekarang lakukan hal yang sama dengan kaki kiri kamu.</li>
                    </ol> -->
                </div>
            </div>
        </section>
    </main>

    <footer>
        <!-- <img src="images/logo-black.png" alt="logo"> -->
        <div class="icon">
            <i class="fa fa-facebook fa-2x"></i>
            <i class="fa fa-twitter fa-2x"></i>
            <i class="fa fa-instagram fa-2x"></i>
            <i class="fa fa-whatsapp fa-2x"></i>
        </div>
        <div class="footer-menu">
            <ul>
                <li><a href="#">Workout Videos</a></li>
                <li><a href="#">Instructor</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
        <div class="caption-footer">
            <h3>Sehat Dulu</h3>
            <p>Let's go workout at home | All Rights Reserved</p>
        </div>
    </footer>
</body>
</html>