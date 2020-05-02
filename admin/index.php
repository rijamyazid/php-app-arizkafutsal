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
                        <div><a href="?hal=kelola_jadwal_sintesis">KELOLA JADWAL SINTESIS</a></div>
                        <div><a href="?hal=kelola_jadwal_vinyl">KELOLA JADWAL VINYL</a></div>
                        <div><a href="?hal=kelola_transaksi">KELOLA TRANSAKSI</a></div>
                    </nav>
                    <nav class="kanan">
                        <div><a href="?hal=admin_logout">Logout</a></div>
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
                    case 'kelola_transaksi':
                        include "../code/admin_kelola_transaksi/kelola_transaksi.php";
                        break;
                    case 'kelola_transaksi_tambah':
                        include "../code/admin_kelola_transaksi/kelola_transaksi_tambah.php";
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