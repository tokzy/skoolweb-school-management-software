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
	$res = mysqli_query($conn, "SELECT * FROM studentadd WHERE id=".$_GET['remove_id']."");
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$name = $row['name'];
	$email = $row['email'];
	$address = $row['address'];
	$class = $row['class'];
	$picture = $row['picture'];
	$password = $row['password'];
	$datemade = $row['datemade'];
	$schoolidentity = $row['schoolidentity'];
	$gender = $row['gender'];
	$date_of_birth = $row['date_of_birth'];
	$admission_number = $row['admission_number'];
	$user = 'student';
	$deleted_by = 'admin';
	
	$sql ="INSERT INTO recyclebin(deleted_by,password,name,email,address,class,datemade,photo,user,schoolidentity,gender,date_of_birth,admission_number) 
	VALUES('$deleted_by','$password','$name','$email','$address','$class','$datemade','$picture','$user','$schoolidentity','$gender','$date_of_birth','$admission_number')";
	$query = mysqli_query($conn,$sql);
	mysqli_query($conn,"DELETE FROM studentadd WHERE id=".$_GET['remove_id']."");
	redirect_to("students.php");
}
?>