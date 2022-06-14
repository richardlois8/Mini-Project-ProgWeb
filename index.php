<?php 
    require('functions.php'); // connect database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Dulu | Beranda</title>
    <link rel="stylesheet" type="text/css" href="css/styleIndex.css?<?php echo time(); ?>">
    <link rel="shortcut icon" href="images/logo-title.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/js" src=""></script>
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
        <div class="top-wrapper">
            <div class="top-left">
                <h2>Dapatkan tubuh ideal <br>Dimulai dari rutinitas<br>Mudah dilakukan dari rumah Anda</h2>
                <h4>Punya tubuh ideal bukan lagi sebuah Impian!<br>Mulailah bentuk tubuh Anda hari ini</h4>
                
                <!-- bikin form buat search -->
                <div class="search">
                    <form action="index.php" method="post">
                        <input id="search-box" type="text" placeholder="Cari Latihan" autocomplete="off" name="keyword">
                        <button type="search" id="search-button" name="search">
                            <a href="#result"><i class="fa fa-search"></i></a>
                        </button>
                        
                        <select name="comboTipe" id="comboTipe">
                            <option selected hidden disabled>Tipe Olahraga</option>
                            <option value="1">Hiit</option>
                            <option value="2">Yoga</option>
                            <option value="3">Cardio</option>
                        </select>

                        <select name="comboKesulitan" id="comboKesulitan">
                            <option selected hidden disabled>Tingkat Kesulitan</option>
                            <option value="1">Beginner</option>
                            <option value="2">Intermediate</option>
                            <option value="3">Advance</option>
                        </select>

                    </form>        
                </div>
            </div>
        </div>
        
        <div class="mid-wrapper">
            <div class="mid-left">
                <h3>Mudah</h3>
                <p>Latihan yang kami sediakan terjamin mudah. Sesuaikan keahlian Anda dengan latihan yang cocok untuk Anda.</p>
            </div>
            <div class="mid-mid">
                <h3>Gratis</h3>
                <p>Latihan yang kami sediakan 100% gratis. Tidak ada biaya tambahan yang dikenakan kepada Anda.</p>
            </div>
            <div class="mid-right">
                <h3>Akurat</h3>
                <p>Latihan yang kami sediakan sudah dikaji oleh para ahli di bidang kebugaran.</p>
            </div>
        </div>
        
        <div class="contents-wrap" id="result">
            <h2 class="title-workout">Choose your workout</h2>
            <table>
                <?php  
                    $contents = query("SELECT nama_olahraga,image FROM olahraga");

                    if(isset($_POST["search"])){
                        // Untuk pencarian berdasarkan nama olahraga, tipe, tingkat kesulitan
                        if(isset($_POST['keyword']) && isset($_POST['comboKesulitan']) && isset($_POST['comboTipe'])){
                            $contents = advSearch($_POST['keyword'],$_POST['comboKesulitan'],$_POST['comboTipe']);
                        // Untuk pencarian hanya berdasarkan combo box tipe dan kolom search kosong
                        }else if($_POST['keyword'] == "" && isset($_POST['comboKesulitan'])){
                            $contents = normalSearch($_POST["comboKesulitan"]);
                        // Untuk pencarian hanya berdasarkan combo box kesulitan dan kolom search kosong
                        }else if($_POST['keyword'] == "" && isset($_POST['comboTipe'])){
                            $contents = normalSearch($_POST["comboTipe"]);
                        // Untuk pencarian hanya berdasarkan kolom search dan combo box kesulitan
                        }else if($_POST['keyword'] != "" && isset($_POST['comboKesulitan'])){
                            $contents = advSearch($_POST['keyword'],$_POST['comboKesulitan'],'');
                        // Untuk pencarian hanya berdasarkan kolom search dan combo box tipe
                        }else if($_POST['keyword'] != "" && isset($_POST['comboTipe'])){
                            $contents = advSearch($_POST['keyword'],'',$_POST['comboTipe']);
                        // Untuk pencarian hanya berdasarkan combo box kesulitan dan combo box tipe dengan kolom search kosong
                        }else if(isset($_POST['comboKesulitan']) && isset($_POST['comboTipe'])){
                            $contents = advSearch('',$_POST['comboKesulitan'],$_POST['comboTipe']);
                        // Untuk pencarian hanya berdasarkan kolom search
                        }else{
                            $contents = normalSearch($_POST["keyword"]);
                        }

                        foreach($contents as $content){
                            echo "<tr>";
                            echo '<div class="search-content">';
                            echo '<img class="img-content-search" src="images/workout/'.$content['image'].'" alt='.$content['nama_olahraga'].'>';
                            echo '<h2><a href="konten.php?name='.$content['nama_olahraga'].'">'.$content['nama_olahraga'].'</a></h2>';
                            echo '<h3> Tipe Olahraga : <span>'.$content['tipe_olahraga'].'</span></h3>';
                            echo '<h3> Tingkat Kesulitan : <span>'.$content['tingkat_kesulitan'].'</span></h3>';
                            echo '<p>'.$content['deskripsi'].' <a href="konten.php?name='.$content['nama_olahraga'].'">Lihat lebih lengkap...</a></p>';
                            echo "</div>";
                            echo "</tr>";
                        }
                    }
                    else{
                        $column = 1;
                        foreach($contents as $content){
                            if($column%3 == 1){
                                echo "<tr>";
                            }

                            echo "<td>";
                            echo '<div class="wrap-image">';
                            echo '<img class="img-content" src="images/workout/'.$content['image'].'" alt='.$content['nama_olahraga'].'>';
                            echo '<div class="img-overlay">';
                            echo '<div class="title"><a href="konten.php?name='.$content['nama_olahraga'].'"><h3>'.$content['nama_olahraga'].'</h3></a></div>';
                            echo "</div>";
                            echo "</div>";
                            echo "</td>";

                            if($column%3 == 0){
                                echo "</tr>";
                            }
                            $column += 1;
                        }
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
<script src="js/index.js"></script>
</html>