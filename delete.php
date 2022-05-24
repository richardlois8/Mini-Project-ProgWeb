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
    $sql = "DELETE FROM olahraga WHERE id='$id'";
    if(mysqli_query($conn,$sql)){
        echo "Berhasil menghapus sebnayak".mysqli_affected_rows($conn);
    }else{
        echo "Gagal menghapus data";
    }
?>
