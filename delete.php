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
    $sql = "DELETE FROM olahraga WHERE id_olahraga='$id'";
    if(mysqli_query($conn,$sql)){
        echo "<a href='crud.php'>Kembali</a>";
        echo "<script>alert(Berhasil menghapus sebanyak ".mysqli_affected_rows($conn).")</script>;";
    }else{
        echo "Gagal menghapus data";
    }
?>
