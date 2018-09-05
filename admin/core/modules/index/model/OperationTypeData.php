<?php
//Esat clase se encargar de todas las consultas relacionadas con la tabla "operacion_tipo"
class OperationTypeData {
	public static $tablename = "operacion_tipo";

	public function OperationTypeData(){
		$this->NOMBRE = "";
	}
	//Esta funcion agrega nuevos registros a la tabla
	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE) ";
		$sql .= "value (\"$this->NOMBRE\")";
		Executor::doit($sql);
	}
	//Esta funcion elimina registros usando el identificador de la tabla
	public static function delById($OPERACION_ID){
		$sql = "delete from ".self::$tablename." where OPERACION_ID=$OPERACION_ID";
		Executor::doit($sql);
	}
	//Esta funcion elimina registros de la tabla
	public function del(){
		$sql = "delete from ".self::$tablename." where OPERACION_ID=$this->OPERACION_ID";
		Executor::doit($sql);
	}
	//Esta funcion obtiene los registros de la tabla usando el identificador de la misma
	public static function getById($OPERACION_ID){
		 $sql = "select * from ".self::$tablename." where OPERACION_ID=$OPERACION_ID";
		$query = Executor::doit($sql);
		$found = null;
		$data = new OperationTypeData();
		while($r = $query[0]->fetch_array()){
			$data->OPERACION_ID = $r['OPERACION_ID'];
			$data->NOMBRE = $r['NOMBRE'];
			$found = $data;
			break;
		}
		return $found;
	}
	//Esta funcion obtiene los registros de la tabla usando el campo "nombre" de la misma
	public static function getByName($NOMBRE){
		 $sql = "select * from ".self::$tablename." where NOMBRE=\"$NOMBRE\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new OperationTypeData();
		while($r = $query[0]->fetch_array()){
			$data->OPERACION_ID = $r['OPERACION_ID'];
			$data->NOMBRE = $r['NOMBRE'];
			$found = $data;
			break;
		}
		return $found;
	}
	//Esat funcion obtiene todos los registros de la tabla
	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by CREADO_EN desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new OperationTypeData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$cnt++;
		}
		return $array;
	}


}

?>