<?php

if(isset($_SESSION["carrito"])){
	$cart = $_SESSION["carrito"];
	if(count($cart)>0){
/// antes de proceder con lo que sigue vamos a verificar que:
		// haya existencia de productos
		// si se va a facturar la cantidad a facturr debe ser menor o igual al producto facturado en inventario
		$num_succ = 0;
		$process=false;
		$errors = array();
		foreach($cart as $c){

			///
			$q = OperationData::getQYesF($c["PRODUCTO_ID"]);
			if($c["CANTIDAD"]<=$q){
				if(isset($_POST["is_oficial"])){
				$qyf =OperationData::getQYesF($c["PRODUCTO_ID"]); /// son los productos que puedo facturar
				if($c["CANTIDAD"]<=$qyf){
					$num_succ++;
				}else{
				$error = array("PRODUCTO_ID"=>$c["PRODUCTO_ID"],"message"=>"No hay suficiente cantidad de producto para facturar en inventario.");					
				$errors[count($errors)] = $error;
				}
				}else{
					// si llegue hasta aqui y no voy a facturar, entonces continuo ...
					$num_succ++;
				}
			}else{
				$error = array("PRODUCTO_ID"=>$c["PRODUCTO_ID"],"message"=>"No hay suficiente cantidad de producto en inventario.");
				$errors[count($errors)] = $error;
			}

		}

if($num_succ==count($cart)){
	$process = true;
}

if($process==false){
$_SESSION["errores"] = $errors;
	?>	
<script>
	window.location="index.php?view=mycart";
</script>
<?php
}


//////////////////////////////////
		if($process==true){
			$sell = new SellData();

			$sell->CLIENTE_ID = $_SESSION["CLIENTE_ID"];

 			$s = $sell->add();
			 


		foreach($cart as  $c){


			$op = new OperationData();
			 $op->PRODUCTO_ID = $c["PRODUCTO_ID"] ;
			 $op->OPERACION_TIPO_ID=OperationTypeData::getByName("salida")->OPERACION_ID;
			 $op->VENTA_ID=$s[1];
			 $op->ESTATUS_ID= 1;
			 $op->CANTIDAD= $c["CANTIDAD"];

			if(isset($_POST["is_oficial"])){
				$op->is_oficial = 1;
			}

			$add = $op->add_with_status();			 		

		}
////////////////////
		unset($_SESSION["carrito"]);
Core::redir("index.php?view=client");
		}
	}
}



?>

