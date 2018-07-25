<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include "connect.php";
include ("admin/html/functions/functionlogin.php");
include 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;



$message = "";
///////////////////////////////////////
// for getting the input datas/////
/////////////////////////////////////
$schoolname = 	trim(mysqli_real_escape_string($conn, $_POST['schoolname']));
$schooladdress = trim(mysqli_real_escape_string($conn, $_POST['schooladdress']));
$password = trim(sha1($_POST['password']));
$administrator = trim(mysqli_real_escape_string($conn,$_POST['admin']));
$admin_email = trim(mysqli_real_escape_string($conn,$_POST['adminemail']));				
$Email = 	trim(mysqli_real_escape_string($conn, $_POST['email']));
$session = trim(mysqli_real_escape_string($conn,$_POST['session']));
$no_of_students = trim(mysqli_real_escape_string($conn,$_POST['number_of_students']));
$confirm_password = trim(sha1($_POST['confirm']));
///////////////////////////////////////////
//for uploading school logo/////
////////////////////////////////
$name = $_FILES['pictures']['name'];
$type = explode('.',$name);
$type = end($type);
$size = $_FILES['pictures']['size'];
$random_name = rand();
$tmp = $_FILES['pictures']['tmp_name'];

//////////////////////////////////////////
////->school logo files ends here<-///
///////////////////////////////

///////////////////////////////////////
//selecting query from the database to check if record exists////
//////////////////////////////////////////
$sql = "SELECT * FROM users where schoolname = '$schoolname'";
$query = mysqli_query($conn,$sql);
$count = mysqli_fetch_row($query);

$sql = "SELECT * FROM users where administrator = '$administrator'";
$query = mysqli_query($conn,$sql);
$admin = mysqli_fetch_row($query);

$sql = "SELECT * FROM users where email = '$Email'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);

$sql = "SELECT * FROM users where adminemail = '$admin_email'";
$query = mysqli_query($conn,$sql);
$email_admin = mysqli_fetch_row($query);
/////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////
///validations of inputs and to check if records already exists///
////////////////////////////////////////////////////////////////////
if($type!='JPG' && $type!='jpg' && $type!='PNG' && $type!='png'){
print "<div class='alert alert-danger'>only jpg and png format is allowed!!</div>";	
} else if($password!= $confirm_password){
?>
<div class="alert alert-danger"><?php print "passwords do not match, please input correct passwords";?></div>
<?php 
} else if($count!= 0){
?>
<div class="alert alert-danger">
*<?php print "schoolname already exists, please enter a new one";?></div>
<?php
} else if($admin!=0){
?>
<div class="alert alert-danger"><?php print "admin already exists, please enter a new one";?></div>
<?php
} else if($email_admin!= 0){
?>
<div class="alert alert-danger"><?php echo "admin email already exists, please enter a new one";?></div>
<?php	 
} else if($row!= 0){
?>
<div class="alert alert-danger"><?php echo " school email already exists, please enter a new one";?></div>
<?php	
} else if(!filter_var($admin_email,FILTER_VALIDATE_EMAIL)){
?>
<div class="alert alert-danger"><?php echo "INVALID EMAIL PLEASE ENTER A VALID EMAIL";?></div>
<?php
} else if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
?>
<div class="alert alert-danger"><?php echo "INVALID EMAIL, PLEASE ENTER A VALID EMAIL";?></div>
<?php
///////////////////////////////////////////////////////////
///end of validations///////////////////////////////
} else {
/////////////////////////upload/////////
move_uploaded_file($tmp,"logo/".$random_name.'.'.$type);
//////////////////inserts query//////////////////////
$sql = "INSERT INTO users (schoolname,schooladdress,administrator,password,logo,datemade,email,adminemail,session,no_of_students) 
VALUES('$schoolname','$schooladdress','$administrator','$password','$random_name.$type',now(),'$Email','$admin_email','$session','$no_of_students')";
$query = mysqli_query($conn,$sql);
if($query){	
/*$mail->From = "tokunbojeremiah997@gmail.com";
$mail->FromName = "Skoolweb";

//To address and name
$mail->addAddress("$admin_email", "$administrator");
$mail->addAddress("$admin_email"); //Recipient name is optional

//Send HTML or Plain Text email
$mail->isHTML(true);
$mail->Subject = "WELCOME";
$mail->Body = "<!DOCTYPE html>
                <html>
				<body>
<div style='border:2px solid black;background:#e5ffe5;'>
<h4 style='color:green;font-size:25px;text-align:center;'><span>
<img src='http://www.skoolweb.com.ng/img/l.png' /> Skoolweb</h4>
<hr/>
<p style='text-align:center;'>
hello ".$administrator.", we are delighted to have ".$schoolname." among the great and technology oriented school that 
have already join the revolutionary skoolweb software family, we welcome you.<br/>
Skoolweb team Management</p>
</div>
</body>
</html>";
if(!$mail->send()){
echo "Mailer Error: " . $mail->ErrorInfo;	
} else {		
}*/
echo "success"; 
}
}
?>