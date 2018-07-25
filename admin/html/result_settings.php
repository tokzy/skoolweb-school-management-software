<?php include_once("header.php"); ?>
<style type="text/css">
ul li  {
display: inline-block;
margin-right: 2em;
}

ul li:hover {
cursor: pointer;
}

.class .active {
border: 4px solid #4aaee7;
}
</style>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">Results</h4> </div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<img src="../../logo/<?php echo $logo;?>" alt="user-img" width="36" class="img-circle"> <?php echo $school_name;?>
<ol class="breadcrumb">
<li><a href="#">Dashboard</a></li>
<li class="active">Results</li>
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
<button class="btn btn-warning" style="float: right;"  data-toggle="modal" data-target="#myModal"><i class="fa fa-cog"></i> Contact US for Custom Templates</button>
<div class="class">
<h4 id="choose">Choose your template:</h4>
<?php
if(isset($_GET['tempres2'])){
?>
<script type="text/javascript">
$(document).ready(function() {
$('#select1').hide();
$('#choose').hide();
alert("template2 selected");
});  
</script>
<?php 
}else{

}
if(isset($_GET['tempres1'])){
?>
<script type="text/javascript">
$(document).ready(function() {
$('#select2').hide();
$('#choose').hide();
alert("template1 selected");
});  
</script>
<?php 
}else{
}
?>
<ul>
<li><img src="img/bag.jpg" width="250" id="select1" data-toggle="tooltip" title="Midterm | No 3rd CA" data-placement="bottom" onclick='selecttemplate2();' ></li>
<li><img src="img/bag.jpg" width="250" data-toggle="tooltip" title="3rd CA | No Midterm" data-placement="bottom" id="select2" onclick='selecttemplate();'></li>
<script type="text/javascript">
function selecttemplate(){
window.location = "templateselect.php?templateselector=template2"; 
} 
function selecttemplate2(){
window.location = "templateselect.php?templateselector=template1"; 
} 
</script>
</ul>
<br>
<br>
<p>Next Term begins on?</p>
<input type="text" id="term" class="form-control">
<p>Position Type:</p>
<select class="form-control" id="position_type">
<option value="disabled">Choose your option</option>
<option value="words">Words: e.g SATISFACTORY</option>
<option value="numbers">Numbers: e.g 1st</option>
</select>
<div class="down" style="display: none;">
<br>
SATISFACTORY RANGE: <input type="text" id="satisfactory_range" class="form-control">
<br>
UNSATISFACTORY RANGE: <input type="text" id="unsatisfactory_range" class="form-control">
</div>
<?php
if(isset($_GET['tempres1'])){
?>
<button type="button" class="btn btn-primary" name="submitting" onclick='formsubmit();'>Submit</button>
<?php
}elseif(isset($_GET['tempres2'])){
?>
<button type="button" class="btn btn-primary" name="submitting" onclick='formsubmit2();'>Submit</button>
<?php
}else{
?>
<button type="button" class="btn btn-primary" name="submitting" onclick="formsubmiterror();">Submit</button>
<?php
}
?>
<script type="text/javascript">
 function formsubmit(){ 
 var term = document.getElementById('term').value;
 var position_type = document.getElementById('position_type').value;
 var satisfactory_range = document.getElementById('satisfactory_range').value;
 var unsatisfactory_range = document.getElementById('unsatisfactory_range').value;
  
 window.location = 'templatesubmit.php?temps=template1'+'&term='+term+'&position_type='+position_type+'&satisfactory_range='+satisfactory_range+'&unsatisfactory_range='+unsatisfactory_range; 
 }
  function formsubmit2(){ 
 var term = document.getElementById('term').value;
 var position_type = document.getElementById('position_type').value;
 var satisfactory_range = document.getElementById('satisfactory_range').value;
 var unsatisfactory_range = document.getElementById('unsatisfactory_range').value;
  
 window.location = 'templatesubmit.php?temps=template2'+'&term='+term+'&position_type='+position_type+'&satisfactory_range='+satisfactory_range+'&unsatisfactory_range='+unsatisfactory_range; 
 }
 function formsubmiterror(){ 
 alert("please select a template");
 }
</script>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL HERE -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Contact US</h4>
</div>
<div class="modal-body">

To: <input type="text" name="to" placeholder="Admin" disabled="" class="form-control">
<br>
Your Sample: <input type="file" name="" class="form-control">
<br>
Your Message:
<textarea class="form-control"></textarea>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Send</button>
</div>

</div>
</div>
</div>
<!-- MODAL ENDS -->
<?php include_once("footer.php"); ?>
<script>
$(document).ready(function() {
$('select').on('change', function() {
if (this.value == "words") {
$(".down").slideDown();
} else {
$(".down").hide();
}
});
$(".table-responsive").hide();
$("#view").click(function() {
$(".table-responsive").fadeIn(1000); // HERE U CAN USE LOAD EVENT TO LOAD THE PHP PAGE
});
});
</script>