<?php
class SellData {
	public static $tablename = "venta";

	public function SellData(){
		$this->CREADO_EN = "NOW()";
	}

	public function getUser(){ return UserData::getById($this->ADMIN_ID);}
	public function getPerson(){ return ClientData::getById($this->CLIENTE_ID);}

	public function add(){
		$sql = "insert into ".self::$tablename." (CLIENTE_ID,CREADO_EN) ";
		$sql .= "value ($this->CLIENTE_ID,$this->CREADO_EN)";
		return Executor::doit($sql);
	}

	public function add_re(){
		$sql = "insert into ".self::$tablename." (ADMIN_ID, OPERACION_TIPO_ID, CREADO_EN) ";
		$sql .= "value ($this->ADMIN_ID, 1, $this->CREADO_EN)";
		return Executor::doit($sql);
	}

	public function add_with_client(){
		$sql = "insert into ".self::$tablename." (TOTAL,DESCUENTO,CLIENTE_ID,ADMIN_ID,CREADO_EN) ";
		$sql .= "value ($this->TOTAL,$this->DESCUENTO,$this->CLIENTE_ID,$this->ADMIN_ID,$this->CREADO_EN)";
		return Executor::doit($sql);
	}

	public function add_re_with_client(){
		$sql = "insert into ".self::$tablename." (person_id,operation_type_id,user_id,created_at) ";
		$sql .= "value ($this->person_id,1,$this->user_id,$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where ID_VENTA=$ID_VENTA";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where ID_VENTA=$this->ID_VENTA";
		Executor::doit($sql);
	}

	public function update_box(){
		$sql = "update ".self::$tablename." set box_id=$this->box_id where id=$this->id";
		Executor::doit($sql);
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SellData());
	}

	public static function getById($ID_VENTA){
		 $sql = "select * from ".self::$tablename." where ID_VENTA=$ID_VENTA";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SellData());
	}



	public static function getSells(){
		$sql = "select * from ".self::$tablename." where OPERACION_TIPO_ID=2 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SellData());
	}

	public static function getSellsUnBoxed(){
		$sql = "select * from ".self::$tablename." where OPERACION_TIPO_ID=2 and box_id is NULL order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SellData());
	}

	public static function getByBoxId($id){
		$sql = "select * from ".self::$tablename." where OPERACION_TIPO_ID=2 and box_id=$id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SellData());
	}

	public static function getRes(){
		$sql = "select * from ".self::$tablename." where OPERACION_TIPO_ID=1 order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SellData());
	}

	public  function getTotal(){
		$products = OperationData::getAllBySellId($this->ID_VENTA);
		$total=0;
		foreach ($products as $px) {
			$p = ProductData::getById($px->PRODUCTO_ID);
			$total+=$p->PRECIO*$px->CANTIDAD;
		}
		return $total;
	}

	public  function getStatus1(){
		$products = OperationData::getAllBySellId($this->ID_VENTA);
		foreach ($products as $px) {
			$p = StatusData::getById($px->ESTATUS_ID);
		}
		return $p;
	}

	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where ID_VENTA<=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SellData());

	}

	public static function getAllByClientId($ID_CLIENTE){
		$sql = "select * from ".self::$tablename." where CLIENTE_ID=$ID_CLIENTE";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SellData());
	}

	public static function getAllByDateOp($INICIO,$FINAL,$OP){
  $sql = "select * from ".self::$tablename." where date(CREADO_EN) >= \"$INICIO\" and date(CREADO_EN) <= \"$FINAL\" and OPERACION_TIPO_ID=$OP order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SellData());

	}
	public static function getAllByDateBCOp($clientid,$start,$end,$op){
 $sql = "select * from ".self::$tablename." where date(CREADO_EN) >= \"$start\" and date(CREADO_EN) <= \"$end\" and CLIENTE_ID=$clientid  and OPERACION_TIPO_ID=$OP order by CREADO_EN desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SellData());

	}

}

?>