
<?php
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
	public static function delById($ID_OPERACION){
		$sql = "delete from ".self::$tablename." where ID_OPERACION=$ID_OPERACION";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_OPERACION=$this->ID_OPERACION";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto OperationData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set PRODUCTO_ID=\"$this->PRODUCTO_ID\",Q=\"$this->Q\" where ID_OPERACION=$this->ID_OPERACION";
		Executor::doit($sql);
	}

	public static function getById($ID_OPERACION){
		$sql = "select * from ".self::$tablename." where ID_OPERACION=$ID_OPERACION";
		$query = Executor::doit($sql);
		return Model::one($query[0],new OperationData());
	}

	public function cancel(){
		$sql = "update ".self::$tablename." set ESTATUS_ID=5, CANTIDAD=0 where ID_OPERACION=$this->ID_OPERACION";
		Executor::doit($sql);
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());

	}

	public static function getAllByClientId($ID_CLIENTE){
		$sql = "select * from ".self::$tablename." where CLIENTE_ID=$ID_CLIENTE";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getAllBySellId($ID_VENTA){
		$sql = "select * from ".self::$tablename." where VENTA_ID=$ID_VENTA";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getAllByDateOfficial($INICIO,$FINAL){
 		$sql = "select * from ".self::$tablename." where date(CREADO_EN) >= \"$INICIO\" and date(CREADO_EN) <= \"$FINAL\" order by CREADO_EN desc";
		if($INICIO == $FINAL){
		 $sql = "select * from ".self::$tablename." where date(CREADO_EN) = \"$INICIO\" order by CREADO_EN desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getAllByDateOfficialBP($PRODUCTO, $INICIO,$FINAL){
 $sql = "select * from ".self::$tablename." where date(CREADO_EN) >= \"$INICIO\" and date(CREADO_EN) <= \"$FINAL\" and PRODUCTO_ID=$PRODUCTO order by CREADO_EN desc";
		if($INICIO == $FINAL){
		 $sql = "select * from ".self::$tablename." where date(CREADO_EN) = \"$INICIO\" order by CREADO_EN desc";
		}
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public function getProduct(){ return ProductData::getById($this->PRODUCTO_ID);}
	public function getOperationtype(){ return OperationTypeData::getById($this->OPERACION_TIPO_ID);}
	public function getStatus(){ return StatusData::getById($this->ESTATUS_ID);}




	public static function getQYesF($PRODUCTO_ID){
		$q=0;
		$operations = self::getAllByProductId($PRODUCTO_ID);
		$input_id = OperationTypeData::getByName("entrada")->OPERACION_ID;
		$output_id = OperationTypeData::getByName("salida")->OPERACION_ID;
		foreach($operations as $operation){
				if($operation->OPERACION_TIPO_ID==$input_id){ $q+=$operation->CANTIDAD; }
				else if($operation->OPERACION_TIPO_ID==$output_id){  $q+=(-$operation->CANTIDAD); }
		}
		// print_r($data);
		return $q;
	}

	public static function getAllProductsBySellId($VENTA_ID){
		$sql = "select * from ".self::$tablename." where VENTA_ID=$VENTA_ID order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}



	public static function getAllByProductIdCutId($product_id,$cut_id){
		$sql = "select * from ".self::$tablename." where product_id=$product_id and cut_id=$cut_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getAllByProductId($PRODUCTO_ID){
		$sql = "select * from ".self::$tablename." where PRODUCTO_ID=$PRODUCTO_ID  order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}


	public static function getAllByProductIdCutIdOficial($product_id,$cut_id){
		$sql = "select * from ".self::$tablename." where product_id=$product_id and cut_id=$cut_id order by created_at desc";
		return Model::many($query[0],new OperationData());
	}


	public static function getAllByProductIdCutIdYesF($product_id,$cut_id){
		$sql = "select * from ".self::$tablename." where product_id=$product_id and cut_id=$cut_id order by created_at desc";
		return Model::many($query[0],new OperationData());
		return $array;
	}

////////////////////////////////////////////////////////////////////
	public static function getOutputQ($product_id,$cut_id){
		$q=0;
		$operations = self::getOutputByProductIdCutId($product_id,$cut_id);
		$input_id = OperationTypeData::getByName("entrada")->id;
		$output_id = OperationTypeData::getByName("salida")->id;
		foreach($operations as $operation){
			if($operation->operation_type_id==$input_id){ $q+=$operation->q; }
			else if($operation->operation_type_id==$output_id){  $q+=(-$operation->q); }
		}
		// print_r($data);
		return $q;
	}

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

	public function change_status(){
		$sql = "update ".self::$tablename." set ESTATUS_ID=\"$this->ESTATUS_ID\" where ID_OPERACION=$this->ID_OPERACION";
		Executor::doit($sql);
	}


	public static function getOutputByProductIdCutId($product_id,$cut_id){
		$sql = "select * from ".self::$tablename." where product_id=$product_id and cut_id=$cut_id and operation_type_id=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}


	public static function getOutputByProductId($PRODUCTO_ID){
		$sql = "select * from ".self::$tablename." where PRODUCTO_ID=$PRODUCTO_ID and OPERACION_TIPO_ID=2 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

////////////////////////////////////////////////////////////////////
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


	public static function getInputByProductIdCutId($product_id,$cut_id){
		$sql = "select * from ".self::$tablename." where product_id=$product_id and cut_id=$cut_id and operation_type_id=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getInputByProductId($PRODUCTO_ID){
		$sql = "select * from ".self::$tablename." where PRODUCTO_ID=$PRODUCTO_ID and OPERACION_TIPO_ID=1 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getInputByProductIdCutIdYesF($product_id,$cut_id){
		$sql = "select * from ".self::$tablename." where product_id=$product_id and cut_id=$cut_id and operation_type_id=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

////////////////////////////////////////////////////////////////////////////


}

?>