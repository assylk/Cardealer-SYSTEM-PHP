<?php 
session_start();
error_reporting(0);
include("../inc/db.php");


if(strlen($_SESSION['admin'])==0){
    header("location:login.php");
}
    // Code for Deletion
if(isset($_GET['del']))
{
  $sql=mysqli_query($con,"delete from shop where id = '".$_GET['id']."'");
  if($sql){
    $msg='Item deleted successfully !';
  }
}

if (isset($_POST['add'])) {
    // Check if all fields are filled
    if(isset($_POST['name']) && isset($_POST['price']) && isset($_FILES['pic'])) {
        // Handle file upload
        $target_dir = "shop/";
        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["pic"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["pic"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["pic"]["name"])). " has been uploaded.";
                
                // Prepare SQL statement to insert data into database
                $name = mysqli_real_escape_string($con, $_POST['name']);
                $price = mysqli_real_escape_string($con, $_POST['price']);
                $pic = mysqli_real_escape_string($con, $target_file);
                
                $sql = "INSERT INTO shop (name, price, image) VALUES ('$name', '$price', '$pic')";
                
                if (mysqli_query($con, $sql)) {
                    echo "<p>Data saved to database successfully.</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Car Shop - Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logos/logo-white.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />

    <link rel="stylesheet" href="assets/css/feathericon.min.css" />

    <link rel="stylesheet" href="assets/plugins/morris/morris.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<style>
/* From uiverse.io by @alexruix */
.input {
    line-height: 28px;
    border: 2px solid transparent;
    border-bottom-color: #e84646;
    padding: .2rem 0;
    outline: none;
    width: 400px;
    background-color: transparent;
    color: #0d0c22;
    transition: .3s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.input:focus,
.input:hover {
    outline: none;
    padding: .2rem 1rem;
    border-radius: 1rem;
    border-color: #e84646;
}

.input::placeholder {
    color: #777;
}

.input:focus::placeholder {
    opacity: 0;
    transition: opacity .3s;
}
</style>
<body>
    <!-- Modal ADD-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom:none;margin-left:12rem">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body" style="margin-left: 30px;">
                        <div class="row" style="margin-top:30px">
                            <input placeholder="Item Name" type="text" name="name" class="input" required="">
                        </div>
                        <div class="row" style="margin-top:30px">
                            <input placeholder="Item Price" type="number" name="price" class="input" required="">
                        </div>
                        <div class="row" style="margin-top:30px">
                            <input type="file" name="pic" class="input" required="">
                        </div>

                        <div class="row mb-3" style="margin-top:50px">
                            <input placeholder="Username" type="submit" value="Add Item" class="btn btn-danger"
                                style="width:400px" name="add">
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>


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
                        <li>
                            <a href="add-car.php"><i class="fe fe-car"></i> <span>Add Cars</span></a>
                        </li>
                        <li class="active">
                            <a href="shop-items.php"><i class="fe fe-shopping-bag"></i> <span>Shop List</span></a>
                        </li>




                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Shop</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Shop Items</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                    Item</button>


                <div class="row">
                    <?php if($msg!=''){ ?>
                    <div class="alert <?php echo $sql ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                        <i class="dripicons-<?php echo $sql ? 'checkmark' : 'cross'; ?> me-2"></i>
                        <?php echo $msg; ?>
                    </div>
                    <?php }?>
                    <div class="col-md-12 d-flex">

                        <div class="card card-table flex-fill">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Creation Date</th>

                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $getUsers=mysqli_query($con,"select * from shop order by id");
                        while($row=mysqli_fetch_assoc($getUsers)){
                        ?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="general.html" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="<?php echo $row['image'] ?>"
                                                                alt="item Image" /></a>
                                                        <a href="general.html"><?php echo $row['name'] ?>
                                                            <span>#00<?php echo $row['id'] ?></span></a>
                                                    </h2>
                                                </td>
                                                <td><?php echo $row['price'] ?></td>
                                                <td><?php echo $row['creationDate'] ?></td>

                                                <td class="text-end">
                                                    <div class="actions">

                                                        <a onclick="confirmDelete(<?php echo $row['id']; ?>)"
                                                            class="btn btn-sm bg-danger-light">
                                                            <i class="fe fe-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="assets/js/script.js"></script>
    <script>
    function confirmDelete(userId) {
        if (confirm('Are you sure to delete this user?')) {
            // If the user confirms, redirect to the delete action with the user ID
            window.location.href = 'shop-items.php?id=' + userId + '&del=delete';
        }
    }
    </script>
</body>
</html>