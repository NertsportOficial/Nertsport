<!DOCTYPE html>
<html lang="en">
<head>
  <title>NeRt Sport</title>
  <link rel="icon" type="image/png" href="../Imagenes/LOGO.jpg" width="20px" >
  <meta charset="ISO-8859-1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
        height: 200px;
        
    
    }
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #D8D6D6;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<?php
session_start();
if(!isset($_SESSION["usu"])){

  header("Location:../index.php");
}
?>
<body>
<div class="col-sm-12">
<br><br><br><br><br><br><br>
    <!-- No tocar este DIV -->
</div>
<div class="col-sm-4">
    <!-- No tocar este DIV -->
</div>
<div class="col-sm-4 sidenav">
<div class="container-fluid">
<center>
    <br><br>
     <img src="NeRT.png" width="300" height="90">
     <h2>Ventas presenciales</h2>
     <p class="w3-center"><img src="usua.png" class="w3-circle" width="100" height="100"><center><h3>VENDEDOR</h3></center></p>
      <ul class="nav nav-pills nav-stacked">
        <li class="active">
        <li><button type="button" class="w3-button w3-orange"><a href="javascript:void(0)"onclick="document.getElementById('newslett').style.display='block'">Realizar venta</a></button></li>
        <br><br>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
       

  <!-- formulario registro de usuario -->
    <div id="newslett" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newslett').style.display='none'" class="fa fa-remove w3-right w3-button w3-orange w3-large">X</i><br>
      <center>
      <h2 class="w3-wide">Formulario de Venta</h2><br>

     <form method="post" action="../pdf/Factura_Venta.php">
   
    
    <h3>DATOS DE FACTURA</h3><br>
    
<table>
  <tr>
    <td>Fecha:</td>
    <td><input type="text" name="fecha_factura" value="<?php echo date("d-m-Y"); ?>" size="15"></td>

  </tr>
    <tr>
    <td>Nombre Vendedor:</td>
    <td><input type="text" name="Nombre_vendedor" placeholder="Ingrese nombre vendedor"  size="15"></td>
  </tr>
   <tr>
    <td><hr></td>
    <td><hr></td>
 </tr>
 <tr>
    <td>Nombre de la tienda:</td>
    <td><input type="text" name="nombre_tienda" value="Duver R. Sport" size="15"></td>
 </tr>
 <tr>
    <td>Dirección de la tienda:</td>
    <td><input type="text" name="direccion_tienda" value="Dg 38 sur N.83B 20 " size="15"></td>
 </tr>
 <tr>
    <td>Barrio de la tienda:</td>
    <td><input type="text" name="poblacion_tienda" value="Patio Bonito" size="15"></td>
 </tr>
 <tr>
    <td>Ciudad de la tienda:</td>
    <td><input type="text" name="provincia_tienda" value="Bogota D.C" size="15"></td>
 </tr>
 <tr>
    <td>Teléfono de la tienda:</td>
    <td><input type="text" name="telefono_tienda" value="317 - 502 - 6842" size="15"></td>
 </tr>
 <tr>
    <td><hr></td>
    <td><hr></td>
 </tr>
 <tr>
    <td>Nombre del cliente:</td>
    <td><input type="text" name="nombre_cliente" placeholder="Ingrese nombre del cliente" size="30"></td>
 </tr>
 <tr>
    <td>Apellidos del cliente:</td>
    <td><input type="text" name="apellidos_cliente" placeholder="Ingrese apellidos del cliente" size="30"></td>
 </tr>
 <tr>
    <td>Dirección del cliente:</td>
    <td><input type="text" name="direccion_cliente" placeholder="Ingrese direccion del cliente" size="30"></td>
 </tr>
 <tr>
    <td>Barrio del cliente:</td>
    <td><input type="text" name="poblacion_cliente" placeholder="Ingrese barrio o localidad del cliente" size="30"></td>
 </tr>
 <tr>
    <td>Ciudad del cliente:</td>
    <td><input type="text" name="provincia_cliente" value="Bogota D.C" size="30"></td>
 </tr>
 <tr>
    <td>Identificacion del cliente:</td>
    <td><input type="text" name="identificacion_cliente" placeholder="Numero de identificacion del cliente" size="30"></td>
 </tr>
  <tr>
    <td><hr></td>
    <td><hr></td>
 </tr>
 <tr>
   <td>Producto:</td>
   <td><input type="text" name="nombre_producto" placeholder="Ingrese nombre del producto" size="20" ></td>
 </tr>
 <tr>
   <td>Precio del producto:</td>
   <td><input type="text" name="precio_producto" placeholder="Ingrese precio del producto" size="20"></td>
 </tr>
 <tr>
   <td>Cantidad:</td>
   <td><input type="text" name="cantidad_producto" placeholder="Ingrese cantidad de productos" size="20"></td>
 </tr>
</table>

<!-- Campo que hace la llamada al script que genera la factura -->
<input type="hidden" name="generar_factura" value="true">
<br><br>
 <button type="submit">GENERAR FACTURA PDF</button>
</form>
</center>

    </div>
  </div>
</div>

        <br>
        
         
         
         
</center>
</div>
<div class="col-sm-4">
    <!-- No tocar este DIV -->
</div>
</body>
</html>

