<?php
    // # KODE INI UNTUK MENCEGAH USER PAKSA DIRECT KE CRUD #

    // session_start();
    // if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
    //     header("Location: index.php");
    // }
?>


<?php
    require('functions.php');
    $id = $_GET['id'];
    $sqlNamaFile = mysqli_query($conn,"SELECT image FROM olahraga WHERE id_olahraga = $id");
    $namaFIle = mysqli_fetch_assoc($sqlNamaFile)["image"];
    echo $namaFIle;

    $sqlDelAlat = mysqli_query($conn,"DELETE FROM detail_peralatan WHERE id_olahraga = $id");
    if($sqlDelAlat){
        $sqlDelOlahraga = mysqli_query($conn,"DELETE FROM olahraga WHERE id_olahraga = $id");
        if($sqlDelOlahraga){
            unlink("images/workout/".$namaFIle);
            echo "<script>alert(Data berhasil dihapus. Data terhapus sebanyak ".mysqli_affected_rows($conn).")</script>;";
        }
    }
?>
