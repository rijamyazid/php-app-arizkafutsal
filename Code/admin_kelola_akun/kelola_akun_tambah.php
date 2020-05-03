<div class="kll">
    <h3>Tambah Akun</h3>
    <form action="" method="POST">
        <pre>
        <label for="nama">Nama Lengkap</label>        <input type="text" name="nama" id="nama"><br>
        <label for="username">Username</label>            <input type="text" name="username" id="username"><br>
        <label for="email">Email</label>               <input type="text" name="email" id="email"><br>
        <label for="nohp">Kontak</label>              <input type="text" name="nohp" id="nohp"><br>
        <label for="saldo">Saldo</label>               <input type="number" name="saldo" id="saldo" value="0"><br>
        <label for="password">Password</label>            <input type="password" name="password" id="password"><br>
        <label for="kpassword">Konfirmasi Password</label> <input type="password" name="kpassword" id="kpassword"><br>
        <input type="submit" class="simpan"name="submit" value="Simpan"> <input type="reset" class="batal"name="submit" value="Batal">
    </pre>
    </form>
</div>
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