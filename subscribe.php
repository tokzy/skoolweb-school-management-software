<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("connect.php");
?>

<?php
$message = "";
$var = $_POST['subscribe'];
if(isset($var) && !empty($var)){
	if(!filter_var($var,FILTER_VALIDATE_EMAIL)){
	echo "<b style='font-size:25px;'>INVALID EMAIL,PLEASE ENTER A VALID EMAIL</b>";	
	} else{
$sql = "INSERT INTO newsletter(email,datemade)VALUES('$var',now())";
$query = mysqli_query($conn,$sql);
 $message = '<b style="font-size:25px;">THANK YOU, SUBSCRIPTION SUCCESSFULL <i class="fa fa-check-square-o"></i>';
  echo $message;
}
} else {
	$message ="<b style='font-size:25px;'>please fill in your email</b>";
	echo $message;
}
?>
