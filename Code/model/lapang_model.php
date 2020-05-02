<?php
    function getAllLapang($con){
        $query = "SELECT * FROM lapangan";
        return mysqli_query($con, $query);
    }

    function getLapangById($id){
        $query = "SELECT * FROM lapangan WHERE id_lapang=$id";
        return mysqli_fetch_array(mysqli_query($con, $query));
    }
?>