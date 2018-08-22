<?php

require 'fpdf/fpdf.php';

class PDF extends FPDF
{

function Header(){

	$this->Image('NeRt.png', 10, 5, 40);
	$this->SetFont('Arial', 'B', 15);
	$this->Cell(70);
	$this->Cell(120, 10, 'Reporte de registros', 0,0,'C');

	$this->Ln(20);
}

function Footer(){

	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->Cell(0,10, 'Pagina ',$this->PageNo().'/{nb}', 0,0,'C' );

}


}

?>