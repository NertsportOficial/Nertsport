<?php if(isset($_SESSION["CLIENTE_ID"])):

$client = ClientData::getById($_SESSION["CLIENTE_ID"]);
?>

<?php

$buy = SellData::getById($_GET["ID_VENTA"]);
$products = OperationData::getAllBySellId($_GET["ID_VENTA"]);

?>
<div class="container">
<div class="row">

<div class="col-md-12">
<h3>Bienvenido, <?php echo $client->NOMBRE." ".$client->APELLIDO; ?></h3>
	<a href="./index.php?view=client" class="btn btn-default"><i class="fa fa-chevron-left"></i> Regresar</a>
	<a href="./invoice.php?ID_VENTA=<?php echo $buy->ID_VENTA;?>" class="btn btn-default"><i class="fa fa-file-o"></i> Imprimir</a>
<br></div>


</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<?php foreach($products as $pr):
 if($pr->ESTATUS_ID==1):?>
<p class="alert alert-warning">Operacion Pendiente</p>
<?php elseif($pr->ESTATUS_ID >= 2 && $pr->ESTATUS_ID <=4 ):?>
<p class="alert alert-info"><?php echo StatusData::getById($pr->ESTATUS_ID)->NOMBRE; ?></p>
<?php elseif($pr->ESTATUS_ID==5):?>
<p class="alert alert-danger">Operacion Cancelada</p>
<?php endif; ?>
<?php endforeach; ?>
	<h2> Compra #<?php echo $buy->ID_VENTA; ?></h2>
<?php if(count($products)>0):?>
<table class="table table-bordered">
	<thead>
		<th></th>
		<th>Cantidad</th>
		<th>Unidad</th>
		<th>Codigo</th>
		<th>Total</th>
		<th>Estado</th>
	</thead>
	<?php foreach($products as $p):
$px = $p->getProduct();
	?>
	<tr>

		<td><a href="index.php?view=producto&PRODUCTO_ID=<?php echo $px->ID_PRODUCTO; ?>">Detalles</a></td>
		<td><?php echo $p->CANTIDAD; ?></td>
		<td><?php echo $px->getUnit()->NOMBRE; ?></td>
		<td><?php echo $px->CODIGO; ?></td>
		<td><?php echo $px->NOMBRE; ?></td>
		<td>$ <?php echo number_format($px->PRECIO*$p->CANTIDAD,2,".",","); ?></td>
	</tr>

	<?php endforeach; ?>
</table>


<div class="row">
<div class="col-md-5 col-md-offset-7">
	<table class="table table-bordered">
		<tr>
			<td>Subtotal</td><td>$ <?php echo number_format($buy->getTotal()-($buy->getTotal()*.16),2,".",","); ?></td>
		</tr>
		<tr>
			<td>IVA</td><td>$ <?php echo number_format($buy->getTotal()*.16,2,".",","); ?></td>
		</tr>
		<tr>
			<td>Total</td><td>$ <?php echo number_format($buy->getTotal(),2,".",","); ?></td>
		</tr>
	</table>
<br>

<?php if($p->ESTATUS_ID==1):?>
<form method="post" action="index.php?action=cancelbuy">
<input type="submit" class="btn btn-danger btn-block" value="Cancelar Compra">
<input type="hidden" name="OPERACION_ID" value="<?php echo $p->ID_OPERACION; ?>">
</form>
<?php endif; ?>
</div>
</div>

<?php endif; ?>
	</div>
</div>
</div>



<?php endif; ?>
