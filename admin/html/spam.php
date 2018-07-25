<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");
?>
<?php
if(isset($_GET['remove_id'])){
$sql = "UPDATE email SET spam = 1 WHERE id = '".$_GET['remove_id']."'";
$query = mysqli_query($conn,$sql);
redirect_to("email.php?spam=".urlencode('message marked as spam')."");	
}
?>