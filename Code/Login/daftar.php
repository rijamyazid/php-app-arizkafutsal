<?php
    if(isset($_POST['submit'])){
        if($_POST['password'] == $_POST['kpassword']){
            $fullname = $_POST['nama'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(!empty(trim($fullname)) 
                && !empty(trim($username))
                && !empty(trim($email))
                && !empty(trim($password))){
                if(getUserByUsername($con, $_POST['username'])){
                    echo "Username sudah digunakan, Pilih username lain";
                } else {
                    insertUserReg($con, $_POST['username'], $_POST['nama'], $_POST['email'], '0', $_POST['kpassword']);
                    echo "Pendaftaran berhasil, silahkan melakukan login";
                    echo "<meta http-equiv='refresh' content='2;url=index.php'>";
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
    <h3>Daftar Akun Baru</h3>
    <form action="" method="POST">
        <pre>
        <label for="nama">Nama Lengkap</label>        <input type="text" maxlength="20" name="nama" id="nama" required><br>
        <label for="username">Username</label>            <input type="text" maxlength="20" name="username" id="username" required><br>
        <label for="email">Email</label>               <input type="email" maxlength="30" name="email" id="email" required><br>
        <label for="password">Password</label>            <input type="password" maxlength="20" name="password" id="password" required><br>
        <label for="kpassword">Konfirmasi Password</label> <input type="password" maxlength="20" name="kpassword" id="kpassword" required><br>
        <input type="submit" class="simpan" name="submit" value="Daftar"> <input onclick="cancel()" type="reset" class="batal" name="reset" value="Batal">
    </pre>
    </form>
</div>

<script>
function cancel() {
    window.location.replace("index.php");
}
</script>