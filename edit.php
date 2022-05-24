<?php
    // # KODE INI UNTUK MENCEGAH USER PAKSA DIRECT KE CRUD #

    // session_start();
    // if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] == ""){
    //     header("Location: index.php");
    // }
?>

<?php

    require('functions.php');
    if(isset($_GET)){
        $id = $_GET['id'];
        $sql = "SELECT * FROM olahraga WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);

        }
    }
?>