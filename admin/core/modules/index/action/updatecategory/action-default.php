<?php
error_reporting(0);
$cat =  CategoryData::getById($_POST["CATEGORIA_ID"]);
$cat->NOMBRE = $_POST["NOMBRE"];
$cat->NOMBRE_CORTO = $_POST["NOMBRE_CORTO"];
if(isset($_POST["ACTIVO"])){ $cat->ACTIVO=1;}else{$cat->ACTIVO=0;}
$cat->update();

Core::redir("index.php?view=categories");

?>