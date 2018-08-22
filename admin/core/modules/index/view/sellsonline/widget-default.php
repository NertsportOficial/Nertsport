<?php

$buys =  BuyData::getAll();


?>
        <!-- Main Content -->

          <div class="row">
          <div class="col-md-12">
          <h1><i class='glyphicon glyphicon-shopping-cart'></i> Lista de Ventas</h1>
          </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-tasks"></i> Ventas
                </div>
                <div class="widget-body medium no-padding">

                  <div class="table-responsive">
<?php if(count($buys)>0):?>
                    <table class="table table-bordered">
                    <thead>
                      <th></th>
                      <th>Operacion</th>
                      <th>Cliente</th>
                      <th>Total</th>
                      <th>Estado</th>
                      <th>Fecha</th>
                    </thead>
<?php foreach($buys as $b):?>
                        <tr>
                        <td><a href="index.php?view=openbuy&COMPRA_ID=<?php echo $b->ID_COMPRA; ?>" class="btn btn-xs btn-default">Detalles</a></td>
                        <td>#<?php echo $b->ID_COMPRA; ?></td>
                        <td><?php echo $b->getClient()->getFullname(); ?></td>
                        <td>$ <?php echo number_format($b->getTotal(),2,".",","); ?></td>
                        <td><?php echo $b->getStatus()->NOMBRE; ?></td>
                        <td><?php echo $b->CREADO_EN; ?></td>
                        </tr>
<?php endforeach; ?>
                    </table>
<?php else:?>
  <div class="panel-body">
  <h1>No hay operaciones</h1>
  </div>
<?php endif; ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
