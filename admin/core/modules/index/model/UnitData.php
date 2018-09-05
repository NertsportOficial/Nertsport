<?php
// Esta clase se encarga de las consultas relacionadas con la tabla "genero"
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
	//Esta funcion agrega nuevos registros a la tabla
	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE) ";
		$sql .= "value (\"$this->name\")";
		Executor::doit($sql);
	}
	//Esta funcion elimina registros usando el identificador de la tabla
	public static function delById($ID_GENERO){
		$sql = "delete from ".self::$tablename." where ID_GENERO=$ID_GENERO";
		Executor::doit($sql);
	}
	//Esta funcion elimina registros de la tabla
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_GENERO=$this->ID_GENERO";
		Executor::doit($sql);
	}
	//Esta funcion actualiza los registros de la tabla
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->NOMBRE\" where ID_GENERO=$this->ID_GENERO";
		Executor::doit($sql);
	}
	//Esta funcion obtiene los registros de la tabla usando el identificador de la misma
	public static function getById($ID_GENERO){
		$sql = "select * from ".self::$tablename." where ID_GENERO=$ID_GENERO";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UnitData());
	}
	//Esta funcion obtiene los registros de la tabla usando el campo "Nombre corto"
	public static function getByPreffix($ID_GENERO){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$ID_GENERO\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UnitData());
	}
	//Esta funcion obtiene todos los registros de la tabla
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UnitData());
	}
	//Esta funcion obtiene los registros de la tabla que tengan el campo "Es_publico" en 1
	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ACTIVO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UnitData());
	}

}

?>