<?php
    $user = getUserByUsername($con, $_GET['username']);
?>
<?php
    if(isset($_POST['submit'])){
        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        $tipefile = $_FILES['foto']['type'];
        $ukuranfile = $_FILES['foto']['size'];

        if($foto != ""){
            if($tipefile != "image/jpeg" and $tipefile != "image/jpg" and $tipefile != "image/png"){
                echo '<p>Format gambar yang didukung yaitu hanya jpeg, jpg dan png</p>';
            } else if($ukuranfile >= 1000000){
                echo '<p>Ukuran file tidak boleh lebih dari 1MB</p>';
            } else {
                if(!empty(trim($_POST['nama'])) 
                    && !empty(trim($_POST['username']))
                    && !empty(trim($_POST['email']))
                    && !empty(trim($_POST['password']))){
                        move_uploaded_file($lokasi, "../Assets/img/".$foto);
                        updateUser($con, $foto, $_POST['username'], $_POST['nama'], $_POST['email'], $_POST['nohp'], $user['saldo'], $_POST['alamat'], $_POST['password']);
                        header("Location: index.php?hal=profile");
                } else {
                    echo "<p>Field tidak boleh ada yang kosong</p>";
                }
            }
        } else {
            if(!empty(trim($_POST['nama'])) 
                && !empty(trim($_POST['username']))
                && !empty(trim($_POST['email']))
                && !empty(trim($_POST['password']))){
                    updateUser($con, $user['foto'], $_POST['username'], $_POST['nama'], $_POST['email'], $_POST['nohp'], $user['saldo'], $_POST['alamat'], $_POST['password']);
                    header("Location: index.php?hal=profile");
            } else {
                echo "<p>Field tidak boleh ada yang kosong</p>";
            }
        }
    }
?>
<div class="kll">
    <div class="kll-atas">
    <h3>Ubah Akun</h3>
    </div>
<pre><form id="form" action="" method="POST">
<label for="foto">Foto</label>          <input type="file" id="foto" name="foto">
<img src="../assets/img/<?= $user['foto'] ?>" width="100"><br>
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