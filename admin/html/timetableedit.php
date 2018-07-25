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
</div>
<!-- /.col-lg-12 -->
</div>
<?php
if(isset($_POST['edit'])){
$subjects = trim(mysqli_real_escape_string($conn,$_POST['subjects']));
$days = trim(mysqli_real_escape_string($conn,$_POST['days']));
$hour =  preg_replace('#[^0-9]#','',$_POST['hour']);
$minute =  preg_replace('#[^0-9]#','',$_POST['minute']);
$class = trim(mysqli_real_escape_string($conn,$_POST['class']));
$meridean = trim(mysqli_real_escape_string($conn,$_POST['meridean']));
$ending_time_hour = preg_replace('#[^0-9]#','',$_POST['ending_time_hour']);
$ending_time_minute = preg_replace('#[^0-9]#','',$_POST['ending_time_minute']);
$ending_meridean = trim(mysqli_real_escape_string($conn,$_POST['ending_meridean']));


//---------------------------------------------------------------------------------------------------------------------------------->
//<------------querying the database<-----------------------------------------------------------------------------------------------------

$sql = "UPDATE timetable SET subjects = '$subjects',days = '$days',hours = '$hour',minutes = '$minute',
class = '$class', meridean = '$meridean',ending_time_hour = '$ending_time_hour',ending_time_minute = '$ending_time_minute',
ending_meridean = '$ending_meridean',status = 1 WHERE id = '".$_GET['id']."' ";
$query = mysqli_query($conn,$sql);
redirect_to("timetable.php?edit=".urlencode('your table have been updated successfully')."");
}
?>
<form method="post" action="">
<?php
$sql = "SELECT * FROM timetable WHERE id = '".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
$row2 = mysqli_fetch_array($query);
?>
<label>Subject</label>
<select class="form-control" name="subjects">
<option disabled selected>choose subject</option>
<option value="<?php echo $row2['subjects'];?>" selected><?php echo $row2['subjects'];?></option>
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
<option disabled>select class</option>
<option value="<?php echo $row2['class'];?>" selected><?php echo $row2['class'];?></option>
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
<option value="<?php echo $row2['days'];?>" selected><?php echo $row2['days'];?></option>
<option value="sunday">Sunday</option>
<option value="monday">Monday</option>
<option value="tuesday">Tuesday</option>
<option value="wednesday">Wednesday</option>
<option value="thursday">Thursday</option>                                    
<option value="friday">Friday</option>                                    
<option value="saturday">Saturday</option>                                                  
</select>
<label>Starting time</label>
<select class="form-control" name="hour">
<option disabled>Hour</option>
<option value="<?php echo $row2['hours'];?>" selected><?php echo $row2['hours'];?></option>
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
<option disabled>Minute</option>
<option value="<?php echo $row2['minutes'];?>" selected><?php echo $row2['minutes'];?></option>
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
<option value="<?php echo $row2['meridean'];?>" selected><?php echo $row2['meridean'];?></option>
<option value="am">am</option>
<option value="pm">pm</option>                                      
</select>
<label>Ending time</label>
<select class="form-control" name="ending_time_hour">
<option disabled>Hour</option>
<option value="<?php echo $row2['ending_time_hour'];?>" selected><?php echo $row2['ending_time_hour'];?></option>
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
<option disabled>Minute</option>
<option value="<?php echo $row2['ending_time_minute'];?>" selected><?php echo $row2['ending_time_minute'];?></option>
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
<option value="<?php echo $row2['ending_meridean'];?>" selected><?php echo $row2['ending_meridean'];?></option>
<option value="am">am</option>
<option value="pm">pm</option>                                      
</select>
<button class="btn btn-default" name="edit">EDIT<i class="fa fa-plus"></i></button>
</form>
<?php include_once("footer.php"); ?>
<?php
ob_end_flush();
?> 