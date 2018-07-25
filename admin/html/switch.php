<?php include_once("header.php"); 
?>
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">PAYMENTS</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?><br/>
<?php
if(isset($_POST['upload'])){
// sanitizing inputs
$teller_no = trim(mysqli_real_escape_string($conn,$_POST['teller_no']));
///for image uploads
$name = $_FILES['the_file']['name'];
$type = explode('.',$name);
$type = end($type);
$size = $_FILES['the_file']['size'];
$random_name = rand();
$tmp = $_FILES['the_file']['tmp_name'];
$message = "";

$sql = "SELECT * FROM payments WHERE teller_no = '$teller_no'";
$query = mysqli_query($conn,$sql);
$counter = mysqli_fetch_row($query);
if($counter!=0){
	$message = "teller already uploaded";
	?>
<p style="color:red;font-size:25px;">*<?php echo $message;?></p>
<?php
}else if($type!='jpg' && $type!='JPG' && $type!='png' && $type!='PNG'){
$message = "file format not supported, you can only upload 'jpg'and 'png' picture formats";
?>
<p style="color:red;font-size:25px;">*<?php echo $message;?></p>
<?php
} else {
move_uploaded_file($tmp,"../../admincontrol/teller/".$random_name.'.'.$type);
$sql = "INSERT INTO payments(teller_no,teller_image,datemade,schoolidentity,school_logo,admin)
VALUES('$teller_no','$random_name.$type',now(),'$school_name','$logo','$admin')";
$query = mysqli_query($conn,$sql);
$message = "file successfully uploaded";
?>
<script>
alert(`<?=$message;?>`);
</script>
<?php
}
}
?>
<ol class="breadcrumb">
<li><a href="#">PAYMENTS</a></li>
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
<div class="col-lg-12 col-sm-6 col-xs-12">
<div class="white-box analytics-info">
<h3 class="box-title" style='text-align:center;color:green;'>STAGE ONE:PAYMENT</h3>
<p>PROCEED TO THE BANK AND PAY THE INDICATED AMOUNT OF YOUR SUBSCRIPTION PLAN<br/>
THE SUBSCRIPTION PLAN AND THEIR AMOUNT ARE LISTED BELOW:<br/>
BASIC: #90,000;<br/>
REGULAR : #150,000;<br/>
PROFESSIONAL: #200,000;<br/>
EXTENDED PLAN<br/>
</p><br/><br/>
<h3 style='text-align:center;color:green;'>BANK DETAILS</h3>
<p>PAY TO THE BANK DETAILS BELOW:<br/>
BANK NAME:<br/>
ACCOUNT NUMBER:<br/>
ACCOUNT NAME:<br/>
</p>
</span></li>
</ul>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-sm-6 col-xs-12">
<div class="white-box analytics-info">
<h3 class="box-title" style='text-align:center;color:green;'>STAGE TWO:CONFIRM PAYMENT</h3>
<p>PLEASE UPLOAD YOUR TELLER INFORMATION AND SCREENSHOT BELOW
BY CLICKING THE CONFIRMATION BUTTON:
<a class="btn btn-primary" data-toggle="modal" data-target="#myModal">CONFIRM</a> 
<br/>
<!--MODAL BEGINS-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Upload a clear screenshot pics of your teller</h4>
</div>
<div class="modal-body">
<form method="post" action="" enctype="multipart/form-data">     
<input type="text" class="form-control" placeholder="input the number on your Teller" name="teller_no" required="">    
<input type="file" class="form-control" name="the_file" required="">   
<button class="btn btn-default" name="upload">Upload<i class="fa fa-upload"></i></button>
</form>    
</div>
</div>
</div>
</div>
<!--MODAL ENDS-->
</p><br/><br/>
</span></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>
<?php
ob_end_flush();
?>