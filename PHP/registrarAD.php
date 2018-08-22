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
public $cargo;

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
	$this->cargo=$_POST['Cargo'];

	$query= "INSERT INTO `administrador`(`ID_ADMIN`, `NOMBRE`, `APELLIDO`, `TIPO_DOC`, `NUM_DOC`, `TELEFONO`, `CELULAR`, `CORREO`, `DIRECCION`, `USERNAME`, `PASSWORD`, `CARGO`) VALUES (NULL,'$this->nombres', '$this->apellidos','$this->tipo_d', '$this->documento','$this->telefono', '$this->celular','$this->correo','$this->direccion','$this->usuario','$this->encrip','$this->cargo');";
    
    $this->resultado=$this->conexion->query($query);
    $this->password=md5($this->password);
}
public function __destruct(){
	if ($this->resultado) {
		header("Location:../index.php");
	} else {
		header("Location: ")
	}
}
}
$resultado=new Registro();
$resultado->registrarse();
?>