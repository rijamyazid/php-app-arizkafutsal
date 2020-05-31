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
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-md-7">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <img width="300px" src="../Assets/img/logo.png" alt="logo">
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p class="h3">CEK JADWAL SEKARANG</p>
            </div>
        </div>
    </div>
    <div class="col-md">
    <form method="post">
        <div class="card bg-dark text-light">
            <div class="card-body px-5">
                <h2 class="text-center">LOGIN</h2>
                <div class="form-group row">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" <?php if(isset($_COOKIE["user_login"])) { ?> value="<?= $_COOKIE["user_login"] ?>" <?php } ?>><br>
                </div>
                <div class="form-group row">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" <?php if(isset($_COOKIE["user_login"])) { ?> value="<?= $_COOKIE["ps_login"] ?>" <?php } ?>><br>
                </div>
                <div class="form-check row mb-2">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                    <label class="form-check-label" for="remember">Remember Me</label><br>
                </div>
                <div class="form-group row">
                    <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
                </div>
                <div class="form-group row">
                    <a href="?hal=buat_akun" class="btn btn-success btn-block" >Buat Akun</a>
                </div>
            </div>
        </div>
    </form>
    </div>
    <div class="col-md-1">

    </div>
</div>