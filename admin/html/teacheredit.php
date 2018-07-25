<?php include_once("header.php"); ?>
<script>
$(document).ready(function(e){
$('#loading5').hide();	
$("#uploadimage5").on('submit',(function(e) {
e.preventDefault();
$("#message5").empty(); 
$('#loading5').show();
$.ajax({
url: "teachereditsc.php?id=<?php echo $_GET['id'];?>",   	// Url to which the request is send
type: "POST",      				// Type of request to be send, called as method
data:  new FormData(this), 		// Data sent to server, a set of key/value pairs representing form fields and values 
contentType: false,       		// The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
cache: false,					// To unable request pages to be cached
processData:false,  			// To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
success: function(data)  		// A function to be called if request succeeds
{
$('#loading5').hide();
$("#message5").html(data);			
}	        
});
}));

// Function to preview image
$(function() {
$("#file-input5").change(function() {
$("#message5").empty();         // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];	
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing5').attr('src','../../logo/default.jpg');
$("#message5").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();	
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}		
});
});
function imageIsLoaded(e) { 
$("#file-input5").css("color","green");
$('#image_preview5').css("display", "block");
$('#previewing5').attr('src', e.target.result);
$('#previewing5').attr('width', '250px');
$('#previewing5').attr('height', '230px');
};
});
</script>
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
<!--MODAL BEGINS-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">EDIT TEACHER RECORD</h4>
</div>
<div class="modal-body">
<form method="post" id="uploadimage5" action="" enctype="multipart/form-data">
<h4 id='loading5'><img src="../../logo/loading_circle.gif"/>&nbsp;&nbsp;Loading...</h4>
<div id="message5"> 			
</div>
<?php
$sql = "SELECT * FROM teacheradd WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>
<div class="image-upload">
<label for="file-input5">
<img src="../../logo/<?php echo $row['picture'];?>" class="thumb-lg img-circle" alt="img" title="The student photo" id="previewing5" />
</label>
<input id="file-input5" type="file" name="picture1"/>
</div> 
<input type="text" placeholder="Residential Address" class="form-control" name="address" value="<?php echo $row['address'];?>">          
<input type="email" placeholder="Email" class="form-control" name="email" value="<?php echo $row['email'];?>">
<input type="number" placeholder="Phone" class="form-control" name="phone" value="<?php echo $row['phone_no'];?>">
<input type="text" placeholder="Date of Birth" class="form-control" name="DOB" value="<?php echo $row['date_of_birth'];?>">          
<select class="form-control" name="gender"> 
<option disabled>Select Gender</option>
<option value="<?php echo $row['gender'];?>" selected><?php echo $row['gender'];?></option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>            
<button class="btn btn-default" name="edit">UPDATE<i class="fa fa-plus"></i></button>     
</div>
</div>
</form>
</div>
</div>
<!--MODAL ENDS-->
<!-- /row -->
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
<th>picture</th>
<th>Fullname</th>
<th>Email</th>
<th>Phone</th>                                            
<th>address</th>
<th>Options</th>                                            
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM teacheradd WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><img src="../../logo/<?php echo $row['picture'];?>" height="50"></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['phone_no'];?></td>
<td><?php echo $row['address'];?></td>
<td><a  class="btn btn-warning" data-toggle="modal" data-target="#myModal">Edit</a></td>
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
