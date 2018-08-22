<?php
error_reporting(0);
$s = SlideData::getById($_GET["slide_id"]);
$s->del();

Core::redir("index.php?view=slider");

?>