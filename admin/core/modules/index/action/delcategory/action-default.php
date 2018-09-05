<?php
// procesa la solicitud de eliminacion
error_reporting(0);
$cat = CategoryData::getById($_GET["CATEGORIA_ID"]);
$cat->del();

Core::redir("index.php?view=categories");
?>