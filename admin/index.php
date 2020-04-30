<?php
    session_start();
    include "../code/koneksi.php";
    include "../code/model/all_model.php";
    include "../code/universal_functions.php"
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
                            <div><a href="?hal=admin_beranda">BERANDA</a></div>
                            <div><a href="?hal=kelola_akun">KELOLA AKUN</a></div>
                            <div><a href="#wisata">KELOLA JADWAL</a></div>
                            <div><a href="#wisata">KELOLA TRANSAKSI</a></div>
                            <div><a href="#wisata">KELOLA PEMESANAN</a></div>
                    </nav>
                    <nav class="kanan">
                        <div class ="dropdown">
                            <div><button>Menu</button></div>
                            <ul>
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Riwayat Pmesanan</a></li>
                                <li><a href="?hal=admin_logout">Logout</a></li>
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
                    case 'admin_logout':
                        session_destroy();
                        echo "<p>Anda sudah logout, anda akan dialihkan kelaman login</p>";
                        echo "<meta http-equiv='refresh' content='2;url=../notmember/index.php'>";
                        break;
                }
            } else {
                include "admin.php";
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