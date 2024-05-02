<?php
if(strlen($_SESSION['admin'])==0){
    header("location:../index.php");
}
session_start();
session_unset();
session_destroy();
header('location:../index.php');

?>