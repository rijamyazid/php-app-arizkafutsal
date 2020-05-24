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
                    <img src="../Assets/img/<?= $data['foto'] ?>" width="100">
                </div>
                <div>
                    <pre>
                        SALDO ANDA : 
                        <label><?= toCurrency($data['saldo']) ?></label>
                    </pre>
                </div>
            </div>
            <a href="?hal=customer_edit_profile&username=<?= $data['username'] ?>"><pre>UBAH</pre></a>

            <div class="datdir">
                <pre>
Username : <label><?= $data['username'] ?></label>
Nama     : <label><?= $data['nama'] ?></label>
Email    : <label><?= $data['email'] ?></label>
Kontak   : <label><?php if(empty($data['no_hp'])) echo "-"; else echo $data['no_hp']; ?></label>
Alamat   : <label><?php if(empty($data['alamat'])) echo "-"; else echo $data['alamat']; ?></label>
                </pre>
            </div>

        </div>
    </body>
</html>