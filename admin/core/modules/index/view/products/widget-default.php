<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=newproduct" class="btn btn-default">Agregar Producto</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/products-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
		<h1><i class="fa fa-archive"></i> Lista de Productos</h1>
		<div class="clearfix"></div>


<?php
$page = 1;
if(isset($_GET["page"])){
	$page=$_GET["page"];
}
$limit=10;
if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
	$limit=$_GET["limit"];
}

$products = ProductData::getAll();
if(count($products)>0){

if($page==1){
$curr_products = ProductData::getAllByPage($products[0]->ID_PRODUCTO,$limit);
}else{
$curr_products = ProductData::getAllByPage($products[($page-1)*$limit]->ID_PRODUCTO,$limit);

}
$npaginas = floor(count($products)/$limit);
 $spaginas = count($products)%$limit;

if($spaginas>0){ $npaginas++;}

	?>

	<h3>Pagina <?php echo $page." de ".$npaginas; ?></h3>
<div class="btn-group pull-right">
<?php
$px=$page-1;
if($px>0):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=products&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
<?php endif; ?>

<?php 
$px=$page+1;
if($px<=$npaginas):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=products&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
<?php endif; ?>
</div>
<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Categoria</th>
		<th>Minima</th>
		<th>Activo</th>
		<th>Destacado</th>
		<th>Existencia</th>
		<th></th>
	</thead>
	<?php foreach($curr_products as $product):?>
	<tr>
		<td><?php echo $product->CODIGO; ?></td>
		<td>
			<?php if($product->FOTO!=""):?>
				<img src="storage/products/<?php echo $product->FOTO;?>" style="width:64px;">
			<?php endif;?>
		</td>
		<td><?php echo $product->NOMBRE; ?></td>
		<td>$ <?php echo number_format($product->PRECIO,2,'.',','); ?></td>
		
		<td><?php if($product->CATEGORIA_ID!=null){echo $product->getCategory()->NOMBRE;}else{ echo "<center>----</center>"; }  ?></td>
		<td><?php echo $product->INVENTARIO_MIN; ?></td>
        <td style="width:90px;"><center><?php if($product->ES_PUBLICO):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
        <td style="width:90px;"><center><?php if($product->ES_DESTACADO):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>	
        <td style="width:90px;"><center><?php if($product->EN_EXISTENCIA):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
		

		<td style="width:70px;">
		<a href="index.php?view=editproduct&PRODUCTO_ID=<?php echo $product->ID_PRODUCTO; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<!-- <a href="index.php?action=delproduct&PRODUCTO_ID=<?php echo $product->ID_PRODUCTO; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

for($i=0;$i<$npaginas;$i++){
	echo "<a href='index.php?view=products&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
}
?>
</div>
<form class="form-inline">
	<label for="limit">Limite</label>
	<input type="hidden" name="view" value="products">
	<input type="number" value=<?php echo $limit?> name="limit" style="width:60px;" class="form-control">
</form>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay productos</h2>
		<p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
	</div>
	<?php
}

?>

	</div>
</div>

