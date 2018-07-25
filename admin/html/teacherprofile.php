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
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Teachers</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<h3>TEACHER FULL PROFILE INFORMATION</h3>
<?php
$sql = "SELECT * FROM teacheradd WHERE id = '".$_GET['teacherprofile']."' ";	
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){	
?>
<tr>
<b style='color:blue;'>teacher id:</b> <?php echo $row['id'];?><br/><br/>
<hr/>
<b style='color:blue;'>teacher profile picture:</b> <img src="../../logo/<?php echo $row['picture'];?>" height="50"><br/>
<hr/>
<b style='color:blue;'>teacher name:</b> <?php echo $row['name'];?><br/>
<hr/>
<b style='color:blue;'>teacher email:</b> <?php echo $row['email'];?><br/>
<hr/>
<b style='color:blue;'>teacher password:</b> <?php echo $row['password'];?><br/>
<hr/>
<b style='color:blue;'>teacher address:</b> <?php echo $row['address'];?><br/>
<hr/>
<b style='color:blue;'>teacher phone no:</b> <?php echo $row['phone_no'];?><br/>
<hr/>
<b style='color:blue;'>teacher gender:</b> <?php echo $row['gender'];?><br/>
<hr/>
<b style='color:blue;'>date added:</b> <?php 
$datemade =  $row['datemade'];
$date = strftime("%b,%d %Y",strtotime($datemade));
echo $date;
?>
<br/>
<hr/>
<?php
}
}
?>
<button class="btn btn-default" onclick="javascript:print();">print<i class="fa fa-print"></i></button>
<a href="pdf_files/teacher_pdf.php?id=<?php echo base64_encode(urlencode($_GET['teacherprofile']));?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> pdf format</a>
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