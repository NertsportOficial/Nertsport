<?php
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

	public function getUnit(){ return UnitData::getById($this->GENERO_ID);}
	public function getCategory(){ return CategoryData::getById($this->CATEGORIA_ID);}

	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE_CORTO,CODIGO,NOMBRE,DESCRIPCION,FOTO,FOTO1,FOTO2,PRECIO,CATEGORIA_ID,GENERO_ID,ES_PUBLICO,EN_EXISTENCIA,INVENTARIO_MIN,ES_DESTACADO,CREADO_EN) ";
		$sql .= "value (\"$this->NOMBRE_CORTO\",\"$this->CODIGO\",\"$this->NOMBRE\",\"$this->DESCRIPCION\",\"$this->FOTO\",\"$this->FOTO1\",\"$this->FOTO2\",\"$this->PRECIO\",$this->CATEGORIA_ID,$this->GENERO_ID,$this->ES_PUBLICO,$this->EN_EXISTENCIA,$this->INVENTARIO_MIN,$this->ES_DESTACADO,$this->CREADO_EN)";
		Executor::doit($sql);
	}
	
	public function add_with_image(){
		$sql = "insert into ".self::$tablename." (NOMBRE_CORTO,CODIGO,NOMBRE,DESCRIPCION,FOTO,PRECIO,CATEGORIA_ID,GENERO_ID,ES_PUBLICO,EN_EXISTENCIA,INVENTARIO_MIN,ES_DESTACADO,CREADO_EN) ";
		$sql .= "value (\"$this->NOMBRE_CORTO\",\"$this->CODIGO\",\"$this->NOMBRE\",\"$this->DESCRIPCION\",\"$this->FOTO\",\"$this->PRECIO\",$this->CATEGORIA_ID,$this->GENERO_ID,$this->ES_PUBLICO,$this->EN_EXISTENCIA,$this->INVENTARIO_MIN,$this->ES_DESTACADO,$this->CREADO_EN)";
		Executor::doit($sql);
	}

	public static function delById($ID_PRODUCTO){
		$sql = "delete from ".self::$tablename." where ID_PRODUCTO=$ID_PRODUCTO";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set CODIGO=\"$this->CODIGO\",NOMBRE=\"$this->NOMBRE\",DESCRIPCION=\"$this->DESCRIPCION\",PRECIO=\"$this->PRECIO\",EN_EXISTENCIA=\"$this->EN_EXISTENCIA\",INVENTARIO_MIN=\"$this->INVENTARIO_MIN\",ES_PUBLICO=\"$this->ES_PUBLICO\",ES_DESTACADO=\"$this->ES_DESTACADO\",GENERO_ID=\"$this->GENERO_ID\",CATEGORIA_ID=\"$this->CATEGORIA_ID\" where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set FOTO=\"$this->FOTO\" where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}

	public function update_image_1(){
		$sql = "update ".self::$tablename." set FOTO1=\"$this->FOTO1\" where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}

	public function update_image_2(){
		$sql = "update ".self::$tablename." set FOTO2=\"$this->FOTO2\" where ID_PRODUCTO=$this->ID_PRODUCTO";
		Executor::doit($sql);
	}

	public static function getById($ID_PRODUCTO){
		$sql = "select * from ".self::$tablename." where ID_PRODUCTO=$ID_PRODUCTO";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getPublicsByCategoryId($ID_CATEGORIA){
		$sql = "select * from ".self::$tablename." where CATEGORIA_ID=$ID_CATEGORIA and ES_PUBLICO=1 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	
	
	public static function getPublicsByGeneroId($ID_GENERO){
		$sql = "select * from ".self::$tablename." where GENERO_ID=$ID_GENERO and ES_PUBLICO=1 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	
	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where ID_PRODUCTO>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function get4News(){
		$sql = "select * from ".self::$tablename." where is_new=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function get4Offers(){
		$sql = "select * from ".self::$tablename." where is_offer=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getNews(){
		$sql = "select * from ".self::$tablename." where is_new=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getFeatureds(){
		$sql = "select * from ".self::$tablename." where ES_DESTACADO=1 and ES_PUBLICO=1 order by CREADO_EN desc limit 6";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getLike($Q){
		$sql = "select * from ".self::$tablename." where NOMBRE like '%$Q%' or DESCRIPCION like '%$Q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


}

?>