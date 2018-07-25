<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");

$sql = "SELECT administrator,admin_logo,logo,adminemail,datemade,id,schoolname,pricingplan,status,payment,email FROM users WHERE administrator = '".$_SESSION['username']."' AND schoolname = '".$_SESSION['school']."' LIMIT 1";
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

$admission_number = trim(mysqli_real_escape_string($conn,$_POST['admissionno']));
$address = trim(mysqli_real_escape_string($conn,$_POST['address']));
$email = trim(mysqli_real_escape_string($conn,$_POST['email']));
$class = trim(mysqli_real_escape_string($conn,$_POST['class']));
$gender = trim(mysqli_real_escape_string($conn,$_POST['gender']));
$date_of_birth = preg_replace('#[^0-9]#i','',$_POST['DOB']);
///for image uploads
$name = $_FILES['photo']['name'];
$type = explode('.',$name);
$type = end($type);
$size = $_FILES['photo']['size'];
$random_name = rand();
$tmp = $_FILES['photo']['tmp_name'];
//
////////////////////////////////////////
///////////validations
////////////////////////////////////////////
if(($_FILES['photo']['name'])==''){
$sql = "SELECT picture FROM studentadd WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
$count = mysqli_fetch_array($query);	
	
$sql = "UPDATE studentadd SET admission_number = '$admission_number',address = '$address',email = '$email',class = '$class',gender = '$gender',date_of_birth = '$date_of_birth' WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);		 
echo "<span class='text-info'>record updated successfully!!<i class='fa fa-check fa-fw'></i></span>";
} else {
$sql = "SELECT picture FROM studentadd WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
$count = mysqli_fetch_array($query);	
unlink("../../logo/".$count['picture']);

if($type!='jpg' && $type!='JPG' && $type!='PNG' && $type!='png'){
?>
<p style="color:red;">*<?php echo "image format not supported, you can only upload 'jpg' and 'png' image formats<br/>";?></p>
<?php
} else { 
move_uploaded_file($tmp,"../../logo/".$random_name.'.'.$type);
$sql = "UPDATE studentadd SET admission_number = '$admission_number',address = '$address',email = '$email',class = '$class',gender = '$gender',date_of_birth = '$date_of_birth',picture = '$random_name.$type' WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);		 
echo "<span class='text-info'>record updated successfully!!<i class='fa fa-check fa-fw'></i></span>";	
}	
}
?>