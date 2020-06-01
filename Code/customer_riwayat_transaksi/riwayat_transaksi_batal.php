<?php
    $valid = false;
    if(isset($_GET['id'])){
        $transaction = getTransactionById($con, $_GET['id']);
        $user = getUserByUsername($con, $_SESSION['username']);
        if($transaction > 0){
            $valid = true;
        }
    }
    if(isset($_POST['setuju']) && isset($_GET['id'])){
        updateUserSaldo($con, $user['username'], $user['saldo']+100000);
        deleteTransactionById($con, $transaction['id_transaksi']);
        echo '<div class="popup"><p>Pesanan berhasil dibatalkan</p></div>';
        echo "<meta http-equiv='refresh' content='2;url=index.php?hal=riwayat_transaksi'>";
    } else if(isset($_POST['batal'])){
        echo '<p>Pemesanan tidak dibatalkan, Kembali ke riwayat transaksi</p>';
        echo "<meta http-equiv='refresh' content='2;url=index.php?hal=riwayat_transaksi'>";
    }
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h3>Konfirmasi Pembatalan</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>Saldo Anda : <?= toCurrency($user['saldo']) ?></label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body px-5">
                <h3 class="card-title">Apakah Anda ingin membatalkan pemesanan dibawah ini ?</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="15%" scope="row"><p class="card-text">Lapangan</p></th>
                                    <td width="5%">:</td>
                                    <td width="80%"><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo getLapangById($con,$transaction['id_lapang'])['nama_lapang'] ?></p></td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="card-text">Tanggal</p></th>
                                    <td>:</td>
                                    <td><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo reverseDate($transaction['tanggal']) ?></p></td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="card-text">Waktu</p></th>
                                    <td>:</td>
                                    <td><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo $transaction['waktu'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                <form action="" method="POST">
                    <input type="submit" class="btn btn-danger" name="batal" value="Batal">
                    <input type="submit" class="btn btn-success" name="setuju" value="Konfirmasi">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>