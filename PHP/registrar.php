<?php
class Registro{

public $nombres;
public $apellidos;
public $tipo_d;
public $documento;
public $telefono;
public $celular;
public $correo;
public $direccion;
public $usuario;
public $password;

public function __construct(){
	$this->conexion=new mysqli("localhost","root", "", "nertsport");
}
public function registrarse(){
	$this->nombres=$_POST['Nombre'];
	$this->apellidos=$_POST['Apellidos'];
	$this->tipo_d=$_POST['Tipo'];
	$this->documento=$_POST['Documento'];
	$this->telefono=$_POST['Telefono'];
	$this->celular=$_POST['Celular'];
	$this->correo=$_POST['Correo'];
	$this->direccion=$_POST['Direccion'];
	$this->usuario=$_POST['Usuario'];
	$this->password=$_POST['Password'];
	$this->encrip=password_hash($this->password, PASSWORD_DEFAULT);

	$query= "INSERT INTO `registro` (`ID_CLI`, `NOMBRES`, `APELLIDOS`, `TIPO_DOC`, `NUM_DOC`, `TEL_FIJ`, `CELULAR`, `CORREO`, `DIRECCION`, `USERNAME`, `PASSWORD`) VALUES (NULL, '$this->nombres', '$this->apellidos', '$this->tipo_d', '$this->documento', '$this->telefono', '$this->celular', '$this->correo', '$this->direccion', '$this->usuario', '$this->encrip');";
    
    $this->resultado=$this->conexion->query($query);
    $this->password=md5($this->password);
}
public function __destruct(){
	if ($this->resultado) {

		header('Location:../Exito.html');
	} else {
		header ('Location:../Errorregistro.html');
	}
}
}
$resultado=new Registro();
$resultado->registrarse();
?>