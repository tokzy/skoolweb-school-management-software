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
if(isset($_POST['edit'])){
$profession = trim(mysqli_real_escape_string($conn,$_POST['profession']));
$address = trim(mysqli_real_escape_string($conn,$_POST['address']));
$email = trim(mysqli_real_escape_string($conn,$_POST['email']));
$phone = preg_replace('#[^0-9]#','',$_POST['phone']);				

$sql = "UPDATE parentadd SET phone = '$phone',address = '$address',email = '$email',profession = '$profession' WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);		 
redirect_to("parents.php");
exit;
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
<h4 class="modal-title" id="myModalLabel">EDIT PARENT RECORDS</h4>
</div>
<div class="modal-body">
<?php
$sql = "SELECT * FROM parentadd WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>
<form method="post" action="">		 
<input type="text" placeholder="Residential Address" class="form-control" name="address"  value="<?php echo $row['address'];?>">          
<input type="email" placeholder="Email" class="form-control" name="email" value="<?php echo $row['email'];?>">
<input type="number" placeholder="Phone" class="form-control" name="phone" value="<?php echo $row['phone'];?>"required="">
<input type="text" placeholder="Profession" class="form-control" name="profession" value="<?php echo $row['profession'];?>">          
<button class="btn btn-default" name="edit">UPDATE<i class="fa fa-plus"></i></button>               
</form>
</div>
</div>
</div>
</div>
<!--MODAL ENDS-->
<!-- /row -->
<div class="row">
<div class="col-sm-12">
<div class="white-box">   
<div class="col-md-1 col-sm-4 col-xs-6 pull-right">
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
<th>Child/Childen</th>
<th>Options</th>                                            
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM parentadd WHERE id = '".$_GET['id']."'";	
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['phone'];?></td>
<td><?php echo $row['profession'];?></td>
<td><?php echo $row['child'];?></td>
<td><a class="btn btn-warning" data-toggle="modal" data-target="#myModal">Edit</a></td>
</tr>
<?php
}
}
?>
</tbody>
</table>
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
