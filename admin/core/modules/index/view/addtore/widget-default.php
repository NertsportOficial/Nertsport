<?php

if(!isset($_SESSION["reabastecer"])){


	$product = array("PRODUCTO_ID"=>$_POST["PRODUCTO_ID"],"CANTIDAD"=>$_POST["CANTIDAD"]);
	$_SESSION["reabastecer"] = array($product);


	$cart = $_SESSION["reabastecer"];

///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////

$process=true;


}else {

$found = false;
$cart = $_SESSION["reabastecer"];
$index=0;

$q = OperationData::getQYesF($_POST["PRODUCTO_ID"]);





$can = true;

?>

<?php
if($can==true){
foreach($cart as $c){
	if($c["PRODUCTO_ID"]==$_POST["PRODUCTO_ID"]){
		echo "found";
		$found=true;
		break;
	}
	$index++;
//	print_r($c);
//	print "<br>";
}

if($found==true){
	$q1 = $cart[$index]["CANTIDAD"];
	$q2 = $_POST["CANTIDAD"];
	$cart[$index]["CANTIDAD"]=$q1+$q2;
	$_SESSION["reabastecer"] = $cart;
}

if($found==false){
    $nc = count($cart);
	$product = array("PRODUCTO_ID"=>$_POST["PRODUCTO_ID"],"CANTIDAD"=>$_POST["CANTIDAD"]);
	$cart[$nc] = $product;
//	print_r($cart);
	$_SESSION["reabastecer"] = $cart;
}

}
}
print "<script>window.location='index.php?view=re';</script>";
// unset($_SESSION["reabastecer"]);

?>