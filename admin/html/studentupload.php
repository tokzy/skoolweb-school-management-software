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
$fullname = trim(mysqli_real_escape_string($conn,$_POST['fullname']));
$address = trim(mysqli_real_escape_string($conn,$_POST['address']));
$email = trim(mysqli_real_escape_string($conn,$_POST['email']));
$class = trim(mysqli_real_escape_string($conn,$_POST['class']));
$gender = trim(mysqli_real_escape_string($conn,$_POST['gender']));
$password = trim(mysqli_real_escape_string($conn,$_POST['password']));
 
$date_of_birth = preg_replace('#[^0-9]#','',$_POST['DOB']);
///for image uploads
$name = $_FILES['photo']['name'];
$type = explode('.',$name);
$type = end($type);
$size = $_FILES['photo']['size'];
$random_name = rand();
$tmp = $_FILES['photo']['tmp_name'];
/*------------------------------------------------------------------------
------------------------validations-------------------------------------------------*/

$sql = "SELECT * FROM studentadd WHERE schoolidentity = '$school_name' AND name = '$fullname'";
$query = mysqli_query($conn,$sql);
$count = mysqli_fetch_row($query);

$sql2 = "SELECT * FROM studentadd WHERE schoolidentity = '$school_name' AND admission_number = '$admission_number'";
$query2 = mysqli_query($conn,$sql2);
$count2 = mysqli_fetch_row($query2);

$sql3 = "SELECT * FROM studentadd WHERE schoolidentity = '$school_name' AND password = '$password'";
$query3 = mysqli_query($conn,$sql3);
$count3 = mysqli_fetch_row($query3);

$sql4 = "SELECT * FROM studentadd WHERE schoolidentity = '$school_name' AND email = '$email'";
$query4 = mysqli_query($conn,$sql4);
$count4 = mysqli_fetch_row($query4);

if($type!='jpg' && $type!='JPG' && $type!='PNG' && $type!='png'){
?>
<p class="text-info" style="font-weight:bold;font-size:20px;">*<?php echo "image format not supported, you can only upload 'jpg' and 'png' image formats<br/>";?></p>
<?php
} else if($count!=0 && $count2!=0 && $count3!=0){
?>
<p class="text-info" style="font-weight:bold;font-size:20px;">*<?php echo "these student have already been added";?></p>
<?php
} else if($count4!=0){
?>
<p class="text-info" style="font-weight:bold;font-size:20px;">*<?php echo "these email already exist";?></p>
<?php	
} else {
move_uploaded_file($tmp,"../../logo/".$random_name.'.'.$type);
$sql = "INSERT INTO studentadd(password,admission_number,name,address,email,class,gender,date_of_birth,picture,datemade,schoolidentity)
VALUES('$password','$admission_number','$fullname','$address','$email','$class','$gender','$date_of_birth','$random_name.$type',now(),'$school_name')";
$query = mysqli_query($conn,$sql);		 
?>
<script>
alert("student successfully added");
</script>
<?php
}
?>