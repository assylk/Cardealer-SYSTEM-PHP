<?php 
session_start();
error_reporting(0);
include "../inc/db.php";
if(strlen($_SESSION['admin'])==0){
    header("location:login.php");
}
$car_id = $_POST['courseId'];
$sql = "select * from cars where id = '$car_id'";
$rs = mysqli_query($con,$sql);
if (mysqli_num_rows($rs) > 0) {
	$row = mysqli_fetch_array($rs);

                        echo "<div class='row' style='margin-top:40px'>

                            <input placeholder='Car Name' value='".$row['name']."' type='text' name='cname' class='input'>
                        </div>";
                        echo "<div class='row' >

                            <input placeholder='id' hidden value='$car_id' type='text' name='id' class='input'>
                        </div>";
	                    echo "<div class='row' style='margin-top:40px'>

                            <input placeholder='Car Price' value='".$row['price']."' type='text' name='cprice' class='input'>
                        </div>";
                        echo "<div class='row' style='margin-top:40px'>
                        <select class='form-control' name='coil' style='width:400px'>
                            <option value='Essence'>Essence</option>
                            <option value='Diesel'>Diesel</option>

                        </select>
                        <div class='row'style='margin-top:40px;margin-bottom:30px'>
                        <input class='btn btn-danger' style='width:400px' type='submit' value='Edit' name='edit'>
                        </div>
                        </div>";
}

if(isset($_POST["edit"])){
    $sql_check=mysqli_query($con,"select * from cars where id='".$_POST['id']."'");
    if(mysqli_num_rows($sql_check)>0){
        while($row=mysqli_fetch_assoc($sql_check)){
            $exist_price=$row['price'];
            $exist_name=$row['name'];
            $exist_oil=$row['oil'];
        }
        $new_price = $_POST['cprice'];
        $new_name = $_POST['cname'];
        $new_oil = $_POST['coil'];
        $updates = array();

        // Compare existing values with new values
        if ($exist_price !== $new_price) {
            $updates[] = "price = '$new_price'";
        }

        if ($exist_name !== $new_name) {
            $updates[] = "name = '$new_name'";
        }

        if ($exist_oil !== $new_oil) {
            $updates[] = "oil = '$new_oil'";
        }
        // If there are updates, construct the query and execute it
        if (!empty($updates)) {
            // Construct the update query
            $update_query = mysqli_query($con,"UPDATE cars SET " . implode(', ', $updates) . " WHERE id='".$_POST['id']."'");
            if($update_query){
            }
        }
        
        header("location:index.php");
    }

}


?>