<?php
if(count($_POST)>0){
	$user = new ClientData();
	$user->NOMBRE = $_POST["NOMBRE"];
	$user->APELLIDO = $_POST["APELLIDO"];
	$user->DIRECCION = $_POST["DIRECCION"];
	$user->CORREO = $_POST["CORREO"];
	$user->TELEFONO = $_POST["TELEFONO"];
	$user->add_client();

print "<script>window.location='index.php?view=clients';</script>";


}


?>