<?php
    $jadwals = getAllJadwal($con);
    $users = getAllUsers($con);
    $transaksi = getTransactionById($con, $_GET['id'])
?>

<h3>Edit Transaksi</h3>
<form action="" method="POST">
    <label for="tanggal">Tanggal</label><br>
    <input type="date" name="tanggal" id="tanggal" value="<?= $transaksi['tanggal'] ?>"><br>
    <label for="waktu">Waktu</label><br>
    <select name="waktu" id="waktu">
        <option value="">-Pilih Waktu-</option>
        <?php
            foreach ($jadwals as $jadwal) {
                echo "<option value='$jadwal[id_jadwal]'";
                if($jadwal['id_jadwal'] == $transaksi['id_jadwal']) echo " selected";
                echo ">$jadwal[waktu]</option>";
            }
        ?>
    </select><br>
    <label for="jl">Jenis Lapang</label><br>
    <select name="jl" id="jl">
        <option value="">-Pilih Lapang-</option>
        <option value="1" <?php if($transaksi['id_lapang'] == 1) echo "selected"; ?>>Sintesis</option>
        <option value="2" <?php if($transaksi['id_lapang'] == 2) echo "selected"; ?>>Vinyl</option>
    </select><br>
    <label for="nama">Nama Pemesan</label><br>
    <select name="nama" id="nama">
        <option value="">-Pilih User-</option>
        <?php
            foreach ($users as $user) {
                echo "<option value='$user[username]' ";
                if($user['username'] == $transaksi['username']) echo " selected";
                echo ">$user[nama]</option>";
            }
        ?>
    </select><br>
    <label for="tb">Total Biaya</label><br>
    <select name="tb" id="tb">
        <option value="">-Pilih Pembayaran-</option>
        <option value="100000" selected>Rp. 100.000</option>
    </select><br>
    <input type="submit" name="submit" value="Pesan">
</form>

<?php
    if(isset($_POST['submit'])){
        insertTransaction($con, $_POST['tanggal'], $_POST['waktu'], $_POST['nama'], $_POST['jl'], $_POST['tb']);
        header("Location: ../admin/index.php?hal=kelola_transaksi");
    }
?>