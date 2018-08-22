<?php
include("conexion.php");
$nombres= $_POST['Nombre'];
$apellidos= $_POST['Apellido'];
$telefono= $_POST['Telefono'];
$correo= $_POST['Correo'];
$direccion= $_POST['Direccion'];


$query = "INSERT INTO registro (Nombre, Apellido, Telefono, Correo, Direccion) VALUES ('$nombres','$apellidos','$telefono','$correo','$direccion')";
$resultado= $conexion->query($query);

if($resultado) {
	header("Location: inicia.php");
} else{
	echo "El registro no se guardo";
}
?>