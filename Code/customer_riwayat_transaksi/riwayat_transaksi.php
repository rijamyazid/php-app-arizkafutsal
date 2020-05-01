<?php
    $transactions = getTransactionsByUsername($con, $_SESSION['username']);
?>


        <div class="jdwl">
           <h1>Riwayat Transaksi</h1>
            <table border="1" width="1250px" class="tab">
                <tr>
                    <th>tanggal</th>
                    <th>Waktu</th>
                    <th>Lapangan</th>
                    <th>Pilihan</th>
                </tr>
                <?php 
                    foreach ($transactions as $transaction) {
                ?>
                <tr>
                    <td><?= reverseDate($transaction['tanggal']) ?></td>
                    <td><?= $transaction['waktu'] ?></td>
                    <td><?= getLapangById($transaction['id_lapang']) ?></td>
                    <?php if(!isDateExpired($transaction['tanggal'], $transaction['waktu'])) {
                        echo '<td><a href="?hal=riwayat_transaksi_batal&id='.$transaction['id_transaksi'].'">Batalkan</a></td>';
                    } else {
                        echo '<td>Expired</td>';
                    }
                    ?>
                </tr>
                <?php
                    }
                ?>
            </table>      
        </div>   
