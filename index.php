<?php
session_start();
error_reporting(0);
include('inc/db.php');


?>


<!DOCTYPE html>
<html lang="zxx">
<head>

    <!-- End Google Tag Manager -->
    <title>Car Shop - Home</title>
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



    <!-- main header start -->
    <header class="main-header main-header-two" id="main-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light rounded">
                        <a class="navbar-brand logos" href="index.html">
                            <img src="assets/img/logos/logo-white.png" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fa fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">
                                        Home
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="team.php" aria-haspopup="true" aria-expanded="false">
                                        Team
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="car-grid.php" aria-haspopup="true" aria-expanded="false">
                                        Car Listing
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="shop-list.php" aria-haspopup="true"
                                        aria-expanded="false">
                                        Shop Listing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="shop-cart.php" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>

                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <a href="#full-page-search" class="btn btn-2 my-2 my-sm-0">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- main header end -->

    <!-- Banner start -->
    <div class="banner" id="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner banner-opt">
                <div class="carousel-item active">
                    <img class="d-block w-100 h-100" src="assets/img/banner/img-4.jpg" alt="banner-slider-1">
                    <div
                        class="carousel-caption banner-slider-inner bsi-there text-center d-lg-none d-xl-none d-flex h-100">
                        <div class="carousel-content">
                            <div id="typed-strings">
                                <p>Welcome to CAR SHOP</p>
                            </div>
                            <h1 class="typed-text">&nbsp;
                                <span id="typed"></span>
                            </h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetu radipisi cing elitBeatae autem aperiam nequ
                                quaera molestias
                            </p>
                            <a href="#" class="btn btn-md btns-black" data-animation="animated fadeInUp delay-05s">Get
                                Started Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 h-100" src="assets/img/banner/img-3.jpg" alt="banner-slider-1">
                    <div
                        class="carousel-caption banner-slider-inner bsi-there text-center d-lg-none d-xl-none d-flex h-100">
                        <div class="carousel-content">
                            <div id="typed-strings2">
                                <p>Find Your Dream Car</p>
                            </div>
                            <h1 class="typed-text">&nbsp;
                                <span id="typed2"></span>
                            </h1>
                            <p>Lorem ipsum dolor sit amet, consectetu radipisi cing elitBeatae autem aperiam nequ quaera
                                molestias</p>
                            <a href="#" class="btn btn-md btns-black" data-animation="animated fadeInUp delay-05s">Get
                                Started Now</a>
                            <a href="#" class="btn btn-md btn-border" data-animation="animated fadeInUp delay-05s">Learn
                                More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 h-100" src="assets/img/banner/img-2.jpg" alt="banner-slider-1">
                    <div
                        class="carousel-caption  banner-slider-inner bsi-there text-center d-lg-none d-xl-none d-flex h-100">
                        <div class="carousel-content">
                            <div id="typed-strings3">
                                <p>Best Place For Sell Car</p>
                            </div>
                            <h1 class="typed-text">&nbsp;
                                <span id="typed3"></span>
                            </h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetu radipisi cing elitBeatae autem aperiam nequ
                                quaera molestias
                            </p>
                            <a href="#" class="btn btn-md btns-black" data-animation="animated fadeInUp delay-05s">Get
                                Started Now</a>
                            <a href="#" class="btn btn-md btn-border" data-animation="animated fadeInUp delay-05s">Learn
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search area banner start -->
        <div class="search-area-banner">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
        <!-- Search area banner end -->
    </div>
    <!-- banner end -->

    <!-- Search area start -->

    <!-- Search area start -->

    <!-- Featured car start -->
    <div class="featured-car content-area-2">
        <div class="container">
            <div class="main-title main-title-2">
                <h1>Featured Car</h1>
            </div>
            <ul class="list-inline-listing filters filteriz-navigation">
                <li class="active btn filtr-button filtr" data-filter="all">All</li>
                <?php $getBrand2=mysqli_query($con,"select * from brand order by name limit 5");
                while($row=mysqli_fetch_assoc($getBrand2)) { 
                ?>
                <li data-filter="<?php echo $row['id'] ?>" class="btn btn-inline filtr-button filtr">
                    <?php echo $row['name'] ?></li>
                <?php }?>

            </ul>
            <div class="row filter-portfolio">
                <div class="">
                    <?php $fetchCars=mysqli_query($con,"select * from cars order by name limit 5");

                    while($row=mysqli_fetch_assoc($fetchCars)){

                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="<?php echo $row['brand']; ?>">
                        <div class="car-box-4">
                            <!-- car img -->
                            <div class="car-thumbnail">
                                <a href="car-details.html" class="car-img">
                                    <img src="admin/assets/carImages/<?php echo $row['image']; ?>" alt="car-1"
                                        class="img-fluid">
                                </a>
                                <div class="car-overlay">
                                    <a href="car-details.html" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a class="overlay-link car-video" title="<?php echo $row['name'] ?>">
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                    <div class="car-magnify-gallery">
                                        <a href="admin/assets/carImages/<?php echo $row['image']; ?>"
                                            class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="admin/assets/carImages/<?php echo $row['image']; ?>"
                                            class="hidden"></a>
                                        <a href="admin/assets/carImages/<?php echo $row['image']; ?>"
                                            class="hidden"></a>
                                    </div>
                                </div>
                                <div class="text">
                                    <div class="pull-left">
                                        <a href="car-details.html"><?php echo $row['name'] ?></a>
                                    </div>
                                    <div class="pull-right price">
                                        <?php echo $row['price'] ?> DT
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  }?>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured car end -->

    <!-- Our services start -->
    <div class="our-services content-area-7 bg-grea">
        <div class="container">
            <div class="main-title">
                <h1>We Are The Best</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInLeft delay-04s">
                    <i class="flaticon-padlock"></i>
                    <h5>Highly Secured</h5>
                    <p>Our car shop ensures top-notch security measures to safeguard your personal information and
                        transactions. </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInUp delay-04s">
                    <i class="flaticon-agreement"></i>
                    <h5>Trusted Agents</h5>
                    <p>Our agents are knowledgeable, experienced, and committed to helping you find the perfect vehicle
                        to suit your needs and preferences. </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInDown delay-04s">
                    <i class="flaticon-badge"></i>
                    <h5>Get an Offer</h5>
                    <p>From financing options to special promotions, unlock unbeatable deals and incentives to make your
                        car-buying experience even more rewarding.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInRight delay-04s">
                    <i class="flaticon-customer-service"></i>
                    <h5>24/7 Customer Support</h5>
                    <p>our friendly and knowledgeable support team is available 24/7 to address your concerns and
                        provide prompt solutions.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Our services end -->



    <!-- Our services start -->
    <div class="our-services-4 content-area-8 overview-bgi"
        style="background-image: url(assets/img/services-bg-photo.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 align-self-center">
                    <div class="services-info-4">
                        <h3 class="mb-3">Our Services</h3>
                        <p class="mb-3">Discover a comprehensive range of services tailored to meet all your automotive
                            needs at our car shop. From vehicle sales to financing options, maintenance services, and
                            trade-ins, we offer a one-stop solution for all things automotive. </p>
                        <div class="clearfix mrg-btm-10"></div>
                        <a href="#" class="btn btn-sm btn-color">Explore more</a>
                        <a href="#" class="btn btn-sm btn-border">Purchase New</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 offset-xl-1 wow fadeInUp delay-04s">
                    <div class="big-car">
                        <img src="assets/img/bb.png" alt="bb" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About us end -->

    <!-- Testimonial 3 start -->
    <div class="testimonial testimonial-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="testimonial-inner">
                        <header class="testimonia-header">
                            <h1>Our Testimonial</h1>
                        </header>
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p>
                                        I couldn't be happier with my experience at the car shop! From the moment I
                                        walked in, the staff made me feel welcome and valued.
                                    </p>
                                    <div class="avatar">
                                        <img src="assets/img/avatar/avatar-2.jpg" alt="avatar-2"
                                            class="img-fluid rounded">
                                    </div>
                                    <ul class="rating">
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star-half-full"></i>
                                        </li>
                                    </ul>
                                    <div class="author-name">
                                        John Antony
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <p>
                                        he staff were incredibly knowledgeable and went above and beyond to ensure I
                                        found the right vehicle for my needs.
                                    </p>
                                    <div class="avatar">
                                        <img src="assets/img/avatar/avatar.jpg" alt="avatar" class="img-fluid rounded">
                                    </div>
                                    <ul class="rating">
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star-half-full"></i>
                                        </li>
                                    </ul>
                                    <div class="author-name">
                                        Martin Smith
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <p>
                                        They helped me secure a loan with favorable terms tailored to my needs, making
                                        it easy for me to drive off the lot in my dream car.
                                    </p>
                                    <div class="avatar">
                                        <img src="assets/img/avatar/avatar-3.jpg" alt="avatar-3"
                                            class="img-fluid rounded">
                                    </div>
                                    <ul class="rating">
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star-half-full"></i>
                                        </li>
                                    </ul>
                                    <div class="author-name">
                                        Karen Paran
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial 3 end -->



    <!-- Our Partner area end -->
    <div class="our-partner">
        <div class="container">
            <div class="main-title">
                <h1>Our Partners</h1>
            </div>
        </div>
        <div class="partner-inner">
            <div class="container">
                <div class="row">
                    <div class="multi-carousel" data-items="1,3,5,6" data-slide="1" id="multiCarousel"
                        data-interval="1000">
                        <div class="multi-carousel-inner">
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/themeforest.png" alt="brand">
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/audiojungle.png" alt="brand">
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/codecanyon.png" alt="brand">
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/graphicriver.png" alt="brand">
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/audiojungle.png" alt="brand">
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/themeforest.png" alt="brand">
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/tuts.png" alt="brand">
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/themeforest.png" alt="brand">
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/audiojungle.png" alt="brand">
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <img src="assets/img/brands/codecanyon.png" alt="brand">
                                </div>
                            </div>
                        </div>
                        <a class="multi-carousel-indicator leftLst" aria-hidden="true">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="multi-carousel-indicator rightLst" aria-hidden="true">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Partner area start -->

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

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLMZXT6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

</body>
</html>