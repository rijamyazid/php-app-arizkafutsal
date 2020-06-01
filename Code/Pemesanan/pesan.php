<?php
    $valid = true;
    if(!isset($_SESSION['username'])){
        echo "<p>Anda harus login terlebih dahulu, silahkan lakukan login</p>";
        echo "<meta http-equiv='refresh' content='2;url=../notmember/index.php'>";
    } else {
        $user = getUserByUsername($con, $_SESSION['username']);
        $transaction = getTransactionsByDateTimeAndLapang($con, $_GET['tanggal'], $_GET['idJadwal'], $_GET['idLapang'] );
        if($transaction > 0){
            $valid = false;
        }

        if(isset($_POST['setuju'])){
            if($user['saldo'] >= 100000){
                $query = "INSERT INTO transaksi (tanggal, id_jadwal, username, id_lapang, total_bayar) VALUES 
                    ('$_GET[tanggal]', '$_GET[idJadwal]', '$_SESSION[username]', '$_GET[idLapang]', '100000')";
                $result = mysqli_query($con, $query);
                
                $saldoReduced = $user['saldo'] - 100000;
                $query = "UPDATE user SET saldo='$saldoReduced' WHERE username='$_SESSION[username]'";
                $result = mysqli_query($con, $query);

                echo '<div class="popup"><p>Pemesanan berhasil, anda akan dialihkan ke beranda</p></div>';
                echo "<meta http-equiv='refresh' content='2;url=../member/index.php'>";
            } else {
                echo '<div class="popup"><p>Pemesanan gagal, saldo anda tidak cukup</p></div>';
                echo "<meta http-equiv='refresh' content='2;url=../member/index.php?hal=jadwal_sintesis'>";
            }
        } else if(isset($_POST['batal'])){
            echo '<p>Pemesanan dibatalkan, anda akan dialihkan ke daftar jadwal</p>';
            if($_GET['idLapang'] == 1){
                echo "<meta http-equiv='refresh' content='2;url=index.php?hal=jadwal_sintesis'>";
            } else {
                echo "<meta http-equiv='refresh' content='2;url=index.php?hal=jadwal_vinyl'>";
            }
        }
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Konfirmasi Pemesanan</h3>
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
                <h3 class="card-title">Apakah Anda ingin memesan lapangan pada waktu dibawah ?</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="15%" scope="row"><p class="card-text">Lapangan</p></th>
                                    <td width="5%">:</td>
                                    <td width="80%"><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo getLapangById($con,$_GET['idLapang'])['nama_lapang'] ?></p></td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="card-text">Tanggal</p></th>
                                    <td>:</td>
                                    <td><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo reverseDate($_GET['tanggal']) ?></p></td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="card-text">Waktu</p></th>
                                    <td>:</td>
                                    <td><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo getJadwalById($con, $_GET['idJadwal'])['waktu'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="card-text">Pembayaran</p></th>
                                    <td>:</td>
                                    <td><p class="card-text"><?php if(!$valid) echo "Tidak ada transaksi"; else echo "Rp. 100.000" ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <?php
                        if($valid){
                    ?>
                        <form action="" method="POST">
                            <div class="row d-flex justify-content-end">
                                
                                    <input type="submit" class="btn btn-danger col-md-2 mr-3" name="batal" value="Batal">
                                
                                
                                    <input type="submit" class="btn btn-success col-md-2" name="setuju" value="Konfirmasi">
                                
                            </div>
                        </form>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
    }
?>