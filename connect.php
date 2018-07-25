<?php
$dbhost = "localhost";
$dbuser = "root";
$dbname = "skoolweb";
$dbpass = "";

$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($conn->connect_error){
die("connection failed:".$conn->connect_error);		
} 
?>
