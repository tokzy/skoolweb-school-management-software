<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Results</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<?php 
if(isset($_GET['message'])){
?>
<script>
alert("settings updated successfully");
</script>
<?php    
}
?>
<ol class="breadcrumb">
<li><a href="#">Dashboard</a></li>
<li class="active">Results</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<script>
function results(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "resultsmark.php";
    var tm = document.getElementById("classes").value;
	var vars = "classes="+tm;
        hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                    var return_data = hr.responseText;
                        document.getElementById("attendance").innerHTML = return_data;
            }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("attendance").innerHTML = "processing...";
}
</script>
<div class="row">
<div class="col-md-12">
<div class="white-box">
    <a href="result_settings.php"><button class="btn btn-warning" style="float: right;"><i class="fa fa-cog"></i> Settings</button></a>
<div class="class">
<label>Choose Class: </label>   <select name="class" id="classes" style="width: 500px; padding: .5em; border-radius: 5px;">
<?php
//to get class from the classes in the database
$sql = "SELECT class FROM class WHERE schoolidentity = '$school_name' ORDER BY ID DESC";
$query = mysqli_query($conn, $sql);
$message3 = "";
if(mysqli_num_rows($query) > 0){
$message3 = "";
while($row = mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['class'];?>"><?php echo $row['class'];?></option>
<?php			
}
} else {
$message3 = "<p style='color:red;'>NO CLASS ADDED YET FROM THE CLASS SECTION</p>!!!";	
?>
<option style='color:red;' disabled><?php echo $message3;?></option>
<?php
}
?>                             
</select>
<button class="btn btn-default" id="view" onclick="results();">View</button>
</div>
<div class="table-responsive" id="attendance">
</div>
</div>
</div>
</div>
</div>
<?php include_once("footer.php"); ?>
<script>
$(document).ready(function() {
$(".table-responsive").hide();
$("#view").click(function() {
$(".table-responsive").fadeIn(1000); // HERE U CAN USE LOAD EVENT TO LOAD THE PHP PAGE
});
});
</script>