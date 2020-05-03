<?php
    $query = "SELECT * FROM user WHERE username='$_SESSION[username]'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_array($result);
?>

<html>
    <head>
        <link rel="stylesheet" href="../Assets/css/style.css">
        <link rel="stylesheet" href="../Assets/css/lgdf.css">
    </head
    <body>
        <div class="Prof">
            <div class="head">
                <div class="ID">
                    <img src="../Assets/img/user.png">
                    <pre>
                        <label><?= $data['username'] ?></label>
                    </pre>
                </div>
                <div>
                    <pre>
                        SALDO ANDA : 
                        <label><?= toCurrency($data['saldo']) ?></label>
                    </pre>
                </div>
            </div>
            <a href="#"><pre>UBAH</pre></a>

            <div class="datdir">
                <pre>
Nama   : <label><?= $data['nama'] ?></label>
Email  : <label><?= $data['email'] ?></label>
Kontak : <label>-</label>
Alamat : <label>-</label>
                </pre>
            </div>

        </div>
    </body>
</html>