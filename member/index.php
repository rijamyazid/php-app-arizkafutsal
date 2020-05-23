<?php
    session_start();
    ob_start();

    include "../code/koneksi.php";
    include "../code/model/all_model.php";
    include "../code/universal_functions.php";
?>

<html>
    <head>
        <link rel="stylesheet" href="../Assets/css/styl.css">
        <link rel="stylesheet" href="../Assets/css/log-daf.css">
        
    </head>
    <body>
        <header>
            <!-- <div class="palingatas">
            </div> -->
                <div class="atas">
                    <nav class="kiri">
                    <div><a href="?hal=beranda"><img  class="gmr" src="../Assets/img/logo.png" alt="logo"></a></div>    
                            <div><a href="?hal=beranda">BERANDA</a></div>
                            <div class ="dropdown">
                                <div><a class="ini" href="#">JADWAL</a></div>
                                    <ul id="luu">
                                        <li><a href="?hal=jadwal_sintesis">Jadwal Sintesis</a></li>
                                        <li><a href="?hal=jadwal_vinyl">Jadwal Vinyl</a></li>
                                    </ul>
                                </div>
                        <script
                        src="https://code.jquery.com/jquery-3.4.1.js"></script>  
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('.ini').click(function(){
                                    $('#luu').toggleClass('active');
                                })
                            })
                        </script>
                        
                    </nav>
                    <nav class="kanan">
                        <div class ="dropdown">
                            <!-- <div><button>Menu</button></div> -->
                            <div><a class="ini2" href="#">MENU</a></div>
                                <ul id="luu1">
                                    <li><a href="?hal=profile">Profile</a></li>
                                    <li><a href="?hal=riwayat_transaksi">RIWAYAT TRANSAKSI</a></li>
                                    <li><a href="?hal=logout">Logout</a></li>
                                </ul>
                        </div>
                        <script
                        src="https://code.jquery.com/jquery-3.4.1.js"></script>  
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('.ini2').click(function(){
                                    $('#luu1').toggleClass('active')
                                })
                            })
                        </script>
                    </nav>
                    <div class="kosong"></div>
                </div>
        </header>
        <main>
           <?php
          
            if(isset($_GET['hal'])){
                switch ($_GET['hal']) {
                    case 'beranda':
                        include "member.php";
                        break;
                    case 'jadwal_sintesis':
                        include "../code/jadwal/jadwal_sintesis.php";
                        break;
                    case 'jadwal_vinyl':
                        include "../code/jadwal/jadwal_vinyl.php";
                        break;
                    case 'profile':
                        include "../code/profile.php";
                        break;
                    case 'pesan':
                        include "../code/pemesanan/pesan.php";
                        break;
                    case 'riwayat_transaksi':
                        include "../code/customer_riwayat_transaksi/riwayat_transaksi.php";
                        break;
                    case 'riwayat_transaksi_batal':
                        include "../code/customer_riwayat_transaksi/riwayat_transaksi_batal.php";
                        break;
                    case 'logout':
                        session_destroy();
                        echo "<div class='logout'><p>ANDA SUDAH LOGOUT, ANDA AKAN DIALIHKAN KEHALAMAN LOGIN!</p></div>";
                        echo "<meta http-equiv='refresh' content='2;url=../notmember/index.php'>";
                        break;
                    default:
                        # code...
                        break;
                }
            } else {
                include "member.php";
            }
           ?>
        </main>
        <footer>
            <!-- <div class="bawah"> -->
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