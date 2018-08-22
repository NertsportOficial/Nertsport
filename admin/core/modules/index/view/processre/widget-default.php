<?php
if(isset($_SESSION["reabastecer"])){
	$cart = $_SESSION["reabastecer"];
	if(count($cart)>0){

$process = true;









//////////////////////////////////
		if($process==true){
			$sell = new SellData();
			$sell->ADMIN_ID = $_SESSION["admin_id"];
			 if(isset($_POST["CLIENTE_ID"]) && $_POST["CLIENTE_ID"]!=""){
			 	$sell->CLIENTE_ID=$_POST["CLIENTE_ID"];
 				$s = $sell->add_re_with_client();
			 }else{
 				$s = $sell->add_re();
			 }


		foreach($cart as  $c){


			$op = new OperationData();
			 $op->PRODUCTO_ID = $c["PRODUCTO_ID"] ;
			 $op->OPERACION_TIPO_ID=1; // 1 - entrada
			 $op->VENTA_ID=$s[1];
			 $op->CANTIDAD= $c["CANTIDAD"];

			if(isset($_POST["is_oficial"])){
				$op->is_oficial = 1;
			}

			$add = $op->add();			 		

		}
			unset($_SESSION["reabastecer"]);

////////////////////
print "<script>window.location='index.php?view=onere&ID_VENTA=$s[1]';</script>";
		}
	}
}



?>
