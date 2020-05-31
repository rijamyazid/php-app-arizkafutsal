<?php
    session_start();
    include "../code/koneksi.php";
    include "../code/model/all_model.php";
    include "../code/universal_functions.php";
?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/css/styl.css">
        <link rel="stylesheet" href="../assets/css/lgdf.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand mr-5" href="?hal=beranda"><img class="image-fluid" width="100px" src="../assets/img/logo.png" alt="logo"></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="?hal=beranda" class="nav-item nav-link mr-4" style="font-size:20px;">Beranda</a>
                        <div class="dropdown show">
                            <a href="?hal=movies_popular&page=1" class="nav-item nav-link dropdown-toggle" style="font-size:20px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Jadwal
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="?hal=jadwal_sintesis">Jadwal Sintesis</a>
                                <a class="dropdown-item" href="?hal=jadwal_vinyl">Jadwal Vinyl</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <hr>
        <div class="container-fluid">
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
        </div>
        <hr>
        <div class="container-fluid bg-dark p-4">
        <hr class="bg-light">
            <div class="row">
                <div class="col-md-4 text-light">
                    <div class="row d-flex justify-content-center align-items-center">
                        <p class="h5">Follow Us</p>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <a href=""><img class="insta" src="../assets/img/ig.png" alt="Instagram"></a>
                        <!-- </div> -->
                        <!-- <div class="bawahkiri"> -->
                        <a href=""><img class="manuk" src="../assets/img/twtr.png" alt="Twitter"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-center align-items-center">
                            <img class="mb-4" width="200px" src="../assets/img/logo.png" alt="Logo!!!"><br>
                        </div>
                        <div class="row text-light px-4">
                            <dl class="row">
                                <dd class="col-sm-12 text-center mb-3">Powered by Kelompok 2</dd>
                                <dt class="col-sm-12 text-center">Ridwan Maulana Fatah</dd>
                                <dd class="col-sm-12 text-center">[3411171068]</dd>
                                <dt class="col-sm-12 text-center">Muhammad Dzatul Kahfi</dd>
                                <dd class="col-sm-12 text-center">[3411171069]</dd>
                                <dt class="col-sm-12 text-center">Muhammad Gema Almauludi</dd>
                                <dd class="col-sm-12 text-center">[3411171064]</dd>
                                <dt class="col-sm-12 text-center">Rija Muhammad Yazid</dd>
                                <dd class="col-sm-12 text-center">[3411171066]</dd>
                                <dt class="col-sm-12 text-center">Afmi Ruri</dd>
                                <dd class="col-sm-12 text-center">[3411171063]</dd>
                                <dt class="col-sm-12 text-center">Nisa Singgih Lestari</dd>
                                <dd class="col-sm-12 text-center">[3411171068]</dd>
                                <dt class="col-sm-12 text-center">Fitrizki Alunita</dd>
                                <dd class="col-sm-12 text-center">[3411171068]</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-light">
                    <div class="row d-flex justify-content-center align-items-center">
                        <p class="h5">Lokasi</p>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <a href="https://www.google.co.id/maps/place/Arizka+Futsal/@-6.886844,107.5199523,17z/data=!3m1!4b1!4m5!3m4!1s0x2e68e4fe93928d55:0xeee1103ac56d8c3f!8m2!3d-6.886844!4d107.522141">
                            <img width="400px" src="../assets/img/peta.jpg" alt="">
                        </a>    
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>