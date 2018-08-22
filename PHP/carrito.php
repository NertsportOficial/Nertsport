<!DOCTYPE html>
<html>
<head>
<title>NeRt Sport</title>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="../Imagenes/LOGO.jpg" width="20px" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../CSS/Styles1.css"	>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../side-shopping-cart/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../side-shopping-cart/css/style.css"> <!-- Gem style -->
    <script src="../side-shopping-cart/js/modernizr.js"></script> <!-- Modernizr -->

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
	</head>
<?php

 require_once("class.php");
   $obj=new Trabajo();

if(!isset($_SESSION["usuario"])){

  header("Location:../inicio.html");
}
?>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px"><br><br>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i><br><br><br>
    
  </div>
 <br><br>
 <div class="w3-card w3-round w3-white">
        <div class="w3-container">
        <img src="NeRT.png" width="300" height="90">
        <br>
       
         <h4 class="w3-center">Bienvenido <span></span></h4>
         <p class="w3-center"><img src="usu.png" class="w3-circle" width="100" height="100"><center><h3><?php echo "" . $_SESSION["usuario"]; ?></h3></center></p>
         <p><a href="../PHP/cerrar_sesion.php"><i class="fa fa-circle-o-notch fa-fw w3-margin-right w3-text-theme"></i> Editar perfil </p></a>
         <p><a href="../PHP/cerrar_sesion.php"><i class="fa fa-circle-o-notch fa-fw w3-margin-right w3-text-theme"></i> cerrar sesion </p></a>
         
        </div>
      </div>
      <br>
 
      <button type="button" class="btn">Mis productos</button>
      <button type="button" onclick="window.location='carrito.php'" class="btn">Mi carrito</button>
      
</nav>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header>
	
		<div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
		<div id="cd-cart-trigger"><a class="cd-img-replace" href="#0">Cart</a></div>
	</header>
	<nav id="main-nav" style="max-width:1200px">
		<ul >
			<li ><a class="current" href="">Inicio</a></li>
			<li ><a  href="#0">Gategoria</a></li>
			<li ><a href="#0">Galeria</a></li>
			<li ><a href="#footer">Contactanos</a></li>
		</ul>
	</nav><br><br>

  <!-- Image header -->
  <div class="w3-display-container w3-container">
    <div class="w3-display-topleft w3-text-black" style="padding:24px 48px">
    </div>
  </div>

 <br><br>
 <div class="w3-container w3-text-grey" id="jeans">
    <p>Productos</p>
  </div>
  <div class="w3-row w3-grayscale">
  <!-- Product grid -->
  <div class="container">
  <h2>Carrito de compras  </h2>
  <p></p>                                                                                      
  <div class="table-responsive"> 
  <?php $obj->carro(); ?>
    <?php
      if (isset($_SESSION["carro"])) {
      $totalcoste=0;
      $Total=0;
  ?>         
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Peticion Normal</th>
        <th>Ajax</th>
        <th>&nbsp;</th>
        <th>Total</th>
      </tr>
    </thead>
    <?php
    foreach ($_SESSION["carro"] as $key=>$valor) {
      error_reporting(0);
      $fi=$obj->getProductosPorId($key);
      foreach($fi as $fila){
      $id=$fila["COD_PRODUCTO"];
      $producto=$fila["NOMPRO"];
      $precio=$fila["PRECIO"];
      }
      $coste=$precio*$valor;
      $totalcoste=$totalcoste+$coste;
      $Total=$Total+$valor;
    ?>
    <tbody>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $producto; ?></td>
        <td><?php echo $valor; ?></td>
        <td>
        <a href="?COD_PRODUCTO=<?php echo $id ?>&action=add"><img src="../Icons/Mas.png" alt="aumentar" title="aumentar"></a>
        <a href="?COD_PRODUCTO=<?php echo $id ?>&action=remove"><img src="../Icons/Menos.png" alt="restar" title="restar"></a>
        <a href="?COD_PRODUCTO=<?php echo $id ?>&action=removeProd"><img src="../Icons/Borrar.png" alt="eliminar" title="eliminar"></a>
      </td>
      <td>
        <input onchange="add3(<?php echo $id; ?>,'sum',$(this).val());" type="text" value="<?php echo $valor; ?>" class="input">
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;=</td>
      <td style="width: 10px"><?php echo $coste ?>$</td> 
        <td>COP</td>
      </tr>
      <?php  }  ?>
      <tr>
      <td><h4>Total productos</h4><?php echo $_SESSION["cantidadTotal"]; ?></td>
      <td><h4>Precio total</h4>$ <?php echo $_SESSION["totalcoste"]; ?></td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
<?php
  }
  error_reporting(0);
  $_SESSION['totalcoste']=$totalcoste;
  $_SESSION['cantidadTotal']=$Total;
?>
</div>
<button class="w3-button w3-black" onclick="window.location='comprar.php'" class="btn success">Finalizar compra</button>
<button class="w3-button w3-black" onclick="window.location='index1.php'" class="btn success">Seguir comprando</button>
<br><br><br><br><br><br><br><br><br><br>
  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">

      <div class="w3-col s4 w3-justify">
        <h4>Tienda</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Duver R. Sport</p>
        <p><i class="fa fa-fw fa-phone"></i> 3102526107</p>
        <p><i class="fa fa-fw fa-envelope"></i> duverr@gmail.com</p>
        <h4>Aceptamos</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Codensa</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Efectivo</p>
        <br>
        <a href="https://www.facebook.com/NicolasGutierrez219"><i class="fa fa-facebook-official w3-hover-opacity w3-large"></i></a>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24"></div>

  <!-- End page content -->
</div>


<div id="cd-shadow-layer"></div>

  <div id="cd-cart">

    <h2>Cart</h2>
    <?php
    foreach ($_SESSION["carro"] as $key=>$valor) {
      error_reporting(0);
      $fi=$obj->getProductosPorId($key);
    ?>
    <ul class="cd-cart-items">
      <li>
        <span class="cd-qty">x<?php echo $valor; ?></span> <?php echo $producto; ?>
        <div class="cd-price">Precio unitario: $<?php echo $precio; ?></div>
        <div class="cd-price">Precio total: $<?php echo $coste ?></div>
        <a href="?COD_PRODUCTO=<?php echo $id ?>&action=removeProd"><img src="../Icons/Borrar.png" alt="eliminar" title="eliminar"></a>
       </li>
<?php  }  ?>
      <div class="cd-price"><h4>   Total productos</h4><?php echo $_SESSION["cantidadTotal"]; ?></div>
      <div class="cd-price"><h4>   Precio total</h4>$ <?php echo $_SESSION["totalcoste"]; ?></div>
      
      </ul>

      <?php
  
  error_reporting(0);
  $_SESSION['totalcoste']=$totalcoste;
  $_SESSION['cantidadTotal']=$Total;
?>
      
    <p class="cd-go-to-cart"><a href="cart.php">Pagina del carrito</a></p>
  </div> <!-- cd-cart -->
<script src="../jquery.min.js"></script>
<script src="../side-shopping-cart/js/main.js"></script> <!-- Gem jQuery -->
<script>
// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
</p>
</p>
</div>
</div>
</nav>
</body>
</html>