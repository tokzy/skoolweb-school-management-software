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
	$res = mysqli_query($conn, "SELECT * FROM class WHERE id=".$_GET['remove_id']."");
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$class = $row['class'];
	$teachers = $row['teachers'];
	$category = $row['category'];
	$datemade = $row['datemade'];
	$schoolidentity = $row['schoolidentity'];
	$user = 'subject';
	$deleted_by = 'admin';
	
	$sql ="INSERT INTO recyclebin(deleted_by,user,schoolidentity,class,category,datemade,teachers) 
	VALUES('$deleted_by','$user','$schoolidentity','$class','$category','$datemade','$teachers')";
	$query = mysqli_query($conn,$sql);
	mysqli_query($conn,"DELETE FROM class WHERE id=".$_GET['remove_id']."");
	redirect_to("class.php");
}
?>