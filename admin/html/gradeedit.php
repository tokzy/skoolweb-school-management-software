<?php include_once("header.php");?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">GRADE</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">GRADE</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<div  id="profile1">
<form method="post" action="">
<?php
// to input the grades into the database;
$message = "";
if(isset($_POST['edit'])){

$grade_name = trim(mysqli_real_escape_string($conn,$_POST['grade_name']));
$grade_alphabet = trim(mysqli_real_escape_string($conn,$_POST['grade_alphabet']));
$range_min = preg_replace('#[^0-9]#','',$_POST['range_min']);
$range_max = preg_replace('#[^0-9]#','',$_POST['range_max']);
$class = trim(mysqli_real_escape_string($conn,$_POST['classes']));
/*-----------------------------------------------------------------------------------
----------------------validations-----------------------------------------------------*/
$sql = "SELECT * FROM grade_result WHERE id = '".$_GET['id']."' AND class = '$class'";
$query = mysqli_query($conn,$sql);
$count = mysqli_fetch_row($query);

$sql = "SELECT * FROM grade_result WHERE id = '".$_GET['id']."' AND grade_alphabet = '$grade_alphabet'";
$query = mysqli_query($conn,$sql);
$count2 = mysqli_fetch_row($query);

$sql = "SELECT * FROM grade_result WHERE id = '".$_GET['id']."' AND grade_name = '$grade_name'";
$query = mysqli_query($conn,$sql);
$count3 = mysqli_fetch_row($query);

$sql = "SELECT * FROM grade_result WHERE id = '".$_GET['id']."' AND range_min = '$range_min'";
$query = mysqli_query($conn,$sql);
$count4 = mysqli_fetch_row($query);

$sql = "SELECT * FROM grade_result WHERE id = '".$_GET['id']."' AND range_max = '$range_max'";
$query = mysqli_query($conn,$sql);
$count5 = mysqli_fetch_row($query);

if($count!=0 && $count2!=0 && $count3!=0 && $count4!=0 && $count5!=0){
$message = "oops! grade record already exists!!";
echo '<p style="color:red;">'.$message.'</p>';
} else {
$sql = "UPDATE grade_result SET grade_name = '$grade_name',grade_alphabet = '$grade_alphabet',range_min = '$range_min',
range_max = '$range_max',class = '$class',schoolidentity = '$school_name' WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
$message = "grade record edited successfully";
echo '<p style="color:red;">'.$message.' <a href="grade.php">click here</a> to go back to grade</p>';
?>
<script>
alert(`<?=$message?>`);
</script>
<?php
}		 
} else {
$message = "you can edit the grade details below.......";
echo '<p style="color:red;">'.$message.'</p>';
}
?>
<?php
//selecting all from database to display
$sql = "SELECT * FROM grade_result WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>
<input type="text" name="grade_name" placeholder="Grade name e.g Distinction" class="form-control" value="<?php echo $row['grade_name'];?>">
<input type="text" name="grade_alphabet" placeholder="Grade alphabet e.g A,B2" class="form-control" value="<?php echo $row['grade_alphabet'];?>">
<label>Range: </label>        
<input type="number" name="range_min" placeholder="Minimum Range" value="<?php echo $row['range_min'];?>">
<input type="number" name="range_max" placeholder="Maximum Range" value="<?php echo $row['range_max'];?>">
<select class="form-control" name="classes"> <!-- HERE WE GET THE CLASSES FROM THE DATABASE ENTERRED BY THE ADMIN -->
<option disabled>Choose the class</option>
<option value="<?php echo $row['class'];?>" selected><?php echo $row['class'];?></option>
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
$info = "oops!! no record yet added from the class section,go there to add one";
?>
<option style='color:red;' disabled><?php echo $info;?></option>
<?php
}
?>
</select>  
<button class="btn btn-default" name="edit">UPDATE<i class="fa fa-plus"></i></button>
</form>		



</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->

<?php include_once("footer.php"); 
ob_end_flush();
?>