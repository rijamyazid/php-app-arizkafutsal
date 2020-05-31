<?php
    session_start();
    include "../code/koneksi.php";
    include "../code/model/all_model.php";
    include "../code/universal_functions.php";

    if(isset($_SESSION['username'])){
?>

<html>
    <head>
        <link rel="stylesheet" href="../Assets/css/styl.css">
        <link rel="stylesheet" href="../Assets/css/lgdf.css">
    </head>
    <body>
        <header>
            <!-- <div class="palingatas">
            </div> -->
                <div class="atas">
                    <nav class="kiri2">
                    <div><a href="?hal=beranda"><img  class="gmr" src="../Assets/img/logo.png" alt="logo"></a></div>    
                        <div><a href="?hal=admin_beranda">BERANDA</a></div>
                        <div><a href="?hal=kelola_akun">KELOLA AKUN</a></div>
                        
                        <div class ="dropdown">
                            <div><a class="ini" href="#">KELOLA JADWAL</a></div>
                            <ul>
                                <li><a href="?hal=kelola_jadwal_sintesis">KELOLA JADWAL SINTESIS</a></li>
                                <li><a href="?hal=kelola_jadwal_vinyl">KELOLA JADWAL VINYL</a></li>
                            </ul>
                        </div>
                        <script
                        src="https://code.jquery.com/jquery-3.4.1.js"></script>  
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('.ini').click(function(){
                                    $('ul').toggleClass('active')
                                })
                            })
                        </script>
                        <div><a href="?hal=kelola_transaksi">KELOLA TRANSAKSI</a></div>
                    </nav>
                    <nav class="kanan">
                        <div><a href="?hal=admin_logout">Logout</a></div>
                    </nav>
                    <div class="kosong"></div>
                </div>
        </header>
        <main>
           <?php
            if(isset($_GET['hal'])){
                switch ($_GET['hal']) {
                    case 'beranda':
                        include "admin.php";
                        break;
                    case 'kelola_akun':
                        include "../code/admin_kelola_akun/kelola_akun.php";
                        break;
                    case 'kelola_akun_tambah':
                        include "../code/admin_kelola_akun/kelola_akun_tambah.php";
                        break;
                    case 'kelola_akun_edit':
                        include "../code/admin_kelola_akun/kelola_akun_edit.php";
                        break;
                    case 'kelola_akun_hapus':
                        include "../code/admin_kelola_akun/kelola_akun_hapus.php";
                        break;
                    case 'kelola_transaksi':
                        include "../code/admin_kelola_transaksi/kelola_transaksi.php";
                        break;
                    case 'kelola_transaksi_tambah':
                        include "../code/admin_kelola_transaksi/kelola_transaksi_tambah.php";
                        break;
                    case 'kelola_transaksi_edit':
                        include "../code/admin_kelola_transaksi/kelola_transaksi_edit.php";
                        break;
                    case 'kelola_transaksi_hapus':
                        include "../code/admin_kelola_transaksi/kelola_transaksi_hapus.php";
                        break;
                    case 'kelola_jadwal_sintesis':
                        include "../code/admin_kelola_jadwal/kelola_jadwal_sintesis.php";
                        break;
                    case 'kelola_jadwal_vinyl':
                        include "../code/admin_kelola_jadwal/kelola_jadwal_vinyl.php";
                        break;
                    case 'kelola_jadwal_hapus':
                        include "../code/admin_kelola_jadwal/kelola_jadwal_hapus.php";
                        break;
                    case 'admin_logout':
                        session_destroy();
                        echo "<div class='logout'><p>ANDA SUDAH LOGOUT, ANDA AKAN DIALIHKAN KEHALAMAN LOGOUT!</p></div>";
                        echo "<meta http-equiv='refresh' content='2;url=../notmember/index.php'>";
                        break;
                }
            } else {
                include "admin.php";
            }
           ?>
        </main>
        <footer>
        <div>
                    <div class="sosmed">
                    <label>Follow Us</label>
                    </div>
                    <div class="bawahkiri">
                        <a href=""><img class="insta" src="../Assets/img/ig.png" alt="Instagram"></a>
                    <!-- </div> -->
                    <!-- <div class="bawahkiri"> -->
                        <a href=""><img class="manuk" src="../Assets/img/twtr.png" alt="Twitter"></a>
                    </div>
                </div>
                <div class="logo2">
                    <img class="logimg" src="../Assets/img/logo.png" alt="Logo!!!"><br>
                    Powered by Kelompok 2<br><br>
                    Ridwan Maulana Fatah<br>
                    Muhammad Dzatul Kahfi <br>
                    Muhammad Gema Almauludi<br>
                    Rija Muhammad Yajid<br>
                    Afmi Ruri<br>
                    Nisa Singgih Lestari<br>
                    Fitrizki Alunita<br>
                    
                </div>
                <div class="peta">
                    <div>
                    <label>Lokasi</label>
                    </div>
                    <img src="../Assets/img/peta.jpg" alt="">
                </div>
            </div>
            </div>
        </footer>
    </body>
</html>

<?php
    } else {
        echo '<script> window.location.replace("index.php"); </script>';
    }
?>