<?php
$total = 0;
?>
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<?php if(!isset($_SESSION["CLIENTE_ID"])):?>
				<p class="alert alert-danger">Debes registrarte e iniciar sesion para proceder.</p>
			<?php endif; ?>
		</div>
</div>

	<div class="row">

		<div class="col-md-12">
			<?php error_reporting(0); 
			if(isset($_SESSION["cart"]) && count($_SESSION["cart"]>0)):?>
		<h2>Mi Carrito</h2>
<table class="table table-bordered">
<thead>
	<th>Codigo</th>
	<th>Producto</th>
	<th>Cantidad</th>
	<th>Precio Unitario</th>
	<th>Total</th>
	<th></th>
</thead>
<?php 
foreach($_SESSION["cart"] as $s):?>
<?php $p = ProductData::getById($s["PRODUCTO_ID"]); ?>
<tr>
<td><?php echo $p->CODIGO; ?></td>
<td><?php echo $p->NOMBRE; ?></td>
<td style="width:100px;">
<form id="p-<?=$s["PRODUCTO_ID"];?>">
<input type="hidden" name="PRODUCTO_ID" value="<?=$s["PRODUCTO_ID"];?>">
<input type="number" name="Q" id="num-<?=$s["PRODUCTO_ID"];?>" value="<?php echo $s["Q"]; ?>" max="5" class="form-control">
</form>
<script>
	$("#num-<?=$s['PRODUCTO_ID'];?>").change(function(){
		$.post("./?action=editcart",$("#p-<?=$s['PRODUCTO_ID']?>").serialize()	,function(data){
			window.location = window.location;

		});
	});
</script>
</td>
<td><h4>$ <?php echo $p->PRECIO; ?></h4> </td>
<td><h4>$ <?php echo $p->PRECIO*$s["Q"]; ?></h4> </td>
<td style="width:30px;"><a href="index.php?action=deletefromcart&PRODUCTO_ID=<?php echo $p->ID_PRODUCTO; ?>&href=cart" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>
<?php
$total += $s["Q"]*$p->PRECIO;
 endforeach; ?>
</tr>
</table>


<div class="row">
<div class="col-md-5 col-md-offset-7">
	<table class="table table-bordered">
		<tr>
			<td>Subtotal</td><td>$ <?php echo number_format($total-($total*.16),2,".",","); ?></td>
		</tr>
		<tr>
			<td>IVA</td><td>$ <?php echo number_format($total*.16,2,".",","); ?></td>
		</tr>
		<tr>
			<td>Total</td><td>$ <?php echo number_format($total,2,".",","); ?></td>
		</tr>
	</table>
<br>
			<?php if(isset($_SESSION["CLIENTE_ID"])):?>
<a href="index.php?action=buy" class="btn btn-primary btn-block">Finalizar Compra</a>
<?php endif; ?>
<br>
<a href="index.php?action=cleancart" class="btn btn-danger btn-block">Limpar Carrito</a>
</div>
</div>



			<?php else:?>
				<div class="jumbotron">
				<h2>No hay productos</h2>
				<p>No ha agregado productos al carrito.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>