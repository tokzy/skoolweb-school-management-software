<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");
?>
<?php
if(isset($_GET['remove_id'])){
mysqli_query($conn,"DELETE FROM message WHERE id=".$_GET['remove_id']."");
redirect_to("messages.php");
}
?>
<?php
ob_end_flush();
?>
