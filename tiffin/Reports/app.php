<?php
include('config.php');
$database = new Database();
$result = $database->runQuery("SELECT H_Name,U_Name,App_Date,App_Time,Status FROM appointment a 
join house h JOIN user1 u where a.House_Id = h.House_Id and a.User_Id = u.User_Id and h.User_Id='".$id."' and a.IsActive=1");
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
    $pdf->Cell(80);			
    // Title
    $pdf->Cell(80,10,'Appointment List',1,0,'C');
    // Line break
    $pdf->Ln(20);

		$pdf->Cell(48,12,"House Name",1);
		$pdf->Cell(48,12,"User Name",1);
		$pdf->Cell(48,12,"Appointment Date",1);
		$pdf->Cell(48,12,"Appointment Time",1);
		$pdf->Cell(48,12,"Status",1);
		
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