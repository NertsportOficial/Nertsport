<html>
<head>
<title>Modificar</title>
</head>
<body>
<style type="text/css">

  table{
       border-color:#FF8000;
       border-radius: 10px;
       align-content: center;
  }
  input{
    border-radius: 5px;
    font-family: 'Arial';
  }
  h1{
    font-family: 'Arial';
  }

</style>
  <?php
  $conexion=new mysqli("localhost", "root", "", "nertsport");
  $Id = $_REQUEST['Id'];
  $query="SELECT * FROM registro WHERE ID_CLI = '$Id'";
  $resultado = $conexion->query($query);
  $row = $resultado->fetch_assoc();
  ?>
  <center>
    <IMG src="NeRT.png" height="100">
    <h1>Actualizar Datos del cliente</h1>
    <form method="POST" action = "Guardar1.php?Id=<?php echo $Id;?>">
    <table border="4">
    <tr>
        <td><font color="#000000">Nombres</td> <td><input type="text" name="Nombres" value="<?php echo $row['NOMBRES'];?>" required /></td>
    </tr>
    <tr>
        <td><font color="#000000">Apellidos:</td> <td><input type="text" name="Apellidos" value="<?php echo $row['APELLIDOS'];?>" required /></td>
    </tr>
    <tr>
        <td><font color="#000000">Tipo Documento</td> <td><input type="text" name="Td" value="<?php echo $row['TIPO_DOC'];?>" required/></td> 
    </tr>
    <tr>
        <td><font color="#000000">Numero Documento</td> <td><input type="text" name="Nd" value="<?php echo $row['NUM_DOC'];?>" required/></td> 
    </tr>
    <tr>
        <td><font color="#000000">Telefono Fijo:</td> <td><input type="text" name="Tf" value="<?php echo $row['TEL_FIJ'];?>" required/></td> 
    </tr>
    <tr>
        <td><font color="#000000">Celular:</td> <td><input type="text" name="Celular" value="<?php echo $row['CELULAR'];?>" required/></td> 
    </tr>
    <tr>
        <td><font color="#000000">Correo:</td> <td><input type="text" name="Correo" value="<?php echo $row['CORREO'];?>" required/></td> 
    </tr>
    <tr>
        <td><font color="#000000">Direccion:</td> <td><input type="text" name="Direccion" value="<?php echo $row['DIRECCION'];?>" required/></td> 
    </tr>
    <tr>
        <td><font color="#000000">Usuario:</td> <td><input type="text" name="Username" value="<?php echo $row['USERNAME'];?>" required/></td> 
    </tr>
    <tr>
    <td><input type="submit" value="Modificar" /> </td></form> 
      <td><a href="Admi.php"> <input type="button" value="Volver"></a></td>
    </tr>
      </table>
  </center>
</body>
</html>