<?php
session_start();
ob_start();
include("../../connect.php");

$sql = "SELECT administrator,admin_logo,logo,adminemail,datemade,id,schoolname,pricingplan,status,payment,email FROM users WHERE administrator = '".$_SESSION['username']."' AND schoolname='".$_SESSION['school']."' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$admin = $row['administrator'];
$logo = $row['logo'];
$status = $row['status'];
$datemade = $row['datemade'];
$payment = $row['payment'];
$admin_email = $row['adminemail'];
$school_name = $row['schoolname'];
$pricing_plan = $row['pricingplan'];
$id = $row['id'];
$skoolemail = $row['email'];
global $school_name;

$sql = "SELECT * FROM `results` WHERE schoolidentity = '$school_name' AND name = '".base64_decode($_GET['name'])."' AND admission_number ='".base64_decode($_GET['admin'])."'";
$query = mysqli_query($conn,$sql);
?>
<?php
require('../../fpdf17/fpdf.php');


$copyright  = 'POWERED BY SKOOLWEB';

class PDF extends FPDF
{
// Page header
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(45);
    // Title
    $this->Cell(100,10,''.ucwords(base64_decode($_GET['name'])).' RESULT',1,0,'C');
    // Line break
    $this->Ln(20);	
$this->Image('../../logo/'.base64_decode($_GET['pic']).'',80,40,50);
$this->ln(70);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Instanciation of inherited class
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$width_cell=array(20,50,40,40);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Student Name: '.base64_decode($_GET['name']).'',0,1);
$pdf->Cell(0,10,'Admission Number: '.base64_decode($_GET['admin']).'',0,1);
$pdf->Cell(0,10,'School Name:'.$school_name.'',0,1);
$pdf->ln(20);
$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true); // First header column 
$pdf->Cell($width_cell[1],10,'SUBJECT',1,0,'C',true); // Second header column
$pdf->Cell($width_cell[2],10,'EXAM SCORE',1,0,'C',true); // Third header column 
$pdf->Cell($width_cell[3],10,'GRADE',1,1,'C',true); // Fourth header column


//// header ends ///////

$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
$i = 1;

while ($row = mysqli_fetch_array($query)) {
$pdf->Cell($width_cell[0],10,$i++,1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['subjects'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['exam'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['grade'],1,1,'C',$fill);
$fill = !$fill; // to give alternate background fill  color to rows
}
$pdf->Cell(0,10,''.$copyright.'',0,1,'C');
$pdf->Image('../../img/l.png',10,10,10);
$pdf->Output();
?>
