<?php include_once("header.php"); ?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">RESULTS</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Results</li>
</ol>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="col-lg-12 col-sm-12 col-xs-12">
<div id="status" align="center">
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="white-box" id="print1">
<h2 class="text-info" style="text-align:center;"><?php echo ucwords($school_name);?></h2>
<?php
$sql = "SELECT * FROM studentadd WHERE name='".base64_decode($_GET['lists'])."' AND schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$piv = $row['picture'];
$admission_number = $row['admission_number'];
?>
<div style="text-align:center;">
<img src="../../logo/<?php echo $row['picture'];?>" class="img-circle" style="width:170px;"><br/><br/><br/>
</div>
<p><b class="text-info">STUDENT NAME:</b>  <?php echo ucwords($row['name']);?></p>
<p><b class="text-info">ADMISSION NUMBER:</b>  <?php echo ucwords($row['admission_number']);?></p>
<?php
$sql = "SELECT * FROM `results` WHERE name = '".$_GET['lists']."' AND admission_number = '$admission_number'";
$query2 = mysqli_query($conn,$sql);
$row2 = mysqli_fetch_assoc($query2);
?>
<p><b class="text-info">STUDENT POSITION:</b>  <?php echo $row2['student_pos'];?></p>
<p><b class="text-info">TOTAL NUMBER OF STUDENT IN CLASS:</b>  <?php echo $row2['nos_of_student'];?></p><br/><br/><br/>
<table class="table table-striped table-responsive">
<thead>
<tr>
<th>subjects</th>
<th>continuous assessment 1</th>
<th>continuous assessment 2</th>
<th>continuous assessment 3</th>
<th>midterm</th>
<th>Exam</th>
<th>cummulative score</th>
<th>Grade</th>
</tr>
</thead>
<tbody>
<?php
//these is used to get the the total count of rows 
$sql = "SELECT COUNT(id) FROM results WHERE name='".base64_decode($_GET['lists'])."' AND admission_number = '$admission_number'";
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
$sql = "SELECT * FROM results WHERE name='".base64_decode($_GET['lists'])."' AND admission_number = '$admission_number'";	
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
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $row['subjects'];?></td>
<td><?php echo $row['ca1'];?></td>
<td><?php echo $row['ca2'];?></td>
<td><?php echo $row['ca3'];?></td>
<td><?php echo $row['midterm'];?></td>
<td><?php echo $row['exam'];?></td>
<td><?php echo $row['cummulative'];?></td>
<td><?php echo $row['grade'];?></td>
</tr>
<?php
}
} else {
echo "<span style='color:blue;'>No Data uploaded yet</span>";	
}
?>
</tbody>
</table><br/>
<p><b class="text-info">TEACHER REMARK:</b>  <?php echo $row2['teacher_remark'];?></p><br/>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<button class="btn btn-default" onclick="javascript:printContent('print1');"><i class="fa fa-print fa-fw"></i>print</button>
<a href="resultpdf.php?name=<?php echo $_GET['lists'];?>&&admin=<?php echo base64_encode($admission_number);?>&&pic=<?php echo base64_encode($piv);?>" class="btn btn-danger"><i class="fa fa-file-pdf-o fa-fw"></i>pdf</a>
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
<!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>