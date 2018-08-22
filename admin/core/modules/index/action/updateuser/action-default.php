<?php
error_reporting(0);
if(count($_POST)>0){
	$ADMIN=0;
	if(isset($_POST["ADMIN"])){$ADMIN=1;}
	$ACTIVO=0;
	if(isset($_POST["ACTIVO"])){$ACTIVO=1;}
	$user = UserData::getById($_POST["ID_ADMIN"]);
	$user->NOMBRES = $_POST["NOMBRES"];
	$user->APELLIDOS = $_POST["APELLIDOS"];
	$user->USUARIO = $_POST["USUARIO"];
	$user->CORREO = $_POST["CORREO"];
	$user->ADMIN=$ADMIN;
	$user->ACTIVO=$ACTIVO;
	$user->update();

	if($_POST["PASSWORD"]!=""){
		$user->PASSWORD = sha1(md5($_POST["PASSWORD"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}

print "<script>window.location='index.php?view=users';</script>";


}


?>