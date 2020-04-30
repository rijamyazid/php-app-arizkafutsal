<h3>Tambah Akun</h3>
<form action="" method="POST">
    <label for="username">Username</label><br>
    <input type="text" name="username" id="username"><br>
    <label for="nama">Nama Lengkap</label><br>
    <input type="text" name="nama" id="nama"><br>
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email"><br>
    <label for="nohp">No. Hp</label><br>
    <input type="text" name="nohp" id="nohp"><br>
    <label for="saldo">Saldo</label><br>
    <input type="number" name="saldo" id="saldo" value="0"><br>
    <label for="password">Password</label><br>
    <input type="password" name="password" id="password"><br>
    <label for="kpassword">Konfirmasi Password</label><br>
    <input type="password" name="kpassword" id="kpassword"><br>
    <input type="submit" name="submit" value="Simpan">
</form>

<?php
    if(isset($_POST['submit'])){
        if($_POST['password'] == $_POST['kpassword']){
            if(count(getUserByUsername($con, $_POST['username'])) > 0){
                echo "Username sudah digunakan, Pilih username lain";
            } else {
                insertUser($con, $_POST['username'], $_POST['nama'], $_POST['email'], $_POST['nohp'], $_POST['saldo'], $_POST['kpassword']);
                header("Location: ../admin/index.php?hal=kelola_akun");
            }
        } else {
            echo "<p>Password tidak sesuai, silahkan check kembali</p>";
        }
    }
?>