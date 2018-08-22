<?php
error_reporting(0);
if(count($_POST)>0){
	$ADMIN=0;
	if(isset($_POST["ADMIN"])){$ADMIN=1;}
	$user = new UserData();
	$user->NOMBRES = $_POST["NOMBRES"];
	$user->APELLIDOS = $_POST["APELLIDOS"];
	$user->USUARIO = $_POST["USUARIO"];
	$user->CORREO = $_POST["CORREO"];
	$user->ADMIN =$ADMIN;
	$user->PASSWORD = sha1(md5($_POST["PASSWORD"]));
	$user->add();

print "<script>window.location='index.php?view=users';</script>";


}


?>