<?php
include('config.php');
$database = new Database();
$d = date("Y-m-d");
$result = $database->runQuery("select U_Name,Role_Name,Package_Name,A_name,ContectNo,Email
			from role r,area a,membership_package p,user1 u where u.Role_Id!=1 and u.Role_Id=r.Role_Id and u.A_Code=a.A_Code and u.MPackage_Id=p.MPackage_Id
			and u.IsActive=1 and u.End_Date <= '".$d."'");
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
    $pdf->Cell(100);			
    // Title
    $pdf->Cell(80,10,'User List',1,0,'C');
    // Line break
    $pdf->Ln(20);

		$pdf->Cell(48,12,"User Name",1);
		$pdf->Cell(48,12,"Role Name",1);
		$pdf->Cell(48,12,"Package Name",1);
		$pdf->Cell(48,12,"Area Name",1);
		$pdf->Cell(48,12,"Contact No.",1);
		$pdf->Cell(48,12,"Email Address",1);

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