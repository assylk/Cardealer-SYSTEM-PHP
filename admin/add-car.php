<?php  

session_start();
error_reporting(0);
include("../inc/db.php");
if(strlen($_SESSION['admin'])==0){
    header("location:login.php");
}
if(isset($_POST['submit'])) { 
  $cname=$_POST['cname'];
  $cprice=$_POST['cprice'];
  $coil=$_POST['coil'];
  $transition=$_POST['transition'];
  $categ=$_POST['categ'];
  $year=$_POST['year'];
  $location=$_POST['location'];
  $body=$_POST['body'];
  $kilometer=$_POST['kilometer'];//
  $modele=$_POST['modele'];//
  $brand=$_POST['brand'];//
  $color=$_POST['color'];//
  $engine=$_POST['engine'];//
  $description=$_POST['description'];//
  $pic=time().$_FILES["pic"]["name"];
  if(move_uploaded_file($_FILES["pic"]["tmp_name"],"assets/carImages/".$pic)){
    $sql=mysqli_query($con,"insert into cars(name,category,price,oil,kilometre,adresse,modele,brand,transition,year,image,color,engine,description) values('$cname','$categ','$cprice','$coil','$kilometer','$location','$modele','$brand','$transition','$year','$pic','$color','$engine','$description') ");
    if($sql){
        echo "<script>alert('Car Added Successfully !')</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Dreamchat - Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logos/logo-white.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />

    <link rel="stylesheet" href="assets/css/feathericon.min.css" />

    <link rel="stylesheet" href="assets/plugins/morris/morris.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="../assets/img/logos/logo.png" alt="Logo" />
                </a>
                <a href="index.php" class="logo logo-small">
                    <i class="fa fa-car fa-2x" style="color: red; margin-top: 15px"></i>
                </a>
            </div>

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here" />
                    <button class="btn" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>

            <ul class="nav user-menu">


                <li class="nav-item">
                    <a href="logout.php"><button class="btn btn-danger btn-sm btn-rounded">Logout</button></a>
                </li>

            </ul>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title"></li>
                        <li>
                            <a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="users.php"><i class="fe fe-users"></i> <span>Users</span></a>
                        </li>
                        <li class="active">
                            <a href="add-car.php"><i class="fe fe-car"></i> <span>Add Cars</span></a>
                        </li>
                        <li>
                            <a href="shop-items.php"><i class="fe fe-shopping-bag"></i> <span>Shop List</span></a>
                        </li>




                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Add Car</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.phpp">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Add Car</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault01">Car Name</label>
                                                    <input type="text" class="form-control" id="validationDefault01"
                                                        placeholder="Car name" name="cname" required>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault02">Car Price</label>
                                                    <input type="text" class="form-control" id="validationDefault02"
                                                        placeholder="Car price" name="cprice" required>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefaultUsername">Car Oil</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            id="validationDefaultUsername" name="coil"
                                                            placeholder="Car oil" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault03">Transition</label>
                                                    <select name="transition" class="form-control" required>
                                                        <option value="">Transition</option>
                                                        <option value="Automatic">Automatic</option>
                                                        <option value="Manual">Manual</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault03">Category</label>
                                                    <select name="categ" class="form-control" required>
                                                        <option value="">Select Car Catgory</option>
                                                        <option value="Luxury Car">Luxury Car</option>
                                                        <option value="Pickup Truck">Pickup Truck</option>
                                                        <option value="Pickup Truck">Pickup Truck</option>
                                                        <option value="Minivan">Minivan</option>
                                                        <option value="Truck">Truck</option>
                                                        <option value="Sports Car">Sports Car</option>
                                                        <option value="Van">Van</option>
                                                        <option value="Wagon">Wagon</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault04">Year</label>
                                                    <select class="form-control" name="year" required>
                                                        <option value="">Manufacture Year</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault05">Car Adresse</label>
                                                    <select class="form-control" name="location" required>
                                                        <option value="">Location</option>
                                                        <option value="Tunis">Tunis</option>
                                                        <option value="Sousse">Sousse</option>
                                                        <option value="Sfax">Sfax</option>
                                                        <option value="Kairouan">Kairouan</option>
                                                        <option value="Monastir">Monastir</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault05">Car Body</label>
                                                    <select class="form-control" name="body" required>
                                                        <option value="">Body</option>
                                                        <option value="Suv">Suv</option>
                                                        <option value="Sedan">Sedan</option>
                                                        <option value="Minivan">Minivan</option>
                                                        <option value="Truck">Truck</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault05">kilometer</label>
                                                    <input type="number" placeholder="Enter kilometer" min="0"
                                                        class="form-control" name="kilometer" required>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault05">Modele</label>
                                                    <input type="text" placeholder="Enter modele" class="form-control"
                                                        name="modele" required>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault05">Color</label>
                                                    <input type="text" placeholder="Enter color" class="form-control"
                                                        name="color" required>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault05">Engine</label>
                                                    <input type="text" placeholder="Enter engine" class="form-control"
                                                        name="engine" required>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label for="pic">Car Picture</label>
                                                    <input type="file" class="form-control" name="pic" required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationDefault05">Car Brand</label>
                                                    <select class="form-control" name="brand" required>
                                                        <option value="">Brand</option>
                                                        <?php $getBrand=mysqli_query($con,"select * from brand order by name");
                                                        while($row=mysqli_fetch_assoc($getBrand)){
                                                        ?>
                                                        <option value="<?php echo $row['id'] ?>">
                                                            <?php echo $row['name'] ?></option>
                                                        <?php }?>

                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label for="pic">Description</label>
                                                    <textarea class="form-control" name="description"
                                                        required></textarea>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary" name="submit" type="submit">Submit
                                                form</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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