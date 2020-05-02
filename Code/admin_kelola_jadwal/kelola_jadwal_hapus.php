<?php
    if(count(getTransactionById($con, $_GET['id'])) > 0){
        deleteTransactionById($con, $_GET['id']);
        if ($_GET['idLapang'] == 1) {
            header("Location: index.php?hal=kelola_jadwal_sintesis");
        } else {
            header("Location: index.php?hal=kelola_jadwal_vinyl");
        }
    } else {
        echo "Transaksi ini sudah dihapus";
    }
?>