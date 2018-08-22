
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/onesell-word.php?id=<?php echo $_GET["id"];?>">Word 2007 (.docx)</a></li>
  </ul>
</div>
<h1>Resumen de Venta</h1>
<?php if(isset($_GET["ID_VENTA"]) && $_GET["ID_VENTA"]!=""):?>
<?php
$sell = SellData::getById($_GET["ID_VENTA"]);
$operations = OperationData::getAllProductsBySellId($_GET["ID_VENTA"]);
$total = 0;
?>
<?php
if(isset($_COOKIE["selled"])){
	foreach ($operations as $operation) {
//		print_r($operation);
		$qx = OperationData::getQYesF($operation->PRODUCTO_ID);
		// print "qx=$qx";
			$p = $operation->getProduct();
		if($qx==0){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->NOMBRE</b> no tiene existencias en inventario.</p>";			
		}else if($qx<=$p->INVENTARIO_MIN/2){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->NOMBRE</b> tiene muy pocas existencias en inventario.</p>";
		}else if($qx<=$p->INVENTARIO_MIN){
			echo "<p class='alert alert-warning'>El producto <b style='text-transform:uppercase;'> $p->NOMBRE</b> tiene pocas existencias en inventario.</p>";
		}
	}
	setcookie("selled","",time()-18600);
}

?>
<table class="table table-bordered">
<?php if($sell->CLIENTE_ID!=""):
$client = $sell->getPerson();
?>
<tr>
	<td style="width:150px;">Cliente</td>
	<td><?php echo $client->NOMBRE." ".$client->APELLIDO;?></td>
</tr>

<?php endif; ?>
<?php if($sell->ADMIN_ID!=""):
$user = $sell->getUser();
?>
<tr>
	<td>Atendido por</td>
	<td><?php echo $user->NOMBRES." ".$user->APELLIDOS;?></td>
</tr>
<?php endif; ?>
</table>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Cantidad</th>
		<th>Nombre del Producto</th>
		<th>Precio Unitario</th>
		<th>Total</th>

	</thead>
<?php
	foreach($operations as $operation){
		$product  = $operation->getProduct();
?>
<tr>
	<td><?php echo $product->ID_PRODUCTO ;?></td>
	<td><?php echo $operation->CANTIDAD ;?></td>
	<td><?php echo $product->NOMBRE ;?></td>
	<td>$ <?php echo number_format($product->PRECIO,2,".",",") ;?></td>
	<td><b>$ <?php echo number_format($operation->CANTIDAD*$product->PRECIO,2,".",",");$total+=$operation->CANTIDAD*$product->PRECIO;?></b></td>
</tr>
<?php
	}
	?>
</table>
<br><br>
<div class="row">
<div class="col-md-4">
<table class="table table-bordered">
	<tr>
		<td><h4>Descuento:</h4></td>
		<td><h4>$ <?php echo number_format($sell->DESCUENTO,2,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Subtotal:</h4></td>
		<td><h4>$ <?php echo number_format($total,2,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Total:</h4></td>
		<td><h4>$ <?php echo number_format($total-	$sell->DESCUENTO,2,'.',','); ?></h4></td>
	</tr>
</table>
</div>
</div>
<?php if($sell->ADMIN_ID==""): ?>
<div class="row">
<div class="col-md-12">

<form class="form-horizontal" role="form" method="post" action="index.php?action=changestatus">
  <div class="form-group">
    <label for="inputEmail1" class="col-md-3 control-label">Estado</label>
    <div class="col-md-6">
<select name="ESTATUS_ID" class="form-control">
<?php foreach(StatusData::getAll() as $s):?>
<option value="<?php echo $s->ID_ESTATUS; ?>" <?php if($s->ID_ESTATUS==$operation->ESTATUS_ID){ echo "selected"; }?>><?php echo $s->NOMBRE; ?></option>
<?php endforeach; ?>
</select>
    </div>

    <div class="col-md-3">
      <input type="hidden" name="OPERACION_ID" value="<?php echo $operation->ID_OPERACION; ?>">
      <button type="submit" class="btn btn-default">Cambiar Estado</button>

    </div>

  </div>
</form>


</div>
</div>
<?php endif; ?>
<?php else:?>
	501 Internal Error
<?php endif; ?>