<?php
    $valid = false;
    if(isset($_GET['id'])){
        $transaction = getTransactionById($con, $_GET['id']);
        $user = getUserByUsername($con, $transaction['username']);
        if($transaction > 0){
            $valid = true;
        }
    }
?>

<?php
    if(isset($_POST['setuju']) && isset($_GET['id'])){
        updateUserSaldo($con, $transaction['username'], $user['saldo']+100000);
        deleteTransactionById($con, $transaction['id_transaksi']);
        echo '<p>Transaksi berhasil dihapus</p>';
        echo "<meta http-equiv='refresh' content='2;url=index.php?hal=kelola_transaksi'>";
    }
?>

<div class="psn">
    <div class="kotakpesan">
        <h3>KONFIRMASI HAPUS TRANSAKSI</h3>
        <pre>
            Apakah Anda ingin menghapus pemesanan dibawah ini ?
            Lapangan    : <?php if(!$valid) echo "Tidak ada transaksi"; else echo getLapangById($con, $transaction['id_lapang'])['nama_lapang'] ?><br>
            Tanggal     : <?php if(!$valid) echo "Tidak ada transaksi"; else echo reverseDate($transaction['tanggal']) ?><br>
            Waktu       : <?php if(!$valid) echo "Tidak ada transaksi"; else echo $transaction['waktu'] ?><br>
            Pemesan     : <?php if(!$valid) echo "Tidak ada transaksi"; else echo $user['nama'] ?>
        </pre>
        <div>
        <form action="" method="POST">
            <input type="submit" class="ijo" name="setuju" value="Hapus">
            <input onclick="cancel()" type="reset" class="merah" name="batal" value="Batalkan">
        </form>
        </div
    </div>

</div>


<script>
function cancel() {
    window.location.replace("index.php?hal=kelola_transaksi");
}
</script>