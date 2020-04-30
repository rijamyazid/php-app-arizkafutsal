<?php
    $jadwals = getAllJadwal($con);
    $users = getAllUsers($con);
?>

<h3>Tambah Transaksi</h3>
<form action="" method="POST">
    <label for="tanggal">Tanggal</label><br>
    <input type="date" name="tanggal" id="tanggal"><br>
    <label for="waktu">Waktu</label><br>
    <select name="waktu" id="waktu">
        <option value="">-Pilih Waktu-</option>
        <?php
            foreach ($jadwals as $jadwal) {
                echo "<option value='$jadwal[id_jadwal]'>$jadwal[waktu]</option>";
            }
        ?>
    </select><br>
    <label for="jl">Jenis Lapang</label><br>
    <select name="jl" id="jl">
        <option value="">-Pilih Lapang-</option>
        <option value="1">Sintesis</option>
        <option value="2">Vinyl</option>
    </select><br>
    <label for="nama">Nama Pemesan</label><br>
    <select name="nama" id="nama">
        <option value="">-Pilih User-</option>
        <?php
            foreach ($users as $user) {
                echo "<option value='$user[username]'>$user[nama]</option>";
            }
        ?>
    </select><br>
    <label for="tb">Total Biaya</label><br>
    <select name="tb" id="tb">
        <option value="">-Pilih Pembayaran-</option>
        <option value="100000">Rp. 100.000</option>
    </select><br>
    <input type="submit" name="submit" value="Pesan">
</form>

<?php
    if(isset($_POST['submit'])){
        insertTransaction($con, $_POST['tanggal'], $_POST['waktu'], $_POST['nama'], $_POST['jl'], $_POST['tb']);
        header("Location: ../admin/index.php?hal=kelola_transaksi");
    }
?>