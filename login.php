<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include "connect.php";
?>
<!DOCTYPE html>
<html>
<!-- Head -->
<head>
<title>Login to SkoolWeb</title>
<!-- For-Mobile-Apps -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="schoolweb, sms, login" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps -->
<!-- Style.CSS --> <link rel="stylesheet" href="css/login.css" type="text/css" media="all" />
<!-- Web-Fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<!-- //Web-Fonts -->
<!-- Horizontal-Tabs-JavaScript -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion
width: 'auto', //auto or any width like 600px
fit: true, // 100% fit in a container
});
});
</script>
<!-- Horizontal-Tabs-JavaScript -->
</head>
<!-- Head -->
<!-- Body -->
<body>
<!-- Container -->
<div class="container" style='margin-top:100px;'>
<a href="index.php"><img src="img/lg.png"></a>
<div class="sap_tabs">
<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
<ul class="resp-tabs-list">
<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><h2><span>ADMIN</span></h2></li>
<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>TEACHER</span></li>
<li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span>PARENT</span></li>
<li class="resp-tab-item" aria-controls="tab_item-4" role="tab"><span>STUDENTS</span></li>
<div class="clear"> </div>
</ul>

<div class="resp-tabs-container">

<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
<!-- <h1 style="margin-top: -.5em;">Admin Login</h1> -->

<!-- Form -->
<form action="" method="post">
<?php
if(isset($_POST['login'])){
$username = htmlspecialchars(trim(mysqli_real_escape_string($conn,$_POST['username'])));
$password = htmlspecialchars(trim(sha1($_POST['password'])));		

$sql = "SELECT * FROM `users` WHERE administrator = '$username' AND password = '$password' AND schoolname = '".$_SESSION['school']."'";
$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query) == true){

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

header("location:admin/html/index.php?sender=".urlencode('admin')."");
exit;
} else {
?>
<p style="color:red;"><?php print "INVALID EMAIL/PASSWORD";?></p> 
<?php
}
}
?>
<input type="text" name="username" placeholder="Admin Fullname" required="">
<input type="password" name="password" placeholder="Admin Password" required="">
</ul>
<input type="submit" value="LOGIN" name="login">
</form>
<!-- //Form -->
</div>

<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
<!-- <h1>Teachers Login</h1> -->

<!-- Form -->
<form action="#" method="post">
<?php
if(isset($_POST['teacher'])){
$username2 = htmlspecialchars(trim(mysqli_real_escape_string($conn,$_POST['username2'])));
$password2 = htmlspecialchars(trim($_POST['password2']));		

$sql = "SELECT * FROM `teacheradd` WHERE name = '$username2' AND password = '$password2' AND schoolidentity = '".$_SESSION['school']."'";
$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query) == true){

$_SESSION['username2'] = $username2;
$_SESSION['password2'] = $password2;

header("location:teachers/html/index.php?sender= ".urlencode('teacher')."");
exit;
} else {
?>
<p style="color:red;"><?php print "INVALID EMAIL/PASSWORD";?></p> 
<?php
}
}
?>
<input type="text" name="username2" placeholder="Teacher Fullname" required="">
<input type="password" name="password2" placeholder="Teacher Password" required="">
</ul>
<input type="submit" name="teacher" value="LOGIN">
</form>

</div>

<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
<!-- <h1>Parents Login</h1> -->

<!-- Form -->
<form action="" method="post">
<?php
if(isset($_POST['parent'])){
$username3 = htmlspecialchars(trim(mysqli_real_escape_string($conn,$_POST['username3'])));
$password3 = htmlspecialchars(trim(mysqli_real_escape_string($conn,$_POST['password3'])));		

$sql = "SELECT * FROM parentadd WHERE name = '$username3' AND password = '$password3' AND schoolidentity = '".$_SESSION['school']."'";
$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query) > 0){

$_SESSION['username3'] = $username3;
$_SESSION['password3'] = $password3;

header("location:parents/html/index.php?sender= ".urlencode('parent')."");
exit;
} else {
?>
<p style="color:red;"><?php print "INVALID EMAIL/PASSWORD";?></p> 
<?php
}
}
?>
<input type="text" name="username3" placeholder="Parent Fullname" required="">
<input type="password" name="password3" placeholder="Parent Password" required="">
</ul>
<input type="submit" value="LOGIN" name="parent">
</form>
</div>

<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-4">

<!-- <h1>Students Login</h1> -->

<!-- Form -->
<form action="" method="post">
<?php
if(isset($_POST['student'])){
$username4 = htmlspecialchars(trim(mysqli_real_escape_string($conn,$_POST['username4'])));
$password4 = htmlspecialchars(trim($_POST['password4']));		

$sql = "SELECT * FROM studentadd WHERE name = '$username4' AND password = '$password4' AND schoolidentity = '".$_SESSION['school']."'";
$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query) == true){

$_SESSION['username4'] = $username4;
$_SESSION['password4'] = $password4;

header("location:student/html/index.php?sender= ".urlencode('student')."");
exit;
} else {
?>
<p style="color:red;"><?php print "INVALID EMAIL/PASSWORD";?></p> 
<?php
}
}
?>
<input type="text" name="username4" placeholder="Student Fullname" required="">
<input type="password" name="password4" placeholder="Student Password" required="">
</ul>
<input type="submit" value="LOGIN" name="student">
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- //Container -->
<!-- Footer -->
<div class="footer">
<!-- Copyright -->
<div class="copyright">
<p> &copy; 2017 SkoolWeb. All Rights Reserved | Designed and developed by <a href="#">WizTech Inc.</a></p>
</div>
<!-- //Copyright -->
</div>
<!-- //Footer -->
</body>
<!-- //Body -->
<script>
$(document).ready(function() {
$(".sap_tabs").show();
});
</script>
</html>
<?php
ob_end_flush();
?>