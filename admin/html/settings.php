<?php include_once("header.php"); ?><style>
.image-upload > input
{
display: none;
}
</style>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">System Settings</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<?php
$message = "";
if(isset($_POST['update'])){

$email = trim(mysqli_real_escape_string($conn,$_POST['email']));
$school_phone = preg_replace('#[^0-9]#','',$_POST['school_phone']);
$about = trim(mysqli_real_escape_string($conn,$_POST['about']));
$school_address = trim(mysqli_real_escape_string($conn,$_POST['school_address']));
$session = preg_replace('#[^0-9/]#','',$_POST['session']);
$term = trim(mysqli_real_escape_string($conn,$_POST['term']));

$sql = "UPDATE users SET email = '$email',school_phone = '$school_phone',about = '$about',schooladdress = '$school_address',session = '$session',term='$term'
 WHERE schoolname = '$school_name' AND administrator = '".$_SESSION['username']."'";
$query = mysqli_query($conn,$sql);		 

$message = "profile updated successfully";
?>
<script>
alert(`<?=$message?>`);
</script>
<?php
}
?>
<ol class="breadcrumb">
<li><a href="#">Dashboard</a></li>
<li class="active">Settings</li>
</ol>
</div>
</div>
<!-- /.row -->
<!-- .row -->
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<div class="col-md-4 col-xs-12">
<div class="white-box">
<?php
$sql = "SELECT * FROM users WHERE schoolname = '$school_name' AND administrator = '".$_SESSION['username']."'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>
<div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/large/img1.jpg">
<div class="overlay-box">
<div class="user-content">
<form id="uploadimage1" method="post" enctype="multipart/form-data">
<div class="image-upload">
<label for="file-input1">
<div id="image_preview1">
<img src="../../logo/<?php echo $row['logo'];?>" class="thumb-lg img-circle" alt="img" title="Change the school logo" id="previewing1" />
</div>
</label>
<input id="file-input1" type="file" name="pictures1" accept='image/*' />
</div>
<h4 class="text-white"><?php echo $row['schoolname'];?></h4>
<h5 class="text-white"><?php echo $row['email'];?></h5> </div>
</div>
</div>
</div>
<div class="white-box">
<h4>Set SchoolFees</h4>
<div class="form-group">
<div class="col-md-12">
<input type="text" name="schoolfees" placeholder="Enter SchoolFees" class="form-control form-control-line" value='<?php echo $row['schoolfees'];?>' required="">
</div>
<input type='submit' class="btn btn-success" value='Update'>
</form>
<h4 id='loading1'><img src="../../logo/loading_circle.gif"/>&nbsp;&nbsp;Loading...</h4>
<div id="message1"> 			
</div>
</div>
</div>
</div>
<div class="col-md-8 col-xs-12">
<div class="white-box">
<form class="form-horizontal form-material" method="POST" action="">
<div class="form-group">
<label for="example-email" class="col-md-12">Email</label>
<div class="col-md-12">
<input type="email" placeholder="youremail@schoolweb.com" value="<?php echo $row['email'];?>" class="form-control form-control-line" name="email" id="example-email"> </div>
</div>
<div class="form-group">
<label class="col-md-12">Phone No</label>
<div class="col-md-12">
<input type="text" placeholder="+2349059159344" class="form-control form-control-line" value="<?php echo $row['school_phone'];?>" name="school_phone"> </div>
</div>
<div class="form-group">
<label class="col-md-12">School Address</label>
<div class="col-md-12">
<input type="text" placeholder="GRA, Keffi" class="form-control form-control-line" value="<?php echo $row['schooladdress'];?>" name="school_address"> </div>
</div>
<div class="form-group">
<label class="col-md-12">Term</label>
<div class="col-md-12">
<select name="term" class="form-control form-control-line">
<?php
if($row['term']!==''){
?>
<option diabled><?php echo $row['term'];?></option>
<?php	
}else{
?>
<option diabled>select the term</option>
<?php	
}
?>	
<option value="first_term">first term</option>
<option value="second_term">second term</option>
<option value="third_term">third term</option>	
</select>	
</div>
</div>
<div class="form-group">
<label class="col-md-12">Session</label>
<div class="col-md-12">
<input type="text" name="session" class="form-control form-control-line" placeholder="e.g:2017/2018" value="<?php echo $row['session'];?>">
</div>
</div>
<div class="form-group">
<label class="col-md-12">About School</label>
<div class="col-md-12">
<textarea rows="5" class="form-control form-control-line" name="about"><?php echo $row['about'];?></textarea>
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<button class="btn btn-success" name="update">Update Profile</button>
</div>
</div>
</form>
</div>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); 
ob_end_flush();
?>
