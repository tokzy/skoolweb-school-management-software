<?php
session_start();
ob_start();
include('db/connect.php');

if(isset($_GET['remove'])){
$sql2 = "SELECT * FROM `image_upload` WHERE id=".$_GET['remove']."";
$query2 = mysqli_query($conn,$sql2);
$result = mysqli_fetch_array($query2);
$sql = "DELETE FROM `image_upload` WHERE id=".$_GET['remove']."";
$query = mysqli_query($conn,$sql);
if($query){
unlink('images/<?php echo $result['images_name'];?>');
}

}else{

}









?>