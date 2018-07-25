<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Timetable</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Timetable</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<!--MODAL BEGINS-->

<!--MODAL ENDS-->
<!-- /row -->
<?php
if(isset($_GET['edit'])){
echo '<b style="color:red;font-size:25px;">'.$_GET['edit'].'<i class="fa fa-check-square-o"></i></b>';	
} else{
echo "";	
}
?>
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<ul id="myTab1" class="nav nav-tabs">
<li class="active"><a href="#home1" data-toggle="tab">Manage</a></li>
<li><a href="#profile1" data-toggle="tab">Add Timetable</a></li>
</ul>
<div id="myTabContent1" class="tab-content">
<div class="tab-pane fade in active" id="home1">
<div class="class">
<script>
function timetable_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "timetablepost.php";
    var tm = document.getElementById("classes").value;
	var vars = "classes="+tm;
        hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                    var return_data = hr.responseText;
                        document.getElementById("timetable").innerHTML = return_data;
            }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("timetable").innerHTML = "processing...";
}
</script>
<label>Choose Class: </label>
<select id="classes" style="width: 500px; padding: .5em; border-radius: 5px;">
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
<button class="btn btn-primary" id="view" onclick="timetable_post();">View</button>
</div>
<div class="table-responsive" id ="timetable">
<!----timetable will be outputed here with ajax --->
</div>
</div>
<div class="tab-pane fade" id="profile1">
<form method="post" action="">
<?php
if(isset($_POST['add'])){
$subjects = trim(mysqli_real_escape_string($conn,$_POST['subjects']));
$days = trim(mysqli_real_escape_string($conn,$_POST['days']));
$hour =  preg_replace('#[^0-9]#','',$_POST['hour']);
$minute =  preg_replace('#[^0-9]#','',$_POST['minute']);
$class = trim(mysqli_real_escape_string($conn,$_POST['class']));
$meridean = trim(mysqli_real_escape_string($conn,$_POST['meridean']));
$ending_time_hour = preg_replace('#[^0-9]#','',$_POST['ending_time_hour']);
$ending_time_minute = preg_replace('#[^0-9]#','',$_POST['ending_time_minute']);
$ending_meridean = trim(mysqli_real_escape_string($conn,$_POST['ending_meridean']));

$sql = "SELECT * FROM timetable where schoolidentity = '$school_name' AND class = '$class' AND days = '$days'
AND subjects = '$subjects' AND meridean = '$meridean' AND hours = '$hour' AND minutes = '$minute' AND ending_time_minute = '$ending_time_minute'
AND ending_time_hour = '$ending_time_hour' AND ending_meridean = '$ending_meridean'";
$query = mysqli_query($conn,$sql);
$rowe = mysqli_fetch_row($query);

if($rowe!=0){
	?>
	<script>
alert("record already exists");
</script>	
<?php	
//---------------------------------------------------------------------------------------------------------------------------------->
//<------------querying the database<-----------------------------------------------------------------------------------------------------
} else {
$sql = "INSERT INTO timetable(subjects,days,hours,minutes,class,meridean,ending_time_hour,ending_time_minute,ending_meridean,datemade,schoolidentity)
VALUES('$subjects','$days','$hour','$minute','$class','$meridean','$ending_time_hour','$ending_time_minute','$ending_meridean',now(),'$school_name')";
$query = mysqli_query($conn,$sql);
$info = "timetable successfully created";	
?>
<script>
alert(`<?=$info?>`);
</script>
<?php
}
}
?>
<label>Subject</label>
<select class="form-control" name="subjects">
<option disabled selected>choose subject</option>
<?php
//to get subject from the subjects in the database
$sql = "SELECT subject FROM subjectadd WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn, $sql);
$message = "";
if(mysqli_num_rows($query) > 0){
$message = "";
while($row = mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['subject'];?>"><?php echo $row['subject'];?></option>
<?php			
}
} else {
$message = "<p style='color:red;'>NO SUBJECTS ADDED YET FROM THE SUBJECT SECTION</p>!!!";	
?>
<option value="<?php echo $message;?>"><?php echo $message;?></option>
<?php
}
?>            
</select>
<label>Class</label>
<select class="form-control" name="class">
<option disabled selected>select class</option>
<?php
//to get class from the classes in the database
$sql = "SELECT class FROM class WHERE schoolidentity = '$school_name' ORDER BY ID DESC";
$query = mysqli_query($conn, $sql);
$message2 = "";
if(mysqli_num_rows($query) > 0){
$message2 = "";
while($row = mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['class'];?>"><?php echo $row['class'];?></option>
<?php			
}
} else {
$message2 = "<p style='color:red;'>NO CLASS ADDED YET FROM THE CLASS SECTION</p>!!!";	
?>
<option value="<?php echo $message2;?>"><?php echo $message2;?></option>
<?php
}
?>                        
</select>

<label>Day</label>
<select class="form-control" name="days">
<option value="sunday">Sunday</option>
<option value="monday" selected>Monday</option>
<option value="tuesday">Tuesday</option>
<option value="wednesday">Wednesday</option>
<option value="thursday">Thursday</option>                                    
<option value="friday">Friday</option>                                    
<option value="saturday">Saturday</option>                                                  
</select>
<label>Starting time</label>
<select class="form-control" name="hour">
<option disabled selected>Hour</option>
<option value="0">0</option>            
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>                                    
<option value="5">5</option>                                    
<option value="6">6</option>                                             
<option value="7">7</option>                                             
<option value="8">8</option>                                             
<option value="9">9</option>                                             
<option value="10">10</option>                                             
<option value="11">11</option>                                             
<option value="12">12</option>                                             
</select>
<select class="form-control" name="minute">
<option disabled selected>Minute</option>
<option value="0">0</option>            
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>                                    
<option value="25">25</option>                                    
<option value="30">30</option>                                             
<option value="35">35</option>                                             
<option value="40">40</option>                                             
<option value="45">45</option>                                             
<option value="50">50</option>                                             
<option value="55">55</option>                                             
<option value="60">60</option>                                             
</select>
<select class="form-control" name="meridean">
<option value="am">am</option>
<option value="pm">pm</option>                                      
</select>
<label>Ending time</label>
<select class="form-control" name="ending_time_hour">
<option disabled selected>Hour</option>
<option value="0">0</option>            
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>                                    
<option value="5">5</option>                                    
<option value="6">6</option>                                             
<option value="7">7</option>                                             
<option value="8">8</option>                                             
<option value="9">9</option>                                             
<option value="10">10</option>                                             
<option value="11">11</option>                                             
<option value="12">12</option>                                             
</select>
<select class="form-control" name="ending_time_minute">
<option disabled selected>Minute</option>
<option value="0">0</option>            
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>                                    
<option value="25">25</option>                                    
<option value="30">30</option>                                             
<option value="35">35</option>                                             
<option value="40">40</option>                                             
<option value="45">45</option>                                             
<option value="50">50</option>                                             
<option value="55">55</option>                                             
<option value="60">60</option>                                             
</select>
<select class="form-control" name="ending_meridean">
<option value="am">am</option>
<option value="pm">pm</option>                                      
</select>
<button class="btn btn-default" name="add">Add<i class="fa fa-plus"></i></buton>
</form>
</div>
</div>


</div>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->

<?php include_once("footer.php"); ?>

<script>
$(document).ready(function() {
$(".table-responsive").hide();
$("#view").click(function() {
$(".table-responsive").fadeIn(1000); // HERE U CAN USE LOAD EVENT TO LOAD THE PHP PAGE
});
});
</script>
<?php
ob_end_flush();
?> 