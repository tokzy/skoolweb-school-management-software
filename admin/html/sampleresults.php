<?php include_once("header.php"); ?>
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Dashboard</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
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
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<!-- .row -->
<div class="row">
<div class="col-lg-12 col-sm-6 col-xs-12">
<div class="white-box analytics-info">
<h3>FULL INFORMATION</h3>
<?php
if(isset($_GET['studentid'])){
$sql = "SELECT * FROM studentadd WHERE id = '".$_GET['studentid']."' AND schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);	
?>
<b>student name:</b> <i style="color:blue;"><?php echo $row['name'];?></i>
<hr/>
<b>pics:</b> <img src="../../logo/<?php echo $row['picture'];?>" width="50px" height="50px" />
<hr/>
<b>email: </b> <i style="color:blue;"><?php echo $row['email'];?></i>
<hr/>
<b>date_of_birth:</b> <i style="color:blue;"><?php echo $row['date_of_birth'];?></i>
<hr/>
<b>gender:</b> <i style="color:blue;"><?php echo $row['gender'];?></i>
<hr/>
<b>school fees payment status:</b> <i style="color:blue;"><?php echo $row['payment_status'];?></i>
<hr/>
<b>admission number:</b> <i style="color:blue;"><?php echo $row['admission_number'];?></i>
<hr/>
<b>class:</b> <i style="color:blue;"><?php echo $row['class'];?></i>
<hr/>
<?php	
} else {
	
}
?>
<?php
if(isset($_GET['parentid'])){
$sql = "SELECT * FROM parentadd WHERE id = '".$_GET['parentid']."' AND schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);	
?>
<b>parent name:</b> <i style="color:blue;"><?php echo $row['name'];?></i>
<hr/>
<b>email: </b> <i style="color:blue;"><?php echo $row['email'];?></i>
<hr/>
<b>profession:</b> <i style="color:blue;"><?php echo $row['profession'];?></i>
<hr/>
<b>phone:</b> <i style="color:blue;"><?php echo $row['phone'];?></i>
<hr/>
<b>address:</b> <i style="color:blue;"><?php echo $row['address'];?></i>
<hr/>
<b>name of child/children:</b> <i style="color:blue;"><?php echo $row['child'];?></i>
<hr/>
<?php	
} else {
	
}
?>
<?php
if(isset($_GET['teacherid'])){
$sql = "SELECT * FROM teacheradd WHERE id = '".$_GET['teacherid']."' AND schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);	
?>
<b>teacher name:</b> <i style="color:blue;"><?php echo $row['name'];?></i>
<hr/>
<b>pics:</b> <img src="../../logo/<?php echo $row['picture'];?>" width="50px" height="50px" />
<hr/>
<b>email: </b> <i style="color:blue;"><?php echo $row['email'];?></i>
<hr/>
<b>phone:</b> <i style="color:blue;"><?php echo $row['phone_no'];?></i>
<hr/>
<b>gender:</b> <i style="color:blue;"><?php echo $row['gender'];?></i>
<hr/>
<b>date of birth:</b> <i style="color:blue;"><?php echo $row['date_of_birth'];?></i>
<hr/>
<?php	
} else {
	
}
?>
</div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php");
ob_end_flush();
 ?>