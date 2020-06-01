<?php
    $transactions = getTransactionsByUsername($con, $_SESSION['username']);
?>
<div class="container">
    <div class="row">
        <div><h1>Riwayat Transaksi</h1></div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                    <tr class="abu">
                        <th scope="col">tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Lapangan</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($transactions as $transaction) {
                    ?>
                        <tr>
                            <td><?= reverseDate($transaction['tanggal']) ?></td>
                            <td><?= $transaction['waktu'] ?></td>
                            <td><?= getLapangById($con,$transaction['id_lapang'])['nama_lapang'] ?></td>
                            <?php if(!isDateExpired($transaction['tanggal'], $transaction['waktu'])) {
                                echo '<td><a class="btn btn-danger btn-block" href="?hal=riwayat_transaksi_batal&id='.$transaction['id_transaksi'].'">Batalkan</a></td>';
                            } else {
                                echo '<td>Expired</td>';
                            }
                            ?>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>  
