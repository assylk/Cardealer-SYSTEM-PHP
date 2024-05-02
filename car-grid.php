<?php
include("inc/db.php");
session_start();
error_reporting(0);
// Set the number of records per page
$records_per_page = 4;
// Get the current page number from the URL, default to 1 if not set
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $records_per_page;
$getTot=mysqli_query($con,"select * from cars");
$total=mysqli_num_rows($getTot);
$total_pages = ceil($total / $records_per_page);

$sql=mysqli_query($con,"select * from cars ORDER BY name LIMIT $offset, $records_per_page");

?>


<!DOCTYPE html>
<html lang="zxx">
<head>

    <!-- End Google Tag Manager -->
    <title>Car Shop - Car List</title>
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
<style>
.search-area .search-fields {
    padding: 15px;
}
</style>
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
                                <li class="nav-item  ">
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
                <h1>Car Grid</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.php  ">Home</a></li>
                    <li class="active">Car Grid</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub banner end -->

    <!-- Car list rightside start -->
    <div class="car-list-rightside content-area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-5 col-sm-5">
                                <h4>
                                    <span class="heading-icon">
                                        <i class="fa fa-caret-right icon-design"></i>
                                        <i class="fa fa-th-large"></i>
                                    </span>
                                    <span class="heading">Car Grid</span>
                                </h4>
                            </div>

                        </div>
                    </div>
                    <div class="subtitle">
                        <?php echo $records_per_page ?> Result Found
                    </div>
                    <div class="row">

                        <?php
                        
                        if(!isset($_POST['submit'])){
                            while($row=mysqli_fetch_assoc($sql)) { ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="car-box">
                                <!-- car img -->
                                <div class="car-thumbnail">
                                    <a href="car-details.php" class="car-img">
                                        <div class="tag button alt featured">Featured</div>
                                        <div class="price-ratings-box">
                                            <p class="price">
                                                <?php echo $row['price'] ?> DT
                                            </p>
                                            <div class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <img src="admin/assets/carImages/<?php echo $row['image']; ?>" alt="car-10"
                                            class="img-fluid">
                                    </a>
                                    <div class="car-overlay">
                                        <a href="car-details.php?id=<?php echo $row['id'] ?>" class="overlay-link">
                                            <i class="fa fa-link"></i>
                                        </a>
                                        <a class="overlay-link car-video" title="Lexus GS F">
                                            <i class="fa fa-video-camera"></i>
                                        </a>
                                        <div class="car-magnify-gallery">
                                            <a href="<?php echo $row['image']; ?>" class="overlay-link">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                            <a href="<?php echo $row['image']; ?>" class="hidden"></a>
                                            <a href="<?php echo $row['image']; ?>" class="hidden"></a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li class="bordered-right">
                                        <i class="flaticon-car"></i> <?php echo $row['category']; ?>
                                    </li>
                                    <li class="bordered-right">
                                        <i class="flaticon-road-with-broken-line"></i>
                                        <?php echo $row['kilometre']; ?>KM
                                    </li>
                                    <li>
                                        <i class="flaticon-gas-pump"></i> <?php echo $row['oil']; ?>
                                    </li>
                                </ul>
                                <!-- detail -->
                                <div class="detail">
                                    <!-- title -->
                                    <h1 class="title">
                                        <a
                                            href="car-details.php?id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a>
                                    </h1>
                                    <!-- Location -->
                                    <div class="location">
                                        <a href="car-details.php?id=<?php echo $row['id'] ?>">
                                            <i class="fa fa-map-marker"></i><?php echo $row['adresse']; ?>
                                        </a>
                                    </div>
                                    <!-- paragraph -->
                                </div>
                            </div>
                        </div>
                        <?php  }
                    }else if(isset($_POST['submit'])){
                        $brand=$_POST['brand'];
                        $location=$_POST['location'];
                        $year=$_POST['year'];
                        $category=$_POST['category'];
                        $transition=$_POST['transition'];
                        $sql=mysqli_query($con,"select * from cars where brand='$brand' and adresse='$location' and year='$year' and category='$category' and transition='$transition' LIMIT $offset, $records_per_page");
                        if(mysqli_num_rows($sql)>0){
                            $total=mysqli_num_rows($sql);
                            while($row=mysqli_fetch_assoc($sql)) {
                                ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="car-box">
                                <!-- car img -->
                                <div class="car-thumbnail">
                                    <a href="car-details.php?id=<?php echo $row['id'] ?>" class="car-img">
                                        <div class="tag button alt featured">Featured</div>
                                        <div class="price-ratings-box">
                                            <p class="price">
                                                <?php echo $row['price']; ?>DT
                                            </p>
                                            <div class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>"
                                            class="img-fluid">
                                    </a>
                                    <div class="car-overlay">
                                        <a href="car-details.php?id=<?php echo $row['id'] ?>" class="overlay-link">
                                            <i class="fa fa-link"></i>
                                        </a>
                                        <a class="overlay-link car-video" title="<?php echo $row['name']; ?>">
                                            <i class="fa fa-video-camera"></i>
                                        </a>
                                        <div class="car-magnify-gallery">
                                            <a href="<?php echo $row['image']; ?>" class="overlay-link">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                            <a href="<?php echo $row['image']; ?>" class="hidden"></a>
                                            <a href="<?php echo $row['image']; ?>" class="hidden"></a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li class="bordered-right">
                                        <i class="flaticon-car"></i> <?php echo $row['category']; ?>
                                    </li>
                                    <li class="bordered-right">
                                        <i class="flaticon-road-with-broken-line"></i>
                                        <?php echo $row['kilometre']; ?>KM
                                    </li>
                                    <li>
                                        <i class="flaticon-gas-pump"></i> <?php echo $row['oil']; ?>
                                    </li>
                                </ul>
                                <!-- detail -->
                                <div class="detail">
                                    <!-- title -->
                                    <h1 class="title">
                                        <a
                                            href="car-details.php?id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a>
                                    </h1>
                                    <!-- Location -->
                                    <div class="location">
                                        <a href="car-details.php?id=<?php echo $row['id'] ?>">
                                            <i class="fa fa-map-marker"></i><?php echo $row['adresse']; ?>
                                        </a>
                                    </div>
                                    <!-- paragraph -->
                                </div>
                            </div>
                        </div>
                        <?php }
                        }else{?>
                        <center><label style="font-size:20px;margin-bottom:40px">Aucun véhicule trouvé</label></center>
                        <?php 
                        }
                    }?>



                        <div class="col-lg-12">
                            <div class="pagination-box hidden-mb-45">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?php
                // Calculate total number of pages

                // Previous page link
                if ($current_page > 1) {?>
                                        <li class="page-item"><a class="page-link"
                                                href="?page=<?php echo ($current_page - 1) ?>"><span
                                                    aria-hidden="true">«</span></a></li>
                                        <?php } else {?>
                                        <li class="page-item disabled"><span class="page-link"><span
                                                    aria-hidden="true">«</span></span></li>
                                        <?php
                }

                // Page links
                for ($i = 1; $i <= $total_pages; $i++) {?>
                                        <li class="page-item <?php echo ($current_page == $i ? 'active' : '') ?>"><a
                                                class="page-link" href="?page=<?php echo $i ?>"><?php echo $i; ?></a>
                                        </li>
                                        <?php }

                // Next page link
                if ($current_page < $total_pages   ) {?>
                                        <li class="page-item"><a class="page-link"
                                                href="?page=<?php echo ($current_page + 1) ?>"><span
                                                    aria-hidden="true">»</span></a></li>
                                        <?php
                } else {?>
                                        <li class="page-item disabled"><span class="page-link"><span
                                                    aria-hidden="true">»</span></span></li>
                                        <?php
                }
                ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Search area start -->
                        <div class="widget search-area">
                            <h5 class="sidebar-title">Find your Car</h5>
                            <div class="search-area-inner">
                                <div class="search-contents ">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <select class="selectpicker search-fields" required name="brand">
                                                <option value="">Choose One</option>
                                                <option value="Brand">Brand</option>
                                                <option value="Audi">Audi</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Honda">Honda</option>
                                                <option value="Nissan">Nissan</option>
                                                <option value="Lamborghini">Lamborghini</option>
                                                <option value="Toyoto">Toyoto</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <select class="selectpicker search-fields" required name="location">
                                                <option value="">Choose One Location</option>
                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Manufacture Year</label>
                                            <select class="selectpicker search-fields" required name="year">
                                                <option value="">Choose One Year</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="selectpicker search-fields" required name="category">
                                                <option value="">Choose One</option>
                                                <option value="Luxury Car">Luxury Car</option>
                                                <option value="Pickup Truck">Pickup Truck</option>
                                                <option value="Minivan">Minivan</option>
                                                <option value="Truck">Truck</option>
                                                <option value="Sports Car">Sports Car</option>
                                                <option value="Van">Van</option>
                                                <option value="Wagon">Wagon</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Transmission</label>
                                            <select class="selectpicker search-fields" required name="transition">
                                                <option>Choose One Transition</option>
                                                <option value="Automatic">Automatic</option>
                                                <option value="Manual">Manual</option>
                                            </select>
                                        </div>
                                        <br>
                                        <button class="search-button btn-md btn-color" type="submit"
                                            name="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Car list rightside end -->

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
                                <a href="car-details.php" class="btn btns-black">Show Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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