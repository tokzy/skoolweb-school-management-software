<?php include_once("header.php"); ?>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Attendance</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="#">Dashboard</a></li>
<li class="active">Attendance</li>
</ol>
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<script>
function attendance_mark(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "attendance_mark.php";
    var tm = document.getElementById("classes").value;
    var dm = document.getElementById("date").value;
	var vars = "classes="+tm+"&date="+dm;
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
<div class="class">
<label>Choose Class: </label>   
<select name="classes" id="classes" style="width: 300px; padding: .5em; border-radius: 5px;  margin-right: 1em;">
<option disabled selected>select class</option>
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
<label>Date:</label><input type="date" name="date"  id="date" placeholder="DD/MM/YY e.g 20/05/2017" style="width: 300px; padding: .5em; border-radius: 5px; margin-right: 1em;">
<button class="btn btn-default" id="view" onclick="attendance_mark();">View</button>
</div>
<div class="table-responsive" id="attendance">
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
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