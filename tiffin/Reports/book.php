<?php
include('config.php');
$database = new Database();
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "SELECT U_Name,Package_Name,A_Name,SB_Date,SB_Status 
			FROM tiffin_service_booking b JOIN user1 u join area a JOIN tiffin_service_package t 
			WHERE a.A_Code=b.A_Code and b.User_Id=u.User_Id && b.TSPackage_Id=t.TSPackage_Id and b.IsActive=1 and t.User_Id='".$id."'";
}
$result = $database->runQuery($sql);
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='dwellingdiscoverer' 
AND `TABLE_NAME`='user'
and `COLUMN_NAME` in ('USER_ID','USER_NAME')");
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage("L","A4");
$pdf->SetFont('Arial','B',10);

// Set header
 $pdf->Image('DD.jpg',20,5,20);
    // Move to the right
    $pdf->Cell(90);			
    // Title
    $pdf->Cell(80,10,'Tiffin Service Booking List',1,0,'C');
    // Line break
    $pdf->Ln(20);

		$pdf->Cell(48,12,"User Name",1);
		$pdf->Cell(48,12,"Package Name",1);
		$pdf->Cell(48,12,"Area Name",1);
		$pdf->Cell(48,12,"Service Booking Date",1);
		$pdf->Cell(48,12,"Service Booking Status",1);

foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(48,12,$column,1);
}
$pdf->Output();

// Set footer
   $pdf->SetY(-15);
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Page number
    $pdf->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
?>