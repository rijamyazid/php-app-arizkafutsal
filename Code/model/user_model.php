<?php
    function getAllUsers($con){
        $query = "SELECT * FROM user";
        $result = mysqli_query($con, $query);

        return $result;
    }

    function getUserByUsername($con, $username){
        $query = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($con, $query);

        return  mysqli_fetch_array($result);
    }

    function insertUserReg($con, $username, $nama, $email, $saldo, $password){
        $query = "INSERT INTO user (username, nama, email, saldo, password) VALUES 
                ('$username', '$nama', '$email', '0', '$password')";
        mysqli_query($con, $query);
    }

    function insertUser($con, $foto, $username, $nama, $email, $nohp, $saldo, $alamat, $password){
        $query = "INSERT INTO user (username, nama, email, no_hp, foto, saldo, alamat, password) VALUES 
                ('$username', '$nama', '$email', '$nohp', '$foto', '$saldo', '$alamat', '$password')";
        mysqli_query($con, $query);
    }

    function deleteUserByUsername($con, $username){
        $query = "DELETE FROM user WHERE username='$username'";
        mysqli_query($con, $query);
    }

    function updateUser($con, $foto, $username, $nama, $email, $nohp, $saldo, $alamat, $password){
        $query = "UPDATE user SET foto='$foto', nama='$nama', email='$email', no_hp='$nohp', saldo='$saldo', alamat='$alamat', password='$password'
                WHERE username='$username'";
        mysqli_query($con, $query);
    }

    function updateUserSaldo($con, $username, $saldo){
        $query = "UPDATE user SET saldo='$saldo'
                WHERE username='$username'";
        mysqli_query($con, $query);
    }
?>