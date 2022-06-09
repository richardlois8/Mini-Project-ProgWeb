<?php
    require('functions.php');
    # KODE INI UNTUK MENCEGAH USER PAKSA DIRECT KE CRUD #

    session_start();
    if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
        header("Location: index.php");
    }
?>

<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM olahraga WHERE id_olahraga = '$id' LIMIT 1";
        $result = mysqli_query($conn,$sql);
        $hasil = mysqli_fetch_assoc($result);
        // $_FILES['gambar']['name'] = $hasil['image'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Dulu | Edit</title>
    <link rel="stylesheet" href="css/styleAdd.css?<?php echo time(); ?>">
    <link rel="shortcut icon" href="images/logo-title.png" type="image/x-icon">
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
                    <input type="hidden" name="id" value="<?php if($id != ""){echo $id;} else{echo "0";}?>">
                    <td>Nama Olahraga </td>
                    <td><input type="text" name="nama_olahraga" id="nama_olahraga" class="form-text" value= "<?= isset($_POST['nama_olahraga']) ? $_POST['nama_olahraga'] : $hasil["nama_olahraga"]; ?>"></td>
                </tr>
                
                <tr>
                    <td>Durasi</td>
                    <td><input type="text" name="durasi" id="durasi" class="form-text" value= "<?= isset($_POST['durasi']) ? $_POST['durasi'] : $hasil["durasi"] ?>" onchange="validateDurasi()">
                    <p id="lblDurasi"></p>
                    </td>
                </tr>

                <tr>
                    <td>Tipe Olahraga</td>
                    <td>
                        <select name="comboTipe" id="comboTipe">
                        <option selected disabled hidden>Pilih Tipe Olahraga</option>
                            <?php
                                $query = "SELECT * FROM tipe_olahraga";
                                $result = mysqli_query($conn,$query);
                                $counter1 = 1;
                                $newIdTipe = isset($_POST['comboTipe']) ? $_POST['comboTipe'] : $hasil["id_tipe"];
                                while($row = mysqli_fetch_assoc($result)){
                                    if(intval($newIdTipe) == $counter1){
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
                    <td>Tingkat Kesulitan</td>
                    <td>
                        <select name="comboKesulitan" id="comboKesulitan">
                        <option selected hidden disabled>Pilih Tingkat Kesulitan</option>
                            <?php
                                $query = "SELECT * FROM kesulitan";
                                $result = mysqli_query($conn,$query);

                                $counter2 = 1;
                                $newIdKesulitan = isset($_POST['comboKesulitan']) ? $_POST['comboKesulitan'] : $hasil["id_kesulitan"];
                                while($row = mysqli_fetch_assoc($result)){
                                    if(intval($newIdKesulitan) == $counter2){
                                        echo "<option selected value = '". $row['id_kesulitan']. "'>". $row['tingkat_kesulitan']. "</option>";
                                    }else{
                                        echo "<option value = '". $row['id_kesulitan']. "'>". $row['tingkat_kesulitan']. "</option>";
                                    }
                                    $counter2+=1;
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Instruktur</td>
                    <td>
                        <select name="comboInstruktur" id="comboInstruktur">
                        <option selected hidden disabled>Pilih Instruktur</option>
                            <?php
                                $query = "SELECT * FROM instruktur";
                                $result = mysqli_query($conn,$query);

                                $counter3 = 1;
                                $newIdInstruktur = isset($_POST['comboInstruktur']) ? $_POST['comboInstruktur'] : $hasil["id_instruktur"];
                                while($row = mysqli_fetch_assoc($result)){
                                    if(intval($newIdInstruktur) == $counter3){
                                        echo "<option selected value = '". $row['id_instruktur']. "'>". $row['nama_instruktur']. "</option>";
                                    }else{
                                        echo "<option value = '". $row['id_instruktur']. "'>". $row['nama_instruktur']. "</option>";
                                    }
                                    $counter3+=1;
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Peralatan</td>
                    <td>
                        <?php
                            // $query = "SELECT * FROM peralatan";
                            // $result = mysqli_query($conn,$query);
                            // $resultDetailPeralatan = mysqli_query($conn,"SELECT id_alat FROM detail_peralatan WHERE id_olahraga = ". $hasil['id_olahraga']."");
                            // $hasilDetPer = mysqli_fetch_assoc($resultDetailPeralatan); // hasildetailperalatan

                            // while($row = mysqli_fetch_assoc($result)){
                            //     // echo "<input type='checkbox' name='comboAlat[]' value= '". $row['id_peralatan']. "'>". $row['nama_peralatan']."</input>";
                            //     echo "<input type='checkbox' name='comboAlat[]' class='alat' value= '". $row['id_peralatan']."' ". ($hasilDetPer['id_alat'] == $row['id_peralatan'] ? 'checked' : '') .">". $row['nama_peralatan']."</input>";
                                
                            // }
                            // echo "<br>";
                            // print_r($hasilDetPer);
                            ?>
                            <input type="text" id="alat" name="alat" class="form-text" value="<?= isset($_POST['alat']) ? $_POST['alat'] : $hasil["alat"] ?>">
                            <p id="lblAlat">*Pisahkan dengan koma</p>
                    </td>
                </tr>

                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi" id="deskripsi" class="form-textarea"><?= isset($_POST['deskripsi']) ? $_POST['deskripsi'] : $hasil["deskripsi"] ?></textarea></td>
                </tr>

                <tr>
                    <td>Langkah</td>
                    <td><textarea name="step" id="step" class="form-textarea"><?= isset($_POST['step']) ? $_POST['step'] : $hasil["step"] ?></textarea></td>
                </tr>

                <tr>
                    <td>Gambar</td>
                    <td><img id="previewImage" src="images/workout/<?= $hasil['image']?>" alt="<?= $hasil['image'] ?>" width="100px" height="100px"> <br>
                        <input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg" value="images/workout/<?= $hasil['image']?>">
                    </td>
                </tr>

                <tr>
                    <td>Link Video</td>
                    <td><input type="text" name="video" id="video" class="form-text" value= "<?= isset($_POST['video']) ? $_POST['video'] : $hasil["video"] ?>"></td>
                </tr>

                <tr>
                    <td><a href="crud.php"><< Back</a></td>
                    <td><input type="submit" name = "submit" value="Submit" onclick="validation()"></td>
                </tr>
            </form>
        </div>
    </table>

</body>
<?php $rand = rand(0,9) ?>
<script src="js/add.js?<?= $rand ?>"></script>
</html>

<?php
    if(isset($_POST["id"]) && isset($_POST['submit']) && isset($_POST['nama_olahraga']) && isset($_POST['durasi']) && isset($_POST['comboTipe']) && isset($_POST['comboKesulitan']) && isset($_POST['comboInstruktur']) && isset($_POST['alat']) && isset($_POST['deskripsi']) && isset($_POST['step']) && $_FILES['gambar']["name"] != "" && isset($_POST['video'])){
        // update
        $id = $_POST["id"];
        $olahraga = $_POST['nama_olahraga'];
        $durasi = $_POST['durasi'];
        $desc = $_POST['deskripsi'];
        $vid = $_POST['video'];
        $tipe = $_POST['comboTipe'];
        $kesulitan = $_POST['comboKesulitan'];
        $newGambar = "";
        $step = $_POST['step'];
        $alat = $_POST['alat'];
        $instruktur = $_POST["comboInstruktur"];

        $sqlNamaFile = mysqli_query($conn,"SELECT image FROM olahraga WHERE id_olahraga = $id");
        $namaFile = mysqli_fetch_assoc($sqlNamaFile)["image"];
        if($sqlNamaFile){
            unlink("images/workout/".$namaFile);
        }
        
        if(isset($_FILES["gambar"]["name"])){
            $ekstensi = explode(".",$_FILES["gambar"]["name"]);
            $newGambar = $olahraga . "." . $ekstensi[1];
            
            $uploadfile = "images/workout/" . $newGambar;
            if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadfile)){
                echo "Sukses mengupload foto<br>";
            }else{
                echo "Gagal mengupload foto<br>";
            }
        }

        mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");

        $sqlUpdateAll = "UPDATE olahraga SET nama_olahraga='$olahraga',durasi='$durasi',deskripsi='$desc',video='$vid',id_tipe='$tipe',id_kesulitan='$kesulitan',image='$newGambar',step='$step',id_instruktur='$instruktur',alat='$alat' WHERE id_olahraga='$id'";
        $sqlUpdateexPic = "UPDATE olahraga SET nama_olahraga='$olahraga',durasi='$durasi',deskripsi='$desc',video='$vid',id_tipe='$tipe',id_kesulitan='$kesulitan',step='$step',id_instruktur='$instruktur',alat='$alat' WHERE id_olahraga='$id'";

        $executeSql = $newGambar == "" ? $sqlUpdateexPic : $sqlUpdateAll;
        if(mysqli_query($conn,$executeSql)){
            echo "<script>alert('Berhasil mengubah data');window.location.href='crud.php';</script>";
        }
        else{
            // echo "<script>alert('Gagal mengubah data');window.location.href='crud.php';</script>";
            echo mysqli_error($conn);
        }
        mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=1;");
    }
    mysqli_close($conn);
    ?>