<h1 class="page-header">
    <?php echo $alm->__GET('COD_PRODUCTO') != null ? $alm->__GET('NOMPRO') : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Producto">Peliculas</a></li>
  <li class="active"><?php echo $alm->__GET('COD_PRODUCTO') != null ? $alm->__GET('NOMPRO') : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="COD_PRODUCTO" value="<?php echo $alm->__GET('COD_PRODUCTO'); ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="NOMPRO" value="<?php echo $alm->__GET('NOMPRO'); ?>" class="form-control" placeholder="Ingrese el nombre del producto" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Marca</label>
                <select name="MARCA" class="form-control">
        <?php

        $servidor="Localhost";
        $usuario="root";
        $contrasena="";
        $based="nertsport";

           $conexion=mysqli_connect($servidor,$usuario,$contrasena,$based);
           $consultar='SELECT * FROM marcas';
           $resultados=mysqli_query($conexion,$consultar);
           while ($row=mysqli_fetch_assoc($resultados)) {
            echo "<option value='".$row['ID_MARCA']."'>".$row['NOM_MARCA']."</option>";
           }
        ?>
             </select>

    </div>

    <div class="form-group">
        <label>Talla</label>
        <select name="TALLA" class="form-control">
            <option <?php echo $alm->__GET('TALLA') == 35 ? 'selected' : ''; ?> value="35">35</option>
            <option <?php echo $alm->__GET('TALLA') == 36 ? 'selected' : ''; ?> value="36">36</option>
            <option <?php echo $alm->__GET('TALLA') == 37 ? 'selected' : ''; ?> value="37">37</option>
            <option <?php echo $alm->__GET('TALLA') == 38 ? 'selected' : ''; ?> value="38">38</option>
            <option <?php echo $alm->__GET('TALLA') == 39 ? 'selected' : ''; ?> value="39">39</option>
            <option <?php echo $alm->__GET('TALLA') == 40 ? 'selected' : ''; ?> value="40">40</option>
            <option <?php echo $alm->__GET('TALLA') == 41 ? 'selected' : ''; ?> value="41">41</option>
            <option <?php echo $alm->__GET('TALLA') == 42 ? 'selected' : ''; ?> value="42">42</option>
            <option <?php echo $alm->__GET('TALLA') == 43 ? 'selected' : ''; ?> value="43">43</option>
            <option <?php echo $alm->__GET('TALLA') == 44 ? 'selected' : ''; ?> value="44">44</option>
            <option <?php echo $alm->__GET('TALLA') == 45 ? 'selected' : ''; ?> value="45">45</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>Precio</label>
        <input type="text" name="PRECIO" value="<?php echo $alm->__GET('PRECIO'); ?>" class="form-control" placeholder="Precio" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="DESCRIPCION" value="<?php echo $alm->__GET('DESCRIPCION'); ?>" class="form-control" placeholder="Descripcion del producto" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Color</label>
        <select name="COLOR" class="form-control">
            <option <?php echo $alm->__GET('COLOR') ? 'selected' : ''; ?> value="Azul">Azul</option>
            <option <?php echo $alm->__GET('COLOR') ? 'selected' : ''; ?> value="Amarillo">Amarillo</option>
            <option <?php echo $alm->__GET('COLOR') ? 'selected' : ''; ?> value="Rojo">Rojo</option>
            <option <?php echo $alm->__GET('COLOR') ? 'selected' : ''; ?> value="Blanco">Blanco</option>
            <option <?php echo $alm->__GET('COLOR') ? 'selected' : ''; ?> value="Negro">Negro</option>
            <option <?php echo $alm->__GET('COLOR') ? 'selected' : ''; ?> value="Verde">Verde</option>
            <option <?php echo $alm->__GET('COLOR') ? 'selected' : ''; ?> value="Naranja">Naranja</option>
        </select>
    </div>
    
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Foto</label>
                <input type="hidden" name="FOTO" value="<?php echo $alm->__GET('FOTO'); ?>" />
                <input type="file" name="FOTO" placeholder="Ingrese una imagen" />
            </div>     
        </div>
        <div class="col-xs-6">
            <?php if($alm->__GET('FOTO') != ''): ?>
                <div class="img-thumbnail text-center">
                    <img src="uploads/<?php echo $alm->__GET('FOTO'); ?>" style="width:50%;" />
                </div>
            <?php endif; ?>            
        </div>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>