<section>
<center>
    <h1>Actualizar Datos</h1>
  <?php
  $conexion=new mysqli("localhost", "root", "", "nertsport");
  $Id = $_REQUEST['Id'];
  $query="SELECT * FROM cliente WHERE ID_CLIENTE = '$Id'";
  $resultado = $conexion->query($query);
  $row = $resultado->fetch_assoc();
  ?>
    <form method="POST" action = "guardar.php?Id=<?php echo $Id;?>">
    <table border="2">
    <tr>
        <td><font color="#F9C4C4">Nombre</td> <td><input type="text" name="nombre" value="<?php echo $row['NOMBRE'];?>" required /></td> <br> <br>
    </tr>
    <tr>
        <td><font color="#F9C4C4">Apellido:</td> <td><input type="text" name="apellido" value="<?php echo $row['APELLIDO'];?>" required /></td> <br> <br>
    </tr>
    <tr>
        <td><font color="#F9C4C4">Correo:</td> <td><input type="text" name="correo" value="<?php echo $row['CORREO'];?>" required/></td> <br> <br>
    </tr>
    <tr>
        <td><font color="#F9C4C4">Telefono:</td> <td><input type="text" name="telefono" value="<?php echo $row['TELEFONO'];?>" required/></td> <br> <br>
    </tr>
    <tr>
        <td><font color="#F9C4C4">Direccion:</td> <td><input type="text" name="direccion" value="<?php echo $row['DIRECCION'];?>" required/></td> <br> <br>
    </tr>
    
    <tr>
    <td><input type="submit" value="Modificar" /> </td> 
      <td><a href="opcion1.php">
            <input type="submit" value="Volver">
      </a></td>
    </tr>
      </table>
    </form>
  </center>
</section>