<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include_once("header.php");


if(isset($_GET['temps'])){
$term = mysqli_real_escape_string($conn,$_GET['term']);
$satisfactory_range = mysqli_real_escape_string($conn,$_GET['satisfactory_range']);
$unsatisfactory_range = mysqli_real_escape_string($conn,$_GET['unsatisfactory_range']);
$position_type = mysqli_real_escape_string($conn,$_GET['position_type']);

$sql_insert = "UPDATE `templates` SET term = '$term',satisfactory_range='$satisfactory_range',unsatisfactory_range='$unsatisfactory_range',position_type = '$position_type' WHERE schoolidentity = '$school_name'";
$query_insert = mysqli_query($conn,$sql_insert);
header("location:results.php?message='successfully set'");
}

?>