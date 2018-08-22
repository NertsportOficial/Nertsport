<?php
$conexion= new MySQLi("localhost","root","","nertsport");
if($conexion){
	echo "Conexion Establecida";
	}
else {
	echo "Error, no se pudo conectar";
	}
?>