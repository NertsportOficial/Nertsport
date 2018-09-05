<?php 
if(isset($_GET["cat"])){
$cat = CategoryData::getByPreffix($_GET["cat"]);
$products = ProductData::getPublicsByCategoryId($cat->ID_CATEGORIA);
}else if(isset($_GET["opt"])){
if($_GET["opt"]=="news"){
$products = ProductData::getNews();
}
else if($_GET["opt"]=="offers"){
$products = ProductData::getOffers();
}

}else if(isset($_GET["act"]) && $_GET["act"]=="search"){
$products = ProductData::getLike($_GET["Q"]);

}

?>
<section>
  <div class="container">

  <div class="row">

  <div class="col-md-11">
    <div style="background:#333;font-size:25px;color:white;padding:5px;"><?php 
    if(isset($_GET["act"]) && $_GET["act"]!=""){ echo "Busqueda: ".$_GET["Q"]; }else { echo $cat->NOMBRE; } ?></div>
<br>
<?php

$nproducts = count($products);
$filas = $nproducts/3;
$extra = $nproducts%3;
if($filas>1&& $extra>0){ $filas++; }
$n=0;
?>
<?php for($i=0;$i<$filas;$i++):?>
  <div class="row">
<?php for($j=0;$j<3;$j++):
$p=null;
if($n<$nproducts){
$p = $products[$n];
}
?>
<?php if($p!=null):
$img = "admin/storage/products/".$p->FOTO;
?>
  <div class="col-md-4">
 <center>   <img src="<?php echo $img; ?>"  style="width:120px;height:120px;"></center>
  <h4 class="text-center"><?php echo $p->NOMBRE; ?></h4>
<h3 class="text-center text-primary">$ <?php echo number_format($p->PRECIO,2,".",","); ?></h3>
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
 if(!$p->EN_EXISTENCIA):?>

<a href="javascript:void()" class="btn btn-labeled btn-sm btn-warning tip" title="No disponible">
                <span class="btn-label"><i class="glyphicon glyphicon-eye-close"></i></span> No Disponible</a> <a href="index.php?view=producto&PRODUCTO_ID=<?php echo $p->ID_PRODUCTO; ?>" class="btn btn-labeled btn-sm btn-warning tip"><span class="btn-label"><i class="glyphicon glyphicon-th"></i></span> Detalles</a>
<br>

<?php elseif(!$in_cart):?>

<a href="index.php?action=addtocart&PRODUCTO_ID=<?php echo $p->ID_PRODUCTO; ?>&href=cat" class="btn btn-labeled btn-sm btn-primary tip" title="A&ntilde;adir al carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span> Comprar</a> <a href="index.php?view=producto&PRODUCTO_ID=<?php echo $p->ID_PRODUCTO; ?>" class="btn btn-labeled btn-sm btn-primary tip"><span class="btn-label"><i class="glyphicon glyphicon-th"></i></span> Detalles</a>
<br>
<?php else:?>
<center><a href="javascript:void()" class="btn btn-labeled btn-sm btn-success tip" title="Ya esta en el carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span> Ya esta agregado</a> <a href="index.php?view=producto&PRODUCTO_ID=<?php echo $p->ID_PRODUCTO; ?>" class="btn btn-labeled btn-sm btn-success tip"><span class="btn-label"><i class="glyphicon glyphicon-th"></i></span> Detalles</a>
<br>
<?php endif; ?>
<br>
</center>

  </div>
<?php endif; ?>
<?php $n++; endfor; ?>
  </div>
<?php endfor; ?>



  </div>
  </div>


  </div>
  </section>
