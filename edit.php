<?php
    require('functions.php');
    // # KODE INI UNTUK MENCEGAH USER PAKSA DIRECT KE CRUD #

    // session_start();
    // if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
    //     header("Location: index.php");
    // }
?>

<?php 
    if(isset($_GET)){
        $id = $_GET['id'];
        $sql = "SELECT * FROM olahraga WHERE id_olahraga = '$id' LIMIT 1";
        $result = mysqli_query($conn,$sql);
        $hasil = mysqli_fetch_assoc($result);

        // if(mysqli_num_rows($result)>0){
        //     $row = mysqli_fetch_assoc($result);
        //     print_r($row);
        // }
    }
?>

<?php
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
    <link rel="stylesheet" href="css/styleAdd.css">
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
            <a href="index.php">Logout</a>
        </div>
    </header>
    <table>
        <div class="form-wrapper">
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <tr>
                    <td>Nama Olahraga </td>
                    <td><input type="text" name="nama_olahraga" class="form-text" value= "<?= $hasil["nama_olahraga"] ?>"></td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td><input type="text" name="durasi" class="form-text" value= "<?= $hasil["durasi"] ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi" class="form-textarea"><?= $hasil["deskripsi"] ?></textarea></td>
                </tr>
                <tr>
                    <td>Link Video</td>
                    <td><input type="text" name="video" class="form-text" value= "<?= $hasil["video"] ?>"></td>
                </tr>
                <tr>
                    <td>Tipe Olahraga</td>
                    <td>
                        <select name="comboTipe" selected= "<?= $hasil["id_tipe"] ?>">
                        <option selected disabled hidden>Pilih Tipe Olahraga</option>
                            <?php
                                $query = "SELECT * FROM tipe_olahraga";
                                $result = mysqli_query($conn,$query);
                                $counter1 = 1;
                                
                                while($row = mysqli_fetch_assoc($result)){
                                    if(intval($hasil["id_tipe"]) == $counter1){
                                        echo "<option selected value = '". $row['id_tipe']. "'>". $row['tipe_olahraga'] . "</option>";
                                    }else{
                                        echo "<option value = '". $row['id_tipe']. "'>". $row['tipe_olahraga']. "</option>";
                                    }
                                    $counter1 += 1;
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tipe Kesulitan</td>
                    <td>
                        <select name="comboKesulitan" selected= "<?= $hasil["id_kesulitan"] ?>">
                        <option value="" selected hidden disabled>Pilih Tingkat Kesulitan</option>
                            <?php
                                $query = "SELECT * FROM kesulitan ORDER BY id_kesulitan ASC";
                                $result = mysqli_query($conn,$query);

                                $counter2 = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    if(intval(intval($hasil["id_kesulitan"])) == $counter2){
                                        echo "<option selected value = '". $row['id_kesulitan']. "'>". $row['tingkat_kesulitan']. "</option>";
                                    }else{
                                        echo "<option value = '". $row['id_kesulitan']. "'>". $row['tingkat_kesulitan']. "</option>";
                                    }
                                    $counter2+=1;
                                }
                            ?>
                            <script>
                                console.log(<?= $hasil["id_kesulitan"] ?>)
                                console.log(<?= $counter2 ?>)
                            </script>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="file" name="gambar" accept="image/png, image/jpeg"></td>
                </tr>
                
                <tr>
                    <td>Langkah</td>
                    <td><textarea name="step" class="form-textarea"><?= $hasil["step"] ?></textarea></td>
                </tr>
                <tr>
                    <td><a href="crud.php"><< Back</a></td>
                    <td><input type="submit" name = "submit" value="Submit"></td>
                </tr>
            </form>
        </div>
    </table>

</body>
</html>

<?php
    // if(isset($_POST['submit'])){
    //     $olahraga = $_POST['nama_olahraga'];
    //     $durasi = $_POST['durasi'];
    //     $desc = $_POST['deskripsi'];
    //     $vid = $_POST['video'];
    //     $tipe = $_POST['comboTipe'];
    //     $kesulitan = $_POST['comboKesulitan'];
    //     $gambar = "";
    //     $step = $_POST['step'];

    //     if(isset($_FILES["gambar"]["name"])){
    //         $ekstensi = explode(".",$_FILES["gambar"]["name"]);
    //         $gambar = $olahraga . "." . $ekstensi[1];
            
    //         $uploadfile = "images/workout/" . $gambar;
    //         if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadfile)){
    //             echo "Sukses mengupload foto<br>";
    //         }else{
    //             echo "Gagal mengupload foto<br>";
    //         }
    //     }

    //     $sql = "INSERT INTO olahraga VALUES ('','$olahraga',$durasi,'$desc','$vid',$tipe,$kesulitan,'$gambar','$step')";
        
    //     if(mysqli_query($conn,$sql)){
    //         echo "Berhasil menambahkan data<br>";
    //     }else{
    //         echo "Gagal menambahkan data<br>";
    //     }
    // }
?>