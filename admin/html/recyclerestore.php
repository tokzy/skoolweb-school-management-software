<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");
?>
<?php
if(isset($_GET['restore_id']))
{
$res = mysqli_query($conn, "SELECT * FROM recyclebin WHERE id=".$_GET['restore_id']."");
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$name= $row['name'];
$email = $row['email'];
$address = $row['address'];
$phone_no = $row['phone_no'];
$profession = $row['profession'];
$schoolidentity = $row['schoolidentity'];
$admission_number = $row['admission_number'];
$gender = $row['gender'];
$date_of_birth = $row['date_of_birth'];
$subject = $row['subject'];
$teachers = $row['teachers'];
$grade_name = $row['grade_name'];
$grade_alphabet = $row['grade_alphabet'];
$range_min = $row['range_min'];
$range_max = $row['range_max'];
$user = $row['user'];
$class = $row['class'];
$datemade = $row['datemade'];
$photo = $row['photo'];
$child = $row['child'];
$category = $row['category'];
$teacher = $row['teacher'];
$password = $row['password'];

if($user == 'student'){
 $sql = "INSERT INTO studentadd (name,email,admission_number,class,picture,address,gender,date_of_birth,schoolidentity,datemade)
 VALUES('$name','$email','$admission_number','$class','$photo','$address','$gender','$date_of_birth','$schoolidentity','$datemade')";
 $query = mysqli_query($conn,$sql);
} else if($user == 'teacher'){
$sql = "INSERT INTO teacheradd(password,name,email,phone_no,address,gender,picture,date_of_birth,datemade,schoolidentity)
VALUES('$password','$name','$email','$phone_no','$address','$gender','$photo','$date_of_birth','$datemade','$schoolidentity')";	
$query = mysqli_query($conn,$sql);	
	} else if($user == 'parent'){
$sql = "INSERT INTO parentadd(password,name,email,profession,phone,datemade,child,schoolidentity,address)
VALUES('$password','$name','$email','$profession','$phone_no','$datemade','$child','$schoolidentity','$address')";	
$query = mysqli_query($conn,$sql);	
} else if($user == 'subject') {
$sql = "INSERT INTO subjectadd(subject,category,datemade,schoolidentity)
	VALUES('$subject','$category','$datemade','$schoolidentity')";	
$query = mysqli_query($conn,$sql);
} else{
	$sql = "INSERT INTO grade_result(grade_name,grade_alphabet,range_min,range_max,class,datemade,schoolidentity)
	VALUES('$grade_name','$grade_alphabet','$range_min','$range_max','$class','$datemade','$schoolidentity')";	
$query = mysqli_query($conn,$sql);
}
mysqli_query($conn,"DELETE FROM recyclebin WHERE id=".$_GET['restore_id']."");
redirect_to("recycle.php");
}
?>
<?php
ob_end_flush();
?>