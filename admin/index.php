<?php
session_start();
error_reporting(0);
include('../inc/db.php');
if(strlen($_SESSION['admin'])==0){
    header("location:login.php");
}
$sqlcar=mysqli_query($con,"select * from cars");
$totalCars=mysqli_num_rows($sqlcar);  

$sqluser=mysqli_query($con,"select * from users");
$totalUsers=mysqli_num_rows($sqluser);  

$sqlenroll=mysqli_query($con,"select * from shopenrolled");
$totalEnrolled=mysqli_num_rows($sqlenroll);  

// Code for Deletion
if(isset($_GET['del']))
{
mysqli_query($con,"delete from cars where id = '".$_GET['id']."'");
$_SESSION['message']="Car deleted!";
header( "location:index.php" ); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Dreamchat - Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logos/logo-white.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/feathericon.min.css" />

    <link rel="stylesheet" href="assets/plugins/morris/morris.css" />

    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css" />

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
<!-- Modal Edit-->
<div class="modal fade" id="showDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom:none;margin-left:12rem">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Car</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="get_details.php">
                <div class="modal-body" style="margin-left: 45px;">

                </div>
            </form>


        </div>
    </div>
</div>
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
                        <li class="active">
                            <a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="users.php"><i class="fe fe-users"></i> <span>Users</span></a>
                        </li>
                        <li>
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
                <div class="row">
                    <div class="col-xl-4 col-sm-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-primary">
                                        <i class="fe fe-car"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a class="count-title">Total Cars</a>
                                        <a class="count"><?php echo $totalCars ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-warning">
                                        <i class="fe fe-users"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a class="count-title">Total Accounts</a>
                                        <a class="count"><?php echo $totalUsers ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-danger">
                                        <i class="fe fe-comments"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a class="count-title">Enrolled Cars</a>
                                        <a class="count"> <?php echo $totalEnrolled ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Brand</th>
                                                <th>Modele</th>
                                                <th>Year</th>
                                                <th>Oil</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $fetchCars=mysqli_query($con,"select * from cars");
                                          if(mysqli_num_rows($fetchCars)==0){?>
                                            <center>
                                                <tr>
                                                    <td>No cars Available !</td>
                                                </tr>
                                            </center>
                                            <?php }else{
                                            while($row=mysqli_fetch_assoc($fetchCars)){
                                          ?>
                                            <tr>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['price'] ?></td>
                                                <td><?php echo $row['brand'] ?></td>
                                                <td><?php echo $row['modele'] ?></td>
                                                <td><?php echo $row['year'] ?></td>
                                                <td><?php echo $row['oil'] ?></td>
                                                <td>
                                                    <a onclick="confirmDelete(<?php echo $row['id']; ?>)"><i
                                                            class="fa fa-trash" style="margin-right:20px"></i></a>
                                                    <a data-bs-toggle="modal" data-bs-target="#showDetails" id="view"
                                                        data-id="<?php echo $row['id'];?>"><i class="fa
                                                        fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php }}?>
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
    <script>
    function confirmDelete(userId) {
        if (confirm('Are you sure to delete this car?')) {
            // If the user confirms, redirect to the delete action with the user ID
            window.location.href = 'index.php?id=' + userId + '&del=delete';
        }
    }
    </script>
    <script>
    // To display details in modal
    $(document).on("click", "#view", function() {
        var courseId = $(this).data('id');
        $.ajax({
            url: 'get_details.php',
            type: 'post',
            data: {
                courseId: courseId
            },
            dataType: 'text',
            success: function(response) {
                $(".modal-body").html(response);
            },
            error: function(request, status, error) {
                $(".modal-body").html(request.responseText);
            }
        });
    });
    </script>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="assets/js/script.js"></script>


</body>
</html>