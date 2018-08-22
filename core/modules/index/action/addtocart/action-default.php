<?php



if(!isset($_SESSION["carrito"])){
	$_SESSION["carrito"] = array( array("PRODUCTO_ID"=>$_GET["PRODUCTO_ID"],"CANTIDAD"=>1 ));
}else{
	
	$products = $_SESSION["carrito"];
	$news = array();
	$newp = array("PRODUCTO_ID"=>$_GET["PRODUCTO_ID"],"CANTIDAD"=>1);
		if(!in_array($newp, $products)){
			array_push($products, $newp);
		}
		$_SESSION["carrito"]=$products;
}
//print_r($products);

if($_GET["href"]=="product"){
Core::redir("index.php?view=producto&PRODUCTO_ID=".$_GET["PRODUCTO_ID"]);
}else if($_GET["href"]=="cat"){
	$p =  ProductData::getById($_GET["PRODUCTO_ID"]);
	$cat = CategoryData::getById($p->CATEGORIA_ID);
	Core::redir("index.php?view=productos&cat=".$cat->NOMBRE_CORTO);
}




?>