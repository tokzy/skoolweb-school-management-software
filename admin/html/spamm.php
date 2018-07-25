<?php include_once("header.php"); ?>
<?php
$sql = "UPDATE message SET status = 1 WHERE status = 0 AND recipient = '$admin' ";	
$result = mysqli_query($conn, $sql);
?>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Emails<a class="btn btn-default" data-toggle="modal" data-target="#myModal">New <i class="fa fa-envelope"></i></a>
</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<ol class="breadcrumb">
<li><a href="#">Dashboard</a></li>
<li class="active">Emails</li>
</ol>
</div>
</div>
<div class="row">
<!-- .col -->
<div class="col-md-12 col-lg-8 col-sm-12">
<div class="white-box">
<ul id="emaillists">
<li><a href="email.php"><i class="fa fa-envelope fa-fw"></i> inbox</a></li>
<li><a href="outbox.php"><i class="fa fa-inbox fa-fw"></i>outbox</a></li>
<li><a href="spamm.php"><i class="fa fa-bug fa-fw"></i>spam</a></li>
<li><a href="sent.php"><i class="fa fa-send fa-fw"></i>sent</a></li>
<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o fa-fw"></i>compose</a></li>
</ul>
</div>
</div>
</div>
<!--MODAL BEGINS-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Send Email</h4>
</div>
<div class="modal-body">
<form method="POST" action="" >
<?php
if(isset($_POST['send'])){
$recipient = trim(mysqli_real_escape_string($conn,$_POST['recipient']));
$message = trim(mysqli_real_escape_string($conn,$_POST['message']));
$subjects = trim(mysqli_real_escape_string($conn,$_POST['subjects']));

$to = $recipient;
$subject = $subjects;

$message = "<b>".$message."</b>";
$message .= "<h1><img src='../../logo/<?php echo $logo;?><?php echo $school_name;?>'</h1>";

$header = "From:admin \r\n";
$header .= "Cc:afgh@somedomain.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail ($to,$subject,$message,$header);

if( $retval == true ) {
$sql = "INSERT INTO email(subject,picture,sender,recipient,message,datemade,schoolidentity)
VALUES('$subjects','$logo','$admin','$recipient','$message',now(),'$school_name')";
$query = mysqli_query($conn,$sql);		
?>
<script>
alert("sent");
</script>
<?php
} else {
echo "Message could not be sent...";    
}
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
$student_email = $row['email'];	
?>
<option value="<?php echo $student_email;?>">student: <?php echo $student_name;?>(<?php echo $row['email'];?>)</option>
<?php
}	
} else{
$message = "no student added yet to the school database";
?>
<option><?php echo "<p style='color:red;'>".$message."</p>"; ?></option>
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
$teacher_email = $row['email'];
?>
<option value="<?php echo $teacher_email;?>">teacher: <?php echo $teacher_name;?>(<?php echo $row['email'];?>)</option>
<?php
}	
} else{
$message = "no teacher added yet to the school database";
?>
<option><?php echo "<p style='color:red;'>".$message."</p>"; ?></option>
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
$parent_email = $row['email'];	
?>
<option value="<?php echo $parent_email;?>">parent: <?php echo $parent_name;?>(<?php echo $row['email'];?>)</option>
<?php
}	
} else{
$message = "no parent added yet to the school database";
?>
<option><?php echo "<p style='color:red;'>".$message."</p>"; ?></option>
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
$admin_email = $row['adminemail'];
?>
<option value="<?php echo $admin_email;?>">admin: <?php echo $admin_name;?>(<?php echo $row['adminemail'];?>)</option>
<?php
}	
} else{
$message = "no admin added yet to the school database";
?>
<option><?php echo "<p style='color:red;'>".$message."</p>"; ?></option>
<?php	
} 
?>
<!-- HERE WE GET THE USERS I>E ADMIN, TEACHERS, PARENTS(CHILDNAME) FROM THE DATABASE -->
</select>
<label for="subject">subject:</label>
<input type="text" class="form-control" name="subjects" placeholder="enter email subjects" required>  
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
<div class="white-box" id="bv">
<h3 class="box-title">SPAM</h3>
<?php
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM email WHERE schoolidentity = '$school_name' AND recipient = '$admin_email' AND spam = 1";
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
$sql = "SELECT * FROM email WHERE schoolidentity = '$school_name' AND recipient = '$admin_email' AND spam = 1 ORDER BY id DESC $limit";	
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
<a href="javascript:remove(<?php echo $row['id'];?>)" class="btn-rounded btn btn-default btn-outline"><i class="fa fa-trash"></i> Delete</a>
<a href="javascript:remove2(<?php echo $row['id'];?>)" class="btn-rounded btn btn-default btn-outline"><i class="fa fa-trash"></i> unmark</a>
</div>
</div>
</div>
<script type="text/javascript">
function remove2(id)
{
if(confirm('are you sure you want to unmark email ?'))
{
window.location='unspam.php?remove_id='+id;
}
}
</script>
<?php
}
} else {
$alert = "NO MESSAGE YET!!!!!";	
echo '<p style="color:red;">'.$alert.'</p>';
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
window.location='emaildelete.php?remove_id='+id;
}
}
</script>
<?php include_once("footer.php"); 
ob_end_flush();
?>