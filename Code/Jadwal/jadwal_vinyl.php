<?php
    $jadwals = getAllJadwal($con);
    $dipesan = false;
    $date = date("Y-m-d");

    if(isset($_POST['date'])){
        $transactions = getTransactionsByDate($con, $_POST['tanggal']);
        $date = $_POST['tanggal'];
    } else {
        $transactions = getTransactionsByDate($con, date("Y-m-d"));
    }
?>
<div class="container-fluid px-5">
    <div class="row">
        <div class="tgl">
        <form action="" method="POST">
            <label>Tanggal</label><br>
            <input type="date" name="tanggal">
            <input type="submit" name="date" value="Cari">
        </form>
        </div>
    </div>
    <div class="row">
        <div><label class="h5">Lapangan Vinyl</label></div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr class="abu"><th scope="col" colspan="5"> Tanggal : <?= reverseDate($date) ?> </th></tr>
                    <tr class="abu">
                        <th scope="col">Waktu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(mysqli_num_rows($transactions) > 0){ // Jika ditemukan pemesanan pada tanggal yang dicari
                            foreach ($jadwals as $jadwal){
                                echo '<tr>';
                                echo '<td>'.$jadwal['waktu'].'</td>';
                                echo '<td>'.toCurrency($jadwal['harga']).'</td>';
                                foreach($transactions as $transaction) {
                                    if($transaction['id_lapang'] == 1 && $jadwal['id_jadwal'] == $transaction['id_jadwal']){
                                        $dipesan = true;
                                        $username = $transaction['username'];
                                        break;
                                    }
                                }
                                if($dipesan){
                                    
                                    echo '<td style="background:red; color:white">DIPESAN</td>';
                                    echo '<td>Pemesan : '.getUserByUsername($con, $username)['nama'].'</td>';
                                    echo '<td>Dipesan</td>';
                                    $dipesan = false;
                                } else {
                                    echo '<td style=>TERSEDIA</td>';
                                    echo '<td>-</td>';
                                    // echo '<td><a class="ubah" href="?hal=pesan&tanggal='.$date.'&idLapang=1&idJadwal='.$jadwal['id_jadwal'].'">Pesan</a></td>';
                                    if(isDateExpired($date, $jadwal['waktu'])){
                                        echo '<td>Expired</td>';
                                    } else {
                                        echo '<td ><a class="btn btn-success" href="?hal=pesan&tanggal='.$date.'&idLapang=2&idJadwal='.$jadwal['id_jadwal'].'">Pesan</a></td>';
                                    }
                                }
                                echo '</tr>';
                            }
                        } else { // Jika tidak ditemukan pemesanan pada tanggal yang dicari
                            foreach($jadwals as $jadwal){
                                echo '<tr>';
                                echo '<td>'.$jadwal['waktu'].'</td>';
                                echo '<td>'.toCurrency($jadwal['harga']).'</td>';
                                echo '<td>TERSEDIA</td>';
                                echo '<td>-</td>';
                                if(isDateExpired($date, $jadwal['waktu'])){
                                    echo '<td>Expired</td>';
                                } else {
                                    echo '<td><a class="btn btn-success" href="?hal=pesan&tanggal='.$date.'&idLapang=2&idJadwal='.$jadwal['id_jadwal'].'">Pesan</a></td>';
                                }
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>