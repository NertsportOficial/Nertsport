<?php
 print_r($_POST);
$buy = BuyData::getById($_POST["COMPRA_ID"]);
$buy->cancel();

Core::redir("index.php?view=client");

?>