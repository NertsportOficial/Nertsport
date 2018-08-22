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
session_start();
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
       
         <h4 class="w3-center">Bienvenido Administrador<span></span></h4>
         <p class="w3-center"><img src="usua.png" class="w3-circle" width="100" height="100"><center><h3><?php echo "" . $_SESSION["usuario"]; ?></h3></center></p>
         <p><a href="../PHP/cerrar_sesion.php"><i class="fa fa-circle-o-notch fa-fw w3-margin-right w3-text-theme"></i> <center>Cerrar sesion </center></p></a>
         
        </div>
        <br>
        <br>
      </div><p><a type="button" href="../producto.index.php" class="w3-button w3-black w3-padding-large w3-large" onclick="document.getElementById('newsletter').style.display='block'">Productos</a></p> 

     <p><a type="button" href="javascript:void(0)" class="w3-button w3-black w3-padding-large w3-large" onclick="document.getElementById('newslette').style.display='block'">Reportes</a></p> 

      <div id="newslette" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white">
      <i onclick="document.getElementById('newslette').style.display='none'" class="fa fa-remove w3-right w3-button w3-orange w3-large">X</i><br>
      <h2 class="w3-wide" ><p align="center"> Reportes </p></h2>

      <a href="../pdf/Registros_U.php"><input type="submit" name="R_usuarios" value="Usuarios registrados" class="w3-button w3-black w3-padding-large "></a><br><br>
      <a href="../pdf/Registros_A.php"><input type="submit" name="R_Admin" value="Administradores registrados" class="w3-button w3-black w3-padding-large "></a><br><br>
       <a href="../pdf/Registros_P.php"><input type="submit" name="R_productos" value="Productos registrados" class="w3-button w3-black w3-padding-large "></a>
    </div></div></div> 
      


      <p><a type="button"href="javascript:void(0)" class="w3-button w3-black w3-padding-large w3-large" onclick="document.getElementById('newsletter').style.display='block'">Clientes</a></p> 
      <!-- Inicio Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-orange w3-large">X</i><br>
      <h2 class="w3-wide" ><p align="center"> Clientes</p></h2>
      <?php
        class login{
        private $servidor="localhost";
        private $usuario="root";
        private $contrasena="";
        private $based="nertsport";

        public function conexion(){
            $this->conexion=mysqli_connect($this->servidor,$this->usuario,$this->contrasena,$this->based);

        }               
        public function mostrar(){
            $consulta="SELECT * FROM registro";
            $resultado=$this->conexion->query($consulta);
            while($row=mysqli_fetch_assoc($resultado)){
      ?>
      <br><br>
          <div class="col-sm-9">            
            <table class="table table-striped">
              <tbody>
                <tr><td><b>ID_cliente</b><br><?php echo $row['ID_CLI'];?></td></tr>
                  <tr><td><b>Nombres</b><br><?php echo $row['NOMBRES'];?></td></tr>
                  <tr><td><b>Apellidos</b><br><?php echo $row['APELLIDOS'];?></td></tr>
                  <tr><td><b>Tipo Documento</b><br><?php echo $row['TIPO_DOC'];?></td></tr>
                 <tr> <td><b>Numero de Documento</b><br><?php echo $row['NUM_DOC'];?></td></tr>
                  <tr><td><b>Telefono Fijo</b><br><?php echo $row['TEL_FIJ'];?></td></tr>
                  <tr><td><b>Celular</b><br><?php echo $row['CELULAR'];?></td><tr>
                  <tr><td><b>Correo</b><br><?php echo $row['CORREO'];?></td></tr>
                   <tr><td><b>Dirección</b><br><?php echo $row['DIRECCION'];?></td></tr>
                   <tr><td><b>Usuario</b><br><?php echo $row['USERNAME'];?></td></tr>
                </tr>
              </tbody>
            </table>
            <a href="modificar1.php?Id=<?php echo $row['ID_CLI'];?>"><button class="btn" data-toggle="modal">
            <span class="glyphicon glyphicon-ok"></span> Modificar
          </button></a>
          </div>
      <?php
      }
    }
  }
    $Emp=new login();
    $Emp->conexion();
    $Emp->mostrar();
?></p>
      <br>
      
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
		
	</header>
	<nav id="main-nav" style="max-width:1200px">
		<ul >
			<li ><a class="current" href="">Inicio</a></li>
			<li ><a  href="#0">Gategoria</a></li>
			<li ><a href="#0">Galeria</a></li>
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
 <?php include "conection.php"; 
$products = $con->query("select * from product");
?>
  
  
<?php 

while($r=$products->fetch_object()):?>
  <!-- Product grid --> 
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
<img src="../Imagenes/thumb.jpg" style="width:100%">
        <span class="w3-tag w3-display-topleft"><?php echo $r->name;?><p><b>$ <?php echo $r->price; ?></b></p></span>
        <?php
	$found = false;

	if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}}
	?>
	
	<form class="form-inline0" method="post" action="addtocart1.php">
	<input type="hidden" name="product_id" value="<?php echo $r->id; ?>">
	  <div class="form-group">
	   
	  </div>
	  <div class="w3-display-middle w3-display-hover">
	  <button type="submit" class="w3-button w3-black">Ver Producto</button>
		</div>
	</form>	
        </div>
        
      </div>
         

		
          </div>
        
      <?php
	$found = false;

	if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}}
	?>

 <?php endwhile; ?>
      </div>
      
      </div>
      


  <div class="w3-black w3-center w3-padding-24"></div>

  <!-- End page content -->
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Ingrese Usuario"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

<div id="cd-shadow-layer"></div>

	<div id="cd-cart">
	<?php

include "conection.php";
$products = $con->query("select * from product");
if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
?>
		<h2>Cart</h2>
		<?php
				foreach($_SESSION["cart"] as $c):
				$products = $con->query("select * from product where id=$c[product_id]");
				$r = $products->fetch_object();
				?>
		<ul class="cd-cart-items">
			<li>
				<span class="cd-qty">x<?php echo $c["q"];?></span> <?php echo $r->name;?>
				<div class="cd-price">Precio unitario: $<?php echo $r->price; ?></div>
				<div class="cd-price">Precio total: $<?php echo $c["q"]*$r->price; ?></div>
				<?php
				$found = false;
				foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}
				?>
        <a href="delfromcart1.php?id=<?php echo $c["product_id"];?>" class="cd-item-remove cd-img-replace">Remove</a>
			</li>"
				
		</ul>
    
	
<?php endforeach;?>	
			<?php endif;?>
			
			</a>
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

</body>
</html>
