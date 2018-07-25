<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");

$sql = "SELECT administrator,admin_logo,logo,adminemail,datemade,id,schoolname,pricingplan,status,payment,email FROM users WHERE administrator = '".$_SESSION['username']."' AND schoolname='".$_SESSION['school']."' LIMIT 1";
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


$phone_no = trim(mysqli_real_escape_string($conn,$_POST['phone']));
$fullname = trim(mysqli_real_escape_string($conn,$_POST['fullname']));
$address = trim(mysqli_real_escape_string($conn,$_POST['address']));
$email = trim(mysqli_real_escape_string($conn,$_POST['email']));
$gender = trim(mysqli_real_escape_string($conn,$_POST['gender']));
$password = trim(mysqli_real_escape_string($conn,$_POST['password']));
$date_of_birth = preg_replace('#[^0-9]#i','',$_POST['DOB']);
///for image uploads
$name = $_FILES['picture1']['name'];
$type = explode('.',$name);
$type = end($type);
$size = $_FILES['picture1']['size'];
$random_name = rand();
$tmp = $_FILES['picture1']['tmp_name'];
//
////////////////////////////////////////
///////////validations
////////////////////////////////////////////
$sql = "SELECT * FROM teacheradd WHERE schoolidentity = '$school_name' AND name = '$fullname'";
$query = mysqli_query($conn,$sql);
$count = mysqli_fetch_row($query);

if($type!='jpg' && $type!='JPG' && $type!='PNG' && $type!='png'){
?>
<p style="color:red;">*<?php echo "image format not supported, you can only upload 'jpg' and 'png' image formats<br/>";?></p>
<?php
} else if($count!=0){
?>
<p style="color:red;">*<?php echo "these teacher have already been added";?></p>
<?php
} else {
move_uploaded_file($tmp,"../../logo/".$random_name.'.'.$type);
$sql = "INSERT INTO teacheradd(phone_no,name,address,email,gender,date_of_birth,picture,password,datemade,schoolidentity)
VALUES('$phone_no','$fullname','$address','$email','$gender','$date_of_birth','$random_name.$type','$password',now(),'$school_name')";
$query = mysqli_query($conn,$sql);		 
?>
<script>
alert("teacher successfully added");
</script>
<?php
}
?>