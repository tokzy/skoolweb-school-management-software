<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");

if(isset($_FILES["pictures1"]["name"]) && !empty($_FILES["pictures1"]["name"])){
$schoolfees = mysqli_real_escape_string($conn,$_POST['schoolfees']);
$name = $_FILES['pictures1']['name'];
$type = explode('.',$name);
$type = end($type);
$size = $_FILES['pictures1']['size'];
$random_name = rand();
$tmp = $_FILES['pictures1']['tmp_name'];
$school_logo = $random_name.'.'.$type;

move_uploaded_file($tmp,"../../logo/".$random_name.'.'.$type);
$sql = 'UPDATE `users` SET logo = "'.$school_logo.'",schoolfees = "'.$schoolfees.'" WHERE administrator ="'.$_SESSION['username'].'"';
$query = mysqli_query($conn,$sql);
echo "<span class='text-info'>successfully updated<i class='fa fa-check fa-fw'></i></span>";
}
?>