<?php

require 'fpdf/fpdf.php';

class PDF extends FPDF
{

function Header(){

	$this->Image('LOGO.jpg', 15, 20, 45);
	$this->SetFont('Arial', '', 10);
	$this->Cell(10);
	$this->Cell(237, 5, 'Duver R. Sport', 0,1,'C');
	$this->Cell(253, 5, 'Patio Bonito', 0,1,'C');
	$this->Cell(254, 5, 'Bogota D.C  ', 0,0,'C');

	$this->SetFont('Arial', 'B', 20);
	$this->Cell(10);
	$this->Cell(254, 5, 'FACTURA', 0,0,'R');



	$this->Ln(20);
}

function Footer(){

	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->Cell(0,10, 'Pagina ',$this->PageNo().'/{nb}', 0,0,'C' );

}


}

?>