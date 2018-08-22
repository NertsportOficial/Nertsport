<?php
$product = ProductData::getById($_GET["PRODUCTO_ID"]);
$url = "storage/products/$product->FOTO";
$url1 = "storage/products/$product->FOTO1";
$url2 = "storage/products/$product->FOTO2";
?>
        <!-- Main Content -->

          <div class="row">
            <div class="col-md-12">
  <!-- Button trigger modal -->
            <h2><?php echo $product->NOMBRE;  ?> <small>Editar</small></h2>
            <?php
            // print_r($_SESSION);
             if(isset($_SESSION["product_updated"])):?>
              <p class="alert alert-info"><i class="fa fa-check"></i> Producto Actualizado Exitosamente</p>
            <?php 
            unset($_SESSION["product_updated"]);
            endif; ?>
            </div>
            </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-pencil"></i> Editar Producto
                </div>
                <div class="panel-body ">
<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="index.php?action=updateproduct">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Codigo</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" name="CODIGO" value="<?php echo $product->CODIGO; ?>" placeholder="Codigo">
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" name="NOMBRE" value="<?php echo $product->NOMBRE; ?>" placeholder="Nombre del producto">
    </div>

  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
      <textarea class="form-control" id="inputPassword1" placeholder="Descripcion" rows="6" name="DESCRIPCION"><?php echo $product->DESCRIPCION; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio</label>
    <div class="col-lg-10">
      <div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control" placeholder="Precio" value="<?php echo $product->PRECIO; ?>" required name="PRECIO">
</div>    </div>
  </div>
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
    <br>
  <?php if( $product->FOTO!="" && file_exists($url)):?>
  <div style="
  
  padding:8px;
  float: left;
  background-color: #f5f5f5; 
  width: 390px; 
  border: 1px solid #999999;
  margin: 0 425px 0 15px; ">
<img src="<?php echo $url; ?>" width="370" height="250" alt="" style=" border: 1px solid #000000" >
	</div>
<?php endif; ?>

  <?php if( $product->FOTO1!="" && file_exists($url1)):?>
  <div style="
  
  padding:8px;
  float: left;
  background-color: #f5f5f5; 
  width: 385px; 
  border: 1px solid #999999;
  margin: 0 0px 0 -410px; ">
<img src="<?php echo $url1; ?>" width="365" height="250" alt="" style=" border: 1px solid #000000" >
  </div>
<?php endif; ?>

  <?php if( $product->FOTO2!="" && file_exists($url2)):?>
  <div style="
  
  padding:8px;
  float: left;
  background-color: #f5f5f5; 
  width: 420px; 
  border: 1px solid #999999;
 margin: 0 -405px 0 -10px; ">
<img src="<?php echo $url2; ?>" width="400" height="250" alt="" style=" border: 1px solid #000000" >
  </div>
<?php endif; ?>
<br>  <div class="form-group" >
    <div class="col-lg-offset-2 col-lg-2">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="ES_PUBLICO" <?php if($product->ES_PUBLICO){ echo "checked";} ?> > Es Visible
        </label>
      </div>
    </div>
    <br>
    <div class="col-lg-2">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="EN_EXISTENCIA" <?php if($product->EN_EXISTENCIA){ echo "checked";} ?>> En Existencia
        </label>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="ES_DESTACADO" <?php if($product->ES_DESTACADO){ echo "checked";} ?>> Producto destacado
        </label>
      </div>
  </div>
</div>
  <div class="form-group">
    
    </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Unidad</label>
    <div class="col-lg-10">
<?php
$categories = UnitData::getAll();
 if(count($categories)>0):?>
<select name="GENERO_ID" class="form-control">
<option value="">-- SELECCIONE GENERO --</option>
<?php foreach($categories as $cat):?>
<option value="<?php echo $cat->ID_GENERO; ?>" <?php if($product->GENERO_ID==$cat->ID_GENERO){ echo "selected";} ?>><?php echo $cat->NOMBRE; ?></option>
<?php endforeach; ?>
</select>
 <?php endif; ?>

    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-lg-10">
<?php
$categories = CategoryData::getAll();
 if(count($categories)>0):?>
<select name="CATEGORIA_ID" class="form-control">
<option value="">-- SELECCIONE CATEGORIA --</option>
<?php foreach($categories as $cat):?>
<option value="<?php echo $cat->ID_CATEGORIA; ?>" <?php if($product->CATEGORIA_ID==$cat->ID_CATEGORIA){ echo "selected";} ?>><?php echo $cat->NOMBRE; ?></option>
<?php endforeach; ?>
</select>
 <?php endif; ?>

    </div>
  </div>

  <div class="form-group">
<label for="inputEmail1" class="col-lg-2 control-label">Inventario Minimo</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" name="INVENTARIO_MIN" value="<?php echo $product->INVENTARIO_MIN; ?>" placeholder="Inventario Minimo">
    </div>
    
   
    
</div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-6">
      <button type="submit" class="btn btn-success btn-block">Editar Producto</button>
    </div>
    <div class="col-lg-4">
      <button type="reset" class="btn btn-default btn-block">Limpiar Campos</button>
    </div>
  </div>
  <input type="hidden" name="ID_PRODUCTO" value="<?php echo $_GET["PRODUCTO_ID"];?>">
</form>

                  
                </div>
              </div>
            </div>

          </div>

<br><br>