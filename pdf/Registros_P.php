<?php

include 'plantilla.php';
require 'conexion.php';

$query= "SELECT * FROM product";
$resultado = $mysqli->query($query);

$pdf = new PDF('L');
$pdf->AddPage();

$pdf->SetFillColor(255,165,0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'ID', 1,0,'C',1);
$pdf->Cell(35, 6, 'NOMBRE', 1,0,'C',1);
$pdf->Cell(40, 6, 'PRECIO', 1,1,'C',1);

$pdf->SetFont('Arial', '', 10);



while($row = $resultado->fetch_assoc())
{

$pdf->Cell(10, 5, $row['id'], 1,0,'L',1);
$pdf->Cell(35, 5, $row['name'], 1,0,'L',1);
$pdf->Cell(40, 5, $row['price'], 1,1,'L',1);

}
$pdf->Output();

?>