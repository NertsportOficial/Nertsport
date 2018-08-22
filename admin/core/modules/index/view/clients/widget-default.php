        <!-- Main Content -->

<div class="btn-group pull-right">
  <a href="index.php?view=newclient" class="btn btn-default"><i class='fa fa-smile-o'></i> Nuevo Cliente</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
    <h1>Directorio de Clientes</h1>
<br>
    <?php

    $users = ClientData::getAll();
    if(count($users)>0){
      // si hay usuarios
      ?>

      <table class="table table-bordered table-hover">
      <thead>
      <th>Nombre completo</th>
      <th>Direccion</th>
      <th>Email</th>
      <th>Telefono</th>
      <th></th>
      </thead>
      <?php
      foreach($users as $user){
        ?>
        <tr>
        <td><?php echo $user->NOMBRE." ".$user->APELLIDO; ?></td>
        <td><?php echo $user->DIRECCION; ?></td>
        <td><?php echo $user->CORREO; ?></td>
        <td><?php echo $user->TELEFONO; ?></td>
        <td style="width:130px;">
        
        <!-- <a href="index.php?action=delclient&CLIENTE_ID=<?php echo $user->ID_CLIENTE; ?>" class="btn btn-danger btn-xs">Eliminar</a> -->
        </td>
        </tr>
        <?php

      }



    }else{
      echo "<p class='alert alert-danger'>No hay clientes</p>";
    }


    ?>

