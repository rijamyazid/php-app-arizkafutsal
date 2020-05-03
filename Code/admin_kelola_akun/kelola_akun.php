<?php
    $users = getAllUsers($con);
?>

<div class="kll">
    <h3>Kelola Akun</h3><br><br>
        <div class="atastab">
            <div><a href="?hal=kelola_akun_tambah">Tambah Akun</a></div>
        </div>
    <table border=1>
        <tr class="abu">
            <th>Username</th>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Email</th>
            <th>Saldo</th>
            <th>Pilihan</th>
        </tr>
        <?php
            foreach($users as $user){
                echo '<tr>';
                echo    '<td>'.$user['username'].'</td>';
                echo    '<td>'.$user['nama'].'</td>';
                echo    '<td>'.$user['no_hp'].'</td>';
                echo    '<td>'.$user['email'].'</td>';
                echo    '<td>Rp. '.createReadableCurrency($user['saldo']).'</td>';
                echo    '<td>
                            <a href="?hal=kelola_akun_edit&username='.$user['username'].'" class="ubah">Ubah</a>
                            <a href="?hal=kelola_akun_hapus&username='.$user['username'].'" class="hapus">Hapus</a>
                        </td>';
                echo '</tr>';
            }
        ?>
    </table>
</div>