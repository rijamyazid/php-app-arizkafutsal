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

    function insertUser($con, $username, $nama, $email, $nohp, $saldo, $password){
        $query = "INSERT INTO user (username, nama, email, no_hp, saldo, password) VALUES 
                ('$username', '$nama', '$email', '$nohp', '$saldo', '$password')";
        mysqli_query($con, $query);
    }

    function deleteUserByUsername($con, $username){
        $query = "DELETE FROM user WHERE username='$username'";
        mysqli_query($con, $query);
    }

    function updateUser($con, $username, $nama, $email, $nohp, $saldo, $password){
        $query = "UPDATE user SET nama='$nama', email='$email', no_hp='$nohp', saldo='$saldo', password='$password'
                WHERE username='$username'";
        mysqli_query($con, $query);
    }

    function updateUserSaldo($con, $username, $saldo){
        $query = "UPDATE user SET saldo='$saldo'
                WHERE username='$username'";
        mysqli_query($con, $query);
    }
?>