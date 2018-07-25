<?php include_once("header.php"); 

if (logged_in()){
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Scratch Cards</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Scratch Cards</li>
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
<a href="scratch_card_view.php"><button class="btn btn-success" style="float: right;">Print</button></a>
<?php 
if(isset($_POST['generate'])){
$string = randstrgen(20);
$sql = "INSERT INTO scratch_card(class,session,pin,datemade,schoolidentity)
VALUES('".$_SESSION['classes']."','".$_SESSION['session']."','$string',now(),'$school_name')";
$query = mysqli_query($conn,$sql);
$message = "recharge pin successfully generated";
echo '<b style="color:green;">'.$message.'</b><i class="fa fa-check"></i>';
?>
<script>
alert("generated");
</script>
<?php	
}
?>
<ul id="myTab3" class="nav nav-tabs">
<li><a href="#profile3" data-toggle="tab">Generate All</a></li>
<li><a href="#profile4" data-toggle="tab">Settings</a></li>
</ul>
<div id="myTabContent3" class="tab-content active">
<div class="tab-pane fade in" id="profile3">
<div class="alert alert-danger fade in">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4>NOTE!</h4>
<p>Clicking the GENERATE button generates scratch card pins for all students in {Class Name}!</p>
</div>
<form method="post" action="">
<button class="btn btn-default" type="submit" name="generate">GENERATE ALL</button>
</form>
</div>

<?php
if(isset($_POST['submit1'])){
$price_limit = $_POST['price_limit'];
$price_term = $_POST['price_term'];	
$price = $_POST['price'];

$sql = "UPDATE scratch_card SET status = '$price', price = '$price_term', usage_limit = '$price_limit'
WHERE schoolidentity = '$school_name' AND class = '".$_SESSION['classes']."' AND session = '".$_SESSION['session']."'";
$query = mysqli_query($conn,$sql);
?>
<script>
alert("updated successfully");
</script>
<?php
}
?>
<div class="tab-pane fade in" id="profile4">
<form method="POST" action="">
<label>Price:</label>
<select class="form-control" name="price" id="price">
<option>Free</option>
<option>Commercial</option>
</select>
<input type="number" class="form-control" name="price_limit" placeholder="Set Limits in Numbers">
<input type="text" class="form-control" name="price_term" placeholder="Enter price in Naira" id="price-term">
<button type="submit" class="btn btn-success" name="submit1">Update</button>
</form>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>
<script type="text/javascript">
$(document).ready(function() {
$("#price-term").hide();
$('#price').on('change', function()
{
if(this.value == "Commercial") {
$("#price-term").fadeIn();
} else {
$("#price-term").fadeOut();
}
});
});
</script>

<?php
} else {
redirect_to("../../index.php");	
}	
ob_end_flush();
?>