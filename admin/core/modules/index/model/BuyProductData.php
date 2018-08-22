<?php
class BuyProductData {
	public static $tablename = "comprar_producto";


	public function BuyProductData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function getProduct() { return ProductData::getById($this->PRODUCTO_ID);}

	public function add(){
		$sql = "insert into ".self::$tablename." (COMPRA_ID,PRODUCTO_ID,Q) ";
		$sql .= "value (\"$this->COMPRA_ID\",$this->PRODUCTO_ID,$this->Q)";
		return Executor::doit($sql);
	}

	public static function delById($ID_COMPRA_PRO){
		$sql = "delete from ".self::$tablename." where ID_COMPRA_PRO=$ID_COMPRA_PRO";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_COMPRA_PRO=$this->ID_COMPRA_PRO";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto BuyProductData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->NOMBRE\" where ID_COMPRA_PRO=$this->ID_COMPRA_PRO";
		Executor::doit($sql);
	}

	public static function getById($ID_COMPRA_PRO){
		$sql = "select * from ".self::$tablename." where ID_COMPRA_PRO=$ID_COMPRA_PRO";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyProductData());
	}

	public static function getByPreffix($ID_COMPRA_PRO){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$ID_COMPRA_PRO\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyProductData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyProductData());
	}

	public static function getAllByBuyId($ID_COMPRA_PRO){
		$sql = "select * from ".self::$tablename." where COMPRA_ID=$ID_COMPRA_PRO";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyProductData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ES_PUBLICO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyProductData());
	}

}

?>