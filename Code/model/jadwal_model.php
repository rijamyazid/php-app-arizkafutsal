<?php
    function getAllJadwal($con){
        $query = "SELECT * FROM jadwal";
        return mysqli_query($con, $query);
    }

    function getJadwalById($con, $id){
        $query = "SELECT * FROM jadwal WHERE id='$id'";
        return mysqli_fetch_array(mysqli_query($con, $query));
    }
?>