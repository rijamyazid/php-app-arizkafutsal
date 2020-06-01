<?php
    $transactions = getAllTransactions($con);
?>
<div class="container">
    <div class="row">
        <div><h1>Kelola Transaksi</h1></div>
    </div>
    <div class="row mb-3">
        <div><a class="btn btn-success" href="?hal=kelola_transaksi_tambah">Tambah Transaksi</a></div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                    <tr class="abu">
                        <th>ID Transaksi</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Jenis Lapangan</th>
                        <th>Pemesan</th>
                        <th>Total Bayar</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($transactions as $transaction) {
                            echo '<tr>';
                            echo    '<td class="align-middle">'.$transaction['id_transaksi'].'</td>';
                            echo    '<td class="align-middle">'.$transaction['tanggal'].'</td>';
                            echo    '<td class="align-middle">'.$transaction['waktu'].'</td>';
                            echo    '<td class="align-middle">'.$transaction['id_lapang'].'</td>';
                            echo    '<td class="align-middle">'.$transaction['nama'].'</td>';
                            echo    '<td class="align-middle">'.toCurrency($transaction['total_bayar']).'</td>';
                            echo    '<td class="align-middle">
                                        <a class="btn btn-danger" href="?hal=kelola_transaksi_hapus&id='.$transaction['id_transaksi'].'">Hapus</a>
                                        <a class="btn btn-primary" href="?hal=kelola_transaksi_edit&id='.$transaction['id_transaksi'].'&username='.$transaction['id_transaksi'].'">Ubah</a>
                                    </td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>  
