<?php
//Se encarga de procesar los datos recibidos
error_reporting(0);
$cat =  new CategoryData();
$cat->NOMBRE = $_POST["NOMBRE"];
$cat->NOMBRE_CORTO = $_POST["NOMBRE_CORTO"];
if(isset($_POST["ACTIVO"])){ $cat->ACTIVO=1;}else{$cat->ACTIVO=0;}
$cat->add();

 Core::redir("index.php?view=categories");

?>