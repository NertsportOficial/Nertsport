<?php


// print_r($_POST);
$users = ClientData::getByEmail($_POST["USUARIO"]);
$found = false;
// print_r($user);

foreach ($users as $user) {
	if(crypt($_POST["PASSWORD"],$user->PASSWORD )==$user->PASSWORD){
		$_SESSION["VENDEDOR_ID"]=$user->ID_CLIENTE;
		$found=true;
	}
}

if($found){
	Core::redir("index.php?view=seller");
}else{
	Core::redir("../view/presencialsell/widget-deafult.php");
}

?>