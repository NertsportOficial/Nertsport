<?php

$mysqli = new mysqli('localhost', 'root', '', 'nertsport');

if ($mysqli->connect_error) {
	die('Error en la conexion'. $mysqli->connect_error);
}
?>