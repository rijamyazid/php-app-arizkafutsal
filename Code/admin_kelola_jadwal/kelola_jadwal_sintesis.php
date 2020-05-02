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
        <div class="jdwl">
            <div class="atastab">
                <div class="tgl">
                <form action="" method="POST">
                    <label>Tanggal</label><br>
                    <input type="date" name="tanggal">
                    <input type="submit" name="date" value="Cari">
                </form>
                </div>
                <div><label>Lapangan Sintesis</label></div>
                <div class="carpes">
                    <a href="">Cara Pesan ?</a>
                </div>
            </div>
            <table border="1" width="1250px" class="tab">
                <tr><th colspan="5"> Tanggal : <?= reverseDate($date) ?> </th></tr>
                <tr>
                    <th>Waktu</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Pilihan</th>
                </tr>
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
                                    $idTransaction = $transaction['id_transaksi'];
                                    break;
                                }
                            }
                            if($dipesan){
                                echo '<td style="background:red; color:white">DIPESAN</td>';
                                echo '<td>Pemesan : '.getUserByUsername($con, $username)['nama'].'</td>';
                                echo '<td><a href="?hal=kelola_jadwal_hapus&id='.$idTransaction.'&idLapang=1">Hapus</a></td>';
                                $dipesan = false;
                            } else {
                                echo '<td style=>TERSEDIA</td>';
                                echo '<td>-</td>';
                                if(isDateExpired($date, $jadwal['waktu'])){
                                    echo '<td>Expired</td>';
                                } else {
                                    echo '<td><a href="?hal=kelola_transaksi_tambah&tanggal='.$date.'&idLapang=1&idJadwal='.$jadwal['id_jadwal'].'">Tambah</a></td>';
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
                                echo '<td><a href="?hal=pesan&tanggal='.$date.'&idLapang=1&idJadwal='.$jadwal['id_jadwal'].'">Tambah</a></td>';
                            }
                            echo '</tr>';
                        }
                    }
                ?>
            </table>       
        </div>