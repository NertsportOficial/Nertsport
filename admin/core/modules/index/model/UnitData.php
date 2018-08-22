<?php
class UnitData {
	public static $tablename = "genero";


	public function UnitData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE) ";
		$sql .= "value (\"$this->name\")";
		Executor::doit($sql);
	}

	public static function delById($ID_GENERO){
		$sql = "delete from ".self::$tablename." where ID_GENERO=$ID_GENERO";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_GENERO=$this->ID_GENERO";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UnitData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->NOMBRE\" where ID_GENERO=$this->ID_GENERO";
		Executor::doit($sql);
	}

	public static function getById($ID_GENERO){
		$sql = "select * from ".self::$tablename." where ID_GENERO=$ID_GENERO";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UnitData());
	}

	public static function getByPreffix($ID_GENERO){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$ID_GENERO\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UnitData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UnitData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ACTIVO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UnitData());
	}

}

?>