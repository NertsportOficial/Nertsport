<?php
//este archivo ejecuta la tarea de limpiar la seccion de reabastecimiento
if(isset($_GET["PRODUCTO_ID"])){
	$cart=$_SESSION["reabastecer"];
	if(count($cart)==1){
	 unset($_SESSION["reabastecer"]);
	}else{
		$ncart = null;
		$nx=0;
		foreach($cart as $c){
			if($c["PRODUCTO_ID"]!=$_GET["PRODUCTO_ID"]){
				$ncart[$nx]= $c;
			}
			$nx++;
		}
		$_SESSION["reabastecer"] = $ncart;
	}

}else{
 unset($_SESSION["reabastecer"]);
}

print "<script>window.location='index.php?view=re';</script>";

?>