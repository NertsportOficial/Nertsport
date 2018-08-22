<h1 class="page-header">Productos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Producto&a=Crud">Nuevo Producto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:120px;"></th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Marca</th>
            <th style="width:10px;">Talla</th>
            <th style="width:60px;">Precio</th>
            <th style="width:200px;">Descripcion</th>
            <th style="width:80px;">Color</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    
    <tr>
        <td colspan="8" class="text-center">
            <a href="?c=Producto&a=excel">Exportar a Excel</a>
        </td>
    </tr>
    
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td>
                <?php if($r->__GET('FOTO') != ''): ?>
                    <img src="uploads/<?php echo $r->__GET('FOTO'); ?>" style="width:100%;" />
                <?php endif; ?> 
            </td>
            <td><?php echo $r->__GET('NOMPRO'); ?></td>
            <td><?php echo $r->__GET('MARCA'); ?></td>
            <td><?php echo $r->__GET('TALLA'); ?> </td>
            <td><?php echo $r->__GET('PRECIO'); ?></td>
            <td><?php echo $r->__GET('DESCRIPCION'); ?></td>
            <td><?php echo $r->__GET('COLOR'); ?></td>
            <td>
                <a href="?c=Producto&a=Crud&COD_PRODUCTO=<?php echo $r->COD_PRODUCTO; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Producto&a=Eliminar&COD_PRODUCTO=<?php echo $r->COD_PRODUCTO; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    
    <tfoot>
        <tr>
            <td colspan="8" class="text-center">
                <a href="?c=Producto&a=excel">Exportar a Excel</a>
            </td>
        </tr>
    </tfoot>
</table> 
