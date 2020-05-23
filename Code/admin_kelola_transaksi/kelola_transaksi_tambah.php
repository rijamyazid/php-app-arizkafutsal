<?php
    $fromTable = false;
    $selected = "";
    $lapang = getAllLapang($con);
    if(isset($_GET['tanggal'])){
        $fromTable = true;
    }

    $jadwals = getAllJadwal($con);
    $users = getAllUsers($con);
?><div class="kll">
<h3>Tambah Transaksi</h3>
<pre>
<form action="" method="POST">
    <label for="tanggal">Tanggal</label>   <?php
        if($fromTable){
            $selected = $_GET['tanggal'];
        }
    ?>
    <input type="date" name="tanggal" id="tanggal" value="<?= $selected ?>" ><br>
    <label for="waktu">Waktu</label>         <select name="waktu" id="waktu">
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
    </select><br>
    <label for="jl">Jenis Lapang</label>  <select name="jl" id="jl">
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
    </select><br>
    <label for="nama">Nama Pemesan</label>  <select name="nama" id="nama">
        <option value="">-Pilih User-</option>
        <?php
            foreach ($users as $user) {
                echo "<option value='$user[username]'>$user[nama]</option>";
            }
        ?>
    </select><br>
    <label for="tb">Total Biaya</label>   <select name="tb" id="tb">
        <option value="">-Pilih Pembayaran-</option>
        <option value="100000">Rp. 100.000</option>
    </select><br>
    <input type="submit" class="simpan" name="submit" value="Pesan">
</form>
</pre>
</div>
<?php
    if(isset($_POST['submit'])){
        $trasaction = getTransactionsByDateTimeAndLapang($con, $_POST['tanggal'], $_POST['waktu'], $_POST['jl']);
        if(count($trasaction) > 0){
            echo "Jadwal pada tanggal ".reverseDate($_POST['tanggal'])." dan pada waktu ".getJadwalById($con, $_POST['waktu'])['waktu']." sudah dipesan";
        } else {
            insertTransaction($con, $_POST['tanggal'], $_POST['waktu'], $_POST['nama'], $_POST['jl'], $_POST['tb']);
            header("Location: ../admin/index.php?hal=kelola_transaksi");
        }
    }
?>