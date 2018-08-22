<?php
$conexion=new mysqli("localhost", "root", "", "nertsport");
$Id=$_REQUEST['Id'];
$nombre=$_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

$tips = 'jpg';
$type = array('image/jpeg' => 'jpg');


$nombrefoto=$_FILES['avatar']['name'];
$ruta=$_FILES['avatar']['tmp_name'];
$name= $Id.'.'.$tips;
if (is_uploaded_file($ruta)) {
	$destino = "Perfiles/".$name;
	copy($ruta, $destino);
} else {
	
	$destino = "Perfiles/".$name;
}

	
	$query = "UPDATE `cliente` SET `NOMBRE` = '$nombre', `APELLIDO` = '$apellido', `CORREO` = '$correo', `TELEFONO` = '$telefono', `DIRECCION` = '$direccion', `avatar` = '$destino' WHERE `cliente`.`ID_CLIENTE` = '$Id'";
	$resultado = $conexion->query($query);
		if ($resultado) {
			 header("Location: ./");
			 echo "alert ('Registro guardado')";

		} else {
			 echo "El registro no se modifico";
		}
?>