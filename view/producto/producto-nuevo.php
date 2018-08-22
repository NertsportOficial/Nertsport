<h1 class="page-header">
    <?php echo $alm->__GET('COD_PRODUCTO') != null ? $alm->__GET('NOMPRO') : 'Registro Múltiple de productos'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Producto">Productos</a></li>
  <li class="active">Registro de Productos</li>
</ol>

<form id="frm-alumno" action="?c=Producto&a=CrearMultiple" method="post" enctype="multipart/form-data">
    
    <div id="alumnos" class="row">
<div id="lo-que-vamos-a-copiar">
    <div class="col-xs-4">
        <div class="well well-sm">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="NOMPRO[]" class="form-control" placeholder="Nombre del producto" data-validacion-tipo="requerido|min:3" />
            </div>

         <div class="form-group">
<label>Marca</label> &nbsp <select required class="campo" name="MARCA[]">
        <option></option>
        <?php

        $servidor="Localhost";
        $usuario="root";
        $contrasena="";
        $based="nertsport";

           $conexion=mysqli_connect($servidor,$usuario,$contrasena,$based);
           $consultar="SELECT * FROM marcas";
           $resultados=mysqli_query($conexion,$consultar);
           while ($row=mysqli_fetch_assoc($resultados)) {
            echo "<option value='".$row['ID_MARCA']."'>".$row['NOM_MARCA']."</option>";
           }
        ?>
       </select>    
   </div> 
            <div class="form-group">
                <label>Talla</label>
                <select name="TALLA[]" class="form-control">
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                </select>
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input type="text" name="PRECIO[]" class="form-control" placeholder="Indique el precio" data-validacion-tipo="requerido" />
            </div>

            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" name="DESCRIPCION[]" class="form-control" placeholder="Redacte una breve descripcion del producto" data-validacion-tipo="requerido" />
            </div>

            <div class="form-group">
                <label>Color</label>
                <select name="COLOR[]" class="form-control">
                    <option value="Azul">Azul</option>
                    <option value="Amarillo">Amarillo</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Blanco">Blanco</option>
                    <option value="Negro">Negro</option>
                    <option value="Verde">Verde</option>
                    <option value="Naranja">Naranja</option>
                </select>
            </div>
            
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="FOTO[]" placeholder="Ingrese una imagen" />
                    </div>     
                </div>
            </div>  
        </div>
    </div>            
</div>
<div class="col-xs-4">
    <div class="well">
        <button id="btn-alumno-agregar" class="btn btn-lg btn-block btn-default" type="button">Agregar</button>                
    </div>
</div>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success btn-lg btn-block">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        
        // El formulario que queremos replicar
        var formulario_alumno = $("#lo-que-vamos-a-copiar").html();
        
// El encargado de agregar más formularios
$("#btn-alumno-agregar").click(function(){
    // Agregamos el formulario
    $("#alumnos").prepend(formulario_alumno);

    // Agregamos un boton para retirar el formulario
    $("#alumnos .col-xs-4:first .well").append('<button class="btn-danger btn btn-block btn-retirar-alumno" type="button">Retirar</button>');

    // Hacemos focus en el primer input del formulario
    $("#alumnos .col-xs-4:first .well input:first").focus();

    // Volvemos a cargar todo los plugins que teníamos, dentro de esta función esta el del datepicker assets/js/ini.js
    Plugins();
});
        
        // Cuando hacemos click en el boton de retirar
        $("#alumnos").on('click', '.btn-retirar-alumno', function(){
            $(this).closest('.col-xs-4').remove();
        })
            
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>