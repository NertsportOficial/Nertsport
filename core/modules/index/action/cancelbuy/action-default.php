<?php
 print_r($_POST);
$buy = OperationData::getById($_POST["OPERACION_ID"]);
$buy->cancel();

Core::redir("index.php?view=client");

?>