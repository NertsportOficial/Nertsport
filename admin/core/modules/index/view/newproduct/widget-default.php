        <!-- Main Content -->

          <div class="row">
            <div class="col-md-12">
  <!-- Button trigger modal -->


            <h2>NUEVO PRODUCTO</h2>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-star"></i> Nuevo Producto
                </div>
                <div class="panel-body ">

<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?action=addproduct">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Codigo</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" name="CODIGO" placeholder="Codigo">
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" name="NOMBRE" placeholder="Nombre del producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
      <textarea class="form-control" id="inputPassword1" placeholder="Descripcion" rows="6" name="DESCRIPCION"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio</label>
    <div class="col-lg-10">
      <div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control" placeholder="Precio" required name="PRECIO">
</div>    </div>
  </div>
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Imagenes</label>
    <div class=" col-lg-3">
      <input type="file" name="FOTO">
    </div>
    <div class="col-lg-3">
      <input type="file" name="FOTO1">
    </div>
    <div class="col-lg-1">
      <input type="file" name="FOTO2">
    </div>
    
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-2">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="ES_PUBLICO"> Es Visible
        </label>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="EN_EXISTENCIA"> En Existencia
        </label>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="ES_DESTACADO"> Producto Destacado
        </label>
      </div>
    </div>

  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Genero</label>
    <div class="col-lg-10">
<?php
$categories = UnitData::getAll();
 if(count($categories)>0):?>
<select name="GENERO_ID" class="form-control" required>
<option value="">-- SELECCIONE GENERO --</option>

<?php foreach($categories as $cat):?>
<option value="<?php echo $cat->ID_GENERO; ?>"><?php echo $cat->NOMBRE; ?></option>
<?php endforeach; ?>
</select>
 <?php endif; ?>

    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Marcas</label>
    <div class="col-lg-10">
<?php
$categories = CategoryData::getAll();
 if(count($categories)>0):?>
<select name="CATEGORIA_ID" class="form-control" required>
<option value="">-- SELECCIONE MARCA --</option>

<?php foreach($categories as $cat):?>
<option value="<?php echo $cat->ID_CATEGORIA; ?>"><?php echo $cat->NOMBRE; ?></option>
<?php endforeach; ?>
</select>
 <?php endif; ?>

    </div>
  </div>

<div class="form-group">
<label for="inputEmail1" class="col-lg-2 control-label">Inventario Minimo</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" name="INVENTARIO_MIN" placeholder="Inventario Minimo">
    </div>
    
    
</div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-6">
      <button type="submit" class="btn btn-primary btn-block">Agregar Producto</button>
    </div>
    <div class="col-lg-4">
      <button type="reset" class="btn btn-default btn-block">Limpiar Campos</button>
    </div>
  </div>
</form>
                  
                </div>
              </div>
            </div>

          </div>

<br><br>