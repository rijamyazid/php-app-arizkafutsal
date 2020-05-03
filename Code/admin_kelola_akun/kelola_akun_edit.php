<?php
    $user = getUserByUsername($con, $_GET['username']);
?>
<div class="kll">
    <div class="kll-atas">
    <h3>Ubah Akun</h3>
    <pre>
        SALDO ANDA :
Rp.</pre></div>
<pre><form action="" method="POST">
<label for="username">Username</label>      <input type="text" name="username" id="username" value="<?= $user['username'] ?>" readonly><br>
<label for="nama">Nama Lengkap</label>  <input type="text" name="nama" id="nama" value="<?= $user['nama'] ?>" required><br>
<label for="email">Email</label>         <input type="text" name="email" id="email" value="<?= $user['email'] ?>" required><br>
<label for="nohp">No. Hp</label>        <input type="text" name="nohp" id="nohp" value="<?= $user['no_hp'] ?>" required><br>
<label for="saldo">Saldo</label>         <input type="text" name="saldo" id="saldo" value="<?= $user['saldo'] ?>"><br>
<label for="password">Password</label>      <input type="text" name="password" id="password" value="<?= $user['password'] ?>" required><br>
              <input type="submit" class="simpan"name="submit" value="Simpan"> <input type="reset" class="batal"name="submit" value="Batal">
    </form>
</pre>
</div>
<?php
    if(isset($_POST['submit'])){
        updateUser($con, $_POST['username'], $_POST['nama'], $_POST['email'], $_POST['nohp'], $_POST['saldo'], $_POST['password']);
        header("Location: ../admin/index.php?hal=kelola_akun");
    }
?>