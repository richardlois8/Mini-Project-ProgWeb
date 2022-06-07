<?php
    require('functions.php');
    // # KODE INI UNTUK MENCEGAH USER PAKSA DIRECT KE CRUD #

    session_start();
    if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Dulu | Add</title>
    <link rel="stylesheet" href="css/styleAdd.css?<?php echo time(); ?>">
    <link rel="shortcut icon" href="images/logo-title.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <table v-align="top">
        <div class="form-wrapper">
            <form action="add.php" method="post" enctype="multipart/form-data" >
                <tr>
                    <td>Nama Olahraga </td>
                    <td><input type="text" name="nama_olahraga" id="nama_olahraga" class="form-text" value="<?= isset($_POST['nama_olahraga']) ? $_POST['nama_olahraga'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td><input type="number" name="durasi" id="durasi" class="form-text" value= "<?= isset($_POST['durasi']) ? $_POST['durasi'] : '' ?>"></td>
                </tr>
                <tr>
                    <td>Tipe Olahraga</td>
                    <td>
                        <select name="comboTipe" id="comboTipe">
                        <option selected hidden disabled>Pilih Tipe Olahraga</option>
                            <?php
                                $query = "SELECT * FROM tipe_olahraga ORDER BY tipe_olahraga ASC";
                                $result = mysqli_query($conn,$query);
                                // while($row = mysqli_fetch_assoc($result)){
                                //     echo "<option value = '". $row['id_tipe']. "'>". $row['tipe_olahraga']. "</option>";
                                // }
                                $counter1 = 1;
                                $newIdTipe = isset($_POST['comboTipe']) ? $_POST['comboTipe'] : '';
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
                                // while($row = mysqli_fetch_assoc($result)){
                                //     echo "<option value = '". $row['id_kesulitan']. "'>". $row['tingkat_kesulitan']. "</option>";
                                // }
                                $counter2 = 1;
                                $newIdKesulitan = isset($_POST['comboKesulitan']) ? $_POST['comboKesulitan'] : '';
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
                                // while($row = mysqli_fetch_assoc($result)){
                                //     echo "<option value = '". $row['id_instruktur']. "'>". $row['nama_instruktur']. "</option>";
                                // }
                                $counter3 = 1;
                                $newIdInstruktur = isset($_POST['comboInstruktur']) ? $_POST['comboInstruktur'] : '';
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
                            // while($row = mysqli_fetch_assoc($result)){
                            //     echo "<input type='checkbox' name='comboAlat[]' class='alat' value= '". $row['id_peralatan']. "'>". $row['nama_peralatan']. "</input>";
                            // }
                        ?>
                        <input type="text" id="alat" name="alat" class="form-text" value="<?= isset($_POST['alat']) ? $_POST['alat'] :'' ?>">
                        <p id="lblAlat">*Pisahkan dengan koma</p>
                        <!-- <input type="checkbox" class="comboPeralatan" value="Matras">Matras
                        <input type="checkbox" class="comboPeralatan" value="Dumbbell">Dumbbell -->
                    </td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi" id="deskripsi" class="form-textarea"><?= isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '' ?></textarea></td>
                </tr>
                <tr>
                    <td>Langkah</td>
                    <td><textarea name="step" id="step" class="form-textarea"><?= isset($_POST['step']) ? $_POST['step'] : '' ?></textarea></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg"></td>
                </tr>
                <tr>
                    <td>Link Video</td>
                    <td><input type="text" name="video" id="video" class="form-text" onkeyup="validateVideo()" value= "<?= isset($_POST['video']) ? $_POST['video'] : '' ?>">
                    <p id="lblVideo"></p>
                    </td>
                </tr>
                <tr>
                    <td><a href="crud.php"><< Back</a></td>
                    <td><input type="submit" name ="submit" value="Submit" onclick="validation()"></td>
                </tr>
            </form>
        </div>
    </table>
    
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
<?php $rand = rand(0,9) ?>
<script src="js/add.js?<?= $rand ?>"></script>
</html>

<?php
    if(isset($_POST['submit']) && isset($_POST['nama_olahraga']) && isset($_POST['durasi']) && isset($_POST['comboTipe']) && isset($_POST['comboKesulitan']) && isset($_POST['comboInstruktur']) && isset($_POST['alat']) && isset($_POST['deskripsi']) && isset($_POST['step']) && $_FILES['gambar']['name'] != "" && isset($_POST['video'])){
        $olahraga = $_POST['nama_olahraga'];
        $durasi = $_POST['durasi'];
        $desc = $_POST['deskripsi'];
        $vid = $_POST['video'];
        $tipe = $_POST['comboTipe'];
        $kesulitan = $_POST['comboKesulitan'];
        $gambar = "";
        $step = $_POST['step'];
        $alat = $_POST['alat'];
        $instruktur = $_POST["comboInstruktur"];

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

        $sql = "INSERT INTO olahraga VALUES ('','$olahraga',$durasi,'$desc','$vid',$tipe,$kesulitan,'$gambar','$step','$instruktur','$alat')";
        $id_olahraga = 0;

        if(mysqli_query($conn,$sql)){
            echo "Berhasil menambahkan data<br>";
        }else{
            echo "Gagal menambahkan data<br>";
        }
        
        // $query = mysqli_query($conn,"SELECT id_olahraga FROM olahraga WHERE nama_olahraga LIKE '$olahraga%'");
        // $id_olahraga = mysqli_fetch_assoc($query)["id_olahraga"];
        // echo $id_olahraga;
        // foreach($alat as $id_alat){
        //     $sqlAlat = "INSERT INTO detail_peralatan VALUES('','$id_olahraga','$id_alat')";
        //     mysqli_query($conn,$sqlAlat);
        // }
    }
?>