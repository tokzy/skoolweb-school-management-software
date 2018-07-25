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
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Parents</li>
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
<h3>PARENT FULL PROFILE INFORMATION</h3>
<?php
$get_id = $_GET['id'];
$id = base64_decode($get_id);
$sql = "SELECT * FROM parentadd WHERE id = '$id' ";	
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) > 0){
$row = mysqli_fetch_array($query);
?>
<tr>
<b style='color:blue;'>parent id:</b> <?php echo $row['id'];?><br/><br/>
<hr/>
<b style='color:blue;'>parent name:</b> <?php echo $row['name'];?><br/>
<hr/>
<b style='color:blue;'>parent email:</b> <?php echo $row['email'];?><br/>
<hr/>
<b style='color:blue;'>child:</b> <?php echo $row['child'];?><br/>
<hr/>
<b style='color:blue;'>parent password:</b> <?php echo $row['password'];?><br/>
<hr/>
<b style='color:blue;'>parent address:</b> <?php echo $row['address'];?><br/>
<hr/>
<b style='color:blue;'>parent phone:</b> <?php echo $row['phone'];?><br/>
<hr/>
<b style='color:blue;'>parent profession:</b> <?php echo $row['profession'];?><br/>
<hr/>
<?php
}
?>
<button class="btn btn-primary" onclick="javascript:print();"><i class="fa fa-print"></i> print</button>
<a href="pdf_files/parent_pdf.php?id=<?php echo urlencode($_GET['id']);?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> pdf format</a>
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
