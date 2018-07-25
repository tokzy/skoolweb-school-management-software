<?php include_once("header.php"); 
?>
<?php
if (logged_in()){
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">SCRATCH CARDS(VIEW)</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
</a>
<ol class="breadcrumb">
<li><a href="#">SkoolWeb</a></li>
<li class="active">Scratch Cards(View)</li>
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
<div class="white-box" id="print1">
<?php
$sql = "SELECT COUNT(id) FROM scratch_card WHERE schoolidentity = '$school_name'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
$rows = $row[0];
$page_rows = 10;
$last = ceil($rows/$page_rows);	 
if($last<1){
$last = 1;
}   
$pagenum = 1;
if(isset($_GET['pn'])) {
$pagenum = preg_replace('#[^0-9]#','',$_GET['pn']);
}
if ($pagenum < 1){
$pagenum = 1;
} else if($pagenum > $last) {
$pagenum = $last;
}
$limit = 'LIMIT ' .($pagenum-1) * $page_rows. ','.$page_rows;
$sql = "SELECT * FROM scratch_card WHERE schoolidentity = '$school_name' ORDER BY id DESC $limit";	
$query = mysqli_query($conn, $sql);
$textline1 = "students(<b>$rows</b>)";
$textline2 = "page<b> $pagenum</b> of <b>$last</b>";
$paginationCtrls = '';
if($last != 1){
if($pagenum > 1) {
$previous = $pagenum - 1;
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">previous</a> &nbsp;&nbsp;';
for($i = $pagenum-4; $i < $pagenum; $i++){
if($i > 0){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp ';
}
}
}
$paginationCtrls .= ''.$pagenum.' &nbsp; ';
for($i = $pagenum+1; $i <= $last; $i++) {
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;';
if($i >= $pagenum+4){
break;			
}
}
if($pagenum != $last){
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
} 	
}
$status = "Free";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
if(($row['status']) != $status) {
?>
<div class="card" id="card_print">
<img src="../../logo/<?php echo $logo;?>" height="80" width="80" ><span style="color: #fff; font-size: 1.5em; margin-left: .3em;"><?php echo $school_name;?></span><br><br>
<h3 style="color: #fff;">Login Pin: <?php echo $row['pin'];?></h3>
<h3 style="color: #ddd;">Result Checking Card</h3>
<p style="color: #ddd;"><?php echo $skoolemail;?></p>
<h3 class="text-right" style="color: #fff;"><?php echo $row['price'];?></h3>
<p class="text-right" style="color: #ddd;">powered by skoolweb | skoolweb.com.ng</p>
</div>  
<?php	
} else {
?>
<div class="card" id="card_print">
<img src="../../logo/<?php echo $logo;?>" height="80" width="80" ><span style="color: #fff; font-size: 1.5em; margin-left: .3em;"><?php echo $school_name;?></span><br><br>
<h3 style="color: #fff;">Login Pin: <?php echo $row['pin'];?></h3>
<h3 style="color: #ddd;">Result Checking Card</h3>
<p style="color: #ddd;"><?php echo $skoolemail;?></p>
<h3 class="text-right" style="color: #fff;"><img src="img/free.png" height="100" style="margin-top: -3em;" /></h3>
<p class="text-right" style="color: #ddd;">powered by skoolweb | skoolweb.com.ng</p>
</div>   
<?php	
}
}	
}
?>
</div>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<a class="btn btn-danger" href="javascript:printContent('print1');"><i class="fa fa-print"></i>print</a>
<div id="textline">
<p style="font-family:times new roman;"><?php echo $textline2; ?></p>
<div id ="pagination_controls">
<?php echo $paginationCtrls ;?>
</div> 
</div>
</div>
</body>
</html>      
<!-- /.container-fluid -->
<?php include_once("footer.php"); ?>
<script type="text/javascript">
html2canvas(".card", {
onrendered: function(canvas) {
document.body.appendChild(canvas);
}
});
</script>
<?php
} else {
redirect_to("../../index.php"); 
} 
ob_end_flush();
?>