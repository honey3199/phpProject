<?php
include('config.php');
$sql = "SELECT h.H_Name ,a.A_Name , h.Rent , U_Name FROM house h join user1 u join area a where h.User_Id = u.User_Id and h.A_Code = a.A_Code and u.Role_Id = 3 and h.IsActive = 1";

if(isset($_GET['id']))
{
	$u =$_GET['id'];
	$sql ="SELECT h.H_Name ,a.A_Name , h.Rent , U_Name FROM house h join user1 u join area a where h.User_Id = u.User_Id and h.A_Code = a.A_Code and u.Role_Id = 3 and h.IsActive = 1 and h.User_Id = ".$u."";
}

$database = new Database();
$result = $database->runQuery($sql);
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='dwellingdiscoverer' 
AND `TABLE_NAME`='user'
and `COLUMN_NAME` in ('USER_ID','USER_NAME')");
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage("L","A4");
$pdf->SetFont('Arial','B',12);

// Set header
 $pdf->Image('DD.jpg',20,5,20);
    // Move to the right
    $pdf->Cell(100);			
    // Title
    $pdf->Cell(80,10,'House Owner List',1,0,'C');
    // Line break
    $pdf->Ln(20);

		$pdf->Cell(48,12,"House Name",1);
		$pdf->Cell(48,12,"Area Name",1);
		$pdf->Cell(48,12,"Rent",1);
		$pdf->Cell(48,12,"User Name",1);
		
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