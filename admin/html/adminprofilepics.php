<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");

if(isset($_FILES["pictures"]["name"])){
$name = $_FILES['pictures']['name'];
$type = explode('.',$name);
$type = end($type);
$size = $_FILES['pictures']['size'];
$random_name = rand();
$tmp = $_FILES['pictures']['tmp_name'];
$admin_logo = $random_name.'.'.$type;

move_uploaded_file($tmp,"../../logo/".$random_name.'.'.$type);
$sql = 'UPDATE `users` SET admin_logo = "$admin_logo" WHERE administrator ="'.$_SESSION['username'].'" AND schoolname = "'.$_SESSION['school'].'"';
$query = mysqli_query($conn,$sql);
}
?>