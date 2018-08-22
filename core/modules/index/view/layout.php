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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" type='text/css' href="css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="CSS/estilos1.css">
<link rel="stylesheet" href="CSS/Estilos.css">
<link rel="shorcut icon" href="">
<script src="js/jquery-3.2.1.js"></script>
<script src="js/script.js"></script>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}

</style>
<body class="w3-content" style="max-width:1200px;zoom:90%">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">


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
        <label id="icon" for="name"><i class="icon-user "></i></label>
        <input type="text" name="CORREO" id="name" placeholder="Correo Electronico" required/></input><br>
        <label id="icon" for="name"><i class="icon-key "></i></label>
        <input type="password"  maxlenght="16" name="PASSWORD" id="name" placeholder="Contrase&ntilde;a" required/></input><br><br>
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
      <form class="form-horizontal" role="form" method="post" id="changepasswd" action="index.php?action=register">
        <label id="icon" for="name"><i class="icon-user "></i></label>
        <input type="text" name="NOMBRE" id="name" placeholder="Nombre" required/></input><br>

        <label id="icon" for="name"><i class="icon-user "></i></label>
        <input type="text1" name="APELLIDO" id="name" placeholder="Apellido" required/></input>
          <input type="radio" value="None" id="male" name="gender" checked/>
          <label for="male" class="radio" chec>Hombre</label>
          <input type="radio" value="None" id="female" name="gender" />
          <label for="female" class="radio">Mujer</label><br>
        <label id="icon" for="name"><i class="icon-th "></i></label>
        <input type="text2" name="NUM_DOC" id="name" placeholder="Numero de Documento" required/></input>
        <input type="radio" value="None" id="C.C" name="1" checked/>
          <label for="C.C" class="radio" chec>C.C</label>
          <input type="radio" value="None" id="T.I" name="1" />
          <label for="T.I" class="radio">T.I</label>
          <input type="radio" value="None" id="C.E" name="1" />
          <label for="C.E" class="radio">C.E</label><br>
        <label id="icon" for="name"><i class="icon-phone "></i></label>
        <input type="text" name="TELEFONO" id="name" placeholder="Telefono" required/></input><br>
        <label id="icon" for="name"><i class="icon-map-marker "></i></label>
        <input type="text" name="DIRECCION" id="name" placeholder="Direccion de residencia" required/></input><br>
        <label id="icon" for="name"><i class="icon-envelope "></i></label>
        <input type="text" name="CORREO" id="name" placeholder="Correo Electronico" required/></input><br>
        <label id="icon" for="name"><i class="icon-shield "></i></label>
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required/></input><br>
        <label id="icon" for="name"><i class="icon-key "></i></label>
        <input type="password" name="PASSWORD" id="confirmar_contraseña" placeholder="Contraseña" required/></input><br>


      <label class="radio-inline"><input type="checkbox" name="ACEPTAR" required>Aceptar terminos y condiciones </label><br><br>


    <input type="submit" class="w3-button w3-padding-large w3-orange w3-margin-bottom"></input>
<script>
$("#changepasswd").submit(function(e){
  
    if($("#contraseña").val() == $("#confirmar_contraseña").val()){
//      alert("Correcto");      
    }else{
      e.preventDefault();
      alert("La contraseña no coincide con la confirmacion.");
    
  }
});

</script>

  </form>

    </div>
  </div>
</div>
</div>
<a href="index.php?view=mycart" class="btn btn-block btn-default"><i class="fa fa-shopping-cart"></i>
<?php if(isset($_SESSION["carrito"])):?>
<span class="badge"><?php echo count($_SESSION["carrito"]); ?></span>
<?php endif; ?>
</a>

<!-- usuario perfil -->
<?php else:
$client = ClientData::getById($_SESSION["CLIENTE_ID"]);

?>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">

   <h3 class="w3-center">Bienvenido</h3>
      
    </li>
    </div>
  
         <p class="w3-center"><?php if(!$client->avatar):?><img src="imagenes/avatar.png" width="130" height="130" class="w3-circle" style="border: 2px solid #A4A4A4;"><?php else: ?><img src="<?php echo $client->avatar; ?>" width="130" height="130" class="w3-circle" style="border: 2px solid #A4A4A4;"><?php endif; ?>
     <center>     
    <div class="dropdown">
    <button class="btn btn-black dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $client->NOMBRE." ".$client->APELLIDO;?>

    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="index.php?view=editarperfil&Id=<?php echo $_SESSION['CLIENTE_ID'];?>"><i class="fa-fw w3-margin-right w3-text-theme"></i> Editar perfil </p></a></li>
      <li><a href="logout.php"><i class="fa-fw w3-margin-right w3-text-theme"></i> Cerrar Sesion </p></a></li>
    </ul>
  </div>
  </center>
          <br><br>
      
      <a href="index.php?view=mycart" class="btn btn-block btn-default"><i class="fa fa-shopping-cart"> Mi carrito</i>

<?php if(isset($_SESSION["carrito"])):?>
<span class="badge"> <?php echo count($_SESSION["carrito"]); ?></span>
<?php endif; ?>

</a> 
<a href="index.php?view=client" class="btn btn-block btn-default"><i class="fa fa-usd"> Mis compras</i>  </a>
<!-- fin usuario perfil   -->
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
       <li><a href="index.php?view=productotodo" class="category_item"> Todos</a></li>
        </ul>
      </li>
<?php endif; ?>
    <br><br>
    <li><a href="./" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Inicio</a>

  <ul class="nav nav-tabs">
 <?php
$Generos = UnitData::getPublics();
?>
<?php if(count($Generos)>0):?>
    <li><a class="w3-bar-item w3-button" data-toggle="dropdown" href="#"><i class="fa fa-male"></i> Genero<b class="caret"></b></a>
      <ul class="dropdown-menu">
       <br>
        <?php foreach($Generos as $Genero):?>
          <li><a href="index.php?view=Generos&Genero=<?php echo $Genero->NOMBRE_CORTO; ?>" class="category_item"><?php echo $Genero->NOMBRE; ?></a></li>
<?php endforeach; ?>
       <li><a href="index.php?view=productotodo" class="category_item"> Todos</a></li>
        </ul>
      </li>
      <?php endif; ?>
    <a href="index.php?view=contacto" class="w3-bar-item w3-button"><i  class="fa fa-envelope"></i> Contactanos</a>
    

</ul>
</nav>
<br>
<div  class="w3-main" style="margin-left:270px; width: 1140px">
    <form class="form-horizontal" role="form">
<div class="input-group">
<input type="hidden" name="view" value="productos">
<input type="hidden" name="act" value="search">
      <input style="top: -6px;" type="text" name="Q" placeholder="Buscar productos ..." class="form-control">
      <span class="input-group-btn">
        <button style="width: 100px; height: 40px; " class="btn btn-primary" type="submit">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
      </span>
    </div><!-- /input-group -->
</form>
</div>
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
      <label id="icon" for="name"><i class="icon-user "></i></label>
        <input type="text" name="CORREO" id="name" placeholder="Correo Electronico" required/></input><br>
        <label id="icon" for="name"><i class="icon-key "></i></label>
        <input type="password" name="PASSWORD" id="name" placeholder="Contrase&ntilde;a" required/></input><br><br>

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

 

  <!-- Image header -->
<div style="margin-left: 238px">
<?php View::load("index"); ?>
</div>
</ul>

<br><br>

    <br><br>
           
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
