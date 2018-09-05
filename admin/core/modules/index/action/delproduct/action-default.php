<?php
// procesa la solicitud de eliminacion
error_reporting(0);
$product = ProductData::getById($_GET["PRODUCTO_ID"]);
$product->del();

Core::redir("index.php?view=products");
?>