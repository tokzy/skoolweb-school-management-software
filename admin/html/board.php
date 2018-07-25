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
.notice li {
-webkit-transform:rotate(-6deg);
-o-transform:rotate(-6deg);
-moz-transform:rotate(-6deg);
}
.notice li:nth-child(even){
-o-transform:rotate(4deg);
-webkit-transform:rotate(4deg);
-moz-transform:rotate(4deg);
position:relative;
top:5px;
background:#cfc;
}
.notice li:nth-child(3n){
-o-transform:rotate(-3deg);
-webkit-transform:rotate(-3deg);
-moz-transform:rotate(-3deg);
position:relative;
top:-5px;
background:#ccf;
}
.notice li:nth-child(5n){
-o-transform:rotate(5deg);
-webkit-transform:rotate(5deg);
-moz-transform:rotate(5deg);
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
<h4 class="modal-title" id="myModalLabel">Add a Notice</h4>
</div>
<div class="modal-body">
<form method="post" action="">
<input type="text" class="form-control" placeholder="Title" name="title">
<textarea class="form-control" placeholder="Your Notice" rows="10" name="about"></textarea>       
<button class="btn btn-default" name="add">Add<i class="fa fa-check"></i></button>
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
<h4 class="page-title">Notice Board <a class="btn btn-default" data-toggle="modal" data-target="#myModal">Add a Notice <i class="fa fa-square"></i></a></h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?><br/>
<?php
$message = "";
if(isset($_POST['add'])){
// sanitizing inputs
$title = trim(mysqli_real_escape_string($conn,$_POST['title']));
$about = trim(mysqli_real_escape_string($conn,$_POST['about']));

$sql = "INSERT INTO board(title,post,datemade,schoolidentity)
VALUES('$title','$about',now(),'$school_name')";
$query = mysqli_query($conn,$sql);
if($query){
$sql_select = "SELECT name,email FROM studentadd where schoolidentity = '$school_name' 
UNION ALL 
SELECT name,email from parentadd WHERE schoolidentity = '$school_name' 
UNION ALL 
SELECT name,email FROM teacheradd WHERE schoolidentity='$school_name'";
$query = mysqli_query($conn,$sql_select);
while($resu = mysqli_fetch_array($query)){
$em = $resu['email'];
$usere = $resu['name'];

$to = $em;
$subject = $title;
$message  = "<!DOCTYPE html>
                <html>
				<body>
<div style='border:2px solid green;background:#e5ffe5;'>
<h4 style='color:green;font-size:25px;text-align:center;'><span>".$school_name."</h4>
<img src='' />
<hr/>
<p style='text-align:center;'>				
hello $usere, Your email has been authenticated and you can now start earning on Naija Cabals
Forum, We are delighted to have you in our Forum, looking forward to seeing your quality posts,
for further enquiries or any feedbacks you can contact us at info@naijacabals.com, thank you.
</p>
</div>
</body>
</html>";
$header = "From:$school_name\r\n";
$header .= "Cc:$school_name\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail ($to,$subject,$message,$header);

if( $retval == true ){
}else{
echo "message not sent";	
}	
}
$message = "notice posted successfully";
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
<div class="row">
<div class="col-md-12">

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
$sql = "SELECT COUNT(id) FROM board WHERE schoolidentity = '$school_name'";
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
$sql = "SELECT * FROM board WHERE schoolidentity = '$school_name' ORDER BY ID DESC $limit";
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
<li><a href="#" data-toggle="modal" data-target="#<?php echo $row['id'];?>"><h2><?php echo $row['title'];?></h2><p><?php echo $row['post'];?></p></a><br>
<span style="color: black; font-size: .8em;"><?php
$datemade = $row['datemade'];
$date = strftime("%b,%d %Y",strtotime($datemade));
echo $date;
?></span></li>
<!--MODAL2 BEGINS-->
<div id="<?php echo $row['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"><?php echo $row['title'];?></h4>
</div>
<div class="modal-body">
<p><?php echo $row['post'];?></p>
</div>
</div>
</div>
</div>
<!--MODAL ENDS-->
<?php	
}
} else{ 
$message = "NOTICE BOARD IS EMPTY, NOTHING YET!!!!";
echo '<p style="color:#65B9DF;font-size:20px;">'.$message.'</p>';
}
?>
</ul>		 
</div>
<div id="textline">
<p style="font-family:times new roman;"><?php echo $textline2; ?></p>
<div id ="pagination_controls">
<?php echo $paginationCtrls ;?>
</div> 
</div>	
</div>
</div>
</div>
<?php include_once("footer.php"); ?>
