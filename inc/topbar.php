<header class="top-header top-header-bg d-none d-xl-block d-lg-block d-md-block" id="top-header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="list-inline">
                    <a href="tel:+216 32 456 789"><i class="fa fa-phone"></i>+216 32 456 789</a>
                    <a href="tel:themevessel.us@gmail.com"><i class="fa fa-envelope"></i>carshop@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <ul class="top-social-media pull-right">
                    <li>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    </li>

                    <li>
                        <a href="#">/</a>
                    </li>
                    <?php if(strlen($_SESSION['login'])==0){ ?>
                    <li>
                        <a href="login.php" class="sign-in"><i class="fa fa-sign-in"></i> Login </a>
                    </li>
                    <li>
                        <a href="register.php" class="sign-in"><i class="fa fa-user"></i> Register</a>
                    </li>
                    <?php }else{?>
                    <li>
                        <a href="logout.php" class="sign-in"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                    <?php }?>

                </ul>
            </div>
        </div>
    </div>
</header>