<?php include_once("header.php"); ?>
<style>
.notice li {
background: #fff3cc;
border: 1px solid #dfbc6a;
width: auto;
height: auto;
margin: 10px;
padding: 8px;
font-size: 18px;
text-align: center;
box-shadow: 2px 2px 2px #999;
list-style-type: none;
display: inline-block;
/* Firefox */
-moz-box-shadow:5px 5px 7px rgba(33,33,33,1);
/* Safari+Chrome */
-webkit-box-shadow: 5px 5px 7px rgba(33,33,33,.7);
/* Opera */
box-shadow: 5px 5px 7px rgba(33,33,33,.7);
-moz-transition:-moz-transform .15s linear;
-o-transition:-o-transform .15s linear;
-webkit-transition:-webkit-transform .15s linear;
}

.notice li:nth-child(even){
position:relative;
top:5px;
background:#cfc;
}
.notice li:nth-child(3n){
position:relative;
top:-5px;
background:#ccf;
}
.notice li:nth-child(5n){
position:relative;
top:-10px;
}

.notice li:hover, ul li:focus{
-moz-box-shadow:10px 10px 7px rgba(0,0,0,.7);
-webkit-box-shadow: 10px 10px 7px rgba(0,0,0,.7);
box-shadow:10px 10px 7px rgba(0,0,0,.7);
-webkit-transform: scale(1.25);
-moz-transform: scale(1.25);
-o-transform: scale(1.25);
position:relative;
z-index:5;
}


</style>
<!--MODAL BEGINS-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Upload to the library</h4>
</div>
<div class="modal-body">
<form method="post" action="" enctype="multipart/form-data">     
<input type="text" class="form-control" placeholder="Title" name="title">
<textarea class="form-control" placeholder="About the document" rows="10" name="about"></textarea>    
<input type="file" class="form-control" name="the_file">   
<button class="btn btn-default" name="upload">Upload<i class="fa fa-check"></i></button>
</form>    
</div>
</div>
</div>
</div>
<!--MODAL ENDS-->
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Library <a class="btn btn-default" data-toggle="modal" data-target="#myModal">Upload<i class="fa fa-upload"></i></a></h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<?php
if(isset($_POST['upload'])){
// sanitizing inputs
$title = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['title']));
$about = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['about']));

///for image uploads
$name = $_FILES['the_file']['name'];
$type = explode('.',$name);
$type = end($type);
$size = $_FILES['the_file']['size'];
$random_name = rand();
$tmp = $_FILES['the_file']['tmp_name'];
$message = "";

if($type!='pdf' && $type!='PDF' && $type!='docx' && $type!='epub' && $type!='EPUB' && $type!='txt' && $type!='zip' && $type!='ZIP'){
$message = "document format not supported, you can only upload 'pdf','docx','epub','zip'and 'txt' file formats";
?>
<p style="color:red;">*<?php echo $message;?></p>
<?php
} else {
move_uploaded_file($tmp,"../../library/".$random_name.'.'.$type);
$sql = "INSERT INTO library(title,about,book,datemade,schoolidentity)
VALUES('$title','$about','$random_name.$type',now(),'$school_name')";
$query = mysqli_query($conn,$sql);
$message = "file successfully uploaded";
?>
<script>
alert(`<?=$message;?>`);
</script>
<?php
}
}
?>
<ol class="breadcrumb">
<li><a href="#">Dashboard</a></li>
<li class="active">Lbrary</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="white-box">
<ul class="notice">
<?php
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM library WHERE schoolidentity = '$school_name'";
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
$sql = "SELECT * FROM library WHERE schoolidentity = '$school_name' ORDER BY ID DESC $limit";
$query = mysqli_query($conn, $sql);
//this shows the user what page they are on, and the total number of pages
$textline1 = "books(<b>$rows</b>)";
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

$message = "";
if(mysqli_num_rows($query)> 0){
$message = "";
while($row = mysqli_fetch_array($query)){
?>						 
<li><a href="#" data-toggle="modal" data-target="#<?php echo $row['id'];?>"><h2><?php echo $row['title'];?></h2><br/>
<p><?php echo nl2br(htmlspecialchars_decode(substr($row['about'],0,50))).'..,click to download';?></p></a><br>
<span style="color: black; font-size: .8em;">
<?php
$datemade = $row['datemade'];
$date = strftime("%b,%d %Y",strtotime($datemade));
echo $date;
?>
</span></li>
<!--MODAL2 BEGINS-->
<div id="<?php echo $row['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"><?php echo $row['title'];?></h4>
</div>
<div class="modal-body">
<p><?php echo nl2br(htmlspecialchars_decode($row['about']));?></p>
<p><a href="../../library/<?php echo $row['book'];?>" download = "../../library/<?php echo $row['book'];?>" class="btn btn-blue">Download file <i class="fa fa-download"></i></a>
</div>
</div>
</div>
</div>
<!--MODAL ENDS-->
<?php
}	
} else {
$message = "LIBRARY IS EMPTY, NOTHING YET!!!!, CLICK ON UPLOAD TO START ADDING FILES";
echo '<p class="text-info" style="font-weight:bold;">'.$message.'</p>';
}
?>
</ul>
<div id="textline">
<p style="font-family:times new roman;"><?php echo $textline2; ?></p>
<div id ="pagination_controls">
<?php echo $paginationCtrls ;?>
</div> 
</div>		
</div>
</div>
</div>
</div>
<?php include_once("footer.php"); 
ob_end_flush();
?>