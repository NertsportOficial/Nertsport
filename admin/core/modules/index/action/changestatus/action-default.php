<?php
error_reporting(0);
$buy =  OperationData::getById($_POST["OPERACION_ID"]);
$buy->ESTATUS_ID = $_POST["ESTATUS_ID"];
$buy->change_status();

Core::redir("index.php?view=sells");
?>