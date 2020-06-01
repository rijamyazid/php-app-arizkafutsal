<?php
    $fromTable = false;
    $selected = "";
    $lapang = getAllLapang($con);
    if(isset($_GET['tanggal'])){
        $fromTable = true;
    }

    $jadwals = getAllJadwal($con);
    $users = getAllUsers($con);
?>
<?php
    if(isset($_POST['submit'])){
        $arr = explode('-', getJadwalById($con, $_POST['waktu'])['waktu']);

        $trasaction = getTransactionsByDateTimeAndLapang($con, $_POST['tanggal'], $_POST['waktu'], $_POST['jl']);
        if($trasaction){
            echo "Jadwal pada tanggal ".reverseDate($_POST['tanggal'])." dan pada waktu ".getJadwalById($con, $_POST['waktu'])['waktu']." sudah dipesan";
        } else if(isDateExpired($_POST['tanggal'], $arr[0])){
            echo "Tidak dapat memesan pada tanggal dan waktu yang sudah terlewat";
        } else {
            $user = getUserByUsername($con, $_POST['nama']);
            if($user['saldo'] >= 100000){
                insertTransaction($con, $_POST['tanggal'], $_POST['waktu'], $_POST['nama'], $_POST['jl'], $_POST['tb']);
                updateUserSaldo($con, $_POST['nama'], ($user['saldo']-100000));
                header("Location: ../admin/index.php?hal=kelola_transaksi");
            } else {
                echo "Saldo user tidak cukup";
            }
        }
    }
?>

<div class="container">
    <h2 class="mb-3">Tambah Transaksi</h2>
    <div class="card">
        <div class="card-body px-5">
            <form action="" method="POST">    
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <?php
                        if($fromTable){
                            $selected = $_GET['tanggal'];
                        }
                    ?>
                    <div class="col-sm-3">
                        <input class="form-control" type="date" name="tanggal" id="tanggal" value="<?= $selected ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="waktu" id="waktu" required>
                            <option value="">-Pilih Waktu-</option>
                            <?php
                                foreach ($jadwals as $jadwal) {
                                    echo "<option value='$jadwal[id_jadwal]' ";
                                    if($fromTable){
                                        if($jadwal['id_jadwal'] == $_GET['idJadwal']){
                                            echo "selected";
                                        }
                                    }
                                    echo " >$jadwal[waktu]</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jl" class="col-sm-2 col-form-label">Jenis Lapang</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jl" id="jl" required>
                            <option value="">-Pilih Lapang-</option>
                            <?php
                                foreach ($lapang as $lap) {
                                    echo '<option value="'.$lap['id_lapang'].'"';
                                    if($fromTable){
                                        if($lap['id_lapang'] == $_GET['idLapang']){
                                            echo "selected";
                                        }
                                    }
                                    echo '>'.$lap['nama_lapang'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Pemesan</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="nama" id="nama" required>
                            <option value="">-Pilih User-</option>
                            <?php
                                foreach ($users as $user) {
                                    echo "<option value='$user[username]'>$user[nama]</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nohp" class="col-sm-2 col-form-label">Total Biaya</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="tb" id="tb" required>
                            <option value="">-Pilih Pembayaran-</option>
                            <option value="100000">Rp. 100.000</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-end">
                    <div class="col-md-2 mb-2">
                        <input onclick="cancel()" type="reset" class="btn btn-danger btn-block" name="submit" value="Batal">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success btn-block" name="submit" value="Pesan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function cancel() {
    window.location.replace("index.php?hal=kelola_transaksi");
}
</script>