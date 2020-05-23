<?php
    $user = getUserByUsername($con, $_GET['username']);
?>
<?php
    if(isset($_POST['submit'])){
        if(!empty(trim($_POST['nama'])) 
            && !empty(trim($_POST['username']))
            && !empty(trim($_POST['email']))
            && !empty(trim($_POST['password']))
            && !empty(trim($_POST['saldo']))){
                updateUser($con, $_POST['username'], $_POST['nama'], $_POST['email'], $_POST['nohp'], $_POST['saldo'], $_POST['alamat'], $_POST['password']);
                header("Location: ../admin/index.php?hal=kelola_akun");
        } else {
            echo "<p>Field tidak boleh ada yang kosong</p>";
        }
    }
?>
<div class="kll">
    <div class="kll-atas">
    <h3>Ubah Akun</h3>
    </div>
<pre><form id="form" action="" method="POST">
<label for="username">Username</label>      <input type="text" maxlength="20" name="username" id="username" value="<?= $user['username'] ?>" readonly><br>
<label for="nama">Nama Lengkap</label>  <input type="text" maxlength="20" name="nama" id="nama" value="<?= $user['nama'] ?>" required><br>
<label for="email">Email</label>         <input type="email" maxlength="30" name="email" id="email" value="<?= $user['email'] ?>" required><br>
<label for="nohp">No. Hp</label>        <input type="number" maxlength="12" name="nohp" id="nohp" value="<?= $user['no_hp'] ?>"><br>
<label for="saldo">Saldo</label>         <input type="number" maxlength="7" name="saldo" id="saldo" value="<?= $user['saldo'] ?>" required><br>
<label for="alamat">Alamat (KTP)</label>  <textarea form="form" name="alamat"><?= $user['alamat'] ?></textarea><br>
<label for="password">Password</label>      <input type="text" maxlength="20" name="password" id="password" value="<?= $user['password'] ?>" required><br>
              <input type="submit" class="simpan"name="submit" value="Simpan"> <input onclick="cancel()" type="reset" class="batal"name="submit" value="Batal">
    </form>
</pre>
</div>

<script>
function cancel() {
    window.location.replace("index.php?hal=kelola_akun");
}
</script>