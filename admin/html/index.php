<?php include_once("header.php"); 
?>
<?php
if (logged_in()){
?>
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Dashboard</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="50" class="img-circle"> <?php echo $school_name;?><br/>
<?php
$tellermessenger = "";
if(isset($_GET['tellerguide'])){
echo '<b style="color:blue;font-size:25px;">'.$_GET['tellerguide'].'</b><br/>';
} else{
	$tellermessenger = "";
echo $tellermessenger;	
}
?>
<?php
$list = "";
if(isset($_GET['id'])){
echo '<b style="color:blue;">'.$_GET['id'].'</b><br/>';
} else{
	$list = "";
echo $list;	
}
?>
<?php
$teller = "";
if(isset($_GET['teller'])){
echo '<b style="color:blue;font-size:25px;">'.$_GET['teller'].'</b><br/>';
} else{
	$teller = "";
echo $teller;	
}
?>
<ol class="breadcrumb">
<li><a href="#">Dashboard</a></li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- ============================================================== -->
<!-- Different data widgets -->
<!-- ============================================================== -->
<!-- .row -->
<div class="row">
<div class="col-lg-4 col-sm-6 col-xs-12">
<div class="white-box analytics-info">
<h3 class="box-title">Students</h3>
<ul class="list-inline two-part">
<li>
<i class="fa fa-users"></i>
</li>
<li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">
<?php
//these is used to get the the total no of students 
$sql = "SELECT COUNT(id) FROM studentadd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
//here we have the total row count
$rows = $row[0];
$bin = "$rows";
if($bin > 0){
echo $bin;
} else {
echo "0";	
}	
?>
</span></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-xs-12">
<div class="white-box analytics-info">
<h3 class="box-title">Teachers</h3>
<ul class="list-inline two-part">
<li>
<i class="fa fa-users"></i>                                    
</li>
<li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">
<?php
//these is used to get the the total no of students 
$sql = "SELECT COUNT(id) FROM teacheradd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
//here we have the total row count
$rows = $row[0];
$bin1 = "$rows";
if($bin1 > 0){
echo $bin1;
} else {
echo "0";	
}	
?>
</span></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-xs-12">
<div class="white-box analytics-info">
<h3 class="box-title">Parents</h3>
<ul class="list-inline two-part">
<li>
<i class="fa fa-users"></i>                                    
</li>
<li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">
<?php
//these is used to get the the total no of students 
$sql = "SELECT COUNT(id) FROM parentadd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
//here we have the total row count
$rows = $row[0];
$bin3 = "$rows";
if($bin3 > 0){
echo $bin3;
} else {
echo "0";	
}	
?>
</span></li>
</ul>
</div>
</div>
</div>
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<!--/.row -->
<!--row -->
<!-- /.row -->
<div class="row">
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<div class="white-box">
<h3>
<?php
$sql = "SELECT confirm,teller_no,datemade FROM payments WHERE schoolidentity='$school_name'";
$query = mysqli_query($conn,$sql);
$rower = mysqli_fetch_array($query);
$county = $rower['confirm'];
$teller_no = $rower['teller_no'];
$datemades = $rower['datemade'];
$message = "";
// to get the end of free trial
if($county == 'free trial' && !isset($_GET['info']) && $teller_no == ""){
$present = date("Y-m-d H:i:s");
$start_date = new DateTime($datemades);
$since_start = $start_date->diff(new DateTime($present));
if($since_start->days > 10){
$sql_test = "UPDATE `payments` SET free_trial_status = 'free trial expired' WHERE schoolidentity = '$school_name'";
$query_test = mysqli_query($conn,$sql_test);
$sql_test2 = "UPDATE `users` SET payment = 'deactivated',status = 0 WHERE schoolname='$school_name'";
$query_test = mysqli_query($conn,$sql_test2);

echo "<span class='text-info'>YOUR 10 DAYS FREE TRIAL HAS EXPIRED PLEASE PAY TO ACTIVATE YOUR ACCOUNT<br/>
<a href='trialrenew.php' class='btn btn-info'>Click here to pay</a>
</span>";
} else {	
$message = "<b class='text-info' style='font-size:25px;'>YOUR ARE ON 10 DAYS FREE TRIAL!!!<br/>
<a href='trialrenew.php'>click here</a> to pay and activate your account fully</b>";
echo $message;	
}
} else if(isset($_GET['info'])){
$message = '';
echo $message;
echo '<b style="color:blue;">'.$_GET['info'].'</b>';	
} else {
$message = "";
echo $message;	
}
?>
</h3><br/>
<ul class="list-inline">
<li>
<h5><i class="fa fa-circle m-r-5 text-info"></i>
<?php
$var = $_SERVER['HTTP_USER_AGENT'];
$message = "";
if(strpos($var,'Firefox')){
$message = "MOZILLA FIREFOX DETECTED";
echo $message;	
} else if(strpos($var,'OPR')){
$message = "OPERA MINI DETECTED";
echo $message;	
}  else if(strpos($var,'UBrowser')){
$message = "UC BROWSER DETECTED";
echo $message;
}else if(strpos($var,'Chrome')){
$message = "CHROME BROWSER DETECTED";
echo $message;	
} else if(strpos($var,'Safari')){
$message = "SAFARI BROWSER DETECTED";
echo $message;	
} else {
echo "YOUR BROWSER IS UNKNOWN";	
}
?>
</h5></li>
<li>
<h5><i class="fa fa-circle m-r-5 text-inverse"></i>
windows
</h5></li>
<br/>
<span>
TIME SPENT:
<?php
$present = date("Y-m-d H:i:s");
$start_date = new DateTime($datemade);
$since_start = $start_date->diff(new DateTime($present));

$minutes = $since_start->days * 24 * 60;
$minutes += $since_start->h * 60;
$minutes += $since_start->i;

$hours = $since_start->days * 24;
$hours += $since_start->h;
$hours += $since_start->i/60;

if($minutes >= 525600){
echo $since_start->y.' years ago<br>';		
} else 
if($minutes >= 44640 && $minutes < 525600){
echo $since_start->m.' months ago<br>';	
} else
if($minutes >= 1440 && $minutes < 44640){
echo $since_start->days.' days ago<br>';
} else if($hours >= 2){
echo $since_start->h.' hours '.$since_start->i.'  minutes ago<br>';
} else if($hours < 2){
echo $since_start->i.' minutes '.$since_start->s.'  seconds ago<br>';	
}
?>
</span>
<li>
</ul>
<div id="ct-visits" style="height: 405px;"></div>
</div>
</div>
</div>

</div>
</div>
<?php
$list = "";
if(isset($_GET['sender'])){
} else{
	$list = "";
echo $list;	
}
?>
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>
<?php
} else {
redirect_to("../../index.php");	
}	
ob_end_flush();
?>
