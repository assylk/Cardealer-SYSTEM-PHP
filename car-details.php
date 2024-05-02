<?php
session_start();
error_reporting(0);
include("inc/db.php");
$sql=mysqli_query($con,"select * from cars where id='".$_GET['id']."'");
if(mysqli_num_rows($sql)==0){
    echo "<script>alert('Car Not Found')</script>";
}else{
    while($row=mysqli_fetch_assoc($sql)){
        $id=$row['id'];
        $name=$row['name'];
        $price=$row['price'];
        $category=$row['category'];
        $oil=$row['oil'];
        $kilometre=$row['kilometre'];
        $adresse=$row['adresse'];
        $modele=$row['modele'];
        $brand=$row['brand'];
        $transition=$row['transition'];
        $year=$row['year'];
        $image=$row['image'];
        $description=$row['description'];
        $color=$row['color'];
        $engine=$row['engine'];
        $addingDate=$row['addingDate'];
    }
    if(isset($_GET['error'])){
        echo "<script>alert('You must be logged in before you buy')</script>";
    }
?>

<!DOCTYPE html>
<html lang="zxx">
<head>

    <!-- End Google Tag Manager -->
    <title>Car Shop - Car Details</title>
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
    <?php include("inc/topbar.php"); ?>
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
                                <li class="nav-item active">
                                    <a class="nav-link" href="car-grid.php" aria-haspopup="true" aria-expanded="false">
                                        Car Listing
                                    </a>

                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="shop-list.php" aria-haspopup="true" aria-expanded="false">
                                        Shop Listing
                                    </a>

                                </li>
                                <li class="nav-item ">
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
                <h1>Car Details</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Car Details</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub banner end -->

    <!-- Car details page start -->
    <div class="car-details-page content-area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12 slider">
                    <div id="carDetailsSlider" class="carousel car-details-sliders slide cmn-mrg-btm">
                        <div class="heading-car">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h3><?php echo $name; ?></h3>
                                        <p><i class="fa fa-map-marker"></i> <?php echo $adresse; ?></p>
                                    </div>
                                    <div class="p-r">
                                        <h3><?php echo $price; ?>DT</h3>
                                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="admin/assets/carImages/<?php echo $image; ?>" class="img-fluid" alt="car-4">
                            </div>
                            <div class="item carousel-item" data-slide-number="1">
                                <img src="assets/img/car-6.jpg" class="img-fluid" alt="car-6">
                            </div>
                            <div class="item carousel-item" data-slide-number="2">
                                <img src="assets/img/car-3.jpg" class="img-fluid" alt="car-3">
                            </div>
                            <div class="item carousel-item" data-slide-number="4">
                                <img src="assets/img/car-5.jpg" class="img-fluid" alt="car-5">
                            </div>
                            <div class="item carousel-item" data-slide-number="5">
                                <img src="assets/img/car-8.jpg" class="img-fluid" alt="car-8">
                            </div>
                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators smail-car list-inline nav nav-justified">
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0"
                                    data-target="#carDetailsSlider">
                                    <img src="assets/img/car-4.jpg" class="img-fluid" alt="car-4">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#carDetailsSlider">
                                    <img src="assets/img/car-6.jpg" class="img-fluid" alt="car-6">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#carDetailsSlider">
                                    <img src="assets/img/car-3.jpg" class="img-fluid" alt="car-3">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-3" data-slide-to="3" data-target="#carDetailsSlider">
                                    <img src="assets/img/car-5.jpg" class="img-fluid" alt="car-5">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-4" data-slide-to="4" data-target="#carDetailsSlider">
                                    <img src="assets/img/car-8.jpg" class="img-fluid" alt="car-8">
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="specifications widget d-lg-none d-xl-none">
                        <h5 class="sidebar-title">Specifications</h5>
                        <ul>
                            <li>
                                <span>Make</span><?php echo $brand; ?>
                            </li>
                            <li>
                                <span>Model</span><?php echo $modele; ?>
                            </li>
                            <li>
                                <span>Body Style</span>Convertible
                            </li>
                            <li>
                                <span>Condition</span>Brand New
                            </li>
                            <li>
                                <span>Year</span><?php echo $year; ?>
                            </li>
                            <li>
                                <span>Mileage</span><?php echo $kilometre; ?>KM
                            </li>
                            <li>
                                <span>Transmission</span><?php echo $transition; ?>
                            </li>
                            <li>
                                <span>Interior Color</span><?php echo $color; ?>
                            </li>
                            <li>
                                <span>Engine</span><?php echo $engine; ?>
                            </li>
                            <li>
                                <span>Fuel Type</span><?php echo $oil; ?>
                            </li>

                            <li>
                                <span>Location</span><?php echo $adresse; ?>
                            </li>
                        </ul>
                    </div>

                    <div class="tabbing tabbing-box cmn-pad-t cmn-mrg-btm">
                        <ul class="nav nav-tabs" id="carTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab"
                                    aria-controls="one" aria-selected="false">Vehicle Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab"
                                    aria-controls="two" aria-selected="false">Features & Options</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab"
                                    aria-controls="three" aria-selected="true">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4"
                                    aria-selected="true">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5"
                                    aria-selected="true">Contact</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="carTabContent">
                            <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                <p><?php echo $description; ?>

                            </div>
                            <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <div class="features-opions">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Adaptive Cruise Control
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Airbags
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Air Conditioning
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Alarm System
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Anti-theft Protection
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Audio Interface
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Automatic Climate Control
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Automatic Headlights
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Auto Start/Stop
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Bi-Xenon Headlights
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Audio Interface
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Bluetooth Handset
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    BOSE Surround Sound
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Burmester Surround Sound
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    CD/DVD Autochanger
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    CDR Audio
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Cruise Control
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Direct Fuel Injection
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Electric Parking Brake
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Floor Mats
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Garage Door Opener
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Leather Package
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Locking Rear Differential
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Luggage Compartments
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Manual Transmission
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Navigation Module
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Online Services
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    ParkAssist
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Porsche Communication
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    CD/DVD Autochanger
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Power Steering
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Reversing Camera
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Roll-over Protection
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Seat Heating
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Seat Ventilation
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Sound Package Plus
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Sport Chrono Package
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Steering Wheel Heating
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Tire Pressure Monitoring
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Universal Audio Interface
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Voice Control System
                                                </li>
                                                <li>
                                                    <i class="fa fa-circle"></i>
                                                    Wind Deflector
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                                <div class="car-vedio">
                                    <iframe src="https://www.youtube.com/embed/m5_AKjDdqaU"></iframe>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
                                <div class="section location">
                                    <div class="map">
                                        <div id="map" class="contact-map"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
                                <div class="contact-1">
                                    <form action="#" method="GET" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group name">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group email">
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group subject">
                                                    <input type="text" name="subject" class="form-control"
                                                        placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group number">
                                                    <input type="text" name="phone" class="form-control"
                                                        placeholder="Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group message">
                                                    <textarea class="form-control" name="message"
                                                        placeholder="Write message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="send-btn">
                                                    <button type="submit" class="btn btn-color btn-md btn-message">Send
                                                        Message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="heading">Specifications</h3>
                    <div class="amenities-box cmn-mrg-btm">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-speed-meter"></i> Top Speed: 260</span></li>
                                    <li><span><i class="flaticon-gas-pump"></i> Fuel Type:
                                            <?php echo $transition ?></span></li>
                                    <li><span><i class="flaticon-road-with-broken-line"></i> Mileage:
                                            <?php echo $kilometre ?> KM</span>
                                    </li>
                                    <li><span><i class="flaticon-engine"></i> Engine: <?php echo $engine ?></span></li>
                                    <li><span><i class="flaticon-car-settings"></i> Gear: 5</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-car"></i> Body Style: <?php echo $brand ?></span></li>
                                    <li><span><i class="flaticon-car-steering-wheel"></i> Drive Train: Front
                                            Wheel</span></li>
                                    <li><span><i class="flaticon-calendar"></i> Year:<?php echo $year ?></span></li>
                                    <li><span><i class="flaticon-gas-pump"></i> Fuel Type: <?php echo $oil ?></span>
                                    </li>
                                    <li><span><i class="flaticon-paint-palette-and-brush"></i> Interior Color:
                                            <?php echo $color ?></span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <ul>
                                    <li><span><i class="flaticon-eco-energy-power"></i> Horse Power: 310</span></li>
                                    <li><span><i class="flaticon-car-door"></i> Doors: 4</span></li>
                                    <li><span><i class="flaticon-map-marker"></i> Location:
                                            <?php echo $adresse ?></span></li>
                                    <li><span><i class="flaticon-paint-palette-and-brush"></i> Interior Color:
                                            Black</span></li>
                                    <li><span><i class="flaticon-changing-car-tire"></i> Free Services</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Specifications start -->
                        <div class="specifications widget d-none d-xl-block d-lg-block">
                            <h5 class="sidebar-title">Specifications</h5>
                            <ul>
                                <li>
                                    <span>Make</span>Toyota
                                </li>
                                <li>
                                    <span>Model</span>Maxima
                                </li>
                                <li>
                                    <span>Body Style</span>Convertible
                                </li>
                                <li>
                                    <span>Condition</span>Brand New
                                </li>
                                <li>
                                    <span>Year</span>2018
                                </li>
                                <li>
                                    <span>Mileage</span>37,000 mi
                                </li>
                                <li>
                                    <span>Transmission</span>6-speed Manual
                                </li>
                                <li>
                                    <span>Interior Color</span>Dark Grey
                                </li>
                                <li>
                                    <span>Engine</span>3.4L Mid-Engine V6
                                </li>
                                <li>
                                    <span>Fuel Type</span>Gasoline Fuel
                                </li>
                                <li>
                                    <span>No. of Gears:</span>5
                                </li>
                                <li>
                                    <span>Location</span>Toronto
                                </li>
                            </ul>
                        </div>



                        <!-- Helping center start -->
                        <div class="helping-center widget">
                            <div class="media">
                                <i class="fa fa-mobile"></i>
                                <div class="media-body  align-self-center">
                                    <h5 class="mt-0">Helping Center</h5>
                                    <h4><a href="tel:+0477-85x6-552">+0477 85X6 552</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <a
                                href="<?php echo strlen($_SESSION['login'])==0?"?id=".$_GET['id']."&error=mustbelogin":"flousi.php?amount=".$price."&carID=".$_GET['id']."&userID=".$_SESSION['id']."" ?>"><button
                                    class="btn btn-danger w-100">Buy Now</button></a>
                            <p style="font-size: small;">payment make take between 1 to 3 days of verification !</p>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <!-- Recent cars start -->
        <div class="recent-cars">
            <div class="container">
                <h3 class="heading">Related Cars</h3>
                <div class="row">
                    <?php 
$getcars = mysqli_query($con, "SELECT DISTINCT * FROM cars WHERE category ='$category' and id!='".$_GET['id']."' ORDER BY RAND() LIMIT 4");
                    while($row=mysqli_fetch_assoc($getcars)){
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card car-box-2">
                            <!-- car img -->
                            <div class="car-thumbnail">
                                <a href="car-details.php?id=<?php echo $row['id'] ?>" class="car-img">
                                    <img src="admin/assets/carImages/<?php echo $row['image'] ?>" alt="car-5"
                                        class="img-fluid">
                                </a>
                                <div class="car-overlay">
                                    <a href="car-details.php?id=<?php echo $row['id'] ?>" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a class="overlay-link car-video" title="<?php echo $row['name'] ?>">
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                    <div class="car-magnify-gallery">
                                        <a href="<?php echo $row['id'] ?>" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="<?php echo $row['id'] ?>" class="hidden"></a>
                                        <a href="<?php echo $row['id'] ?>" class="hidden"></a>
                                    </div>
                                </div>
                            </div>
                            <!-- detail -->
                            <div class="detail">
                                <h5 class="title"><a href="car-details.html"><?php echo $row['name'] ?></a></h5>
                                <h4 class="price">
                                    <?php echo $row['price'] ?>DT
                                </h4>
                                <a href="car-details.php?id=<?php echo $row['id'] ?>"
                                    class="btn btn-sm btn-border">Details</a>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                </div>
            </div>
        </div>
        <!-- Recent cars end -->

    </div>
    <!-- Car details page end -->

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

    <!-- Car Video Modal -->
    <div class="modal car-modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carModalLabel">
                        Fiat Punto Red
                    </h5>
                    <p>
                        123 Kathal St. Tampa City,
                    </p>
                    <span class="ratings">
                        <i class="fa fa-star s1 active" data-score="1"></i>
                        <i class="fa fa-star s2 active" data-score="2"></i>
                        <i class="fa fa-star s3 active" data-score="3"></i>
                        <i class="fa fa-star s4 active" data-score="4"></i>
                        <i class="fa fa-star s5 active" data-score="5"></i>
                    </span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5 modal-left">
                            <div class="modal-left-content">
                                <div id="modalCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <iframe class="modalIframe" src="https://www.youtube.com/embed/WoNAt9bQZtY"
                                                frameborder="0" allow="autoplay; encrypted-media"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="carousel-item">

                                            <img src="assets/img/car-1.jpg" alt="Hyundai Santa">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/img/car-3.jpg" alt="Lamborghini">
                                        </div>
                                    </div>
                                    <a class="control control-prev" href="#modalCarousel" role="button"
                                        data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="control control-next" href="#modalCarousel" role="button"
                                        data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>

                                <div class="features">
                                    <h3>Features</h3>
                                    <ul class="bullets">
                                        <li>Cruise Control</li>
                                        <li>Airbags</li>
                                        <li>Air Conditioning</li>
                                        <li>Alarm System</li>
                                        <li>Audio Interface</li>
                                        <li>CDR Audio</li>
                                        <li>Seat Heating</li>
                                        <li>ParkAssist</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 modal-right">
                            <div class="modal-right-content bg-white">
                                <strong class="price">
                                    $178,000
                                </strong>
                                <section>
                                    <h3>Description</h3>
                                    <p>
                                        Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque
                                        massa, viverra interdum eros ut, imperdiet pellentesque mauris. Proin sit amet
                                        scelerisque
                                        risus. Donec semper semper erat ut mollis. Curabitur suscipit, justo eu
                                        dignissim lacinia, ante
                                        sapien pharetra duin consectetur eros augue sed ex. Donec a odio rutrum,
                                        hendrerit sapien vitae,
                                        euismod arcu.
                                    </p>
                                </section>
                                <section>
                                    <h3>Overview</h3>
                                    <dl>
                                        <dt>Model</dt>
                                        <dd>Maxima</dd>
                                        <dt>Condition</dt>
                                        <dd>Brand New</dd>
                                        <dt>Year</dt>
                                        <dd>2017</dd>
                                        <dt>Mileage</dt>
                                        <dd>37,000 mi</dd>
                                    </dl>
                                </section>
                                <a href="car-details.html" class="btn btns-black">Show Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- External JS libraries -->
    <script src="assets/js/jquery-2.2.0.min.js"></script>
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



</body>
</html>
<?php }?>