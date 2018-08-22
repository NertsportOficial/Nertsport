<?php
class CategoryData {
	public static $tablename = "categoria";


	public function CategoryData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE,NOMBRE_CORTO,ACTIVO) ";
		$sql .= "value (\"$this->NOMBRE\",\"$this->NOMBRE_CORTO\",$this->ACTIVO)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where ID_CATEGORIA=$ID_CATEGORIA";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_CATEGORIA=$this->ID_CATEGORIA";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->NOMBRE\",NOMBRE_CORTO=\"$this->NOMBRE_CORTO\",ACTIVO=\"$this->ACTIVO\" where ID_CATEGORIA=$this->ID_CATEGORIA";
		Executor::doit($sql);
	}

	public static function getById($ID_CATEGORIA){
		$sql = "select * from ".self::$tablename." where ID_CATEGORIA=$ID_CATEGORIA";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}

	public static function getByPreffix($ID_CATEGORIA){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$ID_CATEGORIA\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ACTIVO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

}

?>