<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include "connect.php";

$plan = $_POST['price'];
$students = $_POST['name'];

if($plan == 'BASIC'){
$price = 300*$students;
echo '#'.$price;	
}else if($plan =='REGULAR'){
$price = 500*$students;
echo '#'.$price;		
}else if($plan =='PROFESSIONAL'){
$price = 1000*$students;
echo '#'.$price;		
} else{	
}


?>