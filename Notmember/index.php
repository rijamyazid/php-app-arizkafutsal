<?php
    session_start();
    include "../code/koneksi.php";
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
                    <nav class="kiri">    
                        <div><a href="?hal=beranda">BERANDA</a></div>
                        <div class ="dropdown">
                            <div><a class="ini" href="#">JADWAL</a></div>
                            <ul>
                                <li><a href="?hal=jadwal_sintesis">Jadwal Sintesis</a></li>
                                <li><a href="?hal=jadwal_vinyl">Jadwal Vinyl</a></li>
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
                    </nav>
                    </nav>
                </div>
        </header>
        <main>
           <?php
            if(isset($_GET['hal'])){
                if(isset($_SESSION['username'])){
                    session_destroy();
                    echo "<p>Anda belum melakukan logout, logout secara otomatis, silahkan melakukan login lagi</p>";
                    echo "<meta http-equiv='refresh' content='2;url=../notmember/index.php'>";
                } else {
                    switch ($_GET['hal']) {
                        case 'jadwal_sintesis':
                            include "../code/jadwal/jadwal_sintesis.php";
                            break;
                        case 'jadwal_vinyl' :
                            include "../code/jadwal/jadwal_vinyl.php";
                            break;
                        case 'buat_akun':
                            include "../code/login/daftar.php";
                            break;
                        case 'pesan':
                            include "../code/pemesanan/pesan.php";
                            break;
                        case 'beranda':
                            include "../code/login/login.php";
                            break;
                    }
                }
            } else {
                include "../code/login/login.php";
            }
           ?>
        </main>
        <footer>
            <div class="bawah">
                <div>
                    <div class="bawahkiri">
                        <img src="../Assets/img/ig.png" alt="Instagram">
                        <a href="">@arizka_futsal</a>
                    </div>
                    <div class="bawahkiri">
                        <img src="../Assets/img/twtr.png" alt="Twitter">
                        <a href="">@arizka_futsal</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>