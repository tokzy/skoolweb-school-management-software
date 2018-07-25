<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("connect.php");
include("admin/html/functions/functionlogin.php");
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
<!-- media-queries -->
<link rel="stylesheet" href="css/media-queries.css">

<!-- Modernizer Script for old Browsers -->
<script src="js/modernizr-2.6.2.min.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a2b9fdc5d3202175d9b73a2/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
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
<header id="navigation" class="navbar-fixed-top navbar">
<div class="container">
<div class="navbar-header">
<!-- responsive nav button -->
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<i class="fa fa-bars fa-2x"></i>
</button>
<!-- /responsive nav button -->

<!-- logo -->
<a class="navbar-brand" href="#body">
<h1 id="logo">
<img src="img/lg.png" alt="SchoolWeb">
</h1>
</a>
<!-- /logo -->
</div>

<!-- main nav -->
<nav class="collapse navbar-collapse navbar-right" role="navigation">
<ul id="nav" class="nav navbar-nav">
<li class="current"><a href="#body">Home</a></li>
<li><a href="#features">Features</a></li>
<li><a href="signup.php" id="signup">Signup</a></li>
<li><a href="login1.php" id="login">Login</a></li>
<li><a href="#contact">Contact</a></li>
</ul>
</nav>
<!-- /main nav -->

</div>
</header>
<!--
End Fixed Navigation
==================================== -->



<!--
Home Slider
==================================== -->

<section id="slider">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

<!-- Indicators bullet -->
<ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<li data-target="#carousel-example-generic" data-slide-to="1"></li>
</ol>
<!-- End Indicators bullet -->

<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">

<!-- single slide -->
<div class="item active" style=" background-image: url('img/2.jpg');
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
<div class="carousel-caption">
<h2 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated">Meet<span> SkoolWeb</span>!</h2>
<h3 data-wow-duration="1000ms" class="wow slideInLeft animated"><span class="color">The best and cheapest</span> school management system</h3>
<p data-wow-duration="1000ms" class="wow slideInRight animated">The perfect solution for your school</p>
</div>
</div>
<!-- end single slide -->

<!-- single slide -->
<div class="item" style="background-image: url('img/g5.jpg');
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
<div class="carousel-caption">
<h2 data-wow-duration="500ms" data-wow-delay="500ms" class="wow bounceInDown animated">Digitalization<span></span>!</h2>
<h3 data-wow-duration="500ms" class="wow slideInLeft animated"><span class="color">Digitalize</span>your school in hours not days</h3>
<p data-wow-duration="500ms" class="wow slideInRight animated">The perfect solution for your school</p>

</div>
</div>
<!-- end single slide -->

</div>
<!-- End Wrapper for slides -->

</div>
</section>

<!--
End Home SliderEnd
==================================== -->

<!--
Features
==================================== -->

<section id="features" class="features">
<div class="container">
<div class="row">

<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
<h2>Features</h2>
<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
</div>

<!-- service item -->
<div class="col-md-4 wow fadeInLeft" data-wow-duration="500ms" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-users fa-2x"></i>
</div>

<div class="service-desc">
<h3>Student Information</h3>
<p>Get easy access to student particulars, grades, schedules, address and parent info anytime anywhere with ease of mind.</p>
</div>
</div>
</div>
<!-- end service item -->

<!-- service item -->
<div class="col-md-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-male fa-2x"></i>
</div>

<div class="service-desc">
<h3>Teachers Information</h3>
<p>Track your teacher's particulars, residential address and other data. SchoolWeb is always online for you!</p>
</div>
</div>
</div>
<!-- end service item -->

<!-- service item -->
<div class="col-md-4 wow fadeInRight" data-wow-duration="500ms"  data-wow-delay="900ms" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-pencil-square-o fa-2x"></i>
</div>

<div class="service-desc">
<h3>Parent Access</h3>
<p>Parents can login and view children's information anytime and anywhere through the parent portal. They can even keep track of student performances in school.</p>
</div>
</div>
</div>
<!-- end service item -->

<!-- service item -->
<div class="col-md-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-signal fa-2x"></i>
</div>

<div class="service-desc">
<h3>Attendance</h3>
<p>Track daily attendance of any class from anywhere. Easy to use Interface to check off your students.</p>
</div>
</div>
</div>
<!-- end service item -->

<!-- service item -->
<div class="col-md-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-pencil fa-2x"></i>
</div>

<div class="service-desc">
<h3>Result System</h3>
<p>Highly customizable result sheets to scale to your needs. Compile student results in hours not days nor weeks.</p>
</div>
</div>
</div>
<!-- end service item -->

<!-- service item -->
<div class="col-md-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-sliders fa-2x"></i>
</div>

<div class="service-desc">
<h3>Timetable System</h3>
<p>Easy going interface for your school to create fast timetable for each school. Students get to know when the timetable is ready through their portal</p>
</div>
</div>
</div>
<!-- end service item -->
<div class="h">
<!-- service item -->
<div class="col-md-4" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-book fa-2x"></i>
</div>

<div class="service-desc">
<h3>Library Management System</h3>
<p>Upload books to the online library to allow students to study at home and anywhere.</p>
</div>
</div>
</div>
<!-- end service item -->
<!-- service item -->
<div class="col-md-4" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-square-o fa-2x"></i>
</div>

<div class="service-desc">
<h3>Online Noticeboard</h3>
<p>Want to reach everyone in the school even parents? We provide E-Board. Broadcast and post notice to both parents and students in a blink of an eye.</p>
</div>
</div>
</div>
<!-- end service item -->
<!-- service item -->
<div class="col-md-4" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-envelope fa-2x"></i>
</div>

<div class="service-desc">
<h3>Messaging System</h3>
<p>SchoolWeb comes integratted with a messaging system that aids faster communication betwwen students and teachers, parents and teacher or even the administrator of the portal.</p>
</div>
</div>
</div>
<!-- end service item -->
</div>

<!-- service item -->
<div class="col-md-4" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-money fa-2x"></i>
</div>

<div class="service-desc">
<h3>Financial Tracking System</h3>
<p>Having problem managing your school fees? Well worry not again! With Skoolweb, manage students school fees through our website or our bot!</p>
</div>
</div>
</div>
<!-- end service item -->


<!-- service item -->
<div class="col-md-4" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-barcode fa-2x"></i>
</div>

<div class="service-desc">
<h3>Scratch Cards System</h3>
<p>SchoolWeb comes integratted with a scratch system that allows students to check their result. You can set the limit of use and assign new scratch cards for students with ease.</p>
</div>
</div>
</div>
<!-- end service item -->


<!-- service item -->
<div class="col-md-4" style="margin-top: 2em;">
<div class="service-item">
<div class="service-icon">
<i class="fa fa-question fa-2x"></i>
</div>

<div class="service-desc">
<h3>Quiz System</h3>
<p>With skoolweb, you can be able to test your students performance in class. And you would get their scores to conclude if they are doing good or not.</p>
</div>
</div>
</div>
<!-- end service item -->

</div>
</div>
</div>
<button class="btn btn-default" style="float: right; margin-right: 5em;" id="more">More</button>
</section>
<!--
End Features
==================================== -->


<!--
Some fun facts
==================================== -->
<section id="facts" class="facts">
<div class="parallax-overlay">
<div class="container">
<div class="row number-counters">

<div class="sec-title text-center mb50 wow rubberBand animated" data-wow-duration="1000ms">
<h2>Facts about us</h2>
<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
</div>
<!-- first count item -->
<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
<div class="counters-item">
<i class="fa fa-bank fa-3x"></i>
<strong data-to="<?php 
$sql = "select COUNT(id) from users";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
$count = $row[0];
echo $count;
?>">0</strong>
<!-- Set Your Number here. i,e. data-to="56" -->
<p>Schools</p>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
<div class="counters-item">
<i class="fa fa-child fa-3x"></i>
<strong data-to="<?php 
$sql = "select COUNT(id) from studentadd";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
$count = $row[0];
echo $count;
?>">0</strong>
<!-- Set Your Number here. i,e. data-to="56" -->
<p>Students</p>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
<div class="counters-item">
<i class="fa fa-male fa-3x"></i>
<strong data-to="<?php 
$sql = "select COUNT(id) from teacheradd";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
$count = $row[0];
echo $count;
?>">0</strong>
<!-- Set Your Number here. i,e. data-to="56" -->
<p>Teachers </p>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
<div class="counters-item">
<i class="fa fa-group fa-3x"></i>
<strong data-to="<?php 
$sql = "select COUNT(id) from parentadd";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
$count = $row[0];
echo $count;
?>">0</strong>
<!-- Set Your Number here. i,e. data-to="56" -->
<p>Parents</p>
</div>
</div>
<!-- end first count item -->
</div>
</div>
</div>
</section>

<!--
End Some fun facts
==================================== -->


<!--
Contact Us
==================================== -->

<section id="contact" class="contact">
<div class="container">
<div class="row mb50">

<div class="sec-title text-center mb50 wow fadeInDown animated" data-wow-duration="500ms">
<h2>Get in touch</h2>
<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
</div>

<div class="sec-sub-title text-center wow rubberBand animated" data-wow-duration="1000ms">
<p>Dont be shy. Get intouch with us. We promise to reply soonest</p>
</div>

<script>
function ajax_contact(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "contact.php";
    var nm = document.getElementById("name").value;
	var em = document.getElementById("email").value;
	var mg = document.getElementById("message").value;
	var vars = "name="+nm+"&email="+em+"&message="+mg;
        hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                    var return_data = hr.responseText;
                        document.getElementById("contact").innerHTML = return_data;
            }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("contact").innerHTML = "processing...";
}
</script>
<div id="contact"></div>
<!-- contact form -->
<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms">
<div class="contact-form">
<h3>Say hello!</h3>
<div  id="contact-form">
<div class="input-group name-email">
<div class="input-field">
<input type="text" name="name" id="name" placeholder="Name" class="form-control">
</div>
<div class="input-field">
<input type="email" name="email" id="email" placeholder="Email" class="form-control">
</div>
</div>
<div class="input-group">
<textarea name="message" id="message" placeholder="Message" class="form-control"></textarea>
</div>
<div class="input-group">
<input type="submit" id="form-submit" class="pull-right" value="Send message" onclick="ajax_contact();">
</div>
</div>
</div>
</div>
<!-- end contact form -->
</div>
</div>
</section>
<!--
End Contact Us
==================================== -->
<footer id="footer" class="footer">
<div class="container">
<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
<div class="footer-single">
<!-- <img src="img/footer-logo.png" alt=""> -->
<h3 style="font-family: cursive; margin-bottom: 1em;">SkoolWeb</h3>
<p>The best and cheapest school management system with the best graphical user interface. It is simple in design and usage.</p>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
<div class="footer-single">
<div id="status"></div>
<h6>Subscribe </h6>
<div class="subscribe">
<input type="text" name="subscribe" id="subscribe">
<input type="submit" value="&#8594;" id="subs" onclick="ajax_post();">
</div>
<p>We promise not to spam you. We keep you intouch with our latest updates</p>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<p class="copyright text-center">
Copyright © 2017 <a href="#">SkoolWeb</a>. All rights reserved. Designed & developed by <a href="#">WizTech Inc.</a>
</p>
</div>
</div>
</div>
</footer>
<a href="javascript:void(0);" id="back-top"><i class="fa fa-angle-up fa-3x"></i></a>
<script>
function ajax_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "subscribe.php";
    var fn = document.getElementById("subscribe").value;
	var vars = "subscribe="+fn;
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
<!-- Essential jQuery Plugins
================================================== -->
<!-- Main jQuery -->
<script src="js/jquery-1.11.1.min.js"></script>
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
</script>
<!-- Custom Functions -->
<script src="js/custom.js"></script>

<script type="text/javascript">
$(function(){
/* ========================================================================= */
/*	Contact Form
/* ========================================================================= */

$('#contact-form').validate({
rules: {
name: {
required: true,
minlength: 2
},
email: {
required: true,
email: true
},
message: {
required: true
}
},
messages: {
name: {
required: "come on, you have a name don't you?",
minlength: "your name must consist of at least 2 characters"
},
email: {
required: "no email, no message"
},
message: {
required: "um...yea, you have to write something to send this form.",
minlength: "thats all? really?"
}
},
submitHandler: function(form) {
$(form).ajaxSubmit({
type:"POST",
data: $(form).serialize(),
url:"process.php",
success: function() {
$('#contact-form :input').attr('disabled', 'disabled');
$('#contact-form').fadeTo( "slow", 0.15, function() {
$(this).find(':input').attr('disabled', 'disabled');
$(this).find('label').css('cursor','default');
$('#success').fadeIn();
});
},
error: function() {
$('#contact-form').fadeTo( "slow", 0.15, function() {
$('#error').fadeIn();
});
}
});
}
});
});
$("#login").click(function() {
window.location.replace("login1.php");
});
$("#signup").click(function() {
window.location.replace("signup.php");
});
$(".h").hide();
$("#more").click(function() {
$(".h").fadeIn(1000, function() {
$("#more").hide();
});
});
</script>
</body>
</html>
<?php
$list = "";
if(isset($_GET['id'])){
} else{
$list ="";
echo $list;	
}
?>