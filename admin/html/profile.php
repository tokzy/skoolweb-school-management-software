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
<h4 class="page-title">Profile page</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<?php
if(isset($_POST['edit'])){
$password = trim(sha1($_POST['password']));
$email = trim(mysqli_real_escape_string($conn,$_POST['email']));
$phone_no = preg_replace('#[^0-9]#','',$_POST['phone_no']);
///for image uploads
/*$name = $_FILES['photo']['name'];
$type = explode('.',$name);
$type = end($type);
$size = $_FILES['photo']['size'];
$random_name = rand();
$tmp = $_FILES['photo']['tmp_name'];
*/
$message = "";
//
////////////////////////////////////////
///////////validations
////////////////////////////////////////////
/*$sql = "SELECT logo FROM users WHERE administrator = '".$_SESSION['username']."' AND schoolname = '$school_name'";
$query = mysqli_query($conn,$sql);
$count = mysqli_fetch_array($query);	
unlink("../../logo/".$count['logo']);*/
 
$sql = "UPDATE users SET adminemail = '$email',phone_no = '$phone_no',password = '$password' WHERE schoolname = '$school_name' AND administrator = '".$_SESSION['username']."'";
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
<li class="active">Profile Page</li>
</ol>
</div>
</div>
<!-- /.row -->
<!-- .row -->
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<?php
$sql = "SELECT * FROM users WHERE schoolname = '$school_name' AND administrator = '".$_SESSION['username']."'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>
<div class="row">
<div class="col-md-4 col-xs-12">
<div class="white-box">
<div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/large/img1.jpg">
<div class="overlay-box">
<div class="user-content">
<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
<div class="image-upload">
<label for="file">
<div id="image_preview">
<?php
$profile = "SELECT admin_logo from `users` WHERE administrator = '".$_SESSION['username']."'";
$query_profile = mysqli_query($conn,$profile);
$profile_mn = mysqli_fetch_array($query_profile);
$profile_me = $profile_mn['admin_logo'];
if($profile_me != ''){
?>
<img src="../../logo/<?php echo $profile_me;?>" class="thumb-lg img-circle" alt="img" title="Change the admin picture" id="previewing">
<?php	
} else {
?>
<img src="../../logo/admin.png" class="thumb-lg img-circle" alt="img" title="Change the admin picture" id="previewing">
<?php	
}
?>
</div>
</label>
<input id="file" type="file" name="pictures" accept='image/*'/>
</div>
</form>
<h4 id='loading'><img src="../../logo/loading_circle.gif"/>&nbsp;&nbsp;Loading...</h4>
<div id="message"> 			
</div>
<h4 class="text-white"><?php echo $row['administrator'];?></h4>
<h5 class="text-white"><?php echo $row['adminemail'];?></h5> </div>
</div>
</div>
</div>
</div>
<div class="col-md-8 col-xs-12">
<div class="white-box">
<form class="form-horizontal form-material" method="POST">
<div class="form-group">
<label for="example-email" class="col-md-12">Email</label>
<div class="col-md-12">
<input type="email"  class="form-control form-control-line" name="email" id="example-email" value="<?php echo $row['adminemail'];?>"></div>
</div>
<div class="form-group">
<label class="col-md-12">change Password</label>
<div class="col-md-12">
<input type="password"  class="form-control form-control-line" name="password"> </div>
</div>
<div class="form-group">
<label class="col-md-12">Phone No</label>
<div class="col-md-12">
<input type="text" placeholder="+2349059159344" class="form-control form-control-line" name="phone_no"> </div>

</div>
</div>

<div class="form-group">
<div class="col-sm-12">
<button class="btn btn-success" name="edit">Update Profile</button>

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