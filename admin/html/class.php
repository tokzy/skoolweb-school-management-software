<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Class</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<?php
if(isset($_POST['add'])){
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
$sql = "INSERT INTO class(class,category,teachers,datemade,schoolidentity)
VALUES('$class','$category','$teachers',now(),'$school_name')";
$query = mysqli_query($conn,$sql);		 
?>
<script>
alert("class successfully added");
</script>
<?php
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
<h4 class="modal-title" id="myModalLabel">Add Class</h4>
</div>
<div class="modal-body">  
<form method="post" action=""> 		 
<input type="text" placeholder="Class Name" class="form-control" name="class" required="">          
<select class="form-control" name="category"><!-- HERE WE GET THE CATEGORIES FROM THE DATABASE ENTERRED BY THE ADMIN -->
<option disabled selected>Select Category</option>
<option value="pre-school">Pre-school</option>
<option value="primary/basic">Primary/Basic</option>
<option value="junior secondary">Junior Secondary</option>
<option value="senior secondary">Senior Secondary</option>
</select>    
<select class="form-control" name="teachers"> <!-- HERE WE GET THE TEACHERS FROM THE DATABASE ENTERRED BY THE ADMIN -->
<option disabled selected>Select teachers</option>
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
<button class="btn btn-default" name="add" >Add<i class="fa fa-plus"></i></button>
</form>    
</div>
</div>
</div>
</div>
<!--MODAL ENDS-->
<!-- /row -->
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<div class="col-md-1 col-sm-4 col-xs-6 pull-right">
<a class="btn btn-default" data-toggle="modal" data-target="#myModal">Add <i class="fa fa-plus"></i></a>
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
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM class WHERE schoolidentity = '$school_name'";
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
$sql = "SELECT * FROM class WHERE schoolidentity = '$school_name' ORDER BY id DESC $limit";	
$query = mysqli_query($conn, $sql);
//this shows the user what page they are on, and the total number of pages
$textline1 = "class(<b>$rows</b>)";
$textline2 = "page<b> $pagenum</b> of <b>$last</b>";
//Establish the $paginationCtrls variable
$paginationCtrls = '';
// if there is more than one page worth of results
if($last != 1){
if($pagenum > 1) {
$previous = $pagenum - 1;
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">previous</a> &nbsp;&nbsp;';
//render clickable number link that should appear on the left of the target page number
for($i = $pagenum-4; $i < $pagenum; $i++){
if($i > 0){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp ';
}

}
}

// render the target page number but without it being the link 
$paginationCtrls .= ''.$pagenum.' &nbsp; ';
// render clickable number links that should appear on the right
for($i = $pagenum+1; $i <= $last; $i++) {
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;';
if($i >= $pagenum+4){
break;			
}
}
//this does as the same above but only shows the "next" button once they are not on the last page
if($pagenum != $last){
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
} 	

}
$counter = 1;
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $counter++;?></td>
<td><?php echo $row['class'];?></td>
<td><?php echo $row['category'];?></td>
<td><?php echo $row['teachers'];?></td>
<td><?php 
$date = $row['datemade'];
$datemade = strftime("%b,%d %Y",strtotime($date));
echo $datemade;
?></td>
<script type="text/javascript">
function remove(id)
{
if(confirm('are you sure you want to delete class ?'))
{
window.location='classdelete.php?remove_id='+id;
}
}
</script>
<td><a href="classedit.php?id=<?php echo urlencode($row['id']);?>" data-toggle="tooltip" title="edit these record" class="btn btn-warning">Edit</a>
&nbsp;<a href="javascript:remove(<?php echo urlencode($row['id']);?>)" data-toggle="tooltip" title="delete these record" class="btn btn-danger">Delete</a></td>
</tr>
</tbody>
<?php
}
}
?>
</table>
<div id="textline">
<p style="font-family:times new roman;"><?php echo $textline2; ?></p>
<div id ="pagination_controls">
<?php echo $paginationCtrls ;?>
</div> 
</div>					
<a href="pdf_files/class_pdf.php?id=<?php echo urlencode(base64_encode($school_name));?>" data-toggle="tooltip" title="view and download in pdf format" class="btn btn-danger">
<i class="fa fa-file-pdf-o"></i> pdf format</a>		
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