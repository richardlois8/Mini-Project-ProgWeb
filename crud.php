<?php
    require('functions.php');

    session_start();
    if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
        header("Location: index.php");
    }

    $sql = "select olahraga.id_olahraga,nama_olahraga,durasi,tipe_olahraga,tingkat_kesulitan,nama_instruktur,nama_peralatan,deskripsi,step,image,video
    from olahraga
    join kesulitan k on k.id_kesulitan = olahraga.id_kesulitan
    join instruktur i on olahraga.id_instruktur = i.id_instruktur
    join tipe_olahraga t on t.id_tipe = olahraga.id_tipe
    join detail_peralatan dp on olahraga.id_olahraga = dp.id_olahraga
    join peralatan p on p.id_peralatan = dp.id_alat;";
    $result = query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleCrud.css">
    <link rel="shortcut icon" href="images/logo-title.png" type="image/x-icon">
    <title>Sehat Dulu | Admin</title>
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
                <th>Peralatan</th>
                <th>Deskripsi</th>
                <th>Langkah</th>
                <th>Gambar</th>
                <th>Video</th>
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
                    echo "<a href='delete.php?id=".$result[$i]['id_olahraga']."'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>
</body>
</html>