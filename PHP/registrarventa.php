<?php
class Registro{


public $fecha;
public $nombre_cliente;
public $apellidos_cliente;
public $direccion_cliente;
public $barrio_cliente;
public $ciudad_cliente;
public $identificacion_cliente;
public $nombreproducto;
public $precio_producto;
public $cantidad;
public $nombre_vendedor;


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

		header("Location: ../PHP/Vendedor.php");
	} else {
		header("Location:../");
	}
}
}
$resultado=new Registro();
$resultado->registrarse();
?>