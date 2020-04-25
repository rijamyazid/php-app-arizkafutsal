<?php
    $message = '';
    if (isset($_POST['login'])) {
        
        $query = "SELECT * FROM admin WHERE username='$_POST[username]'";
        $result = mysqli_query($con, $query);
        $data = mysqli_fetch_array($result);
        if($data > 0){
            if($data['password'] != $_POST['password']){
                $message = "Username atau password yang anda masukan salah";
            } else {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];

                header("Location: ../admin/index.php");
            }
        } else {
            $query = "SELECT * FROM user WHERE username='$_POST[username]'";
            $result = mysqli_query($con, $query);
            $data = mysqli_fetch_array($result);
            if($data > 0){
                if($data['password'] != $_POST['password']){
                    $message = "Username atau password yang anda masukan salah";
                } else {
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['password'] = $_POST['password'];

                    if(!empty($_POST["remember"])) {
                        setcookie ("user_login",$_POST["username"],time()+ (365 * 24 * 60 * 60));
                        setcookie ("ps_login",$_POST["password"],time()+ (365 * 24 * 60 * 60));
                    } else {
                        if(isset($_COOKIE["user_login"])) {
                            setcookie ("user_login","");
                            setcookie ("ps_login","");
                        }
                    }

                    header("Location: ../member/index.php");
                }
            } else {
                $message = "Username atau password yang anda masukan salah";
            }
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="../Assets/css/log-daf.css">
    </head>
    <body>
            <form method="post">
                <div class="container">
                    <div class="logo">
                        <img src="../Assets/img/logo.jfif" alt="logo">
                        <div class ="logotul">CEK JADWAL SEKARANG</div>
                    </div>
                    <div class="pem">
                        <div class="daf">
                            <h2>LOGIN</h2>
                            <div class="box">
                                <label for="username"></label>
                                <input type="text" name="username" placeholder="Username" <?php if(isset($_COOKIE["user_login"])) { ?> value="<?= $_COOKIE["user_login"] ?>" <?php } ?>><br>
                            </div>
                            <div class="box">
                                <label for="password"></label>
                                <input type="password" name="password" placeholder="Password" <?php if(isset($_COOKIE["user_login"])) { ?> value="<?= $_COOKIE["ps_login"] ?>" <?php } ?>><br>
                            </div>
                            <div class="box1">
                                <div class="cb">
                                <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                                </div>
                                <div>
                                <label for="remember-me">Remember me</label><br>
                                </div>
                            </div>
                            <div class="btn-log">
                                <?= $message ?><br>
                                <input type="submit" name="login" value="LOGIN">
                            </div>
                            <div class="foot">
                                <div class=df>
                                <a href="?hal=buat_akun">Buat Akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </body>
</html>