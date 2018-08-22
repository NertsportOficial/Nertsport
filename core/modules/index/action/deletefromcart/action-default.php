<?php



if(count($_SESSION["carrito"])==1){
	unset($_SESSION["carrito"]);
}else{
	
	$products = $_SESSION["carrito"];
	$news = array();
	foreach ($products as $product) {
		if($product["PRODUCTO_ID"]!=$_GET["PRODUCTO_ID"]){
			array_push($news, $product);
		}
	}
	$_SESSION["carrito"]=$news;
}



//print_r($products);

if($_GET["href"]=="carrito"){
Core::redir("index.php?view=mycart");
}else if($_GET["href"]=="product"){
	$p =  ProductData::getById($_GET["PRODUCTO_ID"]);
	$cat = CategoryData::getById($p->CATEGORIA_ID);
	Core::redir("index.php?view=productos&cat=".$cat->NOMBRE_CORTO);
}
Core::redir("index.php?view=mycart");


?>