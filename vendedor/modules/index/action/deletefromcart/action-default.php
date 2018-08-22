<?php



if(count($_SESSION["cart"])==1){
	unset($_SESSION["cart"]);
}else{
	
	$products = $_SESSION["cart"];
	$news = array();
	foreach ($products as $product) {
		if($product["PRODUCTO_ID"]!=$_GET["PRODUCTO_ID"]){
			array_push($news, $product);
		}
	}
	$_SESSION["cart"]=$news;
}



//print_r($products);

if($_GET["href"]=="cart"){
Core::redir("index.php?view=mycart");
}else if($_GET["href"]=="product"){
	$p =  ProductData::getById($_GET["PRODUCTO_ID"]);
	$cat = CategoryData::getById($p->CATEGORIA_ID);
	Core::redir("index.php?view=productos&cat=".$cat->NOMBRE_CORTO);
}




?>