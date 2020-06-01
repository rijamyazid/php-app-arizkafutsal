<?php
    $jadwals = getAllJadwal($con);
    $users = getAllUsers($con);
    $transaksi = getTransactionById($con, $_GET['id'])
?>

<?php
    if(isset($_POST['submit'])){
        updateTransaction($con, $transaksi['id_transaksi'], $_POST['tanggal'], $_POST['waktu'], $_POST['nama'], $_POST['jl'], $_POST['tb']);
        header("Location: ../admin/index.php?hal=kelola_transaksi");
    }
?>

<div class="container">
    <h2 class="mb-3">Ubah Rincian Transaksi</h2>
    <div class="card">
        <div class="card-body px-5">
            <form action="" method="POST">    
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="date" name="tanggal" id="tanggal" value="<?= $transaksi['tanggal'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="waktu" id="waktu" required>
                            <option value="">-Pilih Waktu-</option>
                            <?php
                                foreach ($jadwals as $jadwal) {
                                    echo "<option value='$jadwal[id_jadwal]'";
                                    if($jadwal['id_jadwal'] == $transaksi['id_jadwal']) echo " selected";
                                    echo ">$jadwal[waktu]</option>";
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
                            <option value="1" <?php if($transaksi['id_lapang'] == 1) echo "selected"; ?>>Sintesis</option>
                            <option value="2" <?php if($transaksi['id_lapang'] == 2) echo "selected"; ?>>Vinyl</option>
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
                                    echo "<option value='$user[username]' ";
                                    if($user['username'] == $transaksi['username']) echo " selected";
                                    echo ">$user[nama]</option>";
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
                            <option value="100000" selected>Rp. 100.000</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-end">
                    <div class="col-md-2 mb-2">
                        <input onclick="cancel()" type="reset" class="btn btn-danger btn-block" name="submit" value="Batal">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success btn-block" name="submit" value="Ubah">
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