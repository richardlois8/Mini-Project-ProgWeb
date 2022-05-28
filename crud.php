<?php
    require('functions.php');

    session_start();
    if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
        header("Location: index.php");
    }

    $sql = "SELECT * FROM olahraga";
    $result = query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleCrud.css">
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
                <th>Durasi</th>
                <th>Deskripsi</th>
                <th>Video</th>
                <th>ID Tipe</th>
                <th>ID Kesulitan</th>
                <th>Gambar</th>
                <th>Langkah</th>
                <th>ID Instruktur</th>
                <th colspan="2">Action</th>
            </thead>
            <?php
                for ($i=0; $i < count($result); $i++) {
                    echo "<tr>";
                    foreach ($result[$i] as $key => $value) {
                        echo "<td>";
                        echo $value;
                        echo "</td>";
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