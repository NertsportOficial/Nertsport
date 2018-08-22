<?php 
$p = ProductData::getById($_GET["PRODUCTO_ID"]);
Viewer::addView($p->ID_PRODUCTO,"PRODUCTO_ID","producto_ver");

 ?>
<section>
  <div class="container">

  <div class="row">

  <div class="col-md-9">
    <div style="background:#141616;font-size:25px;color:white;padding:5px;"><?php echo $p->NOMBRE; ?></div>
<br>
<?php if($p!=null):
$img = "admin/storage/products/".$p->FOTO;
?>
  <div class="row">
  <div class="col-md-8">
 <center>   <img src="<?php echo $img; ?>"  style="width:50%;height:280px;"></center>

  </div>
  <br><br>

  <div class="col-md-4">
<h1>$ <?php echo number_format($p->PRECIO,2,".",","); ?></h1><br>

<?php 
$in_cart=false;
if(isset($_SESSION["cart"])){
  foreach ($_SESSION["cart"] as $pc) {
    if($pc["PRODUCTO_ID"]==$p->ID_PRODUCTO){ $in_cart=true;  }
  }
  }

  ?>
<?php if(!$p->EN_EXISTENCIA):?>
<a href="javascript:void()" class="btn btn-labeled btn-warning tip" title="No Disponible">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>No Disponible</a>

<?php elseif(!$in_cart):?>
<a href="index.php?action=addtocart&PRODUCTO_ID=<?php echo $p->ID_PRODUCTO; ?>&href=product" class="btn btn-labeled btn-primary tip" title="A&ntilde;adir al carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>Comprar</a>
<?php else:?>
<a href="index.php?action=addtocart&PRODUCTO_ID=<?php echo $p->ID_PRODUCTO; ?>&href=product" class="btn btn-labeled btn-success tip" title="Ya esta en el carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>Ya esta agregado</a>
<?php endif; ?>    
<br><br>

    <?php if($p->EN_EXISTENCIA):?>
      <p class="text-success">Producto en Existencia</p>
    <?php else:?>
      <p class="text-warning">Producto no disponible</p>
    <?php endif; ?>
  </div>
  </div>
  <br><br>
  <div class="row">
  <div class="col-md-12">
  <hr>
  <h3>Codigo:</h3><h4><?php echo $p->CODIGO; ?></h4><br><br>
  <p><?php echo $p->DESCRIPCION; ?></p>
</div>
</div>

<?php endif; ?>



  </div>
  </div>


  </div>
  </section>
