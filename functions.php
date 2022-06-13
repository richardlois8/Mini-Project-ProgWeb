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

    
    function cari($keyword){
        $contents = "SELECT nama_olahraga,tipe_olahraga,tingkat_kesulitan,deskripsi,image from olahraga Join kesulitan ON kesulitan.id_kesulitan = olahraga.id_kesulitan Join tipe_olahraga ON tipe_olahraga.id_tipe = olahraga.id_tipe WHERE tingkat_kesulitan LIKE '$keyword%' OR nama_olahraga LIKE'$keyword%' OR tipe_olahraga LIKE'$keyword%';";
        return query($contents);
    }

    function advSearch($keyword,$kesulitan,$tipe){
        $contents = "SELECT nama_olahraga,tipe_olahraga,tingkat_kesulitan,deskripsi,image from olahraga Join kesulitan ON kesulitan.id_kesulitan = olahraga.id_kesulitan Join tipe_olahraga ON tipe_olahraga.id_tipe = olahraga.id_tipe WHERE nama_olahraga LIKE'$keyword%' AND olahraga.id_kesulitan = '$kesulitan' AND olahraga.id_tipe = '$tipe';";
        return query($contents);
    }
?>