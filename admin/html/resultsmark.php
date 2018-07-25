<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");
?>
<table class="table">
<thead>
<tr>
<th>#</th>
<th>picture</th>
<th>name</th>
<th>class</th>
<th>Options</th>                                            
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT administrator,logo,schoolname FROM users WHERE administrator = '".$_SESSION['username']."' AND schoolname = '".$_SESSION['school']."' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$admin = $row['administrator'];
$logo = $row['logo'];
$school_name = $row['schoolname'];

$class = $_POST['classes'];
if(isset($_POST['classes']) && !empty($_POST['classes'])){
$message = "";
$sql = "SELECT * FROM studentadd WHERE  schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0){
	$message = "";
while($row = mysqli_fetch_array($query)){
?>	
<tr>
<td><?php echo $row['id'];?></td>
<td><img src="../../logo/<?php echo $row['pics'];?>" height="50px" width="50px"></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['class'];?></td>
<td><a href="results_list.php?lists=<?php echo urlencode(base64_encode($row['name']));?>&& id=<?php echo urlencode(base64_encode($row['id']));?>" class="btn btn-warning">
View<i class="fa fa-eye"></a></td>
</tr>
<?php	
}	
}
}
?>
</tbody>
</table>