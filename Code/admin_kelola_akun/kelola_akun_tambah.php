<?php
    if(isset($_POST['submit'])){
        if($_POST['password'] == $_POST['kpassword']){
            if(!empty(trim($_POST['nama'])) 
                && !empty(trim($_POST['username']))
                && !empty(trim($_POST['email']))
                && !empty(trim($_POST['password']))
                && !empty(trim($_POST['saldo']))){
                if(getUserByUsername($con, $_POST['username'])){
                    echo "Username sudah digunakan, Pilih username lain";
                } else {
                    insertUser($con, $_POST['username'], $_POST['nama'], $_POST['email'], $_POST['nohp'], $_POST['saldo'], $_POST['alamat'] ,$_POST['kpassword']);
                    header("Location: ../admin/index.php?hal=kelola_akun");
                }
            } else {
                echo "<p>Field tidak boleh ada yang kosong</p>";
            }
        } else {
            echo "<p>Password tidak sama, silahkan periksa kembali</p>";
        }
    }
?>

<div class="kll">
    <h3>Tambah Akun</h3>
    <form id="form" action="" method="POST">
        <pre>
        <label for="nama">Nama Lengkap</label>        <input maxlength="20" type="text" name="nama" id="nama" required><br>
        <label for="username">Username</label>            <input maxlength="20" type="text" name="username" id="username" required><br>
        <label for="email">Email</label>               <input maxlength="30" type="email" name="email" id="email" required><br>
        <label for="nohp">Kontak</label>              <input maxlength="12" type="number" name="nohp" id="nohp"><br>
        <label for="saldo">Saldo</label>               <input maxlength="7" type="number" name="saldo" id="saldo" value="0" required><br>
        <label for="alamat">Alamat (KTP)</label>        <textarea form="form" name="alamat"></textarea><br>
        <label for="password">Password</label>            <input maxlength="20" type="password" name="password" id="password" required><br>
        <label for="kpassword">Konfirmasi Password</label> <input maxlength="20" type="password" name="kpassword" id="kpassword" required><br>
        <input type="submit" class="simpan"name="submit" value="Simpan"> <input onclick="cancel()" type="reset" class="batal"name="submit" value="Batal">
    </pre>
    </form>
</div>

<script>
function cancel() {
    window.location.replace("index.php?hal=kelola_akun");
}
</script>