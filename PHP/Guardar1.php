<?php
$conexion=new mysqli("localhost", "root", "", "nertsport");
$Id=$_REQUEST['Id'];
$nombres = $_POST['Nombres'];
$apellidos = $_POST['Apellidos'];
$tipo_doc=$_POST['Td'];
$numero_doc=$_POST['Nd'];
$telefono_fijo = $_POST['Tf'];
$celular = $_POST['Celular'];
$correo = $_POST['Correo'];
$direccion = $_POST['Direccion'];
$username = $_POST['Username'];
	
	$query = "UPDATE registro SET NOMBRES= '$nombres', APELLIDOS = '$apellidos', TIPO_DOC = '$tipo_doc'
	,NUM_DOC ='$numero_doc', TEL_FIJ = '$telefono_fijo', CELULAR = '$celular', CORREO = '$correo', DIRECCION = '$direccion', USERNAME = '$username'  WHERE ID_CLI = '$Id'";
	$resultado = $conexion->query($query);
		if ($resultado) {
			header("Location:Admi.php");
		} else {
			 echo "El registro no se modifico";
		}
?>