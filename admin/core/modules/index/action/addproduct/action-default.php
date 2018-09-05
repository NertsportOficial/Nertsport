<?php
// Se encarga de procesar los datos recibidos
error_reporting(0);
if(count($_POST)>0){
$product =  new ProductData();
foreach ($_POST as $k => $v) {
	$product->$k = $v;
	
}
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$CODIGO = "";
for($i=0;$i<11;$i++){
    $CODIGO .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
        $product->NOMBRE_CORTO= $CODIGO;
	$handle = new Upload($_FILES['FOTO']);
        	if ($handle->uploaded) {
        		$url="storage/products/";
            	$handle->Process($url);

                $product->FOTO = $handle->file_dst_name;
    		}
    $handle = new Upload($_FILES['FOTO1']);
            if ($handle->uploaded) {
                $url="storage/products/";
                $handle->Process($url);

                $product->FOTO1 = $handle->file_dst_name;
            }
    $handle = new Upload($_FILES['FOTO2']);
            if ($handle->uploaded) {
                $url="storage/products/";
                $handle->Process($url);

                $product->FOTO2 = $handle->file_dst_name;
            }
    		
if(isset($_POST["ES_PUBLICO"])) { $product->ES_PUBLICO=1; }else{ $product->ES_PUBLICO=0; }
if(isset($_POST["EN_EXISTENCIA"])) { $product->EN_EXISTENCIA=1; }else{ $product->EN_EXISTENCIA=0; }
if(isset($_POST["ES_DESTACADO"])) { $product->ES_DESTACADO=1; }else{ $product->ES_DESTACADO=0; }


$prod= $product->add();
    

Core::redir("index.php?view=products");
}
?>