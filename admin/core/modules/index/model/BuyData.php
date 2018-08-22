<?php
class BuyData {
	public static $tablename = "comprar";


	public function BuyData(){
		$this->title = "";
		$this->content = "";
		$this->FOTO = "";
		$this->user_id = "";
		$this->ES_PUBLICO = "0";
		$this->CREADO_EN = "NOW()";
	}

	public function getStatus(){ return StatusData::getById($this->ESTATUS_ID);}
	public function getClient(){ return ClientData::getById($this->CLIENTE_ID);}

	public function add(){
		$sql = "insert into ".self::$tablename." (CODIGO,CLIENTE_ID,CREADO_EN,ESTATUS_ID) ";
		$sql .= "value (\"$this->CODIGO\",\"$this->CLIENTE_ID\",$this->CREADO_EN,$this->ESTATUS_ID)";
		return Executor::doit($sql);
	}

	public static function delById($ID_COMPRA){
		$sql = "delete from ".self::$tablename." where ID_COMPRA=$ID_COMPRA";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_COMPRA=$this->ID_COMPRA";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto BuyData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->NOMBRE\" where ID_COMPRA=$this->ID_COMPRA";
		Executor::doit($sql);
	}

	public function cancel(){
		$sql = "update ".self::$tablename." set ESTATUS_ID=5 where ID_COMPRA=$this->ID_COMPRA";
		Executor::doit($sql);
	}


	public function change_status(){
		$sql = "update ".self::$tablename." set ESTATUS_ID=\"$this->ESTATUS_ID\" where ID_COMPRA=$this->ID_COMPRA";
		Executor::doit($sql);
	}

	public static function getById($ID_COMPRA){
		$sql = "select * from ".self::$tablename." where ID_COMPRA=$ID_COMPRA";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}

	public static function getByCode($ID_COMPRA){
		$sql = "select * from ".self::$tablename." where CODIGO=\"$ID_COMPRA\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}

	public static function getByPreffix($ID_COMPRA){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$ID_COMPRA\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}

	public  function getTotal(){
		$products = BuyProductData::getAllByBuyId($this->ID_COMPRA);
		$total=0;
		foreach ($products as $px) {
			$p = ProductData::getById($px->PRODUCTO_ID);
			$total+=$p->PRECIO*$px->Q;
		}
		return $total;
	}


	public static function getAllByClientId($ID_CLIENTE){
		$sql = "select * from ".self::$tablename." where CLIENTE_ID=$ID_CLIENTE";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}


	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ES_PUBLICO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}

}

?>