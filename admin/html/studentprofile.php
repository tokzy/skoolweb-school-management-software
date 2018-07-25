<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">STUDENTS</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?></a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Students</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<h3>STUDENT FULL PROFILE INFORMATION</h3>
<?php
$sql = "SELECT * FROM studentadd WHERE id = '".$_GET['profile']."' ";	
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){	
?>
<tr>
<b style='color:blue;'>student id:</b> <?php echo $row['id'];?><br/><br/>
<hr/>
<b style='color:blue;'>student profile picture:</b> <img src="../../logo/<?php echo $row['picture'];?>" height="50"><br/>
<hr/>
<b style='color:blue;'>student name:</b> <?php echo $row['name'];?><br/>
<hr/>
<b style='color:blue;'>student email:</b> <?php echo $row['email'];?><br/>
<hr/>
<b style='color:blue;'>student class:</b> <?php echo $row['class'];?><br/>
<hr/>
<b style='color:blue;'>student password:</b> <?php echo $row['password'];?><br/>
<hr/>
<b style='color:blue;'>student address:</b> <?php echo $row['address'];?><br/>
<hr/>
<?php
}
}
?>
<button class="btn btn-primary" onclick="javascript:print();"><i class="fa fa-print"></i> print</button>
<a href="pdf_files/pdf.php?id=<?php echo base64_encode(urlencode($_GET['profile']));?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> pdf format</a>
</div>
</div>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>
