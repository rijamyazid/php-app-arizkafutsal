<?php
    $user = getUserByUsername($con, $_GET['username']);
?>

<h3>Edit Akun</h3>
<form action="" method="POST">
    <label for="username">Username</label><br>
    <input type="text" name="username" id="username" value="<?= $user['username'] ?>" readonly><br>
    <label for="nama">Nama Lengkap</label><br>
    <input type="text" name="nama" id="nama" value="<?= $user['nama'] ?>" required><br>
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" value="<?= $user['email'] ?>" required><br>
    <label for="nohp">No. Hp</label><br>
    <input type="text" name="nohp" id="nohp" value="<?= $user['no_hp'] ?>" required><br>
    <label for="saldo">Saldo</label><br>
    <input type="text" name="saldo" id="saldo" value="<?= $user['saldo'] ?>"><br>
    <label for="password">Password</label><br>
    <input type="text" name="password" id="password" value="<?= $user['password'] ?>" required><br>
    <input type="submit" name="submit" value="Simpan">
</form>

<?php
    if(isset($_POST['submit'])){
        updateUser($con, $_POST['username'], $_POST['nama'], $_POST['email'], $_POST['nohp'], $_POST['saldo'], $_POST['password']);
        header("Location: ../admin/index.php?hal=kelola_akun");
    }
?>