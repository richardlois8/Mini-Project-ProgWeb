<?php
    $conn = mysqli_connect("localhost","root","","data_miniproject");

    function query($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    
    function normalSearch($keyword){
        $sql = "SELECT nama_olahraga,tipe_olahraga,tingkat_kesulitan,deskripsi,image from olahraga Join kesulitan ON kesulitan.id_kesulitan = olahraga.id_kesulitan Join tipe_olahraga ON tipe_olahraga.id_tipe = olahraga.id_tipe WHERE tingkat_kesulitan LIKE '$keyword%' OR nama_olahraga LIKE'$keyword%' OR tipe_olahraga LIKE'$keyword%';";
        return query($sql);
    }

    function advSearch($keyword,$kesulitan,$tipe){
        // Untuk kombinasi ketiga pencarian
        if($keyword != '' && $kesulitan != '' && $tipe != ''){
            $sql = "SELECT nama_olahraga,tipe_olahraga,tingkat_kesulitan,deskripsi,image from olahraga Join kesulitan ON kesulitan.id_kesulitan = olahraga.id_kesulitan Join tipe_olahraga ON tipe_olahraga.id_tipe = olahraga.id_tipe WHERE nama_olahraga LIKE'$keyword%' AND olahraga.id_kesulitan = '$kesulitan' AND olahraga.id_tipe = '$tipe';";
        }
        // Untuk cari berdasarkan kesulitan saja
        else if($keyword == "" && $kesulitan != "" && $tipe == ""){
            $sql = "SELECT nama_olahraga,tipe_olahraga,tingkat_kesulitan,deskripsi,image from olahraga Join kesulitan ON kesulitan.id_kesulitan = olahraga.id_kesulitan Join tipe_olahraga ON tipe_olahraga.id_tipe = olahraga.id_tipe WHERE olahraga.id_kesulitan = '$kesulitan';";
        }
        // Untuk cari berdasarkan tipe saja
        else if($keyword == "" && $kesulitan == "" && $tipe != ""){
            $sql = "SELECT nama_olahraga,tipe_olahraga,tingkat_kesulitan,deskripsi,image from olahraga Join kesulitan ON kesulitan.id_kesulitan = olahraga.id_kesulitan Join tipe_olahraga ON tipe_olahraga.id_tipe = olahraga.id_tipe WHERE olahraga.id_tipe = '$tipe';";
        }
        // Untuk kombinasi keyword dan kesulitan
        else if($keyword != '' && $kesulitan != ''){
            $sql = "SELECT nama_olahraga,tipe_olahraga,tingkat_kesulitan,deskripsi,image from olahraga Join kesulitan ON kesulitan.id_kesulitan = olahraga.id_kesulitan Join tipe_olahraga ON tipe_olahraga.id_tipe = olahraga.id_tipe WHERE nama_olahraga LIKE'$keyword%' AND olahraga.id_kesulitan = '$kesulitan';";
        }
        // Untuk kombinasi keyword dan tipe
        else if($keyword != '' && $tipe != ''){
            $sql = "SELECT nama_olahraga,tipe_olahraga,tingkat_kesulitan,deskripsi,image from olahraga Join kesulitan ON kesulitan.id_kesulitan = olahraga.id_kesulitan Join tipe_olahraga ON tipe_olahraga.id_tipe = olahraga.id_tipe WHERE nama_olahraga LIKE'$keyword%' AND olahraga.id_tipe = '$tipe';";
        }
        // Untuk kombinasi kesulitan dan tipe
        else if($kesulitan != '' && $tipe != ''){
            $sql = "SELECT nama_olahraga,tipe_olahraga,tingkat_kesulitan,deskripsi,image from olahraga Join kesulitan ON kesulitan.id_kesulitan = olahraga.id_kesulitan Join tipe_olahraga ON tipe_olahraga.id_tipe = olahraga.id_tipe WHERE olahraga.id_kesulitan = '$kesulitan' AND olahraga.id_tipe = '$tipe';";
        }
        return query($sql);
    }
?>