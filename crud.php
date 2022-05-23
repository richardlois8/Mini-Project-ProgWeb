<?php
    require('functions.php');

    // session_start();
    // if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
    //     header("Location: index.php");
    // }

    $sql = "SELECT * FROM olahraga";
    $result = query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Dulu | Admin</title>
</head>
<body>
    <h2>
        <a href="">+ Add Record</a>
    </h2>

    <table border="1px">
        <thead>
            <th>ID Olahraga</th>
            <th>Nama</th>
            <th>Durasi</th>
            <th>Deskripsi</th>
            <th>Video</th>
            <th>ID Tipe</th>
            <th>ID Kesulitan</th>
            <th>Gambar</th>
            <th>Langkah</th>
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
                echo "<a href=''>Edit</a>";
                echo "</td>";

                echo "<td>";
                echo "<a href=''>Delete</a>";
                echo "</td>";
            }
            echo "</tr>";
        ?>
    </table>
</body>
</html>