<?php
    $transactions = getAllTransactions($con);
?>
<div class="kll1">
    <h3>Kelola Transaksi</h3>
        <div><a href="?hal=kelola_transaksi_tambah">Tambah </a></div>
    <table border=1>
        <tr class="abu">
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Jenis Lapangan</th>
            <th>Pemesan</th>
            <th>Total Bayar</th>
            <th>Pilihan</th>
        </tr>
        <?php
            foreach($transactions as $transaksi){
                echo '<tr>';
                echo    '<td>'.$transaksi['id_transaksi'].'</td>';
                echo    '<td>'.$transaksi['tanggal'].'</td>';
                echo    '<td>'.$transaksi['waktu'].'</td>';
                echo    '<td>'.$transaksi['id_lapang'].'</td>';
                echo    '<td>'.$transaksi['nama'].'</td>';
                echo    '<td>Rp. '.createReadableCurrency($transaksi['total_bayar']).'</td>';
                echo    '<td>
                            <a class="ubahtrans" href="?hal=kelola_akun_edit&username='.$transaksi['id_transaksi'].'">Ubah</a>
                        </td>';
                echo '</tr>';
            }
        ?>
    </table>
</div>