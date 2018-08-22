<!DOCTYPE html>
<html>
<title>Nert Sport</title>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="Imagenes/LOGO.jpg" width="20px">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="CSS/estilos1.css">
<link rel="shorcut icon" href="">
<script src="js/jquery-3.2.1.js"></script>
<script src="js/script.js"></script>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}

</style>
<body class="w3-content" style="max-width:1200px">

  

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar"></div>
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <img src="Imagenes/LOGO.jpg" width="200" height="90">



  <!-- formulario inicio de sesion-->
  <?php if(!isset($_SESSION["CLIENTE_ID"])):?>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">

   
      
    </li>
    </div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newslette').style.display='block'">INICIAR SESION</a>  
<div id="newslette" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      
      <i onclick="document.getElementById('newslette').style.display='none'" class="fa fa-remove w3-right w3-button w3-orange w3-large"></i><br>
      <h2 class="w3-wide">INICIAR SESIÓN</h2>
      <form class="form-horizontal" role="form" method="post" action="index.php?action=clientaccess">
      <input type="email" name="CORREO" class="w3-input w3-border" id="inputEmail1" placeholder="Correo Electronico"><br>
      <input type="password" name="PASSWORD" class="w3-input w3-border" id="inputPassword1" placeholder="Contrase&ntilde;a"><br>
      <input type="submit" class="w3-button w3-padding-large w3-orange w3-margin-bottom"></input></form>
    </div>
  </div>
</div>
 <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newslett').style.display='block'">REGISTRARSE</a> 
  <!-- formulario registro de usuario -->
    <div id="newslett" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newslett').style.display='none'" class="fa fa-remove w3-right w3-button w3-orange w3-large"></i><br>
      <h2 class="w3-wide">REGISTRO DE USUARIO</h2><br><br>
      <form class="form-horizontal" role="form" method="post" action="index.php?action=register">
      <p>NOMBRE</p>
      <input type="text" maxlength="40" class="w3-input w3-border" name="NOMBRE" id="inputEmail1" placeholder="Ingrese nombre" required=""><br>
      <p>APELLIDO</p>
      <input type="text" maxlength="50" class="w3-input w3-border"  name="APELLIDOS" id="inputEmail1" placeholder="Ingrese apellidos" required=""><br>
      <p>TELEFONO</p>
      <input type="text" maxlength="20" class="w3-input w3-border" name="TELEFONO" placeholder="Ingrese numero de telefono" required=""><br>
      <p>DIRECCION</p>
      <input type="text" maxlength="30" class="w3-input w3-border" name="DIRECCION" placeholder="Ingrese direccion de residencia" required=""><br>
      <p>CORREO</p>
      <input type="mail" maxlength="50" class="w3-input w3-border" name="CORREO" placeholder="Ingrese  correo electronico" required=""><br>
      <p>CONTRASEÑA</p>
      <input type="password" maxlength="15" minlength="8" class="w3-input w3-border" name="PASSWORD" placeholder="Ingrese contraseña" required=""><br>

      <label class="radio-inline"><input type="checkbox" name="ACEPTAR" required>Aceptar terminos y condiciones </label><br><br>

    
    <input type="submit" class="w3-button w3-padding-large w3-orange w3-margin-bottom"></input></form>

    </div>
  </div>
</div>
</div>
<a href="index.php?view=mycart" class="btn btn-block btn-default"><i class="fa fa-shopping-cart"></i> 
<?php if(isset($_SESSION["cart"])):?>
<span class="badge"><?php echo count($_SESSION["cart"]); ?></span>
<?php endif; ?>
</a>

<?php else:
$client = ClientData::getById($_SESSION["CLIENTE_ID"]);

?>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">

   <h3 class="w3-center">Bienvenido </h3>
      
    </li>
    </div>
         
         <p class="w3-center"><img src="Imagenes/usu.png" class="w3-circle" width="100" height="100"><center><h3><?php echo $client->NOMBRE." ".$client->APELLIDO;?></h3></center></p></center>
         <center><p><a href="logout.php"><i class="fa fa-circle-o-notch fa-fw w3-margin-right w3-text-theme"></i> Cerrar Sesion </p></a>
          
      <button type="button" onclick="window.location='index.php?view=client'" class="btn">Mis Compras</button><br><br>
      <a href="index.php?view=mycart" class="btn btn-block btn-default"><i class="fa fa-shopping-cart"> Mi carrito</i> 
<?php if(isset($_SESSION["cart"])):?>
<span class="badge"> <?php echo count($_SESSION["cart"]); ?></span>
<?php endif; ?>
</a> 

<?php endif; ?>   
      <br><br>
      <ul class="nav nav-tabs">
      <?php
$cats = CategoryData::getPublics();
?>
<?php if(count($cats)>0):?>
    <li><a class="w3-bar-item w3-button" data-toggle="dropdown" href="#"><i class="fa fa-th-list"></i> Productos<b class="caret"></b></a>
      <ul class="dropdown-menu">
        <?php foreach($cats as $cat):?>
          <li><a href="index.php?view=productos&cat=<?php echo $cat->NOMBRE_CORTO; ?>" class="category_item"><?php echo $cat->NOMBRE; ?></a></li>
<?php endforeach; ?>
       <li><a href="index.php?view=productos" class="category_item"> Todos</a></li>
        </ul>
      </li>
<?php endif; ?>
    <br><br>
    <li><a href="./" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Inicio</a>
    <a href="#galeria" class="w3-bar-item w3-button">Galeria</a>
    <a href="index.php?view=contacto" class="w3-bar-item w3-button"><i  class="fa fa-envelope"></i> Contactanos</a>
    
</ul>
</nav>   
<br>
<div class="w3-main" style="margin-left:250px">
    <form class="form-horizontal" role="form">
<div class="input-group">
<input type="hidden" name="view" value="productos">
<input type="hidden" name="act" value="search">
      <input type="text" name="Q" placeholder="Buscar productos ..." class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
      </span>
    </div><!-- /input-group -->
</form>
<br>
  <!-- formulario administrador -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-orange w3-large"></i><br>
      <h2 class="w3-wide">ADMINISTRADOR</h2>
      <form method="POST" action="PHP/compruebaAD.php">
      <input class="w3-input w3-border" type="text" name="login" placeholder="Ingrese Usuario"><br>
      <input class="w3-input w3-border" type="password" name="password" placeholder="Ingrese Contraseña"><br>
      <input type="submit" class="w3-button w3-padding-large w3-orange w3-margin-bottom" value="Iniciar sesión"></input></form>
<form method="post" action="RegistroAD.html">   
<input type="submit" class="w3-button w3-padding-large w3-orange w3-margin-bottom" value="Registrarse"></input></form>

   
    </div>
  </div>
</div>

<div id="news" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('news').style.display='none'" class="fa fa-remove w3-right w3-button w3-orange w3-large"></i><br>
      <h2 class="w3-wide">VENDEDOR</h2>
      <form method="POST" action="index.php?action=selleraccess">
      <input class="w3-input w3-border" type="text" name="USUARIO" placeholder="Ingrese Usuario"><br>
      <input class="w3-input w3-border" type="password" name="PASSWORD" placeholder="Ingrese Contraseña"><br>
      <input type="submit" class="w3-button w3-padding-large w3-orange w3-margin-bottom" value="Iniciar sesión"></input></form>

    </div>
  </div>
</div>
 </nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">NERT SPORT</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
<!--   <header class="w3-container w3-xlarge">
    <p class="w3-right">
      <i class="fa fa-shopping-cart w3-margin-right"></i>
      </header>
 -->


  <!-- Image header -->
<?php View::load("index"); ?>
</ul>

<br><br>
        
    <br><br>
  
  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="Contactenos">
    <div class="w3-row-padding">
        <div class="w3-col s4 w3-justify" class="w3-container w3-black w3-padding-32">
        <h4>Encuentranos en</h4>
        <h6><p><i class="fa fa-fw fa-map-marker"></i> Patio Bonito, Bogota D.C</p>
        <p><i class="fa fa-fw fa-phone"></i> Tel: +57 310256107</p>
        <p><i class="fa fa-fw fa-envelope"></i> Correo: duverr@mail.com</p></h6>
      </div>

<!--       <div class="w3-col s4" text="w3-center">
          <h4>Quienes Somos</h4>
          <p>
            Nert Sport Te Brinda Nuestros Productos
            De Forma Sencilla Y Practica, Con Maxima
            Seguridad, Para Una Mayor Comodidad
            Confiabilidad Con Nuestro Sistema.
          </p>
      </div> -->

      <div class="w3-col s4 w3-justify">
        <h4>Aceptamos </h4>
        <h6><p><i class="fa fa-fw fa-cc-amex"></i> Giro </p>
        <p><i class="fa fa-fw fa-credit-card"></i> Tarjeta debito</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Contraentrega</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Tarjeta credito</p></h6>
        <br>
    </div>
    </div>
  </footer>
   <div class="w3-black w3-center w3-padding-24"> <a href="javascript:void(0)" title="W3.CSS" target="_blank"  class="w3-hover-opacity" onclick="document.getElementById('newsletter').style.display='block'">Administrador</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <a href="javascript:void(0)" title="W3.CSS" target="_blank"  class="w3-hover-opacity" onclick="document.getElementById('news').style.display='block'">Vendedor</a>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="">Acerca de</a></div>




             
  <!-- End page content -->
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

</body>
</html>
