<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include "connect.php";
?>
<?php
if(!empty($_POST['name']) && ($_POST['email']) && ($_POST['message'])){
$name = trim(mysqli_real_escape_string($conn, $_POST['name']));
$email = trim(mysqli_real_escape_string($conn,$_POST['email']));
$message = trim(mysqli_real_escape_string($conn,$_POST['message']));
 
$sql = "INSERT INTO contact(name,email,message,datemade)VALUES('$name','$email','$message',now())";
$query = mysqli_query($conn,$sql);
echo "<b style='color:red;font-size:25px;'>YOUR MESSAGE HAVE BEEN SENT SUCCESSFULLY, THANK YOU FOR CONTACTING US</b>";
} else {
 echo "<b style='font-size:25px;color:red;'>PLEASE FILL IN YOUR DETAILS</b>";	
}
?>
<?php
ob_end_flush();
?>