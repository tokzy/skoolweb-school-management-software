<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");
include('../../PHPMailer/PHPMailerAutoload.php');
?>
<?php
// to initialize the notification on message
$message_count = 0;
$sql = "SELECT * FROM message WHERE status = 0 and recipient = '".$_SESSION['username']."'";
$result = mysqli_query($conn, $sql);
$message_count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
if (matchMedia("(max-width:805px)").matches) {
window.location = '../../mobile_admin/html/index.php?sender=<?php echo "admin";?>';
}
</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="img/l.png">
<title>SkoolWeb</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- toast CSS -->
<link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- morris CSS -->
<link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- chartist CSS -->
<link href="../plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
<link href="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/default.css" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script> 
<!-- JavaScript Includes -->
<script src="js/jquery.min.js"></script>     
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<script src="js/transition.js"></script>
<script src="js/collapse.js"></script>    
<script src="js/modal.js"></script>
<script src="js/tooltip.js"></script>
<script src="js/popover.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Counter js -->
<script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!-- chartist chart -->
<script src="../plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
<script src="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<!--<script src="js/dashboard1.js"></script>-->
<script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script> 
<script src='js/script.js'></script>
<script src='js/settingsscript.js'></script>
<script src='js/studentupload.js'></script>
<script src='js/teacherupload.js'></script>
<script src="../../js/sweetalert.js" type="text/javascript"></script>
<script>
/*-----------------------------------------------------
to send message notification-----------------------------------*/
function myFunction() {
$.ajax({
url:"message.php",
type: "POST",
processData:false,
success: function(data){
$("#notification-count").remove();					
$("#notification-latest").show();$("#notification-latest").html(data);
},
error: function(){}           
});
}

$(document).ready(function() {
$('body').click(function(e){
if ( e.target.id != 'notification-icon'){
$("#notification-latest").hide();
}
});
});	
</script>	
<script>
function ajax_admin(){
// Create our XMLHttpRequest object
var hr = new XMLHttpRequest();
// Create some variables we need to send to our PHP file
var url = "sample.php";
var fn = document.getElementById("search").value;
var vars = "search="+fn;
hr.open("POST", url, true);
// Set content type header information for sending url encoded variables in the request
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// Access the onreadystatechange event for the XMLHttpRequest object
hr.onreadystatechange = function() {
if(hr.readyState == 4 && hr.status == 200) {
var return_data = hr.responseText;
document.getElementById("status").innerHTML = return_data;
}
}
// Send the data to PHP now... and wait for response to update the status div
hr.send(vars); // Actually execute the request
document.getElementById("status").innerHTML = "processing...";
}
</script>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
</script>
<style>
.card {
border-left: 2px solid #4aaee7; height: 300px; margin: 1em; padding: .5em;
background: url("img/banner.jpg");
width: 500px;
}
@media print {
.card:before {
content:url(banner.jpg);
position: absolute;
z-index: -1;
}
}
.image-upload > input
{
display: none;
}
.form-control {
margin-bottom: 10px;
}
li {
list-style-type: none;
}
div#pagination_conrols     {font-size:21px;}
div#pagination_conrols > a    {color:black;}
div#pagination_conrols  > a:visited   {color:#06F;}	

#emaillists li {display:inline;
margin:10px;}

#emaillists li a {color:black;}

#emaillists li a:hover {color:white;
background:grey;
padding:10px;
}
#df  {margin-left:-50px;
display:inline;}
#df li {display:inline;
margin-left:-2px;}				 
</style>
</head>

<body class="fix-header">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
<svg class="circular" viewBox="25 25 50 50">
<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
</svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
<div class="navbar-header">
<div class="top-left-part">
<!-- Logo -->
<a class="logo" href="index.php">
<!-- Logo icon image, you can use font-icon also --><b>
<!--This is dark logo icon-->
<!--<img src="../plugins/images/admin-logo.png" alt="home" class="dark-logo" />                       -->
<!--This is light logo icon-->
<!--<img src="../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />-->
<img src="img/l.png" alt="home" class="light-logo" />
</b>
<!-- Logo text image you can use text also --><span class="hidden-xs">
<!--This is dark logo text-->
<!--<img src="../plugins/images/admin-text.png" alt="home" class="dark-logo" />-->
<!--This is light logo text-->
<img src="img/d.png" alt="home" class="light-logo" />
</span> </a>
</div>
<!-- /Logo -->
<ul class="nav navbar-top-links navbar-left pull-left">
<li style='color:white;'>
<a href="tutorial.php"><i class='fa fa-users fa-fw'></i>Helps and Guide</a></li>
</ul>
<ul class="nav navbar-top-links navbar-right pull-right">
<li>
<div role="search" class="app-search hidden-sm hidden-xs m-r-10">
<input type="text" placeholder="Search..." class="form-control" name="search" id="search" oninput="ajax_admin();"> <a href="#" name="submit" data-toggle="tooltip" title="search for your records" data-placement="bottom"><i class="fa fa-search"></i></a></div>
</li>
<li>
<?php
$sql = "SELECT * FROM users WHERE administrator = '".$_SESSION['username']."' AND schoolname='".$_SESSION['school']."' LIMIT 1";
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
$term_now = $row['term'];
if($row['admin_logo'] == ''){
?>
<a class="profile-pic" href="../../logo/default.jpg">
<img src="../../logo/default.jpg" alt="user-img" width="36" class="img-circle">
<b class="hidden-xs"><?php echo $admin;?></b></a>
</li>
<?php
} else {
?>
<a class="profile-pic" href="../../logo/<?php echo $row['admin_logo'];?>">
<img src="../../logo/<?php echo $row['admin_logo'];?>" alt="user-img" width="36" class="img-circle">
<b class="hidden-xs"><?php echo $admin;?></b></a>
</li>
<?php
}
?>
<li>
<a href="../../bulk.php" class="waves-effect" data-toggle="tooltip" title="send bulk sms" data-placement="bottom">
<i class="fa fa-send fa-fw" ></i>bulk sms</a>
</li>
<li>
<a href="email.php" class="waves-effect" data-toggle="tooltip" title="send emails" data-placement="bottom">
<i class="fa fa-envelope-square fa-fw"></i>Emails</a>
</li>
<?php
if($message_count > 0){
?>
<li>
<a href="messages.php" class="waves-effect" id="notification-icon" onclick="myFunction()" data-toggle="tooltip" title="send snd check your messages" data-placement="bottom">
<b style="color:red;"><?php echo $message_count;?> <i class="fa fa-envelope fa-fw" aria-hidden="true"></i>Messages</b></a>
</li>
<?php	
} else{
?>
<li>
<a href="messages.php" class="waves-effect" data-toggle="tooltip" title="send and check your messages" data-placement="bottom">
<i class="fa fa-envelope fa-fw" aria-hidden="true"></i>Messages</a>
</li>
<?php	
}
?>
<li><a href="functions/logout.php">Logout</a></li>
</ul>
</div>
<!-- /.navbar-header -->
<!-- /.navbar-top-links -->
<!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<?php
$sql = "SELECT * FROM payments WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$trialer = mysqli_fetch_row($query);
$free_trial = mysqli_fetch_array($query);
$free_trial_status = $free_trial['free_trial-status'];
?>
<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav slimscrollsidebar">
<div class="sidebar-head">
<h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
</div>
<ul class="nav" id="side-menu">
<li style="padding: 70px 0 0;">
<a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
</li>
<?php
//to indicate the number of items in the recycle bin
$sql = "SELECT COUNT(id) FROM recyclebin WHERE schoolidentity = '$school_name' AND deleted_by = 'admin'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
//here we have the total row count
$rows = $row[0];
$bin = "$rows";
if($bin > 0){
?>
<li>
<a href="recycle.php" class="waves-effect" data-toggle="tooltip" title="restore your deleted datas"><b style='color:red;'><i class="fa fa-recycle fa-fw" aria-hidden="true"></i>Reycle Bin <?php echo $bin;?></b></a>
</li>            
<?php
} else {
?>
<li>
<a href="recycle.php" class="waves-effect" data-toggle="tooltip" title="restore your deleted datas" onclick="alert2();"><i class="fa fa-recycle fa-fw" aria-hidden="true" ></i>Reycle Bin</a>
<script type="text/javascript">
function alert2(){
swal({
text: "Recycle bin is empty!",
icon: "info",
button: "ok",
});	
}
</script>
</li>            
<?php	
}
?>
<li>
<a href="students.php" class="waves-effect" data-toggle="tooltip" title="Add and manage student records"><i class="fa fa-child fa-fw" aria-hidden="true"></i>Students</a>
</li>
<li>
<a href="teachers.php" class="waves-effect" data-toggle="tooltip" title="Add and manage teachers records"><i class="fa fa-group fa-fw" aria-hidden="true"></i>Teachers</a>
</li>
<li>
<a href="parents.php" class="waves-effect" data-toggle="tooltip" title="Add and manage parents records"><i class="fa fa-male fa-fw" aria-hidden="true"></i>Parents</a>
</li>
<li>
<a href="class.php" class="waves-effect" data-toggle="tooltip" title="Add and manage  class records"><i class="fa fa-crosshairs fa-fw" aria-hidden="true"></i>Class</a>
</li>
<li>
<a href="grade.php" class="waves-effect"><i class="fa fa-sort-alpha-asc fa-fw" aria-hidden="true"></i>Grades</a>
</li>
<li>
<a href="library.php" class="waves-effect" data-toggle="tooltip" title="upload files to the library,assignment,textbooks,notes etc"><i class="fa fa-book fa-fw" aria-hidden="true"></i>Library</a>
</li>
<li>
<a href="subjects.php" class="waves-effect" data-toggle="tooltip" title="Add and manage subject records"><i class="fa fa-random fa-fw" aria-hidden="true"></i>Subjects</a>
</li>
<li>
<a href="timetable.php" class="waves-effect" data-toggle="tooltip" title="create timetables for each class"><i class="fa fa-sliders fa-fw" aria-hidden="true"></i>Timetable</a>
</li>
<li>
<a href="attendance.php" class="waves-effect" data-toggle="tooltip" title="take attendances of students"><i class="fa fa-signal fa-fw" aria-hidden="true"></i>Attendance</a>
</li>
<!-- <li>
<a href="grade.php" class="waves-effect"><i class="fa fa-sort-alpha-asc fa-fw" aria-hidden="true"></i>Grades</a>
</li> -->
<li>
<a href="board.php" class="waves-effect" data-toggle="tooltip" title="upload important information to the notice board for students and teachers to see them"><i class="fa fa-square fa-fw" aria-hidden="true"></i>Noice Board</a>
</li>

<li>
<a href="scratch_card.php" class="waves-effect" ><i class="fa fa-barcode fa-fw" aria-hidden="true"></i>Scratch Cards</a>
</li>
<li>
<a href="results.php" class="waves-effect" data-toggle="tooltip" title="manage results"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i>Results</a>
</li>
<li>
<a href="finance.php" class="waves-effect" data-toggle="tooltip" title="manage the school finances"><i class="fa fa-money fa-fw" aria-hidden="true"></i>Financial Tracking</a>
</li>
<li>
<a href="profile.php" class="waves-effect" data-toggle="tooltip" title="manage your profile"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
</li>
<li>
<a href="settings.php" class="waves-effect" data-toggle="tooltip" title="change or edit the school info"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>Settings</a>
</li>
</ul>
</div>
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->