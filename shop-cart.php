<?php
session_start();
// Check if the form is submitted to remove an item from the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_from_cart'])) {
    // Check if the remove_index is set
    if(isset($_POST['remove_index']) && is_numeric($_POST['remove_index'])) {
        $remove_index = $_POST['remove_index'];

        // Check if the cart is not empty
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            // Remove the item from the cart array
            unset($_SESSION['cart'][$remove_index]);
            echo "<script>alert('Item removed successfully!')</script>";
            // Reset array keys to maintain sequential index
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}
if(isset($_GET['error'])){
        echo "<script>alert('You must be logged in before you buy')</script>";
    }
// Initialize variables for cart totals
$subTotal = 0;
$shippingCharge = 7;

?>
<!DOCTYPE html>
<html lang="zxx">
<head>

    <!-- End Google Tag Manager -->
    <title>Car Shop - Shop Cart</title>
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
    <?php include('inc/topbar.php'); ?>
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
                <h1>Shop Cart</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Shop Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub banner end -->

    <!-- Shop cart start -->
    <div class="shop-cart content-area-13">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="heading-2">
                        <h4>Shopping Cart</h4>
                    </div>
                    <table class="shop-table cart mb-20">
                        <thead>
                            <tr>
                                <th class="product-name">Item</th>
                                <th class="product-price">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Qty</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php // Check if the cart is empty
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            // Display the cart items
            foreach ($_SESSION['cart'] as $key => $item) {
                $total=intval($item['price'])*intval($item['quantity']);
                        $subTotal += $item["price"] * $item["quantity"];

                ?>

                            <tr>
                                <td class="product-thumbnail"><img src="admin/<?php echo $item['image'] ?>"
                                        alt="shop-1">
                                </td>
                                <td class="product-name"><a href="#"><?php echo $item['name']; ?></a></td>
                                <td><?php echo $item['price']; ?>DT</td>
                                <td><input class="qty" disabled type="text" value="<?php echo $item['quantity']; ?>">
                                </td>
                                <td><?php echo $total; ?>DT</td>
                                <td class="product-remove">
                                    <form method="post">
                                        <input type="hidden" name="remove_index" value="<?php echo $key ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" name="remove_from_cart"><i
                                                class="fa fa-close"></i></a>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                    }
                } else {
                    // Display a message if the cart is empty
                    echo "<tr><td colspan='6'>Your cart is empty</td></tr>";
                }
                ?>

                        </tbody>
                    </table>
                </div>
                <?php 
                // Calculate grand total
            $grandTotal = $subTotal + $shippingCharge ;
                ?>
                <div class="col-lg-4">
                    <div class="cart-total-box bg-light">
                        <h5>Cart Totals</h5>
                        <hr>
                        <ul>
                            <li>
                                Subtotal<span class="pull-right"><?php echo number_format($subTotal, 2); ?>DT</span>
                            </li>
                            <li>
                                Shipping Charge<span
                                    class="pull-right"><?php echo number_format($shippingCharge, 2); ?>DT</span>
                            </li>


                        </ul>
                        <hr>
                        <p class="mar-b-50">
                            Grand Total<span class="pull-right"><?php echo number_format($grandTotal, 2); ?>DT</span>
                        </p>
                        <br>
                        <a
                            href="<?php echo strlen($_SESSION['login'])==0?"?id=".$_SESSION['id']."&error=mustbelogin":"flousi2.php?amount=".$grandTotal."&userID=".$_SESSION['id']."" ?>">
                            <button class="btn btn-color btn-block btn-md" type="submit">Proceed To Checkout</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop cart end -->

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
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Add event listener to all close icons
        var closeIcons = document.querySelectorAll(".remove-item");
        closeIcons.forEach(function(icon) {
            icon.addEventListener("click", function(event) {
                event.preventDefault();
                // Extract the product ID
                var productId = this.getAttribute("data-product-id");
                // Send AJAX request to remove item from cart
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "remove_from_cart.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Reload the page after item is removed
                        location.reload();
                    }
                };
                xhr.send("product_id=" + productId);
            });
        });
    });
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLMZXT6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

</body>
</html>