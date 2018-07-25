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
<div class="infor">
<form method="POST">
<?php
if(isset($_POST['submit'])){
$class1 = $_POST['class1'];
$session1 = $_POST['session1'];

$_SESSION['class1'] = $class1;
$_SESSION['session1'] = $session1;

redirect_to("finance_check.php");
}
?>
<select class="form-control" name="class1" required>
<option disabled selected>Choose the class</option>
<?php
// getting the classes from database
$sql = "SELECT class FROM class WHERE schoolidentity = '$school_name' ORDER BY ID DESC";
$query = mysqli_query($conn,$sql);
$info = "";
if(mysqli_num_rows($query) > 0){
$info = "";
while($row = mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['class'];?>"><?php echo $row['class'];?></option>
<?php		
}	
} else {
$info = "oops!! no record yet added from the class section";
?>
<option style='color:red;' disabled><?php echo $info;?></option>
<?php
}
?>
</select>
<label for="default">Choose Session</label>
<input type="text" name="session1" class="form-control" placeholder="enter session e.g:2017/2018" required/>
<button class="btn btn-success" name="submit">Submit</button> <!-- make a GET request here -->
</form>
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