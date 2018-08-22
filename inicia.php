<html>
<head>
<link rel="stylesheet" type="text/css" href="consola1.css">
<title>Mostrar Registros</title>

</head>
<body >
<div id="tabla" background-image="fonfo.png" background-repeat: no-repeat;>
<center>

<H1>PERFIL ADMINISTRADOR</H1>

	<table border="4" bordercolor="#000000" bordercolordark="#4e4d4d">
    	<tr>
        <td colspan="6" bgc>Listado De Registros</td>
        <td colspan="3"><a href="registro.php">Nuevo</a></td>
        </tr>
        <tr>
        <td>Codigo de usuario</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Telefono</td>
        <td>Correo</td>
        <td>Direccion</td>
        <td></td>
        <td colspan="3">Opciones</td>
        </tr>
        <?php
        include("conexion.php");
        $query="SELECT * FROM registro";
        $resultado=$conexion->query($query);
        while($row = $resultado->fetch_assoc()){
        ?>
        <tr>
        <td> <?php echo $row['COD_USUARIO']; ?></td>
        <td> <?php echo $row['NOMBRE']; ?></td>
        <td> <?php echo $row['APELLIDO']; ?></td>
        <td> <?php echo $row['TELEFONO']; ?></td>
        <td> <?php echo $row['CORREO']; ?></td>
        <td> <?php echo $row['DIRECCION']; ?></td>
        <td><a href="modificar.php?id=<?php echo $row['COD_USUARIO']; ?>">Modificar</a></td>
        </tr>
        <?php
        }
        ?>
        </table>
        </center>
        </div>
</body>
</html>
