<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");
?>
<?php
if(isset($_GET['remove_id']))
{
	$res = mysqli_query($conn, "SELECT * FROM parentadd WHERE id=".$_GET['remove_id']."");
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$name = $row['name'];
	$email = $row['email'];
	$address = $row['address'];
	$phone = $row['phone'];
	$child = $row['child'];
	$profession = $row['profession'];
	$datemade = $row['datemade'];
	$schoolidentity = $row['schoolidentity'];
	$password = $row['password'];
	$user = 'parent';
	$deleted_by = 'admin';
	
	$sql ="INSERT INTO recyclebin(password,deleted_by,name,email,address,child,phone_no,datemade,user,schoolidentity,profession) 
	VALUES('$password','$deleted_by','$name','$email','$address','$child','$phone','$datemade','$user','$schoolidentity','$profession')";
	$query = mysqli_query($conn,$sql);
	mysqli_query($conn,"DELETE FROM parentadd WHERE id=".$_GET['remove_id']."");
	redirect_to("parents.php");
}
?>