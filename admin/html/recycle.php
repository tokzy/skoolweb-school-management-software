<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Recycle Bin</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Recycle Bin</li>
</ol>
</div>
  <img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
</div>
<!-- /row -->
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<div class="col-md-2 col-sm-4 col-xs-6 pull-right">
</div>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Fullname</th>
<th>Email</th>
<th>Phone</th>                                            
<th>Profession</th>
<th>Class</th>
<th>subject</th>
<th>deleted from</th>
<th>Options</th>                                            
</tr>
</thead>
<tbody>
  <?php
   //these is used to get the the total count of rows 
   $sql = "SELECT COUNT(id) FROM recyclebin WHERE schoolidentity = '$school_name' AND deleted_by = 'admin'";
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
$sql = "SELECT * FROM recyclebin WHERE schoolidentity = '$school_name' AND deleted_by = 'admin' ORDER BY id DESC $limit";	
$query = mysqli_query($conn, $sql);
//this shows the user what page they are on, and the total number of pages
$textline1 = "students(<b>$rows</b>)";
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

$message = "";
if(mysqli_num_rows($query) > 0){
$message = "";	
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['phone_no'];?></td>
<td><?php echo $row['profession'];?></td>
<td><?php echo $row['class'];?></td>
<td><?php echo $row['subject'];?></td>
<td style="color:red;"><?php echo $row['user'];?> section</td>
		 <script type="text/javascript">
function remove(id)
{
	if(confirm('are you sure you want to delete student ?'))
	{
		window.location='recycledelete.php?remove_id='+id;
	}
}
</script>
		 <script type="text/javascript">
function restore(id)
{
	if(confirm('are you sure you want to restore these record ?'))
	{
		window.location='recyclerestore.php?restore_id='+id;
	}
}
</script>
<td><a href="javascript:restore(<?php echo $row['id'];?>)" class="btn btn-warning">Restore</a></td>
<td><a href="javascript:remove(<?php echo urlencode($row['id']);?>)" class="btn btn-warning">empty from bin</a></td>
</tr>
<?php
}
} else {
$message = "recycle bin is empty!!!!";
echo '<p class="text-info" style="font-weight:bold;font-size:20px;">'.$message.'</p>';	
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
</div>        
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
