<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Parents</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<?php
if(isset($_POST['add'])){
$profession = trim(mysqli_real_escape_string($conn,$_POST['profession']));
$fullname = trim(mysqli_real_escape_string($conn,$_POST['fullname']));
$address = trim(mysqli_real_escape_string($conn,$_POST['address']));
$email = trim(mysqli_real_escape_string($conn,$_POST['email']));
$child = trim(mysqli_real_escape_string($conn,$_POST['children']));
$phone = preg_replace('#[^0-9]#','',$_POST['phone']);
$password = trim(mysqli_real_escape_string($conn,$_POST['password']));				

////////////////////////////////////////
///////////validations 
////////////////////////////////////////////

$sql = "SELECT * FROM parentadd WHERE schoolidentity = '$school_name' AND name = '$fullname'";
$query = mysqli_query($conn,$sql);
$count = mysqli_fetch_row($query);

$sql = "SELECT * FROM parentadd WHERE schoolidentity = '$school_name' AND child = '$child'";
$query = mysqli_query($conn,$sql);
$count2 = mysqli_fetch_row($query);

if($count!=0){
?>
<p style="color:red;">*<?php echo "these parent name have already been added";?></p>
<?php
} else if($count2!=0){
?>
<p style="color:red;">*<?php echo "these student name have already been attached to a parent";?></p>
<?php
} else {
$sql = "INSERT INTO parentadd(password,name,address,email,datemade,schoolidentity,child,profession,phone)
VALUES('$password','$fullname','$address','$email',now(),'$school_name','$child','$profession','$phone')";
$query = mysqli_query($conn,$sql);		 
?>
<script>
alert("parent record successfully added");
</script>
<?php
}
}
?>								
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Parents</li>
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
<h4 class="modal-title" id="myModalLabel">Add Parent</h4>
</div>
<div class="modal-body">
<form method="post" action="">		 
<input type="text" placeholder="Fullname" class="form-control" name="fullname" required="">
<input type="password" placeholder="add parents password" class="form-control" name="password" required="">
<input type="text" placeholder="Residential Address" class="form-control" name="address"required="">          
<input type="email" placeholder="Email" class="form-control" name="email"required="">
<input type="number" placeholder="Phone" class="form-control" name="phone" required="">
<input type="text" placeholder="Profession" class="form-control" name="profession"required="">          
<select class="form-control" name="children" required=""><!-- HERE WE GET THE STUDENTS FROM THE DATABASE ENTERRED BY THE TEACHER -->
<option disabled selected>Select Child/Children</option>
<?php
$sql = "SELECT name FROM studentadd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
<?php
}
?>
</select>         
<button class="btn btn-default" name="add">Add<i class="fa fa-plus"></i></button>               
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
<div class="table-responsive" id="print1">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Fullname</th>
<th>Email</th>
<th>Phone</th>                                            
<th>Profession</th>
<th>Child/Childen</th>
<th>profile</th>
<th>Options</th>                                            
</tr>
</thead>
<tbody>
<?php
///////////////////////////////////////////////////////////////
// pagination and display of parents record                  //
//////////////////////////////////////////////////////////////											 
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM parentadd WHERE schoolidentity = '$school_name'";
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
$sql = "SELECT * FROM parentadd WHERE schoolidentity = '$school_name' ORDER BY id DESC $limit";	
$query = mysqli_query($conn, $sql);
//this shows the user what page they are on, and the total number of pages
$textline1 = "parent(<b>$rows</b>)";
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
$list = "";
$counter = 1;
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
$id = $row['id'];
$parent_id = base64_encode($id);
?>
<tr>
<td><?php echo $counter++;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['phone'];?></td>
<td><?php echo $row['profession'];?></td>
<td><?php echo $row['child'];?></td>
<script type="text/javascript">
function remove(id)
{
if(confirm('are you sure you want to delete these parent records ?'))
{
window.location='parentdelete.php?remove_id='+id;
}
}
</script>
<td><a href="parentprofile.php?id=<?php echo urlencode($parent_id);?>" class="btn btn-default"><i class="fa fa-eye"></i>view</a></td>
<td><a href="parentedit.php?id=<?php echo urlencode($row['id']);?>" class="btn btn-warning">Edit</a>
&nbsp;<a href="javascript:remove(<?php echo urlencode($row['id']);?>)" class="btn btn-danger">Delete</a></td>
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
<button class="btn btn-default" onclick="printContent('print1');"><i class="fa fa-print"></i> print</button>
<a href="pdf_files/pdf_parents_list.php?id=<?php echo urlencode(base64_encode($school_name));?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> pdf format</a>
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
