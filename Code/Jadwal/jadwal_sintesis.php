<?php
    $tanggal = "";
?>
        <div class="jdwl">
            <div class="atastab">
                <div class="tgl">
                <form action="#" method="POST">
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
                                    echo '<td style="background:red; color:white">DIPESAN</td>';
                                } else {
                                    echo '<td style=>TERSEDIA</td>';
                                }
                            }
                        ?>
                        <td>-</td>
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
                    </tr>
                <?php
                        }
                    }
                } else {
                    $queryJadwal = "SELECT * FROM jadwal";
                    $resultJadwal = mysqli_query($con, $queryJadwal);

                    while($dataJadwal = mysqli_fetch_array($resultJadwal)){
                ?>
                    <tr>
                        <td><?= $dataJadwal['waktu'] ?></td>
                        <td><?= $dataJadwal['harga'] ?></td>
                        <td>TERSEDIA</td>
                        <td>-</td>
                    </tr>
                
                <?php
                    }
                }
                ?>
            </table>
            <div class="tombolpesan">
                <a href="">Pesan</a>
            </div>        
        </div>   
