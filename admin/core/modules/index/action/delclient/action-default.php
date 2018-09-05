<?php
// procesa la solicitud de eliminacion
error_reporting(0);
$client = ClientData::getById($_GET["CLIENTE_ID"]);
$client->del();

Core::redir("index.php?view=clients");
?>