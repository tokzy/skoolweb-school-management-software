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
<th>Fullname</th>
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

$date = $_POST['date'];
$class = $_POST['classes'];
if(isset($_POST['classes']) && !empty($_POST['classes']) && !empty($_POST['date'])){
$message = "";
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM attendance WHERE datemade = '$date' AND schoolidentity = '$school_name' AND class = '$class'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
//here we have the total row count
$rows = $row[0];
//these is the number of results we want displayed per page
$page_rows = 20;
//this tells us the page number of our last page
$last = ceil($rows/$page_rows);
//these makes sure $last cannot be less than 1	 
if($last<1){
$last = 1;
}   
//Establish the $pagenum variable
$pagenum = 1;
//Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])) {
$pagenum = preg_replace('#[^0-9]#','',$_GET['pn']);
}
//these makes sure the page no is not below 1, or more than $last page 
if ($pagenum < 1){
$pagenum = 1;
} else if($pagenum > $last) {
$pagenum = $last;
}
//these sets the range of rows for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum-1) * $page_rows. ','.$page_rows;
//grabbing just one page worth of rows
$sql = "SELECT * FROM attendance WHERE datemade = '$date' AND schoolidentity = '$school_name' AND class = '$class' $limit";
$query = mysqli_query($conn, $sql);
//this shows the user what page they are on, and the total number of pages
$textline1 = "students(<b>$rows</b>)";
$textline2 = "page<b> $pagenum</b> of <b>$last</b>";
//Establish the $paginationCtrls variable
$paginationCtrls = '';
// if there is more than one page worth of results
if($last != 1){
if($pagenum > 1) {
$previous = $pagenum - 1;
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">previous</a> &nbsp;&nbsp;';
//render clickable number link that should appear on the left of the target page number
for($i = $pagenum-4; $i < $pagenum; $i++){
if($i > 0){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp ';
}

}
}

// render the target page number but without it being the link 
$paginationCtrls .= ''.$pagenum.' &nbsp; ';
// render clickable number links that should appear on the right
for($i = $pagenum+1; $i <= $last; $i++) {
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;';
if($i >= $pagenum+4){
break;			
}
}
//this does as the same above but only shows the "next" button once they are not on the last page
if($pagenum != $last){
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
} 	

}
$counter = 1;
if(mysqli_num_rows($query) > 0){
	$message = "";
	$status = 'absent';
while($row = mysqli_fetch_array($query)){
?>	
<tr>
<td><?php echo $counter++;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['class'];?></td>
<?php
if($row['attendance'] == $status){
	?>
<td><button class="btn btn-danger" disabled><i class="fa fa-times"></i><?php echo $row['attendance'];?></button></td>
<?php
} else {
?>
<td><button class="btn btn-primary" disabled><i class="fa fa-check"></i><?php echo $row['attendance'];?></button></td>
<?php	
}
?>
</tr>
<?php	
}	
}
}
?>
</tbody>
</table>
<button class="btn btn-default" onclick="printContent('attendance');"><i class="fa fa-print"></i>print</button>
<div id="textline">
<p style="font-family:times new roman;"><?php echo $textline2; ?></p>
<div id ="pagination_controls">
<?php echo $paginationCtrls ;?>
</div> 
</div>