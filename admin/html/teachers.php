<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Teachers</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<?php
if(isset($_GET['teachedit'])){
echo '<b style="color:blue;font-size:25px;">'.$_GET['teachedit'].'</b>';	
}
?>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Teachers</li>
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
<h4 class="modal-title" id="myModalLabel">Add Teacher</h4>
</div>
<div class="modal-body">
<form method="post" id="uploadimage4" action="" enctype="multipart/form-data">
<h4 id='loading4'><img src="../../logo/loading_circle.gif"/>&nbsp;&nbsp;Loading...</h4>
<div id="message4"> 			
</div>		 
<div class="image-upload">
<label for="file-input4">
<div id="image_preview4">
<img src="../plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img" title="The student photo" id="previewing4">
</div>
</label>
<input id="file-input4" type="file" name="picture1"/>
</div> 
<input type="text" placeholder="Fullname" class="form-control"name="fullname" required="">
<input type="password" placeholder="add teachers password" class="form-control" name="password" required="">
<input type="text" placeholder="Residential Address" class="form-control" name="address">          
<input type="email" placeholder="Email" class="form-control" name="email">
<input type="number" placeholder="Phone" class="form-control" name="phone">
<input type="text" placeholder="Date of Birth" class="form-control" name="DOB">          
<select class="form-control" name="gender"> 
<option disabled selected>Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>            
<button class="btn btn-default" name="add">Add<i class="fa fa-plus"></i></button>
</div>
</div>
</form>
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
<div class="col-md-2 col-sm-4 col-xs-6 pull-right">
<ul id="df">
<li><a class="btn btn-default" data-toggle="modal" data-target="#myModal">Add <i class="fa fa-plus"></i></a></li>
<li><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="btn btn-info btn-sm">Refresh</a></li>
</div>
<div class="table-responsive" id="print1">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>picture</th>
<th>Fullname</th>
<th>Email</th>
<th>Phone</th>                                            
<th>Options</th>
<th>profile</th>                                            
</tr>
</thead>
<tbody>
<?php
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM teacheradd WHERE schoolidentity = '$school_name'";
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
$sql = "SELECT * FROM teacheradd WHERE schoolidentity = '$school_name' ORDER BY id DESC $limit";	
$query = mysqli_query($conn, $sql);
//this shows the user what page they are on, and the total number of pages
$textline1 = "teachers(<b>$rows</b>)";
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
?>
<tr>
<td><?php echo $counter++;?></td>
<td><img src="../../logo/<?php echo $row['picture'];?>" height="50"></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['phone_no'];?></td>
<script type="text/javascript">
function remove(id)
{
if(confirm('are you sure you want to delete teacher ?'))
{
window.location='teacherdelete.php?remove_id='+id;
}
}
</script>
<td><a href="teacheredit.php?id=<?php echo urlencode($row['id']);?>" class="btn btn-warning">Edit</a>
&nbsp;<a href="javascript:remove(<?php echo urlencode($row['id']);?>)" class="btn btn-danger">Delete</a></td>
<td><a href="teacherprofile.php?teacherprofile=<?php echo urlencode($row['id']);?>&&name=<?php echo urlencode($row['name']);?>" class="btn btn-default">
view<i class="fa fa-eye"></i></a>
</tr>
<?php
}
} else {
$list = "NO RECORD FOR TEACHERS YET!!!!!";	
echo '<p class="text-info">'.$list.'</p>';
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
<button class="btn btn-default" onclick="printContent('print1');">print<i class="fa fa-print"></i></button>
<a href="pdf_files/pdf_teachers_list.php?id=<?php echo urlencode(base64_encode($school_name));?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> pdf format</a>
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