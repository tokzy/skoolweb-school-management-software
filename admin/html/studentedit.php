<?php include_once("header.php"); ?>
<script>
$(document).ready(function(e){
$('#loading3').hide();	
$("#uploadimage3").on('submit',(function(e) {
e.preventDefault();
$("#message3").empty(); 
$('#loading3').show();
$.ajax({
url: "studenteditsc.php?id=<?php echo $_GET['id'];?>",   	// Url to which the request is send
type: "POST",      				// Type of request to be send, called as method
data:  new FormData(this), 		// Data sent to server, a set of key/value pairs representing form fields and values 
contentType: false,       		// The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
cache: false,					// To unable request pages to be cached
processData:false,  			// To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
success: function(data)  		// A function to be called if request succeeds
{
$('#loading3').hide();
$("#message3").html(data);			
}	        
});
}));

// Function to preview image
$(function() {
$("#file-input3").change(function() {
$("#message3").empty();         // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];	
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing3').attr('src','../../logo/default.jpg');
$("#message3").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
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
$("#file-input3").css("color","green");
$('#image_preview3').css("display", "block");
$('#previewing3').attr('src', e.target.result);
$('#previewing3').attr('width', '250px');
$('#previewing3').attr('height', '230px');
};
});
</script>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">STUDENTS</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Students</li>
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
<h4 class="modal-title" id="myModalLabel">EDIT STUDENT RECORD</h4>
</div>
<div class="modal-body">
<form method="post" id="uploadimage3" action="" enctype="multipart/form-data">
<h4 id='loading3'><img src="../../logo/loading_circle.gif"/>&nbsp;&nbsp;Loading...</h4>
<div id="message3"> 			
</div>
<?php
$sql = "SELECT * FROM studentadd WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
$rowew = mysqli_fetch_array($query);
?>
<div class="image-upload">
<label for="file-input3">
<div id="image_preview3">
<img src="../../logo/<?php echo $rowew['picture'];?>" class="thumb-lg img-circle" alt="img" title="The student photo" id='previewing3' />
</div>
</label>
<input id="file-input3" type="file" name="photo" accept='image/*' />
</div> 
<input type="text" placeholder="Admission Number" class="form-control" name="admissionno" value="<?php echo $rowew['admission_number'];?>" required="">             
<input type="text" placeholder="Residential Address" class="form-control" name="address" value="<?php echo $rowew['address'];?>">          
<input type="email" placeholder="Email" class="form-control" name="email" value="<?php echo $rowew['email'];?>">
<select class="form-control" name="class" > <!-- HERE WE GET THE CLASSES FROM THE DATABASE ENTERRED BY THE ADMIN -->
<option disabled>Choose the class</option>
<option value ="<?php echo $rowew['class'];?>" selected><?php echo $rowew['class'];?></option>
<?php
// getting the classes from database
$sql = "SELECT class FROM class WHERE schoolidentity = '$school_name' ORDER BY ID DESC";
$query = mysqli_query($conn,$sql);
$info = "";
if(mysqli_num_rows($query) > 0){
$info = "";
while($row = mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['class'];?>"><?php echo $row['class'];?></option>
<?php		
}	
} else {
$info = "oops!! no record yet added from the class section";
?>
<option style='color:red;' disabled><?php echo $info;?></option>
<?php
}
?>
</select>
<select class="form-control" name="gender"> 
<option disabled>Select Gender</option>							
<option value="<?php echo $rowew['gender'];?>"selected><?php echo $rowew['gender'];?></option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>   
<label>Date of Birth</label>
<input type="date" placeholder="Date of Birth" class="form-control" name="DOB" value="<?php echo $rowew['date_of_birth'];?>">         
<button class="btn btn-default" name="edit">UPDATE<i class="fa fa-plus"></i></button>         
</div>
</form>
</div>
</div>
</div>
<!--MODAL ENDS-->

<!-- /row -->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<div class="col-md-3 col-sm-4 col-xs-6 pull-right">
</div>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Photo</th>
<th>Fullname</th>
<th>Email</th>
<th>Class</th>
<th>Options</th>                                            
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM studentadd WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><img src="../../logo/<?php echo $row['picture'];?>" height="50"></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['class'];?></td>
<td><a data-toggle="modal" data-target="#myModal" class="btn btn-warning">Edit</a></td>
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