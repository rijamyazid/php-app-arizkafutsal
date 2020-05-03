<?php
    $valid = false;
    if(isset($_GET['id'])){
        $transaction = getTransactionById($con, $_GET['id']);
        $user = getUserByUsername($con, $_SESSION['username']);
        if($transaction > 0){
            $valid = true;
        }
    }
?>

<div class="psn">
    <div class="saldo">
        <label>SALDO ANDA :</label><br>
        <label><?= toCurrency($user['saldo']) ?></label>
    </div>
    <div class="kotakpesan">
        <h3>KONFIRMASI PEMBATALAN</h3>
        <pre>
            Apakah Anda ingin membatalkan pemesanan dibawah ini ?
            <!-- Ja ieu maneh jang ganti tangal sesuai nu dipilih user coding phpna -->
            Lapangan    : <?php if(!$valid) echo "Tidak ada transaksi"; else echo getLapangById($con,$transaction['id_lapang'])['nama_lapang'] ?><br>
            Tanggal     : <?php if(!$valid) echo "Tidak ada transaksi"; else echo reverseDate($transaction['tanggal']) ?><br>
            Waktu       : <?php if(!$valid) echo "Tidak ada transaksi"; else echo $transaction['waktu'] ?><br>
        </pre>
        <div>
        <form action="" method="POST">
            <input type="submit" class="ijo" name="setuju" value="Batalkan">
            <input type="submit" class="merah" name="batal" value="batal">
        </form>
        </div
    </div>

</div>

<?php
    if(isset($_POST['setuju']) && isset($_GET['id'])){
        updateUserSaldo($con, $user['username'], $user['saldo']+100000);
        deleteTransactionById($con, $transaction['id_transaksi']);
        echo '<p>Pesanan berhasil dibatalkan</p>';
        echo "<meta http-equiv='refresh' content='2;url=index.php?hal=riwayat_transaksi'>";
    }
?>