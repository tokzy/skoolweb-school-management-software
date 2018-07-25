<?php include_once("header.php"); 
if (logged_in()){
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Financial Tracking</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Financial Tracking</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<h2>{<?php echo $_GET['name'];?>}</h2>
<ul id="myTab3" class="nav nav-tabs">
<li><a href="#home3" data-toggle="tab">Manage</a></li>
<li><a href="#profile3" data-toggle="tab">Status</a></li>
</ul>
<?php
if(isset($_POST['submit'])){
$schoolfees = $_POST['school_fees'];
$amount = $_POST['amount'];
$date = $_POST['date'];	
$select = "SELECT * FROM `fees` WHERE schoolidentity = '$school_name' AND session = '".$_SESSION['session1']."' AND student_name='".$_GET['name']."'";
$query = mysqli_query($conn,$select);
if(mysqli_num_rows($query)>0){
$sql = "UPDATE fees SET amount='$amount',date_pay = '$date',school_fees='$schoolfees' WHERE student_name='".$_GET['name']."' AND schoolidentity='$school_name'";
$query = mysqli_query($conn,$sql);	
$sql = "UPDATE studentadd SET payment_status = 'paid', payment_session = '".$_SESSION['session1']."' WHERE name = '".$_GET['name']."' AND class = '".$_SESSION['class1']."'";
$query = mysqli_query($conn,$sql);
} else {
$sql = "INSERT INTO fees(amount,date_pay,datemade,schoolidentity,school_fees,class,student_name,session)
VALUES('$amount','$date',now(),'$school_name','$schoolfees','".$_SESSION['class1']."','".$_GET['name']."','".$_SESSION['session1']."')";
$query = mysqli_query($conn,$sql);
$sql = "UPDATE studentadd SET payment_status = 'paid', payment_session = '".$_SESSION['session1']."' WHERE name = '".$_GET['name']."' AND class = '".$_SESSION['class1']."'";
$query = mysqli_query($conn,$sql);
}
?>
<script>
alert("submitted successfully");
</script>
<?php
}
?>
<form method="POST">
<div id="myTabContent3" class="tab-content active">
<div class="tab-pane fade in active" id="home3">
<h5>Enter Payment Details:</h5>
<input type="text" name="school_fees" placeholder="enter the school fees amount here" class="form-control">
<input type="text" name="amount" placeholder="Amount Paid" class="form-control">
<input type="text" name="date" placeholder="Date Paid(d/m/y)" class="form-control">
<button class="btn btn-success" name="submit">Submit</button>
</div>
</form>
<div class="tab-pane fade in" id="profile3">
<?php
$sql = "SELECT * FROM fees WHERE student_name = '".$_GET['name']."' AND class = '".$_SESSION['class1']."' AND schoolidentity = '$school_name' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>
<?php
$message = "";
if($row['amount'] != ""){
?>
<p>Status: {Paid}</p>
<p>Amount Paid: {<?php echo $row['amount'];?>}</p>
<p>Amount Left: {<?php 
$sc = $row['school_fees'];
$am = $row['amount'];

$total = $sc-$am;
echo $total;
?>}</p>
<p>Date: <?php $date_paid = $row['date_pay']; echo $date_paid;?></p>
<?php
} else if($row['amount'] == ""){
	$message = "these student have not yet pay";
	echo $message;
?>
<p>Status: {NOT Paid}</p>
<?php	
}
?>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>
<?php
} else {
redirect_to("../../index.php");	
}	
ob_end_flush();
?>