<?php
require_once 'model/producto.entidad.php';
require_once 'model/producto.model.php';

class ProductoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new ProductoModel();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/producto/producto.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Producto();
        
        if(isset($_REQUEST['COD_PRODUCTO'])){
            $alm = $this->model->Obtener($_REQUEST['COD_PRODUCTO']);
        }
		require_once 'view/header.php';
        require_once $alm->COD_PRODUCTO > 0 
                        ? 'view/producto/producto-editar.php'
                        : 'view/producto/producto-nuevo.php'
                        ;
		require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Producto();
        
        $alm->__SET('COD_PRODUCTO',         $_REQUEST['COD_PRODUCTO']);
        $alm->__SET('NOMPRO',          		$_REQUEST['NOMPRO']);
        $alm->__SET('MARCA',                $_REQUEST['MARCA']);
        $alm->__SET('TALLA',        		$_REQUEST['TALLA']);
        $alm->__SET('PRECIO',            	$_REQUEST['PRECIO']);
        $alm->__SET('DESCRIPCION',			$_REQUEST['DESCRIPCION']);
        $alm->__SET('COLOR',                $_REQUEST['COLOR']);
		$alm->__SET('FOTO',          		$_REQUEST['FOTO']);
        
        if( !empty( $_FILES['FOTO']['name'] ) ){
            $FOTO = date('ymdhis') . '-' . strtolower($_FILES['FOTO']['name']);
            move_uploaded_file ($_FILES['FOTO']['tmp_name'], 'uploads/' . $FOTO);
            
            $alm->__SET('FOTO', $FOTO);
        }

        if($alm->__GET('COD_PRODUCTO') != '' ? 
           $this->model->Actualizar($alm) : 
           $this->model->Registrar($alm));
        
        header('Location: producto.index.php');
    }
    
    public function CrearMultiple()
    {
            for($i = 0; $i < count($_POST['NOMPRO']); $i++)
            {
                $alm = new Producto();

        		$alm->__SET('NOMPRO',               $_REQUEST['NOMPRO'][$i]);
                $alm->__SET('MARCA',                $_REQUEST['MARCA'][$i]);
                $alm->__SET('TALLA',                $_REQUEST['TALLA'][$i]);
                $alm->__SET('PRECIO',               $_REQUEST['PRECIO'][$i]);
                $alm->__SET('DESCRIPCION',          $_REQUEST['DESCRIPCION'][$i]);
                $alm->__SET('COLOR',                $_REQUEST['COLOR'][$i]);

                if( !empty( $_FILES['FOTO']['name'] ) ){
                    $FOTO = date('ymdhis') . '-' . strtolower($_FILES['FOTO']['name'][$i]);
                    move_uploaded_file ($_FILES['FOTO']['tmp_name'][$i], 'uploads/' . $FOTO);

                    $alm->__SET('FOTO', $FOTO);
                }

                $this->model->Registrar($alm);            
            }

            header('Location: producto.index.php');
    }
    
    public function Excel(){
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=mi_archivo.xls");
        header("Pragma: no-cache");
        header("Expires: 0");    
        
        require_once 'view/producto/producto-excel.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['COD_PRODUCTO']);
        header('Location: producto.index.php');
    }
}
