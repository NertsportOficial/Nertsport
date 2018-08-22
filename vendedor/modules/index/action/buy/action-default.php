<?php
// print_r($_SESSION);

$buy = new BuyData();

$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$code = "";
for($i=0;$i<11;$i++){
    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}


$buy->CODIGO = $code;
$buy->CLIENTE_ID = $_SESSION["CLIENTE_ID"];
$buy->ESTATUS_ID= 1;
$b = $buy->add();

foreach ($_SESSION["cart"] as $c) {
	$p = new BuyProductData();
	$p->COMPRA_ID = $b[1];
	$p->PRODUCTO_ID = $c["PRODUCTO_ID"];
	$p->Q = $c["Q"];
	$p->add();
}
unset($_SESSION["cart"]);
Core::redir("index.php?view=client");

?>