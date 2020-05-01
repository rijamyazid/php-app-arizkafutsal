<?php
    $users = getAllUsers($con);
?>

<h3>Kelola Akun</h3>
<a href="?hal=kelola_akun_tambah">Tambah</a>
<table border=1>
    <tr>
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
            echo    '<td>'.toCurrency($user['saldo']).'</td>';
            echo    '<td>
                        <a href="?hal=kelola_akun_edit&username='.$user['username'].'">Ubah</a>
                        <a href="?hal=kelola_akun_hapus&username='.$user['username'].'">Hapus</a>
                    </td>';
            echo '</tr>';
        }
    ?>
</table>