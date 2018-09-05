
<?php
//Esta clase se encarga de las consultas y operaciones relacionadas con la tabla "operacion"
class OperationData {
	public static $tablename = "operacion";

	public function OperationData(){
		$this->NOMBRE = "";
		$this->PRODUCTO_ID = "";
		$this->CANTIDAD = "";
		$this->CORTE_ID = "";
		$this->OPERACION_TIPO_ID = "";
		$this->CREADO_EN = "NOW()";
	}
	//Estas funciones agregan nuevos registros a la tabla
	public function add(){
		$sql = "insert into ".self::$tablename." (PRODUCTO_ID,CANTIDAD,ESTATUS_ID,OPERACION_TIPO_ID,VENTA_ID,CREADO_EN) ";
		$sql .= "value (\"$this->PRODUCTO_ID\",\"$this->CANTIDAD\",2,$this->OPERACION_TIPO_ID,$this->VENTA_ID,$this->CREADO_EN)";
		return Executor::doit($sql);
	}
	public function add_with_status(){
		$sql = "insert into ".self::$tablename." (PRODUCTO_ID,CANTIDAD,ESTATUS_ID,OPERACION_TIPO_ID,VENTA_ID,CREADO_EN) ";
		$sql .= "value (\"$this->PRODUCTO_ID\",\"$this->CANTIDAD\",$this->ESTATUS_ID,$this->OPERACION_TIPO_ID,$this->VENTA_ID,$this->CREADO_EN)";
		return Executor::doit($sql);
	}
	//Esta funciona elimina registros de la tabla usando el identificador proporcionado
	public static function delById($ID_OPERACION){
		$sql = "delete from ".self::$tablename." where ID_OPERACION=$ID_OPERACION";
		Executor::doit($sql);
	}
	// Esta funcion elimina registros de la tabla
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_OPERACION=$this->ID_OPERACION";
		Executor::doit($sql);
	}
	//Esta funcion actualiza los registros de la tabla dependiendo de los requerimientos del usuario
	public function update(){
		$sql = "update ".self::$tablename." set PRODUCTO_ID=\"$this->PRODUCTO_ID\",Q=\"$this->Q\" where ID_OPERACION=$this->ID_OPERACION";
		Executor::doit($sql);
	}
	//Esta funcion selecciona los registros de la tabla que concuerden con el identificador dado
	public static function getById($ID_OPERACION){
		$sql = "select * from ".self::$tablename." where ID_OPERACION=$ID_OPERACION";
		$query = Executor::doit($sql);
		return Model::one($query[0],new OperationData());
	}
	//Esta funcion cambia el esta de la operacion a cancelado
	public function cancel(){
		$sql = "update ".self::$tablename." set ESTATUS_ID=5, CANTIDAD=0 where ID_OPERACION=$this->ID_OPERACION";
		Executor::doit($sql);
	}
	//Esta funcion selecciona todos los registros de la tabla
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());

	}
	//Esta funcion selecciona todos los registros relacionados con un cliente en especifico
	public static function getAllByClientId($ID_CLIENTE){
		$sql = "select * from ".self::$tablename." where CLIENTE_ID=$ID_CLIENTE";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	//Esta funcion obtiene todos los registros usando el identificador de la venta
	public static function getAllBySellId($ID_VENTA){
		$sql = "select * from ".self::$tablename." where VENTA_ID=$ID_VENTA";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	//Esta funcion selecciona los registros en un rango de fecha
	public static function getAllByDateOfficial($INICIO,$FINAL){
 		$sql = "select * from ".self::$tablename." where date(CREADO_EN) >= \"$INICIO\" and date(CREADO_EN) <= \"$FINAL\" order by CREADO_EN desc";
		if($INICIO == $FINAL){
		 $sql = "select * from ".self::$tablename." where date(CREADO_EN) = \"$INICIO\" order by CREADO_EN desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	//Esta funcion selecciona los registros en un rango de fecha
	public static function getAllByDateOfficialBP($PRODUCTO, $INICIO,$FINAL){
	 $sql = "select * from ".self::$tablename." where date(CREADO_EN) >= \"$INICIO\" and date(CREADO_EN) <= \"$FINAL\" and PRODUCTO_ID=$PRODUCTO order by CREADO_EN desc";
		if($INICIO == $FINAL){
		 $sql = "select * from ".self::$tablename." where date(CREADO_EN) = \"$INICIO\" order by CREADO_EN desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	//Esta funcion obtiene los registros de la tabla "producto" relacionados con la operacion
	public function getProduct(){ return ProductData::getById($this->PRODUCTO_ID);}
	//Esta funcion obtiene los registros de la tabla "operacion_tipo" relacionados con la operacion
	public function getOperationtype(){ return OperationTypeData::getById($this->OPERACION_TIPO_ID);}
	//Esta funcion obtiene los registros de la tabla "esattus" relacionados con la operacion
	public function getStatus(){ return StatusData::getById($this->ESTATUS_ID);}

	//Esta funcion calcula el inventario de los productos
	public static function getQYesF($PRODUCTO_ID){
		$q=0;
		$operations = self::getAllByProductId($PRODUCTO_ID);
		$input_id = OperationTypeData::getByName("entrada")->OPERACION_ID;
		$output_id = OperationTypeData::getByName("salida")->OPERACION_ID;
		foreach($operations as $operation){
				if($operation->OPERACION_TIPO_ID==$input_id){ $q+=$operation->CANTIDAD; }
				else if($operation->OPERACION_TIPO_ID==$output_id){  $q+=(-$operation->CANTIDAD); }
		}
		return $q;
	}
	//Esta funcion slecciona los registros de la tabla usando el identificador de venta
	public static function getAllProductsBySellId($VENTA_ID){
		$sql = "select * from ".self::$tablename." where VENTA_ID=$VENTA_ID order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	//Esta funcion selecciona los registros de la tabla dependiendo del producto seleccionado 
	public static function getAllByProductId($PRODUCTO_ID){
		$sql = "select * from ".self::$tablename." where PRODUCTO_ID=$PRODUCTO_ID  order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	//Esta funcion procesa la salida de productos
	public static function getOutputQYesF($PRODUCTO_ID){
		$q=0;
		$operations = self::getOutputByProductId($PRODUCTO_ID);
		$input_id = OperationTypeData::getByName("entrada")->OPERACION_ID;
		$output_id = OperationTypeData::getByName("salida")->OPERACION_ID;
		foreach($operations as $operation){
			if($operation->OPERACION_TIPO_ID==$input_id){ $q+=$operation->CANTIDAD; }
			else if($operation->OPERACION_TIPO_ID==$output_id){  $q+=(-$operation->CANTIDAD); }
		}
		// print_r($data);
		return $q;
	}
	//Esta funcion procesa la entrada de productos
	public static function getInputQYesF($PRODUCTO_ID){
		$q=0;
		$operations = self::getInputByProductId($PRODUCTO_ID);
		$input_id = OperationTypeData::getByName("entrada")->OPERACION_ID;
		foreach($operations as $operation){
			if($operation->OPERACION_TIPO_ID==$input_id){ $q+=$operation->CANTIDAD; }
		}
		// print_r($data);
		return $q;
	}
	//Esta funcion cambia el estado de las operaciones
	public function change_status(){
		$sql = "update ".self::$tablename." set ESTATUS_ID=\"$this->ESTATUS_ID\" where ID_OPERACION=$this->ID_OPERACION";
		Executor::doit($sql);
	}
	//Esta funcion obtiene los registros de salida de productos
	public static function getOutputByProductId($PRODUCTO_ID){
		$sql = "select * from ".self::$tablename." where PRODUCTO_ID=$PRODUCTO_ID and OPERACION_TIPO_ID=2 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	//Esta funcion obtiene los registros de entrada de productos
	public static function getInputQ($product_id,$cut_id){
		$q=0;
		return Model::many($query[0],new OperationData());
		$operations = self::getInputByProductId($product_id);
		$input_id = OperationTypeData::getByName("entrada")->id;
		$output_id = OperationTypeData::getByName("salida")->id;
		foreach($operations as $operation){
			if($operation->operation_type_id==$input_id){ $q+=$operation->q; }
			else if($operation->operation_type_id==$output_id){  $q+=(-$operation->q); }
		}
		// print_r($data);
		return $q;
	}
	//Esta funcion obtiene los registro de entrada de productos usando el identificador de producto
	public static function getInputByProductId($PRODUCTO_ID){
		$sql = "select * from ".self::$tablename." where PRODUCTO_ID=$PRODUCTO_ID and OPERACION_TIPO_ID=1 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

////////////////////////////////////////////////////////////////////////////


}

?>