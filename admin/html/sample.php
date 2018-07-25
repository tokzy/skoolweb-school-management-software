<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
?>
<?php
$sql = "SELECT administrator,logo,schoolname FROM users WHERE administrator = '".$_SESSION['username']."' AND schoolname = '".$_SESSION['school']."' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$admin = $row['administrator'];
$logo = $row['logo'];
$school_name = $row['schoolname'];

 $var = $_POST['search'];
  if(isset($_POST['search']) && !empty($_POST['search'])){  
echo '<b style="font-size:30px;text-align:center;">SEARCH RESULTS</b><br/>';

$studentcountsql = "SELECT COUNT(id) FROM studentadd WHERE name like '%$var%' AND schoolidentity = '$school_name'";
$studentcountquery = mysqli_query($conn,$studentcountsql);
$studentcountrow = mysqli_fetch_row($studentcountquery);
$studentcountrows = $studentcountrow[0];

$parentcountsql = "SELECT COUNT(id) FROM parentadd WHERE name like '%$var%' AND schoolidentity = '$school_name'";
$parentcountquery = mysqli_query($conn,$parentcountsql);
$parentcountrow = mysqli_fetch_row($parentcountquery);
$parentcountrows = $parentcountrow[0];

$teachercountsql = "SELECT COUNT(id) FROM teacheradd WHERE name like '%$var%' AND schoolidentity = '$school_name'";
$teachercountquery = mysqli_query($conn,$teachercountsql);
$teachercountrow = mysqli_fetch_row($teachercountquery);
$teachercountrows = $teachercountrow[0];
$totalcount = $studentcountrows + $parentcountrows + $teachercountrows;
echo '<b style="color:red;">'.$totalcount.' RESULTS FOUND</b>'; 

  
  $message = "";
  
$studentsql = "SELECT * FROM studentadd WHERE name LIKE '%$var%' AND schoolidentity = '$school_name'";
$studentquery = mysqli_query($conn,$studentsql);
if(mysqli_num_rows($studentquery) > 0){
	while($studentrow = mysqli_fetch_array($studentquery)){
   $studentname = $studentrow['name'];
   $studentid = $studentrow['id'];
   $studentpic = $studentrow['picture'];
   ?>
<p style="text-align:justify;font-size:20px;">
<img src="../../logo/<?php echo $studentpic;?>" style="border-radius:50%;height:50px;width:50px;"/>
<a href="sampleresults.php?studentid=<?php echo $studentid;?>"><?php echo $studentname.'<br/>';?></a></p>
<?php
}
}

$parentsql = "SELECT * FROM parentadd WHERE name LIKE '%$var%' AND schoolidentity = '$school_name'";
$parentquery = mysqli_query($conn,$parentsql);
if(mysqli_num_rows($parentquery) > 0){
	while($parentrow = mysqli_fetch_array($parentquery)){
   $parentname = $parentrow['name'];
   $parentid = $parentrow['id'];
   ?>
<p style="text-align:justify;font-size:20px;">
<img src="../../img/default.jpg" style="border-radius:50%;height:50px;width:50px;"/>
<a href="sampleresults.php?parentid=<?php echo $parentid;?>"><?php echo $parentname.'<br/>';?></a></p>
<?php
}
}

$teachersql = "SELECT * FROM teacheradd WHERE name LIKE '%$var%' AND schoolidentity = '$school_name'";
$teacherquery = mysqli_query($conn,$teachersql);
if(mysqli_num_rows($parentquery) > 0){
	while($teacherrow = mysqli_fetch_array($teacherquery)){
   $teachername = $teacherrow['name'];
   $teacherid = $teacherrow['id'];
   $teacherpic = $teacherrow['picture'];
   ?>
<p style="text-align:justify;font-size:20px;">
<img src="../../logo/<?php echo $teacherpic;?>" style="border-radius:50%;height:50px;width:50px;"/>
<a href="sampleresults.php?teacherid=<?php echo $teacherid;?>"><?php echo $teachername.'<br/>';?></a></p>
<?php
}
}

} else if(empty($_POST['search'])){
$message = "<b style='color:red;'>NO RESULT MATCH THESE DESCRIPTION!!!!</b>";
echo $message;	
}	 
 ?>