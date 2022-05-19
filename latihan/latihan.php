<?php require('../functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
    <link rel="stylesheet" href="styleLatihan.css">
    <link rel="shortcut icon" href="../images/logo-title.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img class="logo" src="../images/logo-white.png" alt="logo">
        </div>
        <div class="header-right">
            <a href="../index.php">Beranda</a>
            <a href="latihan.php">Latihan</a>
            <a href="../kontak/kontak.php">Kontak</a>
            <a href="../daftar/daftar.php">Login</a>
        </div>
    </header>

    <main>
        <div class="contents-wrap">
            <h2 class="title-workout">Let's Go Workout!</h2>
            <h4>Choose your favorite workout</h4>
            <table>
            <?php   $contents = query("SELECT nama_olahraga,image FROM olahraga;");
                        $column = 1;
                        foreach($contents as $content){
                            if($column == 1 || $column == 4){
                                echo "<tr>";
                            }

                            echo "<td>";
                            echo '<div class="wrap-image">';
                            echo '<img class="img-content" src="../images/workout/'.$content['image'].'" alt='.$content['nama_olahraga'].'>';
                            echo '<div class="img-overlay">';
                            echo '<div class="title"><a href="../konten/konten.php?name='.$content['nama_olahraga'].'"><h3>'.$content['nama_olahraga'].'</h3></a></div>';
                            echo "</div>";
                            echo "</div>";
                            echo "</td>";

                            if($column == 3 || $column == 6){
                                echo "</tr>";
                            }
                            $column += 1;
                        }
                ?>
            </table>
        </div>
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