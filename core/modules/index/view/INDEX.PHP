<!DOCTYPE html>
<html>
<title>Nert Sport</title>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="Imagenes/LOGO.jpg" width="20px">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">

    </div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newslette').style.display='block'">INICIAR SESION</a>  

  <!-- formulario inicio de sesion-->
<div id="newslette" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <?php if(!isset($_SESSION["CLIENTE_ID"])):?>
      <i onclick="document.getElementById('newslette').style.display='none'" class="fa fa-remove w3-right w3-button w3-orange w3-large"></i><br>
      <h2 class="w3-wide">INICIAR SESIÓN</h2>
      <form class="form-horizontal" role="form" method="post" action="index.php?action=clientacce ss">
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
      <h2 class="w3-wide">REGISTRO DE USUARIO</h2>
      <form class="form-horizontal" role="form" method="post" action="index.php?action=register">
      <input type="text" maxlength="40" class="w3-input w3-border" name="NOMBRE" id="inputEmail1" placeholder="Ingrese nombre" required=""><br>

      <input type="text" maxlength="50" class="w3-input w3-border"  name="APELLIDOS" id="inputEmail1" placeholder="Ingrese apellidos" required=""><br>

    <input type="text" maxlength="20" class="w3-input w3-border" name="TELEFONO" placeholder="Ingrese numero de telefono" required=""><br>

    <input type="text" maxlength="30" class="w3-input w3-border" name="DIRECCION" placeholder="Ingrese direccion de residencia" required=""><br>

    <input type="text" maxlength="50" class="w3-input w3-border" name="CORREO" placeholder="Ingrese  correo electronico" required=""><br>

    <input type="password" maxlength="15" minlength="8" class="w3-input w3-border" name="PASSWORD" placeholder="Ingrese contraseña" required=""><br>

    <label class="radio-inline"><input type="checkbox" name="ACEPTAR" required>Aceptar terminos y condiciones </label>
    
    <input type="submit" class="w3-button w3-padding-large w3-orange w3-margin-bottom"></input></form>

    </div>
  </div>
</div>
<?php else:
$client = ClientData::getById($_SESSION["CLIENTE_ID"]);
?>
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
         <p class="w3-center"><img src="usu.png" class="w3-circle" width="100" height="100"><center><h3><?php echo $client->NOMBRE." ".$client->APELLIDO;?></h3></center></p>
         <p><a href="index.php?view=client"><i class="fa fa-circle-o-notch fa-fw w3-margin-right w3-text-theme"></i>Inicio </p></a>
         <p><a href="logout.php"><i class="fa fa-circle-o-notch fa-fw w3-margin-right w3-text-theme"></i> Cerrar Sesion </p></a>
         
        </div>
      </div>
      <br>
 
      <button type="button" class="btn">Mis Compras</button>
      <button type="button" onclick="window.location='carrito.php'" class="btn">Mi carrito</button>
      
</nav>
</nav>
<?php endif; ?>   
      <ul class="nav nav-tabs">
      <?php
$cats = CategoryData::getPublics();
?>
<?php if(count($cats)>0):?>
    <li><a class="w3-bar-item w3-button" data-toggle="dropdown" href="#">Productos <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <?php foreach($cats as $cat):?>
          <li><a href="index.php?view=productos&cat=<?php echo $cat->NOMBRE_CORTO; ?>" class="category_item"><?php echo $cat->NOMBRE; ?></a></li>
<?php endforeach; ?>
        </ul>
      </li>
<?php endif; ?>
  <li><a href="index.php?view=contacto"><i class="fa fa-envelope"></i> Contactanos</a></li> 
    </ul>
    <a href="#" class="w3-bar-item w3-button">Inicio</a>
    <a href="#galeria" class="w3-bar-item w3-button">Galeria</a>
    <a href="#Contactenos" class="w3-bar-item w3-button">Contactenos</a>

   

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
      <form method="POST" action="PHP/compruebaV.php">
      <input class="w3-input w3-border" type="text" name="login" placeholder="Ingrese Usuario"><br>
      <input class="w3-input w3-border" type="password" name="password" placeholder="Ingrese Contraseña"><br>
      <input type="submit" class="w3-button w3-padding-large w3-orange w3-margin-bottom" value="Iniciar sesión"></input></form>

    </div>
  </div>
</div>
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
<!--   <header class="w3-container w3-xlarge">
    <p class="w3-right">
      <i class="fa fa-shopping-cart w3-margin-right"></i>
      </header>
 -->


  <!-- Image header -->
  <section>
<div class="container"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- contenedor para diapositivas--> 
<center>
<div class="w3-content w3-section" style="max-width:5000px">
  <img class="mySlides" src="Imagenes/Ejercicio.jpg"  style="width:100%" id="Inicio">
  <img class="mySlides" src="Imagenes/1.jpg"  style="width:100%">
  <img class="mySlides" src="Imagenes/2.jpg" style="width:100%">
  <img class="mySlides" src="Imagenes/3.jpg" style="width:100%">
  <img class="mySlides" src="Imagenes/4.jpg" style="width:100%">
</div>
</center>
   

    <!-- indicadores -->
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
<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 000);
}
</script>
</ul>

<br><br>


<?php View::load("index"); ?>
        
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
