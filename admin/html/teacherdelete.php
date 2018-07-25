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
	$res = mysqli_query($conn, "SELECT * FROM teacheradd WHERE id=".$_GET['remove_id']."");
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$name = $row['name'];
	$email = $row['email'];
	$address = $row['address'];
	$picture = $row['picture'];
	$datemade = $row['datemade'];
	$schoolidentity = $row['schoolidentity'];
	$gender = $row['gender'];
	$date_of_birth = $row['date_of_birth'];
	$phone_no = $row['phone_no'];
	$deleted_by = 'admin';
	$password = $row['password'];
	
	$user = 'teacher';
	$sql ="INSERT INTO recyclebin(deleted_by,phone_no,name,email,address,datemade,photo,user,schoolidentity,gender,date_of_birth,password) 
	VALUES('$deleted_by','$phone_no','$name','$email','$address','$datemade','$picture','$user','$schoolidentity','$gender','$date_of_birth','$password')";
	$query = mysqli_query($conn,$sql);
	mysqli_query($conn,"DELETE FROM teacheradd WHERE id=".$_GET['remove_id']."");
	redirect_to("teachers.php");
}
?>