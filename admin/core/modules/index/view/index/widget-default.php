  <?php
  $found=true;
$products = ProductData::getAll();
foreach($products as $product){
  $q=OperationData::getQYesF($product->ID_PRODUCTO); 
  if($q<=$product->INVENTARIO_MIN){
    $found=true;
    break;

  }
}
  ?>
<div class="row">
<div class="col-md-12">
<h1><strong>BIENVENIDO A NERT SPORT</strong></h1>
</div>
</div>
<center>
<div class="row">
        <?php if(isset($_SESSION["admin_id"])): $u = UserData::getById($_SESSION["admin_id"]);?>
          <?php if($u->ADMIN):?>
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo count(ProductData::getAll());?></h3>

              <p>Productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="./?view=products" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php endif;?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo count(SellData::getAll());?></h3>

              <p>Ventas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?view=sells" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>	
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(ClientData::getAll());?></h3>

              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?view=clients" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php if($u->ADMIN):?>
        <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count(CategoryData::getAll());?></h3>

              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="./?view=categories" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>   
        </center>
      <?php endif;?>
      <?php endif;?>
<?php if($u->ADMIN):?>
      <div class="row">
  <div class="col-md-12">
<?php if($found):?>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/alerts-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
<?php endif;?>

</div>
<div class="clearfix"></div>
<?php if(count($products)>0){?>
<br><table class="table table-bordered table-hover">
  <thead>
    <th >Codigo</th>
    <th>Nombre del producto</th>
    <th>En Stock</th>
    <th></th>
  </thead>
  <?php
foreach($products as $product):
  $q=OperationData::getQYesF($product->ID_PRODUCTO);
  ?>
  <?php if($q<=$product->INVENTARIO_MIN):?>
  <tr class="<?php if($q==0){ echo "danger"; }else if($q<=$product->INVENTARIO_MIN/2){ echo "danger"; } else if($q<=$product->INVENTARIO_MIN){ echo "warning"; } ?>">
    <td><?php echo $product->ID_PRODUCTO; ?></td>
    <td><?php echo $product->NOMBRE; ?></td>
    <td><?php echo $q; ?></td>
    <td>
    <?php if($q==0){ echo "<span class='label label-danger'>No hay existencias.</span>";}else if($q<=$product->INVENTARIO_MIN/2){ echo "<span class='label label-danger'>Quedan muy pocas existencias.</span>";} else if($q<=$product->INVENTARIO_MIN){ echo "<span class='label label-warning'>Quedan pocas existencias.</span>";} ?>
    </td>
  </tr>
<?php endif;?>
<?php
endforeach;
?>
</table>

<div class="clearfix"></div>

  <?php
}else{
  ?>
  <div class="jumbotron">
    <h2>No hay alertas</h2>
    <p>Por el momento no hay alertas de inventario, estas se muestran cuando el inventario ha alcanzado el nivel minimo.</p>
  </div>
  <?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
  </div>
<?php endif;?>
</div>


