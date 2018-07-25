<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include "connect.php";
include ("admin/html/functions/functionlogin.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
<!-- meta charec set -->
<meta charset="utf-8">
<!-- Always force latest IE rendering engine or request Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- Page Title -->
<title>SkoolWeb</title>
<!-- Meta Description -->
<meta name="description" content="SchoolWeb-The perfect School Management System">
<meta name="keywords" content="schholweb, school, school management system">
<meta name="author" content="WizTech Inc">
<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Font -->

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

<link rel="icon" type="image/png" sizes="16x16" href="img/l.png">

<!-- CSS
================================================== -->

<!-- Fontawesome Icon font -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Twitter Bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- jquery.fancybox  -->
<link rel="stylesheet" href="css/jquery.fancybox.css">
<!-- animate -->
<link rel="stylesheet" href="css/animate.css">
<!-- Main Stylesheet -->
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/signup.css">

<!-- media-queries -->
<link rel="stylesheet" href="css/media-queries.css">

<!-- Modernizer Script for old Browsers -->
<script src="js/modernizr-2.6.2.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/custom.js"></script>
<!-- Single Page Nav -->
<script src="js/jquery.singlePageNav.min.js"></script>
<!-- Twitter Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- jquery.fancybox.pack -->
<script src="js/jquery.fancybox.pack.js"></script>
<!-- jquery.mixitup.min -->
<script src="js/jquery.mixitup.min.js"></script>
<!-- jquery.parallax -->
<script src="js/jquery.parallax-1.1.3.js"></script>
<!-- jquery.countTo -->
<script src="js/jquery-countTo.js"></script>
<!-- jquery.appear -->
<script src="js/jquery.appear.js"></script>
<!-- Contact form validation -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
<!-- Google Map -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<!-- jquery easing -->
<script src="js/jquery.easing.min.js"></script>
<!-- jquery easing -->
<script src="js/wow.min.js"></script>
<script src="js/sweetalert.js"></script>
<script>
$(document).ready(function(e){
$('#loading6').hide();	
$("#uploadimage6").on('submit',(function(e) {
e.preventDefault();
$("#message6").empty(); 
$('#loading6').show();
$.ajax({
url: "signupscr.php",   	// Url to which the request is send
type: "POST",      				// Type of request to be send, called as method
data:  new FormData(this), 		// Data sent to server, a set of key/value pairs representing form fields and values 
contentType: false,       		// The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
cache: false,					// To unable request pages to be cached
processData:false,  			// To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
success: function(data)  		// A function to be called if request succeeds
{
$('#loading6').hide();
$("#message6").html(data);
swal({	
  text: 'Registration Successful',
  icon: "success",
  button: "ok",
});
//window.location = "login1.php?message="+data;			
}	        
});
}));

// Function to preview image
$(function() {
$("#file-input6").change(function() {
$("#message6").empty();         // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];	
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing6').attr('src','../../logo/default.jpg');
$("#message6").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();	
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}		
});
});
function imageIsLoaded(e) { 
$("#file-input6").css("color","green");
$('#image_preview6').css("display", "block");
$('#previewing6').attr('src', e.target.result);
$('#previewing6').attr('width', '140px');
$('#previewing6').attr('height', '120px');
};
});
</script>
</head>

<body id="body">

<!-- preloader -->
<div id="preloader">
<img src="img/preloader.gif" alt="Preloader">
</div>
<!-- end preloader -->

<!--
Fixed Navigation
==================================== -->
<header id="navigation" class="navbar-fixed-top navbar" style="background: #42a5f5;">
<div class="container">
<div class="navbar-header">
<!-- responsive nav button -->
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<i class="fa fa-bars fa-2x"></i>
</button>
<!-- /responsive nav button -->

<!-- logo -->
<a class="navbar-brand" href="index.php">
<h1 id="logo">
<img src="img/lg.png" alt="SchoolWeb">
</h1>
</a>
<!-- /logo -->
</div>

<!-- main nav -->
<nav class="collapse navbar-collapse navbar-right" role="navigation" ></nav>
<!-- /main nav -->

</div>
</header>
<!--
End Fixed Navigation
==================================== -->
<h1 style="margin-top: 1em;">..</h1>
<div class="agilesign-form"  style="width: 50%;">
<div class="agileits-top">
<?php
if(isset($_GET['message'])){
echo $_GET['message'];
}else{

}
?>	
<form method="post" id="uploadimage6" action="" enctype="multipart/form-data">			
<div class="image-upload">
<label for="file-input6">
<div id="image_preview6">
<img height="100" src="img/default.jpg" data-toggle="tooltip" data-placement="right" title="School Logo" id="previewing6"/>
</div>
</label>
<input id="file-input6" type="file" name="pictures"/>
</div>
<div class="styled-input w3ls-text">
<input type="text" name="schoolname" required=""/>
<label>School Name</label>
<span></span>
</div>
<div class="styled-input w3ls-text">
<input type="text" name="schooladdress" required=""/>
<label>School Address</label>
<span></span>
</div>
<div class="styled-input w3ls-text">
<input type="text" name="email" required=""/>
<label>School Email</label>
<span></span>
</div>
<div class="styled-input w3ls-text">
<input type="text" name="admin" required=""/>
<label>School Administrator</label>
<span></span>
</div>
<div class="styled-input w3ls-text">
<input type="text" name="adminemail" required=""/>
<label>Administrator Email</label>
<span></span>
</div>
<div class="styled-input w3ls-text">
<input type="password" name="password" required=""/>
<label>Administrator Password</label>
<span></span>
</div>
<div class="styled-input w3ls-text">
<input type="text" name="session" required=""/>
<label>Session</label>
<span></span>
</div>
<div class="styled-input w3ls-text">
<input type="text" name="number_of_students" id="no_of_students" oninput="price();" required=""/>
<label>No of Students</label>
<span></span>
</div>
<div class="styled-input w3ls-text">
<input type="password" name="confirm" required="">
<label>Confirm Password</label>
<span></span>
</div>
<h4 id='loading6'><img src="../../logo/loading_circle.gif"/>&nbsp;&nbsp;Loading...</h4>
<div id="message6" style="color:white;"></div>
<div class="agileits-bottom">
<input type="submit" value="Sign Up" name="submit">
</div>
</form>
</div>
</div>
<!-- Essential jQuery Plugins
================================================== -->
<!-- Main jQuery -->
<script>
var wow = new WOW ({
boxClass:     'wow',      // animated element css class (default is wow)
animateClass: 'animated', // animation css class (default is animated)
offset:       120,          // distance to the element when triggering the animation (default is 0)
mobile:       false,       // trigger animations on mobile devices (default is true)
live:         true        // act on asynchronously loaded content (default is true)
}
);
wow.init();
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})

</script>
<!-- Custom Functions -->

<script src="js/tooltip.js"></script>


</body>
</html>
<?php
ob_end_flush();
?>