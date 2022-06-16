<?php  
require("functions.php");
if($_GET){
    $allResult = query("SELECT nama_olahraga,video,tingkat_kesulitan,durasi,tipe_olahraga,nama_instruktur,deskripsi,step,alat FROM olahraga
    join kesulitan k on k.id_kesulitan = olahraga.id_kesulitan
    join tipe_olahraga t on t.id_tipe = olahraga.id_tipe
    join instruktur i on olahraga.id_instruktur = i.id_instruktur
    WHERE olahraga.id_olahraga =".$_GET['id'].";");
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
    <link rel="stylesheet" href="css/styleKonten.css?<?php echo time(); ?>">
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
                        <h3 id="titleAlat">Alat</h3>
                        <table>
                            <ul>
                                <?php
                                    $alat = explode(",", $result["alat"]);
                                    if(count($alat) % 2 == 0){
                                        for($i=0;$i<count($alat);$i+=2){
                                            echo "<tr>";
                                            echo "<td><li><h3><span>".$alat[$i]."</span></h3></li></td>";
                                            echo "<td><li><h3><span>".$alat[$i+1]."</span></h3></li></td>";
                                            echo "</tr>";
                                        }
                                    }
                                    else{
                                        for($i=0; $i<count($alat); $i+=2){
                                            echo "<tr>";
                                            if(isset($alat[$i+1])){
                                                echo "<td><li><h3><span>".$alat[$i]."</span></h3></li></td>";
                                                echo "<td><li><h3><span>".$alat[$i+1]."</span></h3></li></td>";
                                            }
                                            else {
                                                echo "<td><li><h3><span>".$alat[$i]."</span></h3></li></td>";
                                            }
                                            echo "</tr>";
                                        }
                                    }
                                    
                                    ?>
                            </ul>
                        </table>
                    </div>
                </div>
            </div>
            <div class="bottom-content">
                <div class="desc">
                    <h2>Deskripsi</h2>
                    <p><?= $result["deskripsi"]  ?></p>
                </div>
                <div class="step">
                    <h2>Langkah : </h2>
                    <ol>
                    <?php
                        foreach(explode(".",$result['step']) as $line){
                            if(is_numeric($line) || $line == null){
                               continue;
                            }
                            else{
                                echo "<li>".$line."</li>";
                            }
                        }
                    ?>
                    </ol>
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