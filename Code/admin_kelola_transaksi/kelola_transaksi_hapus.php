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

<div class="container">
    <div class="row">
        <div class="col">
            <h3>Konfirmasi Hapus Transaksi</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>Saldo Pemesan : <?= toCurrency($user['saldo']) ?></label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body px-5">
                <h3 class="card-title">Apakah Anda ingin menghapus pemesanan dibawah ini ?</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="15%" scope="row"><p class="card-text">Lapangan</p></th>
                                    <td width="5%">:</td>
                                    <td width="80%"><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo getLapangById($con, $transaction['id_lapang'])['nama_lapang'] ?></p></td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="card-text">Tanggal</p></th>
                                    <td>:</td>
                                    <td><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo reverseDate($transaction['tanggal']) ?><br></p></td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="card-text">Waktu</p></th>
                                    <td>:</td>
                                    <td><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo $transaction['waktu'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="card-text">Pemesan</p></th>
                                    <td>:</td>
                                    <td><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo $user['nama'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                <form action="" method="POST">
                    <input class="btn btn-danger" onclick="cancel()" type="reset" class="merah" name="batal" value="Batal">
                    <input class="btn btn-success" type="submit" class="ijo" name="setuju" value="Konfirmasi">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function cancel() {
    window.location.replace("index.php?hal=kelola_transaksi");
}
</script>