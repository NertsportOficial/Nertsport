<?php

print_r($_POST);
print_r($_SESSION["carrito"]);

$cart = $_SESSION["carrito"];
$cnt=0;
$_SESSION["cart"]==array();

foreach ($cart as $c) {
	if($c["PRODUCTO_ID"]==$_POST["PRODUCTO_ID"]){
		$c["CANTIDAD"] = $_POST["CANTIDAD"];
	}
	$_SESSION["carrito"][$cnt]=$c;
	$cnt++;
}


?>