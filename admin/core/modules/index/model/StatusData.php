<?php
// Esta clase se encarga de las consultas relacionadas con la tabla "estatus"
class StatusData {
	public static $tablename = "estatus";

	public function StatusData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}
	//Esta funcion agrega nuevos registros a la tabla
	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE,NOMBRE_CORTO,ES_PUBLICO) ";
		$sql .= "value (\"$this->name\",\"$this->short_name\",$this->is_public)";
		Executor::doit($sql);
	}
	//Esta funcion elimina registros usando el identificador de la tabla
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where ID_ESTATUS=$id";
		Executor::doit($sql);
	}
	//Esta funcion elimina registros de la tabla
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_ESTATUS=$this->id";
		Executor::doit($sql);
	}
	//Esta funcion actualiza los registros de la tabla
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->name\" where ID_ESTATUS=$this->id";
		Executor::doit($sql);
	}
	//Esta funcion obtiene los registros de la tabla usando el identificador de la misma
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where ID_ESTATUS=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new StatusData());
	}
	//Esta funcion obtiene los registros de la tabla usando el campo "Nombre corto"
	public static function getByPreffix($id){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new StatusData());
	}
	//Esta funcion obtiene todos los registros de la tabla
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}
	//Esta funcion obtiene los registros de la tabla que tengan el campo "Es_publico" en 1
	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ES_PUBLICO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}

}

?>