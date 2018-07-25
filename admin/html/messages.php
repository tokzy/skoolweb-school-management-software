<?php include_once("header.php"); ?>
<?php
$sql = "UPDATE message SET status = 1 WHERE status = 0 AND recipient = '$admin' ";	
$result = mysqli_query($conn, $sql);
?>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Messages <a class="btn btn-default" data-toggle="modal" data-target="#myModal">New <i class="fa fa-envelope"></i></a>
</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<ol class="breadcrumb">
<li><a href="#">Dashboard</a></li>
<li class="active">Messages</li>
</ol>
</div>
</div>
<!--MODAL BEGINS-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Send Message</h4>
</div>
<div class="modal-body">
<form method="POST" action="" >
<?php
if(isset($_POST['send'])){
$recipient = trim(mysqli_real_escape_string($conn,$_POST['recipient']));
$message = trim(mysqli_real_escape_string($conn,$_POST['message']));

$sql = "INSERT INTO message(picture,sender,recipient,message,datemade,schoolidentity)
VALUES('$logo','$admin','$recipient','$message',now(),'$school_name')";
$query = mysqli_query($conn,$sql);		
redirect_to("index.php?id=".urlencode('your message has been sent successfully')."");
}
?>				
<select class="form-control" name="recipient"> <!-- HERE WE GET THE USERS I>E ADMIN, TEACHERS, PARENTS(CHILDNAME) FROM THE DATABASE -->
<option disabled selected>To</option>
<!--------------to get students---------------------------------->
<?php
$sql = "SELECT * FROM studentadd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$message = "";
if(mysqli_num_rows($query) > 0){
$message = "";
while($row = mysqli_fetch_array($query)){
$student_name = $row['name'];	
?>
<option value="<?php echo $student_name;?>">student: <?php echo $student_name;?></option>
<?php
}	
} else{
$message = "no student added yet to the school database";
?>
<option><?php echo "<p style='color:blue;'>".$message."</p>"; ?></option>
<?php	
} 
?>
<!------------------ to get teachers------------------------------->
<?php
$sql = "SELECT * FROM teacheradd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$message = "";
if(mysqli_num_rows($query) > 0){
$message = "";
while($row = mysqli_fetch_array($query)){
$teacher_name = $row['name'];	
?>
<option value="<?php echo $teacher_name;?>">teacher: <?php echo $teacher_name;?></option>
<?php
}	
} else{
$message = "no teacher added yet to the school database";
?>
<option><?php echo "<p style='color:blue;'>".$message."</p>"; ?></option>
<?php	
} 
?>
<!------------------ to get parents------------------------------->
<?php
$sql = "SELECT * FROM parentadd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$message = "";
if(mysqli_num_rows($query) > 0){
$message = "";
while($row = mysqli_fetch_array($query)){
$parent_name = $row['name'];	
?>
<option value="<?php echo $parent_name;?>">parent: <?php echo $parent_name;?></option>
<?php
}	
} else{
$message = "no parent added yet to the school database";
?>
<option><?php echo "<p style='color:blue;'>".$message."</p>"; ?></option>
<?php	
} 
?>
<!------------------ to get admin------------------------------->
<?php
$sql = "SELECT * FROM users WHERE schoolname = '$school_name'";
$query = mysqli_query($conn,$sql);
$message = "";
if(mysqli_num_rows($query) > 0){
$message = "";
while($row = mysqli_fetch_array($query)){
$admin_name = $row['administrator'];	
?>
<option value="<?php echo $admin_name;?>">admin: <?php echo $admin_name;?></option>
<?php
}	
} else{
$message = "no admin added yet to the school database";
?>
<option><?php echo "<p style='color:blue;'>".$message."</p>"; ?></option>
<?php	
} 
?>
 <!-- HERE WE GET THE USERS I>E ADMIN, TEACHERS, PARENTS(CHILDNAME) FROM THE DATABASE -->
</select>  
<textarea class="form-control" placeholder="Your Message" rows="10" name="message"></textarea>       
<button class="btn btn-default" name="send">Send<i class="fa fa-check"></i></button>
</form>
</div>
</div>
</div>
</div>
<!--MODAL ENDS-->
<!-- ============================================================== -->
<!-- chat-listing & recent comments -->
<!-- ============================================================== -->
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<!-- .col -->
<div class="col-md-12 col-lg-8 col-sm-12">
<div class="white-box">
<h3 class="box-title">Recent Messages</h3>
<?php
   //these is used to get the the total count of rows 
   $sql = "SELECT COUNT(id) FROM message WHERE schoolidentity = '$school_name' AND recipient = '$admin'";
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
$sql = "SELECT * FROM message WHERE schoolidentity = '$school_name' AND recipient = '$admin' ORDER BY id DESC";	
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
$alert = "";
if(mysqli_num_rows($query) > 0){
$alert = "";
while($row = mysqli_fetch_array($query)){
?>

<div class="comment-center p-t-10">
<div class="comment-body">
<div class="user-img">
<img src="../../logo/<?php echo $row['picture'];?>" alt="NO IMAGE FROM USER" class="img-circle">
</div>
<div class="mail-contnet">
<h5><?php echo $row['sender'];?></h5><span class="time"><?php 
$datemade = $row['datemade'];
$date = strftime("%b,%d %Y",strtotime($datemade));
echo $date;
?></span>
<br/><span class="mail-desc"><?php echo $row['message'];?></span> 
<a href="messagereply.php?sender=<?php echo urlencode($row['sender']);?> && id=<?php echo urlencode($row['id']);?>" class="btn btn btn-rounded btn-default btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Reply</a>
<a href="javascript:remove(<?php echo $row['id'];?>)" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Delete</a>
</div>
</div>
</div>
<?php
}
} else {
$alert = "NO MESSAGE YET!!!!!";	
echo '<p style="color:#3588AF;">'.$alert.'</p>';
}
?>
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
<script type="text/javascript">
function remove(id)
{
	if(confirm('are you sure you want to delete message ?'))
	{
		window.location='messagedelete.php?remove_id='+id;
	}
}
</script>
<?php include_once("footer.php"); 
ob_end_flush();
?>