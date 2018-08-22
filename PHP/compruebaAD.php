<?php

class login{
private $servidor="localhost";
private $usuario="root";
private $contrasena="";
private $bd="nertsport";

public function conexion(){
    $this->conexion=mysqli_connect($this->servidor,$this->usuario,$this->contrasena,$this->bd);

}               
public function logear(){
    $this->usuario=$_POST['login'];
    $this->password=$_POST['password'];
    $consulta="SELECT * FROM administrador WHERE USERNAME = '$this->usuario'";
    $resultado=$this->conexion->query($consulta);
    while($fila=mysqli_fetch_assoc($resultado)){
    
        if(password_verify($this->password,$fila['PASSWORD'])){
            session_start();
            $_SESSION['usuario']=$_POST['login'];
            header('location: Admi.php');
        }else{
            header('location:../Index.php');   
        }
    }
}

}
/*
session_start();
session_destroy();*/

$logi=new login();
$logi->conexion();
$logi->logear();