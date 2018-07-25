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
	$query = mysqli_query($conn,$sql);
	mysqli_query($conn,"DELETE FROM timetable WHERE id=".$_GET['remove_id']."");
	redirect_to("timetable.php");
}
?>