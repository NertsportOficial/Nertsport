<?php
if(isset($_GET["PRODUCTO_ID"])){
	$cart=$_SESSION["cart"];
	if(count($cart)==1){
	 unset($_SESSION["cart"]);
	}else{
		$ncart = null;
		$nx=0;
		foreach($cart as $c){
			if($c["PRODUCTO_ID"]!=$_GET["PRODUCTO_ID"]){
				$ncart[$nx]= $c;
			}
			$nx++;
		}
		$_SESSION["cart"] = $ncart;
	}

}else{
 unset($_SESSION["cart"]);
}

print "<script>window.location='index.php?view=sell';</script>";

?>