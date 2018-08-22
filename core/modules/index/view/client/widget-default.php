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

$buys = SellData::getAllByClientid($_SESSION["CLIENTE_ID"]);


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
		<?php if($buy->ADMIN_ID==""): ?>
		<td><a href="index.php?view=openbuy&ID_VENTA=<?php echo $buy->ID_VENTA; ?>" class="btn btn-default btn-xs">Detalles</a></td>
		<td>#<?php echo $buy->ID_VENTA; ?></td>
		<td>$ <?php echo number_format($buy->getTotal(),2,".",","); ?></td>
		<td><?php echo $buy->getStatus1()->NOMBRE; ?></td>
		<td><?php echo $buy->CREADO_EN; ?></td>
		<?php endif; ?>
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
