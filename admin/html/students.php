<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">STUDENTS</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?><br/>
<?php
$student_edit_message = "";
if(isset($_GET['studenteditinfo'])){
echo '<b style="color:blue;font-size:25px;">'.$_GET['studenteditinfo'].'</b><br/>';
} else{
	$student_edit_message = "";
echo $student_edit_message;	
}
?>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Students</li>
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
<h4 class="modal-title" id="myModalLabel">Add Student</h4>
</div>
<div class="modal-body">
<form method="post" id="uploadimage2" action="" enctype="multipart/form-data">
<h4 id='loading2'><img src="../../logo/loading_circle.gif"/>&nbsp;&nbsp;Loading...</h4>
<div id="message2"> 			
</div>
<div class="image-upload">
<label for="file-input2">
<div id="image_preview2">
<img src="../plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img" title="The student photo" id='previewing2'>
</div>
</label>
<input id="file-input2" type="file" name="photo" accept='image/*'/>
</div> 
<input type="text" placeholder="Admission Number" class="form-control" name="admissionno" required="">   
<input type="password" placeholder="add student password" class="form-control" name="password" required="">             
<input type="text" placeholder="Fullname" class="form-control" name="fullname" required="">
<input type="text" placeholder="Residential Address" class="form-control" name="address">          
<input type="email" placeholder="Email" class="form-control" name="email">
<select class="form-control" name="class"> <!-- HERE WE GET THE CLASSES FROM THE DATABASE ENTERRED BY THE ADMIN -->
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
<option class="text-info" disabled><?php echo $info;?></option>
<?php
}
?>
</select>  
<select class="form-control" name="gender"> 
<option disabled selected>Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>   
<label>Date of Birth</label>
<input type="date" placeholder="Date of Birth" class="form-control" name="DOB">         
<button class="btn btn-default" name="add">Add<i class="fa fa-plus"></i></button>         
</div>
</form>
</div>
</div>
</div>
<!--MODAL ENDS-->
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<!-- /row -->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<div class="col-md-3 col-sm-4 col-xs-6 pull-right">
<a class="btn btn-default" data-toggle="modal" data-target="#myModal">Add <i class="fa fa-plus"></i></a>
<a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="btn btn-info">Refresh</i></a>
</div>
<div class="table-responsive" id="print1">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Photo</th>
<th>Fullname</th>
<th>Email</th>
<th>Class</th>
<th id="noprint">Options</th>
<th id="noprint2">profile</th>                                    
</tr>
</thead>
<tbody>
<?php
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM studentadd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
//here we have the total row count
$rows = $row[0];
//these is the number of results we want displayed per page
$page_rows = 20;
//this tells us the page number of our last page
$last = ceil($rows/$page_rows);
//these makes sure $last cannot be less than 1	 
if($last<1){
$last = 1;
}   
//Establish the $pagenum variable
$pagenum = 1;
//Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])) {
$pagenum = preg_replace('#[^0-9]#','',$_GET['pn']);
}
//these makes sure the page no is not below 1, or more than $last page 
if ($pagenum < 1){
$pagenum = 1;
} else if($pagenum > $last) {
$pagenum = $last;
}
//these sets the range of rows for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum-1) * $page_rows. ','.$page_rows;
//grabbing just one page worth of rows
$sql = "SELECT * FROM studentadd WHERE schoolidentity = '$school_name' ORDER BY id DESC $limit";	
$query = mysqli_query($conn, $sql);
//this shows the user what page they are on, and the total number of pages
$textline1 = "students(<b>$rows</b>)";
$textline2 = "page<b> $pagenum</b> of <b>$last</b>";
$paginationCtrls = '';
if($last != 1){
if($pagenum > 1) {
$previous = $pagenum - 1;
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">previous</a> &nbsp;&nbsp;';
for($i = $pagenum-4; $i < $pagenum; $i++){
if($i > 0){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp ';
}
}
}
$paginationCtrls .= ''.$pagenum.' &nbsp; ';
for($i = $pagenum+1; $i <= $last; $i++) {
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;';
if($i >= $pagenum+4){
break;			
}
}
if($pagenum != $last){
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
} 	
}
$list = "";
$counter = 1;
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $counter++;?></td>
<td><img src="../../logo/<?php echo $row['picture'];?>" height="50"></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['class'];?></td>
<script type="text/javascript">
function remove(id)
{
if(confirm('are you sure you want to delete student ?'))
{
window.location='studentdelete.php?remove_id='+id;
}
}
</script> 
<td><a href="studentedit.php?id=<?php echo urlencode($row['id']);?>" class="btn btn-warning">Edit</a>&nbsp;<a href="javascript:remove(<?php echo urlencode($row['id']);?>)" class="btn btn-danger">Delete</a></td>
<td><a href="studentprofile.php?profile=<?php echo urlencode($row['id']);?>&&name=<?php echo urlencode($row['name']);?>" class="btn btn-default">view<i class="fa fa-eye"></i></a>
</td>
</tr>
<?php
}
}
?>
</tbody>
</table>
<div id="textline">
<p style="font-family:times new roman;"><?php echo $textline2; ?></p>
<div id ="pagination_controls">
<?php echo $paginationCtrls ;?>
</div> 
</div>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<button class="btn btn-default" onclick="printContent('print1');"><i class="fa fa-print"></i>print</button>
<a href="pdf_files/pdf_students_list.php?id=<?php echo urlencode(base64_encode($school_name));?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> pdf format</a>
</div>
</div>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>