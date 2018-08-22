<html>
<head>
<title>Modificar Registro</title>
<link rel="icon" type="image/png" href="Imagenes/LOGO.jpg" width="20px">
</head>

<style type="text/css">
 .input{
           width: 280px;
                height: 35px;
                padding: 0px 10px;
                margin: 10px 30px;
                color:#0d0d0d;
                text-align: center;

        }

        form input {
                width: 200px;
                height: 35px;
                padding: 0px 10px;
                margin: 10px 30px;
                color:#000;
                text-align: center;
                border-radius: 5px 5px;
            } 
    table{
    border-radius: 10px;
    border-color: black;
    margin: 0 auto;
    padding:10px 20px 10px 10px;
    overflow:hidden;
    width: 30%;
    background: #ffffff;
    border: 5px solid #fff;
    border-radius: 15px 15px 15px 15px;
-moz-border-radius: 15px 15px 15px 15px;
-webkit-border-radius: 15px 15px 15px 15px;
border: 3px solid #000000;

            }
        h1{
          font-family: impact;
        }
</style>
<body>
  <center>  
  <?php
  $conexion=new mysqli("localhost", "root", "", "nertsport");
  $Id = $_REQUEST['Id'];
  $query="SELECT * FROM cliente WHERE ID_CLIENTE = '$Id'";
  $resultado = $conexion->query($query);
  $row = $resultado->fetch_assoc();
  ?>

  <br><br><br><img src="imagenes/NeRt.png" width="300" height="80">
    <form method="POST" action = "guardar.php?Id=<?php echo $Id;?>" enctype="multipart/form-data">
    <table>
      <tr><td><center><h1>Editar perfil</h1></center></td></tr>
 <tr>
          <td><font color="#FF8000">Foto de perfil:</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="<?php echo $row['avatar']; ?>" width="100" height="100"><br>
          <label for="fileField"></label>
          <input type="file" name="avatar" id="fileField"></td>
    </tr>

    <tr>
        <td><font color="#FF8000">Nombre:</td> <td><input type="text" name="nombre" value="<?php echo $row['NOMBRE'];?>" required /></td> 
    </tr>
    <tr>
        <td><font color="#FF8000">Apellido:</td> <td><input type="text" name="apellido" value="<?php echo $row['APELLIDO'];?>" required /></td> 
    </tr>
    <tr>
        <td><font color="#FF8000">Correo:</td> <td><input type="text" name="correo" value="<?php echo $row['CORREO'];?>" required/></td> 
    </tr>
    <tr>
        <td><font color="#FF8000">Telefono:</td> <td><input type="text" name="telefono" value="<?php echo $row['TELEFONO'];?>" required/></td>
    </tr>
    <tr>
        <td><font color="#FF8000">Direccion:</td> <td><input type="text" name="direccion" value="<?php echo $row['DIRECCION'];?>" required/></td>
    </tr>
   
  </table>
<br><br>
    
<a href="./"> <input type="button" value="Volver"></a>

<input type="submit" value="Guardar cambios"/>

     
  </form>
  </center>
</body>
</html>