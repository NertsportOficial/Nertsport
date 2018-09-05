<?php
//Esta clase se encarga de las consultas y operaciones relacionadas con la tabla "Categoria"
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
	//Esta funcion agrega nuevos registros a la tabla
	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE,NOMBRE_CORTO,ACTIVO) ";
		$sql .= "value (\"$this->NOMBRE\",\"$this->NOMBRE_CORTO\",$this->ACTIVO)";
		Executor::doit($sql);
	}
	//Esta funciona elimina registros de la tabla usando el identificador proporcionado
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where ID_CATEGORIA=$ID_CATEGORIA";
		Executor::doit($sql);
	}
	// Esta funcion elimina registros de la tabla
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_CATEGORIA=$this->ID_CATEGORIA";
		Executor::doit($sql);
	}
	//Esta funcion actualiza los registros de la tabla dependiendo de los requerimientos del usuario 
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->NOMBRE\",NOMBRE_CORTO=\"$this->NOMBRE_CORTO\",ACTIVO=\"$this->ACTIVO\" where ID_CATEGORIA=$this->ID_CATEGORIA";
		Executor::doit($sql);
	}
	//Esta funcion selecciona los registros de la tabla que concuerden con el identificador dado
	public static function getById($ID_CATEGORIA){
		$sql = "select * from ".self::$tablename." where ID_CATEGORIA=$ID_CATEGORIA";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}
	//Esta funcion selecciona los registros de acuerdo al "Nombre corto"
	public static function getByPreffix($ID_CATEGORIA){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$ID_CATEGORIA\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}
	//Esta funcion selecciona todos los registros de la tabla
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}
	//Esta funcion selecciona los registros de la tabla que cumplan con la condicion de "activo=1"
	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ACTIVO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

}

?>