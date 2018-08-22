<?php if(isset($_SESSION["CLIENTE_ID"])):
$client = ClientData::getById($_SESSION["CLIENTE_ID"]);
?>
<div class="container">
<div class="row">

<div class="col-md-12">
<h3>Bienvenido, <?php echo $client->NOMBRE." ".$client->APELLIDO; ?></h3>
</div>

</div>
</div>
<?php

$buys = BuyData::getAllByClientid($_SESSION["CLIENTE_ID"]);


?>
<div class="container">
<div class="row">
	<div class="col-md-12">
	<h2>Mis Compras</h2>
<?php if(count($buys)>0):?>
<table class="table table-bordered">
	<thead>
		<th></th>
		<th>Compra</th>
		<th>Total</th>
		<th>Estado</th>
		<th>Fecha</th>
	</thead>
	<?php foreach($buys as $buy):?>
	<tr>
		<td><a href="index.php?view=openbuy&CODIGO=<?php echo $buy->CODIGO; ?>" class="btn btn-default btn-xs">Detalles</a></td>
		<td>#<?php echo $buy->ID_COMPRA; ?></td>
		<td>$ <?php echo number_format($buy->getTotal(),2,".",","); ?></td>
		<td><?php echo $buy->getStatus()->NOMBRE; ?></td>
		<td><?php echo $buy->CREADO_EN; ?></td>
	</tr>

	<?php endforeach; ?>
</table>
<?php else:?>
	<div class="jumbotron">
	<h2>No hay compras</h2>

	</div>
<?php endif; ?>
	</div>
</div>
</div>



<?php endif; ?>
