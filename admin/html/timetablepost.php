<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");
?>
<table class="table">
<tbody>
<?php

$sql = "SELECT administrator,logo,schoolname FROM users WHERE administrator = '".$_SESSION['username']."' AND schoolname='".$_SESSION['school']."' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$admin = $row['administrator'];
$logo = $row['logo'];
$school_name = $row['schoolname'];

$class = trim(mysqli_real_escape_string($conn,$_POST['classes']));
if(isset($class) && !empty($class)){
$sql = "SELECT * FROM timetable WHERE class = '$class' AND schoolidentity = '$school_name' ORDER BY days ASC";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0 ){
while($row = mysqli_fetch_array($query)){
	$subjects = $row['subjects'];
	$days   = $row['days'];
	$hour = $row['hours'];
	$minute = $row['minutes'];
	$meridean = $row['meridean'];
	$ending_time_hour = $row['ending_time_hour'];
	$ending_time_minute = $row['ending_time_minute'];
    $ending_time_meridean = $row['ending_meridean'];
?>
<tr>
<td><?php echo $days;?></td>
<td  style="background: #eee; max-width: 100px;">
<li class="dropdown">
<a id="drop4" role="button" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
<?php echo $subjects;?>
(<?php echo $hour;?>:<?php echo $minute;?> <?php echo $meridean;?>-<?php echo $ending_time_hour;?>:<?php echo $ending_time_minute;?> <?php echo $ending_time_meridean;?>)
<b class="caret"></b></a>
<ul id="menu1" class="dropdown-menu" aria-labelledby="drop4">
<li><a href="timetableedit.php?id=<?php echo $row['id'];?>">Edit</a></li> <!-- IF EDITED E SHOULD TELL THE STUDENTS THAT THERE'S AN ADJUSTMENT IN YOUR TIMETABLE-->
<li><a href="javascript:remove(<?php echo $row['id'];?>)">Delete</a></li>
</ul>
</li>
</td>
</tr>
<?php	
}
}		
}
?>
</tbody>
</table>