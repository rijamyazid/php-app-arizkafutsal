<?php
    $query = "SELECT * FROM user WHERE username='$_SESSION[username]'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_array($result);
?>

<div class="Prof">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img class="img-thumbnail w-90" src="../assets/img/<?= $data['foto'] ?>">
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 text-left">Jumlah Saldo</dt>
                            <dd class="col-sm-8 text-left"><?= toCurrency($data['saldo']) ?></dd>

                            <dt class="col-sm-4 text-left">Username</dt>
                            <dd class="col-sm-8 text-left"><?= $data['username'] ?></dd>

                            <dt class="col-sm-4 text-left">Nama</dt>
                            <dd class="col-sm-8 text-left"><?= $data['nama'] ?></dd>

                            <dt class="col-sm-4 text-left">Email</dt>
                            <dd class="col-sm-8 text-left"><?= $data['email'] ?></dd>

                            <dt class="col-sm-4 text-left">Kontak</dt>
                            <dd class="col-sm-8 text-left"><?php if(empty($data['no_hp'])) echo "-"; else echo $data['no_hp']; ?></dd>

                            <dt class="col-sm-4 text-left">Alamat</dt>
                            <dd class="col-sm-8 text-left"><?php if(empty($data['alamat'])) echo "-"; else echo $data['alamat']; ?></dd>
                        </dl>
                        <div class="row">
                            <div class="col-md">
                                <a href="?hal=customer_edit_profile&username=<?= $data['username'] ?>" class="btn btn-primary btn-block">Ubah</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
</div>