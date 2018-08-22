<?php
$products = ProductData::getAll();
?>
<section class="content">
<div class="row">
	<div class="col-md-12">
	<h1>Reportes</h1>

						<form>
						<input type="hidden" name="view" value="reports">
<div class="row">
<div class="col-md-3">

<select name="PRODUCTO_ID" class="form-control">
	<option value="">--  TODOS --</option>
	<?php foreach($products as $p):?>
	<option value="<?php echo $p->ID_PRODUCTO;?>"><?php echo $p->NOMBRE;?></option>
	<?php endforeach; ?>
</select>

</div>
<div class="col-md-3">
<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
</div>
<div class="col-md-3">
<input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>" class="form-control">
</div>

<div class="col-md-3">
<input type="submit" class="btn btn-success btn-block" value="Procesar">
</div>

</div>

</form>

	</div>
	</div>
<br><!--- -->
<div class="row">
	
	<div class="col-md-12">
		<?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>
<?php if($_GET["sd"]!=""&&$_GET["ed"]!=""):?>
			<?php 
			$operations = array();

			if($_GET["PRODUCTO_ID"]==""){
			$operations = OperationData::getAllByDateOfficial($_GET["sd"],$_GET["ed"]);
			}
			else{
			$operations = OperationData::getAllByDateOfficialBP($_GET["PRODUCTO_ID"],$_GET["sd"],$_GET["ed"]);
			} 


			 ?>

			 <?php if(count($operations)>0):?>
<table class="table table-bordered">
	<thead>
		<th>Id</th>
		<th>Producto</th>
		<th>Cantidad</th>
		<th>Operacion</th>
		<th>Fecha</th>
	</thead>
<?php foreach($operations as $operation):?>
	<tr>
		<td><?php echo $operation->ID_OPERACION; ?></td>
		<td><?php echo $operation->getProduct()->NOMBRE; ?></td>
		<td><?php echo $operation->CANTIDAD; ?></td>
		<td><?php echo $operation->getOperationType()->NOMBRE; ?></td>
		<td><?php echo $operation->CREADO_EN; ?></td>
	</tr>
<?php endforeach; ?>

</table>

			 <?php else:
			 // si no hay operaciones
			 ?>
<script>
	$("#wellcome").hide();
</script>
<div class="jumbotron">
	<h2>No hay operaciones</h2>
	<p>El rango de fechas seleccionado no proporciono ningun resultado de operaciones.</p>
</div>

			 <?php endif; ?>
<?php else:?>
<script>
	$("#wellcome").hide();
</script>
<div class="jumbotron">
	<h2>Fecha Incorrectas</h2>
	<p>Puede ser que no selecciono un rango de fechas, o el rango seleccionado es incorrecto.</p>
</div>
<?php endif;?>

		<?php endif; ?>
	</div>
</div>

<br><br><br><br>
</section>