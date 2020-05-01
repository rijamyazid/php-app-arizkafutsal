<?php
    function getAllTransactions($con){
        $query = "SELECT * FROM transaksi 
                LEFT JOIN user
                ON transaksi.username = user.username
                LEFT JOIN jadwal
                ON transaksi.id_jadwal = jadwal.id_jadwal
                ORDER BY transaksi.id_transaksi DESC";
        return mysqli_query($con, $query);
    }

    function getTransactionById($con, $id){
        $query = "SELECT * FROM transaksi 
                LEFT JOIN user
                ON transaksi.username = user.username
                LEFT JOIN jadwal
                ON transaksi.id_jadwal = jadwal.id_jadwal
                WHERE id_transaksi = '$id'";
        return mysqli_fetch_array(mysqli_query($con, $query));
    }

    function getTransactionsByUsername($con, $username){
        $query = "SELECT * FROM transaksi 
                LEFT JOIN user
                ON transaksi.username = user.username
                LEFT JOIN jadwal
                ON transaksi.id_jadwal = jadwal.id_jadwal
                WHERE transaksi.username = '$username'
                ORDER BY id_transaksi DESC";
        return mysqli_query($con, $query);
    }

    function getTransactionsByDate($con, $tanggal){
        $query = "SELECT * FROM transaksi 
                LEFT JOIN user
                ON transaksi.username = user.username
                LEFT JOIN jadwal
                ON transaksi.id_jadwal = jadwal.id_jadwal
                WHERE transaksi.tanggal = '$tanggal'";
        return mysqli_query($con, $query);
    }

    function insertTransaction($con, $tanggal, $id_jadwal, $username, $id_lapang, $total_bayar){
        $query = "INSERT INTO transaksi (tanggal, id_jadwal, username, id_lapang, total_bayar) 
                VALUES ('$tanggal','$id_jadwal','$username','$id_lapang','$total_bayar')";
        mysqli_query($con, $query);
    }

    function updateTransaction($con, $id_transaksi, $tanggal, $id_jadwal, $username, $id_lapang, $total_bayar){
        $query = "UPDATE transaksi SET tanggal='$tanggal', id_jadwal='$id_jadwal', username='$username', id_lapang='$id_lapang', total_bayar='$total_bayar'
                    WHERE id_transaksi='$id_transaksi'";
        mysqli_query($con, $query);
    }

    function deleteTransactionById($con, $id){
        $query = "DELETE FROM transaksi WHERE id_transaksi='$id'";
        mysqli_query($con, $query);
    }
?>