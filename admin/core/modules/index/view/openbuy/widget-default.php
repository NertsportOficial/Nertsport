
<?php

$buy = BuyData::getById($_GET["COMPRA_ID"]);
$products = BuyProductData::getAllByBuyId($_GET["COMPRA_ID"]);

?>
<div class="row">
	<div class="col-md-12">
	<h2> Compra #<?php echo $buy->ID_COMPRA; ?> [<?php echo $buy->getStatus()->NOMBRE; ?>]</h2>
<?php if(count($products)>0):?>
<table class="table table-bordered">
	<thead>
		<th>Codigo</th>
		<th>Total</th>
		<th>Nombre</th>
	</thead>
	<?php foreach($products as $p):
$px = $p->getProduct();
	?>
	<tr>
		<td><?php echo $px->CODIGO; ?></td>
		<td>$ <?php echo number_format($px->PRECIO*$p->Q,2,".",","); ?></td>
		<td><?php echo $px->NOMBRE; ?></td>		
	</tr>

	<?php endforeach; ?>
</table>


<div class="row">
<div class="col-md-5 col-md-offset-7">
	<table class="table table-bordered">
		<tr>
			<td><strong>Subtotal</strong></td><td>$ <?php echo number_format($buy->getTotal()-($buy->getTotal()*.16),2,".",","); ?></td>
		</tr>
		<tr>
			<td><strong>IVA</strong></td><td>$ <?php echo number_format($buy->getTotal()*.16,2,".",","); ?></td>
		</tr>
		<tr>
			<td><strong>Total</strong></td><td>$ <?php echo number_format($buy->getTotal(),2,".",","); ?></td>
		</tr>
	</table>
<br>
</div>
</div>
<div class="row">
<div class="col-md-12">

<form class="form-horizontal" role="form" method="post" action="index.php?action=changestatus">
  <div class="form-group">
    <label for="inputEmail1" class="col-md-3 control-label">Estado</label>
    <div class="col-md-6">
<select name="ESTATUS_ID" class="form-control">
<?php foreach(StatusData::getAll() as $s):?>
<option value="<?php echo $s->ID_ESTATUS; ?>" <?php if($s->ID_ESTATUS==$buy->ESTATUS_ID){ echo "selected"; }?>><?php echo $s->NOMBRE; ?></option>
<?php endforeach; ?>
</select>
    </div>

    <div class="col-md-3">
      <input type="hidden" name="COMPRA_ID" value="<?php echo $buy->ID_COMPRA; ?>">
      <button type="submit" class="btn btn-default">Cambiar Estado</button>

    </div>

  </div>
</form>


</div>
</div>


<?php endif; ?>
	</div>
</div>





