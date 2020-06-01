<?php
    $jadwals = getAllJadwal($con);
    $idTransaction = "";
    $dipesan = false;
    $date = date("Y-m-d");

    if(isset($_POST['date'])){
        $transactions = getTransactionsByDate($con, $_POST['tanggal']);
        $date = $_POST['tanggal'];
    } else {
        $transactions = getTransactionsByDate($con, date("Y-m-d"));
    }
?>
<div class="container-fluid">
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
        <div><label class="h5">Lapangan Sintesis</label></div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                    <tr class="abu"><th scope="col" colspan="5"> Tanggal : <?= reverseDate($date) ?> </th></tr>
                    <tr class="abu">
                        <th scope="col">Waktu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th width="30%" scope="col">Keterangan</th>
                        <th scope="col">Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(mysqli_num_rows($transactions) > 0){ // Jika ditemukan pemesanan pada tanggal yang dicari
                            foreach ($jadwals as $jadwal){
                                echo '<tr>';
                                echo '<td class="align-middle">'.$jadwal['waktu'].'</td>';
                                echo '<td class="align-middle">'.toCurrency($jadwal['harga']).'</td>';
                                foreach($transactions as $transaction) {
                                    if($transaction['id_lapang'] == 1 && $jadwal['id_jadwal'] == $transaction['id_jadwal']){
                                        $dipesan = true;
                                        $username = $transaction['username'];
                                        $idTransaction = $transaction['id_transaksi'];
                                        break;
                                    }
                                }
                                if($dipesan){
                                    echo '<td class="align-middle" style="background:red; color:white">DIPESAN</td>';
                                    echo '<td class="align-middle">Pemesan : '.getUserByUsername($con, $username)['nama'].'</td>';
                                    echo '<td class="align-middle"><a class="btn btn-danger" href="?hal=kelola_transaksi_hapus&id='.$idTransaction.'&idLapang=1">Hapus</a></td>';
                                    $dipesan = false;
                                } else {
                                    echo '<td class="align-middle" style=>TERSEDIA</td>';
                                    echo '<td class="align-middle">-</td>';
                                    if(isDateExpired($date, $jadwal['waktu'])){
                                        echo '<td class="align-middle">Expired</td>';
                                    } else {
                                        echo '<td class="align-middle"><a class="btn btn-success" href="?hal=kelola_transaksi_tambah&tanggal='.$date.'&idLapang=1&idJadwal='.$jadwal['id_jadwal'].'">Tambah</a></td>';
                                    }
                                }
                                echo '</tr>';
                            }
                        } else { // Jika tidak ditemukan pemesanan pada tanggal yang dicari
                            foreach($jadwals as $jadwal){
                                echo '<tr>';
                                echo '<td class="align-middle">'.$jadwal['waktu'].'</td>';
                                echo '<td class="align-middle">'.toCurrency($jadwal['harga']).'</td>';
                                echo '<td class="align-middle">TERSEDIA</td>';
                                echo '<td class="align-middle">-</td>';
                                if(isDateExpired($date, $jadwal['waktu'])){
                                    echo '<td class="align-middle">Expired</td>';
                                } else {
                                    echo '<td class="align-middle"><a class="btn btn-success" href="?hal=kelola_transaksi_tambah&tanggal='.$date.'&idLapang=1&idJadwal='.$jadwal['id_jadwal'].'">Tambah</a></td>';
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