<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("connect.php");
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
<link rel="stylesheet" href="css/bulk.css">
<!-- media-queries -->
<link rel="stylesheet" href="css/media-queries.css">

<!-- Modernizer Script for old Browsers -->
<script src="js/modernizr-2.6.2.min.js"></script>


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
<a class="navbar-brand" href="index.php">
<h1 id="logo">
<img src="img/lg.png" alt="SchoolWeb">
</h1>
</a>
<!-- /logo -->
</div>

<!-- main nav -->
<nav class="collapse navbar-collapse navbar-right" role="navigation">

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
<li data-target="#carousel-example-generic" data-slide-to="0"></li>
</ol>
<!-- End Indicators bullet -->

<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">

<!-- single slide -->
<div class="item active" style="background-image: url(img/sms.jpg);">
<?php
if(isset($_GET['id'])){
echo '<b style="color:white;font-size:30px;">'.$_GET['id'].'<i class="fa fa-check-square-o"></i></b>';	
} else {
	
}
?>
<div class="carousel-caption">
<h2 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated">World's<span> Best SMS </span></h2>
<h3 data-wow-duration="1000ms" class="wow slideInLeft animated"><span class="color">Delivery Capability</span> at the lowest price Guaranteed</h3>
<p data-wow-duration="1000ms" class="wow slideInRight animated">The perfect solution for your school</p>
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
The Pricing Section
==================================== -->

<section id="signup" class="team">
<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
<h2>PRCING</h2>
<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
</div>

<section id="pricing-table">
<div class="container">
<div class="row">
<div class="pricing">
<div class="col-md-4 col-sm-12 col-xs-12">
<div class="pricing-table">
<div class="pricing-header">
<p class="pricing-title">Basic Plan</p>
<p class="pricing-rate" style="padding-top: .5em;"><sup>N</sup> 25,000 <span style="margin-left: -1em;">/Term</span></p>
<a href="purchasebulk.php?purchaseid=<?php echo 'basic_plan';?>" class="btn btn-custom" style="margin-top: 1em;">PURCHASE</a>
</div>

<div class="pricing-list">
<ul>
<li><i class="fa fa-envelope"></i>3,000 messages</li>
<li><i class="fa fa-signal"></i><span>Unlimited</span> data</li>
<li><i class="fa fa-user"></i><span>Unlimited</span> users</li>
<li><i class="fa fa-smile-o"></i>first 10 day free after renewal</li>
</ul>
</div>
</div>
</div>

<div class="col-md-4 col-sm-12 col-xs-12">
<div class="pricing-table">
<div class="pricing-header">
<p class="pricing-title">Regular Plan</p>
<p class="pricing-rate" style="padding-top: .5em;"><sup>N</sup> 35,000 <span style="margin-left: -1em;">/Term</span></p>
<a href="purchasebulk.php?purchaseid=<?php echo 'regular_plan';?>" class="btn btn-custom" style="margin-top: 1em;">PURCHASE</a>
</div>

<div class="pricing-list">
<ul>
<li><i class="fa fa-envelope"></i>5,000 messages</li>
<li><i class="fa fa-signal"></i><span>unlimited</span> data</li>
<li><i class="fa fa-user"></i><span>unlimited</span> users</li>
<li><i class="fa fa-smile-o"></i>first 10 day free after renewal</li>
</ul>
</div>
</div>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<div class="pricing-table">
<div class="pricing-header">
<p class="pricing-title">Extended Plan</p>
<p class="pricing-rate" style="padding-top: .5em;"><sup>N</sup> 50,000 <span style="margin-left: -1em;">/Term</span></p>
<a href="purchasebulk.php?purchaseid=<?php echo 'extended_plan';?>" class="btn btn-custom" style="margin-top: 1em;">PURCHASE</a>
</div>
<div class="pricing-list">
<ul>
<li><i class="fa fa-envelope"></i>7,0000 messages</li>
<li><i class="fa fa-signal"></i><span>unlimited</span> data</li>
<li><i class="fa fa-user"></i><span>unlimited</span> users</li>
<li><i class="fa fa-smile-o"></i>first 10 day free renewal</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</section>
<!--
End of Signup Process
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
<h6>Quick Links </h6>
<div class="subscribe">
<ul>
<li><a href="admin/html/index.php">Dashboard</li>
<li><a href="admin/html/functions/logout.php">Logout</li>
</ul>
</div>
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


<!-- Essential jQuery Plugins
================================================== -->
<!-- Main jQuery -->
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