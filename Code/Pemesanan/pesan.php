<?php
    if(!isset($_SESSION['username'])){
        echo "<p>Anda harus login terlebih dahulu, silahkan lakukan login</p>";
        echo "<meta http-equiv='refresh' content='2;url=../notmember/index.php'>";
    } else {
        $query = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_array($result);
?>

<div class="psn">
    <div class="saldo">
        <label>SALDO ANDA :</label><br>
        <label>Rp. <?= createReadableCurrency($data['saldo']) ?></label>
    </div>
    <div class="kotakpesan">
        <h3>KONFIRMASI PEMESANAN</h3>
        <pre>
            Apakah Anda ingin memesan lapangan pada waktu dibawah ?
            Lapangan    : <?php if($_GET['idLapang']==1) echo "Syntesis"; else echo "Vinyl"; ?><br>
            Hari/Tanggal: <?= reverseDate($_GET['tanggal']) ?><br>
            Waktu       : <?= getWaktuByIdWaktu($con, $_GET['idJadwal']) ?><br>
            Pembayaran  : Rp. 100.000
        </pre>
        <div>
        <form method="POST">
            <input type="submit" class="ijo" name="setuju" value="Pesan">
            <input type="submit" class="merah" name="batal" value="batal">
        </form>
        <?php
            issetForm($con, $data);
        ?>
        </div
    </div>

</div>

<?php
    }

    function reverseDate($date) {
        $tempDate = explode('-', $date);
        return $tempDate[2]."-".$tempDate[1]."-".$tempDate[0];
    }

    function getWaktuByIdWaktu($con, $idJadwal){
        $query = "SELECT * FROM jadwal WHERE id_jadwal='$idJadwal'";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_array($result);
        return $data['waktu'];
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

                echo '<p>Pemesanan berhasil, anda akan dialihkan ke beranda</p>';
                echo "<meta http-equiv='refresh' content='2;url=../member/index.php'>";
            } else {
                echo '<p>Pemesanan gagal, saldo anda tidak cukup</p>';
                echo "<meta http-equiv='refresh' content='2;url=../member/index.php?hal=jadwal_sintesis'>";
            }
        } else if(isset($_POST['batal'])){

            echo '<p>Pemesanan dibatalkan, anda akan dialihkan ke daftar jadwal</p>';
            echo "<meta http-equiv='refresh' content='2;url=../member/index.php?hal=jadwal_sintesis'>";

        }
    }
?>