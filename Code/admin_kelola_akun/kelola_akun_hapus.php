<?php
    deleteUserByUsername($con, $_GET['username']);
    header("Location: index.php?hal=kelola_akun");
?>