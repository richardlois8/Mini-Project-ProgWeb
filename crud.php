<?php
    require('functions.php');

    session_start();
    if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
        header("Location: index.php");
    }

    $sql = "SELECT olahraga.id_olahraga,nama_olahraga,durasi,tipe_olahraga,tingkat_kesulitan,nama_instruktur,deskripsi,step,image,video,alat
    FROM olahraga
    JOIN kesulitan k on k.id_kesulitan = olahraga.id_kesulitan
    JOIN instruktur i on olahraga.id_instruktur = i.id_instruktur
    JOIN tipe_olahraga t on t.id_tipe = olahraga.id_tipe
    ORDER BY nama_olahraga;";
    $result = query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleCrud.css?<?php echo time(); ?>">
    <link rel="shortcut icon" href="images/logo-title.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sehat Dulu | Admin</title>
</head>
<body>
    <header>
        <div class="header-left">
            <img class="logo" src="images/logo-white.png" alt="logo">
        </div>
        <div class="header-right">
            <a href="index.php">Beranda</a>
            
            <a href="kontak.php">Kontak</a>
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <main>
        <h2>
            <a href="add.php">+ Add Record</a>
        </h2>

        <table>
            <thead>
                <th>#</th>
                <th>Nama</th>
                <th>Durasi (menit)</th>
                <th>Tipe</th>
                <th>Kesulitan</th>
                <th>Instruktur</th>
                <th>Deskripsi</th>
                <th>Langkah</th>
                <th>Gambar</th>
                <th>Video</th>
                <th>Peralatan</th>
                <th colspan="2">Action</th>
            </thead>
            <?php
                for ($i=0; $i < count($result); $i++) {
                    echo "<tr>";
                    foreach ($result[$i] as $key => $value) {
                        if($key == "id_olahraga"){
                            echo "<td>";
                            echo $i+1;
                            echo "</td>";
                        }
                        else{
                            echo "<td>";
                            echo $value;
                            echo "</td>";
                        }
                    }

                    echo "<td>";
                    echo "<a href='edit.php?id=".$result[$i]['id_olahraga']."'>Edit</a>";
                    echo "</td>";

                    echo "<td>";
                    echo "<a href='delete.php?id=".$result[$i]['id_olahraga']."' onclick=\"return confirm('Apakah anda yakin menghapus olahraga ".$result[$i]['nama_olahraga']."?')\" >Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>

    <footer>
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