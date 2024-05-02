<?php 
session_start();
error_reporting(0);
if(strlen($_SESSION['admin'])!=0){
    header("location:index.php");
}
include("../inc/db.php");

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql=mysqli_query($con,"SELECT * FROM admin WHERE email='$email' AND password='$password' ");
    if (mysqli_num_rows($sql) >0){
        $_SESSION["admin"]="1";
        echo "<script>window.location.href = 'index.php';</script>";
    }else{
        $msg= "Email or Password is incorrect.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dreamchat - Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logos/logo-white.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <?php if($msg!=''){ ?>
                            <div class="alert <?php echo mysqli_num_rows($sql) >0 ? 'alert-success' : 'alert-danger'; ?>"
                                role="alert">
                                <?php echo $msg; ?>
                            </div>
                            <?php }?>
                            <form method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>
</html>