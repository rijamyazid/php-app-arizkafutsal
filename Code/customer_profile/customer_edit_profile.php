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
                    updateUser($con, 'user.png', $_POST['username'], $_POST['nama'], $_POST['email'], $_POST['nohp'], $user['saldo'], $_POST['alamat'], $_POST['password']);
                    header("Location: index.php?hal=profile");
            } else {
                echo "<p>Field tidak boleh ada yang kosong</p>";
            }
        }
    }
?>
<div class="container-fluid">
    <h2 class="mb-3">Ubah Akun</h2>
    <div class="card">
        <div class="card-body px-5">
            <form id="form" action="" method="POST" enctype="multipart/form-data">    
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-3">
                        <input class="form-control-file" type="file" id="foto" name="foto">
                    </div>
                </div>
                <img class="img-thumbnail" src="../assets/img/<?= $user['foto'] ?>" width="20%">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input class="form-control-plaintext" type="text" maxlength="20" name="username" id="username" value="<?= $user['username'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" maxlength="20" name="nama" id="nama" value="<?= $user['nama'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" maxlength="30" name="email" id="email" value="<?= $user['email'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nohp" class="col-sm-2 col-form-label">No. Hp</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" maxlength="12" name="nohp" id="nohp" value="<?= $user['no_hp'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="form" class="col-sm-2 col-form-label">Alamat (KTP)</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" form="form" name="alamat"><?= $user['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" maxlength="20" name="password" id="password" value="<?= $user['password'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <input onclick="cancel()" type="reset" class="btn btn-danger btn-block" name="submit" value="Batal">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary btn-block" name="submit" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function cancel() {
    window.location.replace("index.php?hal=profile");
}
</script>