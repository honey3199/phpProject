<?php
include('config.php');
$database = new Database();
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}
$result = $database->runQuery("SELECT U_Name,H_Name,HB_Date,HB_Status FROM house_booking h JOIN user1 u JOIN house p 
			WHERE h.User_Id=u.User_Id and h.House_Id=p.House_Id and h.IsActive=1 and p.User_Id='".$id."'");
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
    $pdf->Cell(80,10,'House Booking List',1,0,'C');
    // Line break
    $pdf->Ln(20);

		$pdf->Cell(48,12,"User Name",1);
		$pdf->Cell(48,12,"House Name",1);
		$pdf->Cell(48,12,"House Booking Date",1);
		$pdf->Cell(48,12,"House Booking Status",1);

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