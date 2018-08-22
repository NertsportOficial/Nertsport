<?php

print_r($_POST);
print_r($_SESSION["cart"]);

$cart = $_SESSION["cart"];
$cnt=0;
$_SESSION["cart"]==array();

foreach ($cart as $c) {
	if($c["PRODUCTO_ID"]==$_POST["PRODUCTO_ID"]){
		$c["Q"] = $_POST["Q"];
	}
	$_SESSION["cart"][$cnt]=$c;
	$cnt++;
}


?>