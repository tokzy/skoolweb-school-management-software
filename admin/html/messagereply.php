<?php include_once("header.php"); ?>
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
$message = trim(mysqli_real_escape_string($conn,$_POST['message']));

$sql = "INSERT INTO message(picture,sender,recipient,message,datemade,schoolidentity)
VALUES('$logo','$admin','".$_GET['sender']."','$message',now(),'$school_name')";
$query = mysqli_query($conn,$sql);		
redirect_to("index.php?id=".urlencode('your message has been sent successfully')."");
}
?>				
<textarea class="form-control" placeholder="Your Message" rows="10" name="message"></textarea>       
<button class="btn btn-default" name="send">reply<i class="fa fa-check"></i></button>
</form>
</div>
</div>
</div>
</div>
<!--MODAL ENDS-->
<!-- ============================================================== -->
<!-- chat-listing & recent comments -->
<!-- ============================================================== -->
<div class="row">
<!-- .col -->
<div class="col-md-12 col-lg-8 col-sm-12">
<div class="white-box">
<h3 class="box-title">Recent Messages</h3>
<?php
$sql = "SELECT * FROM message WHERE id='".$_GET['id']."'";	
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) > 0){
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
<a data-toggle="modal" data-target="#myModal" class="btn btn btn-rounded btn-default btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Reply</a>
</div>
</div>
</div>
<?php
}
}
?>
</div>	
</div>
</div>
</div>
<?php include_once("footer.php"); 
ob_end_flush();
?>