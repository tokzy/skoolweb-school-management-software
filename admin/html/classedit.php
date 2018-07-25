<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">EDIT Class</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<?php
if(isset($_POST['edit'])){
$class = trim(mysqli_real_escape_string($conn,$_POST['class']));
$category = trim(mysqli_real_escape_string($conn,$_POST['category']));
$teachers = trim(mysqli_real_escape_string($conn,$_POST['teachers']));

////////////////////////////////////////
///////////validations
////////////////////////////////////////////


$sql = "SELECT * FROM class WHERE schoolidentity = '$school_name' AND category = '$category'";
$query = mysqli_query($conn,$sql);
$count = mysqli_fetch_row($query);

$sql = "SELECT * FROM class WHERE schoolidentity = '$school_name' AND class = '$class'";
$query = mysqli_query($conn,$sql);
$count2 = mysqli_fetch_row($query);


if($count != 0 && $count2 != 0){
?>
<p style="color:red;">*<?php echo "these class already exists";?></p>
<?php
} else {
$sql = "UPDATE class SET class = '$class',category = '$category',teachers = '$teachers',schoolidentity = '$school_name' WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);		 
redirect_to("class.php");
exit;
}
}
?>


</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Class</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>

<!--MODAL BEGINS-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">EDIT Class</h4>
</div>
<div class="modal-body">
<?php
$sql = "SELECT * FROM class WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
$row1 = mysqli_fetch_array($query);
?>

<form method="post" action=""> 		 
<input type="text" placeholder="Class Name" class="form-control" name="class" value="<?php echo $row1['class'];?>" required="">          
<select class="form-control" name="category"><!-- HERE WE GET THE CATEGORIES FROM THE DATABASE ENTERRED BY THE ADMIN -->
<option disabled>Select Category</option>
<option value="<?php echo $row1['category'];?>" selected><?php echo $row1['category'];?></option> 
<?php
$sql = "SELECT category FROM subjectadd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$message = "";
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
$message = $row['category'];
?>
<option value="<?php echo $message;?>"><?php echo $message;?></option>
<?php
}
} else {
$message = "no records found, please add from the subject section";
?>
<option value="<?php echo $message;?>"><?php echo $message;?></option>
<?php
}
?>
</select>    

<select class="form-control" name="teachers"> <!-- HERE WE GET THE TEACHERS FROM THE DATABASE ENTERRED BY THE ADMIN -->
<option disabled>Select teachers</option>
<option value="<?php
//for input former ecord to the fields
echo $row1['teachers'];?>" selected><?php echo $row1['teachers'];?></option> 
<?php
$message2 = "";
$sql = "SELECT name FROM teacheradd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
$message2 = $row['name'];
?>
<option value="<?php echo $message2;?>"><?php echo $message2;?></option>
<?php
}
} else {
$message2 = "no records found, please go to the teacher section and add teachers record";
?>
<option value="<?php echo $message2;?>"><?php echo $message2;?></option>
<?php
}
?>
</select>        
<button class="btn btn-default" name="edit">UPDATE<i class="fa fa-plus"></i></button>
</form>    
</div>
</div>
</div>
</div>
<!--MODAL ENDS-->
<!-- /row -->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<div class="col-md-1 col-sm-4 col-xs-6 pull-right">
</div>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Category</th>
<th>Teacher</th>
<th>date added</th>
<th>Options</th>                                            
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM class WHERE id = '".$_GET['id']."' ";	
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['class'];?></td>
<td><?php echo $row['category'];?></td>
<td><?php echo $row['teachers'];?></td>
<td><?php 
$date = $row['datemade'];
$datemade = strftime("%b,%d %Y",strtotime($date));
echo $datemade;
?></td>
<td><a  class="btn btn-warning" data-toggle="modal" data-target="#myModal">Edit</a></td>
</tr>
</tbody>
<?php
}
}
?>
</table>
</div>
</div>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php");
ob_end_flush();
?>