
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/onere-word.php?id=<?php echo $_GET["id"];?>">Word 2007 (.docx)</a></li>
  </ul>
</div>
<h1>Resumen de Reabastecimiento</h1>
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
		// print "qx=$qx"NOMBRE
			$p = $operation->getProduct();
		if($qx==0){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->NOMBRE</b> no tiene existencias en inventario.</p>";			
		}else if($qx<=$p->inventary_min/2){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->NOMBRE</b> tiene muy pocas existencias en inventario.</p>";
		}else if($qx<=$p->inventary_min){
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
	<td style="width:150px;">Proveedor</td>
	<td><?php echo $client->NOMBRES." ".$client->APELLIDOS;?></td>
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
<br><br><h1>Total: $ <?php echo number_format($total,2,'.',','); ?></h1>
	<?php

?>	
<?php else:?>
	501 Internal Error
<?php endif; ?>