<?php
session_start();
include('inc/db.php');
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from shop where id='$id'");
if(mysqli_num_rows($sql)==1){
    $data=mysqli_fetch_assoc($sql);
    $productId=$data['id'];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    if(strlen($_SESSION['login'])==0){
        echo "<script>alert('Please Login First!')</script>";
    }else{
        // Check if quantity is set and not empty
    if (isset($_POST["quantity"]) && !empty($_POST["quantity"])) {
        // Retrieve product quantity from the form
        $quantity = $_POST["quantity"];

        // You can add more logic here, like checking if the quantity is valid, or if the product exists in the database

        // Check if the item already exists in the cart
        $itemExists = false;
        if (!empty($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as &$item) {
                // Here, you need to check if the item already exists based on some identifier, like product ID
                // For now, let's assume $productId is the identifier for each item
                if ($item["id"] == $productId) {
                    // If the item exists, increase its quantity
                    echo "<script>alert('Item Already Added')</script>";
                    $item["quantity"] += $quantity;
                    $itemExists = true;
                    break;
                }
            }
        }

        // If the item doesn't exist in the cart, add it
        if (!$itemExists) {
            $_SESSION["cart"][] = array(
                "id" => $productId,
                "quantity" => $quantity,
                "image" => $data['image'],
                "name" => $data['name'],
                "price" => $data['price']
                // You can add more product details here, like name, price, etc.
            );
            echo "<script>alert('Added to Cart!')</script>";
        }
    }
    }
    
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>

    <!-- End Google Tag Manager -->
    <title>Car Shop - Shop Detail</title>
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


    <!-- Top header start -->
    <?php include('inc/topbar.php');?>
    <!-- Top header end -->

    <!-- main header start -->
    <header class="main-header" id="main-header-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light rounded">
                        <a class="navbar-brand logo" href="index.php">
                            <img src="assets/img/logos/logo.png" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fa fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item ">
                                    <a class="nav-link" href="index.php" aria-haspopup="true" aria-expanded="false">
                                        Home
                                    </a>

                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="team.php" aria-haspopup="true" aria-expanded="false">
                                        Team
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="car-grid.php" aria-haspopup="true" aria-expanded="false">
                                        Car Listing
                                    </a>

                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="shop-list.php" aria-haspopup="true" aria-expanded="false">
                                        Shop Listing
                                    </a>

                                </li>
                                <li class="nav-item active ">
                                    <a class="nav-link" href="shop-cart.php" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>

                                </li>



                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- main header end -->

    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Shop Details</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Shop Details</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub banner end -->

    <!-- Shop single start -->
    <div class="shop-single content-area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shop-slider">
                        <div id="carDetailsSlider" class="carousel car-details-sliders slide cmn-mrg-btm">
                            <!-- main slider carousel items -->
                            <div class="carousel-inner bg-danger">
                                <div class="active item carousel-item" style="padding:50px;background:#f9f9f9;">
                                    <img src="admin/<?php echo $data['image'] ?>" class="img-fluid" alt="shop-1">
                                </div>



                            </div>

                        </div>
                    </div>

                    <div class="shop-info widget ml-20 d-lg-none d-xl-none">
                        <h3><?php echo $data['name'] ?></h3>
                        <div class="reviews-box clearfix">
                            <ul class="reviews-star-list">
                                <li><i class="fa fa-star"> </i></li>
                                <li><i class="fa fa-star"> </i></li>
                                <li><i class="fa fa-star"> </i></li>
                                <li><i class="fa fa-star"> </i></li>
                                <li><i class="fa fa-star-0"> </i></li>
                            </ul>
                            <div class="reviews">
                                <a href="#">15 Review(s)</a>
                                <a href="#">
                                    <i class="fa fa-pencil"></i>write a review
                                </a>
                            </div>
                        </div>
                        <div class="price">
                            <?php echo $data['price'] ?>DT
                        </div>
                        <div class="horizontal">
                            <ul>
                                <li><span>Manufacturer :</span>
                                </li>
                            </ul>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                            tristique auctor.</p>

                        <form>


                            <div class="row">
                                <div class="col-md-5 col-sm-5 form-group">
                                    <input class="form-control" type="text" required placeholder="Quantity">
                                </div>

                                <div class="col-md-7 col-sm-7 form-group">
                                    <button class="btn btn-block btn-color btn-md">Add to cart</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
                <div class="col-lg-4">
                    <div class="sidebar-right">
                        <div class="widget shop-info  d-none d-xl-block d-lg-block">
                            <h3><?php echo $data['name'] ?></h3>
                            <div class="reviews-box clearfix">
                                <ul class="reviews-star-list">
                                    <li><i class="fa fa-star"> </i></li>
                                    <li><i class="fa fa-star"> </i></li>
                                    <li><i class="fa fa-star"> </i></li>
                                    <li><i class="fa fa-star"> </i></li>
                                    <li><i class="fa fa-star-0"> </i></li>
                                </ul>
                                <div class="reviews">
                                    <a href="#">15 Review(s)</a>
                                    <a href="#">
                                        <i class="fa fa-pencil"></i>write a review
                                    </a>
                                </div>
                            </div>
                            <div class="price">
                                <?php echo $data['price'] ?>DT
                            </div>
                            <div class="horizontal">
                                <ul>
                                    <li><span>Manufacturer :</span> Tartaan & Co</li>

                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                                tristique auctor.</p>

                            <form method="post">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 form-group mb-0">
                                        <input class="form-control" type="text" placeholder="Quantity" name="quantity">
                                    </div>

                                    <div class="col-md-7 col-sm-7 form-group mb-0">
                                        <button class="btn btn-block btn-color btn-md" name="submit" type="submit">Add
                                            to
                                            cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>





                    </div>
                </div>
            </div>

            <h3 class="shop-title">Related Products</h3>
            <div class="row">
                <?php $getrandom=mysqli_query($con,"select * from shop where id!='$id' order by RAND() LIMIT 4");
                while($row=mysqli_fetch_assoc($getrandom)){
                ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="shop-box">
                        <img class="shop-theme img-fluid" src="admin/<?php echo $row['image'] ?>" alt="shop-2">
                        <div class="shop-details">
                            <h4><?php echo $row['price'] ?></h4>
                            <h3><a href="shop-single.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
                            </h3>
                            <a class="btn btn-border btn-sm" href="shop-single.php?id=<?php echo $row['id'] ?>"
                                role="button">Add to Cart</a>
                        </div>
                    </div>
                </div>
                <?php }?>

            </div>
        </div>
    </div>
    <!-- Shop single end -->

    <!-- Footer start -->
    <?php include('inc/footer.php'); ?>
    <!-- Footer end -->

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
<?php }?>