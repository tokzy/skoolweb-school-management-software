<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include_once("header.php");


if(isset($_GET['templateselector']) && $_GET['templateselector']=='template2'){
$description = '3rd CA no midterm';
$value = 'template2';

$sql_check = "SELECT * FROM `templates` WHERE schoolidentity = '$school_name'";
$query_check = mysqli_query($conn,$sql_check);
$result = mysqli_fetch_row($query_check);
if($result > 0){
$sql_update = "UPDATE `templates` SET description = '$description',template = '$value' WHERE schoolidentity='$school_name'";
$query_update = mysqli_query($conn,$sql_update);
header("location:result_settings.php?tempres2=selected");
}else{
$sql = "INSERT INTO `templates`(template,description,schoolidentity,datemade)VALUES('$value','$description','$school_name',now())";
$query = mysqli_query($conn,$sql);
header("location:result_settings.php?tempres2=selected");
}
} else {
$description = 'midterm no 3rd CA';
$value = 'template1';

$sql_check = "SELECT * FROM `templates` WHERE schoolidentity = '$school_name'";
$query_check = mysqli_query($conn,$sql_check);
$result = mysqli_fetch_row($query_check);
if($result > 0){
$sql_update = "UPDATE `templates` SET description = '$description',template = '$value' WHERE schoolidentity='$school_name'";
$query_update = mysqli_query($conn,$sql_update);
header("location:result_settings.php?tempres1=selected");
}else{
$sql = "INSERT INTO `templates`(template,description,schoolidentity,datemade)VALUES('$value','$description','$school_name',now())";
$query = mysqli_query($conn,$sql);
header("location:result_settings.php?tempres1=selected");
}
}

















?>