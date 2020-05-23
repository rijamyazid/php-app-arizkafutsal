<?php
    if(!isset($_SESSION['username'])){
        echo "<p>Anda harus login terlebih dahulu, silahkan lakukan login</p>";
        echo "<meta http-equiv='refresh' content='2;url=../notmember/index.php'>";
    } else {
        $user = getUserByUsername($con, $_SESSION['username']);
?>

<div class="psn">
    <div class="saldo">
        <label>SALDO ANDA :</label><br>
        <label><?= toCurrency($user['saldo']) ?></label>
    </div>
    <div class="kotakpesan">
        <h3>KONFIRMASI PEMESANAN</h3>
        <pre>
            Apakah Anda ingin memesan lapangan pada waktu dibawah ?
            Lapangan    : <?php if($_GET['idLapang']==1) echo "Syntesis"; else echo "Vinyl"; ?><br>
            Hari/Tanggal: <?= reverseDate($_GET['tanggal']) ?><br>
            Waktu       : <?= getJadwalById($con, $_GET['idJadwal'])['waktu'] ?><br>
            Pembayaran  : Rp. 100.000
        </pre>
        <div>
        <form method="POST">
            <input type="submit" class="ijo" name="setuju" value="Pesan">
            <input type="submit" class="merah" name="batal" value="batal">
        </form>
        <?php
            issetForm($con, $user);
        ?>
        </div
    </div>

</div>

<?php
    }

    function issetForm($con, $userData){
        if(isset($_POST['setuju'])){
            if($userData['saldo'] >= 100000){
                $query = "INSERT INTO transaksi (tanggal, id_jadwal, username, id_lapang, total_bayar) VALUES 
                    ('$_GET[tanggal]', '$_GET[idJadwal]', '$_SESSION[username]', '$_GET[idLapang]', '100000')";
                $result = mysqli_query($con, $query);
                
                $saldoReduced = $userData['saldo'] - 100000;
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
            echo "<meta http-equiv='refresh' content='2;url=../member/index.php?hal=jadwal_sintesis'>";

        }
    }
?>