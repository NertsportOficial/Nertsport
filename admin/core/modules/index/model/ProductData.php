<?php
//esta clase se encarga de todas las consultas y operaciones relacionadas con la tabla "producto"
class ProductData {
	public static $tablename = "producto";

	public function ProductData(){
		$this->title = "";
		$this->content = "";
		$this->FOTO = "";
		$this->link = "";
		$this->CATEGORIA_ID = "";
		$this->ES_PUBLICO = "0";
		$this->CREADO_EN = "NOW()";
	}
	//Esta funcion obtiene los nombres del genero asignada al producto
	public function getUnit(){ return UnitData::getById($this->GENERO_ID);}
	//Esta funcion obtiene los nombres de  la categoria asignada al producto
	public function getCategory(){ return CategoryData::getById($this->CATEGORIA_ID);}
	//Esta funcion agrega nuevos registros a la tabla
	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE_CORTO,CODIGO,NOMBRE,DESCRIPCION,FOTO,FOTO1,FOTO2,PRECIO,CATEGORIA_ID,GENERO_ID,ES_PUBLICO,EN_EXISTENCIA,INVENTARIO_MIN,ES_DESTACADO,CREADO_EN) ";
		$sql .= "value (\"$this->NOMBRE_CORTO\",\"$this->CODIGO\",\"$this->NOMBRE\",\"$this->DESCRIPCION\",\"$this->FOTO\",\"$this->FOTO1\",\"$this->FOTO2\",\"$this->PRECIO\",$this->CATEGORIA_ID,$this->GENERO_ID,$this->ES_PUBLICO,$this->EN_EXISTENCIA,$this->INVENTARIO_MIN,$this->ES_DESTACADO,$this->CREADO_EN)";
		Executor::doit($sql);
	}
	//Esat funcion agrega un nuevo registro, con la diferencia de que esta lo hace con imagenes incluidas
	public function add_with_image(){
		$sql = "insert into ".self::$tablename." (NOMBRE_CORTO,CODIGO,NOMBRE,DESCRIPCION,FOTO,PRECIO,CATEGORIA_ID,GENERO_ID,ES_PUBLICO,EN_EXISTENCIA,INVENTARIO_MIN,ES_DESTACADO,CREADO_EN) ";
		$sql .= "value (\"$this->NOMBRE_CORTO\",\"$this->CODIGO\",\"$this->NOMBRE\",\"$this->DESCRIPCION\",\"$this->FOTO\",\"$this->PRECIO\",$this->CATEGORIA_ID,$this->GENERO_ID,$this->ES_PUBLICO,$this->EN_EXISTENCIA,$this->INVENTARIO_MIN,$this->ES_DESTACADO,$this->CREADO_EN)";
		Executor::doit($sql);
	}
	//Esta funcion elimina registros usando el identificador de la tabla
	public static function delById($ID_PRODUCTO){
		$sql = "delete from ".self::$tablename." where ID_PRODUCTO=$ID_PRODUCTO";
		Executor::doit($sql);
	}
	//Esta funcion elimina registros de la tabla
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}
	//Esta funcion actualiza los registros de la tabla
	public function update(){
		$sql = "update ".self::$tablename." set CODIGO=\"$this->CODIGO\",NOMBRE=\"$this->NOMBRE\",DESCRIPCION=\"$this->DESCRIPCION\",PRECIO=\"$this->PRECIO\",EN_EXISTENCIA=\"$this->EN_EXISTENCIA\",INVENTARIO_MIN=\"$this->INVENTARIO_MIN\",ES_PUBLICO=\"$this->ES_PUBLICO\",ES_DESTACADO=\"$this->ES_DESTACADO\",GENERO_ID=\"$this->GENERO_ID\",CATEGORIA_ID=\"$this->CATEGORIA_ID\" where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}
	//Esta funcion actualiza la imagen del producto en conjunto con la funcion "update"
	public function update_image(){
		$sql = "update ".self::$tablename." set FOTO=\"$this->FOTO\" where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}
	//Esta funcion actualiza la segunda imagen del producto en conjunto con la funcion "update"
	public function update_image_1(){
		$sql = "update ".self::$tablename." set FOTO1=\"$this->FOTO1\" where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}
	//Esta funcion actualiza la tercera imagen del producto en conjunto con la funcion "update"
	public function update_image_2(){
		$sql = "update ".self::$tablename." set FOTO2=\"$this->FOTO2\" where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}
	//Esta funcion obtiene los registros de la tabla usando el identificador de la misma
	public static function getById($ID_PRODUCTO){
		$sql = "select * from ".self::$tablename." where ID_PRODUCTO=$ID_PRODUCTO";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductData());
	}
	//Esta funcion obtiene todos los registros de la tabla
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
 	//Esta funcion obtiene los registros de la tabla de acuerdo al identificador de categoria asignado a cada uno
	public static function getPublicsByCategoryId($ID_CATEGORIA){
		$sql = "select * from ".self::$tablename." where CATEGORIA_ID=$ID_CATEGORIA and ES_PUBLICO=1 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	
 	//Esta funcion obtiene los registros de la tabla de acuerdo al identificador de genero asignado a cada uno
	public static function getPublicsByGeneroId($ID_GENERO){
		$sql = "select * from ".self::$tablename." where GENERO_ID=$ID_GENERO and ES_PUBLICO=1 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	//Esta funcion se encarga del funcionamiento del paginado en el apartado de administrador, usando el identificador del producto como inicio y limitando el numero de registros mostrados con la variable limit
	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where ID_PRODUCTO>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	//Esta funcion selecciona los registros de la tabla cuyo campo de "Es_destacado" se encuentra activo
	public static function getFeatureds(){
		$sql = "select * from ".self::$tablename." where ES_DESTACADO=1 and ES_PUBLICO=1 order by CREADO_EN desc limit 6";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	//Esta funcion obtiene los registros de la tabla cuyos campos "Nombre" o "Descripcion" corcuerden esten relacionados con la busqueda del usuario
	public static function getLike($Q){
		$sql = "select * from ".self::$tablename." where NOMBRE like '%$Q%' or DESCRIPCION like '%$Q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
}
?>