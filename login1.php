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
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<!-- Horizontal-Tabs-JavaScript -->
</head>
<!-- Head -->
<!-- Body -->
<body>
<!-- Container -->
<div class="container" style='margin-top:100px;width:65%;'>
<a href="index.php"><img src="img/lg.png"></a>
<div>
<form method="post" action="">
<?php
if(isset($_POST['school'])){
$school = $_POST['school'];
$_SESSION['school'] = $school;	
header("location:login.php");
}
?>
<select name="school" id="school" style="width:50%;color:white;">
<option disabled selected>Choose your school</option>
<?php
// to select schools
$sql = "SELECT schoolname FROM users";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
while($row = mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['schoolname'];?>" onclick="choose_school();"><?php echo $row['schoolname'];?></option>
<?php
}
}
?>
</select><br/><br/>
<button class="btn" style="background:#3588AF;color:white;width:100px;" name="next">NEXT</button>
</form><br/>
<div class="sap_tabs">
<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
</ul>

<div class="resp-tabs-container">

<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
<!-- <h1 style="margin-top: -.5em;">Admin Login</h1> -->

<!-- Form -->
<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
<!-- <h1>Teachers Login</h1> -->

<!-- Form -->
</div>

<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
<!-- <h1>Parents Login</h1> -->

<!-- Form -->
</div>

<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-4">

<!-- <h1>Students Login</h1> -->

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