<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("connect.php");
include ("admin/html/functions/functionlogin.php");
?>
<?php
$sql = "SELECT administrator,logo,adminemail,datemade,id,schoolname,pricingplan,status,payment,email FROM users WHERE administrator = '".$_SESSION['username']."' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$admin = $row['administrator'];
$logo = $row['logo'];
$status = $row['status'];
$datemade = $row['datemade'];
$payment = $row['payment'];
$admin_email = $row['adminemail'];
$school_name = $row['schoolname'];
$pricing_plan = $row['pricingplan'];
$id = $row['id'];
$skoolemail = $row['email'];


if(isset($_GET['purchaseid'])){
	
$sql = "SELECT * FROM bulk WHERE plan = '".$_GET['purchaseid']."' AND schoolidentity = '$school_name' ";
$query = mysqli_query($conn,$sql);	
$rowet = mysqli_fetch_row($query);
if($rowet!=0){
redirect_to("bulk.php?id=".urlencode('you have already register for these bulk sms plan')."");	
exit;	
} else {
$sql = "INSERT INTO bulk(plan,schoolidentity,datemade)VALUES('".$_GET['purchaseid']."','$school_name',now())";
$query = mysqli_query($conn,$sql);
redirect_to("bulk.php?id=".urlencode('you have register for our bulk sms successfully')."");
exit;	
}
}
?>