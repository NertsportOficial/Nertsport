<?php 
$cnt=0;

$news = ProductData::getFeatureds();
?>
<section>
  <div class="container">

  <div class="row">

  <div class="col-md-12">
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
  <section>
<div class="container"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel"
  >
<!-- Indicadores --> 

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
      <li data-target="#myCarousel" data-slide-to="8"></li>
      <li data-target="#myCarousel" data-slide-to="9"></li>
    </ol>

<!-- contenedor para diapositivas--> 

<div class="carousel-inner">
      <div class="item active">
        <img src="Imagenes/Ejercicio.jpg" alt="Img1" style="width:100%;height:700px">
      </div>

      <div class="item">
        <img src="Imagenes/Ejercicio1.jpg" alt="img2" style="width:100%;height:700px">
      </div>
    
      <div class="item">
        <img src="Imagenes/1.jpg" alt="img3" style="width:100%;height:700px">
      </div>

      <div class="item">
        <img src="Imagenes/2.jpg" alt="img4" style="width:100%;height:700px">
      </div>

      <div class="item">
        <img src="Imagenes/3.jpg" alt="img5" style="width:100%;height:700px">
      </div>

      <div class="item">
        <img src="Imagenes/4.jpg" alt="img6" style="width:100%;height:700px">
      </div>

      <div class="item">
        <img src="Imagenes/5.jpg" alt="img7" style="width:100%;height:700px">
      </div>

      <div class="item">
        <img src="Imagenes/6.jpg" alt="img8" style="width:100%;height:700px">
      </div>

      <div class="item">
        <img src="Imagenes/7.jpg" alt="img9" style="width:100%;height:700px">
      </div>

      <div class="item">
        <img src="Imagenes/8.jpg" alt="img10" style="width:100%;height:700px">
      </div>
    </div>

    <!-- controles -->
    
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</section>
<br><br>

<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<center><a href="./"><div style="background:#141616;font-size:25px;color:white;padding:5px;">Productos Destacados</div></a></center>
<br>
<?php

$nproducts = count($news);
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
$p = $news[$n];
}
?>
<?php if($p!=null):
$img = "admin/storage/products/".$p->FOTO;
?>
  <div class="col-md-4">
 <center>   <img src="<?php echo $img; ?>"  style="width:180px;height:180px;"></center>
  <h4 class="text-center"><?php echo $p->NOMBRE; ?></h4>
<h3 class="text-center text-primary">$ <?php echo number_format($p->PRECIO,2,".",","); ?></h3>
<?php 
$in_cart=false;
if(isset($_SESSION["cart"])){
  foreach ($_SESSION["cart"] as $pc) {
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
