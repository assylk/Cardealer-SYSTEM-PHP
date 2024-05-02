<?php
session_start();
error_reporting(0);
include('inc/db.php');

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql=mysqli_query($con,"SELECT * FROM users  WHERE email='$email' AND password='$password'");
    
    if(mysqli_num_rows($sql)==1){
        while($row=mysqli_fetch_assoc($sql)) {
        $ex_id = $row['id'];
        $ex_fname = $row['fullname'];
        $ex_email=$email;
        }
        $_SESSION['login']="true";
        $_SESSION['id']=$ex_id;
        $_SESSION['fullname']=$ex_fname;
        $_SESSION['email'] = $ex_email;
        header("location: index.php");

    }else{
        echo "<script>alert('Email or Password is incorrect')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->
    <title>Car Shop - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/magnific-popup.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.selectBox.css">
    <link type="text/css" rel="stylesheet" href="assets/css/rangeslider.css">
    <link type="text/css" rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7COswald:200,300,400,500,600%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">

</head>
<body id="top">


    <!-- Login 1 start -->
    <div class="login-1">
        <div class="container-fluid">
            <div class="row login-box">
                <div class="col-lg-6 bg-color-15 pad-0 none-992 bg-img">
                    <div class="info clearfix">
                        <h1>Welcome to <a href="index.php">Car Shop</a></h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type</p>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center pad-0 form-section">
                    <div class="form-inner">
                        <a href="index.php" class="logo">
                            <img src="assets/img/logos/logo.png" alt="logo">
                        </a>
                        <h3>Sign Into Your Account</h3>
                        <form method="post">
                            <div class="form-group clearfix">
                                <input name="email" type="email" required class="form-control"
                                    placeholder="Email Address" aria-label="Email Address">
                            </div>
                            <div class="form-group clearfix">
                                <input name="password" required type="password" class="form-control"
                                    placeholder="Password" aria-label="Password">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn-theme btn-md w-100">Login</button>
                            </div>
                            <div class="extra-login form-group clearfix">
                                <span>Or Login With</span>
                            </div>
                            <div class="clearfix"></div>

                        </form>

                        <div class="clearfix"></div>
                        <p>Don't have an account? <a href="register.php" class="thembo"> Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login end -->

    <!-- Full Page Search -->
    <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form action="#">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="button" class="btn btn-sm btn-color">Search</button>
        </form>
    </div>

    <!-- External JS libraries -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.selectBox.js"></script>
    <script src="assets/js/rangeslider.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.filterizr.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/backstretch.js"></script>
    <script src="assets/js/jquery.countdown.js"></script>
    <script src="assets/js/jquery.scrollUp.js"></script>
    <script src="assets/js/typed.min.js"></script>
    <script src="assets/js/jquery.mb.YTPlayer.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script>
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <!-- Custom JS Script -->
    <script src="assets/js/app.js"></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLMZXT6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

</body>
</html>