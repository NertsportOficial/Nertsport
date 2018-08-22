<?php
class ProductoModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=nertsport', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM producto");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Producto();

				$alm->__SET('COD_PRODUCTO', $r->COD_PRODUCTO);
				$alm->__SET('NOMPRO', $r->NOMPRO);
				$alm->__SET('MARCA', $r->MARCA);
				$alm->__SET('TALLA', $r->TALLA);
				$alm->__SET('PRECIO', $r->PRECIO);
				$alm->__SET('DESCRIPCION', $r->DESCRIPCION);
				$alm->__SET('COLOR', $r->COLOR);
				$alm->__SET('FOTO', $r->FOTO);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($COD_PRODUCTO)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM producto WHERE COD_PRODUCTO = ?");
			          

			$stm->execute(array($COD_PRODUCTO));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Producto();

			$alm->__SET('COD_PRODUCTO', $r->COD_PRODUCTO);
			$alm->__SET('NOMPRO', $r->NOMPRO);
			$alm->__SET('MARCA', $r->MARCA);
			$alm->__SET('TALLA', $r->TALLA);
			$alm->__SET('PRECIO', $r->PRECIO);
			$alm->__SET('DESCRIPCION', $r->DESCRIPCION);
			$alm->__SET('COLOR', $r->COLOR);
			$alm->__SET('FOTO', $r->FOTO);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($COD_PRODUCTO)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM producto WHERE COD_PRODUCTO = ?");			          

			$stm->execute(array($COD_PRODUCTO));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Producto $data)
	{
		try 
		{
			$sql = "UPDATE producto SET 
						NOMPRO          = ?, 
						MARCA           = ?, 
						TALLA        	= ?,
						PRECIO          = ?,
						DESCRIPCION 	= ?,
						COLOR   		= ?,
						FOTO         	= ?
				    WHERE COD_PRODUCTO 	= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('NOMPRO'), 
					$data->__GET('MARCA'), 
					$data->__GET('TALLA'), 
					$data->__GET('PRECIO'),
					$data->__GET('DESCRIPCION'),
					$data->__GET('COLOR'),
					$data->__GET('FOTO'),
					$data->__GET('COD_PRODUCTO')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Producto $data)
	{
		try 
		{
		$sql = "INSERT INTO producto (NOMPRO,MARCA,TALLA,PRECIO,DESCRIPCION,COLOR,FOTO) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('NOMPRO'), 
				$data->__GET('MARCA'), 
				$data->__GET('TALLA'), 
				$data->__GET('PRECIO'),
				$data->__GET('DESCRIPCION'),
				$data->__GET('COLOR'),
				$data->__GET('FOTO')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}