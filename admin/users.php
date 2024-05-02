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
  $sql=mysqli_query($con,"delete from users where id = '".$_GET['id']."'");
  if($sql){
    $msg='User deleted successfully !';
  }
}

if(isset($_POST['add'])){
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $checkEmail=mysqli_query($con,"select * from users where  email='$email'");
  if (mysqli_num_rows($checkEmail) > 0) {
      $msg='This Email is already registered!';
  }else{
     $sql=mysqli_query($con,"insert into users(fullname,email,password) values('$fullname','$email','$password')");
     if($sql){
      $msg="User added Successfully !";
     }else{
      $msg="Error in adding user";
     }  
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Car Shop - Dashboard</title>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body" style="margin-left: 30px;">
                        <div class="row" style="margin-top:30px">
                            <input placeholder="Username" type="text" name="fullname" class="input" required="">
                        </div>
                        <div class="row" style="margin-top:30px">
                            <input placeholder="Email" type="text" name="email" class="input" required="">
                        </div>
                        <div class="row" style="margin-top:30px">
                            <input placeholder="Password" type="password" name="password" class="input" required="">
                        </div>

                        <div class="row mb-3" style="margin-top:50px">
                            <input type="submit" value="Add" class="btn btn-danger" style="width:400px" name="add">
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

                        <li class="active">
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
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Users</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Report User</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                    User</button>


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
                                                <th>Email</th>
                                                <th>Registration Date</th>

                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $getUsers=mysqli_query($con,"select * from users");
                        while($row=mysqli_fetch_assoc($getUsers)){
                        ?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="general.html" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/client.png" alt="User Image" /></a>
                                                        <a href="general.html"><?php echo $row['fullname'] ?>
                                                            <span>#00<?php echo $row['id'] ?></span></a>
                                                    </h2>
                                                </td>
                                                <td><?php echo $row['email'] ?></td>
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
            window.location.href = 'users.php?id=' + userId + '&del=delete';
        }
    }
    </script>
</body>
</html>