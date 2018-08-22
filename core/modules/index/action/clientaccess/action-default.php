<?php


// print_r($_POST);
$users = ClientData::getByEmail($_POST["CORREO"]);
$found = false;
// print_r($user);

foreach ($users as $user) {
	if(crypt($_POST["PASSWORD"],$user->PASSWORD )==$user->PASSWORD){
		$_SESSION["CLIENTE_ID"]=$user->ID_CLIENTE;
		$found=true;
	}
}

if($found){
	Core::redir("index.php?view=client");
}else{
	Core::redir("index.php?view=Errorinicio");
}

?>

