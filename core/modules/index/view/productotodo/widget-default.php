<?php 
$cnt=0;

$todos = ProductData::getAll();
if(count($todos)>0):
?>
<section>
  <div class="container">

  <div class="row">

  <div class="col-md-12">
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
 
<br><br>

<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<center><a href="./"><div style="background:#141616;font-size:25px;color:white;padding:5px;">Productos</div></a></center>
<br>

<?php foreach($todos as $todo):

$img = "admin/storage/products/".$todo->FOTO;
?>
  <div class="col-md-4">
 <center>   <img src="<?php echo $img; ?>"  style="width:180px;height:180px;"></center>
  <h4 class="text-center"><?php echo $todo->NOMBRE; ?></h4>
<h3 class="text-center text-primary">$ <?php echo number_format($todo->PRECIO,2,".",","); ?></h3>
<?php 
$in_cart=false;
if(isset($_SESSION["carrito"])){
  foreach ($_SESSION["carrito"] as $pc) {
    if($pc["PRODUCTO_ID"]==$p->ID_PRODUCTO){ $in_cart=true;  }
  }
  }

  ?>
<center>

<?php
 if(!$todo->EN_EXISTENCIA):?>

<a href="javascript:void()" class="btn btn-labeled btn-sm btn-warning tip" title="No disponible">
                <span class="btn-label"><i class="glyphicon glyphicon-eye-close"></i></span> No Disponible</a> <a href="index.php?view=producto&PRODUCTO_ID=<?php echo $todo->ID_PRODUCTO; ?>" class="btn btn-labeled btn-sm btn-warning tip"><span class="btn-label"><i class="glyphicon glyphicon-th"></i></span> Detalles</a>
<br>

<?php elseif(!$in_cart):?>

<a href="index.php?action=addtocart&PRODUCTO_ID=<?php echo $todo->ID_PRODUCTO; ?>&href=cat" class="btn btn-labeled btn-sm btn-primary tip" title="A&ntilde;adir al carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span> Comprar</a> <a href="index.php?view=producto&PRODUCTO_ID=<?php echo $todo->ID_PRODUCTO; ?>" class="btn btn-labeled btn-sm btn-primary tip"><span class="btn-label"><i class="glyphicon glyphicon-th"></i></span> Detalles</a>
<br>
<?php else:?>
<center><a href="javascript:void()" class="btn btn-labeled btn-sm btn-success tip" title="Ya esta en el carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span> Ya esta agregado</a> <a href="index.php?view=producto&PRODUCTO_ID=<?php echo $todo->ID_PRODUCTO; ?>" class="btn btn-labeled btn-sm btn-success tip"><span class="btn-label"><i class="glyphicon glyphicon-th"></i></span> Detalles</a>
<br>
<?php endif; ?>
<br>
</center>

  </div>

<?php endforeach; ?>
<?php endif; ?>
  </div>




  </div>

  </div>


  </div>
  </section>