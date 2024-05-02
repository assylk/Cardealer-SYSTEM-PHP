<?php

session_start();
error_reporting(0);
include("inc/db.php");
$amount=$_GET['amount'];
$userID=$_GET['userID'];
$carID=$_GET['carID'];
$payment_id=$_GET['payment_id'];
echo $amount;




$up=mysqli_query($con,"delete from cars where id='".$carID."'");
if(mysqli_num_rows($up)==0){
    echo "<script>alert('Car is no more Available')</script>";
}else{
    $enroll=mysqli_query($con,"insert into enrolledCars(cardID,userId,paymentID,amount) values('$carID','$userID','$payment_id','$amount')");

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
</head>
<style>
._failed {
    border-bottom: solid 4px red !important;
}

._failed i {
    color: red !important;
}

._success {
    box-shadow: 0 15px 25px #00000019;
    padding: 45px;
    width: 100%;
    text-align: center;
    margin: 40px auto;
    border-bottom: solid 4px #28a745;
}

._success i {
    font-size: 55px;
    color: #28a745;
}

._success h2 {
    margin-bottom: 12px;
    font-size: 40px;
    font-weight: 500;
    line-height: 1.2;
    margin-top: 10px;
}

._success p {
    margin-bottom: 0px;
    font-size: 18px;
    color: #495057;
    font-weight: 500;
}
</style>

<body>
    <div class="container">
        <?php if($up && $enroll){ ?>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="message-box _success">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2> Your payment was successful </h2>
                    <p> Thank you for your payment. we will <br>
                        be in contact with more details shortly </p>
                </div>
            </div>
        </div>
        <?php }else{ ?>



        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="message-box _success _failed">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                    <h2> Your payment failed </h2>
                    <p> Try again later </p>

                </div>
            </div>
        </div>
        <?php }?>

    </div>
    <script>
    setTimeout(function() {
        window.location = "http://localhost/carshop/car-grid.php";
    }, 5000);
    </script>
</body>
</html>