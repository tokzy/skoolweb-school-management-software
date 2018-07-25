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
	$res = mysqli_query($conn, "SELECT * FROM subjectadd WHERE id=".$_GET['remove_id']."");
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$subject = $row['subject'];
	$category = $row['category'];
	$datemade = $row['datemade'];
	$schoolidentity = $row['schoolidentity'];
	$user = 'subject';
	$deleted_by = 'admin';
	
	$sql ="INSERT INTO recyclebin(deleted_by,user,schoolidentity,subject,category,datemade) 
	VALUES('$deleted_by','$user','$schoolidentity','$subject','$category','$datemade')";
	$query = mysqli_query($conn,$sql);
	mysqli_query($conn,"DELETE FROM subjectadd WHERE id=".$_GET['remove_id']."");
	redirect_to("subjects.php");
}
?>