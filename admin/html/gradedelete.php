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
	$res = mysqli_query($conn, "SELECT * FROM grade_result WHERE id=".$_GET['remove_id']."");
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$grade_name= $row['grade_name'];
	$grade_alphabet = $row['grade_alphabet'];
	$range_min = $row['range_min'];
	$range_max = $row['range_max'];
	$user = 'grades';
	$class = $row['class'];
	$datemade = $row['datemade'];
	$schoolidentity = $row['schoolidentity'];
	$deleted_by = 'admin';
	
	$sql = "INSERT INTO recyclebin (deleted_by,grade_name,grade_alphabet,range_min,range_max,user,class,datemade,schoolidentity)
	VALUES('$deleted_by','$grade_name','$grade_alphabet','$range_min','$range_max','$user','$class','$datemade','$schoolidentity')";
	$query = mysqli_query($conn,$sql);
	mysqli_query($conn,"DELETE FROM grade_result WHERE id=".$_GET['remove_id']."");
	header("location:grade.php");
}
?>