<?php
    if(isset($_POST['daftar'])){
    $query = "INSERT INTO user (username, email, password, nama) VALUES 
                ('$_POST[usr]', '$_POST[email]', '$_POST[pass]', '$_POST[nmlkp]')";
    $result = mysqli_query($con, $query);
        if($result){
            echo "<p>Anda sudah terdafat, silahkan melakukan login</p>";
            echo "<meta http-equiv='refresh' content='2;url=../notmember/index.php'>";
        } else {
            echo mysqli_error($con);
        }
    }
?>

<div class="daftar">
    <form action="#" method="POST">
    <pre>
NAMA LENGKAP        <input type="text" name="nmlkp">

USERNAME            <input type="text" name="usr">

EMAIL               <input type="email" name="email">

PASSWORD            <input type="password" name="pass">

KONFIRMASI PASSWORD <input type="password" name="konpass">
    </pre>
    <input type="submit" name="daftar" value="DAFTAR">
</form>
</div>