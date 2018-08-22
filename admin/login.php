<?php

define('LBROOT',getcwd()); // LegoBox Root ... the server root
include("core/controller/Database.php");

$user = $_POST['CORREO'];
$pass = sha1(md5($_POST['PASSWORD']));

$base = new Database();
$con = $base->connect();
// print_r($con);
 $sql = "select * from administrador where (CORREO= \"".$user."\" or USUARIO= \"".$user."\" ) and PASSWORD= \"".$pass."\" and ACTIVO=1";
//print $sql;
$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['ID_ADMIN'];
}

if($found==true) {
	session_start();
//	print $userid;
	$_SESSION['admin_id']=$userid ;
//	setcookie('userid',$userid);
//	print $_SESSION['userid'];
	print "Cargando ... $user";
	print "<script>window.location='./';</script>";
}else {
	print "<script>alert('Datos de acceso no validos');</script>";	
	print "<script>window.location='index.php?view=login';</script>";
}
?>