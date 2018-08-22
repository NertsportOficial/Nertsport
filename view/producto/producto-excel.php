<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <table>
            <thead>
                <tr style="background:#eee;">
                    <th style="width:180px;">Nombre</th>
                    <th>Marca</th>
                    <th>Talla</th>
                    <th>Precio</th>
                    <th style="width:120px;">Descripcion</th>
                    <th style="width:120px;">Color</th>
                </tr>
            </thead>
            <?php foreach($this->model->Listar() as $r): ?>
                <tr>
                    <td><?php echo $r->__GET('NOMPRO'); ?></td>
                    <td><?php echo $r->__GET('MARCA'); ?></td>
                    <td><?php echo $r->__GET('TALLA'); ?> Minutos</td>
                    <td><?php echo $r->__GET('PRECIO'); ?></td>
                    <td><?php echo $r->__GET('DESCRIPCION'); ?></td>
                    <td><?php echo $r->__GET('COLOR'); ?></td>
                </tr>
            <?php endforeach; ?>
        </table> 
    </body>
</html>