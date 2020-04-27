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
        <label>Rp. <?= $data['saldo'] ?></label>
    </div>
    <div class="kotakpesan">
        <h3>KONFIRMASI PEMESANAN</h3>
        <pre>
            Apakah Anda ingin memesan lapangan pada waktu dibawah ?
            Lapangan    : <?php if($_GET['idLapang']==1) echo "Syntesis"; else echo "Vinyl;" ?><br>
            Hari/Tanggal: <?= reverseDate($_GET['tanggal']) ?><br>
            Waktu       : <?= convertIdToWaktu($con, $_GET['idJadwal']) ?><br>
            Pembayaran  : Rp. 100.000
        </pre>
        <div>
        <input type="submit" class="ijo" name="setuju" value="Pesan">
        <?php
            if(isset($_POST['setuju'])){
                echo "Setuju";
            }
        ?>
        <input type="submit" class="merah" name="batal" value="batal">
        </div
    </div>

</div>

<?php
    }

    function reverseDate($date) {
        $tempDate = explode('-', $date);
        return $tempDate[2]."-".$tempDate[1]."-".$tempDate[0];
    }

    function convertIdToWaktu($con, $idJadwal){
        $query = "SELECT * FROM jadwal WHERE id_jadwal='$idJadwal'";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_array($result);
        return $data['waktu'];
    }
?>