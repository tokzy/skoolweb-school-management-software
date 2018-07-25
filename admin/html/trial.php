<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
?>
<html>
<head></head>
<body>
<?php
$sql = "SELECT * FROM users WHERE id = '".$_GET['trial_id']."'";	
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$admin = $row['administrator'];
$logo = $row['logo'];
$school_name = $row['schoolname'];

$sql = "SELECT COUNT(id) FROM payments WHERE schoolidentity = '$school_name'";	
$query = mysqli_query($conn,$sql);
$row1 = mysqli_fetch_row($query);
	
$sql = "INSERT INTO payments(schoolidentity,admin,school_logo,datemade)
VALUES('$school_name','$admin','$logo',now())";
$query = mysqli_query($conn,$sql);

$sql = "UPDATE users set status = 1,payment = 'activated' WHERE id = '".$_GET['trial_id']."'";
$query = mysqli_query($conn,$sql);
header("location:index.php");
?>
</body>
</html>