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

                            <div><a href="#sejarah">BERANDA</a></div>
                            <div><a href="#geografis">KELOLA AKUN</a></div>
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
                                <li><a href="#">Logout</a></li>
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
            include "admin.php";
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