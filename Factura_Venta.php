<?php
class Venta_Presencial{


public function PDF(){
if ($_POST["generar_factura"] == "true")
{
$fecha_factura = $_POST["fecha_factura"];
$Nombre_vendedor = $_POST["Nombre_vendedor"];


//Recibir los datos de la empresa
$nombre_tienda = $_POST["nombre_tienda"];
$direccion_tienda = $_POST["direccion_tienda"];
$poblacion_tienda = $_POST["poblacion_tienda"];
$provincia_tienda = $_POST["provincia_tienda"];
$telefono_tienda = $_POST["telefono_tienda"];

//Recibir los datos del cliente
$nombre_cliente = $_POST["nombre_cliente"];
$apellidos_cliente = $_POST["apellidos_cliente"];
$direccion_cliente = $_POST["direccion_cliente"];
$identificacion_cliente = $_POST["identificacion_cliente"];

//Datos de los productos

$nombre_producto = $_POST["nombre_producto"];
$precio_producto = $_POST["precio_producto"];
$cantidad_producto = $_POST["cantidad_producto"];


//variable que guarda el nombre del archivo PDF
$archivo="factura.pdf";

//Llamada al script fpdf
require('fpdf/fpdf.php');


$archivo_de_salida=$archivo;

$pdf=new FPDF();  //crea el objeto
$pdf->AddPage();  //añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.


//logo de la tienda
$pdf->Image('LOGO.jpg' , 10 ,7, 35 , 25,'JPG');


// Encabezado de la factura
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190, 10, "FACTURA", 0, 2, "C");
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(190,5,"Fecha: $fecha_factura", 0, "C", false);
$pdf->Ln(2);

// Datos de la tienda
$pdf->SetFont('Arial','B',12);
$top_datos=45;
$pdf->SetXY(40, $top_datos);
$pdf->Cell(190, 10, "Datos de la tienda:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(190, //posición X
5, //posición Y
$nombre_tienda."\n".
"Direccion: ".$direccion_tienda."\n".
"Barrio: ".$poblacion_tienda."\n".
"Ciudad: ".$provincia_tienda."\n".
"Telefono: ".$telefono_tienda."\n".
"Vendedor: ".$Nombre_vendedor,
 0, // bordes 0 = no | 1 = si
 "J", // texto justificado 
 false);


// Datos del cliente
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(125, $top_datos);
$pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(
190, //posición X
5, //posicion Y
"Nombre: ".$nombre_cliente."\n".
"Apellidos: ".$apellidos_cliente."\n".
"Direccion: ".$direccion_cliente."\n".
"Identificacion: ".$identificacion_cliente, 
0, // bordes 0 = no | 1 = si
"J", // texto justificado
false);

$pdf->Ln(2);


$top_productos = 110;
    $pdf->SetXY(45, $top_productos);
    $pdf->Cell(40, 5, 'UNIDAD', 0, 1, 'C');
    $pdf->SetXY(80, $top_productos);
    $pdf->Cell(40, 5, 'PRODUCTOS', 0, 1, 'C');
    $pdf->SetXY(115, $top_productos);
    $pdf->Cell(40, 5, 'PRECIO UNIDAD', 0, 1, 'C');

    $y = 115;


    $pdf->SetFont('Arial','',8);
       
    $pdf->SetXY(45, $y);
    $pdf->Cell(40, 5, $cantidad_producto, 0, 1, 'C');
    $pdf->SetXY(80, $y);
    $pdf->Cell(40, 5, $nombre_producto, 0, 1, 'C');
    $pdf->SetXY(115, $y);
    $pdf->Cell(40, 5, $precio_producto." $", 0, 1, 'C');

    $multi_precio = ($precio_producto * $cantidad_producto);

   $pdf->Ln(10);
   $pdf->SetFont('Arial','B',10);
   $pdf->Cell(190, 5, "TOTAL: ".$multi_precio.".000 $", 0, 1, "C");



$pdf->Output();//cierra el objeto pdf
 
}


	} 
public function __construct(){
	$this->conexion=new mysqli("localhost","root", "", "nertsport");
}

public function registrarse(){
    
$this->fecha=$_POST['fecha_factura'];
$this->nombre_cliente=$_POST['nombre_cliente'];
$this->apellidos_cliente=$_POST['apellidos_cliente'];
$this->direccion_cliente=$_POST['direccion_cliente'];
$this->barrio_cliente=$_POST['poblacion_cliente'];
$this->ciudad_cliente=$_POST['provincia_cliente'];
$this->identificacion_cliente=$_POST['identificacion_cliente'];
$this->nombreproducto=$_POST['nombre_producto'];
$this->precio_producto=$_POST['precio_producto'];
$this->cantidad=$_POST['cantidad_producto'];
$this->nombre_vendedor=$_POST['Nombre_vendedor'];


$query= "INSERT INTO `detalle_venta`(`ID_Venta`, `Fecha`, `Nombre_vendedor`, `Nombre_cliente`, `Apellidos_cliente`, `Direccion_cliente`, `Barrio_cleinte`, `Ciudad_cliente`, `Identificacion_cliente`, `Nombre_producto`, `Precio_producto`, `Cantidad`) VALUES (NULL,'$this->fecha','$this->nombre_vendedor','$this->nombre_cliente','$this->apellidos_cliente','$this->direccion_cliente','$this->barrio_cliente','$this->ciudad_cliente','$this->identificacion_cliente','$this->nombreproducto','$this->precio_producto','$this->cantidad');";
    
    $this->resultado=$this->conexion->query($query);
}
public function __destruct(){
	if ($this->resultado) {

		header("Location: index.php?view=presencialsell");
	} else {
		header("Location:../");
	}
}

}

$resultado = new Venta_Presencial();
$resultado->PDF();
$resultado->registrarse();
?>