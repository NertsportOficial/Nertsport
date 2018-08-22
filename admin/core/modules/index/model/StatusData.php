<?php
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

	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE,NOMBRE_CORTO,ES_PUBLICO) ";
		$sql .= "value (\"$this->name\",\"$this->short_name\",$this->is_public)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where ID_ESTATUS=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_ESTATUS=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto StatusData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->name\" where ID_ESTATUS=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where ID_ESTATUS=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new StatusData());
	}

	public static function getByPreffix($id){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new StatusData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ES_PUBLICO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}

}

?>