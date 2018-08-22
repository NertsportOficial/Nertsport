<?php
error_reporting(0);
// print_r($_POST);
$product =  new ProductData();
foreach ($_POST as $k => $v) {
	$product->$k = $v;
	# code...
}

////////////////////////////////////// / / / / / / / / / / / / / / / / / / / / / / / / /
$handle = new Upload($_FILES['FOTO']);
if ($handle->uploaded) {
	$url="storage/products/";
	$handle->Process($url);

    $product->FOTO = $handle->file_dst_name;
    $product->update_image();
}

$handle = new Upload($_FILES['FOTO1']);
if ($handle->uploaded) {
	$url="storage/products/";
	$handle->Process($url);

    $product->FOTO1 = $handle->file_dst_name;
    $product->update_image_1();
}

$handle = new Upload($_FILES['FOTO2']);
if ($handle->uploaded) {
	$url="storage/products/";
	$handle->Process($url);

    $product->FOTO2 = $handle->file_dst_name;
    $product->update_image_2();
}
////////////////////////////////////// / / / / / / / / / / / / / / / / / / / / / / / / /

if(isset($_POST["ES_PUBLICO"])) { $product->ES_PUBLICO=1; }else{ $product->ES_PUBLICO=0; }
if(isset($_POST["EN_EXISTENCIA"])) { $product->EN_EXISTENCIA=1; }else{ $product->EN_EXISTENCIA=0; }
if(isset($_POST["ES_DESTACADO"])) { $product->ES_DESTACADO=1; }else{ $product->ES_DESTACADO=0; }

$product->NOMBRE = $_POST["NOMBRE"];

 $product->update();
$_SESSION["product_updated"]= 1;
Core::redir("index.php?view=editproduct&PRODUCTO_ID=".$_POST["ID_PRODUCTO"]);

?>