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
	$res = mysqli_query($conn, "SELECT * FROM recyclebin WHERE id=".$_GET['remove_id']."");
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
	mysqli_query($conn,"DELETE FROM recyclebin WHERE id=".$_GET['remove_id']."");
	unlink("logo/".$row['photo']);
	redirect_to("recycle.php");
}
?>

<?php
ob_end_flush();
?>