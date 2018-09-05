<?php 
$p = ProductData::getById($_GET["PRODUCTO_ID"]);
Viewer::addView($p->ID_PRODUCTO,"PRODUCTO_ID","producto_ver");

 ?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-11">

  
    <div style="background:#141616;font-size:25px;color:white;padding:5px;"><?php echo $p->NOMBRE; ?></div>
<br>
<?php if($p!=null):
$img = "admin/storage/products/".$p->FOTO;
$img1 = "admin/storage/products/".$p->FOTO1;
$img2 = "admin/storage/products/".$p->FOTO2;
?>

<!--visualizacion de imagenes-->

 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="CSS/estilo12.css">

  <div class="centro" style="text-align: center">
  <div class="row">
    <div class="column">
    <img src="<?php echo $img; ?>"  onclick="myFunction(this);">
    </div>
    <div class="column">
    <img src="<?php echo $img1; ?>"  onclick="myFunction(this);">
    </div>
    <div class="column">
    <img src="<?php echo $img2; ?>"  onclick="myFunction(this);">
    </div>
  </div>

  <div class="container1">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <img id="expandedImg" width="650" height="450">
    <div id="imgtext"></div>
  </div>
</div>
<!--fin de visualizacion-->

<script>
function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}
</script>

    <h1>$ <?php echo number_format($p->PRECIO,2,".",","); ?></h1>
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
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span> No Disponible</a>

<?php elseif(!$in_cart):?>
<a href="index.php?action=addtocart&PRODUCTO_ID=<?php echo $p->ID_PRODUCTO; ?>&href=product" class="btn btn-labeled btn-primary tip" title="A&ntilde;adir al carrito">
<span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span> Comprar</a>
<?php else:?>
<a href="index.php?action=addtocart&PRODUCTO_ID=<?php echo $p->ID_PRODUCTO; ?>&href=product" class="btn btn-labeled btn-success tip" title="Ya esta en el carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span> Ya esta agregado</a>
<?php endif; ?>    
<br><br>

    <?php if($p->EN_EXISTENCIA):?>
      <p class="text-success">Producto en Existencia</p>
    <?php else:?>
      <p class="text-warning">Producto no disponible</p>
    <?php endif; ?>

 
  <h3>Codigo:</h3><p><?php echo $p->CODIGO; ?></p><br>
    <h3>Descripcion:</h3>
  <p><?php echo $p->DESCRIPCION; ?></p>


<?php endif; ?>



  </div>
  </div>


  </div>
  </section>