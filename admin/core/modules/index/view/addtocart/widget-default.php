<?php

if(!isset($_SESSION["cart"])){


	$product = array("PRODUCTO_ID"=>$_POST["PRODUCTO_ID"],"CANTIDAD"=>$_POST["CANTIDAD"]);
	$_SESSION["cart"] = array($product);


	$cart = $_SESSION["cart"];

///////////////////////////////////////////////////////////////////
		$num_succ = 0;
		$process=false;
		$errors = array();
		foreach($cart as $c){

			///
			$q = OperationData::getQYesF($c["PRODUCTO_ID"]);
//			echo ">>".$q;
			if($c["CANTIDAD"]<=$q){
				$num_succ++;


			}else{
				$error = array("PRODUCTO_ID"=>$c["PRODUCTO_ID"],"message"=>"No hay suficiente cantidad de producto en inventario.");
				$errors[count($errors)] = $error;
			}

		}
///////////////////////////////////////////////////////////////////

//echo $num_succ;
if($num_succ==count($cart)){
	$process = true;
}
if($process==false){
	unset($_SESSION["cart"]);
$_SESSION["errors"] = $errors;
	?>	
<script>
	window.location="index.php?view=sell";
</script>
<?php
}




}else {

$found = false;
$cart = $_SESSION["cart"];
$index=0;

$q = OperationData::getQYesF($_POST["PRODUCTO_ID"]);





$can = true;
if($_POST["q"]<=$q){
}else{
	$error = array("PRODUCTO_ID"=>$_POST["PRODUCTO_ID"],"message"=>"No hay suficiente cantidad de producto en inventario.");
	$errors[count($errors)] = $error;
	$can=false;
}

if($can==false){
$_SESSION["errors"] = $errors;
	?>	
<script>
	window.location="index.php?view=sell";
</script>
<?php
}
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
	$_SESSION["cart"] = $cart;
}

if($found==false){
    $nc = count($cart);
	$product = array("PRODUCTO_ID"=>$_POST["PRODUCTO_ID"],"CANTIDAD"=>$_POST["CANTIDAD"]);
	$cart[$nc] = $product;
//	print_r($cart);
	$_SESSION["cart"] = $cart;
}

}
}
 print "<script>window.location='index.php?view=sell';</script>";
// unset($_SESSION["cart"]);

?>