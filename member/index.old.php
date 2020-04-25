<?php
    session_start();
    ob_start();

    include "../code/koneksi.php";
?>

<html>
    <head>
        <link rel="stylesheet" href="../Assets/css/style.css">
        <link rel="stylesheet" href="../Assets/css/log-daf.css">
        
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
                                        $('ul').toggleClass('active');
                                    })
                                })
                            </script>
                            <div><a href="#geografis">GALERI</a></div>
                            <div><a href="#wisata">RIWAYAT TRANSAKSI</a></div>
                        
                    </nav>
                    <nav class="kanan">
                        <div class ="dropdown">
                            <div><button>Menu</button></div>
                            <ul>
                                <li><a href="?hal=profile">Profile</a></li>
                                <li><a href="?hal=pemesanan">Riwayat Pmesanan</a></li>
                                <li><a href="?hal=logout">Logout</a></li>
                            </ul>
                        </div>
                        <script
                        src="https://code.jquery.com/jquery-3.4.1.js"></script>  
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('button').click(function(){
                                    $('ul').toggleClass('active')
                                })
                            })
                        </script>
                    </nav>
                </div>
        </header>
        <main>
           <?php
            if(isset($_GET['hal'])){
                switch ($_GET['hal']) {
                    case 'beranda':
                        include "member.php";
                        break;
                    case 'profile':
                        include "../code/profile.php";
                        break;
                    case 'pemesanan':
                        include "../code/pemesanan/pesan.php";
                        break;
                    case 'logout':
                        session_destroy();
                        echo "<p>Anda sudah logout, anda akan dialihkan kelaman login</p>";
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