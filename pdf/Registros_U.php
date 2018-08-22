<?php

include 'plantilla.php';
require 'conexion.php';

$query= "SELECT * FROM registro";
$resultado = $mysqli->query($query);

$pdf = new PDF('L');
$pdf->AddPage();

$pdf->SetFillColor(255,165,0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'ID', 1,0,'C',1);
$pdf->Cell(35, 6, 'NOMBRES', 1,0,'C',1);
$pdf->Cell(40, 6, 'APELLIDOS', 1,0,'C',1);
$pdf->Cell(22, 6, 'TIPO_DOC', 1,0,'C',1);
$pdf->Cell(26, 6, 'NUM_DOC', 1,0,'C',1);
$pdf->Cell(25, 6, 'TEL_FIJ', 1,0,'C',1);
$pdf->Cell(25, 6, 'CELULAR', 1,0,'C',1);
$pdf->Cell(55, 6, 'CORREO', 1,0,'C',1);
$pdf->Cell(37, 6, 'DIRECCION', 1,1,'C',1);

$pdf->SetFont('Arial', '', 10);



while($row = $resultado->fetch_assoc())
{

$pdf->Cell(10, 5, $row['ID_CLI'], 1,0,'L',1);
$pdf->Cell(35, 5, $row['NOMBRES'], 1,0,'L',1);
$pdf->Cell(40, 5, $row['APELLIDOS'], 1,0,'L',1);
$pdf->Cell(22, 5, $row['TIPO_DOC'], 1,0,'C',1);
$pdf->Cell(26, 5, $row['NUM_DOC'], 1,0,'L',1);
$pdf->Cell(25, 5, $row['TEL_FIJ'], 1,0,'L',1);
$pdf->Cell(25, 5, $row['CELULAR'], 1,0,'L',1);
$pdf->Cell(55, 5, $row['CORREO'], 1,0,'L',1);
$pdf->Cell(37, 5, $row['DIRECCION'], 1,1,'L',1);
}
$pdf->Output();

?>