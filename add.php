<?php
    require('functions.php');
    // # KODE INI UNTUK MENCEGAH USER PAKSA DIRECT KE CRUD #

    // session_start();
    // if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
    //     header("Location: index.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleAdd.css">
</head>
<body>
    <form action="add.php" method="post" enctype="multipart/form-data">
        Nama Olahraga <input type="text" name="nama_olahraga"><br>

        Durasi <input type="text" name="durasi"><br>

        Deskripsi <br><textarea name="deskripsi"></textarea><br>

        Link Video <input type="text" name="video"><br>

        Tipe Olahraga<br>
        <select name="comboTipe">
        <option value="">Pilih Tipe Olahraga</option>
        <?php
            $query = "SELECT * FROM tipe_olahraga ORDER BY tipe_olahraga ASC";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result)){
                echo "<option value = '". $row['id_tipe']. "'>". $row['tipe_olahraga']. "</option>";
            }
        ?>
        </select>
        <br>

        Tipe Kesulitan<br>
        <select name="comboKesulitan">
        <option value="">Pilih Tingkat Kesulitan</option>
        <?php
            $query = "SELECT * FROM kesulitan";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result)){
                echo "<option value = '". $row['id_kesulitan']. "'>". $row['tingkat_kesulitan']. "</option>";
            }
        ?>
        </select>
        <br>

        Gambar<br>
        <input type="file" name="gambar"><br>

        Langkah <br><textarea name="step"></textarea><br>

        <input type="submit" name = "submit" value="Submit">
    </form>
</body>
</html>

<?php


    if(isset($_POST['submit'])){
        $olahraga = $_POST['nama_olahraga'];
        $durasi = $_POST['durasi'];
        $desc = $_POST['deskripsi'];
        $vid = $_POST['video'];
        $tipe = $_POST['comboTipe'];
        $kesulitan = $_POST['comboKesulitan'];
        $gambar = "";
        $step = $_POST['step'];

        if(isset($_FILES["gambar"]["name"])){
            $ekstensi = explode(".",$_FILES["gambar"]["name"]);
            $gambar = $olahraga . "." . $ekstensi[1];
            
            $uploadfile = "images/workout/" . $gambar;
            if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadfile)){
                echo "Sukses mengupload foto<br>";
            }else{
                echo "Gagal mengupload foto<br>";
            }
        }

        $sql = "INSERT INTO olahraga VALUES ('','$olahraga',$durasi,'$desc','$vid',$tipe,$kesulitan,'$gambar','$step')";
        
        if(mysqli_query($conn,$sql)){
            echo "Berhasil menambahkan data<br>";
        }else{
            echo "Gagal menambahkan data<br>";
        }
    }
?>