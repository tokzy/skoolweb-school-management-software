<?php include_once("header.php"); 

if (logged_in()){
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Financial Tracking</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?><br/>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Financial Tracking</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<ul id="myTab3" class="nav nav-tabs">
<li><a href="#home3" data-toggle="tab">Manage</a></li>
<li><a href="#profile2" data-toggle="tab">Paid</a></li>
<li><a href="#profile3" data-toggle="tab">Unpaid</a></li>
</ul>
<div id="myTabContent3" class="tab-content active">
<div class="tab-pane fade in active" id="home3">
<input id='searchInput' type='text' placeholder='Enter Students fullname' class="form-control" />
<div id="search_results"></div>
</div>
<div class="tab-pane fade in" id="profile2">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Photo</th>
<th>Fullname</th>
<th>Email</th>
<th>Class</th>                            
</tr>
</thead>
<tbody>
<?php
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM studentadd WHERE payment_status = 'paid' AND class = '".$_SESSION['class1']."' AND schoolidentity = '$school_name' AND payment_session = '".$_SESSION['session1']."'";  
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
$sql = "SELECT * FROM studentadd WHERE payment_status = 'paid' AND class = '".$_SESSION['class1']."' AND schoolidentity = '$school_name' AND payment_session = '".$_SESSION['session1']."' ORDER BY id DESC $limit";	
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

if(Mysqli_num_rows($query) > 0 ){
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><img src="../../logo/<?php echo $row['picture'];?>" height="50"></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['class'];?></td>
</tr>
<?php	
}	
}
?>
</tbody>
<div id="textline">
<p style="font-family:times new roman;"><?php echo $textline2; ?></p>
<div id ="pagination_controls">
<?php echo $paginationCtrls ;?>
</div> 
</div>
</table>
</div>
</div>
<div class="tab-pane fade in" id="profile3">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Photo</th>
<th>Fullname</th>
<th>Email</th>`
<th>Class</th>                            
</tr>
</thead>
<tbody>
<?php
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM studentadd WHERE payment_status is NULL AND class = '".$_SESSION['class1']."' AND schoolidentity = '$school_name' AND payment_session is NULL";  
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
$sql = "SELECT * FROM studentadd WHERE payment_status is NULL AND class = '".$_SESSION['class1']."' AND schoolidentity = '$school_name' AND payment_session is NULL ORDER BY id DESC $limit";
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

if(Mysqli_num_rows($query) > 0 ){
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><img src="../../logo/<?php echo $row['picture'];?>" height="50"></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['class'];?></td>
</tr>
</tbody>
<?php
}
}
?>
<div id="textline">
<p style="font-family:times new roman;"><?php echo $textline2; ?></p>
<div id ="pagination_controls">
<?php echo $paginationCtrls ;?>
</div> 
</div>
</table>
</div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>
<script type="text/javascript" src="js/search.js"></script>
<?php
} else {
redirect_to("../../index.php");	
}	
ob_end_flush();
?>