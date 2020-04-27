<?php
    $dipesan = false;
?>
        <div class="jdwl">
            <div class="atastab">
                <div class="tgl">
                <form action="" method="POST">
                    <label>Tanggal</label><br>
                    <input type="date" name="tanggal">
                    <input type="submit" name="pilihTanggal" value="Cari">
                </form>
                </div>
                <div><label>Lapangan Sintesis</label></div>
                <div class="carpes">
                    <a href="">Cara Pesan ?</a>
                </div>
            </div>
            <table border="1" width="1250px" class="tab">
                <tr>
                    <th>Waktu</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Pesan</th>
                </tr>
                <?php
                if(isset($_POST['pilihTanggal'])){
                    $query = "SELECT * FROM transaksi WHERE tanggal='$_POST[tanggal]'";
                    $result = mysqli_query($con, $query);
            
                    $queryJadwal = "SELECT * FROM jadwal";
                    $resultJadwal = mysqli_query($con, $queryJadwal);
                
                    if(mysqli_num_rows($result) > 0){
                        while($dataJadwal = mysqli_fetch_array($resultJadwal)){
                ?>
                    <tr>
                        <td><?= $dataJadwal['waktu'] ?></td>
                        <td><?= $dataJadwal['harga'] ?></td>
                        <?php
                            foreach($result as $data) {
                                if($data['id_jadwal'] == $dataJadwal['id_jadwal']){
                                    $dipesan = true;
                                    break;
                                }
                            }
                            if($dipesan){
                                echo '<td style="background:red; color:white">DIPESAN</td>';
                                $dipesan = false;
                            } else {
                                echo '<td style=>TERSEDIA</td>';
                            }
                            echo '<td>-</td>';
                            foreach($result as $data) {
                                if($data['id_jadwal'] == $dataJadwal['id_jadwal']){
                                    $dipesan = true;
                                    break;
                                }
                            }
                            if($dipesan){
                                echo '<td>Dipesan</td>';
                                $dipesan = false;
                            } else {
                                echo '<td><a href="?hal=pesan&tanggal='.$_POST['tanggal'].'&idLapang=1&idJadwal='."$dataJadwal[id_jadwal]".'">Pesan</a></td>';
                            }
                        ?>
                        
                    </tr>
                <?php
                        }
                    } else {
                        while($dataJadwal = mysqli_fetch_array($resultJadwal)){
                ?>
                    <tr>
                        <td><?= $dataJadwal['waktu'] ?></td>
                        <td><?= $dataJadwal['harga'] ?></td>
                        <td>TERSEDIA</td>
                        <td>-</td>
                        <td><a href="?hal=pesan&tanggal=<?= $_POST['tanggal'] ?>&idLapang=1&idJadwal=<?= $dataJadwal['id_jadwal'] ?>">Pesan</a></td>
                    </tr>
                <?php
                        }
                    }
                } else {
                    $query = "SELECT * FROM transaksi WHERE tanggal="."'".date("Y-m-d")."'";
                    $result = mysqli_query($con, $query);

                    $queryJadwal = "SELECT * FROM jadwal";
                    $resultJadwal = mysqli_query($con, $queryJadwal);
                    
                    if(mysqli_num_rows($result) > 0){
                        while($dataJadwal = mysqli_fetch_array($resultJadwal)){
                ?>
                    <tr>
                        <td><?= $dataJadwal['waktu'] ?></td>
                        <td><?= $dataJadwal['harga'] ?></td>
                        <?php
                            foreach($result as $data) {
                                if($data['id_jadwal'] == $dataJadwal['id_jadwal']){
                                    $dipesan = true;
                                    break;
                                }
                            }
                            if($dipesan){
                                echo '<td style="background:red; color:white">DIPESAN</td>';
                                $dipesan = false;
                            } else {
                                echo '<td style=>TERSEDIA</td>';
                            }
                            echo '<td>-</td>';
                            foreach($result as $data) {
                                if($data['id_jadwal'] == $dataJadwal['id_jadwal']){
                                    $dipesan = true;
                                    break;
                                }
                            }
                            if($dipesan){
                                echo '<td>Dipesan</td>';
                                $dipesan = false;
                            } else {
                                echo '<td><a href="?hal=pesan&tanggal='.date("Y-m-d").'&idLapang=1&idJadwal='."$dataJadwal[id_jadwal]".'">Pesan</a></td>';
                            }
                        ?>
                    </tr>
                
                <?php
                        }
                    }else {
                        while($dataJadwal = mysqli_fetch_array($resultJadwal)){
                        ?>
                            <tr>
                                <td><?= $dataJadwal['waktu'] ?></td>
                                <td><?= $dataJadwal['harga'] ?></td>
                                <td>TERSEDIA</td>
                                <td>-</td>
                                <td><a href="?hal=pesan&tanggal=<?= date("Y-m-d") ?>&idLapang=1&idJadwal=<?= $dataJadwal['id_jadwal'] ?>">Pesan</a></td>
                            </tr>
                        <?php
                        }
                    }
                }
                ?>
            </table>       
        </div>   
