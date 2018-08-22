<?php
 $mysqli = new mysqli("localhost","root","","foparra");

 $salida="";
 $query="SELECT * FROM socio ORDER By id_socio";

if(isset($_POST['consulta'])){

     $q=$mysqli->real_escape_string($_POST['consulta']);
     $query="SELECT id_socio,Nombre,Apellido,Sexo,Num_doc,FechaNacimiento,Correo,Direccion,Foto FROM socio
     WHERE Nombre LIKE '%".$q."%' OR Apellido LIKE '%".$q."%' OR Sexo LIKE '%".$q."%' OR Num_doc LIKE '%".$q."%' OR FechaNacimiento LIKE '%".$q."%' OR Correo LIKE '%".$q."%' OR Direccion LIKE '%".$q."%'";

}
$resultado=$mysqli->query($query);
if($resultado->num_rows > 0){
$salida.=
"<table  class='tabla_datos'>
<thead>
<tr>
<td>ID</td>
<td>Nombre</td>
<td>Marca</td>
<td>Modelo</td>
</tr>
</thead>
<tbody>";
while($fila=$resultado->fetch_assoc()){
   $salida.="<tr>
   <td>".$fila['Cod_producto']."</td>
   <td>".$fila['Nombre']."</td>
   <td>".$fila['Marca']."</td>
   <td>".$fila['Modelo']."</td>
   </tr>";
}
$salida.="</tbody></table>";
}else{
 $salida.="No hay Dato :(";
}
 echo $salida;

 $mysqli->close();
?>